const path = require('path');

module.exports = {
  entry: './public/react/src/index.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'public/react/dist'),
  },
  watch: true,
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-react'],
          },
        },
      },
      {
        test: /\.css$/,
        use: ['style-loader', 'css-loader'],
      },
    ],
  },
  resolve: {
    extensions: ['.js', '.jsx','.css'],
  },
};
