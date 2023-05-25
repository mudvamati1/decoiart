<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro usuario</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="stylesheet" type="text/css" href="../css1/index.css">
    <link rel="stylesheet" type="text/css" href="../../Decoiart/css1/Login.css">
    <script src='main.js'></script>
    <script src="../js1/jquery-3.2.1.js"></script>
    <script src="https://kit.fontawesome.com/048fc24e51.js" crossorigin="anonymous"></script>
    <script src="../js1/script2.js"></script>
    <script src="../js1/ubicacion.js"></script>
    <link rel="stylesheet" href="../css1/estilos.css">
</head>
<nav>

    <div class="logo">


        <a href="login.php"> <img src="../img/iart.png" alt="Home"></a>
    </div>
    <ul class="nav-links">
        
        <li><a href="Trabajos.php">Trabajos </a> </li>
      
        <li><a href="contacto.php">Contacto</a> </li>
        <li><a href="Login.php">Login</a> </li>
        <li><a href="RegistroUsuario.php">Registrarse</a> </li>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <form action="registro.php" method="POST" >
        <br><br>
        <center>
          <table border="0">
            <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="txtNombre" required pattern="[a-zA-Z ]{2,254}" placeholder="Ej: Matias" title="DEBE SER SOLO TEXTO"><br>
        </center>
        <br>
        <center>
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido"  id="apellidos"  id="apellido" required  pattern="[a-zA-Z ]{2,254}" placeholder="Ej: Acevedo" title="DEBE SER SOLO TEXTO">
        </center>
        <br>
        <center>
        <label for="email">Email</label>
        <input type="email" name="email" required id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="ejemplo@ejemplo.com">
        </center>
        <br>
        <center>
        <label for="password">Password</label>
        <input type="password" name="password" required id="txtPassword" placeholder="********">
        </center>
        <br>
        <center>
        <label for="Cpassword">Confirme password</label>
        <input type="password" name="Cpassword" required id="txtConfirmar" placeholder="********">
        </center>
        <br>
        <center>
        <label for="FDN"> Fecha de nacimiento</label>
       <input type="date" name="FDN" required id="txtFecha" pattern="\d{1,2}/\d{1,2}/\d{4}" title="Ingrese el formato solicitado" placeholder="dd/mm/yyyy">
        </center>
        <center>
        <br>
        <label for="rut">Rut</label>
        <input type="text" name="rut" required id="txtRut" pattern="\d{3,8}-[\d|kK]{1}" title="Debe ser un Rut válido" placeholder="Rut sin puntos y con guion">
        </center>
        <br>
        <center>
        <select id="regiones" name="region"></select>
        </center>
        <br>
        <center>
        <select id="comunas" name="comuna"></select>
        </center>
        <br>
        <center>
        <label for="direccion">Direccion</label>
        <input type="text" name="direccion"  placeholder="Ej: Rene schneider" >
        </center>
        <br>
        <center>
        <input type="submit"  value="Registrar" id="btnsendd">
        </center>
        <br>
      </table>
    </form>
</body>
</html>
