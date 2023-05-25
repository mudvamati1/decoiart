<?php




    $to = $email;
    $subject = 'Restablecer password';
    $from = 'decoiart@gmail.com';
    $header = 'MIME-Version 1.0' . "\r\n";
    $header .= 'From: Your name <info@address.com>' . "\r\n";
    $header .= "Content-type: text/html; charset= iso-8859-1\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();
    $codigo= rand(1000,9999);
    $message = '<!DOCTYPE html>
    <body>
  
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contraseña</p>
        <h3>'.$codigo.'</h3>
        <p> <a 
            href="http://localhost/Decoiart/html/reset.php?email='.$email.'&token='.$token.'"> 
            para restablecer da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
    </div>
</body>
</html>
';
$enviado =false;
    if (mail($to, $subject, $message, $header)) {
        $enviado =true;

    } else {
        echo 'No se pudo enviar el email';
    }