<?php 
if(isset($_POST)){
    //Conexion a la base de datos
    require_once '../Carrito/php/conexion.php';

    $id = isset($_POST['id_venta']) ? $_POST['id_venta']:false;
    $envio = isset($_POST['estatus']) ? (int)$_POST['estatus']: false;
  


  
 if($id && $envio){
    $sql = "UPDATE cotizaciones_invitado SET estatus = $envio WHERE id_cotizacion = $id";
    $conexion->query($sql);
    $datos = $conexion->query("SELECT c.*, e.estatus FROM cotizaciones_invitado c 
    INNER JOIN estatus e ON e.id = c.estatus 
    WHERE id_cotizacion = $id");
    $cotizacion = mysqli_fetch_assoc($datos);
    
    include('../Carrito/php/mail_estado_envio.php');
    header("Location: panel-cotizaciones-invitado-admin.php");
 }
 



   
}