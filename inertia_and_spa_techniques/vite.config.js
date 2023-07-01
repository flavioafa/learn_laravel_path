import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin'
import DefineOptions from 'unplugin-vue-define-options/vite'
import path from 'path'

export default defineConfig({
    resolve: {
        alias: {
            '@': path.resolve('resources/js')
        }
    },
    plugins: [
        vue(),
        DefineOptions(),
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true
        })
    ]
})
