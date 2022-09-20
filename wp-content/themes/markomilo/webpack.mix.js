let mix = require('laravel-mix');

const themePath = '.';

mix.setPublicPath('assets');

mix.ts('src/ts/main.ts', 'js').sass('src/scss/style.scss', 'css');

mix.browserSync({
    proxy: 'http://markomilo.local',
    open: true,
    host: 'localhost:3000',
    files: [
        `${themePath}/**/*.php`,
        `${themePath}/**/*.js`,
        `${themePath}/**/*.css`,
    ],
});

mix.webpackConfig({
    devServer: {
        proxy: {
            '*': 'http://markomilo.local',
        },
    },
});
