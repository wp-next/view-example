let mix = require('laravel-mix');
const path = require('path');

class WpNextMix {
    dependencies() {
        this.requiresReload = true;
        
        return [
            'postcss@^8.0.0',
            'postcss-preset-env@^6.7.0',
            'postcss-calc@^8.0.0',
            'postcss-loader@^5.0.0'
        ];
    }

    register({ publicPath, assetsFolder, resourcesFolder, cssEntry, jsEntry }) {
        mix.setPublicPath(publicPath);

        mix.js(jsEntry, assetsFolder).vue({ version: 2 });

        const postCssPlugins = [
            require('postcss-preset-env')({
                stage: 0,
                preserve: false,
                features: {
                    'custom-properties': false
                }
            }),

            require('postcss-calc')(),
        ];

        mix.postCss(cssEntry, assetsFolder, postCssPlugins);

        if (mix.inProduction()) {
            mix.version();
        }

        mix.webpackConfig({
            resolve: {
                alias: {
                    '@': path.resolve(resourcesFolder)
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
                                  plugins: postCssPlugins
                                },
                            }
                        }],
                        include: path.resolve(resourcesFolder)
                    }
                ]
            }
        });        
    }
}

mix.extend('WpNextMix', new WpNextMix());