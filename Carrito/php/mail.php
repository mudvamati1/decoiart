<?php

$arregloUsuario = $_SESSION['datos_login'];

if(isset($_SESSION['datos_login'])){
    $to = $arregloUsuario["email"];
    $subject = 'Gracias por tu compra en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu compra'.$arregloUsuario["nombre"]." ".$arregloUsuario['apellido'] .'</h1>
    
        <h3>Detalles de la compra:</h3>
        <table style="border: 1px solid black">
            <thead>
                <tr style="border: 1px solid black">
                    <td>Nombre del productos</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>';
            $total = 0;
            $arregloCarrito = $_SESSION['carrito'];
            for ($i = 0; $i < count($arregloCarrito); $i++) {
              $total = $total + ($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
              $message.='<tr><td style="border: 1px solid black">'.$arregloCarrito[$i]['Nombre'].'</td>';
              $message.='<td style="border: 1px solid black">'.$arregloCarrito[$i]['Precio'].'</td>';
              $message.='<td style="border: 1px solid black">'.$arregloCarrito[$i]['Cantidad'].'</td>';
              $message.='<td style="border: 1px solid black">'.($arregloCarrito[$i]['Cantidad']*$arregloCarrito[$i]['Precio']).'</td></tr>';
            }
    
    $message.=' </tbody></table>';
    $message.='<h2>Total de la compra:' .$total.'</h2>';
    $message.='Su pedido se realizara una vez concretado el pago';
    $message.='   <a href="http://localhost/Decoiart/Carrito/pagar.php?id_venta='.$id_venta.'" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
    Realizar pago
    </a> 
    </body>
    
    </html>';
    if(mail($to,$subject,$message,$header)){
       
        
    }else{
        echo 'No se pudo enviar el email';
    }
     
}else{
    $to = $_POST['c_email_address'];
    $subject = 'Gracias por tu compra en DECOIART.CL';
    $from = 'tienda@midominio.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu compra'.$_POST['c_fname']." ".$_POST['c_lname'] .'</h1>
    
        <h3>Detalles de la compra:</h3>
        <table>
            <thead>
                <tr>
                    <td>Nombre del productos</td>
                    <td>Precio</td>
                    <td>Cantidad</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>';
            $total = 0;
            $arregloCarrito = $_SESSION['carrito'];

           
            for ($i = 0; $i < count($arregloCarrito); $i++) {
              $total = $total + ($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);
              $message.='<tr><td>'.$arregloCarrito[$i]['Nombre'].'</td>';
              $message.='<td>'.$arregloCarrito[$i]['Precio'].'</td>';
              $message.='<td>'.$arregloCarrito[$i]['Cantidad'].'</td>';
              $message.='<td>'.($arregloCarrito[$i]['Cantidad']*$arregloCarrito[$i]['Precio']).'</td></tr>';
            }
    
    $message.=' </tbody></table>';
    $message.='<h2>Total de la compra:' .$total.'</h2>';
    $message.='Su pedido se realizara una vez concretado el pago';
    $message.='   <a href="http://localhost/Decoiart/Carrito/pagar.php?id_venta='.$id_venta.'" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
    Realizar pago
    </a> 
    </body>
    
    </html>';
    
    
    
    
    if(mail($to,$subject,$message,$header)){
       
        
    }else{
        echo 'No se pudo enviar el email';
    }
    
}



?>

    
    
    
    
