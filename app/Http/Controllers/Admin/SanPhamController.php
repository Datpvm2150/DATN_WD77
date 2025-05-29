<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BienTheSanPham;
use App\Models\DanhGiaSanPham;
use App\Models\DanhMuc;
use App\Models\DungLuong;
use App\Models\HinhAnhSanPham;
use App\Models\MauSac;
use App\Models\SanPham;
use App\Models\Tag;
use App\Models\TagSanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SanPhamController extends Controller
{
    public function index(Request $request)
    {
        $query = SanPham::withTrashed()->with('bienTheSanPhams', 'hinhAnhSanPhams', 'tagSanPhams');
        // Lọc theo danh mục
        if ($request->filled('danh_muc_id')) {
            $query->where('danh_muc_id', $request->danh_muc_id);
        }
        // Lọc theo ngày tạo
        if ($request->filled('ngay_tao')) {
            $query->whereDate('created_at', $request->ngay_tao);
        }
        // Lọc theo trạng thái
        if ($request->has('trang_thai') && $request->trang_thai !== '') {
            if ($request->trang_thai == '1') {
                $query->whereNull('deleted_at'); // Hoạt động
            } elseif ($request->trang_thai == '0') {
                $query->whereNotNull('deleted_at'); // Ngừng Hoạt động
            }
        }
        $sanphams = $query->latest('id')->get();

        // Lấy danh sách danh mục để hiển thị trong form lọc
        $danhMucs = DanhMuc::all();
        return view('admins.sanphams.index', compact('sanphams', 'danhMucs'));
    }

    public function create()
    {
        $danhmucs = DanhMuc::get();
        $tags = Tag::where('trang_thai', 1)->get();
        $mausacs = MauSac::where('trang_thai', 1)->get();
        $dungluongs = DungLuong::where('trang_thai', 1)->get();
        return view('admins.sanphams.create', compact('danhmucs', 'mausacs', 'dungluongs', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'ma_san_pham' => ['required', 'string', 'max:255', 'unique:san_phams,ma_san_pham'],
                'ten_san_pham' => ['required', 'string', 'max:255'],
                'danh_muc_id' => ['required', 'integer', 'exists:danh_mucs,id'],
                'anh_san_pham' => ['required', 'mimes:jpg,jpeg,png,gif,bmp,webp,svg', 'max:4048'],
                'mo_ta' => ['nullable', 'string'],

                // ảnh sản phẩm
                'hinh_anh' => ['required', 'array'],
                'hinh_anh.*' => ['file', 'mimes:jpg,jpeg,png,gif,bmp,webp,svg', 'max:4048'],

                // //biến thể sản phẩm
                'dung_luong_id.*' => ['required', 'exists:dung_luongs,id'],
                'mau_sac_id.*' => ['required', 'exists:mau_sacs,id'],
                'gia_cu.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'gia_moi.*' => ['required', 'numeric', 'min:1', 'max:4000000000'],
                'so_luong.*' => ['required', 'min:0', 'max:4000000000', 'integer'],
            ],
            [
                'ma_san_pham.required' => 'Mã sản phẩm không được để trống.',
                'ma_san_pham.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
                'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
                'ma_san_pham.unique' => 'Mã sản phẩm đã tồn tại.',

                'ten_san_pham.required' => 'Tên sản phẩm không được để trống.',
                'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
                'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

                'danh_muc_id.required' => 'Danh mục ID không được để trống.',
                'danh_muc_id.integer' => 'Danh mục ID phải là số nguyên.',
                'danh_muc_id.exists' => 'Danh mục ID không tồn tại.',

                'anh_san_pham.required' => 'Ảnh sản phẩm không được để trống.',
                'anh_san_pham.mimes' => 'Ảnh sản phẩm phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
                'anh_san_pham.max' => 'Ảnh sản phẩm không được vượt quá 4MB.',

                'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',

                // ảnh sản phẩm
                'hinh_anh.required' => 'Album ảnh không được để trống',
                'hinh_anh.array' => 'Album ảnh phải là một mảng',
                'hinh_anh.*.file' => 'Có ảnh sai định dạng',
                'hinh_anh.*.mimes' => 'Ảnh phải có định dạng jpg,jpeg,png,gif,bmp,webp,svg.',
                'hinh_anh.*.max' => 'Ảnh không được vượt quá 4MB',

                // //biến thể sản phẩm
                'dung_luong_id.*.required' => 'Dung lượng không được để trống.',
                'dung_luong_id.*.exists' => 'Dung lượng không tồn tại.',
                'mau_sac_id.*.required' => 'Màu sắc không được để trống.',
                'mau_sac_id.*.exists' => 'Màu sắc không tồn tại.',

                'gia_cu.*.required' => 'Giá cũ không được để trống.',
                'gia_cu.*.numeric' => 'Giá cũ phải là số.',
                'gia_cu.*.min' => 'Giá cũ phải lớn hơn hoặc bằng 1.',
                'gia_cu.*.max' => 'Giá cũ phải nhỏ hơn 4 tỷ.',

                'gia_moi.*.required' => 'Giá mới không được để trống.',
                'gia_moi.*.numeric' => 'Giá mới phải là số.',
                'gia_moi.*.min' => 'Giá mới phải lớn hơn hoặc bằng 1.',
                'gia_moi.*.max' => 'Giá mới phải nhỏ hơn 4 tỷ.',

                'so_luong.*.required' => 'Số lượng không được để trống.',
                'so_luong.*.max' => 'Số lượng phải nhỏ hơn 4 tỷ.',
                'so_luong.*.integer' => 'Số lượng phải là số nguyên.',
                'so_luong.*.min' => 'Số lượng phải lớn hơn hoặc bằng 0.',
            ]
        );
        // Sản phẩm
        $datasanpham = $request->only([
            'ma_san_pham',
            'ten_san_pham',
            'danh_muc_id',
            'anh_san_pham',
            'mo_ta'
        ]);
        if(isset($datasanpham['ten_san_pham'])){
            $datasanpham['ten_san_pham'] = ucfirst(mb_strtolower(trim($datasanpham['ten_san_pham'])));
        }
        if($request->hasFile('anh_san_pham')){
            $path_anh_san_pham = $request->file('anh_san_pham')->store('thumbnail','public');
             $datasanpham['anh_san_pham'] = 'storage/' . $path_anh_san_pham;
        }
        $datasanpham['luot_xem'] = 0;
        $datasanpham['da_ban'] = 0;
        $sanpham = SanPham::create($datasanpham);
        // album ảnh
        $hinh_anhs = $request->file('hinh_anh');
        foreach ($hinh_anhs as $hinh_anh) {
            $path = $hinh_anh->store('albums','public');
            HinhAnhSanPham::create([
                'san_pham_id'=>$sanpham['id'],
                'hinh_anh' =>'storage/' . $path,
            ]);
        }
        // Xử lý và lưu biến thể sản phẩm
        $flag = true;
        $databienthesanphams = $request->only(['dung_luong_id','mau_sac_id','gia_cu','gia_moi','so_luong']);
        foreach ($databienthesanphams['dung_luong_id'] as $index => $dung_luong_id) {
           $exists = BienTheSanPham::where('san_pham_id',$sanpham['id'])
           ->where('dung_luong_id',$dung_luong_id)
           ->where('mau_sac_id',$databienthesanphams['mau_sac_id'][$index])
           ->exists();
        if(!$exists)   {
            BienTheSanPham::create([
                'san_pham_id'=>$sanpham['id'],
                'so_luong'=>$databienthesanphams['so_luong'][$index],
                'gia_cu'=> $databienthesanphams['gia_cu'][$index],
                'gia_moi' => $databienthesanphams['gia_moi'][$index],
                'dung_luong_id' => $dung_luong_id,
                'mau_sac_id' => $databienthesanphams['mau_sac_id'][$index] ?? null,

            ]);
        }else {
            $flag = false;
        }
        }
        // Tag san pham
        $tags = $request->input('tag_id',[]);
        if(!empty($tags)){
            $data = [];
            foreach ($tags as $tagId) {
                $data[] = [
                    'tag_id'=>$tagId,
                    'san_pham_id' => $sanpham['id'],
                ];
            }
            if(!empty($data)){
                TagSanPham::insert($data);
            }
        }
        if(!$flag){
            return redirect()->route('admin.sanphams.edit',['id'=>$sanpham['id']])->with('error', 'Không thể thêm biến thể trùng!');
        }
        return redirect()->route('admin.sanphams.index')->with('success', 'Thêm thành công sản phẩm!');
    }


    public function show(string $id){
        $sanpham = SanPham::withTrashed()->find($id);
        if($sanpham){
            $bienthesanphams = BienTheSanPham::withTrashed()->where('san_pham_id',$id)->get();
            $anhsanphams = HinhAnhSanPham::where('san_pham_id',$id)->get();
            $tagsanphams = TagSanPham::where('san_pham_id',$id)->get();

            // Lấy danh sách đánh giá sản phẩm
            $danhgias = DanhGiaSanPham::latest('id')->where('san_pham_id',$id)->paginate(10);

            // tính điểm trung bình và số lượt đánh giá
            $diemtrungbinh = DanhGiaSanPham::where('san_pham_id', $id)->avg('diem_so');
            $soluotdanhgia = DanhGiaSanPham::where('san_pham_id', $id)->count();

            // Tính tỷ lệ phần trăm cho mỗi loại sao
            $starCounts = DanhGiaSanPham::select(DB::raw('diem_so, count(*) as count'))
                ->where('san_pham_id', $id)
                ->groupBy('diem_so')
                ->pluck('count', 'diem_so');

            $totalRatings = $starCounts->sum(); // Tổng số đánh giá
            $starPercentage = [];

            for ($i = 1; $i <= 5; $i++) {
                $percentage = $totalRatings > 0 ? ($starCounts->get($i, 0) / $totalRatings) * 100 : 0;
                $starPercentage[$i] = $percentage;
            }
        return view('admins.sanphams.show',compact(
            'sanpham',
            'bienthesanphams',
            'anhsanphams',
            'tagsanphams',
            'danhgias',
            'diemtrungbinh',
            'soluotdanhgia',
            'starPercentage' // Truyền tỷ lệ phần trăm sao vào view ....
        ));
        }
        return redirect()->route('admin.sanphams.index')->with('error', 'Không tìm thấy sản phẩm');
    }
    public function isHot(string $id, Request $request)
    {
        $sanpham = SanPham::withTrashed()->find($id);
        if (!$sanpham) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại');
        }
        if ($sanpham->is_hot == false) {
            $count = SanPham::where('is_hot', 1)->count();
            if( $count >= 15){
                return redirect()->back()->with('error', 'Chỉ có 15 sản phẩm có thể đánh dấu là HOT');
            }
            $sanpham->is_hot = true;
            $sanpham->save();
            return redirect()->back()->with('success', 'Sản phẩm đã được đánh dấu HOT');
        }else{
            $sanpham->is_hot = false;
            $sanpham->save();
            return redirect()->back()->with('success', 'Sản phẩm đã tắt đánh dấu HOT');
        }
    }
}
