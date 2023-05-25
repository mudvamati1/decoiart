<?php
session_start();

include '../Carrito/php/conexion.php';
if (!isset($_SESSION['datos_login'])) {
    header("Location: ../Carrito/index.php");
}
if (isset($_POST['rut'])) {
    $rut = $_POST['rut'];
}
$arregloUsuario = $_SESSION['datos_login'];
if ($arregloUsuario['nivel'] == "3") {
    header("Location: ../Carrito/index.php");
}
$resultado = $conexion->query("SELECT r.respuesta, c.mensaje  FROM respuesta r
INNER JOIN contacto c ON c.id_contacto = r.id_correo
WHERE r.id_correo =" . $rut . "



");

$fila = mysqli_fetch_array($resultado);



?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Correo</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="./dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="./dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="./dashboard/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="./dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="./dashboard/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./dashboard/plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include "./layout/header.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-6">
                            <h1 class="m-0">Correo </h1>
                        </div><!-- /.col -->
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-5 mb-md-0">

                            <div class="p-3 p-lg-5 border">
                                <div class="form-group">
                                    <label for="respuesta">Tu consulta</label>
                                    <textarea name="respuesta" class="form-control" disabled><?= $fila[1] ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="respuesta">Respuesta</label>
                                    <textarea name="respuesta" class="form-control" disabled><?= $fila[0] ?></textarea>
                                </div>



                            </div>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                </div>
            </section>
            <?php include "./layout/footer.php"; ?>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="./dashboard/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="./dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="./dashboard/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="./dashboard/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="./dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="./dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="./dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="./dashboard/plugins/moment/moment.min.js"></script>
        <script src="./dashboard/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="./dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="./dashboard/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="./dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="./dashboard/dist/js/adminlte.js"></script>
        <!-- Bootstrap Js -->
        <script src="./dashboard/docs/assets/plugins/bootstrap/js/bootstrap.js"></script>




</body>

</html>