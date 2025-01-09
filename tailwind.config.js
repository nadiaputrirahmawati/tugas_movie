import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primaryy: '#5FB8EA',
                secondaryy: '#c9e5f9',
                primary: '#C5D3E8',
                secondary: '#A6AEBF',
            }
        },
    },
    plugins: [
        require("daisyui"),
        // require('@tailwindcss/line-clamp'),
    ],
    daisyui: {
        themes: ["light", "dark", "cupcake",  "nord",], // Tema bawaan DaisyUI
    },
};
