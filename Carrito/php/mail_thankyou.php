<?php

if(isset($_SESSION['datos_login'])){
    $arregloUsuario = $_SESSION['datos_login'];
}

$id_venta = $_GET['id_venta'];


if(isset($_GET['metodo']) && isset($_GET['id_venta']) && isset($_GET['invitado'])){
    $to = $datos["correo"];
    $subject = 'Gracias por tu compra en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu compra'.$datos["nombre"]." ".$datos['apellido'] .'</h1>
    
        <h3>Detalles de la compra:</h3>
        <table style="border: 1px solid black">
            <thead>
                <tr style="border: 1px solid black">
                <td>Rut vendedor</td>
                <td>Medidas</td>
                <td>Descripcion</td>
                <td>Cantidad</td>
                <td>Imagen cotizada</td>
                </tr>
            </thead>
            <tbody>';
           
            
            $message.='<tr><td style="border: 1px solid black">'.$datos['rut_vendedor'].'</td>';
            $message.='<td style="border: 1px solid black">'.$datos['medidas'].'</td>';
            $message.='<td style="border: 1px solid black">'.$datos['descripcion'].'</td>';
            $message.='<td style="border: 1px solid black">'.$datos['cantidad'].'</td>';
            $message.='<td style="border: 1px solid black"><img src="http://'.$_SERVER['HTTP_HOST'].'/Decoiart/Carrito/images/'.$datos['imagen'].'" width="100px" width="100px" ></td>';
    
    $message.=' </tbody></table></br>';
  
   
    $message.='   <a href="http://localhost/Decoiart/Carrito/ver_cotizacion.php?invitado&id='.$datos['id_cotizacion'].'" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
   Ver pedido
    </a> 
    </body>
    
    </html>';
    if(mail($to,$subject,$message,$header)){
       
        
    }else{
        echo 'No se pudo enviar el email';
    }
     
}else{
    $to = $datos["correo"];
    $subject = 'Gracias por tu compra en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu compra'.$datos["nombre"]." ".$datos['apellido'] .'</h1>
    
        <h3>Detalles de la compra:</h3>
        <table style="border: 1px solid black">
            <thead>
                <tr style="border: 1px solid black">
                <td>Rut vendedor</td>
                <td>Medidas</td>
                <td>Descripcion</td>
                <td>Cantidad</td>
                <td>Imagen cotizada</td>
                </tr>
            </thead>
            <tbody>';
           
            
            $message.='<tr><td style="border: 1px solid black">'.$datos['rut_vendedor'].'</td>';
            $message.='<td style="border: 1px solid black">'.$datos['medidas'].'</td>';
            $message.='<td style="border: 1px solid black">'.$datos['descripcion'].'</td>';
            $message.='<td style="border: 1px solid black">'.$datos['cantidad'].'</td>';
            $message.='<td style="border: 1px solid black"><img src="http://'.$_SERVER['HTTP_HOST'].'/Decoiart/Carrito/images/'.$datos['imagen'].'" width="100px" width="100px" ></td>';
    
    $message.=' </tbody></table></br>';
    
   
    $message.='   <a href="http://localhost/Decoiart/Carrito/ver_cotizacion.php?id='.$datos['id_cotizacion'].'" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
   Ver pedido
    </a> 
    </body>
    
    </html>';
    if(mail($to,$subject,$message,$header)){
       
        
    }else{
        echo 'No se pudo enviar el email';
    }
    
}



?>