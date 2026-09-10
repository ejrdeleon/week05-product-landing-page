/**
 * PostCSS Configuration
 *
 * Note: Tailwind CSS v4 is handled via the @tailwindcss/vite plugin
 * in vite.config.js — not via PostCSS. Only autoprefixer is needed here.
 */
export default {
    plugins: {
        autoprefixer: {},
    },
};
