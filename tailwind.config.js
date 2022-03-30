const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './safelist.txt',
    ],

    theme: {
        extend: {
            container: {
                padding: {
                    DEFAULT: '0rem',
                    sm: '1rem',
                    lg: '1.5rem',
                    xl: '4rem',
                    '2xl': '6rem',
                },
            },
            fontSize: {
                'sm-xs': [
                    '0.8rem',
                    {
                        lineHeight: '1.15rem',
                    },
                ],
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require('tailwind-safelist-generator')({
            patterns: [
                'bg-{colors}',
                'text-{colors}',
                'ring-{colors}',
                'hover:ring-{colors}',
            ],
        }),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
    ],
}
