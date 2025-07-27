@extends('layouts.admin')

@section('css')
    <style>
        .chat-box {
        display: flex;
        height: 80vh;
        border: 1px solid #ccc;
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar-chat {
        width: 250px;
        border-right: 1px solid #ccc;
        background: #f5f5f5;
        overflow-y: auto;
    }

    .sidebar-chat ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .sidebar-chat li {
        padding: 15px;
        border-bottom: 1px solid #e0e0e0;
        cursor: pointer;
    }

    .sidebar-chat li:hover {
        background-color: #eaeaea;
    }

    .chat-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #e5ddd5;
    }

    .messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .message {
        max-width: 60%;
        padding: 10px 14px;
        border-radius: 18px;
        font-size: 14px;
        line-height: 1.4;
        display: inline-block;
        position: relative;
    }

    .message-sent {
        align-self: flex-end;
        background-color: #0084ff;
        color: white;
        border-bottom-right-radius: 4px;
    }

    .message-received {
        align-self: flex-start;
        background-color: #f1f0f0;
        color: black;
        border-bottom-left-radius: 4px;
    }

    .input-area {
        display: flex;
        padding: 10px;
        background: #fff;
        border-top: 1px solid #ccc;
    }

    .input-area input {
        flex: 1;
        padding: 10px;
        font-size: 15px;
        border: 1px solid #ccc;
        border-radius: 20px;
        margin-right: 10px;
    }

    .input-area button {
        padding: 10px 20px;
        border: none;
        background-color: #0084ff;
        color: white;
        border-radius: 20px;
        cursor: pointer;
    }

    .input-area button:hover {
        background-color: #006fd6;
    }
    </style>
@endsection

@section('content')
    <div class="chat-box">
        <div class="sidebar-chat">
            <ul id="chatRoomList">
                @foreach ($chatRooms as $room)
                    <li onclick="selectRoom({{ $room->id }}, '{{ $room->customer->ten }}')">{{ $room->customer->email }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="chat-area">
            <div class="messages" id="messages"></div>
            <div class="input-area">
                <input type="text" id="messageInput" placeholder="Nhập tin nhắn..." onkeydown="handleKeyPress(event)">
                <button onclick="sendMessage()">Gửi</button>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        let currentRoomId = null;

        function selectRoom(id, name) {
            currentRoomId = id;
            document.getElementById('messages').innerHTML = '';
            fetchMessages(id);

            // Cập nhật localStorage và bắt đầu lắng nghe
            localStorage.setItem('chatRoomId', id);
            if (typeof listenToRoom === 'function') {
                listenToRoom(id);
            }
        }


        function fetchMessages(roomId) {
            $.ajax({
                url: `/admin/chat/${roomId}/messages`,
                method: 'GET',
                success: function(data) {
                    const chatRoomId = data.chatRoom.id;

                    localStorage.setItem('chatRoomId', chatRoomId);

                    const container = document.getElementById('messages');
                    container.innerHTML = ''; // Clear previous messages
                    data.messages.forEach(message => {
                        const div = document.createElement('div');
                        if (message.sender_id === {{ auth()->id() }}) {
                            div.textContent = `Bạn: ${message.message}`;
                            div.className = 'message message-sent';
                        } else {
                            div.textContent = `Customer: ${message.message}`;
                            div.className = 'message message-received';
                        }
                        container.appendChild(div);
                    });
                    container.scrollTop = container.scrollHeight;
                },
                error: function() {
                    alert('Không thể tải tin nhắn.');
                }
            });
        }

        function sendMessage() {
            const input = document.getElementById('messageInput');
            const message = input.value.trim();
            if (!message || !currentRoomId) return;

            fetch(`/admin/chat/${currentRoomId}/send`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        message: message
                    })
                })
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('messages');
                    const div = document.createElement('div');
                    div.textContent = `Bạn: ${message}`;
                    div.className = 'message message-sent';
                    container.appendChild(div);
                    input.value = '';
                    container.scrollTop = container.scrollHeight;
                });
        }

        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        }
    </script>
    <script type="module">
        let currentChannel = null;

        function listenToRoom(roomId) {
            // Nếu đang nghe channel cũ, rời khỏi nó
            if (currentChannel) {
                window.Echo.leave(currentChannel);
            }

            const channelName = `conversation.${roomId}`;
            currentChannel = channelName;

            console.log(`[Chat] Lắng nghe room: ${channelName}`);

            window.Echo.private(channelName)
                .listen('.SendMessage', (e) => {
                    console.log('[Chat] Tin nhắn mới:',  e.message.sender_id !== {{ auth()->id()}});

                    if (e.message && e.message.sender_id !== {{ auth()->id() }}) {

                        const messages = document.getElementById('messages');
                        const message = document.createElement('div');
                        message.textContent = `Customer: ${e.message.message}`;
                        message.className = 'message message-received';
                        messages.appendChild(message);
                        messages.scrollTop = messages.scrollHeight;
                    }
                });
        }

        window.listenToRoom = listenToRoom; // Để gọi được từ script thường
    </script>
@endsection
