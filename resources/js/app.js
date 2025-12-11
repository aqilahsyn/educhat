document.addEventListener('DOMContentLoaded', () => {
    const html   = document.documentElement;
    const toggle = document.getElementById('darkModeToggle');

    console.log('APP.JS LOADED');

    // ----- DARK MODE (punyamu sendiri) -----
    const saved = localStorage.getItem('theme');
    if (saved === 'dark') {
        html.classList.add('dark');
    } else if (saved === 'light') {
        html.classList.remove('dark');
    }
    if (toggle) {
        console.log('DARK BUTTON FOUND:', toggle);
        toggle.addEventListener('click', () => {
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    }

    // ----- TOGGLE RIGHT SIDEBAR -----
    const infoToggleBtn = document.getElementById('infoToggleBtn');
    const infoPanel     = document.getElementById('cloInfoPanel');

    console.log('INFO BTN:', infoToggleBtn);
    console.log('INFO PANEL:', infoPanel);

    if (infoToggleBtn && infoPanel) {
        infoToggleBtn.addEventListener('click', () => {
            const isHidden = infoPanel.classList.contains('hidden');

            if (isHidden) {
                // TAMPILKAN
                infoPanel.classList.remove('hidden');
                infoPanel.classList.add('flex', 'flex-col'); // supaya mirip mockup
            } else {
                // SEMBUNYIKAN
                infoPanel.classList.add('hidden');
                infoPanel.classList.remove('flex', 'flex-col');
            }

            console.log('TOGGLE PANEL. Now hidden?', infoPanel.classList.contains('hidden'));
        });
    }
});
