import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js','resources/css/style.css', 'resources/css/catalog_style.css',
            'resources/css/catalog_detail_style.css', "resources/js/filtersMobile.js", "resources/js/arrowsImgArticles.js"],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
