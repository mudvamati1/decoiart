<?php

if (isset($_POST['enviar'])) {
    if (!empty($_POST['nombre']) && !empty($_POST['mensaje']) && !empty($_POST['email']) && !empty($_POST['descripcion'])) {
        $nombre = $_POST['nombre'];
        $mensaje = $_POST['mensaje'];
        $email = $_POST['email'];
        $descripcion = $_POST['descripcion'];
        $header = "From: noreply@example.com" . "\r\n";
        $header .= "Reply-To: noreply@example.com" . "\r\n";
        $header .= "X-Mailer: PHP/". phpversion();
        mail($email,$mensaje,$descripcion,$header);
        if ($mail) {
            echo "<h4>¡Mail enviado exitosamente!</h4>";
        }
    }
}

?>