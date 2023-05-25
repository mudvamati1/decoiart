<?php
session_start();
include("./php/conexion.php");
if (!isset($_GET['id'])) {
    header("Location: ./");
}
if (isset($_GET['id']) && isset($_GET['invitado'])) {
    $datos = $conexion->query("SELECT c.*, v.nombre AS 'nombre_vendedor',v.apellidos AS 'apellido_vendedor', 
    v.rut_vendedor, v.correo,  e.estatus FROM cotizaciones_invitado c
    INNER JOIN vendedores v ON v.rut_vendedor = c.rut_vendedor
    INNER JOIN estatus e ON e.id = c.estatus
    WHERE id_cotizacion=" . $_GET['id']) or die($conexion->error);

    $datos_cotizacion = mysqli_fetch_assoc($datos);
   
} else {
    $datos = $conexion->query("SELECT c.*, u.nombre AS 'nombre_usuario', u.apellidos AS 'apellido_usuario',
    v.nombre AS 'nombre_vendedor',v.apellidos AS 'apellido_vendedor', v.rut_vendedor, v.correo,  e.estatus FROM cotizaciones c
    INNER JOIN usuarios u ON u.rut = c.rut_usuario
    INNER JOIN vendedores v ON v.rut_vendedor = c.rut_vendedor
    
    INNER JOIN estatus e ON e.id = c.estatus
    WHERE id_cotizacion=" . $_GET['id']) or die($conexion->error);

    $datos_cotizacion = mysqli_fetch_assoc($datos);
}








?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ver pedidos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/dashboard/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <div class="site-wrap">
        <?php include './layouts/header.php' ?>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if (isset($_SESSION['datos_login'])): ?>
                        <h2 class="h3 mb-3 text-black">Se ha realizado tu cotizacion con exito <?=
                                $datos_cotizacion['nombre_usuario'] . " " . $datos_cotizacion['apellido_usuario'] ?>
                        </h2>
                        <?php else: ?>
                        <h2 class="h3 mb-3 text-black">Se ha realizado tu cotizacion con exito <?=
                                $datos_cotizacion['nombre'] . " " . $datos_cotizacion['apellido'] ?>
                        </h2>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-7">

                        <form action="#" method="post">

                            <div class="p-3 p-lg-5 border">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Cotizacion #
                                            <?php echo $_GET['id']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Rut vendedor:
                                            <?php echo $datos_cotizacion['rut_vendedor']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Nombre vendedor:
                                            <?php echo $datos_cotizacion['nombre_vendedor'] . " " . $datos_cotizacion['apellido_vendedor']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="c_fname" class="text-black">Correo vendedor:
                                            <?php echo $datos_cotizacion['correo']; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>

                    <div class="col-md-5 ml-auto">
                        <div class="p-4 border mb-3">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Imagen cotizada</h2>
                            </div>
                            <img src="./images/<?php echo $datos_cotizacion['imagen']; ?>" width="150px"
                                height="100px" />
                            <span class="d-block text-primary h6 text-uppercase">Cantidad:
                                <?php echo $datos_cotizacion['cantidad']; ?>
                            </span>
                            <span class="d-block text-primary h6 text-uppercase">Descripcion:
                                <?php echo $datos_cotizacion['descripcion']; ?>
                            </span>
                            <span class="d-block text-primary h6 text-uppercase">Medida:
                                <?php echo $datos_cotizacion['medidas']; ?>
                            </span>
                            <span class="d-block text-primary h6 text-uppercase">Estatus:
                                <?php echo $datos_cotizacion['estatus']; ?>
                            </span>
                           
                            <?php if ($datos_cotizacion['id_medida'] == NULL) { ?>
                            <span class="d-block text-primary h6 text-uppercase">El precio se actualizara una vez el
                                vendedor realice la cotizacion</span>
                            <?php } else { ?>
                                <span class="d-block text-primary h6 text-uppercase">Precio:
                                <?php echo $datos_cotizacion['id_medida']; ?>
                            </span>
                            <?php } ?>
                        </div>
                        <p><a href="index.php" class="btn btn-sm btn-primary"><i
                                    class="nav-icon fa fa-shopping-cart"></i> Volver al marketplace </a></p>
                    </div>
                </div>
            </div>
        </div>

        <?php include("./layouts/footer.php"); ?>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

</body>

</html>