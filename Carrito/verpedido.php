<?php
session_start();
include("./php/conexion.php");
if (!isset($_GET['id_venta'])) {
  header("Location: ./");
}
if (isset($_SESSION['datos_login'])) {
  $datos = $conexion->query("SELECT 
  ventas.*, 
  usuarios.rut,usuarios.nombre,usuarios.apellidos,usuarios.correo
   FROM ventas 
   INNER JOIN usuarios on ventas.rut_usuario = usuarios.rut
   WHERE id=" . $_GET['id_venta']) or die($conexion->error);

  $datos_usuario = mysqli_fetch_row($datos);


  $datos2 = $conexion->query("SELECT e.*, es.*, r.id, r.nombre, c.id, c.nombre FROM envios e
  INNER JOIN estado_envio es ON es.id = e.estado_envio
  INNER JOIN region r ON r.id = e.region
  INNER JOIN comuna c ON c.id = e.comuna
   WHERE id_venta=" . $_GET['id_venta']) or die($conexion->error);
  $datos_envio = mysqli_fetch_row($datos2);


  $datos3 = $conexion->query("SELECT productos_venta .*,
  productos.nombre as nombre_producto, productos.imagen
  FROM productos_venta INNER JOIN productos ON productos_venta.id_producto = productos.id_producto
  WHERE id_venta =" . $_GET['id_venta']) or die($conexion->error);
  $datos4 = $conexion->query("SELECT v.rut_vendedor, ve.rut_vendedor, ve.nombre,ve.apellidos,ve.correo FROM ventas v 
  INNER JOIN vendedores ve ON ve.rut_vendedor = v.rut_vendedor
  WHERE id =" . $_GET['id_venta']);
  $datos_vendedor = mysqli_fetch_row($datos4);
} else {
  $datos = $conexion->query("SELECT 
  ventas_invitado.*, 
  invitado.rut,invitado.nombre,invitado.apellidos,invitado.correo
   FROM ventas_invitado
   INNER JOIN invitado on ventas_invitado.rut_usuario = invitado.rut
   WHERE id=" . $_GET['id_venta']) or die($conexion->error);

  $datos_usuario = mysqli_fetch_row($datos);


  $datos2 = $conexion->query("SELECT e.*, es.*, r.id, r.nombre, c.id, c.nombre FROM envios_invitado e
  INNER JOIN estado_envio es ON es.id = e.estado_envio
  INNER JOIN region r ON r.id = e.region
  INNER JOIN comuna c ON c.id = e.comuna
   WHERE id_venta=" . $_GET['id_venta']) or die($conexion->error);
  $datos_envio = mysqli_fetch_row($datos2);


  $datos3 = $conexion->query("SELECT productos_venta_invitado .*,
  productos.nombre as nombre_producto, productos.imagen
  FROM productos_venta_invitado INNER JOIN productos ON productos_venta_invitado.id_producto = productos.id_producto
  WHERE id_venta =" . $_GET['id_venta']) or die($conexion->error);
  $datos4 = $conexion->query("SELECT v.rut_vendedor, ve.rut_vendedor, ve.nombre,ve.apellidos,ve.correo FROM ventas_invitado v 
  INNER JOIN vendedores ve ON ve.rut_vendedor = v.rut_vendedor
  WHERE id =" . $_GET['id_venta']);
  $datos_vendedor = mysqli_fetch_row($datos4);
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
  <title>Ver pedidos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/dashboard/plugins/fontawesome-free/css/all.min.css">
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
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Datos Comprador</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">

              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Venta #<?php echo $_GET['id_venta']; ?></label>
                  </div>
                </div>
                <?php if (isset($_SESSION['datos_login'])) : ?>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Rut: <?php echo $datos_usuario[5]; ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Nombre: <?php echo $datos_usuario[6]; ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Apellido: <?php echo $datos_usuario[7]; ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">E-Mail: <?php echo $datos_usuario[8]; ?></label>
                    </div>
                  </div>
                <?php else : ?>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Rut: <?php echo $datos_usuario[1]; ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Nombre: <?php echo $datos_usuario[2]; ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">Apellido: <?php echo $datos_usuario[3]; ?></label>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-6">
                      <label for="c_fname" class="text-black">E-Mail: <?php echo $datos_usuario[4]; ?></label>
                    </div>
                  </div>
                <?php endif; ?>

              </div>
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Datos de envio</h2>
              </div>
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Region: <?php echo $datos_envio[11]; ?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Direccion: <?php echo $datos_envio[2]; ?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Comuna: <?php echo $datos_envio[13]; ?></label>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Estado envio: <?php echo $datos_envio[9]; ?></label>
                  </div>
                </div>
              </div>

            </form>
          </div>

          <div class="col-md-5 ml-auto">
            <?php
            while ($f = mysqli_fetch_array($datos3)) {


            ?>
              <div class="p-4 border mb-3">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Datos Producto</h2>
                </div>
                <img src="./images/<?php echo $f['imagen']; ?>" width="150px" height="100px" />
                <span class="d-block text-primary h6 text-uppercase"><?php echo $f['nombre_producto']; ?></span><br>
                <span class="d-block text-primary h6 text-uppercase">Cantidad: <?php echo $f['cantidad']; ?></span>
                <span class="d-block text-primary h6 text-uppercase">Precio: <?php echo $f['precio']; ?></span>
                <span class="d-block text-primary h6 text-uppercase">Subtotal: <?php echo $f['subtotal']; ?></span>



              </div>
            <?php } ?>
            <?php if(isset($_SESSION['datos_login'])) : ?>
            <h4>Total:<?php echo $datos_usuario[2]; ?></h4>
            <?php else: ?>
              <h4>Total:<?php echo $datos_usuario[5]; ?></h4>
            <?php endif; ?>
            <p><a href="index.php" class="btn btn-sm btn-primary"><i class="nav-icon fa fa-shopping-cart"></i> Volver al marketplace </a></p>
            <p><a href="../libreria/index.php?id_venta=<?= $_GET['id_venta'] ?>" class="btn btn-sm btn-primary"><i class="nav-icon fa fa-file-pdf"></i> Visualizar pedido en pdf </a></p>
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