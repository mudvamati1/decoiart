<?php


 function getRegion(){
    
require_once '../Carrito/php/conexion.php';
    $id = $_POST['id'];
    $query = "SELECT * FROM region";
    $result = $conexion->query($query);
    $region = '<option value="0">Elige una opción</option>';
    while($row = $result->fetch_assoc()){
      $region .= "<option value='$row[id]'>$row[nombre]</option>";
    }
    return $region;
  }
  
  echo getRegion();