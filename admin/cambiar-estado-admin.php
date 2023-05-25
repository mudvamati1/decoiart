<?php 
if(isset($_POST)){
    //Conexion a la base de datos
    require_once '../Carrito/php/conexion.php';

    $id = isset($_POST['id_venta']) ? $_POST['id_venta']:false;
    $envio = isset($_POST['estatus']) ? (int)$_POST['estatus']: false;
  


  
 if($id && $envio){
    $sql = "UPDATE cotizaciones SET estatus = $envio WHERE id_cotizacion = $id";
    $conexion->query($sql);
    $datos = $conexion->query("SELECT c.*,u.nombre,u.apellidos AS 'apellido',u.correo, e.estatus FROM cotizaciones c
    INNER JOIN usuarios u ON u.rut = c.rut_usuario 
    INNER JOIN estatus e ON e.id = c.estatus 
    WHERE id_cotizacion = $id");
    $cotizacion = mysqli_fetch_assoc($datos);
    include('../Carrito/php/mail_estado_envio.php');
      
    header("Location: panel-cotizaciones-admin.php");
 }
 



   
}