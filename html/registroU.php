<?php
session_start();
if(isset($_SESSION['datos_login'])){
  $arregloUsuario = $_SESSION['datos_login'];
}

require_once '../Carrito/php/conexion.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Registro</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css1/formulario.css">
  <link rel="stylesheet" type="text/css" href="../css1/index.css">
  <link rel="icon" type="text/css" href="../img/iart.ico">
</head>
<nav>

  <div class="logo">


    <a href="login.php"> <img src="../img/iart.png" alt="Home"></a>
  </div>
  <ul class="nav-links">

    <li><a href="index.php"><span class="spi">Trabajos</span> </a> </li>

    <li><a href="contacto.php"><span class="spi">Contacto</span></a> </li>
    <?php if (isset($_SESSION['datos_login'])) { ?>
      <li><a href='../admin/index.php'><span class='spi'><i class="fa fa-user">Perfil</i></span></a></li>
    <?php } else { ?>
      <li><a href="Login.php"><span class="spi">Login</span></a> </li>
    <?php }  ?>

    <li><a href="registroU.php"><span class="spi">Registrarse</span></a> </li>
    <li><a href="../Carrito/index.php"><span class="spi"><i class="fa fa-shopping-cart">MarketPlace</i></span></a> </li>



    <button class="switch" id="switch">
      <span class="spi"><i class="fas fa-sun"></i></span>
      <span class="spi"><i class="fas fa-moon"></i></span>
    </button>

  </ul>
  <div class="burger">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
  </div>
</nav>
<script src="../js1/index.js"></script>
<script src="../js1/oscuro.js"></script>

<body>
  <main>
    <form action="registro.php" method="POST" class="form-register">
      <h2>Registrarse</h2><br>
      <input class="controls" type="text" minlength="2" name="nombre" id="txtNombre" required pattern="[a-zA-Z]{2,254}" placeholder="Nombre" title="DEBE SER SOLO TEXTO">
      <input class="controls" type="text" minlength="2" name="apellido" id="apellidos" id="apellido" required pattern="[a-zA-Z ]{2,254}" placeholder="Apellido" title="DEBE SER SOLO TEXTO">
      <input class="controls" type="email" name="email" required id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="ejemplo@ejemplo.com">
      <input class="controls" type="password" name="password" id="password" placeholder="******">
      <input class="controls" type="password" id="password2" placeholder="******">
      <input class="controls" type="date" name="fecha" required id="txtFecha" pattern="\d{1,2}/\d{1,2}/\d{4}" title="Ingrese el formato solicitado" value="yyyy/mm/dd">
      <input class="controls" type="text" name="rut" required id="txt_rut" pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido" placeholder="Rut sin puntos y con guion">
      <select class="controls" name="region" id="region" required>
      </select><br>
      <select class="controls" id="comuna" name="comuna"></select><br>
      <input class="controls" type="text" name="direccion" placeholder="Ej: Rene schneider">
      <select class="controls" name="usuario" id="usuario">
        <option value="">Seleccione</option>
        <option value="1">Cliente</option>
        <option value="2">Vendedor</option>
      </select>
      <button class="botons" type="submit" value="Registrarse" name="btnsendd" id="btnsendd"> Registrarse</button>
      <p><a href="#">¿Ya tienes cuenta?</a></p>
    </form>
  </main>

  <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
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