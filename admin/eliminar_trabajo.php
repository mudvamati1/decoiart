<?php
session_start();
require_once '../Carrito/php/conexion.php';

$fila = $conexion->query('SELECT imagen FROM trabajos WHERE id='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../img/'.$id[0])){
 unlink('../img/'.$id[0]);
}
 $conexion->query("DELETE FROM trabajos WHERE id=".$_POST['id']);