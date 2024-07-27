const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .css('resources/css/app.css', 'public/css'); // Sadece CSS dosyanız varsa


if (mix.inProduction()) {
    mix.version();
}
