<?php
session_start();
include("./php/conexion.php");
if (!isset($_GET['id_venta'])) {
    header("Location: ./");
}




if (isset($_GET['id_venta']) && isset($_GET['invitado'])) {
    $datos = $conexion->query("SELECT * FROM cotizaciones_invitado  WHERE id_cotizacion=" . $_GET['id_venta']) or die($conexion->error);

    $datos_usuario = mysqli_fetch_row($datos);

    $datos2 = $conexion->query("SELECT e.*, r.id, r.nombre, c.id, c.nombre FROM envios_cotizacion_invitado e
  INNER JOIN region r ON r.id = e.region
  INNER JOIN comuna c ON c.id = e.comuna
   WHERE id_venta=" . $_GET['id_venta']) or die($conexion->error);
    $datos_envio = mysqli_fetch_row($datos2);
    $datos3 = $conexion->query("SELECT id_medida, cantidad FROM cotizaciones_invitado WHERE id_cotizacion=" . $_GET['id_venta']);

} else if (isset($_SESSION['datos_login']) && isset($_GET['id_venta']) && isset($_GET['logeado'])) {
    $datos = $conexion->query("SELECT 
  cotizaciones.*, 
  usuarios.rut,usuarios.nombre,usuarios.apellidos,usuarios.correo
   FROM cotizaciones 
   INNER JOIN usuarios on cotizaciones.rut_usuario = usuarios.rut
   WHERE id_cotizacion=" . $_GET['id_venta']) or die($conexion->error);

    $datos_usuario = mysqli_fetch_row($datos);
   
        $datos2 = $conexion->query("SELECT e.*, r.id, r.nombre, c.id, c.nombre FROM envios_cotizacion e
        INNER JOIN region r ON r.id = e.region
        INNER JOIN comuna c ON c.id = e.comuna
         WHERE id_venta=" . $_GET['id_venta']) or die($conexion->error);
          $datos_envio = mysqli_fetch_row($datos2);
          $datos3 = $conexion->query("SELECT id_medida, cantidad FROM cotizaciones WHERE id_cotizacion=" . $_GET['id_venta']);
  

  
} else {
    header("Location: ./");
}




// SDK de Mercado Pago
require __DIR__ . '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-7732001071629611-062017-926d11a0262ae9247215253e6f86263c-1146326994');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://localhost/Decoiart/Carrito/thankyou_cotizacion.php?id_venta=" . $_GET['id_venta'] . "&metodo=mercado_pago",
    "failure" => "https://localhost/Decoiart/Carrito/errorpago.php?error=Fallo el pago",
    "pending" => "https://localhost/Decoiart/Carrito/errorpago.php?error=pendiente"
);
$preference->auto_return = "approved";


// Crea un ítem en la preferencia
$datos = array();
while ($f = mysqli_fetch_array($datos3)) {
    $item = new MercadoPago\Item();
    $item->quantity = 1;
    $item->unit_price = $f['id_medida'];
    $datos[] = $item;
}
$preference->items = $datos;
$preference->save();

//curl -X POST -H "Content-Type: application/json" -H "Authorization: Bearer TEST-1983145453359186-061922-792e2b6dad54129d878a266bf31995da-119690251" "https://api.mercadopago.com/users/test_user" -d "{'site_id':'MLC'}"
//Cliente
//{"id":1146321644,"nickname":"TESTUTBYLGOH","password":"qatest617","site_status":"active","email":"test_user_16043669@testuser.com"}
//Vendedor
//{"id":1146326994,"nickname":"TT336765","password":"qatest3167","site_status":"active","email":"test_user_80614499@testuser.com"}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <title>Elige metodo de pago</title>
</head>

<body>
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ad1FwfL34Q3h9AAvDRjf3I3nZMvc_TFKRoGz_2a5Bq0XpOirrW9GHgIRr-rLKyGHUGgYqMAMgd95ktpY&currency=USD"></script>
    <div class="site-wrap">
        <?php include './layouts/header.php' ?>
        <?php if (isset($_SESSION['datos_login'])) {
            $arregloUsuario = $_SESSION['datos_login'];
        } ?>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Datos de la venta</h2>

                    </div>
                    <div class="col-md-7">

                        <form action="#" method="post">

                            <div class="p-3 p-lg-5 border">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Venta #
                                            <?php echo $_GET['id_venta']; ?>
                                        </label>
                                    </div>
                                </div>
                                <?php
                                if (isset($_GET['invitado']) && isset($_GET['id_venta'])) {
                                ?>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Rut:
                                            <?php echo $datos_usuario[1]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Nombre:
                                            <?php echo $datos_usuario[2]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Apellido:
                                            <?php echo $datos_usuario[3]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">E-Mail:
                                            <?php echo $datos_usuario[4]; ?>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Region:
                                            <?php echo $datos_envio[7]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Direccion:
                                            <?php echo $datos_envio[2]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Comuna:
                                            <?php echo $datos_envio[9]; ?>
                                        </label>
                                    </div>
                                </div>
                                <?php
                                } else if (isset($_SESSION['datos_login'])) {
                                ?>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Rut:
                                            <?php echo $arregloUsuario['rut']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Nombre:
                                            <?php echo $arregloUsuario['nombre']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Apellido:
                                            <?php echo $arregloUsuario['apellido']; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">E-Mail:
                                            <?php echo $arregloUsuario['email']; ?>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Region:
                                            <?php echo $datos_envio[7]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Direccion:
                                            <?php echo $datos_envio[2]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Comuna:
                                            <?php echo $datos_envio[9]; ?>
                                        </label>
                                    </div>
                                </div>
                                <?php } else { ?>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Rut:
                                            <?php echo $datos_usuario[1]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Nombre:
                                            <?php echo $datos_usuario[2]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Apellido:
                                            <?php echo $datos_usuario[3]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">E-Mail:
                                            <?php echo $datos_usuario[4]; ?>
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Region:
                                            <?php echo $datos_envio[7]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Direccion:
                                            <?php echo $datos_envio[2]; ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="c_fname" class="text-black">Comuna:
                                            <?php echo $datos_envio[9]; ?>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 ml-auto">
                        <?php if (isset($_GET['id_venta']) && isset($_GET['invitado'])) { ?>
                        <h4 class="h1">Total:
                            <?php echo $datos_usuario[6]; ?>
                        </h4>
                        <?php } else if (isset($_SESSION['datos_login'])) { ?>
                        <h4 class="h1">Total:
                            <?php echo $datos_usuario[3]; ?>
                        </h4>
                        <?php } else { ?>
                        <h4 class="h1">Total:
                            <?php echo $datos_usuario[6]; ?>
                        </h4>
                        <?php } ?>
                        <?php if(isset($_GET['invitado']) && isset($_GET['id_venta'])): ?>
                        <form
                            action="http://localhost/Decoiart/Carrito/thankyou_cotizacion.php?invitado=hola&id_venta=<?php echo $_GET['id_venta'] ?>&metodo=mercado_pago"
                            method="POST">

                            <script src="https://www.mercadopago.cl/integrations/v1/web-payment-checkout.js"
                                data-preference-id="<?php echo $preference->id; ?>">
                                </script>
                        </form>
                        <?php elseif(isset($_SESSION['datos_login']) && isset($_GET['id_venta'])) : ?>
                            <form
                            action="http://localhost/Decoiart/Carrito/thankyou_cotizacion.php?id_venta=<?php echo $_GET['id_venta'] ?>&metodo=mercado_pago"
                            method="POST">

                            <script src="https://www.mercadopago.cl/integrations/v1/web-payment-checkout.js"
                                data-preference-id="<?php echo $preference->id; ?>">
                                </script>
                        </form>
                        <?php else: ?>
                            <form
                            action="http://localhost/Decoiart/Carrito/thankyou_cotizacion.php?invitado=hola&id_venta=<?php echo $_GET['id_venta'] ?>&metodo=mercado_pago"
                            method="POST">

                            <script src="https://www.mercadopago.cl/integrations/v1/web-payment-checkout.js"
                                data-preference-id="<?php echo $preference->id; ?>">
                                </script>
                        </form>
                        <?php endif; ?>
                        <div id="paypal-button-container"></div>

                        <p><a href="./index.php" class="btn btn-sm btn-primary">Volver a la tienda </a></p>
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
    <?php if (isset($_GET['id_venta']) && isset($_GET['invitado'])) { ?>
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: Math.round('<?php echo $datos_usuario[6]; ?>' / 864),

                        },
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    if (details.status == 'COMPLETED') {
                        location.href = "./thankyou_cotizacion.php?invitado=hola&id_venta=<?php echo $_GET['id_venta']; ?>&metodo=paypal";

                    }
                    alert('Transaction completed by' + details.payer.name.given_name);

                });
            }
        }).render('#paypal-button-container');
    </script>
    <?php } else if (isset($_SESSION['datos_login'])) { ?>
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: Math.round('<?php echo $datos_usuario[3]; ?>' / 864),

                        },
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    if (details.status == 'COMPLETED') {
                        location.href = "./thankyou_cotizacion.php?id_venta=<?php echo $_GET['id_venta']; ?>&metodo=paypal";

                    }
                    alert('Transaction completed by' + details.payer.name.given_name);

                });
            }
        }).render('#paypal-button-container');
    </script>
    <?php } else { ?>
    <script>
        paypal.Buttons({
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: Math.round('<?php echo $datos_usuario[6]; ?>' / 864),

                        },
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    if (details.status == 'COMPLETED') {
                        location.href = "./thankyou_cotizacion.php?invitado=hola&id_venta=<?php echo $_GET['id_venta']; ?>&metodo=paypal";

                    }
                    alert('Transaction completed by' + details.payer.name.given_name);

                });
            }
        }).render('#paypal-button-container');
    </script>
    <?php } ?>
</body>

</html>