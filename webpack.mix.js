let mix = require('laravel-mix');

mix.postCss('resources/app.css', 'public_html/dist', []);

mix.js('resources/app.js', 'public_html/dist').vue({ version: 2 });