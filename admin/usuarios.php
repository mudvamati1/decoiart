<?php
session_start();

include '../Carrito/php/conexion.php';
if (!isset($_SESSION['datos_login'])) {
    header("Location: ../Carrito/index.php");
}
$arregloUsuario = $_SESSION['datos_login'];
if ($arregloUsuario['nivel'] == "1" || $arregloUsuario['nivel'] == "2") {
    header("Location: ../Carrito/index.php");
}
$limite = 4; //Productos por pagina
$totalQuery = $conexion->query("SELECT COUNT(*) FROM usuarios") or die($conexion->error);
$totalProductos = mysqli_fetch_row($totalQuery);
$totalBotones = round($totalProductos[0] / $limite);
if (isset($_GET['limite'])) {
    $resultado = $conexion->query("SELECT u.*, r.id, r.nombre AS 'region_usuario',c.id, c.nombre AS 'comuna_usuario' FROM usuarios u
    INNER JOIN region r ON r.id = u.region
    INNER JOIN comuna c ON c.id = u.comuna
    WHERE nivel = 1
    ORDER BY created_at DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
} else {
    $resultado = $conexion->query("SELECT u.*, r.id, r.nombre AS 'region_usuario',c.id, c.nombre AS 'comuna_usuario' FROM usuarios u
    INNER JOIN region r ON r.id = u.region
    INNER JOIN comuna c ON c.id = u.comuna
    WHERE nivel = 1
    ORDER BY created_at DESC  limit  " . $limite) or die($conexion->error);
}






?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Usuarios</title>

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

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./dashboard/dist/img//AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <?php
        include "./layout/header.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Hola
                                <?php echo $arregloUsuario['nombre'] . " " . $arregloUsuario['apellido'] ?> este es el
                                listado de clientes
                            </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-user-plus"></i> Agregar Usuario
                            </button>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
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
                <?php

                if (isset($_SESSION['success'])) {


                ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success'] ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?php }
                ?>
                <?php $_SESSION['success'] = null; ?>

                <?php
                if (isset($_SESSION['successEdit'])) {

                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['successEdit'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <?php
                }

                ?>
                <?php $_SESSION['successEdit'] = null; ?>
                <table class="table">
                    <thead>
                        <th>Rut Usuario</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Region</th>
                        <th>Comuna</th>
                        <th>Direccion</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            while ($fila = mysqli_fetch_array($resultado)) {

                            ?>
                            <td>
                                <?php echo $fila[0] ?>
                            </td>
                            <td>
                                <?php echo $fila[1] ?>
                            </td>
                            <td>
                                <?php echo $fila[2] ?>
                            </td>
                            <td>
                                <?php echo $fila[3] ?>
                            </td>
                            <td>
                                <?php echo $fila['region_usuario'] ?>
                            </td>
                            <td>
                                <?php echo $fila['comuna_usuario']; ?>
                            </td>
                            <td>
                                <?php echo $fila[7]; ?>
                            </td>
                            <?php
                                if ($fila[9] == 0) { ?>
                            <td>Usuario activo</td>
                            <?php } else { ?>
                            <td>Usuario Bloqueado</td>
                            <?php } ?>

                            <td>
                                <form action="editar_usuario1.php" method="POST">
                                    <button class="btn btn-primary btn-small btnEditar">

                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <input type="hidden" name="rut" value="<?= $fila[0] ?>">
                                </form>
                            </td>

                            <td>
                                <button class="btn btn-danger btn-small btnEliminar" data-toggle="modal"
                                    data-target="#modalEliminar" data-id="<?= $fila[0] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <?php
                            } ?>
                    </tbody>
                </table>
                <div class="col-md-9 order-2">


                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center ">
                            <div class="site-block-27 ">
                                <ul class="list-group list-group-horizontal">

                                    <?php
                                    if (isset($_GET['filtro']) && isset($_GET['orden']) && isset($_GET['rut'])) {
                                        if (isset($_GET['limite'])) {
                                            if ($_GET['limite'] > 0) {
                                                echo '<li class="list-group-item "><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                                            }
                                        }
                                        for ($k = 0; $k < $totalBotones; $k++) {
                                            echo '<li class="list-group-item"><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                                        }
                                        if (isset($_GET['limite'])) {
                                            if ($_GET['limite'] + 10 < $totalBotones * 10) {
                                                echo ' <li><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                                            }
                                        } else {
                                            echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
                                        }
                                    } else {
                                        if (isset($_GET['limite'])) {
                                            if ($_GET['limite'] > 0) {
                                                echo '<li class="list-group-item"><a href="usuarios.php?limite=' . ($_GET['limite'] - 4) . '">&lt;</a></li>';
                                            }
                                        }
                                        for ($k = 0; $k < $totalBotones; $k++) {
                                            echo '<li class="list-group-item"><a href="usuarios.php?limite=' . ($k * 4) . '">' . ($k + 1) . '</a></li>';
                                        }
                                        if (isset($_GET['limite'])) {
                                            if ($_GET['limite'] + 10 < $totalBotones * 4) {
                                                echo ' <li class="list-group-item"><a href="usuarios.php?limite=' . ($_GET['limite'] + 4) . '">&gt;</a></li>';
                                            }
                                        } else {
                                            echo '<li class="list-group-item"><a href="usuarios.php?limite=4">&gt;</a></li>';
                                        }
                                    }


                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>





        </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Modal Agregar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="insertar_usuario.php" method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar un usuario</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" pattern="\d{3,8}-[\d|kK]{1}" name="rut" id="rut" placeholder="Rut del usuario" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" pattern="[a-zA-Z]{2,254}" name="nombre" id="nombre" placeholder="Nombre del usuario"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" pattern="[a-zA-Z]{2,254}" name="apellidos" id="apellidos" placeholder="Apellidos del usuario"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" placeholder="E-mail del usuario"
                                class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" name="password" id="password" class="form-control"
                                placeholder="Ingrese una contraseña" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Confirmar contraseña</label>
                            <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$" name="p2" id="password" class="form-control"
                                placeholder="Ingrese una contraseña" required>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha de nacimiento</label>
                            <input type="date" pattern="\d{1,2}/\d{1,2}/\d{4}" name="fecha" id="fecha" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="region">Region</label>
                            <select name="region" id="region" class="form-control" required> </select>
                        </div>
                        <div class="form-group">
                            <label for="comuna">Comuna</label>
                            <select name="comuna" id="comuna" class="form-control" required> </select>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" id="direccion" placeholder="Direccion del usuario"
                                class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btnsendd">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalEliminarLabel">Eliminar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea eliminar el usuario?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
                </div>

            </div>
        </div>
    </div>



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
        $('.alert').alert()
    </script>
   <script>
        $(document).ready(function () {
            var idEliminar = -1;
            var idEditar = -1;
            var fila;
            $(".btnEliminar").click(function () {
                idEliminar = ($(this).data('id'));
                fila = $(this).parent('td').parent('tr');

            });
            $(".eliminar").click(function () {
                $.ajax({
                    url: ('eliminar_usuario.php'),
                    method: 'POST',
                    data: {
                        id: idEliminar
                    }

                }).done(function (res) {

                    $(fila).fadeOut(1000);
                });

            });

        });
    </script>
    <script type="text/javascript" src="../js1/combobox.js"></script>


</body>

</html>