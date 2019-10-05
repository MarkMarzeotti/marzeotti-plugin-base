const webpack = require('webpack');
const postcss = require('postcss');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

const public = new ExtractTextPlugin({
	filename: './public/css/public.css',
});

const admin = new ExtractTextPlugin({
	filename: './admin/css/admin.css',
});

module.exports = {
	entry: {
		public: './assets/js/public.js',
		admin: './assets/js/admin.js',
	},
	output: {
		path: __dirname,
		filename: '[name]/js/[name].js',
	},
	plugins: [
		public,
		admin,
	],
	devtool: 'source-map',
	module: {
		rules: [
			{
				test: /\.js$/,
				exclude: /(node_modules)/,
				loader: ['babel-loader?presets=env'],
			},
			{
				test:/public.(scss|css)$/,
				use: public.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
							options: {
								url: false,
								sourceMap: true,
							}
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								sourceMap: true,
								plugins: [
									require('autoprefixer')(),
									require('cssnano')()
								],
							}
						},
						{
							loader: 'sass-loader',
							options: {
								sourceMap: true,
							}
						}
					]
				})
			},
			{
				test:/admin.(scss|css)$/,
				use: admin.extract({
					fallback: 'style-loader',
					use: [
						{
							loader: 'css-loader',
						},
						{
							loader: 'postcss-loader',
							options: {
								ident: 'postcss',
								plugins: [
									require('autoprefixer')(),
									require('cssnano')()
								]
							}
						},
						{
							loader: 'sass-loader'
						}
					]
				})
			},
		]
	}
}
