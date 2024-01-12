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
            transparent: "transparent",
            current: "currentColor",
            "bsi-primary": "#179d97",
            "bsi-secondary": "#F6AD3C",
        },
    },
    plugins: [
        require("flowbite/plugin")({
            charts: true,
        }),
    ],
    darkMode: "class",
};
