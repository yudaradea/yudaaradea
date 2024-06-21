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
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],
    darkMode: 'false',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                'font-jakart': ['Plus Jakarta Sans', 'sans-serif'],
            },
            colors: {
                'text-primary': '#111c2d',
            },
        },
        container: {
            padding: {
                DEFAULT: '20px',
                // lg: "50px",
                sm: '2rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '6rem',
            },
            screens: {
                sm: '600px',
                md: '728px',
                lg: '984px',
                xl: '1240px',
                '2xl': '1496px',
            },
            center: true,
        },
    },

    plugins: [forms, typography, require('preline/plugin')],
};
