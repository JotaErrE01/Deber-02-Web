const path = require('path');

module.exports = {
    entry: './src/script.js',
    mode: 'production',
    output: {
        filename: 'bundle.js',
        path: path.resolve(__dirname, 'src'),
    },
};
