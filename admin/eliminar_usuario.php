<?php

require_once '../Carrito/php/conexion.php';

$conexion->query("DELETE FROM usuarios WHERE rut='".$_POST['id']."'");
