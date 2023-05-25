<?php

session_start();
$arreglo = $_SESSION['carrito'];

for($i = 0; $i<count($arreglo); $i++){
    if($arreglo[$i]['Id'] == $_POST['id']){
        $arreglo[$i]['Cantidad']=$_POST['cantidad'];
        $_SESSION['carrito']= $arreglo;
        
        break;
    } 
}

$mail = $_SESSION['mail'];
for($i = 0; $i<count($mail); $i++){
    if($mail[$i]['Id'] == $_POST['id']){
        $mail[$i]['Cantidad']=$_POST['cantidad'];
        $_SESSION['mail']= $mail;
        
        break;
    } 
}

?>