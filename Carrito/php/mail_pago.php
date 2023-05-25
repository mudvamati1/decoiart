<?php
$id_venta = $_GET['id_venta'];



if (isset($_SESSION['datos_login'])) {
    $arregloUsuario = $_SESSION['datos_login'];
    $id_venta = $_GET['id_venta'];
    $to = $arregloUsuario["email"];
    $subject = 'Gracias por tu compra en DECOIART.CL';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu compra' . $arregloUsuario["nombre"] . " " . $arregloUsuario['apellido'] . '</h1>
    
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
    $mail = $_SESSION['mail'];
    for ($i = 0; $i < count($mail); $i++) {
        $total = $total + ($mail[$i]['Precio'] * $mail[$i]['Cantidad']);
        $message .= '<tr><td style="border: 1px solid black">' . $mail[$i]['Nombre'] . '</td>';
        $message .= '<td style="border: 1px solid black">' . $mail[$i]['Precio'] . '</td>';
        $message .= '<td style="border: 1px solid black">' . $mail[$i]['Cantidad'] . '</td>';
        $message .= '<td style="border: 1px solid black">' . ($mail[$i]['Cantidad'] * $mail[$i]['Precio']) . '</td></tr>';
    }

    $message .= ' </tbody></table>';
    $message .= '<h2>Total de la compra:' . $total . '</h2>';

    $message .= '   <a href="http://localhost/Decoiart/Carrito/verpedido.php?id_venta=' . $id_venta . '" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
    Ver pedido
    </a> 
    </body>
    
    </html>';

    if (mail($to, $subject, $message, $header)) {


    } else {
        echo 'No se pudo enviar el email';
    }

} else {
    $prueba = $conexion->query("SELECT 
v.*, 
i.rut,i.nombre,i.apellidos,i.correo
 FROM ventas_invitado v 
 INNER JOIN invitado i on i.rut = v.rut_usuario
 WHERE id=" . $_GET['id_venta']);
    $datos = mysqli_fetch_assoc($prueba);
   
    $to = $datos['correo'];
    $subject = 'Gracias por tu compra en DECOIART.CL';
    $from = 'tienda@midominio.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $message = '<!DOCTYPE html>
    <body>
        <h1 style="color:black">Gracias por tu compra' . $datos['nombre'] . " " . $datos['apellidos'] . '</h1>
    
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
    $mail = $_SESSION['mail'];


    for ($i = 0; $i < count($mail); $i++) {
        $total = $total + ($mail[$i]['Precio'] * $mail[$i]['Cantidad']);
        $message .= '<tr><td>' . $mail[$i]['Nombre'] . '</td>';
        $message .= '<td>' . $mail[$i]['Precio'] . '</td>';
        $message .= '<td>' . $mail[$i]['Cantidad'] . '</td>';
        $message .= '<td>' . ($mail[$i]['Cantidad'] * $mail[$i]['Precio']) . '</td></tr>';
    }

    $message .= ' </tbody></table>';
    $message .= '<h2>Total de la compra:' . $total . '</h2>';

    $message .= '   <a href="http://localhost/Decoiart/Carrito/verpedido.php?id_venta=' . $id_venta . '" style="background-color:brown;color:white;padding:10px;text-decoration: none;">
    Ver pedido
    </a> 
    </body>
    
    </html>';
  

    if (mail($to, $subject, $message, $header)) {


    } else {
        echo 'No se pudo enviar el email';
    }

}



?>