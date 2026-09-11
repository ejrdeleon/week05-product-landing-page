/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'so': {
                    'bg':       '#0A0D0B',
                    'surface':  '#111613',
                    'surface2': '#171D19',
                    'accent':   '#9AF06A',
                    'accent2':  '#D9F7C0',
                    'text':     '#F5F7F2',
                    'muted':    '#9CA69D',
                },
            },
            fontFamily: {
                sans: [
                    'Instrument Sans',
                    'ui-sans-serif',
                    'system-ui',
                    'sans-serif',
                    'Apple Color Emoji',
                    'Segoe UI Emoji',
                    'Segoe UI Symbol',
                    'Noto Color Emoji',
                ],
            },
            animation: {
                'fade-up':    'fadeUp 0.6s ease-out both',
                'fade-in':    'fadeIn 0.5s ease-out both',
                'pulse-glow': 'pulseGlow 3s ease-in-out infinite',
            },
            keyframes: {
                fadeUp: {
                    '0%':   { opacity: '0', transform: 'translateY(24px)' },
                    '100%': { opacity: '1', transform: 'translateY(0)' },
                },
                fadeIn: {
                    '0%':   { opacity: '0' },
                    '100%': { opacity: '1' },
                },
                pulseGlow: {
                    '0%, 100%': { opacity: '0.3' },
                    '50%':      { opacity: '0.7' },
                },
            },
        },
    },
    plugins: [],
};
