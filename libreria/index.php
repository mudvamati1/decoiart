<?php
session_start();
if (!isset($_GET['id_venta'])) {
  header("Location: ../Carrito/index.php");
}
ob_start();
include("../Carrito/php/conexion.php");

if(isset($_SESSION['datos_login'])){
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
}else{
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


$datos3 = $conexion->query("SELECT productos_venta_invitado.*,
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="../Carrito/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Carrito/css/magnific-popup.css">
  <link rel="stylesheet" href="../Carrito/css/jquery-ui.css">
  <link rel="stylesheet" href="../Carrito/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../Carrito/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="../Carrito/css/aos.css">

  <link rel="stylesheet" href="../Carrito/css/style.css">
    <title>Pdf</title>
</head>
<body>
<div class="site-wrap">
 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php if(isset($_SESSION['datos_login'])): ?>
            <h2 class="h3 mb-3 text-black">Gracias por tu compra <?php echo $datos_usuario[6]." ".$datos_usuario[7] ?></h2>
            <?php else: ?>
              <h2 class="h3 mb-3 text-black">Gracias por tu compra <?php echo $datos_usuario[2]." ".$datos_usuario[3] ?></h2>
              <?php endif; ?>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">

          
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">El producto sera enviado a:</h2>
                
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
           
              </div>

            </form>
          </div>

          <div class="col-md-5 ml-auto">
            <?php
            while ($f = mysqli_fetch_array($datos3)) {

             
            ?>
              <div class="p-4 border mb-3">
                <div class="col-md-12">
                  <h2 class="h3 mb-3 text-black">Producto Comprado</h2>
                </div>
                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/Decoiart/Carrito/images/<?php echo $f['imagen']; ?>" width="100px" /><br>
                <span class="d-block text-primary h6 text-uppercase"><?php echo $f['nombre_producto']; ?></span><br>
                <span class="d-block text-primary h6 text-uppercase">Cantidad: <?php echo $f['cantidad']; ?></span><br>
                <span class="d-block text-primary h6 text-uppercase">Precio Unitario: $<?php echo $f['precio']; ?></span><br>
                <span class="d-block text-primary h6 text-uppercase">Subtotal: $<?php echo $f['subtotal']; ?></span><br>
                <span class="d-block text-primary h6 text-uppercase">Nombre Vendedor: <?php echo $datos_vendedor[2] . " " . $datos_vendedor[3]; ?></span><br>
                <span class="d-block text-primary h6 text-uppercase">Correo Vendedor: <?php echo $datos_vendedor[4]; ?></span>


              </div>
            <?php } ?>
            <?php if(isset($_SESSION['datos_login'])): ?>
            <h4>Total:<?php echo $datos_usuario[2]; ?></h4>
           <?php else: ?>
            <h4>Total:<?php echo $datos_usuario[5]; ?></h4>
            <?php endif; ?>
  
          </div>
        </div>
      </div>
    </div>


  </div>

 

</body>
</body>
</html>
<?php 
$html = ob_get_clean();
//echo $html;

require_once 'vendor/autoload.php'; 
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
$dompdf->stream("Compra_Decoiart.pdf", array("Attachment" => false));

?>


