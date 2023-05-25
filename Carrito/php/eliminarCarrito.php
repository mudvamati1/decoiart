<?php

session_start();
$arreglo = $_SESSION['carrito'];
$mail = $_SESSION['mail'];
if(isset($_SESSION['carrito']) && isset($_SESSION['mail'])){
    for($i = 0; $i<count($arreglo); $i++){
        if($arreglo[$i]['Id'] != $_POST['id']){
            $arregloNuevo[] = array(
                'Id' => $arreglo[$i]['Id'],
                'Nombre' => $arreglo[$i]['Nombre'],
                'Precio' => $arreglo[$i]['Precio'],
                'Imagen' => $arreglo[$i]['Imagen'],
                'Cantidad' => $arreglo[$i]['Cantidad']
            );
        }
    }
    if(isset($arregloNuevo)){
        $_SESSION['carrito']=$arregloNuevo;
        $_SESSION['mail']=$arregloNuevo;
    
    }else{
        //Quiere decir que el registro a eliminar es el unico que habia
        unset($_SESSION['carrito']);
        unset($_SESSION['mail']);
    }
    echo "listo";
}else if (isset($_SESSION['carrito'])){
    for($i = 0; $i<count($arreglo); $i++){
        if($arreglo[$i]['Id'] != $_POST['id']){
            $arregloNuevo[] = array(
                'Id' => $arreglo[$i]['Id'],
                'Nombre' => $arreglo[$i]['Nombre'],
                'Precio' => $arreglo[$i]['Precio'],
                'Imagen' => $arreglo[$i]['Imagen'],
                'Cantidad' => $arreglo[$i]['Cantidad']
            );
        }
    }
    if(isset($arregloNuevo)){
        $_SESSION['carrito']=$arregloNuevo;
    
    }else{
        //Quiere decir que el registro a eliminar es el unico que habia
        unset($_SESSION['carrito']);
    }
    echo "listo";
}


?>