<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tienda</title>
  <meta charset="utf-8">
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

</head>

<body>

  <div class="site-wrap">
   
  <?php include './layouts/header.php' ?>


    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4">
                  <h2 class="text-black h5">Todos los productos</h2>

                </div>

              </div>
            </div>
            <div class="row mb-5">
              <?php
              include('./php/conexion.php');
              /*
              for($i = 0; $i < 20; $i++){
              $conexion ->query("INSERT INTO productos(nombre,descripcion,precio,imagen,inventario,id_categoria,talla,rut_vendedor) VALUES(
              'Poster Decoiart N° $i','Poster decoiart',".rand(10,1000).",'Avengers.jpg',".rand(1,100)." ,2,'Poster marca decoiart','76555678-6'
              ) ") or die($conexion -> error);
              }
              */

              $limite = 10; //Productos por pagina
              $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos") or die($conexion->error);
              $totalProductos = mysqli_fetch_row($totalQuery);
              $totalBotones = round($totalProductos[0] / $limite);
              if (isset($_GET['limite']) && isset($_GET['texto']) && isset($_GET['filtro']) && isset($_GET['orden'])) {
                $texto = $_GET['texto'];
                $filtro = $_GET['filtro'];
                $orden = $_GET['orden'];
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE id_categoria = $texto") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND id_categoria = $texto ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
              } else if (isset($_GET['limite']) && isset($_GET['texto'])) {
                $texto = $_GET['texto'];
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE id_categoria = $texto") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND id_categoria = " . $_GET['texto'] . " ORDER BY id_producto DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
              } else if (isset($_GET['limite']) && isset($_GET['rut']) && isset($_GET['filtro']) && isset($_GET['orden'])) {
                $filtro = $_GET['filtro'];
                $orden = $_GET['orden'];
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE rut_vendedor = '".$_GET['rut']."'") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND rut_vendedor = '" . $_GET['rut'] . "'  ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
              } else if (isset($_GET['limite']) && isset($_GET['rut'])) {
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE rut_vendedor = '".$_GET['rut']."'") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND rut_vendedor = '" . $_GET['rut'] . "'  ORDER BY id_producto DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
              } else if (isset($_GET['limite']) && isset($_GET['filtro']) && isset($_GET['orden'])) {
                $filtro = $_GET['filtro'];
                $orden = $_GET['orden'];
                $resultado = $conexion->query("select * from productos WHERE inventario > 0  ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
              } else if (isset($_GET['texto']) && isset($_GET['filtro']) && isset($_GET['orden'])) {
                $filtro = $_GET['filtro'];
                $texto = $_GET['texto'];
                $orden = $_GET['orden'];
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE id_categoria = $texto") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND id_categoria = " . $_GET['texto'] . " ORDER BY $filtro $orden   limit  " . $limite) or die($conexion->error);
              } else if (isset($_GET['rut']) && isset($_GET['filtro']) && isset($_GET['orden'])) {
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE rut_vendedor = '".$_GET['rut']."'") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $filtro = $_GET['filtro'];
                $orden = $_GET['orden'];
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND rut_vendedor = '" . $_GET['rut'] . "' ORDER BY $filtro $orden  limit  " . $limite) or die($conexion->error);
              } else if (isset($_GET['filtro']) && isset($_GET['orden'])) {
                $filtro = $_GET['filtro'];
                $orden = $_GET['orden'];
            
                $resultado = $conexion->query("select * from productos WHERE inventario > 0  ORDER BY $filtro $orden  limit  " . $limite) or die($conexion->error);

              } else if (isset($_GET['rut'])) {
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE rut_vendedor = '".$_GET['rut']."'") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND rut_vendedor = '" . $_GET['rut'] . "' ORDER BY id_producto DESC   limit  " . $limite) or die($conexion->error);
              } else if (isset($_GET['texto'])) {
                $texto = $_GET['texto'];
                $limite = 10; //Productos por pagina
                $totalQuery = $conexion->query("SELECT COUNT(*) FROM productos WHERE id_categoria = $texto") or die($conexion->error);
                $totalProductos = mysqli_fetch_row($totalQuery);
                $totalBotones = round($totalProductos[0] / $limite);
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 AND id_categoria = " . $_GET['texto'] . " ORDER BY id_producto DESC   limit  " . $limite) or die($conexion->error);

              } else if (isset($_GET['limite'])) {
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 ORDER BY id_producto DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
              } else {
                $resultado = $conexion->query("select * from productos WHERE inventario > 0 ORDER BY id_producto DESC   limit  " . $limite) or die($conexion->error);
              }




              while ($fila = mysqli_fetch_array($resultado)) {


              ?>
              <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image">
                    <a href="shop-single.php?id=<?php echo $fila['id_producto'] ?>"><img
                        src="images/<?php echo $fila['imagen'] ?> " alt="<?php echo $fila['nombre'] ?>" width="250px"
                        height="200px"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?=<?php echo $fila['imagen'] ?>">
                        <?php echo $fila['nombre'] ?>
                      </a></h3>
                    <p class="mb-0">
                      <?php echo $fila['descripcion'] ?>
                    </p>
                    <p class="text-primary font-weight-bold">$
                      <?php echo $fila['precio'] ?> Pesos
                    </p>
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
                    if (isset($_GET['filtro']) && isset($_GET['orden']) && isset($_GET['rut'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
                      }
                    } else if (isset($_GET['rut'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li><a href="index.php?rut=' . $_GET['rut'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li><a href="index.php?rut=' . $_GET['rut'] . '&limite=10">&gt;</a></li>';
                      }
                    } else if (isset($_GET['filtro']) && isset($_GET['orden']) && isset($_GET['texto'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li><a href="index.php?texto=' . $_GET['texto'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li><a href="index.php?texto=' . $_GET['texto'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li><a href="index.php?texto=' . $_GET['texto'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li><a href="index.php?texto=' . $_GET['texto'] . '&filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
                      }
                 
                    } else if (isset($_GET['texto'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li><a href="index.php?texto=' . $_GET['texto'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li><a href="index.php?texto=' . $_GET['texto'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li><a href="index.php?texto=' . $_GET['texto'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li><a href="index.php?texto=' . $_GET['texto'] . '&limite=10">&gt;</a></li>';
                      }

                    } else if (isset($_GET['filtro']) && isset($_GET['orden'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li><a href="index.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li><a href="index.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li><a href="index.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li><a href="index.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
                      }

                    } else {
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

                ?>
                <li class="mb-1">
                  <a href="./index.php?texto=<?php echo $f['id'] ?>" class="d-flex">
                    <span>
                      <?php echo $f['nombre'] ?>
                    </span>
                    <span class="text-black ml-auto">
                      <?php
                  $re2 = $conexion->query("SELECT COUNT(*) FROM productos WHERE id_categoria =" . $f['id'] . " AND inventario > 0") or die($conexion->error);
                  $fila = mysqli_fetch_row($re2);
                  echo $fila[0];
                      ?>
                    </span>
                  </a>
                </li>

                <?php } ?>
              </ul>
            </div>
            <div class="border p-4 rounded mb-4">


              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filtrar por vendedor</h3>

                <?php $re = $conexion->query("SELECT * FROM vendedores") or die($conexion->error); ?>
                <?php while ($f = mysqli_fetch_array($re)) { ?>
                <label for="s_md" class="d-flex">
                  <a href="./index.php?rut=<?= $f['rut_vendedor'] ?>">
                    <?= $f['nombre'] . ' ' . $f['apellidos'] ?>
                  </a>


                </label>
                <?php } ?>
              </div>


            </div>
            <?php if (isset($_GET['texto'])): ?>
            <div class="border p-4 rounded mb-4">


              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Ordenar por</h3>
                <label for="s_sm" class="d-flex">
                  <a href="./index.php?texto=<?= $_GET['texto'] ?>&filtro=precio&orden=ASC">
                    <span class="text-blue">Precio menor a mayor</span>
                  </a>

                </label>
                <label for="s_md" class="d-flex">
                  <a href="./index.php?texto=<?= $_GET['texto'] ?>&filtro=precio&orden=DESC">
                    <span class="text-blue">Precio mayor a menor</span>
                  </a>
                </label>

              </div>


            </div>
            <?php elseif (isset($_GET['rut'])): ?>
            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Ordenar por</h3>
                <label for="s_sm" class="d-flex">
                  <a href="./index.php?rut=<?= $_GET['rut'] ?>&filtro=precio&orden=ASC">
                    <span class="text-blue">Precio menor a mayor</span>
                  </a>
                </label>
                <label for="s_md" class="d-flex">
                  <a href="./index.php?rut=<?= $_GET['rut'] ?>&filtro=precio&orden=DESC">
                    <span class="text-blue">Precio mayor a menor</span>
                  </a>
                </label>
              </div>
            </div>
            <?php else: ?>
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
            <?php endif; ?>
            <?php
            /*
            
            <div class="border p-4 rounded mb-4">
            
            <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Medidas</h3>
            <label for="s_sm" class="d-flex">
            <a href="./busqueda.php?texto=100x60cm">
            <span class="text-black">100x60cm</span>
            </a>
            
            </label>
            <label for="s_md" class="d-flex">
            <a href="./busqueda.php?texto=100x100cm">
            <span class="text-black">100x100cm</span>
            </a>
            </label>
            <label for="s_lg" class="d-flex">
            <a href="./busqueda.php?texto=60x60cm">
            <span class="text-black">60x60cm</span>
            </a>
            </label>
            </div>
            </div>
            */
            ?>

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