<style>
    #chat-toggle {
        position: fixed;
        bottom: 90px;
        right: 20px;
        background: #007bff;
        color: white;
        padding: 10px 15px;
        border-radius: 20px;
        cursor: pointer;
        z-index: 1000;
    }

    #chat-box {
        position: fixed;
        bottom: 150px;
        right: 20px;
        width: 300px;
        background: white;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        display: none;
        flex-direction: column;
        z-index: 1001;
    }

    .chat-header {
        background: #007bff;
        color: white;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chat-body {
        padding: 10px;
        height: 200px;
        overflow-y: auto;
        background: #f9f9f9;
    }

    .chat-footer {
        display: flex;
        border-top: 1px solid #ccc;
    }

    .chat-footer input {
        flex: 1;
        border: none;
        padding: 10px;
    }

    .chat-footer button {
        background: #007bff;
        color: white;
        border: none;
        padding: 10px 15px;
        cursor: pointer;
    }

    .close-btn {
        cursor: pointer;
        font-size: 18px;
    }

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
</style>

<!-- Chat Toggle Button -->
<div id="chat-toggle" onclick="toggleChatBox()">💬 Hỏi nhanh</div>

<!-- Chat Box -->
<div id="chat-box">
    <div class="chat-header">
        Chat hỗ trợ
        <span onclick="toggleChatBox()" class="close-btn">&times;</span>
    </div>
    <div class="chat-body" id="chat-messages">
        <!-- Tin nhắn sẽ hiện ở đây -->
    </div>
    <div class="chat-footer">
        <input type="text" id="chat-input" placeholder="Nhập tin..." onkeydown="handleKeyPress(event)">
        <button onclick="sendMessage()">Gửi</button>
    </div>
</div>

@push('scripts')
    <script>
        function toggleChatBox() {
            const chatBox = document.getElementById('chat-box');
            chatBox.style.display = chatBox.style.display === 'flex' ? 'none' : 'flex';
        }

        function sendMessage() {
            const input = document.getElementById('chat-input');
            const messages = document.getElementById('chat-messages');

            if (input.value.trim() === '') return;

            $.ajax({
                url: '{{ route('chat.send') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                method: 'POST',
                data: {
                    message: input.value,
                },
                success: function(response) {

                    const message = document.createElement('div');
                    message.textContent = "Bạn: " + input.value;
                    message.className = 'message message-sent';
                    messages.appendChild(message);

                    const chatRoomId = response.response.chat_room_id;

                    localStorage.setItem('chatRoomId', chatRoomId);


                    input.value = '';
                    messages.scrollTop = messages.scrollHeight;
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        }
    </script>

    <script type="module">
        console.log(window.Echo);

        let hasStartedListening = false;

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
                                const messages = document.getElementById('chat-messages');
                                const message = document.createElement('div');
                                message.className = 'message message-received';
                                message.textContent = "Staff: " + e.message.message;
                                messages.appendChild(message);
                                messages.scrollTop = messages.scrollHeight;
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
