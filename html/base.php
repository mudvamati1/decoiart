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
                                        <a href="cart.php" class="site-cart">
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
                        <li>
                            <a href="Trabajos.php">Trabajos</a>

                        </li>
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

                <?php
                // rutas de imagenes por 'categoria'
                $musica = '../img/categorias/musica/';
                $autos = '../img/categorias/autos/';
                $animales = '../img/categorias/animales/';

                // contar imagenes por 'categoria'
                $contarMus = count(glob($musica . '{*.jpg}', GLOB_BRACE));
                $contarAut = count(glob($autos . '{*.jpg}', GLOB_BRACE));
                $contarAnim = count(glob($animales . '{*.jpg}', GLOB_BRACE));

                ?>

                <div class="wrap">
                    <div class="store-wrapper">

                        <div class="category_list">
                            <a href="#" class="category_item" category="all">Todo</a>
                            <a href="#" class="category_item" category="musica">Música</a>
                            <a href="#" class="category_item" category="animales">Animales</a>
                            <a href="#" class="category_item" category="autos">Autos</a>
                        </div>

                        <section class="products-list">

                            <?php
                            if ($musica) {
                                for ($i = 0; $i < $contarMus; $i++) { ?>
                                    <div class="product-item" category="musica">
                                        <?php echo '<img src="' . $musica . $i + 1 . '.jpg">'; ?>
                                        <a href="#">Musica</a>
                                    </div>
                                <?php   }
                            }

                            if ($animales) {
                                for ($i = 0; $i < $contarAnim; $i++) { ?>
                                    <div class="product-item" category="animales">
                                        <?php echo '<img src="' . $animales . $i + 1 . '.jpg">'; ?>
                                        <a href="#">Animales</a>
                                    </div>
                                <?php   }
                            }

                            if ($autos) {
                                for ($i = 0; $i < $contarAut; $i++) { ?>
                                    <div class="product-item" category="autos">
                                        <?php echo '<img src="' . $autos . $i + 1 . '.jpg">'; ?>
                                        <a href="#">Autos</a>
                                    </div>
                            <?php   }
                            }
                            ?>

                        </section>

                    </div>
                </div>


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