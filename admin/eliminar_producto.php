<?php
session_start();
require_once '../Carrito/php/conexion.php';

$fila = $conexion->query('SELECT imagen FROM productos WHERE id_producto='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../Carrito/images/'.$id[0])){
 unlink('../Carrito/images/'.$id[0]);
}
 $conexion->query("DELETE FROM productos WHERE id_producto=".$_POST['id']);
