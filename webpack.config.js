var Encore = require("@symfony/webpack-encore");
var StyleLintPlugin = require("stylelint-webpack-plugin");

Encore
    .setOutputPath("public/build")
    .setPublicPath("/build")
    .addPlugin(new StyleLintPlugin({
        files: ["./assets/**/*.scss"],
        configFile: ".stylelintrc"
    }))
    .addEntry('main', './assets/js/main.js')
    .enableSassLoader()
    .enablePostCssLoader()
;
module.exports = Encore.getWebpackConfig();
