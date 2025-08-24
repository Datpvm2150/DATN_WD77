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

        .room-selected {
            background-color: #bdbfc1;
        }




        .input-area {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
        }

        .image-upload-wrapper {
            position: relative;
            width: 40px;
            height: 40px;
            flex-shrink: 0;
        }

        .upload-icon {
            cursor: pointer;
            font-size: 22px;
            color: #555;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px;
            display: block;
        }

        .remove-image {
            position: absolute;
            top: -6px;
            right: -6px;
            background: red;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            text-align: center;
            line-height: 17px;
            font-size: 13px;
            cursor: pointer;
            display: none;
        }

        .image-upload-wrapper:hover .remove-image {
            display: block;
        }

        .message-time {
            font-size: 12px;
            color: #999;
            margin-top: 4px;
        }
    </style>
@endsection

@section('content')
    <div class="chat-box">
        <div class="sidebar-chat">
            <ul id="chatRoomList">
                @foreach ($chatRooms as $room)
                    <li id="room-{{ $room->id }}"
                        onclick="selectRoom({{ $room->id }}, '{{ $room->customer->email }}')">
                        {{ $room->customer->email }}
                        <span class="unread-badge"
                            style="display: {{ $room->unread_count ? 'inline-block' : 'none' }}; background:red; border-radius:50%; padding:3px 6px; color:white; font-size:12px;">
                            {{ $room->unread_count }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="chat-area">
            <div class="messages" id="messages"></div>

            <div class="input-area">
                <div id="imageUploadWrapper" class="image-upload-wrapper">
                    <label for="imageUpload" class="upload-icon" id="imageIconLabel" title="Tải ảnh lên">
                        <i class="fas fa-image"></i>
                    </label>
                    <img id="imagePreview" class="preview-image" src="" alt="Preview" style="display: none;">
                    <span class="remove-image" onclick="removeImage()" title="Xoá ảnh">×</span>
                    <input type="file" id="imageUpload" accept="image/*" style="display: none"
                        onchange="handleImageUpload(this)">
                </div>

                <input type="text" id="messageInput" placeholder="Nhập tin nhắn..." onkeydown="handleKeyPress(event)">
                <button onclick="sendMessage()">Gửi</button>
            </div>
        </div>


    </div>
@endsection


@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const savedRoomId = localStorage.getItem('chatRoomId');
            if (savedRoomId && document.getElementById(`room-${savedRoomId}`)) {
                selectRoom(parseInt(savedRoomId));
            }
        });
    </script>

    <script>
        let currentRoomId = null;

        function selectRoom(id, name) {
            currentRoomId = id;
            document.getElementById('messages').innerHTML = ''; //Xóa nội dung messages
            fetchMessages(id);//load tin nhắn cũ
            document.querySelectorAll('li[id^="room-"]').forEach(el => {
                el.classList.remove('room-selected');
            });

            document.getElementById(`room-${currentRoomId}`).classList.add('room-selected');
// đánh dấu tin nhắn đã đọc và update badge
            axios.post('/admin/chat-rooms/' + currentRoomId + '/mark-read')
                .then(response => {
                    const badge = document.querySelector(`#room-${currentRoomId} .unread-badge`);
                    if (badge) {
                        badge.textContent = '';
                        badge.style.display = 'none';
                    }
                    const totalBadge = document.querySelector('#total-unread-badge');
                    if (totalBadge) {
                        const unreadCount = response.data.unread_count;
                        totalBadge.textContent = unreadCount > 0 ? unreadCount : '';
                        totalBadge.style.display = unreadCount > 0 ? 'inline-block' : 'none';
                    }
                });
            localStorage.setItem('localStorage', id); //lưu localStorage vào localStorage
            if (typeof listenToRoom === 'function') {
                listenToRoom(id); //Gọi listenToRoom(id) để bắt realtime event cho phòng đó.
            }
        }

        function formatTime(datetimeStr) {
            const d = new Date(datetimeStr);
            const day = String(d.getDate()).padStart(2, '0');
            const month = String(d.getMonth() + 1).padStart(2, '0'); // Tháng bắt đầu từ 0
            const year = d.getFullYear();
            const hours = String(d.getHours()).padStart(2, '0');
            const minutes = String(d.getMinutes()).padStart(2, '0');
            return `${day}/${month}/${year} ${hours}:${minutes}`;
        }



        function fetchMessages(roomId) {
            $.ajax({
                url: `/admin/chat/${roomId}/messages`,
                method: 'GET',
                success: function(data) {
                    const chatRoomId = data.chatRoom.id;

                    localStorage.setItem('chatRoomId', chatRoomId);

                    const container = document.getElementById('messages');
                    container.innerHTML = '';
                    data.messages.forEach(message => {
                        const isSender = message.sender_id === {{ auth()->id() }};
                        const isText = message.type === 'text';
                        const time = formatTime(message.created_at);

                        const div = document.createElement('div');
                        div.className =
                            `message ${isSender ? 'message-sent' : 'message-received'} ${isText ? '' : 'p-0'}`;
                        if (!isText) {
                            div.style.backgroundColor = 'transparent';
                        }

                        let content = '';

                        if (isText) {
                            content = `<div>${isSender ? 'Bạn' : 'Customer'}: ${message.message}</div>`;
                        } else {
                            content = `
                                <img src="/storage/${message.message}"
                                    style="max-width: 300px; max-height: 300px; object-fit: contain; border-radius: 13px;" />
                            `;
                        }

                        content += `<div class="message-time">${time}</div>`;
                        div.innerHTML = content;
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

            if (!message && !selectedImageFile) return;

            const formData = new FormData();
            formData.append('message', message);
            if (selectedImageFile) {
                formData.append('image', selectedImageFile);
            }

            fetch(`/admin/chat/${currentRoomId}/send`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('messages');

                    data.messages.forEach((msg) => {
                        const div = document.createElement('div');
                        div.className = `message message-sent ${(msg.type === 'file') ? 'p-0' : ''}`;

                        if (msg.type === 'text') {
                            div.innerHTML = `<div>Bạn: ${msg.message}</div>`;
                        }

                        if (msg.type === 'file') {
                            div.style.backgroundColor = 'transparent';
                            div.innerHTML = `
                            <img src="/storage/${msg.message}"
                                class="sent-image"
                                style="max-width: 300px; max-height: 300px; object-fit: contain; border-radius: 13px;" />
                                    `;
                        }

                        div.innerHTML += `<div class="message-time">${formatTime(msg.created_at)}</div>`;
                        container.appendChild(div);
                    });

                    input.value = '';
                    removeImage();
                    container.scrollTop = container.scrollHeight;
                });
        }


        function handleKeyPress(event) {
            if (event.key === 'Enter') {
                sendMessage();
            }
        }

        let selectedImageFile = null;

        function handleImageUpload(input) {
            const file = input.files[0];
            if (file && file.type.startsWith("image/")) {
                selectedImageFile = file;

                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                    document.getElementById('imageIconLabel').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            selectedImageFile = null;
            document.getElementById('imageUpload').value = '';
            document.getElementById('imagePreview').style.display = 'none';
            document.getElementById('imageIconLabel').style.display = 'flex';
        }
    </script>


    <script type="module">
        let currentChannel = null;

        function listenToRoom(roomId) {
            if (currentChannel) {
                window.Echo.leave(currentChannel);
            }

            const channelName = `conversation.${roomId}`;
            currentChannel = channelName;

            console.log(`[Chat] Lắng nghe room: ${channelName}`);

            window.Echo.private(channelName)
                .listen('.SendMessage', (e) => {
                    console.log('[Chat] Tin nhắn mới:', e.message);
                    const currentUserId = {{ auth()->id() }};

                    if (e.message && e.message.sender_id !== currentUserId) {
                        axios.post('/admin/chat-rooms/' + e.message.chat_room_id + '/mark-read')
                            .then(response => {
                                const badge = document.querySelector(`#room-${currentRoomId} .unread-badge`);
                                if (badge) {
                                    badge.textContent = '';
                                    badge.style.display = 'none';
                                }
                            });



                        const isText = e.message.type === 'text';
                        const div = document.createElement('div');
                        div.className = `message message-received ${isText ? '' : 'p-0'}`;
                        if (!isText) div.style.backgroundColor = 'transparent';

                        let content = '';

                        if (isText) {
                            content = `<div>Customer: ${e.message.message}</div>`;
                        } else {
                            content = `
                                <img src="/storage/${e.message.message}"
                                    style="max-width: 300px; max-height: 300px; object-fit: contain; border-radius: 13px;" />
                            `;
                        }

                        content += `<div class="message-time">${formatTime(e.message.created_at)}</div>`;
                        div.innerHTML = content;
                        messages.appendChild(div);

                        messages.scrollTop = messages.scrollHeight;
                    }
                });
        }

        window.listenToRoom = listenToRoom;
    </script>
@endsection
