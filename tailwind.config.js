const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            colors: tailpress.colorMapper(tailpress.theme('settings.color.palette', theme)),
            fontSize: tailpress.fontSizeMapper(tailpress.theme('settings.typography.fontSizes', theme)),
            fontFamily: {
                'serif': ['"Cardo"', ...defaultTheme.fontFamily.serif],
                'zh': ['"Liu Jian Mao Cao"', ...defaultTheme.fontFamily.serif]
            },
            // screens: {
            //     'sm': '672px',
            // }
        },
        // screens: {
        //     'xs': '480px',
        //     'sm': '576px',
        //     'md': '782px',
        //     'lg': tailpress.theme('settings.layout.contentSize', theme),
        //     'xl': tailpress.theme('settings.layout.wideSize', theme),
        //     '2xl': '1440px'
        // }
    },
    plugins: [
        tailpress.tailwind,
        require('@tailwindcss/typography'),
    ]
};
