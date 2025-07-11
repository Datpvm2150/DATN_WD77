<div id="ct-chatbox" class="position-fixed bottom-0 end-0 m-3" style="width: 320px; z-index: 1050;">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white p-2">
      💬 Chat với CT‑Bot
    </div>
    <div id="ct-messages" class="card-body" style="max-height: 300px; overflow-y: auto; font-size: 0.9rem;"></div>
    <div class="card-footer p-2">
      <form id="ct-form" class="d-flex gap-1">
        <input id="ct-input" class="form-control form-control-sm" placeholder="Hỏi sản phẩm..." autocomplete="off">
        <button class="btn btn-sm btn-primary">Gửi</button>
      </form>
    </div>
  </div>
</div>
@push('scripts')
<script>
(function () {
  const form = document.getElementById('ct-form');
  const input = document.getElementById('ct-input');
  const box = document.getElementById('ct-messages');

  let sessionId = localStorage.getItem('ct_session_id');

  const append = (sender, html) => {
    box.insertAdjacentHTML('beforeend', `<div class="mb-1"><strong>${sender}:</strong> ${html}</div>`);
    box.scrollTop = box.scrollHeight;
  };

  // ✅ Tải lịch sử nếu có sessionId
  if (sessionId) {
    fetch(`/chatbot/history/${sessionId}`)
      .then(r => r.json())
      .then(messages => {
        messages.forEach(m => {
          append(m.role === 'assistant' ? 'Bot' : 'Bạn', m.content);
        });
      });
  }

  form.addEventListener('submit', e => {
    e.preventDefault();
    const text = input.value.trim();
    if (!text) return;

    append('Bạn', text);
    input.value = '';

    const loadingId = 'bot-typing-' + Date.now();
    append('Bot', `<span id="${loadingId}">Đang gõ...</span>`);

    fetch('/chatbot/gpt', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
      },
      body: JSON.stringify({
        q: text,
        session_id: sessionId
      })
    })
    .then(r => r.json())
    .then(data => {
      document.getElementById(loadingId)?.remove();

      // ✅ Lưu lại session_id mới nếu có
      if (data.session_id) {
        sessionId = data.session_id;
        localStorage.setItem('ct_session_id', sessionId);
      }

      let reply = '';
      if (data.products && data.products.length > 0) {
        reply = `<div>${data.message}</div>`;
        data.products.forEach(p => {
          reply += `🔹 <a href="${p.link}" target="_blank">${p.name}</a> – ${p.price}<br>`;
        });
      } else {
        reply = data.message || 'Không tìm thấy phản hồi.';
      }

      append('Bot', reply);
    })
    .catch(() => {
      document.getElementById(loadingId)?.remove();
      append('Bot', 'Xin lỗi, có lỗi xảy ra. 😢');
    });
  });
})();
</script>
@endpush
