var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
var themeToggleBtn = document.getElementById('theme-toggle');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.add('hidden');
} else {
    themeToggleDarkIcon.classList.add('hidden');
}

function toggleDarkMode(){
    document.documentElement.classList.toggle('dark');

    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    localStorage.setItem('color-theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');

}

themeToggleBtn.addEventListener('click', toggleDarkMode) 


document.addEventListener('DOMContentLoaded', function () {
    if (localStorage.getItem('color-theme') === 'dark') {
        document.documentElement.classList.add('dark');
        themeToggleDarkIcon.classList.add('hidden');
        themeToggleLightIcon.classList.remove('hidden');
    }
});
