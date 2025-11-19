import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/style.css',
                'resources/css/catalog_style.css',
                'resources/css/catalog_detail_style.css',
                'resources/js/filtersMobile.js',
                'resources/js/arrowsImgArticles.js',
                'resources/css/edit_article_style.css',
                'resources/js/edit_article_script.js',
                'resources/css/publish_style.css',
                'resources/js/publish_script.js',
                'resources/css/payment_process_style.css',
                'resources/js/payment_process_script.js',
                'resources/css/general_details_style.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
