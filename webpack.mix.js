const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

// mix.styles([
//     'resources/css/header.css',
// ], 'public/css/header.css');
//
// mix.styles([
//     'resources/css/footer.css',
// ], 'public/css/footer.css');
//
// mix.styles([
//     'resources/css/main.css',
// ], 'public/css/main.css');

// mix.styles([
//     'resources/css/preloader.css',
// ], 'public/css/preloader.css');

mix.js('resources/js/main.js', 'public/js');
mix.js('resources/js/ticker.js', 'public/js');
mix.js('resources/js/home.js', 'public/js');
mix.js('resources/js/rater.js', 'public/js');
mix.js('resources/js/reviews.js', 'public/js');
mix.js('resources/js/profile.js', 'public/js');
mix.js('resources/js/slider.js', 'public/js');
mix.js('resources/js/admin.js', 'public/js');
mix.js('resources/js/sources.js', 'public/js');
