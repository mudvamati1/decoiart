<?php
session_start();
require("Conexion.be.php");



$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conexion, trim($_POST['telefono'])) : false;
$correo = isset($_POST['correo']) ? mysqli_real_escape_string($conexion, trim($_POST['correo'])) : false;
$mensaje = isset($_POST['mensaje']) ? mysqli_real_escape_string($conexion, trim($_POST['mensaje'])) : false;
$carpeta = "../Carrito/images/";
$nombreimg = $_FILES['imagen']['name'];
$temp = explode('.', $nombreimg);
$extension = end($temp);
$nombrefinal = time() . '.' . $extension;
if ($nombre && $telefono && $correo && $mensaje) {
    if ($extension == 'jpg' || $extension == 'png') {
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {
            $conexion->query("INSERT INTO contacto(id_contacto,nombre,telefono,correo,mensaje,adjunto,fecha,estado) VALUES
     (
         NULL,
        '$nombre',
        '$telefono',
        '$correo',
        '$mensaje',
        '$nombrefinal',
        CURRENT_TIMESTAMP(),
        1
        
      )   
     ") or die($conexion->error);

            $ok = "Se ha enviado con exito su mensaje";
            $_SESSION['success'] = $ok;
            include '../Carrito/php/mail_contacto.php';
            header("Location: Contacto.php");
        } else {
            $ok = "No se pudo subir la imagen";
            $_SESSION['error'] = $ok;
            header("Location: Contacto.php");
        }
    } else {
        $conexion->query("INSERT INTO contacto(id_contacto,nombre,telefono,correo,mensaje,adjunto,fecha,estado) VALUES
    (
        NULL,
       '$nombre',
       '$telefono',
       '$correo',
       '$mensaje',
       NULL,
       CURRENT_TIMESTAMP(),
       1
       
     )   
    ") or die($conexion->error);
        $ok = "Se ha enviado con exito su mensaje";
        $_SESSION['success'] = $ok;
        include '../Carrito/php/mail_contacto.php';
        header("Location: Contacto.php");
    }
}else{
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
    header("Location: Contacto.php");
}