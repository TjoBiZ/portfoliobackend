import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#ffffff', // Общий цвет текста для светлой темы
                'background': '#111827', // Общий фон для темной темы
                'text': '#d1d5db', // Цвет текста для темной темы
            },
        },
    },

    darkMode: 'class', // 'media' или 'class', здесь мы выбрали 'class' для ручного переключения

    plugins: [forms],

    variants: {
        extend: {
            backgroundColor: ['dark'], // Поддержка backgroundColor для темной темы
            textColor: ['dark'], // Поддержка textColor для темной темы
            borderColor: ['dark'], // Поддержка borderColor для темной темы
        },
    },
};

