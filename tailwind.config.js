const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            zIndex: {
                '-10': '-10',
            },
            maxHeight: {

                '0': '0',
         
                '1/4': '25%',

                '1/2': '50%',
         
                '3/4': '75%',
         
                'full': '100%',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            textColor: ['active'],
            translate: ['group-hover'],
            position: ['group-hover'],
            borderWidth: ['group-hover', 'hover'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
