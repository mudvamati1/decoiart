<?php 
if(isset($_POST)){
    //Conexion a la base de datos
    require_once '../Carrito/php/conexion.php';

    $id = isset($_POST['id_venta']) ? $_POST['id_venta']:false;
    $envio = isset($_POST['envio']) ? (int)$_POST['envio']: false;
  
  

  
 if($id && $envio){
    $sql = "UPDATE envios SET estado_envio = $envio WHERE id_venta = $id";
    $guardar = mysqli_query($conexion, $sql);
    header("Location: pedidos.php");
 }
 



   
}