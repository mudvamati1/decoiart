<?php 
session_start();
include './conexion.php';
if(!isset($_GET['id_venta'])){
    header("Location: ../index.php");
}
$arregloCant = $_SESSION['cantidad'];
$arregloId = $_SESSION['id'];


if(isset($_GET['id_venta'])){
$id_venta = $_GET['id_venta'] ;   
$query2 = $conexion ->query("DELETE FROM envios WHERE id_venta=$id_venta")or die($conexion ->error);
$query1 = $conexion ->query("DELETE FROM productos_venta WHERE id_venta=$id_venta")or die($conexion ->error);
$query = $conexion ->query("DELETE FROM ventas WHERE id=$id_venta")or die($conexion ->error);



$conexion->query("UPDATE productos SET inventario = inventario +" . $arregloCant . " WHERE id_producto=" . $arregloId) or die($conexion->error);

unset($_SESSION['cantidad']);
unset($_SESSION['id']);




}
echo "<script>alert('Tu pedido ha sido cancelado');window.location='../index.php'</script>";
?>