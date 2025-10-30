import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/filament/bakalcalon/bakal-calon.css',
                'resources/css/filament/panitia/panitia.css',
                'vendor/resma/filament-awin-theme/resources/css/theme.css',
                'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
