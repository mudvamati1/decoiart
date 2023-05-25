<?php
session_start();
require_once '../Carrito/php/conexion.php';
$rut = $_SESSION['rut'];

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
$precio = isset($_POST['precio']) ? (int)$_POST['precio'] : false;
$inventario = isset($_POST['inventario']) ? (int)$_POST['inventario'] : false;
$categoria = isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
$medidas = isset($_POST['medidas']) ? mysqli_real_escape_string($conexion, trim($_POST['medidas'])) : false;

$carpeta = "../Carrito/images/";
$nombreimg = $_FILES['imagen']['name'];
$temp = explode('.', $nombreimg);
$extension = end($temp);
$nombrefinal = time() . '.' . $extension;
if ($extension == 'jpg' || $extension == 'png') {
  if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
    $conexion->query("INSERT INTO cuadros (id,nombre,descripcion,precio,imagen,inventario,id_categoria,medidas,vendedor) VALUES
        (
            NULL,
           '$nombre',
           '$descripcion',
           $precio,
           '$nombrefinal',
           $inventario,
           $categoria,
           '$medidas',
           '$rut'
         )   
        ") or die($conexion->error);
    header("Location: menuAdmin.php");
    $ok = "Se ha agregado el producto satisfactoriamente";
    $_SESSION['success'] = $ok;
  } else {
    header("Location: menuAdmin.php");
    $ok = "No se ha podido agregar el producto ";
    $_SESSION['success'] = $ok;
  }
} else {
  header("Location: menuAdmin.php?error=Solo se acepta formato png y jpg");
}
