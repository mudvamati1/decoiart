<?php 
if(isset($_POST)){
    //Conexion a la base de datos
    require_once '../Carrito/php/conexion.php';

    $id = isset($_POST['id_venta']) ? $_POST['id_venta']:false;
    $envio = isset($_POST['precio']) ? (int)$_POST['precio']: false;
   

   

  
 if($id && $envio){
    $sql = "UPDATE cotizaciones SET id_medida  = $envio,  estatus = 6 WHERE id_cotizacion = $id";
    $conexion->query($sql);
    $datos = $conexion->query("SELECT c.*, u.nombre, u.apellidos AS 'apellido', u.correo FROM cotizaciones c
    INNER JOIN usuarios u ON u.rut = c.rut_usuario
     WHERE id_cotizacion = $id");
    $cotizacion = mysqli_fetch_assoc($datos);
    include('../Carrito/php/mail_pago_cotizacion.php');
     
    header("Location: panel-cotizaciones-admin.php");
 }
 



   
}