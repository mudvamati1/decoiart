<?php
session_start();
include("../Carrito/php/conexion.php");
if (isset($_GET['id'])) {
    $resultado = $conexion->query("SELECT * FROM trabajos
    WHERE id= " . $_GET['id']) or die($conexion->error);
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_row($resultado);
    } else {
        //REDIRECCIONAR
        header("Location: ../Carrito/index.php");
    }
} else {
    //REDIRECCIONAR
    header("Location: ../Carrito/index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="../Carrito/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../Carrito/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Carrito/css/magnific-popup.css">
    <link rel="stylesheet" href="../Carrito/css/jquery-ui.css">
    <link rel="stylesheet" href="../Carrito/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Carrito/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Carrito/css/aos.css">

    <link rel="stylesheet" href="../Carrito/css/style.css">

</head>

<body>

    <div class="site-wrap">
    <?php include './header.php' ?>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="../img/<?php echo $fila[3] ?>" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-black"><?php echo $fila[1] ?></h2>
                        <p><strong class="text-primary h4">Descripcion: <?php echo $fila[2] ?></strong></p>
                        
                      

                    </div>
                </div>
            </div>
        </div>


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

</body>

</html>