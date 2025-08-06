<style>
    #chatbot-toggler {
        position: fixed;
        bottom: 30px;
        right: 35px;
        border: none;
        height: 50px;
        width: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border-radius: 50%;
        background: #0989FF;
        transition: all 0.2s ease;
        z-index: 1000;
    }

    body.show-chatbot #chatbot-toggler {
        transform: rotate(90deg);
    }

    #chatbot-toggler span {
        color: #fff;
        position: absolute;
    }

    body.show-chatbot #chatbot-toggler span:first-child,
    #chatbot-toggler span:last-child {
        opacity: 0;
    }

    body.show-chatbot #chatbot-toggler span:last-child {
        opacity: 1;
    }

    #chatbot-toggler span:last-child {
        opacity: 0;
    }

    .chatbot-popup {
        position: fixed;
        right: 35px;
        bottom: 90px;
        width: 420px;
        background: #fff;
        overflow: hidden;
        border-radius: 15px;
        opacity: 0;
        transform: scale(0.2);
        transform-origin: bottom right;
        pointer-events: none;
        box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
            0 32px 64px -48px rgba(0, 0, 0, 0.5);
        transition: all 0.1s ease;
        z-index: 1001;
    }

    body.show-chatbot .chatbot-popup {
        opacity: 1;
        pointer-events: auto;
        transform: scale(1);
    }

    .chatbot-header {
        display: flex;
        align-items: center;
        background: #0989FF;
        padding: 15px 22px;
        justify-content: space-between;
    }

    .chatbot-header .header-info {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .header-info .chatbot-logo {
        height: 35px;
        width: 35px;
        padding: 6px;
        fill: #0989FF;
        flex-shrink: 0;
        background: #fff;
        border-radius: 50%;
    }

    .header-info .logo-text {
        color: #fff;
        font-size: 1.31rem;
        font-weight: 600;
    }

    .chatbot-header #close-chatbot {
        border: none;
        color: #fff;
        height: 40px;
        width: 40px;
        font-size: 1.9rem;
        margin-right: -10px;
        padding-top: 2px;
        cursor: pointer;
        border-radius: 50%;
        background: none;
        transition: 0.2s ease;
    }

    .chatbot-header #close-chatbot:hover {
        background: #3d39ac;
    }

    .chatbot-body {
        padding: 25px 22px;
        display: flex;
        gap: 20px;
        height: 300px;
        margin-bottom: 82px;
        overflow-y: auto;
        scroll-behavior: smooth;
        flex-direction: column;
        scrollbar-width: thin;
        scrollbar-color: #CCCCE5 transparent;
    }

    .chatbot-body .message {
        display: flex;
        gap: 11px;
        align-items: center;
    }

    .chatbot-body .bot-message .bot-avatar {
        height: 35px;
        width: 35px;
        padding: 6px;
        fill: #fff;
        flex-shrink: 0;
        margin-bottom: 2px;
        align-self: flex-end;
        background: #0989FF;
        border-radius: 50%;
    }

    .chatbot-body .user-message {
        flex-direction: column;
        align-items: flex-end;
    }

    .chatbot-body .message .message-text {
        padding: 12px 16px;
        max-width: 75%;
        font-size: 0.95rem;
    }

    .chatbot-body .bot-message .message-text {
        background: #F2F2FF;
        border-radius: 13px 13px 13px 3px;
    }

    .chatbot-body .user-message .message-text {
        background: #0989FF;
        color: #fff;
        border-radius: 13px 13px 3px 13px;
    }

    .chatbot-body .user-message .attachment {
        width: 50%;
        margin-top: -7px;
        border-radius: 13px 3px 13px 13px;
    }

    .chatbot-body .bot-message.thinking .message-text {
        padding: 2px 16px;
    }

    .chatbot-body .bot-message .thinking-indicator {
        display: flex;
        gap: 4px;
        padding-block: 15px;
    }

    .chatbot-body .bot-message .thinking-indicator .dot {
        height: 7px;
        width: 7px;
        opacity: 0.7;
        border-radius: 50%;
        background: #6F6BC2;
        animation: dotPulse 1.8s ease-in-out infinite;
    }

    .chatbot-body .bot-message .thinking-indicator .dot:nth-child(1) {
        animation-delay: 0.2s;
    }

    .chatbot-body .bot-message .thinking-indicator .dot:nth-child(2) {
        animation-delay: 0.3s;
    }

    .chatbot-body .bot-message .thinking-indicator .dot:nth-child(3) {
        animation-delay: 0.4s;
    }


    @keyframes dotPulse {

        0%,
        44% {
            transform: translateY(0);
        }

        28% {
            opacity: 0.4;
            transform: translateY(-4px);
        }

        44% {
            opacity: 0.2;
        }
    }

    .chatbot-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: #fff;
        padding: 15px 22px 20px;
    }

    .chatbot-footer .chatbot-form {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 32px;
        outline: 1px solid #CCCCE5;
    }

    .chatbot-footer .chatbot-form:focus-within {
        outline: 2px solid #0989FF;
    }

    .chatbot-form .message-input-chatbot {
        border: none;
        outline: none;
        height: 47px;
        width: 100%;
        resize: none;
        max-height: 180px;
        white-space: pre-line;
        font-size: 0.95rem;
        padding: 14px 0 13px 18px;
        border-radius: inherit;
        scrollbar-width: thin;
        scrollbar-color: transparent transparent;
    }

    .chatbot-form .message-input-chatbot:hover {
        scrollbar-color: #CCCCE5 transparent;
    }

    .chatbot-form .chatbot-controls {
        display: flex;
        height: 47px;
        gap: 3px;
        align-items: center;
        align-self: flex-end;
        padding-right: 6px;
    }

    .chatbot-form .chatbot-controls button {
        height: 35px;
        width: 35px;
        border: none;
        font-size: 1.15rem;
        cursor: pointer;
        color: #706DB0;
        background: none;
        border-radius: 50%;
        transition: 0.2s ease;
    }

    .chatbot-form .chatbot-controls #send-message-chatbot {
        color: #fff;
        display: block;
        background: #0989FF;
    }

    .chatbot-form .message-input-chatbot:valid~.chatbot-controls #send-message-chatbot {
        display: block;
    }

    .chatbot-form .chatbot-controls #send-message-chatbot:hover {
        background: #3d39ac;
    }

    .chatbot-form .chatbot-controls button:hover {
        background: #f1f1ff;
    }

    .chatbot-form .file-upload-wrapper-chatbot {
        height: 35px;
        width: 35px;
        position: relative;
    }

    .chatbot-form .file-upload-wrapper-chatbot :where(img, button) {
        position: absolute;
    }

    .chatbot-form .file-upload-wrapper-chatbot img {
        position: absolute;
        display: none;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .chatbot-form .file-upload-wrapper-chatbot #file-cancel-chatbot {
        color: #ff0000;
        background: #fff;
    }

    .chatbot-form .file-upload-wrapper-chatbot :where(img, #file-cancel-chatbot),
    .chatbot-form .file-upload-wrapper-chatbot.file-uploaded #file-upload {
        display: none;
    }

    .chatbot-form .file-upload-wrapper-chatbot.file-uploaded img,
    .chatbot-form .file-upload-wrapper-chatbot.file-uploaded:hover #file-cancel-chatbot {
        display: block;
    }

    /* Điện Thoại */
    @media (max-width: 520px) {
        #chatbot-toggler {
            right: 20px;
            bottom: 20px;
        }

        .chatbot-popup {
            right: 0;
            bottom: 0;
            height: 100%;
            border-radius: 0;
            width: 100%;
        }

        .chatbot-popup .chatbot-header {
            padding: 12px 15px;
        }

        .chatbot-body {
            height: calc(90% - 55px);
            padding: 25px 15px;
        }

        .chatbot-footer {
            padding: 10px 15px 15px;
        }

        .chatbot-form .file-upload-wrapper-chatbot.file-uploaded #file-cancel-chatbot {
            opacity: 0;
        }

        .chatbot-form .file-upload-wrapper-chatbot.file-uploaded #file-cancel-chatbot {
            opacity: 0;
        }
    }

    .chatbot-tooltip {
        position: fixed;
        bottom: 90px;
        right: 35px;
        background: #f1f0f0;
        /* color: white; */
        padding: 8px 12px;
        border-radius: 8px;
        font-size: 14px;
        display: none;
        z-index: 1002;
        max-width: 200px;
        text-align: center;
    }

    .chatbot-tooltip::after {
        content: "";
        position: absolute;
        bottom: -8px;
        /* Mũi tên nằm bên dưới hộp */
        right: 10px;
        /* Gần góc phải */
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 8px 8px 0 8px;
        /* Hướng xuống */
        border-color: #f1f0f0 transparent transparent transparent;
    }
</style>

<button id="chatbot-toggler">
    <span class="material-symbols-rounded">
        <img src="{{asset('assets/client/img/icon/chat-bot-icon-virtual-smart-600nw-2478937555.webp')}}" style="border-radius: 50%;" width="50" height="50" alt="">
    </span>
    <span class="material-symbols-rounded">close</span>
</button>

<div class="chatbot-popup">
    <div class="chatbot-header">
        <div class="header-info">
            <svg class="chatbot-logo" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                viewBox="0 0 1024 1024">
                <path d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0
                106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9
                267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0
                35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7
                0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"></path>
            </svg>
            <h2>chatbot</h2>
        </div>
        <button id="close-chatbot" class="material-symbols-rounded"> keyboard_arrow_down </button>
    </div>

    <div class="chatbot-body">
        <div class="message bot-message">
            <svg class="bot-avatar" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                viewBox="0 0 1024 1024">
                <path d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0
                106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9
                267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0
                35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7
                0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"></path>
            </svg>
            <div class="message-text"> Chào Bạn <br /> Tôi có thể giúp gì cho bạn?</div>
        </div>
    </div>

    <div class="chatbot-footer">
        <form action="#" class="chatbot-form">
            <textarea placeholder="Tin Nhắn..." name="" id="" class="message-input-chatbot" required></textarea>

            <div class="chatbot-controls">
                <button type="submit" id="send-message-chatbot" class="material-symbols-rounded">arrow_upward</button>
            </div>
        </form>
    </div>
</div>
<!-- Tooltip có mũi tên -->
<div id="chatbot-hint" class="chatbot-tooltip">
    Chào bạn! Tôi là CT-Bot, có thể giúp gì cho bạn hôm nay? 💬
</div>

@push('scripts')
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const chatbotBody = document.querySelector(".chatbot-body");
            const messageInput = document.querySelector(".message-input-chatbot");
            const sendMessageButton = document.querySelector("#send-message-chatbot");
            const chatbotToggler = document.querySelector("#chatbot-toggler");
            const closechatbot = document.querySelector("#close-chatbot");
            let conversation = [];
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
                * Quy trình đổi trả: Khách hàng liên hệ hotline, nhắn cskh hoặc đến cửa hàng để được hỗ trợ kiểm tra và đổi trả.

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

                * Hotline: 0398030869 (hoạt động từ 8h00 - 20h00 hàng ngày).
                * Email hỗ trợ: quandmph50159@gmail.com.
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

                * Showroom 1: Trịnh Văn Bô, Nam Từ Liêm, Hà Nội.
            * **Thông tin liên hệ chung:**
                * Website: www.laptopstore.vn
                * Fanpage Facebook: fb.com/LaptopStore
                * Instagram: @LaptopStore
        `;


            // API key và URL của API Gemini 2.5 Pro
            const API_KEY = "AIzaSyAk4wTvbzmQcFzLWMxVf5-RTp4EdcYTFCs";
            const API_URL =
                `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash:generateContent?key=AIzaSyAk4wTvbzmQcFzLWMxVf5-RTp4EdcYTFCs`;

            // Dữ liệu người dùng sẽ được sử dụng để lưu trữ tin nhắn và tệp đính kèm
            const userData = {
                message: null,
            };

            const initialInputHeight = messageInput.scrollHeight;

            const createMessageElement = (content, ...classes) => {
                const div = document.createElement("div");
                div.classList.add("message", ...classes);
                div.innerHTML = content;
                return div;
            };

            // Hàm này sẽ được gọi để tạo phản hồi từ bot
            // Nó sẽ gửi yêu cầu đến API và cập nhật nội dung của tin nhắn bot
            const generateBotResponse = async (incomingMessageDiv) => {
                const messageElement = incomingMessageDiv.querySelector(".message-text");

                const requestOptions = {
                    method: 'POST',
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        "system_instruction": {
                            "parts": [{
                                "text": thongtinHuanluyen
                            }]
                        },
                        contents: [{
                            parts: [{
                                    text: userData.message
                                },
                            ]
                        }]
                    })
                };

                try {
                    // Hiển thị trạng thái "Đang suy nghĩ" trong tin nhắn bot
                    const response = await fetch(API_URL, requestOptions);
                    const data = await response.json();
                    if (!response.ok) throw new Error(data.error.message);

                    const apiResponseText = data.candidates[0].content.parts[0].text.replace(
                        /\"*\**(.*?)\**\"*/g, "$1").trim();
                    messageElement.innerText = apiResponseText;
                } catch (error) {
                    // Hiển thị thông báo lỗi nếu có
                    messageElement.innerText = "Đã xảy ra lỗi trong quá trình xử lý yêu cầu của bạn.";
                    messageElement.style.color = "#FF0000";
                    console.log(error);
                } finally {
                    // Xóa trạng thái "Đang suy nghĩ" và cập nhật dữ liệu người dùng
                    incomingMessageDiv.classList.remove("thinking");
                    console.log("Scroll Height:", chatbotBody.scrollHeight);
                    chatbotBody.scrollTo({
                        top: chatbotBody.scrollHeight,
                        behavior: "smooth"
                    });
                    // Lưu lịch sử chatbot sau khi bot trả lời
                    savechatbotHistory();
                }
            };

            // Hàm lưu lịch sử chatbot vào localStorage
            const savechatbotHistory = () => {
                localStorage.setItem("chatbot_history", chatbotBody.innerHTML);
            };

            // Hàm khôi phục lịch sử chatbot từ localStorage
            const restorechatbotHistory = () => {
                const history = localStorage.getItem("chatbot_history");
                if (history) {
                    chatbotBody.innerHTML = history;
                    // Cuộn xuống cuối cùng sau khi khôi phục
                    chatbotBody.scrollTo({
                        top: chatbotBody.scrollHeight,
                        behavior: "auto"
                    });
                }
            };

            // Khôi phục lịch sử chatbot khi tải trang
            restorechatbotHistory();

            // Xử lý sự kiện khi người dùng gửi tin nhắn
            // Hàm này sẽ được gọi khi người dùng nhấn nút gửi hoặc nhấn Enter trong input
            const handleOutgoingMessage = (e) => {
                e.preventDefault();
                userData.message = messageInput.value.trim()
                if (!userData.message.trim()) {
                    return
                }

                messageInput.value = "";
                messageInput.dispatchEvent(new Event("input"));

                const messageContent =
                    `<div class="message-text"></div>`;

                const outgoingMessageDiv = createMessageElement(messageContent, "user-message");
                outgoingMessageDiv.querySelector(".message-text").textContent = userData.message;
                chatbotBody.appendChild(outgoingMessageDiv);
                console.log("Scroll Height:", chatbotBody.scrollHeight);
                chatbotBody.scrollTo({
                    top: chatbotBody.scrollHeight,
                    behavior: "smooth"
                });

                // Lưu lịch sử chatbot sau khi gửi tin nhắn
                savechatbotHistory();

                setTimeout(() => {
                    const messageContent = `<svg class="bot-avatar" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 1024 1024">
                <path d="M738.3 287.6H285.7c-59 0-106.8 47.8-106.8 106.8v303.1c0 59 47.8 106.8 106.8 106.8h81.5v111.1c0 .7.8 1.1 1.4.7l166.9-110.6 41.8-.8h117.4l43.6-.4c59 0
                106.8-47.8 106.8-106.8V394.5c0-59-47.8-106.9-106.8-106.9zM351.7 448.2c0-29.5 23.9-53.5 53.5-53.5s53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5-53.5-23.9-53.5-53.5zm157.9
                267.1c-67.8 0-123.8-47.5-132.3-109h264.6c-8.6 61.5-64.5 109-132.3 109zm110-213.7c-29.5 0-53.5-23.9-53.5-53.5s23.9-53.5 53.5-53.5 53.5 23.9 53.5 53.5-23.9 53.5-53.5 53.5zM867.2 644.5V453.1h26.5c19.4 0
                35.1 15.7 35.1 35.1v121.1c0 19.4-15.7 35.1-35.1 35.1h-26.5zM95.2 609.4V488.2c0-19.4 15.7-35.1 35.1-35.1h26.5v191.3h-26.5c-19.4 0-35.1-15.7-35.1-35.1zM561.5 149.6c0 23.4-15.6 43.3-36.9 49.7v44.9h-30v-44.9c-21.4-6.5-36.9-26.3-36.9-49.7
                0-28.6 23.3-51.9 51.9-51.9s51.9 23.3 51.9 51.9z"></path>
                </svg>
                <div class="message-text">
                    <div class="thinking-indicator">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>`;

                    const incomingMessageDiv = createMessageElement(messageContent, "bot-message",
                        "thinking");
                    chatbotBody.appendChild(incomingMessageDiv);
                    console.log("Scroll Height:", chatbotBody.scrollHeight);
                    chatbotBody.scrollTo({
                        top: chatbotBody.scrollHeight,
                        behavior: "smooth"
                    });
                    // Lưu lịch sử chatbot sau khi thêm tin nhắn bot
                    savechatbotHistory();
                    generateBotResponse(incomingMessageDiv);
                }, 400);
            };

            // Xử lý sự kiện khi người dùng nhấn Enter trong input
            messageInput.addEventListener("keydown", (e) => {
                const userMessage = e.target.value.trim();
                if (e.key === "Enter" && userMessage && !e.shiftKey && window.innerHeight > 768) {
                    handleOutgoingMessage(e);
                }
            });


            // Tạo chiều cao ban đầu cho input
            messageInput.addEventListener("input", () => {
                messageInput.style.height = `${initialInputHeight}px`;
                messageInput.style.height = `${messageInput.scrollHeight}px`;

                // Cập nhật border-radius của chatbot-form dựa trên chiều cao của input
                document.querySelector(".chatbot-form").style.borderRadius =
                    messageInput.scrollHeight > initialInputHeight ? "15px" : "32px";
            });



            // Gán các sự kiện cho các nút và phần tử
            sendMessageButton.addEventListener("click", (e) => handleOutgoingMessage(e));
            chatbotToggler.addEventListener("click", () => {
                document.body.classList.toggle("show-chatbot");
                document.body.classList.remove('show-chat')
            });
            closechatbot.addEventListener("click", () => document.body.classList.remove("show-chatbot"));

            // Xóa lịch sử chatbot chỉ khi người dùng đóng tab/trình duyệt (không phải reload/chuyển trang)
            window.addEventListener("pagehide", (event) => {
                if (!event.persisted) {
                    localStorage.removeItem("chatbot_history");
                }
            });
        });
    </script>
@endpush
