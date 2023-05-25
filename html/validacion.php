<?php
$correo = $_POST['correo'];
$contraseña = sha1($_POST['contraseña']);
session_start();
$_SESSION['correo'] = $correo;

$conexion = mysqli_connect("localhost", "root", "", "decoiart");
$consulta = "SELECT * FROM usuarios where correo='$correo'";

$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas > 0) { // Se valida que el correo ingresado esta en la base de datos

    $con = "SELECT password FROM usuarios where correo='$correo'";
    $res = mysqli_query($conexion, $consulta);
    $formateado = mysqli_fetch_array($res);


    if ($formateado['estado'] == 0) {

        if (isset($_COOKIE["blockAccount"])) { // entra al 3er intento
            // print_r($formateado['Rut']);
            $rut = $formateado['rut'];
            $con = "UPDATE usuarios SET estado = 1 WHERE rut='$rut'"; // update de la columna bloqueo a 1 = bloqueado
            mysqli_query($conexion, $con);
            setcookie("Account", $count, time() - 120);
            setcookie("block" . "Account", $count, time() - 10);
            echo "<script>alert('Usuario Bloqueado contacte con un administrador');window.location='./login.php'</script>";

        } else {

            if ($formateado['password'] == $contraseña) { // se valida que la contraseña es correcta
                // codigo para inicializar sesion


                $rut = $formateado[0];
                $nombre = $formateado[1];
                $apellido = $formateado[2];
                $email = $formateado[3];
                $fdn = $formateado[5];
                $comuna = $formateado[6];
                $direccion = $formateado[7];
                $region = $formateado[8];
                $nivel = $formateado[11];
                $_SESSION['datos_login'] = array(
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'rut' => $rut,
                    'email' => $email,
                    'fdn' => $fdn,
                    'comuna' => $comuna,
                    'direccion' => $direccion,
                    'region' => $region,
                    'nivel' => $nivel
                );
                $_SESSION['correo'] = $_POST['correo'];
                $_SESSION['rut'] = $formateado[0];

                header("Location: ../admin/index.php");
            } else {

                if (isset($_COOKIE["Account"])) {

                    $count = $_COOKIE["Account"];
                    $count++;
                    setcookie("Account", $count, time() + 120);

                    if ($count > 1) {
                        setcookie("block" . "Account", $count, time() + 10); // Se blockea por 10 segundos antes de volver a intentar
                    }
                } else {

                    setcookie("Account", 1, time() + 120);
                }



                header("Location:login.php");

            }

        }
    } else {

        echo "<script>alert('Usuario Bloqueado contacte con un administrador');window.location='./login.php'</script>";

    }

    //$datos = mysqli_fetch_array($resultado); // Formateo de datos obtenido de la Base Datos
    //print_r($datos['Rut']); // Para mostrar el contenido de las variables PHP (Imprimir)





} else {
    $conexion = mysqli_connect("localhost", "root", "", "decoiart");
    $consulta = "SELECT * FROM vendedores where correo='$correo'";

    $resultado = mysqli_query($conexion, $consulta);

    $filas = mysqli_num_rows($resultado);

    if ($filas > 0) { // Se valida que el correo ingresado esta en la base de datos

        $con = "SELECT password FROM vendedores where correo='$correo'";
        $res = mysqli_query($conexion, $consulta);
        $formateado = mysqli_fetch_array($res);


        if ($formateado['estado'] == 0) {

            if (isset($_COOKIE["blockAccount"])) { // entra al 3er intento
                // print_r($formateado['Rut']);
                $rut = $formateado['rut_vendedor'];
                $con = "UPDATE vendedores SET estado = 1 WHERE rut_vendedor='$rut'"; // update de la columna bloqueo a 1 = bloqueado
                mysqli_query($conexion, $con);
                setcookie("Account", $count, time() - 120);
                setcookie("block" . "Account", $count, time() - 10);
                echo "<script>alert('Usuario Bloqueado contacte con un administrador');window.location='./login.php'</script>";

            } else {

                if ($formateado['password'] == $contraseña) { // se valida que la contraseña es correcta
                    // codigo para inicializar sesion


                    $rut = $formateado[0];
                    $nombre = $formateado[1];
                    $apellido = $formateado[2];
                    $email = $formateado[3];
                    $fdn = $formateado[5];
                    $comuna = $formateado[6];
                    $direccion = $formateado[7];
                    $region = $formateado[8];
                    $nivel = $formateado[11];
                    $_SESSION['datos_login'] = array(
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'rut' => $rut,
                        'email' => $email,
                        'fdn' => $fdn,
                        'comuna' => $comuna,
                        'direccion' => $direccion,
                        'region' => $region,
                        'nivel' => $nivel
                    );
                    $_SESSION['correo'] = $_POST['email'];
                    $_SESSION['rut'] = $formateado[0];

                    header("Location: ../admin/index.php");
                } else {

                    if (isset($_COOKIE["Account"])) {

                        $count = $_COOKIE["Account"];
                        $count++;
                        setcookie("Account", $count, time() + 120);

                        if ($count > 1) {
                            setcookie("block" . "Account", $count, time() + 10); // Se blockea por 10 segundos antes de volver a intentar
                        }
                    } else {

                        setcookie("Account", 1, time() + 120);
                    }



                    header("Location:login.php");

                }
            }
        } else {

            echo "<script>alert('Usuario Bloqueado contacte con un administrador');window.location='./login.php'</script>";

        }

        //$datos = mysqli_fetch_array($resultado); // Formateo de datos obtenido de la Base Datos
        //print_r($datos['Rut']); // Para mostrar el contenido de las variables PHP (Imprimir)


    }
}