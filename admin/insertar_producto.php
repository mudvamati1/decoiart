<?php
session_start();
require_once '../Carrito/php/conexion.php';
$rut = $_SESSION['rut'];

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
$precio = isset($_POST['precio']) ? (int) $_POST['precio'] : false;
$inventario = isset($_POST['inventario']) ? (int) $_POST['inventario'] : false;
$categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
$caracteristicas = isset($_POST['caracteristicas']) ? mysqli_real_escape_string($conexion, trim($_POST['caracteristicas'])) : false;
$carpeta = "../Carrito/images/";
$nombreimg = $_FILES['imagen']['name'];
$temp = explode('.', $nombreimg);
$extension = end($temp);
$nombrefinal = time() . '.' . $extension;
if ($nombre && $descripcion && $precio && $inventario && $categoria && $caracteristicas) {
    if ($extension == 'jpg' || $extension == 'png') {
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
            $conexion->query("INSERT INTO productos (id_producto,nombre,descripcion,precio,imagen,inventario,id_categoria,talla,rut_vendedor) VALUES
        (
            NULL,
           '$nombre',
           '$descripcion',
           $precio,
           '$nombrefinal',
           $inventario,
           $categoria,
           '$caracteristicas',
           '$rut'
         )   
        ") or die($conexion->error);
            $ok = "Se ha agregado el producto satisfactoriamente";
            $_SESSION['success'] = $ok;
            header("Location: productos.php");
        } else {
            header("Location: productos.php?error=No se pudo subir la imagen");
        }
    } else {
        header("Location: productos.php?error=Solo se acepta formato png y jpg");
    }
} else {
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
    header("Location: productos.php");
}