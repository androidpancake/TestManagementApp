/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {},
        colors: {
            //custom
            'transparent' : 'transparent',
            'current' : 'currentColor',
            'bsi-primary' : '#019B95',
            'bsi-secondary' : '#F5AB2E'
        },
    },
    plugins: [
        require("flowbite/plugin")({
            charts: true,
        })
    ],
    darkMode: 'class',
};
