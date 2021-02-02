let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Copia Fonts, Css, Js, Images
 |--------------------------------------------------------------------------
 */
 mix.copy(['vendor/almasaeed2010/adminlte/bower_components/font-awesome/fonts/'],'public/build/fonts')
    //Css
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap/'],'public/build/css/bootstrap')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css'],'public/build/css/font-awesome.min.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css'],'public/build/css/ionicons.min.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'],'public/build/css/dataTables.bootstrap.min.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css'],'public/build/css/daterangepicker.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'],'public/build/css/datepicker.min.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css'],'public/build/css/colorpicker.min.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.css'],'public/build/css/fullcalendar.min.css')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/select2/dist/css/select2.min.css'],'public/build/css/select2.min.css')
    .copy(['vendor/almasaeed2010/adminlte/plugins/iCheck/'],'public/build/css/iCheck')
    .copy(['vendor/almasaeed2010/adminlte/plugins/timepicker/bootstrap-timepicker.min.css'],'public/build/css/timepicker.min.css')
    .copy(['vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css'],'public/build/css/adminlte.min.css')
    .copy(['vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css'],'public/build/css/skins.min.css')
    //Js
    .copy(['vendor/almasaeed2010/adminlte/bower_components/select2/dist/js/select2.full.min.js'],'public/build/js/select2.full.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js'],'public/build/js/dataTables.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js'],'public/build/js/dataTables.bootstrap.min.js')
    .copy(['vendor/almasaeed2010/adminlte/plugins/input-mask/jquery.inputmask.js'],'public/build/js/inputmask.js')
    .copy(['vendor/almasaeed2010/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js'],'public/build/js/inputmask.date.extensions.js')
    .copy(['vendor/almasaeed2010/adminlte/plugins/input-mask/jquery.inputmask.extensions.js'],'public/build/js/inputmask.extensions.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/moment/min/moment.min.js'],'public/build/js/moment.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js'],'public/build/js/daterangepicker.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'],'public/build/js/datepicker.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js'],'public/build/js/colorpicker.min.js')
    .copy(['vendor/almasaeed2010/adminlte/plugins/timepicker/bootstrap-timepicker.min.js'],'public/build/js/timepicker.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'],'public/build/js/slimscroll.min.js')
    .copy(['vendor/almasaeed2010/adminlte/plugins/iCheck/icheck.min.js'],'public/build/js/icheck.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/fastclick/lib/fastclick.js'],'public/build/js/fastclick.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/fullcalendar/dist/fullcalendar.min.js'],'public/build/js/fullcalendar.js')
    .copy(['vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js'],'public/build/js/adminlte.min.js')
    .copy(['node_modules/chart.js/dist/Chart.min.js'],'public/build/js/Chart.min.js')
    // .copy(['vendor/almasaeed2010/adminlte/bower_components/chart.js/Chart.js'],'public/build/js/Chart.js')
    // .copy(['vendor/almasaeed2010/adminlte/bower_components/chart.js/Chart.min.js'],'public/build/js/Chart.min.js')
    .copy(['vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js'],'public/build/js/jquery.min.js')
    //Images
    .copy(['vendor/almasaeed2010/adminlte/dist/img/'],'public/build/img');

