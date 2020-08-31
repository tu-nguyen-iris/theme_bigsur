const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const OptimizeCSSAssetsPlugin = require("optimize-css-assets-webpack-plugin")
const FixStyleOnlyEntriesPlugin = require("webpack-fix-style-only-entries");
const TerserPlugin = require("terser-webpack-plugin")
module.exports = {
    module: {
        rules: [
            {
                test: /\.js$/,
                include: [path.resolve(__dirname, 'src')],
                exclude: /node_modules/,
                loader: 'babel-loader',
                options: {
                    plugins: ['syntax-dynamic-import'],
                    presets: [
                        [
                            '@babel/preset-env',
                            {modules: false}
                        ]
                    ]
                }
            },
            {
                test: /\.(scss|css)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            sourceMap: true
                        }
                    },
                    {
                        loader: "resolve-url-loader"
                    },
                    {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true,
                        }
                    }
                ]
            },
            {
                test: /\.(png|jpg|gif|svg|ttf|otf|eot|woff2|woff)$/,
                exclude: [/fonts/],
                use: [
                    {
                        loader: 'file-loader',
                        options: {
                            name: '[name].[ext]?[hash]',
                            outputPath: "images",
                            publicPath: "images"
                        },
                    },
                ],

            },
        ]
    },
    resolve:{
        alias: {
            'jquery.validation': 'jquery-validation/dist/jquery.validate.js'
        },
    },
    entry: {
        theme: './src/css/app.scss',
        vendor: './src/css/vendors.scss',
        app: './src/js/app.js'
    },
    output: {
        filename: '[name].js',
    },
    plugins: [
        new FixStyleOnlyEntriesPlugin(),

        new MiniCssExtractPlugin({
            filename: '[name].css',
            chunkFilename: '[id].min.css'
        }),
        new webpack.ProvidePlugin({
            $: 'jquery',
            jQuery: 'jquery',
            'window.jQuery': 'jquery'
        }),
        new webpack.HashedModuleIdsPlugin()
    ],
    mode: 'development',
    optimization: {
        minimize:true,
        minimizer: [
            new OptimizeCSSAssetsPlugin({}),
            new TerserPlugin({})],
        splitChunks: {
            cacheGroups: {
                vendors: {
                    priority: -10,
                    name: 'vendors',
                    test: m => /node_modules/.test(m.context),
                    // test: /[\\/]node_modules[\\/]/,
                    // enforce: true
                },
            },
            maxInitialRequests: Infinity,
            chunks: 'all',
            minSize: 0,
            name: true
        }
    },
    watch: true
};
