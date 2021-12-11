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

mix.styles(['public/theme/frontend/css/bootstrap.min.css', 'public/theme/frontend/css/home.css', 'public/theme/frontend/css/product.css'], 'public/theme/frontend/css/all.css').version();
mix.scripts(['public/theme/frontend/js/jquery-3.6.0.min.js', 'public/theme/frontend/js/home.js', 'public/theme/frontend/js/product.js'], 'public/theme/frontend/js/all.js').version();