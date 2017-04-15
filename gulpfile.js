process.env.DISABLE_NOTIFIER = true;

var elixir = require('laravel-elixir');

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass(['*.sass'], 'public/css/app.css')
        .scripts(["*.js"], 'public/js/app.js')
        .browserSync({
            notify: "false",
            proxy:  "localhost:8000"
        });
});
