<?php
session_start();
require_once '../Carrito/php/conexion.php';
$respuesta = isset($_POST['respuesta']) ? mysqli_real_escape_string($conexion, trim($_POST['respuesta'])) : false;

$id = $_POST['rut'];
$correo = $_POST['correo'];



if($respuesta){
    $conexion->query("INSERT INTO respuesta (id_respuesta,id_correo,respuesta)  VALUES(
        NULL,
        ".$id.",
        '".$respuesta."'
        
        )")or die($conexion->error);
        
        $conexion->query("UPDATE contacto SET estado = 2 WHERE id_contacto =" . $id) or die($conexion->error);
        
        include "../Carrito/php/mail_respuesta.php";
        
        header("Location: contacto-vendedor.php");
        $_SESSION['successEdit'] =  "Se ha enviado el correo satisfactoriamente";
}else{
    $ok = "Campo(s) vacios";
    $_SESSION['error'] = $ok;
  
    header("Location: contestar_correo.php?rut=".$id);
}

