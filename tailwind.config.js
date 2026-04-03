/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                primary: "#254D3C",
                secondary: "#63B769",
            },
            fontFamily: {
                sans: ['"DM Sans"', "sans-serif"],
                serif: ['"DM Serif Display"', "serif"],
            },
        },
    },
    plugins: [],
};
