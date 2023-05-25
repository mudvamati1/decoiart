<?php
session_start();
if (isset($_SESSION['datos_login'])) {
    $arregloUsuario = $_SESSION['datos_login'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y registro</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="../Carrito/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Carrito/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Carrito/css/css/magnific-popup.css">
    <link rel="stylesheet" href="../Carrito/css/css/jquery-ui.css">
    <link rel="stylesheet" href="../Carrito/css/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Carrito/css/css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../Carrito/css/aos.css">

    <link rel="stylesheet" href="../Carrito/css/style.css">

    <script src='main.js'></script>
    <script src="../js1/jquery-3.2.1.js"></script>
    <script src="../js1/script2.js"></script>
    <script src="../js1/ubicacion.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Decoiart/css1/Login.css">
    <link rel="icon" type="text/css" href="../img/iart.ico">
    <script src="https://kit.fontawesome.com/048fc24e51.js" crossorigin="anonymous"></script>


</head>

<body>

    <div class="site-wrap">

    <?php include '../html/header.php' ?>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Tienda</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <?php if (isset($_COOKIE['Account'])): ?>
                    <div class="alert alert-danger" role="alert">
                    Llevas  <?= $_COOKIE['Account']; ?> intento(s) al tercer intento se bloqueara tu cuenta

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
               

                <?php endif; ?>
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
                <main>
                    <div class="contenedor_todo">
                        <div class="detras">

                            <div class="detras_login">
                                <h3>¿Ya tienes cuenta?</h3>
                                <h3>Inicia Sesion para entrar en la pagina</h3>
                                <button id="btn_iniciar_sesion">Iniciar Sesion</button>
                            </div>
                            <div class="detras_registro">
                                <h3>¿Aun no tienes cuenta?</h3>
                                <h3>Registrate para que puedas iniciar sesion</h3>
                                <button id="btn_registrarse">Registrarse</button>
                            </div>
                        </div>
                        <div class="contenedor_login_register">
                            <form action="validacion.php" method="POST" class="formulario_login">
                                <h2>Iniciar Sesion</h2>
                                <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Ejemplo ejemplo@ejemplo.com" placeholder="Correo Electronico" name="correo" required>
                                <input type="password" placeholder="Contraseña" name="contraseña" required>
                                <a href="restablecer.php">Recuperar contraseña</a></br>
                                <button> Iniciar Sesion</button>
                            </form>
                            <form action="registro.php" method="POST" class="formulario_register">
                                <h2>Registrarse</h2>
                               
                                <input class="form-control" type="text" minlength="2" name="nombre" id="txtNombre" required
                                    pattern="[a-zA-Z]{2,254}" placeholder="Nombre" title="DEBE SER SOLO TEXTO">
                                <input class="form-control" type="text" minlength="2" name="apellido" id="apellidos"
                                    id="apellido" required pattern="[a-zA-Z ]{2,254}" placeholder="Apellido"
                                    title="DEBE SER SOLO TEXTO">
                                <input class="form-control" type="email" name="email" required id="email"
                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="ejemplo@ejemplo.com" placeholder="ejemplo@ejemplo.com">
                                <input class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"  type="password" required name="password" id="password"
                                    placeholder="******" title="Debe contener al menos 8 caracteres una letra mayuscula, un numero y un caracter especial">
                                <input class="form-control"  type="password" required name="p2" title="Debe contener al menos 8 caracteres una letra mayuscula, un numero y un caracter especial" id="password2" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$"  placeholder="******">
                                <input class="form-control" type="date" name="fecha" required id="txtFecha"
                                    pattern="\d{1,2}/\d{1,2}/\d{4}" title="Ingrese el formato solicitado"
                                    value="yyyy/mm/dd">
                                <input class="form-control" type="text" name="rut" required id="txt_rut"
                                    pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido, sin puntos y con guion"
                                    placeholder="Rut sin puntos y con guion">
                                    
                                <select class="form-control" name="region" id="region" required>
                                </select><br>
                                <select class="form-control" id="comuna" name="comuna"></select><br>
                                <input class="form-control" type="text"  pattern="{2,254}" name="direccion" required placeholder="Ej: Rene schneider">
                                <select class="form-control" name="usuario" id="usuario" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Cliente</option>
                                    <option value="2">Vendedor</option>
                                </select>
                                <button id="valida" name="btnsendd"> Registrarse</button>
                            </form>
                            


                        </div>

                    </div>
                </main>
                <script src="../js1/js.js"></script>

            </div>


        </div>
    </div>
                </br>
                </br>
                </br>
                </br>
    <?php include("../Carrito/layouts/footer.php"); ?>


    </div>

    <script src="../Carrito/js/jquery-3.3.1.min.js"></script>
    <script src="../Carrito/js/jquery-ui.js"></script>
    <script src="../Carrito/js/popper.min.js"></script>
    <script src="../Carrito/js/bootstrap.min.js"></script>
    <script src="../Carrito/js/owl.carousel.min.js"></script>
    <script src="../Carrito/js/jquery.magnific-popup.min.js"></script>
    <script src="../Carrito/js/aos.js"></script>

    <script src="../Carrito/js/main.js"></script>
    <script src="../admin/dashboard/plugins/jquery/jquery.min.js"></script>
  <script >

$(document).ready(function(){
    $.ajax({
     url: ('../admin/cargar_region.php'),
    method: 'POST'
     
    })
    .done(function(regiones){
      $('#region').html(regiones)
    })
    .fail(function(){
      alert('Hubo un errror al cargar las regiones')
    })
  
    $('#region').on('change', function(){
      var id = $('#region').val()
      $.ajax({
        url: ('../admin/cargar_comuna.php'),
        method: 'POST',
        data: {'id': id}
      })
      .done(function(regiones){
        $('#comuna').html(regiones)
      })
      .fail(function(){
        alert('Hubo un error al cargar las comunas')
      });
    });
  });
  </script>



</body>

</html>