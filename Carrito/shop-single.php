<?php
include("./php/conexion.php");
if (isset($_GET['id'])) {
  $resultado = $conexion->query("SELECT p.*, v.rut_vendedor,v.nombre,v.apellidos FROM productos p 
  INNER JOIN vendedores v ON v.rut_vendedor = p.rut_vendedor
   WHERE id_producto=" . $_GET['id']) or die($conexion->error);
  if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_row($resultado);
  } else {
    //REDIRECCIONAR
    header("Location: ./index.php");
  }
} else {
  //REDIRECCIONAR
  header("Location: ./index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

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
    <?php include("./layouts/header.php"); ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/<?php echo $fila[4]?>" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila[1]?></h2>
           <p><?php echo $fila[2]?></p>
            <p><strong class="text-primary h4">Precio: $<?php echo $fila[3]?></strong></p>
            <p><strong class="text-primary h4">Stock: <?php echo $fila[5]?></strong></p>
            <p><strong class="text-primary h4">Caracteristicas:<?php echo $fila[7] ?> 
        
     
          <p><strong class="text-primary h4">Vendedor: <?php echo $fila[10]." ".$fila[11]?></strong></p>
           
         
            <p><a href="cart.php?id=<?php echo $fila[0]?>&marketplace" class="buy-now btn btn-sm btn-primary">Añadir al carrito</a></p>

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