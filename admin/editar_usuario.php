<?php
session_start();
require_once '../Carrito/php/conexion.php';


$rut = $_POST['rut'];
$nombre= isset($_POST['nombre']) ? mysqli_real_escape_string($conexion,trim($_POST['nombre'])) : false;
$apellido= isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion,trim($_POST['apellidos'])) : false;
$email= isset($_POST['email']) ? mysqli_real_escape_string($conexion,trim($_POST['email'])) : false;
$comuna= isset($_POST['comuna']) ? (int)$_POST['comuna'] : false;
$direccion= isset($_POST['direccion'])? mysqli_real_escape_string($conexion, trim($_POST['direccion'])) : false;
$region= isset($_POST['region']) ? (int)$_POST['region'] : false;
$estado= isset($_POST['estado']) ? (int)$_POST['estado'] : false;





if ($nombre && $apellido && $email && $comuna && $direccion && $region ) {
    $conexion->query("UPDATE usuarios SET nombre ='" . $nombre . "',
apellidos ='" . $apellido . "',
correo ='" . $email . "',
comuna =" . $comuna . ",
direccion ='" . $direccion . "',
region = " . $region . ",
estado = " . $estado . "
WHERE rut='" . $rut . "'") or die($conexion->error);
    header("Location: usuarios.php");
    $_SESSION['successEdit'] = "Se ha actualizado el usuario satisfactoriamente";
}else{
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
    
    header("Location: editar_usuario1.php?rut=".$rut);
}