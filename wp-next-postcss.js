const path = require('path');
let mix = require('laravel-mix');

class WpNextPostCSS {
    dependencies() {
        this.requiresReload = true;
        
        return [
            'postcss@^8.0.0',
            'postcss-preset-env@^6.7.0',
            'postcss-calc@^8.0.0',
            'postcss-loader@^5.0.0'
        ];
    }

    register(file, out) {
        mix.postCss(file, out, [
            require('postcss-preset-env')({
                stage: 0,
                preserve: false,
                features: {
                    'custom-properties': false
                }
            }),

            require('postcss-calc')(),
        ]);
    }
}

mix.extend('wpNextPostCSS', new WpNextPostCSS());