<?php
session_start();

include '../Carrito/php/conexion.php';
if (!isset($_SESSION['datos_login'])) {
  header("Location: ../Carrito/index.php");
}
$arregloUsuario = $_SESSION['datos_login'];
if ($arregloUsuario['nivel'] == "1") {
  header("Location: ../Carrito/index.php");
}
if (isset($_GET['limite']) && isset($_GET['filtro']) && isset($_GET['orden'])) {

  $filtro = $_GET['filtro'];
  $orden = $_GET['orden'];
  $limite = 10; //Productos por pagina
  $totalQuery = $conexion->query("SELECT COUNT(*) FROM trabajos ") or die($conexion->error);
  $totalProductos = mysqli_fetch_row($totalQuery);
  $totalBotones = round($totalProductos[0] / $limite);
  $resultado = $conexion->query("SELECT t.*, c.id, c.nombre FROM trabajos t
  INNER JOIN categorias c ON c.id = t.id_categoria ORDER BY $filtro $orden  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
} else if (isset($_GET['filtro']) && isset($_GET['orden'])) {
  $filtro = $_GET['filtro'];
  $orden = $_GET['orden'];
  $limite = 10; //Productos por pagina
  $totalQuery = $conexion->query("SELECT COUNT(*) FROM trabajos ") or die($conexion->error);
  $totalProductos = mysqli_fetch_row($totalQuery);
  $totalBotones = round($totalProductos[0] / $limite);
  $resultado = $conexion->query("SELECT t.*, c.id, c.nombre FROM trabajos t
  INNER JOIN categorias c ON c.id = t.id_categoria
   ORDER BY $filtro $orden  limit  " . $limite) or die($conexion->error);
} else if (isset($_GET['limite'])) {

  $limite = 10; //Productos por pagina
  $totalQuery = $conexion->query("SELECT COUNT(*) FROM trabajos") or die($conexion->error);
  $totalProductos = mysqli_fetch_row($totalQuery);
  $totalBotones = round($totalProductos[0] / $limite);
  $resultado = $conexion->query("SELECT t.*, c.id, c.nombre FROM trabajos t
  INNER JOIN categorias c ON c.id = t.id_categoria ORDER BY t.id DESC  limit " . $_GET['limite'] . ", " . $limite . "") or die($conexion->error);
} else {
  $limite = 10; //Productos por pagina
  $totalQuery = $conexion->query("SELECT COUNT(*) FROM trabajos ") or die($conexion->error);
  $totalProductos = mysqli_fetch_row($totalQuery);
  $totalBotones = round($totalProductos[0] / $limite);
  $resultado = $conexion->query("SELECT t.*, c.id, c.nombre FROM trabajos t
  INNER JOIN categorias c ON c.id = t.id_categoria
   ORDER BY t.id DESC    limit  " . $limite);
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Trabajos</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="./dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="./dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="./dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="./dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="./dashboard/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="./dashboard/dist/img//AdminLTELogo.png" alt="AdminLTELogo" height="60"
        width="60">
    </div>

    <?php
    include "./layout/header.php";
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Trabajos de
                <?php echo $arregloUsuario['nombre'] . " " . $arregloUsuario['apellido'] ?>
              </h1>
            </div><!-- /.col -->
            <div class="col-sm-6 text-right">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> Agregar trabajo
              </button>
            </div><!-- /.col -->
            <div class="dropdown show">
              <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Elige un filtro
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                
                <a class="dropdown-item" href="./trabajos.php?filtro=t.id&orden=DESC">De mas reciente a mas
                  antiguo</a>
                <a class="dropdown-item" href="./trabajos.php?filtro=t.id&orden=ASC">De mas antiguo a mas
                  reciente</a>
              </div>

            </div>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <?php
        if (isset($_SESSION['error'])) {

        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $_SESSION['error'] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php
        }

          ?>
          <?php $_SESSION['error'] = null; ?>
          <?php

          if (isset($_SESSION['success'])) {


          ?>
          <div class="alert alert-success" role="alert">
            <?= $_SESSION['success'] ?>

              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php }
          ?>
          <?php $_SESSION['success'] = null; ?>

          <?php
        if (isset($_SESSION['successEdit'])) {

        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['successEdit'] ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?php
        }

          ?>
          <?php $_SESSION['successEdit'] = null; ?>
          <table class="table">
            <thead>
              <th>Id_producto</th>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Categoria</th>
              <th>Imagen</th>
         
            </thead>
            <tbody>
              <tr>
                <?php
                while ($fila = mysqli_fetch_array($resultado)) {

                ?>
                <td>
                  <?php echo $fila[0] ?>
                </td>
                <td>
                  <?php echo $fila[1] ?>
                </td>
                <td>
                  <?php echo $fila[2] ?>
                </td>
                <td>
                  <?php echo $fila[7] ?>
                </td>
                <td> <img src="../img/<?php echo $fila[3]; ?>" width="135px" height="100px" /></td>
                
                <td>
                  <button class="btn btn-primary btn-small btnEditar" data-id="<?= $fila[0] ?>"
                   data-nombre="<?= $fila[1] ?>" data-descripcion="<?= $fila[2] ?>"
                    data-categoria="<?= $fila['id_categoria'] ?>" 
                    data-toggle="modal" data-target="#modalEditar">
                    <i class="fa fa-edit"></i>
                  </button>
                </td>
                <td>
                  <button class="btn btn-danger btn-small btnEliminar" data-toggle="modal" data-target="#modalEliminar"
                    data-id="<?= $fila[0] ?>">
                    <i class="fa fa-trash"></i>
                  </button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <div class="col-md-9 order-2">
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                  <ul class="list-group list-group-horizontal">

                    <?php


                    if (isset($_GET['filtro']) && isset($_GET['orden'])) {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li class="list-group-item "><a href="trabajos.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li class="list-group-item "><a href="trabajos.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li class="list-group-item "><a href="trabajos.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li class="list-group-item "><a href="trabajos.php?filtro=' . $_GET['filtro'] . '&orden=' . $_GET['orden'] . '&limite=10">&gt;</a></li>';
                      }

                    } else {
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] > 0) {
                          echo '<li class="list-group-item "><a href="trabajos.php?limite=' . ($_GET['limite'] - 10) . '">&lt;</a></li>';
                        }
                      }
                      for ($k = 0; $k < $totalBotones; $k++) {
                        echo '<li class="list-group-item "><a href="trabajos.php?limite=' . ($k * 10) . '">' . ($k + 1) . '</a></li>';
                      }
                      if (isset($_GET['limite'])) {
                        if ($_GET['limite'] + 10 < $totalBotones * 10) {
                          echo ' <li class="list-group-item "><a href="trabajos.php?limite=' . ($_GET['limite'] + 10) . '">&gt;</a></li>';
                        }
                      } else {
                        echo '<li class="list-group-item "><a href="trabajos.php?limite=10">&gt;</a></li>';
                      }
                    }


                    ?>

                  </ul>
                </div>
              </div>
            </div>
          </div>






        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- Modal Agregar -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="insertar_trabajo.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Agregar un trabajo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" class="form-control"
                  required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion del producto"
                  class="form-control" required>
              </div>
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control"  required>
              </div>
              
              <div class="form-group">
                <label for="categoria">Categoria</label>
                <select name="categoria" id="categoria" class="form-control" required>
                  <?php
                  $res = $conexion->query("SELECT * FROM categorias");
                  while ($f = mysqli_fetch_array($res)) {
                    echo '<option value="' . $f['id'] . '">' . $f['nombre'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal Eliminar -->
    <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="modalEliminarLabel">Eliminar producto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ¿Desea eliminar el producto?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger eliminar" data-dismiss="modal">Eliminar</button>
          </div>

        </div>
      </div>
    </div>
    <!-- Modal Editar -->
    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditar"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form action="editar_trabajo.php" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title" id="modalEditar">Editar un producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <input type="hidden" name="id_producto" id="idEdit" class="form-control">

              <div class="form-group">
                <label for="nombreEdit">Nombre</label>
                <input type="text" name="nombre" id="nombreEdit" placeholder="Nombre del producto" class="form-control"
                  required>
              </div>
              <div class="form-group">
                <label for="descripcionEdit">Descripcion</label>
                <input type="text" name="descripcion" id="descripcionEdit" placeholder="Descripcion del producto"
                  class="form-control" required>
              </div>
             
              <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control">
              </div>
              
              <div class="form-group">
                <label for="categoriaEdit">Categoria</label>
                <select name="categoria" id="categoriaEdit" class="form-control" required>
                  <?php
                  $res = $conexion->query("SELECT * FROM categorias");
                  while ($f = mysqli_fetch_array($res)) {
                    echo '<option value="' . $f['id'] . '">' . $f['nombre'] . '</option>';
                  }
                  ?>
                </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary editar">Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php include "./layout/footer.php"; ?>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="./dashboard/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="./dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="./dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="./dashboard/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="./dashboard/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="./dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="./dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="./dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="./dashboard/plugins/moment/moment.min.js"></script>
  <script src="./dashboard/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="./dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="./dashboard/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="./dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dashboard/dist/js/adminlte.js"></script>
  <!-- Bootstrap Js -->
  <script src="./dashboard/docs/assets/plugins/bootstrap/js/bootstrap.js"></script>
  <script>
    $('.alert').alert()
  </script>
  <script>
    $(document).ready(function () {
      var idEliminar = -1;
      var idEditar = -1;
      var fila;
      $(".btnEliminar").click(function () {
        idEliminar = ($(this).data('id'));
        fila = $(this).parent('td').parent('tr');

      });
      $(".eliminar").click(function () {
        $.ajax({
          url: ('eliminar_trabajo.php'),
          method: 'POST',
          data: {
            id: idEliminar
          }

        }).done(function (res) {

          $(fila).fadeOut(1000);
        });

      });
      $(".btnEditar").click(function () {
        idEditar = $(this).data('id');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var categoria = $(this).data('categoria');
        $("#idEdit").val(idEditar);
        $("#nombreEdit").val(nombre);
        $("#descripcionEdit").val(descripcion);
        $("#categoriaEdit").val(categoria);

      })
    });
  </script>

</body>

</html>