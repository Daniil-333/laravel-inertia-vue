import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { watch } from 'vite-plugin-watch';
import tailwindcss from '@tailwindcss/vite'
import * as path from "node:path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                }
            }
        }),
        tailwindcss(),
        // автогенерация объявлений маршрутов
        watch({
            pattern: 'routes/*.php',
            command: 'php artisan trail:generate',
        }),
        // автогенерация типов данных
        watch({
            pattern: 'app/{Data,Enums}/**/*.php',
            command: 'php artisan typescript:transform --format',
        }),
    ],
    server: {
        host: '127.0.0.1',
        port: 5173,
        strictPort: true,
    },
    cors: {
        origin: /https?:\/\/([A-Za-z0-9\-.]+)?(\.loc)(?::\d+)?$/,
    },
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
            vue: 'vue/dist/vue.esm-bundler.js',
        }
    },
    esbuild: {
        tsconfigRaw: {
            compilerOptions: {
                experimentalDecorators: true,
            },
        },
    },
});
