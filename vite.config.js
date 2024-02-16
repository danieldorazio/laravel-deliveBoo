import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { resolve } from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
       alias: {
        "~resources": "/resources",
        "~bootstrap": resolve(__dirname, "node_modules/bootstrap")
       }     
    }
});
