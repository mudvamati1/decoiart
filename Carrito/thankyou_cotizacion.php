<?php
session_start();
include './php/conexion.php';

  if(isset($_GET['id_venta']) && isset($_GET['metodo']) && isset($_GET['invitado'])){

    $conexion ->query("INSERT INTO pagos_cotizacion_invitado (id_venta,metodo) VALUES(".$_GET['id_venta'].",'".$_GET['metodo']."')")or die($conexion -> error);
    $query = $conexion->query("UPDATE cotizaciones_invitado SET estatus = 1 WHERE id_cotizacion =".$_GET['id_venta']);

   $cotizacion =  $conexion->query("SELECT * FROM cotizaciones_invitado WHERE id_cotizacion =" . $_GET['id_venta']);
    $datos = mysqli_fetch_assoc($cotizacion);
    include "./php/mail_thankyou.php";
   
    header("Location: ./thankyou_cotizacion.php?id_venta=".$_GET['id_venta']);



} else if (isset($_GET['id_venta']) && isset($_GET['metodo'])) {

    $conexion->query("INSERT INTO pagos_cotizacion (id_venta,metodo) VALUES(" . $_GET['id_venta'] . ",'" . $_GET['metodo'] . "')") or die($conexion->error);
    $query = $conexion->query("UPDATE cotizaciones SET estatus = 1 WHERE id_cotizacion =" . $_GET['id_venta']);
    $cotizacion = $conexion->query("SELECT c.*,u.nombre,u.apellidos AS 'apellido', u.correo FROM cotizaciones c
    INNER JOIN usuarios u ON u.rut = c.rut_usuario
    WHERE id_cotizacion =" . $_GET['id_venta']);
    $datos = mysqli_fetch_assoc($cotizacion);

    include "./php/mail_thankyou.php";

    header("Location: ./thankyou_cotizacion.php?id_venta=" . $_GET['id_venta']);


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
  <?php include './layouts/header.php' ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-5">Tu orden se realizo con exito.</p>
           <?php if(isset($_SESSION['datos_login'])) : ?>
            <p><a href="ver_cotizacion.php?id=<?php echo $_GET['id_venta']; ?>" class="btn btn-sm btn-primary">Ver Pedido</a></p>
            <?php else: ?>
              <p><a href="ver_cotizacion.php?invitado=hola&id=<?php echo $_GET['id_venta']; ?>" class="btn btn-sm btn-primary">Ver Pedido</a></p>
            <?php endif; ?>
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