<?php

session_start();
require_once '../Carrito/php/conexion.php';
$fechaini = $_POST['fechaini'];
$fechater = $_POST['fechater'];
$fecha_actual = strtotime(date("Y-m-d H:i:s"));
if($fechater < $fechaini || $fechater > $fecha_actual || $fechaini > $fecha_actual){
  echo "<script>alert('La fecha no puede ser mayor a la actual');window.location='./index.php'</script>";

}else{
  $sql = "SELECT MAX(rut_vendedor) AS 'rut_vendedor', COUNT(rut_vendedor) AS 'total_ventas' 
  FROM ventas WHERE fecha BETWEEN '2022-10-01' AND '2022-11-22' GROUP BY rut_vendedor ORDER BY COUNT(rut_vendedor) DESC LIMIT 1;";
  $_SESSION['fechamax'] = $sql;
  header("Location: index.php?mayor_vendedor&fecha");
}
