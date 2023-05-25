
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
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span
                        class="icon-menu"></span></a></li>
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
              <a href="../Carrito/index.php">Home</a>

            </li>

            
            <li>
              <a href="../Carrito/cotizacion.php">Cotizacion</a>

            </li>
            
            <li>
              <a href="./Trabajos.php">Trabajos</a>
            </li>
                      
            <?php if (isset($_SESSION['datos_login'])) { ?>
            <li><a href='../admin/index.php'>Perfil</a></li>
            <?php } else { ?>
            <li><a href="../html/Login.php"><span class="spi">Login</span></a> </li>
            <?php } ?>

            <li><a href="../html/Contacto.php">Contacto</a></li>
            <li><a href="../Carrito/about.php">Acerca</a></li>
          </ul>
        </div>
      </nav>
    </header>