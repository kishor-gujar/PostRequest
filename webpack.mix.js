let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.copy( 'node_modules/admin-lte/plugins/select2/select2.full.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/dist/js/demo.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/colorpicker/bootstrap-colorpicker.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/timepicker/bootstrap-timepicker.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/daterangepicker/moment.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/slimScroll/jquery.slimscroll.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/iCheck/icheck.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/fastclick/fastclick.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/daterangepicker/moment.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/daterangepicker/daterangepicker.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/input-mask/jquery.inputmask.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js', 'resources/assets/js')
    .copy('node_modules/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js', 'resources/assets/js');

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.sass('resources/assets/sass/admin.scss', 'public/css');

















