<?php

require_once '../Carrito/php/conexion.php';

$fila = $conexion->query('SELECT imagen FROM cuadros WHERE id='.$_POST['id']);
$id = mysqli_fetch_row($fila);
if(file_exists('../Carrito/images/'.$id[0])){
 unlink('../Carrito/images/'.$id[0]);
}
$conexion->query("DELETE FROM cuadros WHERE id=".$_POST['id']);
echo "Su producto se ha eliminado con exito";   