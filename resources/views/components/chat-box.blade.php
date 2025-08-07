<style>
    #chat-toggler {
        position: fixed;
        bottom: 110px;
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

    body.show-chat #chat-toggler {
        transform: rotate(90deg);
    }

    #chat-toggler span {
        color: #fff;
        position: absolute;
    }

    body.show-chat #chat-toggler span:first-child,
    #chat-toggler span:last-child {
        opacity: 0;
    }

    body.show-chat #chat-toggler span:last-child {
        opacity: 1;
    }

    #chat-toggler span:last-child {
        opacity: 0;
    }

    .chat-popup {
        position: fixed;
        right: 35px;
        bottom: 170px;
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
        z-index: 1000;
    }

    body.show-chat .chat-popup {
        opacity: 1;
        pointer-events: auto;
        transform: scale(1);
    }

    .chat-header {
        display: flex;
        align-items: center;
        background: #0989FF;
        padding: 15px 22px;
        justify-content: space-between;
    }

    .chat-header .header-info {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .header-info .chat-logo {
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

    .chat-header #close-chat {
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

    .chat-header #close-chat:hover {
        background: #3d39ac;
    }

    .chat-body {
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

    .chat-body .message {
        display: flex;
        gap: 11px;
        align-items: center;
    }

    .chat-body .bot-message .bot-avatar {
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

    .chat-body .user-message {
        flex-direction: column;
        align-items: flex-end;
    }

    .chat-body .message .message-text {
        padding: 12px 16px;
        max-width: 75%;
        font-size: 0.95rem;
    }

    .chat-body .bot-message .message-text {
        background: #F2F2FF;
        border-radius: 13px 13px 13px 3px;
    }

    .chat-body .user-message .message-text {
        background: #0989FF;
        color: #fff;
        border-radius: 13px 13px 3px 13px;
    }

    .chat-body .user-message .attachment {
        width: 50%;
        margin-top: -7px;
        border-radius: 13px 3px 13px 13px;
    }

    .chat-body .bot-message .attachment {
        width: 50%;
        margin-top: 7px;
        border-radius: 3px 13px 13px 13px;
    }

    .chat-body .bot-message.thinking .message-text {
        padding: 2px 16px;
    }

    .chat-body .bot-message .thinking-indicator {
        display: flex;
        gap: 4px;
        padding-block: 15px;
    }

    .chat-body .bot-message .thinking-indicator .dot {
        height: 7px;
        width: 7px;
        opacity: 0.7;
        border-radius: 50%;
        background: #6F6BC2;
        animation: dotPulse 1.8s ease-in-out infinite;
    }

    .chat-body .bot-message .thinking-indicator .dot:nth-child(1) {
        animation-delay: 0.2s;
    }

    .chat-body .bot-message .thinking-indicator .dot:nth-child(2) {
        animation-delay: 0.3s;
    }

    .chat-body .bot-message .thinking-indicator .dot:nth-child(3) {
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

    .chat-footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: #fff;
        padding: 15px 22px 20px;
    }

    .chat-footer .chat-form {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 32px;
        outline: 1px solid #CCCCE5;
    }

    .chat-footer .chat-form:focus-within {
        outline: 2px solid #0989FF;
    }

    .chat-form .message-input {
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

    .chat-form .message-input:hover {
        scrollbar-color: #CCCCE5 transparent;
    }

    .chat-form .chat-controls {
        display: flex;
        height: 47px;
        gap: 3px;
        align-items: center;
        align-self: flex-end;
        padding-right: 6px;
    }

    .chat-form .chat-controls button {
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

    .chat-form .chat-controls #send-message {
        color: #fff;
        display: block;
        background: #0989FF;
    }

    .chat-form .message-input:valid~.chat-controls #send-message {
        display: block;
    }

    .chat-form .chat-controls #send-message:hover {
        background: #3d39ac;
    }

    .chat-form .chat-controls button:hover {
        background: #f1f1ff;
    }

    .chat-form .file-upload-wrapper {
        height: 35px;
        width: 35px;
        position: relative;
    }

    .chat-form .file-upload-wrapper :where(img, button) {
        position: absolute;
    }

    .chat-form .file-upload-wrapper img {
        position: absolute;
        display: none;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
    }

    .chat-form .file-upload-wrapper #file-cancel {
        color: #ff0000;
        background: #fff;
    }

    .chat-form .file-upload-wrapper :where(img, #file-cancel),
    .chat-form .file-upload-wrapper.file-uploaded #file-upload {
        display: none;
    }

    .chat-form .file-upload-wrapper.file-uploaded img,
    .chat-form .file-upload-wrapper.file-uploaded:hover #file-cancel {
        display: block;
    }

    /* Điện Thoại */
    @media (max-width: 520px) {
        #chat-toggler {
            right: 20px;
            bottom: 20px;
        }

        .chat-popup {
            right: 0;
            bottom: 0;
            height: 100%;
            border-radius: 0;
            width: 100%;
        }

        .chat-popup .chat-header {
            padding: 12px 15px;
        }

        .chat-body {
            height: calc(90% - 55px);
            padding: 25px 15px;
        }

        .chat-footer {
            padding: 10px 15px 15px;
        }

        .chat-form .file-upload-wrapper.file-uploaded #file-cancel {
            opacity: 0;
        }

        .chat-form .file-upload-wrapper.file-uploaded #file-cancel {
            opacity: 0;
        }
    }
</style>

<button id="chat-toggler">
    <span class="material-symbols-rounded">
        <img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}" style="border-radius: 50%;" width="50"
            height="50" alt="">
    </span>
    <span class="material-symbols-rounded">close</span>
</button>

<div class="chat-popup">
    <div class="chat-header">
        <div class="header-info">
            <img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}" style="border-radius: 50%;"
                width="50" height="50" alt="">
            <h2>Chat</h2>
        </div>
        <button id="close-chat" class="material-symbols-rounded"> keyboard_arrow_down </button>
    </div>

    <div class="chat-body">
        <div class="message bot-message">
            <img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}"
                style="border-radius: 50%; border:rgba(0, 0, 0, 0.1) solid;" width="35" height="35"
                alt="">
            <div class="message-text"> Chào Bạn <br /> Tôi có thể giúp gì cho bạn?</div>
        </div>
    </div>

    <div class="chat-footer">
        <form action="#" class="chat-form">
            <textarea placeholder="Tin Nhắn..." name="" id="" class="message-input" required></textarea>

            <div class="chat-controls">
                <!-- Biểu cảm -->
                <!-- <button type="button" class="material-symbols-rounded">sentiment_satisfied</button> -->
                <div class="file-upload-wrapper">
                    <input type="file" accept="image/*" id="file-input" hidden />
                    <img src="#">
                    <button type="button" id="file-upload" class="material-symbols-rounded">attach_file</button>
                    <button type="button" id="file-cancel" class="material-symbols-rounded">close</button>
                </div>
                <button type="submit" id="send-message" class="material-symbols-rounded">arrow_upward</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const chatBodyChat = document.querySelector(".chat-body");
            const messageInputChat = document.querySelector(".message-input");
            const sendMessageButtonChat = document.querySelector("#send-message");
            const fileInputChat = document.querySelector("#file-input");
            const fileUploadWrapperChat = document.querySelector(".file-upload-wrapper");
            const fileCancelButtonChat = document.querySelector("#file-cancel");
            const chatTogglerChat = document.querySelector("#chat-toggler");
            const closechatChat = document.querySelector("#close-chat");

            const userDataChat = {
                message: null,
                file: {
                    data: null,
                    mime_type: null,
                }
            };

            const initialInputHeightChat = messageInputChat.scrollHeight;

            const createMessageElementChat = (content, ...classes) => {
                const div = document.createElement("div");
                div.classList.add("message", ...classes);
                div.innerHTML = content;
                return div;
            };

            const handleOutgoingMessageChat = (e) => {
                e.preventDefault();
                if (!messageInputChat.value.trim() && !userDataChat.file.file) {
                    return
                }

                const formData = new FormData();
                formData.append('message', messageInputChat.value.trim());
                formData.append('file', userDataChat.file.file);
                $.ajax({
                    url: '{{ route('chat.send') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        if (response.status == 'offline') {
                            userDataChat.message = messageInputChat.value.trim();
                            messageInputChat.value = "";
                            fileUploadWrapperChat.classList.remove("file-uploaded");
                            messageInputChat.dispatchEvent(new Event("input"));

                            const messageContent =
                                `${userDataChat.message ? `<div class="message-text"></div>` : ''}
                                ${userDataChat.file.data ? `<img src="data:${userDataChat.file.mime_type};base64,${userDataChat.file.data}" class="attachment" />` : ""}`;
                            const outgoingMessageDiv = createMessageElementChat(messageContent,
                                "user-message");
                            if (userDataChat.message) {

                                outgoingMessageDiv.querySelector(".message-text").textContent =
                                    userDataChat.message;
                            }
                            chatBodyChat.appendChild(outgoingMessageDiv);
                            console.log("Scroll Height:", chatBodyChat.scrollHeight);
                            chatBodyChat.scrollTo({
                                top: chatBodyChat.scrollHeight,
                                behavior: "smooth"
                            });

                            userDataChat.message = '';

                            userDataChat.file = {
                                file: null,
                                data: '',
                                mime_type: '',
                            };
                            const staffMessage = `<div class="message bot-message">            <img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}" style="border-radius: 50%; border:rgba(0, 0, 0, 0.1) solid;" width="35" height="35" alt="">

                <div class="message-text">${response.message}</div></div>`
                            document.querySelector(".chat-body").insertAdjacentHTML('beforeend',
                                staffMessage);
                        }
                        if (response.status == 'success') {
                            const chatRoomId = response.response.chat_room_id;

                            localStorage.setItem('chatRoomId', chatRoomId);

                            userDataChat.message = messageInputChat.value.trim();
                            messageInputChat.value = "";
                            fileUploadWrapperChat.classList.remove("file-uploaded");
                            messageInputChat.dispatchEvent(new Event("input"));

                            const messageContent =
                                `${userDataChat.message ? `<div class="message-text"></div>` : ''}
                                ${userDataChat.file.data ? `<img src="data:${userDataChat.file.mime_type};base64,${userDataChat.file.data}" class="attachment" />` : ""}`;
                            const outgoingMessageDiv = createMessageElementChat(messageContent,
                                "user-message");
                            if (userDataChat.message) {

                                outgoingMessageDiv.querySelector(".message-text").textContent =
                                    userDataChat.message;
                            }
                            const messageTime = document.createElement("div");
                            messageTime.className = "message-time";
                            messageTime.style.cssText =
                                "font-size: 12px; color: #999; margin-top: 4px;";
                            messageTime.textContent = formatTime(new Date()
                                .toISOString());

                            outgoingMessageDiv.appendChild(messageTime);
                            chatBodyChat.appendChild(outgoingMessageDiv);
                            console.log("Scroll Height:", chatBodyChat.scrollHeight);
                            chatBodyChat.scrollTo({
                                top: chatBodyChat.scrollHeight,
                                behavior: "smooth"
                            });

                            userDataChat.message = '';

                            userDataChat.file = {
                                file: null,
                                data: '',
                                mime_type: '',
                            };
                        }
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            };

            messageInputChat.addEventListener("keydown", (e) => {
                const userMessage = e.target.value.trim();
                if (e.key === "Enter" && userMessage && !e.shiftKey && window.innerHeight > 768) {
                    handleOutgoingMessageChat(e);
                }
            });


            messageInputChat.addEventListener("input", () => {
                messageInputChat.style.height = `${initialInputHeightChat}px`;
                messageInputChat.style.height = `${messageInputChat.scrollHeight}px`;

                document.querySelector(".chat-form").style.borderRadius =
                    messageInputChat.scrollHeight > initialInputHeightChat ? "15px" : "32px";
            });

            fileInputChat.addEventListener("change", () => {
                const file = fileInputChat.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = (e) => {
                    fileUploadWrapperChat.querySelector('img').src = e.target.result;
                    fileUploadWrapperChat.classList.add("file-uploaded");
                    const base64String = e.target.result.split(",")[1];
                    userDataChat.file = {
                        file: file,
                        data: base64String,
                        mime_type: file.type,
                    };
                    fileInputChat.value = "";
                };
                reader.readAsDataURL(file);
            });

            fileCancelButtonChat.addEventListener("click", () => {
                userDataChat.file = {};
                fileUploadWrapperChat.classList.remove("file-uploaded");
            });

            sendMessageButtonChat.addEventListener("click", (e) => handleOutgoingMessageChat(e));
            document.querySelector("#file-upload").addEventListener("click", () => fileInputChat.click());
            chatTogglerChat.addEventListener("click", () => {
                document.body.classList.toggle("show-chat");
                document.body.classList.remove('show-chatbot');
                axios.post('/chat/load-message', {
                        user_id: {{ auth()->id() }}
                    })
                    .then(response => {

                        const messages = response.data.messages;

                        messages.forEach(e => {
                            const isText = e.type === 'text';
                            const isSender = e.sender_id ==
                            {{ auth()->id() }}; // true nếu là tin nhắn của user
                            const time = formatTime(e.created_at);
                            let msgHtml = ``;

                            const messageClass = isSender ? 'user-message' : 'bot-message';
                            const avatarHtml = !isSender ?
                                `<img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}"
                 style="border-radius: 50%; border:rgba(0, 0, 0, 0.1) solid;"
                 width="35" height="35" alt="">` :
                                '';

                            if (isText) {
                                msgHtml = `
            <div class="message ${messageClass}">
                ${avatarHtml}
                <div class="message-text">
                    ${e.message}
                </div>
                <div class="message-time" style="font-size: 12px; color: #999; margin-top: 4px;">
                        ${time}
                    </div>
            </div>`;
                            } else {
                                msgHtml = `
            <div class="message ${messageClass}">
                ${avatarHtml}
                <div>
                    <img src="/storage/${e.message}" class="attachment"
                         style="max-width: 300px; max-height: 300px; object-fit: contain; border-radius: 13px;">

                </div>
                <div class="message-time" style="font-size: 12px; color: #999; margin-top: 4px;">
                        ${time}
                    </div>
            </div>`;
                            }

                            document.querySelector('.chat-body').insertAdjacentHTML('beforeend',
                                msgHtml);
                        });

                    })
                    .catch(error => {
                        console.error('Lỗi khi load tin nhắn:', error);
                    });

            });
            closechatChat.addEventListener("click", () => document.body.classList.remove("show-chat"));

            function formatTime(datetimeStr) {
                const date = new Date(datetimeStr);
                const day = date.getDate().toString().padStart(2, '0');
                const month = (date.getMonth() + 1).toString().padStart(2, '0');
                const year = date.getFullYear();
                const hours = date.getHours().toString().padStart(2, '0');
                const minutes = date.getMinutes().toString().padStart(2, '0');
                return `${day}/${month}/${year} ${hours}:${minutes}`;
            }

        });
    </script>
    <script type="module">
        let hasStartedListening = false;

        function formatTime(datetimeStr) {
            const date = new Date(datetimeStr);
            const day = date.getDate().toString().padStart(2, '0');
            const month = (date.getMonth() + 1).toString().padStart(2, '0');
            const year = date.getFullYear();
            const hours = date.getHours().toString().padStart(2, '0');
            const minutes = date.getMinutes().toString().padStart(2, '0');
            return `${day}/${month}/${year} ${hours}:${minutes}`;
        }

        function waitForChatRoomIdAndListen() {
            const interval = setInterval(() => {
                const chatRoomId = localStorage.getItem('chatRoomId');
                console.log('[Chat] Kiểm tra chatRoomId:', chatRoomId);
                if (chatRoomId && window.Echo && !hasStartedListening) {
                    console.log('[Chat] Bắt đầu lắng nghe:', chatRoomId);

                    window.Echo.private('conversation.' + chatRoomId)
                        .listen('.SendMessage', (e) => {
                            console.log('New message received:', e.message);
                            if (e.message && e.message.sender_id !== {{ auth()->id() }}) {
                                if (e.message.type == 'text') {
                                    const staffMessage = `<div class="message bot-message">
                                    <img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}" style="border-radius: 50%; border:rgba(0, 0, 0, 0.1) solid;" width="35" height="35" alt="">
                                    <div class="message-text">${e.message.message}
                                       </div>
                                         <div class="message-time" style="font-size: 12px; color: #999; margin-top: 4px;">
                                        ${formatTime(e.message.created_at)}
                                    </div>
                                    </div>`
                                    document.querySelector(".chat-body").insertAdjacentHTML('beforeend',
                                        staffMessage);
                                } else {
                                    const staffMessage = `<div class="message bot-message">
                                    <img src="{{ asset('assets/client/img/icon/staff-support.jpg') }}" style="border-radius: 50%; border:rgba(0, 0, 0, 0.1) solid;" width="35" height="35" alt="">
                                    <img src="/storage/${e.message.message}" class="attachment" >
                                    <div class="message-time" style="font-size: 12px; color: #999; margin-top: 4px;">
                                        ${formatTime(e.message.created_at)}
                                    </div>
                                    </div>`
                                    document.querySelector(".chat-body").insertAdjacentHTML('beforeend',
                                        staffMessage);
                                }

                            }
                        });

                    hasStartedListening = true;
                    clearInterval(interval);
                }
            }, 500);
        }
        waitForChatRoomIdAndListen();
    </script>
@endpush
