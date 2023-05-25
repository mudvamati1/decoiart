<?php 
    include "./conexion.php";
    $email =$_POST['email'];
    $token =$_POST['token'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1=sha1($p1);
        $verficar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$email' ");
        $verficar_correo3 = mysqli_query($conexion, "SELECT * FROM vendedores WHERE correo='$email' ");
        if(mysqli_num_rows($verficar_correo) > 0){
        $conexion->query("update usuarios set password='$p1' where correo='$email' ")or die($conexion->error);
        header("Location: ../../html/login.php?pass=Se ha actualizado con exito la contraseña");
        }else if(mysqli_num_rows($verficar_correo3) > 0){
            $conexion->query("update vendedores set password='$p1' where correo='$email' ")or die($conexion->error);
            header("Location: ../../html/login.php?pass=Se ha actualizado con exito la contraseña");
        }
    }else{
    echo "No coinciden";
    
    header("Location: ../../html/reset.php?email=".$email."&token=".$token."");
    }
?>