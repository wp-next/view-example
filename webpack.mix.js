let mix = require('laravel-mix');

require('./wp-next-mix.js');

mix.WpNextMix({
    publicPath: 'public_html',
    distFolder: 'dist',
    assetsFolder: 'resources/assets',
    resourcesFolder: 'resources',
    cssEntry: 'resources/app.css',
    jsEntry: 'resources/app.js'
});
