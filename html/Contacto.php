<?php
session_start();
if (isset($_SESSION['datos_login'])) {
    $arregloUsuario = $_SESSION['datos_login'];
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="../Carrito/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Carrito/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Carrito/css/css/magnific-popup.css">
    <link rel="stylesheet" href="../Carrito/css/css/jquery-ui.css">
    <link rel="stylesheet" href="../Carrito/css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Carrito/css/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../Carrito/css/aos.css">
    <link rel="stylesheet" href="../Carrito/css/style.css">

    <link rel="icon" type="text/css" href="../img/iart.ico">
    <script src="https://kit.fontawesome.com/048fc24e51.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css1/estilos.css">
    <link rel="stylesheet" href="../css1/wsp.css">
    <link rel="stylesheet" href="../css1/font-awesome.css">
    <script src="../js1/jquery-3.2.1.js"></script>
    <script src="../js1/script.js"></script>

</head>

<?php include '../html/header.php' ?>


<body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://api.whatsapp.com/send?phone=56922232662&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n." class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    <?php

if (isset($_SESSION['success'])) {


?>
    <div class="alert alert-success" role="alert">
        <?= $_SESSION['success'] ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }
?>
<?php $_SESSION['success'] = null; ?>

<?php

if (isset($_SESSION['error'])) {


?>
    <div class="alert alert-danger" role="alert">
        <?= $_SESSION['error'] ?>

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php }
?>
<?php $_SESSION['error'] = null; ?>
    <section class="form_wrap">
       



        <section class="cantact_info">
            <section class="info_title">
                <span class=" fa fa-user-circle"></span>
                <h2>INFORMACION<br>DE CONTACTO</h2>
            </section>
            <section class="info_items">
                <p><span class="fa fa-envelope"></span> imagineart.contact@gmail.com</p>
                <p><span class="fa fa-whatsapp"></span> +56922232662</p>
                <a href="https://www.facebook.com/decoiart.cl">
                    <p><span class="fa fa-facebook"></span> Decoiart.cl</p>
                    <a href="https://www.instagram.com/decoiart.cl_/?hl=es-la">
                        <p><span class="fa fa-instagram"></span> decoiart.cl</p>
                    </a>
            </section>

        </section>

        <form action="enviar.php" method="POST" enctype="multipart/form-data" class="form_contact">
            <h2>Envia un mensaje</h2>
            <div class="user_info">
                <label for="names">Nombre y apellido *</label>
                <input type="text" id="names" name="nombre" required pattern="[a-zA-Z ]{2,254}" title="Ingrese un nombre valido" placeholder="Escriba su nombre y apellido">

                <label for="phone">Telefono / Celular</label>
                <input type="text" id="phone" name="telefono" pattern="[0-9]{9}" title="Ingrese un numero valido" placeholder="+5695555555">

                <label for="email">Correo electronico *</label>
                <input type="text" id="email" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ingrese un correo valido" required placeholder="ejemplo@ejemplo.com">

                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" required placeholder="Escriba su mensaje aqui"></textarea>
                <label for="adjunto">Archivo adjunto </label>
                <input type="file" id="imagen" name="imagen">

                <input type="submit" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

    </section>

</body>
 <!-- jQuery -->
 <script src="../Admin/dashboard/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../Admin/dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="../Admin/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../Admin/dashboard/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../Admin/dashboard/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="../Admin/dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="../Admin/dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../Admin/dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../Admin/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../Admin/dashboard/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../Admin/dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../Admin/dashboard/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../Admin/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../Admin/dashboard/dist/js/adminlte.js"></script>
    <!-- Bootstrap Js -->
    <script src="../Admin/dashboard/docs/assets/plugins/bootstrap/js/bootstrap.js"></script>

</html>