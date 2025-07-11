<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\{SanPham,ChatSession,ChatMessage};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ChatBotController extends Controller
{
    /* ------------------------------------------------------------------ */
    public function chatWithGpt(Request $request)
    {
        /* ---------- 0. Xác thực & chuẩn hóa ---------- */
        $user = Auth::user();
        if (!$user) return response()->json(['message'=>'Bạn cần đăng nhập để trò chuyện.'],401);

        $message = trim($request->input('q'));
        if (!$message) return response()->json(['message'=>'Vui lòng nhập nội dung.'],422);

        $normalized   = mb_strtolower($message);
        $emojiList    = ['🤖','😄','😊','😎','✨','🙌','💬','🛍️'];
        $randomEmoji  = $emojiList[array_rand($emojiList)];

        /* ---------- 1. Lấy / tạo session ---------- */
        $chatSession  = ChatSession::firstOrCreate(
            ['id'=>$request->input('session_id'),'user_id'=>$user->id],
            ['user_id'=>$user->id]
        );

        /* ---------- 2. Phản hồi “cứng” ---------- */
        $greetings = ['lô','alo','hello','hi','ê','chào','có ai ở đó không','ai ở đây'];
        if (in_array($normalized,$greetings)) {
            return $this->botReply($chatSession,'assistant',"$randomEmoji Chào bạn nha! Mình là CT‑Bot đây. Bạn cần hỏi gì không?",$message);
        }

        $funny = [
            'ct-bot có người yêu chưa'=>'CT‑Bot đang yêu công việc phục vụ bạn! 💙',
            'bot tên gì'=>'Tôi là CT‑Bot, trợ lý AI của cửa hàng 😎',
            'bot bao nhiêu tuổi'=>'Tôi sinh ra từ dòng điện vào năm 2024 ⚡',
            'bot ăn cơm chưa'=>'Tôi ăn dữ liệu mỗi ngày, cơm để bạn ăn nha 🍚',
            'tôi đẹp không'=>'Bạn đẹp như giao diện Bootstrap của tôi vậy 😍',
            'ai thông minh hơn'=>'Tôi chỉ thông minh khi bạn hỏi đúng 😁',
        ];
        foreach ($funny as $kw=>$resp){
            if (Str::contains($normalized,$kw)){
                return $this->botReply($chatSession,'assistant',"$randomEmoji $resp",$message);
            }
        }

        /* ---------- 3. Trigger “chat với bot” ---------- */
        $quick = [
            'chat với','nói chuyện với','trò chuyện với','chatbox','chatbot',
            'chat gpt','chatgpt','kể chuyện','kể mình 1 câu chuyện','nghe 1 câu chuyện','muốn nghe chuyện'
        ];
        foreach ($quick as $kw){
            if (Str::contains($normalized,$kw)){
                return $this->botReply($chatSession,'assistant','💬 Mình đang nghe nè, hỏi gì cũng được!',$message);
            }
        }

        /* ---------- 4. GPT: phân loại intent ---------- */
        $intentType = 'chat';                                       // fallback
        try {
            $intentRes = Http::withToken(env('OPENAI_API_KEY'))->post(
                'https://api.openai.com/v1/chat/completions',[
                    'model'=>'gpt-3.5-turbo',
                    'temperature'=>0.2,
                    'messages'=>[
                        ['role'=>'system','content'=>
                            "Bạn là AI bán hàng. Nếu câu hỏi liên quan mua / giá / tư vấn sản phẩm ⇒ {\"type\":\"product\"}.\
◦ Ngược lại (trò chuyện, kể chuyện, hỏi vui…) ⇒ {\"type\":\"chat\"}. Chỉ trả về JSON."],
                        ['role'=>'user','content'=>$message]
                    ]
            ]);
            $json = json_decode($intentRes['choices'][0]['message']['content']??'{}',true);
            $intentType = $json['type'] ?? 'chat';
        } catch (\Throwable $e) {
            Log::error('Intent GPT lỗi',['err'=>$e->getMessage()]);
        }

        /* ---------- 5A. Nếu “chat” ---------- */
        if ($intentType==='chat'){
            $reply = $this->gptChat($message);
            return $this->botReply($chatSession,'assistant',"$randomEmoji $reply",$message);
        }

        /* ---------- 5B. Nếu “product” ---------- */
        $intent = $this->extractProductIntent($message);
        // nếu GPT ko trích được gì rõ ràng ⇒ coi như chat
        if (!$intent || (empty($intent['keyword']) && empty($intent['min_price']) && empty($intent['max_price']))){
            $reply = $this->gptChat($message);
            return $this->botReply($chatSession,'assistant',"$randomEmoji $reply",$message);
        }

        $products = $this->queryProducts($intent);
        if ($products->isEmpty()){
            return $this->botReply($chatSession,'assistant',"$randomEmoji Không tìm thấy sản phẩm phù hợp.",$message);
        }

        $respText = '🛍️ Dưới đây là các sản phẩm bạn có thể thích nè:';
        $respData = $products->map(fn($p)=>[
            'name'=>$p->ten_san_pham,
            'price'=>number_format($p->gia,0,',','.').' đ',
            'link'=>url('/san-pham/'.$p->id)
        ]);
        $this->saveChat($chatSession->id,'assistant',$respText);

        return response()->json([
            'message'=>"$randomEmoji $respText",
            'products'=>$respData,
            'retry'=>$message,
            'session_id'=>$chatSession->id
        ]);
    }

    /* ========== helper ========== */
    private function gptChat($userMsg): string
    {
        try{
            $res = Http::withToken(env('OPENAI_API_KEY'))->post(
                'https://api.openai.com/v1/chat/completions',[
                    'model'=>'gpt-3.5-turbo',
                    'temperature'=>0.7,
                    'messages'=>[
                        ['role'=>'system','content'=>'Bạn là chatbot thân thiện, nói tiếng Việt, hơi hài hước.'],
                        ['role'=>'user','content'=>$userMsg]
                    ]
            ]);
            return $res['choices'][0]['message']['content'] ?? 'Tôi chưa hiểu ý bạn lắm, bạn hỏi lại nhé?';
        }catch(\Throwable $e){
            Log::error('GPT Chat Error',['err'=>$e->getMessage()]);
            return '😢 Xin lỗi, có lỗi xảy ra. Bạn thử lại nha.';
        }
    }

    private function extractProductIntent($userMsg):?array
    {
        try{
            $r = Http::withToken(env('OPENAI_API_KEY'))->post(
                'https://api.openai.com/v1/chat/completions',[
                    'model'=>'gpt-3.5-turbo',
                    'temperature'=>0.2,
                    'messages'=>[
                        ['role'=>'system','content'=>'Từ câu hỏi, trả về JSON {"keyword":string,"min_price":number,"max_price":number}'],
                        ['role'=>'user','content'=>$userMsg]
                    ]
            ]);
            return json_decode($r['choices'][0]['message']['content']??'{}',true);
        }catch(\Throwable $e){
            Log::error('extract intent error',['err'=>$e->getMessage()]);
            return null;
        }
    }

    private function queryProducts($intent)
    {
        $q = SanPham::query();
        if (!empty($intent['keyword']))   $q->where('ten_san_pham','like','%'.$intent['keyword'].'%');
        if (!empty($intent['min_price'])) $q->where('gia','>=',(int)$intent['min_price']);
        if (!empty($intent['max_price'])) $q->where('gia','<=',(int)$intent['max_price']);
        return $q->take(5)->get();
    }

    private function saveChat($sessionId,$role,$content)
    {
        ChatMessage::create([
            'chat_session_id'=>$sessionId->id,
            'role'=>$role,
            'content'=>$content
        ]);
    }

    private function botReply($session,$roleMsg,$content,$userMsg)
    {
        $this->saveChat($session,'user',$userMsg);
        $this->saveChat($session,$roleMsg,$content);

        return response()->json([
            'message'=>$content,
            'retry'=>$userMsg,
            'session_id'=>$session
        ]);
    }

    /* ========= Lịch sử ========= */
    public function getChatHistory($id)
    {
        return ChatSession::with('messages')->findOrFail($id)->messages;
    }
}
