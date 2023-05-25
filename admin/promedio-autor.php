<?php
session_start();
require_once '../Carrito/php/conexion.php';
$vendedor = $_POST['vendedor'];
$fechainimax = $_POST['fechainipro'];
$fechatermax = $_POST['fechaterpro'];
$fechaini = strtotime($fechainimax);
$fechater = strtotime($fechatermax);
$fecha_actual = strtotime(date("Y-m-d"));
$conexion->query("SET lc_time_names = 'es_ES'");
if ($fechatermax < $fechainimax || $fechainimax > $fechatermax || $fechater > $fecha_actual || $fechaini > $fecha_actual) {
  echo "<script>alert('Ingrese la fecha correctamente');window.location='./index.php?lineas&promedio'</script>";
} else {
  $sql = "SELECT rut_vendedor as 'rut', MONTHNAME(fecha) AS 'rut_vendedor' , AVG(total) AS 'total_ventas'
  FROM ventas v 
  WHERE fecha BETWEEN '".$fechainimax."' AND '".$fechatermax."' AND rut_vendedor = '".$vendedor."' GROUP BY MONTH(fecha);";
  $query = $conexion->query($sql);
  foreach ($query as $data) {
    $total[] = $data['total_ventas'];
    $rut_vendedor[] = $data['rut_vendedor'];
    $_SESSION['autor'] = $sql;
    $_SESSION['data'] = $data;
    $_SESSION['inicial'] = $fechainimax;
    $_SESSION['termino'] = $fechatermax;
    $_SESSION['vendedor'] = $vendedor;
    header("Location: index.php?lineas&promedio&autor");
  }
}

