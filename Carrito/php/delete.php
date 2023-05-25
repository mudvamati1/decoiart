<?php
$arreglo = $_SESSION['carrito'];
if(isset($_GET['borrar'])){
    include "./php/conexion.php";
    $conexion ->query("DELETE FROM productos WHERE id_venta=".$_GET['id_venta'])or die($conexion -> error);
    $conexion ->query("DELETE FROM productos_venta WHERE id_venta=".$_GET['id_venta'])or die($conexion -> error);
    $conexion ->query("DELETE FROM envios WHERE id_venta=".$_GET['id_venta'])or die($conexion -> error);
    for ($i = 0; $i < count($arreglo); $i++) {
    $conexion->query("UPDATE productos SET inventario = inventario +". $arreglo[$i]['Cantidad']." WHERE id_producto=".$arreglo[$i]['Id']) or die($conexion->error);
    }
}
