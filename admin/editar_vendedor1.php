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
if ($arregloUsuario['nivel'] == "1" || $arregloUsuario['nivel'] == "2") {
    header("Location: ../Carrito/index.php");
}
if(isset($_POST['rut'])){
    $resultado = $conexion->query("SELECT v.*, r.id, r.nombre AS 'region_usuario',c.id, c.nombre AS 'comuna_usuario' FROM vendedores v
    INNER JOIN region r ON r.id = v.region
    INNER JOIN comuna c ON c.id = v.comuna
    WHERE rut_vendedor ='$rut'
    ");
    
    $fila = mysqli_fetch_array($resultado);
    
    $resultado2 = $conexion->query("SELECT region FROM vendedores WHERE rut_vendedor='$rut'");
    
    $fila1 = mysqli_fetch_row($resultado2);
    
}else if(isset($_GET['rut'])){
    $rut = $_GET['rut'];
    $resultado = $conexion->query("SELECT v.*, r.id, r.nombre AS 'region_usuario',c.id, c.nombre AS 'comuna_usuario' FROM vendedores v
    INNER JOIN region r ON r.id = v.region
    INNER JOIN comuna c ON c.id = v.comuna
    WHERE rut_vendedor ='$rut'
    ");
    
    $fila = mysqli_fetch_array($resultado);
    
    $resultado2 = $conexion->query("SELECT region FROM vendedores WHERE rut_vendedor='$rut'");
    
    $fila1 = mysqli_fetch_row($resultado2);
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuarios</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1 class="m-0">Editar vendedor </h1>
                            <?php
                        if (isset($_SESSION['error'])) {

                        ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $_SESSION['error'] ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <?php
                        }

                        ?>
                        <?php $_SESSION['error'] = null; ?>
                        </div><!-- /.col -->
                    </div>
                </div>
            </div>
            <div class="site-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-5 mb-md-0">

                            <div class="p-3 p-lg-5 border">
                                <form action="editar_vendedor.php" method="POST">
                                    <input type="hidden" name="rut" id="idEdit" value="<?= $rut ?>" class="form-control">

                                    <div class="form-group">

                                        <label for="nombreEdit">Nombre</label>
                                        <input type="text" name="nombre" pattern="[a-zA-Z]{2,254}" id="nombreEdit" placeholder="Nombre del usuario" class="form-control" value="<?= $fila[1] ?>" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="apellidosEdit">Apellidos</label>
                                        <input type="text" name="apellidos" pattern="[a-zA-Z]{2,254}" id="apellidosEdit" value="<?= $fila[2] ?>" placeholder="Apellidos del usuario" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="emailEdit">Email</label>
                                        <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" id="emailEdit" value="<?= $fila[3] ?>" placeholder="Email del usuario" class="form-control" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="regionesEdit">Region</label>
                                        <select name="region" id="regionesEdit" class="form-control" required>

                                            <?php
                                            $res = $conexion->query("SELECT * FROM region") or die($conexion->error);

                                            while ($f = mysqli_fetch_array($res)) { ?>


                                                <option value="<?= $f[0] ?>" <?= ($f[0] == $fila[8]) ? 'selected="selected"' : '' ?>>
                                                    <?= $f[1] ?>
                                                </option>

                                            <?php  } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="comunaEdit">Comuna</label>
                                        <select name="comuna" id="comunaEdit" class="form-control" required>
                                            <?php
                                            $res = $conexion->query("SELECT * FROM comuna WHERE id_region=" . $fila1[0]) or die($conexion->error);

                                            while ($f = mysqli_fetch_array($res)) { ?>

                                                <option value="<?= $f[0] ?>" <?= ($f[0] == $fila[6]) ? 'selected="selected"' : '' ?>>
                                                    <?= $f[2] ?>
                                                </option>

                                            <?php } ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="direccionEdit">Direccion</label>
                                        <input type="text" name="direccion" id="direccionEdit" value="<?= $fila[7] ?>" placeholder="Direccion del usuario" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="estadoEdit">Estado</label>
                                        <input type="number" name="estado" id="estadoEdit" value="<?= $fila[9] ?>" min="0" max="1" placeholder="estado del usuario" class="form-control" required>
                                    </div>

                                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Editar">
                                </form>
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


        <script>
            $(document).ready(function() {

                $('#regionesEdit').on('change', function() {
                    var id = $('#regionesEdit').val()
                    $.ajax({
                            url: ('cargar_comunaEdit.php'),
                            method: 'POST',
                            data: {
                                'id': id
                            }
                        })
                        .done(function(comunaEdit) {
                            $('#comunaEdit').html(comunaEdit)
                        })
                        .fail(function() {
                            alert('Hubo un error al cargar las comunas')
                        });
                });
            });
        </script>

</body>

</html>