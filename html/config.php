<?php

$host = "localhost";
$user = "root";
$clave = "";
$bd  = "decoiart";

$conexion = mysqli_connect($host,$user,$clave,$bd);

if($conexion){
    echo "Conectado correctamente";
}else{
    echo "No se pudo conectar";
}

?>