<?php
session_start();
require_once '../Carrito/php/conexion.php';
$rut = $_SESSION['rut'];

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
$categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
$carpeta = "../img/";
$nombreimg = $_FILES['imagen']['name'];
$temp = explode('.', $nombreimg);
$extension = end($temp);
$nombrefinal = time() . '.' . $extension;
if ($nombre && $descripcion && $categoria ) {
    if ($extension == 'jpg' || $extension == 'png') {
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
            $conexion->query("INSERT INTO trabajos (id,nombre,descripcion,imagen,fecha,id_categoria) VALUES
        (
            NULL,
           '$nombre',
           '$descripcion',
           '$nombrefinal',
           NOW(),
           $categoria
           
         )   
        ") or die($conexion->error);
            $ok = "Se ha agregado el trabajo satisfactoriamente";
            $_SESSION['success'] = $ok;
            header("Location: trabajos.php");
        } else {
            $_SESSION['error'] = "No se pudo subir la imagen";
            header("Location: trabajos.php");
        }
    } else {
        $_SESSION['error'] = "Solo se acepta formato png y jpg";
        header("Location: trabajos.php");
    }
} else {
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
    header("Location: trabajos.php");
}