<?php
session_start();
require_once '../Carrito/php/conexion.php';

$rut = isset($_POST['rut']) ? mysqli_real_escape_string($conexion, trim($_POST['rut'])) : false;
$nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, trim($_POST['nombre'])) : false;
$apellido = isset($_POST['apellidos']) ? mysqli_real_escape_string($conexion, trim($_POST['apellidos'])) : false;
$email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false;
$password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, trim(sha1($_POST['password']))) : false;
$fechaDN = $_POST['fecha'];
$region = $_POST['region'];
$comuna = $_POST['comuna'];
$direccion = isset($_POST['direccion']) ? mysqli_real_escape_string($conexion, trim($_POST['direccion'])) : false;
// Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
if ((empty($rut)) || strlen($rut) < 9) {
    echo "<script>alert('Rut vacio o largo no valido ');window.location='usuarios.php'</script>";
    exit();

}

// Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
// numérico
$parteNumerica = str_replace(substr($rut, -2, 2), '', $rut);

if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
    echo "<script>alert('La parte numerica solo debe contener numeros ');window.location='usuarios.php'</script>";
    exit();

}

$guionYVerificador = substr($rut, -2, 2);
// Verifica que el guion y dígito verificador tengan un largo de 2.
if (strlen($guionYVerificador) != 2) {
    echo "<script>alert('Error en el largo del digito verificador  ');window.location='usuarios.php'</script>";
    exit();

}

// obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
    echo "<script>alert('El digito verificador no es valido ');window.location='usuarios.php'</script>";
    exit();

}

// Valida que sólo sean números, excepto el último dígito que pueda ser k
if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
    echo "<script>alert('Error al digitar el rut ');window.location='usuarios.php'</script>";
    exit();

}

$rutV = preg_replace('/[\.\-]/i', '', $rut);
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
    echo "<script>alert('El rut ingresado no es valido');window.location='usuarios.php'</script>";
    exit();

}

$verficar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$email' ");
$verficar_correo3 = mysqli_query($conexion, "SELECT * FROM vendedores WHERE correo='$email' ");

if (mysqli_num_rows($verficar_correo) > 0 || mysqli_num_rows($verficar_correo3) > 0) {

    echo "<script>alert('Correo Existente ');window.location='usuarios.php'</script>";
    exit();
}


$verficar_Rut = mysqli_query($conexion, "SELECT * FROM usuarios WHERE rut='$rut' ");

if (mysqli_num_rows($verficar_Rut) > 0) {

    echo "<script>alert('Rut Existente');window.location='usuarios.php'</script>";
    exit();
}

if ($_POST['password'] == $_POST['p2']) {
    if ($rut && $nombre && $apellido && $email && $password && $direccion) {
        if (isset($_POST['btnsendd'])) {

            date_default_timezone_set("America/Santiago");
            $end = $fechaDN;
            $fecha_actual = strtotime(date("Y-m-d H:i:s"));
            $fecha_nacimiento = strtotime($end);

            if ($fecha_actual < $fecha_nacimiento) {
                echo "<script>alert('La fecha no puede ser mayor a la actual');window.location='usuarios.php'</script>";
            } else {
                $queryregistrar = "INSERT INTO usuarios (rut,nombre,apellidos,correo,password,fecha_nac,comuna,direccion,region,estado,created_at,nivel)
  VALUES ('$rut','$nombre','$apellido','$email','$password','$fechaDN',$comuna,'$direccion',$region,0,NOW(),1)";

                if (mysqli_query($conexion, $queryregistrar)) {
                    $ok = "Se ha agregado el usuario satisfactoriamente";
                    $_SESSION['success'] = $ok;

                    header("Location: usuarios.php");
                } else {
                    echo "Error:" . $queryregistrar . "<br>" . mysqli_error($conexion);
                }
            }
        }
    } else {
        $ok = "Campo(s) vacios";
        $_SESSION['error'] = $ok;
      
        header("Location: usuarios.php");
    }
} else {
    $ok = "Las contraseñas no coinciden";
    $_SESSION['error'] = $ok;
  
    header("Location: usuarios.php");
}