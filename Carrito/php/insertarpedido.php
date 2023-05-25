<?php
session_start();
include './conexion.php';
if (!isset($_SESSION['carrito'])) {
  header("Location: ../index.php");
}
if(isset($_SESSION['datos_login'])){
  $arregloUsuario = $_SESSION['datos_login'];
}
if(isset($_SESSION['correo'])){
  $correo = $_SESSION['correo'];
}
if(isset($_SESSION['rut'])){
  $rut = $_SESSION['rut'];
}
$arreglo = $_SESSION['carrito'];
$rut1 = isset($_POST['rut']) ? mysqli_real_escape_string($conexion, trim($_POST['rut'])) : false;
$nombre = isset($_POST['c_fname']) ? mysqli_real_escape_string($conexion, trim($_POST['c_fname'])) : false;
$apellido = isset($_POST['c_lname']) ? mysqli_real_escape_string($conexion, trim($_POST['c_lname'])) : false;
$email = isset($_POST['c_email_address']) ? mysqli_real_escape_string($conexion, trim($_POST['c_email_address'])) : false;
$fdn = isset($_POST['fdn']) ? mysqli_real_escape_string($conexion, trim($_POST['fdn'])) : false;
$region = isset($_POST['region']) ? mysqli_real_escape_string($conexion, trim($_POST['region'])) : false;
$comuna = isset($_POST['c_state_country']) ? mysqli_real_escape_string($conexion, trim($_POST['c_state_country'])) : false;
$direccion = isset($_POST['c_address']) ? mysqli_real_escape_string($conexion, trim($_POST['c_address'])) : false;
$region1 = isset($_POST['region1']) ? mysqli_real_escape_string($conexion, trim($_POST['region1'])) : false;
$comuna1 = isset($_POST['c_state_country1']) ? mysqli_real_escape_string($conexion, trim($_POST['c_state_country1'])) : false;
$direccion1 = isset($_POST['c_address1']) ? mysqli_real_escape_string($conexion, trim($_POST['c_address1'])) : false;
$telefono = isset($_POST['c_phone']) ? mysqli_real_escape_string($conexion, trim($_POST['c_phone'])) : false;

$total = 0;
for ($i = 0; $i < count($arreglo); $i++) {
  $total = $total + $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'];
}
if (isset($_POST['c_account_password'])) {
  if ($_POST['c_account_password'] != "") {
    $password = isset($_POST['c_account_password']) ? mysqli_real_escape_string($conexion, trim(sha1($_POST['c_account_password']))) : false;
  }
}


if (isset($_SESSION['datos_login'])) {
  $query = $conexion->query("SELECT rut, correo FROM usuarios WHERE correo='$correo'") or die($conexion->error);

  $id_usuario = 0;
  if (mysqli_num_rows($query) > 0) {
    $fila = mysqli_fetch_array($query);

    $id_usuario = $fila["rut"];
  } else {
    echo "error";
  }
} else if($rut1 && $nombre && $apellido && $email && $fdn) {
  // Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
 if ((empty($rut1)) || strlen($rut1) < 9) {
  echo "<script>alert('Rut vacio o largo no valido ');window.location='../checkout.php'</script>";
  exit();

}

// Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
// numérico
$parteNumerica = str_replace(substr($rut1, -2, 2), '', $rut1);

if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
  echo "<script>alert('La parte numerica solo debe contener numeros ');window.location='../checkout.php'</script>";
  exit();

}

$guionYVerificador = substr($rut1, -2, 2);
// Verifica que el guion y dígito verificador tengan un largo de 2.
if (strlen($guionYVerificador) != 2) {
  echo "<script>alert('Error en el largo del digito verificador  ');window.location='../checkout.php'</script>";
  exit();

}

// obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
  echo "<script>alert('El digito verificador no es valido ');window.location='../checkout.php'</script>";
  exit();

}

// Valida que sólo sean números, excepto el último dígito que pueda ser k
if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut1)) {
  echo "<script>alert('Error al digitar el rut ');window.location='../checkout.php'</script>";
  exit();

}

$rutV = preg_replace('/[\.\-]/i', '', $rut1);
$dv = substr($rutV, -1);
$numero = substr($rutV, 0, strlen($rutV) - 1);
$i = 2;
$suma = 0;
foreach (array_reverse(str_split($numero)) as $v) {
  if ($i == 8) {
      $i = 2;
  }
  $suma += $v * $i;
  ++$i;
}
$dvr = 11 - ($suma % 11);
if ($dvr == 11) {
  $dvr = 0;
}
if ($dvr == 10) {
  $dvr = 'K';
}
if ($dvr == strtoupper($dv)) {

} else {
  echo "<script>alert('El rut ingresado no es valido');window.location='../checkout.php'</script>";
  exit();

}
  $conexion->query("INSERT INTO invitado(id_invitado,rut,nombre,apellidos,correo,fecha_nac,created_at) 
  VALUES( 
    'NULL',
    '" . $rut1 . "',
    '" . $nombre . "', 
    '" . $apellido . "',
    '" . $email . "',
    '" . $fdn . "',
    NOW()
    
   
  
    )
  ") or die($conexion->error);
}else{
  $ok = "Campo(s) vacios";
  $_SESSION['error'] = $ok;
  header("Location: ../checkout.php");
  exit();
}




for ($i = 0; $i < count($arreglo); $i++) {

  $datos4 = $conexion->query("SELECT rut_vendedor FROM productos WHERE id_producto =" . $arreglo[$i]['Id']);
  $datos_vendedor = mysqli_fetch_row($datos4);



  $fecha = date('Y-m-d h:m:s');
  if (isset($_SESSION['datos_login'])) {
    $ventas = $conexion->query("INSERT INTO ventas(id,rut_usuario,total,fecha,rut_vendedor) 
VALUES(NULL,
'" . $rut . "',
$total,
'$fecha',
'" . $datos_vendedor[0] . "')") or die($conexion->error);


  } else {
    $conexion->query("INSERT INTO ventas_invitado(id,rut_usuario,nombre,apellido,correo,total,fecha,rut_vendedor) 
    VALUES(NULL,'" . $_POST['rut'] . "',
     '" . $nombre . "', 
    '" . $apellido . "',
    '" . $email . "',
    $total,'$fecha','" . $datos_vendedor[0] . "')") or die($conexion->error);
  }

}


$id_venta = $conexion->insert_id;

for ($i = 0; $i < count($arreglo); $i++) {
  $datos4 = $conexion->query("SELECT rut_vendedor FROM productos WHERE id_producto =" . $arreglo[$i]['Id']);
  $categoria = $conexion->query("SELECT id_categoria from productos WHERE id_producto =" . $arreglo[$i]['Id']);

  $id_categoria = mysqli_fetch_row($categoria);
  $datos_vendedor = mysqli_fetch_row($datos4);


  $total = $total + $arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad'];
  if(isset($_SESSION['datos_login'])){
    $conexion->query("INSERT INTO productos_venta (id_venta,id_producto,cantidad,precio,subtotal,rut_vendedor,estatus,id_categoria) 
    VALUES(
      $id_venta,
    " . $arreglo[$i]['Id'] . ",
    " . $arreglo[$i]['Cantidad'] . ",
    " . $arreglo[$i]['Precio'] . ",
    " . $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'] . ",
    '" . $datos_vendedor[0] . "',
    6,
    " . $id_categoria[0] . "
      
    )
    ") or die($conexion->error);
  $conexion->query("UPDATE productos SET inventario = inventario -" . $arreglo[$i]['Cantidad'] . " WHERE id_producto=" . $arreglo[$i]['Id']) or die($conexion->error);
  $_SESSION['cantidad'] = $arreglo[$i]['Cantidad'];
  $_SESSION['id'] = $arreglo[$i]['Id'];
  }else{
    $conexion->query("INSERT INTO productos_venta_invitado(id_venta,id_producto,cantidad,precio,subtotal,rut_vendedor,estatus,id_categoria) 
    VALUES(
      $id_venta,
    " . $arreglo[$i]['Id'] . ",
    " . $arreglo[$i]['Cantidad'] . ",
    " . $arreglo[$i]['Precio'] . ",
    " . $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio'] . ",
    '" . $datos_vendedor[0] . "',
    6,
    " . $id_categoria[0] . "
      
    )
    ") or die($conexion->error);
  $conexion->query("UPDATE productos SET inventario = inventario -" . $arreglo[$i]['Cantidad'] . " WHERE id_producto=" . $arreglo[$i]['Id']) or die($conexion->error);
  $_SESSION['cantidad'] = $arreglo[$i]['Cantidad'];
  $_SESSION['id'] = $arreglo[$i]['Id'];
  }
 
}

if ($region1 && $direccion1 && $comuna1 && $telefono) {
  if (isset($_SESSION['datos_login'])) {
    $conexion->query("INSERT INTO envios(region,direccion, comuna, cp, id_venta,telefono,estado_envio) VALUES
  (
    " . $_POST['region1'] . ",
    '" . $_POST['c_address1'] . "',
    " . $_POST['c_state_country1'] . ",
    '" . $_POST['c_postal_zip'] . "',
    
    $id_venta,
    '" . $_POST['c_phone'] . "',
    1
      )
  ") or die($conexion->error);
  } else {
    $conexion->query("INSERT INTO envios_invitado(region,direccion, comuna, cp, id_venta,telefono,estado_envio) VALUES
(
  " . $_POST['region1'] . ",
  '" . $_POST['c_address1'] . "',
  " . $_POST['c_state_country1'] . ",
  '" . $_POST['c_postal_zip'] . "',
  
  $id_venta,
  '" . $_POST['c_phone'] . "',
  1
    )
") or die($conexion->error);
  }
}else{
  $ok = "Campo(s) vacios";
  $_SESSION['error'] = $ok;
  header("Location: ../checkout.php");
  exit();
}






include "./mail.php";

unset($_SESSION['carrito']);
if(isset($_SESSION['datos_login'])){
  header("Location: ../pagar.php?id_venta=" . $id_venta);
}else{
  header("Location: ../pagar.php?invitado&id_venta=" . $id_venta);
}

?>