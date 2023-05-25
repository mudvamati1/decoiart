<?php
session_start();
$arregloUsuario = $_SESSION['datos_login'];


if(isset($_SESSION['datos_login'])){
    $to = $arregloUsuario["email"];
    $subject = 'Gracias por tu cotizacion en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu cotizacion'.$arregloUsuario["nombre"]." ".$arregloUsuario['apellido'] .'</h1>
    
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
          
             
              $message.='<tr><td style="border: 1px solid black">'.$vendedor.'</td>';
              $message.='<td style="border: 1px solid black">'.$medidas.'</td>';
              $message.='<td style="border: 1px solid black">'.$descripcion.'</td>';
              $message.='<td style="border: 1px solid black">'.$cantidad.'</td>';
              $message.='<td style="border: 1px solid black"><img src="http://'.$_SERVER['HTTP_HOST'].'/Decoiart/Carrito/images/'.$nombrefinal.'" width="100px" width="100px" ></td>';
            
    
    $message.=' </tbody></table>';
    $message.='El precio se actualizara una vez realizada la cotizacion por parte del vendedor</br></br></br>';
   
    $message.='   <a href="http://localhost/Decoiart/Carrito/ver_cotizacion.php?id='.$id.'" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
    Ver cotizacion
    </a> 
    </body>
    
    </html>';
    if(mail($to,$subject,$message,$header)){
       
        
    }else{
        echo 'No se pudo enviar el email';
    }
     
}else{
    $to = $_POST['c_email_address'];
    $subject = 'Gracias por tu cotizacion en DECOIART.CL';
    $from = 'tienda@midominio.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu cotizacion '.$_POST['c_fname']." ".$_POST['c_lname'] .'</h1>
    
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
      
         
          $message.='<tr><td style="border: 1px solid black">'.$vendedor.'</td>';
          $message.='<td style="border: 1px solid black">'.$medidas.'</td>';
          $message.='<td style="border: 1px solid black">'.$descripcion.'</td>';
          $message.='<td style="border: 1px solid black">'.$cantidad.'</td>';
          $message.='<td style="border: 1px solid black"><img src="http://'.$_SERVER['HTTP_HOST'].'/Decoiart/Carrito/images/'.$nombrefinal.'" width="100px" width="100px" ></td>';
        

$message.=' </tbody></table>';
$message.='El precio se actualizara una vez realizada la cotizacion por parte del vendedor</br></br></br>';

$message.='   <a href="http://localhost/Decoiart/Carrito/ver_cotizacion.php?id='.$id.'" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
Ver cotizacion
</a> 
</body>
    
    </html>';
    
    
    
    
    if(mail($to,$subject,$message,$header)){
       
        
    }else{
        echo 'No se pudo enviar el email';
    }
    
}
