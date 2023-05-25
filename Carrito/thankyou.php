<?php
session_start();
include './php/conexion.php';
if(isset($_SESSION['datos_login'])){
  if(isset($_GET['id_venta']) && isset($_GET['metodo']) && isset($_SESSION['datos_login'])){

    $conexion ->query("INSERT INTO pagos (id_venta,metodo) VALUES(".$_GET['id_venta'].",'".$_GET['metodo']."')")or die($conexion -> error);
    $query = $conexion->query("UPDATE productos_venta SET estatus = 1 WHERE id_venta =".$_GET['id_venta']);
   
    include "./php/mail_pago.php";
   
  unset($_SESSION['mail']);
  
    header("Location: ./thankyou.php?id_venta=".$_GET['id_venta']);
    
    
  }
}else{
  if(isset($_GET['id_venta']) && isset($_GET['metodo'])){

    $conexion ->query("INSERT INTO pagos_invitado (id_venta,metodo) VALUES(".$_GET['id_venta'].",'".$_GET['metodo']."')")or die($conexion -> error);
    $query = $conexion->query("UPDATE productos_venta_invitado SET estatus = 1 WHERE id_venta =".$_GET['id_venta']);
   
    include "./php/mail_pago.php";
    
  unset($_SESSION['mail']);
  
    header("Location: ./thankyou.php?id_venta=".$_GET['id_venta']);
    
    
  }
}




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tienda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">
  <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="./busqueda.php" class="site-block-top-search" method="GET">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Buscar" name="texto">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">TIENDA DECOIART</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <?php
                  if (isset($_SESSION['datos_login'])) {
                    echo "<li><a href='../admin/index.php'><span class='icon icon-person'></span></a></li>";
                  } else {
                    echo "<li><a href='../html/login.php'><span class='icon icon-person'></span></a></li>";
                  }
                  ?>

                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">
                        <?php
                        if (isset($_SESSION['carrito'])) {
                          echo count($_SESSION['carrito']);
                        } else {
                          echo 0;
                        }
                        ?>

                      </span>
                    </a>
                  </li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div>
            </div>

          </div>
        </div>
      </div>
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="index.php">Home</a>

            </li>

            <li>
              <a href="../html/index.php">Tienda Decoiart</a>

            </li>
            <li>
              <a href="../Carrito/cotizacion.php">Cotizacion</a>

            </li>
            <!--
            <li>
              <a href="../html/Trabajos.php">Trabajos</a>
            </li>
                      -->
            <?php if (isset($_SESSION['datos_login'])) { ?>
              <li><a href='../admin/index.php'>Perfil</a></li>
            <?php } else { ?>
              <li><a href="../html/Login.php"><span class="spi">Login</span></a> </li>
            <?php }  ?>

            <li><a href="../html/Contacto.php">Contacto</a></li>
            <li><a href="../Carrito/about.php">Acerca</a></li>
          </ul>
        </div>
      </nav>
    </header>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-5">Tu orden se realizo con exito.</p>
           
            <p><a href="verpedido.php?id_venta=<?php echo $_GET['id_venta']; ?>" class="btn btn-sm btn-primary">Ver Pedido</a></p>
            <p><a href="index.php" class="btn btn-sm btn-primary">Volver a la tienda </a></p>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

</body>

</html>