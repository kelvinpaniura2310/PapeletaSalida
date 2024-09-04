<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Papeletas</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="views/resources/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="views/resources/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="views/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="views/resources/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="views/resources/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="views/resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="views/resources/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="views/resources/plugins/summernote/summernote-bs4.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed"  >
    <div class="wrapper">

        <?php
        
        session_start();

        if ((isset($_SESSION['login']) && $_SESSION['estado'] == true)) {


            include "modules/header.php";
            include "modules/nav.php";
            echo '<div class="content-wrapper">';

            if (isset($_GET["pages"])) {
                if (
                    $_GET["pages"] == "users" ||
                    $_GET["pages"] == "role" ||
                    $_GET["pages"] == "registropapeletas" ||
                    $_GET["pages"] == "newpapeleta" ||
                    $_GET["pages"] == "mispapeletas" ||
                    $_GET["pages"] == "areas" || 
                    $_GET["pages"] == "home"
                ) {
                    include "pages/" . $_GET["pages"] . ".php";
                }
            }
            echo '</div>';
            
        #<!-- Footer -->
        include "modules/footer.php";
        } else {
            include "views/pages/login.php";
        }
        
        ?>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="views/resources/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="views/resources/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="views/resources/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="views/resources/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="views/resources/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="views/resources/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="views/resources/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="views/resources/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="views/resources/plugins/moment/moment.min.js"></script>
    <script src="views/resources/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="views/resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="views/resources/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="views/resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="views/resources/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="views/resources/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="views/resources/dist/js/pages/dashboard.js"></script>
</body>

</html>