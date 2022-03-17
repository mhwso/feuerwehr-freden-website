let mix = require('laravel-mix');

mix.setResourceRoot('../')
mix.setPublicPath('public/dist');

mix.js('src/js/index.js', 'js');
mix.js('src/vue/app.js', 'vue').vue({ version: 2 });
mix.sass('src/scss/style.scss', 'css').sourceMaps();

if (!mix.inProduction()) {
  mix.browserSync('feuerwehrfreden.local');
}

if (mix.inProduction()) {
  mix.version();
}
