<?php


function getComuna(){
    require_once '../Carrito/php/conexion.php';
    $id = $_POST['id'];
    $query = "SELECT * FROM comuna WHERE id_region = $id";
    $result = $conexion->query($query);
    $comuna = '<option value="0">Elige una opción</option>';
    while($row = $result->fetch_assoc()){
      $comuna .= "<option value='$row[id]'>$row[nombre]</option>";
    }
    return $comuna;
  }
  
  echo getComuna();