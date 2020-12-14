const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    // .sass("resources/sass/app.scss", "public/css")
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")])
    .webpackConfig(require("./webpack.config"))
    .version()
    .disableNotifications();
    