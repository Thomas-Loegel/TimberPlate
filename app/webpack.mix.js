/**
 * @type {import('laravel-mix').Api}
 */
const mix = require('laravel-mix')
require('dotenv').config()

// Thème choisi pour le projet
const theme = process.env.WP_THEME

mix.setResourceRoot('../')
mix.setPublicPath(`public/themes/TimberPlate/assets`)

mix.js('resources/scripts/app.js', 'scripts')
mix.sass('resources/styles/app.scss', 'styles', {}, [
  /* Ici placer les plugins postcss */
  require("tailwindcss")
])

/**
 * Pour plus de configurations
 * https://browsersync.io/docs/options
 */
mix.browserSync({
  proxy: '127.0.0.1:1337',
  open: false,
  notify: false,
  files: [
    "public/themes/TimberPlate/assets/styles/app.css",
    "public/themes/TimberPlate/assets/scripts/app.js",
    "public/themes/TimberPlate/**/*.php",
    "public/themes/TimberPlate/**/*.twig"
  ]
})
