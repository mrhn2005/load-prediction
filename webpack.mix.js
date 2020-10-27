const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 //Laravel
mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
    ])
    .webpackConfig(require('./webpack.config'));

//Panel
mix.scripts([
    'resources/panel/scripts/main.js',
    'resources/panel/scripts/custom.js',
], 'public/panel/assets/scripts/main.js');

mix.styles([
    'resources/panel/styles/main.css',
], 'public/panel/main.css');

mix.copyDirectory('resources/panel/fonts', 'public/panel/assets/fonts');

mix.copyDirectory('resources/panel/images', 'public/panel/assets/images');
