const mix = require('laravel-mix');

// Procesar JavaScript
mix.js('resources/js/app.js', 'public/js')
    .vue() // Si usas Vue.js
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer'),
    ]);

// Opcional: Habilitar notificaciones en desarrollo
mix.browserSync('http://managepro.test'); // Cambia la URL por la de tu proyecto

// Habilitar versiones para producción
if (mix.inProduction()) {
    mix.version();
}
