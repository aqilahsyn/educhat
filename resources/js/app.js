import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const html   = document.documentElement;
    const toggle = document.getElementById('darkModeToggle');

    const saved = localStorage.getItem('theme');
    if (saved === 'dark') html.classList.add('dark');
    if (saved === 'light') html.classList.remove('dark');

    if (toggle) {
        toggle.addEventListener('click', () => {
            const isDark = html.classList.toggle('dark');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
        });
    }
});
