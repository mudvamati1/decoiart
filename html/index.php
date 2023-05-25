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

</head>

<body>

    <div class="site-wrap">
        <?php
        session_start()
        ?>
        <header class="site-navbar" role="banner">
            <div class="site-navbar-top">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                            <form action="./busqueda.php" class="site-block-top-search" method="GET">
                                <span class="icon icon-search2"></span>
                                <input type="text" class="form-control border-0" placeholder="Buscar" name="texto">
                            </form>
                        </div>

                        <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                            <div class="site-logo">
                                <a href="index.php" class="js-logo-clone">TIENDA DECOIART</a>
                            </div>
                        </div>

                        <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                            <div class="site-top-icons">
                                <ul>
                                    <?php
                                    if (isset($_SESSION['datos_login'])) {
                                        echo "<li><a href='../admin/index.php'><span class='icon icon-person'></span></a></li>";
                                    } else {
                                        echo "<li><a href='../html/login.php'><span class='icon icon-person'></span></a></li>";
                                    }
                                    ?>

                                    <li>
                                        <a href="../Carrito/cart.php" class="site-cart">
                                            <span class="icon icon-shopping_cart"></span>
                                            <span class="count">
                                                <?php
                                                if (isset($_SESSION['carrito'])) {
                                                    echo count($_SESSION['carrito']);
                                                } else {
                                                    echo 0;
                                                }
                                                ?>

                                            </span>
                                        </a>
                                    </li>
                                    <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block">
                        <li>
                            <a href="index.php">Home</a>

                        </li>

                        <li>
                            <a href="../Carrito/index.php">Marketplace</a>

                        </li>
                        <li>
                            <a href="../Carrito/cotizacion.php">Cotizacion</a>

                        </li>
                        <!--
                        <li>
                            <a href="Trabajos.php">Trabajos</a>

                        </li>
                         -->
                        <?php if (isset($_SESSION['datos_login'])) { ?>
                            <li><a href='../admin/index.php'>Perfil</a></li>
                        <?php } else { ?>
                            <li><a href="Login.php"><span class="spi">Login</span></a> </li>
                        <?php }  ?>

                        <li><a href="../html/Contacto.php">Contacto</a></li>
                        <li><a href="../Carrito/about.php">Acerca</a></li>
                    </ul>
                </div>
            </nav>
        </header>

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

                <div class="row mb-5">
                    <div class="col-md-9 order-2">

                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="float-md-left mb-4">
                                    <h2 class="text-black h5">Productos Decoiart</h2>
                                </div>

                            </div>
                        </div>
                        <div class="row mb-5">
                            <?php
                            include('../Carrito/php/conexion.php');
                            /*
              for($i = 0; $i < 20; $i++){
                $conexion ->query("INSERT INTO productos(nombre,descripcion,precio,imagen,inventario,id_categoria,talla,rut_vendedor) VALUES(
                  'Joya N° $i','Joyas para ti',".rand(10,1000).",'Joyas.jpg',".rand(1,100)." ,5,'Ruby, esmeraldas, jade','20448722-7'
                   ) ") or die($conexion -> error);
              }
              */

                            $limite = 10; //Productos por pagina
                            $totalQuery = $conexion->query("SELECT COUNT(*) FROM cuadros") or die($conexion->error);
                            $totalProductos = mysqli_fetch_row($totalQuery);
                            $totalBotones = round($totalProductos[0] / $limite);
                            if (isset($_GET['filtro']) && isset($_GET['orden'])) {
                                $filtro = $_GET['filtro'];
                                $orden = $_GET['orden'];
                                if (isset($_GET['limite'])) {
                                    $resultado = $conexion->query("select * from cuadros WHERE inventario > 0  ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
                                } else {
                                    $resultado = $conexion->query("select * from cuadros WHERE inventario > 0  ORDER BY $filtro $orden   limit  " . $limite) or die($conexion->error);
                                }
                            } else {
                                if (isset($_GET['limite'])) {
                                    $resultado = $conexion->query("select * from cuadros WHERE inventario > 0  ORDER BY id DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
                                } else {
                                    $resultado = $conexion->query("select * from cuadros WHERE inventario > 0  ORDER BY id DESC   limit  " . $limite) or die($conexion->error);
                                }
                            }





                            while ($fila = mysqli_fetch_array($resultado)) {
                                

                            ?>
                                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                    <div class="block-4 text-center border">
                                        <figure class="block-4-image">
                                            <a href="shop-single.php?id=<?php echo $fila['id'] ?>"><img src="../Carrito/images/<?php echo $fila['imagen'] ?> " alt="<?php echo $fila['nombre'] ?>" width="250px" height="200px"></a>
                                        </figure>
                                        <div class="block-4-text p-4">
                                            <h3><a href="shop-single.php?=<?php echo $fila['imagen'] ?>"><?php echo $fila['nombre'] ?></a></h3>
                                            <p class="mb-0"><?php echo $fila['medidas'] ?></p>
                                            <p class="text-primary font-weight-bold">$<?php echo $fila['precio'] ?> Pesos</p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                        </div>

                        <div class="row" data-aos="fade-up">
                            <div class="col-md-12 text-center">
                                <div class="site-block-27">
                                    <ul>

                                        <?php

                                        if(isset($_GET['filtro']) && isset($_GET['orden'])){
                                            if (isset($_GET['limite'])) {
                                                if ($_GET['limite'] > 0) {
                                                    echo '<li><a href="index.php?filtro='.$_GET['filtro'].'&orden='.$_GET['orden'].'&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                                                }
                                            }
                                            for ($k = 0; $k < $totalBotones; $k++) {
                                                echo '<li><a href="index.php?filtro='.$_GET['filtro'].'&orden='.$_GET['orden'].'&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                                            }
                                            if (isset($_GET['limite'])) {
                                                if ($_GET['limite'] + 10 < $totalBotones * 10) {
                                                    echo ' <li><a href="index.php?filtro='.$_GET['filtro'].'&orden='.$_GET['orden'].'&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                                                }
                                            } else {
                                                echo '<li><a href="index.php?filtro='.$_GET['filtro'].'&orden='.$_GET['orden'].'&limite=10">&gt;</a></li>';
                                            }
    
                                        }else{
                                            if (isset($_GET['limite'])) {
                                                if ($_GET['limite'] > 0) {
                                                    echo '<li><a href="index.php?limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                                                }
                                            }
                                            for ($k = 0; $k < $totalBotones; $k++) {
                                                echo '<li><a href="index.php?limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                                            }
                                            if (isset($_GET['limite'])) {
                                                if ($_GET['limite'] + 10 < $totalBotones * 10) {
                                                    echo ' <li><a href="index.php?limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                                                }
                                            } else {
                                                echo '<li><a href="index.php?limite=10">&gt;</a></li>';
                                            }
    
                                        }
                                       
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 order-1 mb-5 mb-md-0">
                        
                        <div class="border p-4 rounded mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtros</h3>
                            <ul class="list-unstyled mb-0">
                                <?php
                                $re = $conexion->query("SELECT * FROM categorias") or die($conexion->error);
                                while ($f = mysqli_fetch_array($re)) {
                                    $_SESSION['busqueda_botones'] = $f['id'];




                                ?>
                                    <li class="mb-1">
                                        <a href="../Carrito/busqueda.php?texto=<?php echo $f['nombre'] ?>" class="d-flex">
                                            <span><?php echo $f['nombre'] ?></span>
                                            <span class="text-black ml-auto">
                                                <?php
                                                $re2 = $conexion->query("SELECT COUNT(*) FROM cuadros WHERE id_categoria =" . $f['id'] . " AND inventario > 0") or die($conexion->query);
                                                $fila = mysqli_fetch_row($re2);
                                                echo $fila[0];
                                                ?>
                                            </span>
                                        </a>
                                    </li>

                                <?php  } ?>
                            </ul>
                        </div>
                        <div class="border p-4 rounded mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtros</h3>
                            <ul class="list-unstyled mb-0">
                                <?php
                                $re = $conexion->query("SELECT * FROM categorias") or die($conexion->error);
                                while ($f = mysqli_fetch_array($re)) {
                                    $_SESSION['busqueda_botones'] = $f['id'];




                                ?>
                                    <li class="mb-1">
                                        <a href="../Carrito/busqueda.php?texto=<?php echo $f['nombre'] ?>" class="d-flex">
                                            <span><?php echo $f['nombre'] ?></span>
                                            <span class="text-black ml-auto">
                                                <?php
                                                $re2 = $conexion->query("SELECT COUNT(*) FROM cuadros WHERE id_categoria =" . $f['id'] . " AND inventario > 0") or die($conexion->query);
                                                $fila = mysqli_fetch_row($re2);
                                                echo $fila[0];
                                                ?>
                                            </span>
                                        </a>
                                    </li>

                                <?php  } ?>
                            </ul>
                        </div>
                        <div class="border p-4 rounded mb-4">
                              

                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Ordenar por</h3>
                                <label for="s_sm" class="d-flex">
                                    <a href="./index.php?filtro=precio&orden=ASC">
                                        <span class="text-blue">Precio menor a mayor</span>
                                    </a>

                                </label>
                                <label for="s_md" class="d-flex">
                                    <a href="./index.php?filtro=precio&orden=DESC">
                                        <span class="text-blue">Precio mayor a menor</span>
                                    </a>
                                </label>

                            </div>


                        </div>
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