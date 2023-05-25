<?php
session_start();
require_once '../Carrito/php/conexion.php';
$id_cotizacion = $_POST['id_cotizacion'];
$usuario = isset($_POST['usuario']) ? mysqli_real_escape_string($conexion, trim($_POST['usuario'])) : false;
$vendedor = isset($_POST['vendedor']) ? mysqli_real_escape_string($conexion, trim($_POST['vendedor'])) : false;
$medidas = isset($_POST['medidas']) ? mysqli_real_escape_string($conexion, trim($_POST['medidas'])) : false;
$descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
$cantidad = isset($_POST['cantidad']) ? mysqli_real_escape_string($conexion, trim($_POST['cantidad'])) : false;

if ($medidas && $descripcion && $cantidad) {
    if ($_FILES['imagen']['name'] != '') {
        $carpeta = "../Carrito/images/";
        $nombreimg = $_FILES['imagen']['name'];
        $temp = explode('.', $nombreimg);
        $extension = end($temp);
        $nombrefinal = time() . '.' . $extension;
        if ($extension == 'jpg' || $extension == 'png') {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
                $fila = $conexion->query("SELECT imagen FROM cotizaciones WHERE id_cotizacion=" . $id_cotizacion);
                $id = mysqli_fetch_row($fila);
                if (file_exists('../Carrito/images/' . $id[0])) {
                    unlink('../Carrito/images/' . $id[0]);
                }

                $conexion->query("UPDATE cotizaciones SET imagen ='" . $nombrefinal . "' WHERE id_cotizacion=" . $id_cotizacion);
            }
        }
    }


    $conexion->query("UPDATE cotizaciones SET rut_vendedor ='" . $vendedor . "',
medidas ='" . $medidas . "',
descripcion ='" . $descripcion . "',
cantidad =" . $cantidad . "
WHERE id_cotizacion=" . $id_cotizacion) or die($conexion->error);
    $ok = "Se ha actualizado la cotizacion satisfactoriamente";
    $_SESSION['success'] = $ok;
    header("Location: panel-cotizaciones-usuario.php");
}else{
    $ok = "Campo(s) vacios";
        $_SESSION['error'] = $ok;
        header("Location: ./panel-cotizaciones-usuario.php");
}