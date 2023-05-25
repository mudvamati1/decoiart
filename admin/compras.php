<?php
session_start();
include '../Carrito/php/conexion.php';
if (!isset($_SESSION['datos_login'])) {
    header("Location: ../Carrito/index.php");
}
$arregloUsuario = $_SESSION['datos_login'];

if (isset($_GET['limite'])  && isset($_GET['filtro']) && isset($_GET['orden'])) {
  
    $filtro = $_GET['filtro'];
    $orden = $_GET['orden'];
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM ventas WHERE rut_usuario = '" . $arregloUsuario['rut'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT v.*,pr.*, p.nombre, p.imagen, e.region, e.direccion, e.comuna, e.estado_envio,es.*,est.*,
    ven.rut_vendedor,ven.nombre,ven.apellidos,ven.correo, r.id, r.nombre, c.id, c.nombre  
     FROM ventas v 
    INNER JOIN productos_venta pr ON  pr.id_venta = v.id 
    INNER JOIN productos p  ON p.id_producto = pr.id_producto
    INNER JOIN envios e   ON e.id_venta = v.id  
    INNER JOIN estatus es ON es.id = pr.estatus
    INNER JOIN estado_envio est ON est.id = e.estado_envio
    INNER JOIN vendedores ven ON ven.rut_vendedor =  pr.rut_vendedor
    INNER JOIN region r ON r.id = e.region
    INNER JOIN comuna c ON c.id = e.comuna
    WHERE v.rut_usuario ='" .  $arregloUsuario['rut'] . "' ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
  } else if (isset($_GET['filtro']) && isset($_GET['orden'])) {
    $filtro = $_GET['filtro'];
    $orden = $_GET['orden'];
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM ventas WHERE rut_usuario = '" . $arregloUsuario['rut'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT v.*,pr.*, p.nombre, p.imagen, e.region, e.direccion, e.comuna, e.estado_envio,es.*,est.*,
    ven.rut_vendedor,ven.nombre,ven.apellidos,ven.correo, r.id, r.nombre, c.id, c.nombre  
     FROM ventas v 
    INNER JOIN productos_venta pr ON  pr.id_venta = v.id 
    INNER JOIN productos p  ON p.id_producto = pr.id_producto
    INNER JOIN envios e   ON e.id_venta = v.id  
    INNER JOIN estatus es ON es.id = pr.estatus
    INNER JOIN estado_envio est ON est.id = e.estado_envio
    INNER JOIN vendedores ven ON ven.rut_vendedor =  pr.rut_vendedor
    INNER JOIN region r ON r.id = e.region
    INNER JOIN comuna c ON c.id = e.comuna
    WHERE v.rut_usuario ='" .  $arregloUsuario['rut'] . "' ORDER BY $filtro $orden  limit  " . $limite) or die($conexion->error);
  } else if (isset($_GET['limite'])) {
    
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM ventas WHERE rut_usuario = '" . $arregloUsuario['rut'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT v.*,pr.*, p.nombre, p.imagen, e.region, e.direccion, e.comuna, e.estado_envio,es.*,est.*,
    ven.rut_vendedor,ven.nombre,ven.apellidos,ven.correo, r.id, r.nombre, c.id, c.nombre  
     FROM ventas v 
    INNER JOIN productos_venta pr ON  pr.id_venta = v.id 
    INNER JOIN productos p  ON p.id_producto = pr.id_producto
    INNER JOIN envios e   ON e.id_venta = v.id  
    INNER JOIN estatus es ON es.id = pr.estatus
    INNER JOIN estado_envio est ON est.id = e.estado_envio
    INNER JOIN vendedores ven ON ven.rut_vendedor =  pr.rut_vendedor
    INNER JOIN region r ON r.id = e.region
    INNER JOIN comuna c ON c.id = e.comuna
    WHERE v.rut_usuario ='" .  $arregloUsuario['rut'] . "' ORDER BY id_producto DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
  } else {
    $limite = 10; //Productos por pagina
    $totalQuery = $conexion->query("SELECT COUNT(*) FROM ventas WHERE rut_usuario = '" . $arregloUsuario['rut'] . "'") or die($conexion->error);
    $totalProductos = mysqli_fetch_row($totalQuery);
    $totalBotones = round($totalProductos[0] / $limite);
    $resultado = $conexion->query("SELECT v.*,pr.*, p.nombre, p.imagen, e.region, e.direccion, e.comuna, e.estado_envio,es.*,est.*,
    ven.rut_vendedor,ven.nombre,ven.apellidos,ven.correo, r.id, r.nombre, c.id, c.nombre  
     FROM ventas v 
    INNER JOIN productos_venta pr ON  pr.id_venta = v.id 
    INNER JOIN productos p  ON p.id_producto = pr.id_producto
    INNER JOIN envios e   ON e.id_venta = v.id  
    INNER JOIN estatus es ON es.id = pr.estatus
    INNER JOIN estado_envio est ON est.id = e.estado_envio
    INNER JOIN vendedores ven ON ven.rut_vendedor =  pr.rut_vendedor
    INNER JOIN region r ON r.id = e.region
    INNER JOIN comuna c ON c.id = e.comuna
    WHERE v.rut_usuario ='" .  $arregloUsuario['rut'] . "' ORDER BY id_producto DESC    limit  " . $limite);
  }



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compras</title>

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
                            <h1 class="m-0">Compras de <?php echo $arregloUsuario['nombre'] . $arregloUsuario['apellido'] ?> </h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Inicio</a></li>

                            </ol>
                        </div><!-- /.col -->
                        <div class="dropdown show">
                            <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Elige un filtro
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="./compras.php?filtro=total&orden=DESC">Precio de mayor a menor</a>
                                <a class="dropdown-item" href="./compras.php?filtro=total&orden=ASC">Precio de menor a mayor</a>
                                <a class="dropdown-item" href="./compras.php?filtro=pr.id&orden=DESC">De mas reciente a mas antiguo</a>
                                <a class="dropdown-item" href="./compras.php?filtro=pr.id&orden=ASC">De mas antiguo a mas reciente</a>
                            </div>
                        </div>
                        
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div id="accordion">
                        <?php
                        while ($fila = mysqli_fetch_array($resultado)) {
                            
                        ?>
                            <div class="card">
                                <div class="card-header" id="heading<?php echo $fila[5] ?>">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $fila[5] ?>" aria-expanded="true" aria-controls="collapseOne">
                                      Producto: <?php echo $fila[5] ?>
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse<?php echo $fila[5] ?>" class="collapse " aria-labelledby="heading<?php echo $fila[5] ?> data-parent=" #accordion">
                                    <div class="card-body">
                                        <img src="../Carrito/images/<?php echo $fila[15]; ?>" width="250px" height="200px" /></br>
                                        <span class="d-block text-primary h6 text-uppercase">Precio:$<?php echo $fila[9]; ?> pesos</span>
                                        <span class="d-block text-primary h6 text-uppercase">Cantidad:<?php echo $fila[8]; ?> </span>
                                        <span class="d-block text-primary h6 text-uppercase"> Nombre vendedor:<?php echo $fila[25] . " " . $fila[26]; ?></span>
                                        <span class="d-block text-primary h6 text-uppercase">Correo vendedor:<?php echo $fila[27]; ?></span>
                                        <?php if($fila[12] == 6){ ?>
                                      
                                            <span class="d-block text-primary h6 text-uppercase">Estatus:<?php echo $fila[21]; ?></span>
                                          <p><a href="../Carrito/pagar.php?id_venta=<?php echo $fila[6] ?>" class="btn btn-sm btn-primary">Pagar</a></p>
                                          
                                        <?php }else{ ?>
                                            <span class="d-block text-primary h6 text-uppercase">Estatus:<?php echo $fila[21]; ?></span>
                                        <?php } ?>    
                                        <p class="h6"><strong>Datos de envio</strong> </p>
                                        <span class="d-block text-primary h6 text-uppercase"><?php echo $fila[29]; ?></span>
                                        <span class="d-block text-primary h6 text-uppercase">Comuna: <?php echo $fila[31]; ?></span>
                                        <span class="d-block text-primary h6 text-uppercase">Direccion: <?php echo $fila[17]; ?></span>
                                        <span class="d-block text-primary h6 text-uppercase">Estado envio: <?php echo $fila[23]; ?></span>

                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-md-9 order-2">


<div class="row" data-aos="fade-up">
    <div class="col-md-12 text-center">
      <div class="site-block-27">
        <ul class="list-group list-group-horizontal">

          <?php
        

           if (isset($_GET['filtro']) && isset($_GET['orden'])) {
            if (isset($_GET['limite'])) {
              if ($_GET['limite'] > 0) {
                echo '<li class="list-group-item "><a href="compras.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
              }
            }
            for ($k = 0; $k < $totalBotones; $k++) {
              echo '<li class="list-group-item "><a href="compras.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
            }
            if (isset($_GET['limite'])) {
              if ($_GET['limite'] + 10 < $totalBotones * 10) {
                echo ' <li class="list-group-item "><a href="compras.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
              }
            } else {
              echo '<li class="list-group-item "><a href="compras.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
            }

          } else {
            if (isset($_GET['limite'])) {
              if ($_GET['limite'] > 0) {
                echo '<li class="list-group-item "><a href="compras.php?limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
              }
            }
            for ($k = 0; $k < $totalBotones; $k++) {
              echo '<li class="list-group-item "><a href="compras.php?limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
            }
            if (isset($_GET['limite'])) {
              if ($_GET['limite'] + 10 < $totalBotones * 10) {
                echo ' <li class="list-group-item "><a href="compras.php?limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
              }
            } else {
              echo '<li class="list-group-item "><a href="compras.php?limite=10">&gt;</a></li>';
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

</body>

</html>