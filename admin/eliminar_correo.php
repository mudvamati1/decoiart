<?php

require_once '../Carrito/php/conexion.php';

$conexion->query("DELETE FROM contacto WHERE id_contacto=".$_POST['id']);
