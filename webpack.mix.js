const mix = require('laravel-mix');
let LiveReloadPlugin = require('webpack-livereload-plugin');


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

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/page.js', 'public/js/page.js')


   /* live reload */
mix.webpackConfig({
   plugins: [
      new LiveReloadPlugin()
   ]
});