document.addEventListener('DOMContentLoaded', () => {
  const html = document.documentElement;

  console.log('APP.JS LOADED');

  // ----- DARK MODE -----
  const toggle = document.getElementById('darkModeToggle');
  const saved = localStorage.getItem('theme');

  if (saved === 'dark') html.classList.add('dark');
  else if (saved === 'light') html.classList.remove('dark');

  if (toggle) {
    console.log('DARK BUTTON FOUND:', toggle);
    toggle.addEventListener('click', () => {
      const isDark = html.classList.toggle('dark');
      localStorage.setItem('theme', isDark ? 'dark' : 'light');
    });
  }

  // ----- TOGGLE RIGHT SIDEBAR -----
  const infoToggleBtn = document.getElementById('infoToggleBtn');
  const infoPanel = document.getElementById('cloInfoPanel');

  console.log('INFO BTN:', infoToggleBtn);
  console.log('INFO PANEL:', infoPanel);

  if (infoToggleBtn && infoPanel) {
    infoToggleBtn.addEventListener('click', () => {
      const isHidden = infoPanel.classList.contains('hidden');

      if (isHidden) {
        infoPanel.classList.remove('hidden');
        infoPanel.classList.add('flex', 'flex-col');
      } else {
        infoPanel.classList.add('hidden');
        infoPanel.classList.remove('flex', 'flex-col');
      }

      console.log('TOGGLE PANEL. Now hidden?', infoPanel.classList.contains('hidden'));
    });
  }

  // ----- PROFILE POPUP -----
  const btn = document.getElementById("profileBtn");
  const popup = document.getElementById("profilePopup");
  const overlay = document.getElementById("profileOverlay");

  console.log('PROFILE BTN:', btn);
  console.log('PROFILE POPUP:', popup);
  console.log('PROFILE OVERLAY:', overlay);

  if (!btn || !popup || !overlay) return;

  const open = () => {
    popup.classList.remove("hidden");
    overlay.classList.remove("hidden");
  };

  const close = () => {
    popup.classList.add("hidden");
    overlay.classList.add("hidden");
  };

  const isOpen = () => !popup.classList.contains("hidden");

  btn.addEventListener("click", (e) => {
    e.stopPropagation();
    isOpen() ? close() : open();
  });

  overlay.addEventListener("click", close);

  document.addEventListener("click", (e) => {
    if (!isOpen()) return;
    if (popup.contains(e.target) || btn.contains(e.target)) return;
    close();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") close();
  });
});

document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("chatInput");
    const sendBtn = document.getElementById("sendBtn");
    const messages = document.getElementById("chatMessages");

    function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        // User bubble
        messages.innerHTML += `
            <div class="flex items-start justify-end gap-3">
                <div class="max-w-xl rounded-2xl bg-[#B8352E] text-white shadow-sm px-4 py-3 text-sm">
                    <p>${text}</p>
                </div>
                <div class="w-9 h-9 rounded-full bg-slate-300 flex items-center justify-center text-xs font-semibold">
                    U
                </div>
            </div>
        `;

        input.value = "";
        messages.scrollTop = messages.scrollHeight;

        // Dummy bot reply
        setTimeout(() => {
            messages.innerHTML += `
                <div class="flex items-start gap-3">
                    <div class="w-9 h-9 rounded-full bg-[#B8352E] flex items-center justify-center text-white text-sm">
                        🤖
                    </div>
                    <div class="max-w-xl rounded-2xl bg-white dark:bg-slate-900 shadow-sm px-4 py-3 text-sm text-slate-800 dark:text-slate-100">
                        <p><span class="font-semibold">EduChat:</span> Nanti chatbot akan menjawab, sekarang belum terhubung ke backend :)... SEMANGAT KHANSA </p>
                    </div>
                </div>
            `;
            messages.scrollTop = messages.scrollHeight;
        }, 500);
    }

    // ENTER = send, SHIFT+ENTER = newline
    input.addEventListener("keydown", function (e) {
        if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    sendBtn?.addEventListener("click", sendMessage);
});

document.querySelectorAll(".suggest-msg").forEach(btn => {
    btn.addEventListener("click", () => {
        const text = btn.innerText.trim();
        if (!text) return;

        // Set ke input
        document.getElementById("chatInput").value = text;

        // Trigger sendMessage()
        const sendEvent = new KeyboardEvent("keydown", {
            key: "Enter",
            shiftKey: false
        });

        document.getElementById("chatInput").dispatchEvent(sendEvent);
    });
});
