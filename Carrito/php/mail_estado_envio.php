<?php
session_start();
$arregloUsuario = $_SESSION['datos_login'];


if (isset($_SESSION['datos_login'])) {
    $to = $cotizacion['correo'];
    $subject = 'Gracias por tu cotizacion en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Se ha actualizado el estado de tu pedido ' . $cotizacion["nombre"] . " " . $cotizacion['apellido'] . '</h1>
    
        <h3>Detalles de la compra:</h3>
        <table style="border: 1px solid black">
            <thead>
                <tr style="border: 1px solid black">
                    <td>Rut vendedor</td>
                    <td>Medidas</td>
                    <td>Descripcion</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Imagen cotizada</td>
                    <td>Estado</td>
                </tr>
            </thead>
            <tbody>';


    $message .= '<tr><td style="border: 1px solid black">' . $cotizacion['rut_vendedor'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['medidas'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['descripcion'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['cantidad'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['id_medida'] . '</td>';
    $message .= '<td style="border: 1px solid black"><img src="http://' . $_SERVER['HTTP_HOST'] . '/Decoiart/Carrito/images/' . $cotizacion['imagen'] . '" width="100px" width="100px" ></td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['estatus'] . '</td>';

    $message .= ' </tbody></table></br>';


    $message .= ' 
    </a> 
    </body>
    
    </html>';

    if (mail($to, $subject, $message, $header)) {


    } else {
        echo 'No se pudo enviar el email';
    }

} else if (isset($_SESSION['datos_login'])) {
    $to = $cotizacion['correo'];
    $subject = 'Gracias por tu cotizacion en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu cotizacion' . $cotizacion["nombre"] . " " . $cotizacion['apellido'] . '</h1>
    
        <h3>Detalles de la compra:</h3>
        <table style="border: 1px solid black">
            <thead>
                <tr style="border: 1px solid black">
                    <td>Rut vendedor</td>
                    <td>Medidas</td>
                    <td>Descripcion</td>
                    <td>Cantidad</td>
                    <td>Precio</td>
                    <td>Imagen cotizada</td>
                </tr>
            </thead>
            <tbody>';


    $message .= '<tr><td style="border: 1px solid black">' . $cotizacion['rut_vendedor'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['medidas'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['descripcion'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['cantidad'] . '</td>';
    $message .= '<td style="border: 1px solid black">' . $cotizacion['id_medida'] . '</td>';
    $message .= '<td style="border: 1px solid black"><img src="http://' . $_SERVER['HTTP_HOST'] . '/Decoiart/Carrito/images/' . $cotizacion['imagen'] . '" width="100px" width="100px" ></td>';


    $message .= ' </tbody></table></br>';


    $message .= '   <a href="http://localhost/Decoiart/Carrito/pagar_cotizacion.php?invitado&id_venta=' . $cotizacion['id_cotizacion'] . '" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
    Pagar cotizacion
    </a> 
    </body>
    
    </html>';




    if (mail($to, $subject, $message, $header)) {


    } else {
        echo 'No se pudo enviar el email';
    }

}