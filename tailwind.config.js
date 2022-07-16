const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                transparent: 'transparent',
                current: 'currentColor',
                
                'purple': '#3f3cbb',
                'midnight': '#121063',
                'metal': '#565584',
                'tahiti': '#3ab7bf',
                'silver': '#ecebff',
                'bubble-gum': '#ff77e9',
                'bermuda': '#78dcca',
                'tephone': '#9747FF',
                'logout':'5986DE',
                'black_': '#090410',
                'logout_': '#5986DE',
                'mail_': '#77CDAE',
                'notification': '#FFCB6B',
                'profile_': '#FFCB6B',
                'setting_': '#FFCB6B',
                'chat_': '#EA7E7E',
              },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
       
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
    ...(process.env.NODE_ENV === 'production' ? { cssnano: {} } : {}),
};
