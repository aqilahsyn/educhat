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
