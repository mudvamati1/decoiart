<?php
session_start();
unset($_SESSION['datos_login']);
unset($_SESSION['carrito']);
unset( $_SESSION['correo']);
unset($_SESSION['rut']);
unset($_SESSION['error']);
setcookie("block" . "Account", $count, time() - 10);
header("Location: ../index.php");

?>