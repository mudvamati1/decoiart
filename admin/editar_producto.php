<?php
session_start();
require_once '../Carrito/php/conexion.php';
$id_producto = $_POST['id_producto'];

$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
$precio = isset($_POST['precio']) ? (int)$_POST['precio'] : false;
$inventario = isset($_POST['inventario']) ? (int)$_POST['inventario'] : false;
$categoria = isset($_POST['categoria']) ? (int)trim($_POST['categoria']) : false;
$caracteristicas = isset($_POST['caracteristicas']) ? mysqli_real_escape_string($conexion, trim($_POST['caracteristicas'])) : false;

if ($nombre && $descripcion && $precio && $inventario && $categoria && $caracteristicas) {
    if ($_FILES['imagen']['name'] != '') {
        $carpeta = "../Carrito/images/";
        $nombreimg = $_FILES['imagen']['name'];
        $temp = explode('.', $nombreimg);
        $extension = end($temp);
        $nombrefinal = time() . '.' . $extension;
        if ($extension == 'jpg' || $extension == 'png') {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
                $fila = $conexion->query("SELECT imagen FROM productos WHERE id_producto=" . $id_producto);
                $id = mysqli_fetch_row($fila);
                if (file_exists('../Carrito/images/' . $id[0])) {
                    unlink('../Carrito/images/' . $id[0]);
                }

                $conexion->query("UPDATE productos SET imagen ='" . $nombrefinal . "' WHERE id_producto=" . $id_producto);
            }
        }
    }


    $conexion->query("UPDATE productos SET nombre ='" . $nombre . "',
descripcion ='" . $descripcion . "',
precio =" . $precio . ",
inventario =" . $inventario . ",
id_categoria =" . $categoria . ",
talla = '" . $caracteristicas . "'
WHERE id_producto=" . $id_producto) or die($conexion->error);
$ok = "Se ha actualizado el registro con exito";
$_SESSION['successEdit'] = $ok;
header("Location: productos.php");
}else{
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
    header("Location: productos.php");
}