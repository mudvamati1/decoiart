<?php
session_start();

include '../Carrito/php/conexion.php';
if (!isset($_SESSION['datos_login'])) {
    header("Location: ../Carrito/index.php");
}
$arregloUsuario = $_SESSION['datos_login'];
if ($arregloUsuario['nivel'] == "1" || $arregloUsuario['nivel'] == "2" ) {
    header("Location: ../Carrito/index.php");
}
if (isset($_GET['limite'])  && isset($_GET['filtro']) && isset($_GET['orden'])) {
  
    $filtro = $_GET['filtro'];
    $orden = $_GET['orden'];
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM contacto WHERE correo = '" . $arregloUsuario['email'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT c.*, es.descripcion FROM contacto c 
    INNER JOIN estado_contacto es ON es.id_contacto = c.estado
    WHERE estado = 1 ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
  } else if (isset($_GET['filtro']) && isset($_GET['orden'])) {
    $filtro = $_GET['filtro'];
    $orden = $_GET['orden'];
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM contacto WHERE correo = '" . $arregloUsuario['email'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT c.*, es.descripcion FROM contacto c 
    INNER JOIN estado_contacto es ON es.id_contacto = c.estado
    WHERE estado = 1 ORDER BY $filtro $orden  limit  " . $limite) or die($conexion->error);
  } else if (isset($_GET['limite'])) {
    
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM contacto WHERE correo = '" . $arregloUsuario['email'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT c.*, es.descripcion FROM contacto c 
    INNER JOIN estado_contacto es ON es.id_contacto = c.estado
    WHERE estado = 1 ORDER BY id_contacto DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
  } else {
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM contacto WHERE correo = '" . $arregloUsuario['email'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT c.*, es.descripcion FROM contacto c 
    INNER JOIN estado_contacto es ON es.id_contacto = c.estado
    WHERE estado = 1 ORDER BY id_contacto DESC    limit  " . $limite);
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Correos</title>
   
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

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="./dashboard/dist/img//AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
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
                            <h1 class="m-0">Hola <?php echo $arregloUsuario['nombre'] . " " . $arregloUsuario['apellido'] ?> este es el listado de correos </h1>
                        </div><!-- /.col -->
                       
                        <div class="dropdown show">
              <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Elige un filtro
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="./contacto-vendedor.php?filtro=estado&orden=DESC">Contestados primero</a>
                <a class="dropdown-item" href="./contacto-vendedor.php?filtro=estado&orden=ASC">Pendientes primero</a>
                <a class="dropdown-item" href="./contacto-vendedor.php?filtro=fecha&orden=DESC">De mas reciente a mas antiguo</a>
                <a class="dropdown-item" href="./contacto-vendedor.php?filtro=fecha&orden=ASC">De mas antiguo a mas reciente</a>
                
              </div>

            </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                
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
                            <th>Id contacto</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Mensaje</th>
                            <th>Imagen</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                while ($fila = mysqli_fetch_array($resultado)) {
                               
                                ?>
                                    <td><?php echo $fila[0] ?></td>
                                    <td><?php echo $fila[1] ?></td>
                                    <td><?php echo $fila[2] ?></td>
                                    <td><?php echo $fila[3] ?></td>
                                    <td><?php echo $fila[4]; ?></td>
                                    <?php if(!isset($fila[5])) {?>
                                        <td>Imagen no proporcionada</td>
                                    <?php } else { ?>
                                        <td><img src="../Carrito/images/<?php echo $fila[5] ?>" width="135px" height="100px"></td>
                                     <?php } ?>   
                                    <td><?php echo $fila[6]; ?></td>
                                    <td><?php echo $fila[8]; ?></td>

                                    <td>
                                        <form action="contestar_correo.php" method="POST">
                                        <button class="btn btn-primary btn-small btnEditar" >
                                            
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <input type="hidden" name="rut" value="<?= $fila[0] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger btn-small btnEliminar" data-toggle="modal" data-target="#modalEliminar" data-id="<?= $fila[0] ?>">
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
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul class="list-group list-group-horizontal">

                    <?php
                  

                     if (isset($_GET['filtro']) && isset($_GET['orden'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li class="list-group-item "><a href="contacto-vendedor.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li class="list-group-item "><a href="contacto-vendedor.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li class="list-group-item "><a href="contacto-vendedor.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li class="list-group-item "><a href="contacto-vendedor.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
                      }

                    } else {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li class="list-group-item "><a href="contacto-vendedor.php?limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li class="list-group-item "><a href="contacto-vendedor.php?limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li class="list-group-item "><a href="contacto-vendedor.php?limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li class="list-group-item "><a href="contacto-vendedor.php?limite=10">&gt;</a></li>';
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
    
        <!-- Modal Eliminar -->
        <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel" aria-hidden="true">
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
        $(document).ready(function() {
            var idEliminar = -1;
            var idEditar = -1;
            var fila;
            $(".btnEliminar").click(function() {
                idEliminar = ($(this).data('id'));
                fila = $(this).parent('td').parent('tr');

            });
            $(".eliminar").click(function() {
                $.ajax({
                    url: ('eliminar_correo.php'),
                    method: 'POST',
                    data: {
                        id: idEliminar
                    }

                }).done(function(res) {

                    $(fila).fadeOut(1000);
                });

            });
         
        });
    </script>
     <script type="text/javascript" src="../js1/combobox.js"></script>
    

</body>

</html>