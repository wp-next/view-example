const path = require('path');
let mix = require('laravel-mix');

require('./wp-next-postcss.js');

mix.wpNextPostCSS('resources/app.css', 'public_html/dist');

mix.js('resources/app.js', 'public_html/dist').vue({ version: 2 });

mix.webpackConfig({
    resolve: {
        alias: {
            '~': path.resolve(__dirname),
            '@': path.resolve('resources/')
        }
    },
    module: {
        rules: [
            {
                test: /\.postcss$/,
                use: ['style-loader', 'css-loader', {
                    loader: "postcss-loader",
                    options: {
                        postcssOptions: {
                          plugins: [
                            require('postcss-preset-env')({
                                stage: 0,
                                preserve: false,
                                features: {
                                    'custom-properties': false
                                }
                            }),
                
                            require('postcss-calc')(),
                          ],
                        },
                    }
                }],
                include: path.resolve(__dirname, '../')
            }
        ]
    }
});
