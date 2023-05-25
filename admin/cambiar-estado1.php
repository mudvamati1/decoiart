<?php 
if(isset($_POST)){
    //Conexion a la base de datos
    require_once '../Carrito/php/conexion.php';

    $id = isset($_POST['id_venta']) ? $_POST['id_venta']:false;
    $envio = isset($_POST['estatus']) ? (int)$_POST['estatus']: false;
  


  
 if($id && $envio){
    $sql = "UPDATE productos_venta_invitado SET estatus = $envio WHERE id_venta = $id";
   
    $guardar = mysqli_query($conexion, $sql);
    header("Location: pedidos_invitado.php");
 }
 



   
}