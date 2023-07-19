import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/sass/app.scss',
                // CSS
                'resources/css/app.css',
                'resources/css/record.css',
                'resources/css/execute.css',
                // JS
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/record.js',
                'resources/js/execute.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
