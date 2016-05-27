var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    elixir(function (mix) {
        mix
            .sass('app.scss') // compiling all sass files in sass directory
            .coffee(['app.coffee', 'components']) // compiling all coffee files in coffee directory
            .browserify('app.js', 'public/js', 'public/js')
            .version(['css/app.css', 'js/app.js']);

        mix.copy('node_modules/font-awesome/fonts', 'public/build/fonts');
        mix.copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/build/fonts/bootstrap');
    });
});
