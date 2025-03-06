import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    const config = {
        plugins: [
            laravel({
                input: [
                    'resources/css/app.css',
                    'resources/js/app.js',
                ],
                refresh: true,
            }),
        ],
        build: {
            outDir: 'public/build',
            assetsDir: '',
            manifest: true
        }
    };
    
    if (mode === 'production') {
        config.base = '/';
    } else {
        config.server = {
            host: '0.0.0.0',
            port: 5173
        };
    }
    
    return config;
});