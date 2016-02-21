var elixir     = require('laravel-elixir'),
    jade       = require('laravel-elixir-jade'),
    livereload = require('laravel-elixir-livereload'),
    bw = '../../../public/bower/';

elixir.config.sourcemaps = false;

elixir(function(mix) {
    mix.sass([
        bw + 'easyphotowall/dist/css/easyphotowall.css',
        bw + 'loaders.css/loaders.css',
        bw + 'typicons.font/src/font/typicons.min.css',
        'master.sass'
    ], 'public/css/master.css');

    mix.copy('public/bower/typicons.font/src/font/', 'public/css');
});

elixir(function(mix) {
    mix.jade({
        search: '**/**/**/*.jade',
        src: '/assets/jade/'
    });
});

elixir(function(mix) {
    mix.scripts([
        bw + 'jquery/dist/jquery.min.js',
        bw + 'loaders.css/loaders.css.js',
        bw + 'easyphotowall/dist/js/easyphotowall.js',
        'magic.js'
    ], 'public/js/magic.js');
});

elixir(function(mix) {
    mix.livereload();
});
