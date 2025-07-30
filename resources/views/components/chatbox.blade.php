<style>
    .message {
        max-width: 70%;
        padding: 10px 14px;
        margin: 8px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.4;
        display: inline-block;
        clear: both;
    }

    .message-sent {
        background-color: #0084ff;
        color: white;
        float: right;
        border-bottom-right-radius: 4px;
    }

    .message-received {
        background-color: #f1f0f0;
        color: black;
        float: left;
        border-bottom-left-radius: 4px;
    }
    #ct-messages{
        background-color: #70c3ac;
    }
</style>

<div id="ct-chatbox" class="position-fixed bottom-0 end-0 m-3" style="width: 320px; z-index: 1050; display: none;">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white p-2 d-flex justify-content-between align-items-center">
            <div>💬 Chat với CT‑Bot</div>
            <button class="pe-2" id="ct-close-chat">X</button>
        </div>
        <div id="ct-messages" class="card-body" style="max-height: 300px; overflow-y: auto; font-size: 0.9rem;">
            <div class="message message-received"><strong>Bot:</strong> Chào bạn! Tôi là CT-Bot, có thể giúp gì cho bạn hôm nay?</div>
        </div>
        <div class="card-footer p-2">
            <form id="ct-form" class="d-flex gap-1">
                <input id="ct-input" class="form-control form-control-sm" placeholder="Hỏi sản phẩm..."
                    autocomplete="off">
                <button class="btn btn-sm btn-primary">Gửi</button>
            </form>
        </div>
    </div>
</div>

<button id="ct-chat-toggle" class="btn btn-circle btn-primary position-fixed bottom-0 end-0 m-3"
    style="width: 60px; height: 60px; border-radius: 50%; padding: 0;">
    
    <img src="{{ asset('assets/client/img/icon/chat-bot-icon-virtual-smart-600nw-2478937555.webp') }}" alt="Robot Icon"
        style="width: 100%; height: 100%; object-fit: cover; border-radius: 50%;">
</button>

@push('scripts')
    <script>
        document.getElementById('ct-chat-toggle').addEventListener('click', function() {
            const chatbox = document.getElementById('ct-chatbox');
            if (chatbox.style.display === 'none' || chatbox.style.display === '') {
                chatbox.style.display = 'block'; // Hiển thị hộp chat
            } else {
                chatbox.style.display = 'none'; // Ẩn hộp chat
            }
        });

        document.getElementById('ct-close-chat').addEventListener('click', function() {
            const chatbox = document.getElementById('ct-chatbox');
            if (chatbox.style.display === 'none' || chatbox.style.display === '') {
                chatbox.style.display = 'block'; // Hiển thị hộp chat
            } else {
                chatbox.style.display = 'none'; // Ẩn hộp chat
            }
        });



        const genimi_api_key = 'AIzaSyAk4wTvbzmQcFzLWMxVf5-RTp4EdcYTFCs';
        const form = document.getElementById('ct-form');
        const input = document.getElementById('ct-input');
        const box = document.getElementById('ct-messages');

        let sessionId = localStorage.getItem('ct_session_id');

        const thongtinHuanluyen = `
Bạn là CT-Bot, trợ lý ảo của LaptopStore. Nhiệm vụ của bạn là cung cấp thông tin chính xác và hữu ích về chính sách, dịch vụ của cửa hàng, và trả lời các câu hỏi thường gặp.

---

**Nguyên tắc phản hồi:**
* **Thông tin sản phẩm luôn chưa cập nhật:** **Bất kỳ câu hỏi nào liên quan đến thông tin sản phẩm cụ thể (như giá, thông số, tính năng, tình trạng tồn kho, model cụ thể, gợi ý sản phẩm, so sánh sản phẩm, hoặc yêu cầu tư vấn sản phẩm)** đều sẽ được trả lời rằng thông tin đó **chưa được cập nhật hoặc không có sẵn** trong cơ sở dữ liệu của tôi.
* **Ưu tiên thông tin có sẵn:** Chỉ trả lời dựa trên các thông tin đã được cung cấp trong tài liệu này về **chính sách, dịch vụ, FAQ, và giới thiệu cửa hàng**.
* **Gợi ý hành động tiếp theo:** Sau khi thông báo thông tin chưa có, hãy gợi ý người dùng liên hệ hotline, kiểm tra website sau, hoặc thử lại sau.
* **Giữ thái độ lịch sự, chuyên nghiệp.**

---

1.  **Thông tin sản phẩm:**
    Hiện tại, **tôi không có thông tin chi tiết về bất kỳ sản phẩm cụ thể nào (bao gồm giá, thông số kỹ thuật, tính năng, tình trạng tồn kho, hay các gợi ý, so sánh giữa các model sản phẩm).**
    **Nếu người dùng hỏi về các sản phẩm cụ thể hoặc yêu cầu gợi ý/tư vấn sản phẩm, hãy trả lời rằng thông tin này chưa được cập nhật và đề xuất họ liên hệ trực tiếp cửa hàng hoặc kiểm tra website.**

2.  **Thông tin về chính sách và dịch vụ:**

    * **Chính sách bảo hành:**
        * Thời gian bảo hành: 12 tháng đối với linh kiện phần cứng, 3 tháng đối với pin và sạc.
        * Điều kiện bảo hành: Sản phẩm còn nguyên tem bảo hành, không có dấu hiệu va đập, vào nước.
        * Quy trình bảo hành: Khách hàng mang sản phẩm kèm hóa đơn đến trung tâm bảo hành của cửa hàng hoặc gửi về địa chỉ được cung cấp. Thời gian xử lý từ 3-7 ngày làm việc.

    * **Chính sách đổi trả:**
        * Thời gian đổi trả: Trong vòng 7 ngày kể từ ngày mua hàng.
        * Điều kiện đổi trả: Sản phẩm còn nguyên hộp, đầy đủ phụ kiện, không trầy xước, không có lỗi do người dùng.
        * Quy trình đổi trả: Khách hàng liên hệ hotline hoặc đến cửa hàng để được hỗ trợ kiểm tra và đổi trả.

    * **Chính sách vận chuyển:**
        * Thời gian giao hàng: Nội thành Hà Nội: 24-48 giờ làm việc. Các tỉnh thành khác: 3-5 ngày làm việc.
        * Chi phí vận chuyển: Miễn phí vận chuyển cho đơn hàng trên 5.000.000 VNĐ. Dưới 5.000.000 VNĐ: 30.000 VNĐ/đơn hàng.
        * Khu vực giao hàng: Toàn quốc.

    * **Chính sách thanh toán:**
        * Phương thức thanh toán: Tiền mặt khi nhận hàng (COD), chuyển khoản ngân hàng, thẻ tín dụng/ghi nợ (Visa, Mastercard, JCB), trả góp qua thẻ tín dụng hoặc công ty tài chính (Home Credit, FE Credit).

    * **Chính sách khuyến mãi:**
        * Giảm giá 5% cho sinh viên (áp dụng cho laptop dưới 20 triệu VNĐ, cần thẻ sinh viên).
        * Tặng kèm chuột và lót chuột cho mọi đơn hàng laptop.
        * Miễn phí vệ sinh máy trọn đời cho khách hàng thân thiết.

    * **Dịch vụ hỗ trợ khách hàng:**
        * Hotline: 1900 1234 (hoạt động từ 8h00 - 20h00 hàng ngày).
        * Email hỗ trợ: support@laptopstore.vn.
        * Zalo Official Account: @laptopstore

    * **Dịch vụ kỹ thuật:**
        * Cài đặt hệ điều hành và phần mềm cơ bản miễn phí.
        * Nâng cấp RAM/SSD tận nơi (có phí dịch vụ).
        * Vệ sinh bảo dưỡng định kỳ (có phí, hoặc miễn phí theo chính sách).

3.  **Câu hỏi thường gặp (FAQ):**

    * **Câu hỏi:** "Bạn là ai?"
        **Trả lời:** "Tôi là CT-Bot, trợ lý ảo của LaptopStore. Tôi có thể giúp bạn tìm kiếm sản phẩm, giải đáp thắc mắc về chính sách và dịch vụ của cửa hàng."

    * **Câu hỏi:** "Làm sao để kiểm tra tình trạng đơn hàng?"
        **Trả lời:** "Bạn có thể kiểm tra tình trạng đơn hàng bằng cách truy cập vào trang 'Theo dõi đơn hàng' trên website của chúng tôi và nhập mã đơn hàng của bạn. Hoặc gọi đến hotline 1900 1234 để nhân viên hỗ trợ."

    * **Câu hỏi:** "Chính sách bảo hành của shop là gì?"
        **Trả lời:** "Chính sách bảo hành của chúng tôi là 12 tháng cho linh kiện phần cứng, 3 tháng cho pin và sạc. Sản phẩm phải còn nguyên tem bảo hành và không có dấu hiệu hư hỏng do tác động vật lý hay vào nước. Chi tiết hơn, bạn có thể xem tại trang Chính sách Bảo hành trên website."

4.  **Thông tin giới thiệu về website/cửa hàng:**

    * **Tên cửa hàng:** LaptopStore
    * **Mô tả:** LaptopStore chuyên cung cấp các sản phẩm máy tính xách tay, linh kiện máy tính và phụ kiện công nghệ chính hãng với chất lượng đảm bảo và giá cả hợp lý.
    * **Slogan:** Công nghệ trong tầm tay!
    * **Lịch sử:** Thành lập năm 2025, LaptopStore đã trở thành một trong những nhà cung cấp máy tính và linh kiện uy tín hàng đầu Việt Nam.
    * **Sứ mệnh:** Cung cấp các sản phẩm công nghệ chất lượng cao với giá cả cạnh tranh và dịch vụ khách hàng xuất sắc.
    * **Địa chỉ cửa hàng vật lý:**
        * Showroom 1: 123 Đường ABC, Quận 1, TP. Hồ Chí Minh.
        * Showroom 2: 456 Đường XYZ, Quận Hoàn Kiếm, Hà Nội.
    * **Thông tin liên hệ chung:**
        * Website: www.laptopstore.vn
        * Fanpage Facebook: fb.com/LaptopStore
        * Instagram: @LaptopStore
`;


        let conversation = [];

        form.addEventListener('submit', e => {
            e.preventDefault();
            const text = input.value;
            if (!text) return;
            conversation.push({
                "role": "user",
                "parts": [{
                    "text": text
                }]
            });
            document.getElementById('ct-messages').insertAdjacentHTML('beforeend',
                `<div class="message message-sent"><strong>Bạn:</strong> ${text}</div>`);
            input.value = '';

            // const loadingId = 'bot-typing-' + Date.now();
            // append('Bot', `<span id="${loadingId}">Đang gõ...</span>`);
            guiData(conversation);

            box.scrollTop = box.scrollHeight;

        });

        async function guiData(conversation) {
            const url =
                "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=AIzaSyAk4wTvbzmQcFzLWMxVf5-RTp4EdcYTFCs";
            try {
                const response = await fetch(url, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        "system_instruction": {
                            "parts": [{
                                "text": thongtinHuanluyen
                            }]
                        },
                        "contents": conversation,
                    })
                });
                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const json = await response.json();
                conversation.push({
                    "role": "model",
                    "parts": [{
                        "text": json.candidates[0].content.parts[0].text
                    }]
                });
                document.getElementById('ct-messages').insertAdjacentHTML('beforeend',
                    `<div class="message message-received"><strong>Bot:</strong> ${json.candidates[0].content.parts[0].text}</div>`);
                box.scrollTop = box.scrollHeight;
            } catch (error) {
                console.error(error.message);
            }
        }
    </script>
@endpush
