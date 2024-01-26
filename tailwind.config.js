import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                roboto: 'Roboto',
                robotoC: 'Roboto Condensed',
                salsa: 'Salsa',
                abril: 'Abril Fatface',
                oswald: 'Oswald',
            },
            colors: {
                'polynesian-blue': '#044389ff',
                'icterina': '#fcff4bff',
                'orange-web': '#ffad05ff',
                'carolina-blue': '#7cafc4ff'
            }
        },
    },

    plugins: [forms],
};
