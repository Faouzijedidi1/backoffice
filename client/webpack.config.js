var webpack = require("webpack");
      module.exports = {
        context: __dirname,
        entry: __dirname+"/src/js/main.js",
        output: {
            filename: "backoffice.js"
        },
        watch: false,
        module: {
          loaders: [
              {
                test: /\.js?$/,
                exclude: /(node_modules|bower_components)/,
                loader: "babel-loader",
                query: {
                  presets: ["react","es2017"]
                }
              }
          ]
        }
      };
