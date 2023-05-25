<?php
session_start();
require_once '../Carrito/php/conexion.php';
$id_producto = $_POST['id_producto'];


$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
$categoria = isset($_POST['categoria']) ? (int)trim($_POST['categoria']) : false;


if ($nombre && $descripcion && $categoria) {
    if ($_FILES['imagen']['name'] != '') {
        $carpeta = "../img/";
        $nombreimg = $_FILES['imagen']['name'];
        $temp = explode('.', $nombreimg);
        $extension = end($temp);
        $nombrefinal = time() . '.' . $extension;
        if ($extension == 'jpg' || $extension == 'png') {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
                $fila = $conexion->query("SELECT imagen FROM trabajos WHERE id=" . $id_producto);
                $id = mysqli_fetch_row($fila);
                if (file_exists('../img/' . $id[0])) {
                    unlink('../img/' . $id[0]);
                }

                $conexion->query("UPDATE trabajos SET imagen ='" . $nombrefinal . "' WHERE id=" . $id_producto);
            }else{
                $_SESSION['error'] = "No se pudo subir la imagen";
                header("Location: trabajos.php");
            }
        }else{
            $_SESSION['error'] = "Solo se acepta formato png y jpg";
            header("Location: trabajos.php");
        }
    }


    $conexion->query("UPDATE trabajos SET nombre ='" . $nombre . "',
descripcion ='" . $descripcion . "',
id_categoria = " . $categoria . ",
fecha = NOW()
WHERE id =" . $id_producto) or die($conexion->error);
    $ok = "Se ha actualizado el registro con exito";
    $_SESSION['successEdit'] = $ok;
    header("Location: trabajos.php");
} else {
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
    header("Location: trabajos.php");
}
