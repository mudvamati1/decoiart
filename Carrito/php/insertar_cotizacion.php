<?php
session_start();
include './conexion.php';
if ($_POST) {

    //Verificar si existe el usuario logeado
    if (isset($_SESSION['datos_login'])) {
        $arregloUsuario = $_SESSION['datos_login'];
        $rut = $arregloUsuario['rut'];
        $usuario = isset($_POST['usuario']) ? mysqli_real_escape_string($conexion, trim($_POST['usuario'])) : false;
        $vendedor = isset($_POST['vendedor']) ? mysqli_real_escape_string($conexion, trim($_POST['vendedor'])) : false;
        $medidas = isset($_POST['medidas']) ? mysqli_real_escape_string($conexion, trim($_POST['medidas'])) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
        $cantidad = isset($_POST['cantidad']) ? mysqli_real_escape_string($conexion, trim($_POST['cantidad'])) : false;
        $carpeta = "../images/";
        $nombreimg = $_FILES['imagen']['name'];
        $temp = explode('.', $nombreimg);
        $extension = end($temp);
        $nombrefinal = time() . '.' . $extension;
        $region = $_POST['region'];
        $comuna = $_POST['c_state_country'];
        $direccion = isset($_POST['c_address']) ? mysqli_real_escape_string($conexion, trim($_POST['c_address'])) : false;
        if ($medidas && $descripcion && $cantidad && $direccion) {
            if ($extension == 'jpg' || $extension == 'png') {
                if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {

                    $conexion->query("INSERT INTO cotizaciones(id_cotizacion,rut_usuario,rut_vendedor,id_medida,estatus,imagen,descripcion,cantidad,created_at,medidas) VALUES
                (
                    NULL,
                   '$rut',
                   '$vendedor',
                   NULL,
                   5,
                   '$nombrefinal',
                   '$descripcion',
                   $cantidad,
                   CURRENT_TIMESTAMP(),
                   '$medidas' 
                 )   
                ") or die($conexion->error);
                    $id = $conexion->insert_id;
                    $conexion->query("INSERT INTO envios_cotizacion(id_envio,region,direccion,comuna,id_venta,estado_envio) VALUES
                (
                    NULL,
                    $region,
                    '$direccion',
                    $comuna,
                    $id,
                    1
                )
                ") or die($conexion->error);
                    $id = $conexion->insert_id;
                    include 'mail_cotizacion.php';

                    header("Location: ../ver_cotizacion.php?id=" . $id);
                } else {
                    $ok = "No se pudo subir la imagen";
                    $_SESSION['error'] = $ok;
                    header("Location: ../cotizacion.php");
                }
            } else {
                $ok = "Solo se acepta formato png y jpg";
                $_SESSION['error'] = $ok;
                header("Location: ../cotizacion.php");
            }
        } else {
            $ok = "Campo(s) vacios";
            $_SESSION['error'] = $ok;
            header("Location: ../cotizacion.php");
        }
    } else {

        //Si no existe el usuario logeado se inserta en la tabla de invitados el usuario en la base de datos
        
        $rut = isset($_POST['rut']) ? mysqli_real_escape_string($conexion, trim($_POST['rut'])) : false;
        $nombre = isset($_POST['c_fname']) ? mysqli_real_escape_string($conexion, trim($_POST['c_fname'])) : false;
        $apellido = isset($_POST['c_lname']) ? mysqli_real_escape_string($conexion, trim($_POST['c_lname'])) : false;
        $correo = isset($_POST['c_email_address']) ? mysqli_real_escape_string($conexion, trim($_POST['c_email_address'])) : false;
        $region = $_POST['region'];
        $comuna = $_POST['c_state_country'];
        $direccion = isset($_POST['c_address']) ? mysqli_real_escape_string($conexion, trim($_POST['c_address'])) : false;
        $vendedor = $_POST['vendedor'];
        $medidas = isset($_POST['medidas']) ? mysqli_real_escape_string($conexion, trim($_POST['medidas'])) : false;
        $carpeta = "../images/";
        $nombreimg = $_FILES['imagen']['name'];
        $temp = explode('.', $nombreimg);
        $extension = end($temp);
        $nombrefinal = time() . '.' . $extension;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($conexion, trim($_POST['descripcion'])) : false;
        $cantidad = isset($_POST['cantidad']) ? mysqli_real_escape_string($conexion, trim($_POST['cantidad'])) : false;
        
        // Verifica que no esté vacio y que el string sea de tamaño mayor a 3 carácteres(1-9)        
        if ((empty($rut)) || strlen($rut) < 9) {
            echo "<script>alert('Rut vacio o largo no valido ');window.location='../cotizacion.php'</script>";
            exit();

        }

        // Quitar los últimos 2 valores (el guión y el dígito verificador) y luego verificar que sólo sea
// numérico
        $parteNumerica = str_replace(substr($rut, -2, 2), '', $rut);

        if (!preg_match("/^[0-9]*$/", $parteNumerica)) {
            echo "<script>alert('La parte numerica solo debe contener numeros ');window.location='../cotizacion.php'</script>";
            exit();

        }

        $guionYVerificador = substr($rut, -2, 2);
        // Verifica que el guion y dígito verificador tengan un largo de 2.
        if (strlen($guionYVerificador) != 2) {
            echo "<script>alert('Error en el largo del digito verificador  ');window.location='../cotizacion.php'</script>";
            exit();

        }

        // obliga a que el dígito verificador tenga la forma -[0-9] o -[kK]
        if (!preg_match('/(^[-]{1}+[0-9kK]).{0}$/', $guionYVerificador)) {
            echo "<script>alert('El digito verificador no es valido ');window.location='../cotizacion.php'</script>";
            exit();

        }

        // Valida que sólo sean números, excepto el último dígito que pueda ser k
        if (!preg_match("/^[0-9.]+[-]?+[0-9kK]{1}/", $rut)) {
            echo "<script>alert('Error al digitar el rut ');window.location='../cotizacion.php'</script>";
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
            echo "<script>alert('El rut ingresado no es valido');window.location='../cotizacion.php'</script>";
            exit();

        }
        if ($rut && $nombre && $apellido && $correo && $medidas && $descripcion && $cantidad && $direccion) {
        if ($extension == 'jpg' || $extension == 'png') {
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta . $nombrefinal)) {

                $conexion->query("INSERT INTO cotizaciones_invitado(id_cotizacion,rut_usuario,nombre,apellido,correo,rut_vendedor,id_medida,estatus,imagen,descripcion,cantidad,created_at,medidas) VALUES
                (
                    NULL,
                   '$rut',
                   '$nombre',
                   '$apellido',
                   '$correo',
                   '$vendedor',
                   NULL,
                   5,
                   '$nombrefinal',
                   '$descripcion',
                   $cantidad,
                   CURRENT_TIMESTAMP(),
                   '$medidas' 
                 )   
                ") or die($conexion->error);
                $id = $conexion->insert_id;
                $conexion->query("INSERT INTO envios_cotizacion_invitado(id_envio,region,direccion,comuna,id_venta,estado_envio) VALUES
                (
                    NULL,
                    $region,
                    '$direccion',
                    $comuna,
                    $id,
                    1
                )
                ");
                include 'mail_cotizacion.php';

                header("Location: ../ver_cotizacion.php?invitado=hola&id=" . $id);
            } else {
                $ok = "No se pudo subir la imagen";
                $_SESSION['error'] = $ok;
                header("Location: ../cotizacion.php");
            }
        } else {
            $ok = "Solo se acepta formato png y jpg";
            $_SESSION['error'] = $ok;
            header("Location: ../cotizacion.php");
        }
    }else{
        $ok = "Campo(s) vacios";
        $_SESSION['error'] = $ok;
        header("Location: ../cotizacion.php");
    }
    }
}