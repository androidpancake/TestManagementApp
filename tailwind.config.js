/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/**/*.css",
        "./node_modules/flowbite/**/*.js",
        "./node_modules/apexcharts/**/*.js",
    ],
    theme: {
        extend: {},
        colors: {
            //custom
            transparent: "transparent",
            current: "currentColor",
            "bsi-primary": "#179d97",
            "bsi-secondary": "#F6AD3C",
        },
    },
    darkMode: "class",
};
