import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors:{
                'customGray' : '#F1F1F1',
                'customRed' : '#F0394F',
                'customBlack' : '#323232',
				'communitiesCustomGray' : '#535353',
				'communitiesCustomNamesGray' : '#313131',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
            animation: {
                sideways: "sideways 3s linear infinite",
            },
            keyframes: {
                sideways: {
                    "0%, 100%": { left: "0", top: "0" },
                    "50%": { left: "100px", top: "0" },
                },
            },
        },
    },

    plugins: [require('tailwindcss-animated'),forms, typography],
};
