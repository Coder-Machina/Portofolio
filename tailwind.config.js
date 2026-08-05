module.exports = {
    content: [
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
        './resources/css/**/*.css',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'hk-black':   '#0A0A0F',
                'hk-surface': '#111118',
                'hk-border':  '#1E1E2E',
                'hk-green':   '#00FF88',
                'hk-purple':  '#7B61FF',
                'hk-blue':    '#38BDF8',
                'hk-text':    '#E2E8F0',
                'hk-muted':   '#64748B',
            },
            fontFamily: {
                'sans': ['Inter', 'sans-serif'],
                'mono': ['JetBrains Mono', 'monospace'],
            },
            container: {
                center: true,
                padding: '1rem',
            },
            borderRadius: {
                'xl': '1rem',
            },
            boxShadow: {
                card: '0 8px 30px rgba(2,6,23,0.6)',
            },
            maxWidth: {
                content: '72rem',
            },
        }
    },
    plugins: [],
};
