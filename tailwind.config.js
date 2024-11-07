/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        fontFamily: {
            display: ["Nunito Sans"],
            header: ["Maven Pro"],
        },
        extend: {
            colors: {
                "custom-dark": "#101010",
                "custom-mocca-light": "#a49982",
                "custom-mocca-dark": "#7e7259",
            },
        },
    },
    plugins: [
        require("flowbite/plugin")({
            datatables: true,
        }),
    ],
};

