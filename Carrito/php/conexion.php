<?php

$host = "localhost";
$user = "root";
$clave = "";
$bd  = "decoiart";

$conexion = mysqli_connect($host,$user,$clave,$bd);
if($conexion -> connect_error){
    die("No se pudo conectar");
}




?>