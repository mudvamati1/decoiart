<?php

require_once '../Carrito/php/conexion.php';

$conexion->query("DELETE FROM vendedores WHERE rut_vendedor='".$_POST['id']."'");
