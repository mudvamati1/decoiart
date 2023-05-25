<?php
require_once '../Carrito/php/conexion.php';
session_start();
if (!isset($_SESSION['datos_login'])) {
  header("Location: ../html/login.php");
}
$arregloUsuario = $_SESSION['datos_login'];

if (isset($_SESSION['autor']) && isset($_SESSION['data'])) {
  $vendedor = $_SESSION['autor'];
  $data = $_SESSION['data'];
}

if(isset($_SESSION['vendedor'])){
  $vendedor1 = $_SESSION['vendedor'];
  $sql1 = "SELECT nombre,apellidos FROM usuarios WHERE rut ='".$vendedor1."'";
  
  $res1 = $conexion->query($sql1);
  
 $fila = mysqli_fetch_array($res1);

  
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Decoiart</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
              <h1 class="m-0">Decoiart</h1>
              <?php if ($arregloUsuario['nivel'] == 3) { ?>
              <div class="dropdown show">
                <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Elige un filtro
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="./index.php?ventas&actual">Ventas mes actual</a>
                  <a class="dropdown-item" href="./index.php?mayor_vendedor">Vendedor con mas ventas</a>
                  <a class="dropdown-item" href="./index.php?menor_vendedor">Vendedor con menos ventas</a>
                  <a class="dropdown-item" href="./index.php?lineas&promedio">Promedio de ventas en dinero</a>
                  <a class="dropdown-item" href="./index.php?mayor_usuario">Usuario que mas compra</a>
                  <a class="dropdown-item" href="./index.php?menor_usuario">Usuario que menos compra</a>
                </div>


              </div>
              <?php }?>

              </br>

              <?php if (isset($_GET['lineas']) && isset($_GET['promedio'])) : ?>
                <div class="form-group">
                  <form action="./promedio-autor.php?" method="POST">
                    <label for="vendedores">Vendedores</label>
                    <select id="vendedores" class="form-control" name="vendedor" required>
                      <option value="">Seleccione un vendedor</option>

                      <?php

                      $res = $conexion->query("SELECT * FROM vendedores") or die($conexion->error);

                      while ($f = mysqli_fetch_array($res)) { ?>
                        <?php if(isset($_SESSION['data'])): ?>
                        <option value="<?= $f[0] ?>" <?= ($f[0] == $_SESSION['data']['rut']) ? 'selected="selected"' : '' ?>>
                          <?= $f[1] . ' ' . $f[2] ?>
                        </option>
                        <?php else: ?>
                          <option value="<?= $f[0] ?>" >
                          <?= $f[1] . ' ' . $f[2] ?>
                        </option>
                          <?php endif; ?>
                      <?php } ?>

                    </select>
                    <div class="form-group">
                      <label for="fecha">Fecha de inicio</label>
                      <input type="date" name="fechainipro" id="fecha" class="form-control" required>
                    </div>

                    <div class="form-group">
                      <label for="fecha">Fecha de termino</label>
                      <input type="date" name="fechaterpro" id="fecha" class="form-control" required>
                    </div>

                    <input type="submit" value="Filtrar" class="btn btn-success btn-lg right">

                  </form>
                </div>

              <?php endif; ?>
            </div><!-- /.col -->
            <?php if (isset($_GET['mayor_vendedor'])) { ?>
              <form action="./index.php?mayor_vendedor" method="POST">
                <div class="form-group">
                  <label for="fecha">Fecha de inicio</label>
                  <input type="date" name="fechainimax" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de termino</label>
                  <input type="date" name="fechatermax" id="fecha" class="form-control" required>
                </div>
                <input type="submit" value="Filtrar" class="btn btn-success btn-lg right">
              </form>

            <?php } else if (isset($_GET['menor_vendedor'])) { ?>
              <form action="./index.php?menor_vendedor" method="POST">
                <div class="form-group">
                  <label for="fecha">Fecha de inicio</label>
                  <input type="date" name="fechainimin" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de termino</label>
                  <input type="date" name="fechatermin" id="fecha" class="form-control" required>
                </div>
                <input type="submit" value="Filtrar" class="btn btn-success btn-lg right">
              </form>

            <?php } else if (isset($_GET['mayor_usuario'])) { ?>
              <form action="./index.php?mayor_usuario" method="POST">
                <div class="form-group">
                  <label for="fecha">Fecha de inicio</label>
                  <input type="date" name="fechainiusumax" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de termino</label>
                  <input type="date" name="fechaterusumax" id="fecha" class="form-control" required>
                </div>
                <input type="submit" value="Filtrar" class="btn btn-success btn-lg right">
              </form>
            <?php } else if (isset($_GET['menor_usuario'])) { ?>
              <form action="./index.php?menor_usuario" method="POST">
                <div class="form-group">
                  <label for="fecha">Fecha de inicio</label>
                  <input type="date" name="fechainiusumin" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de termino</label>
                  <input type="date" name="fechaterusumin" id="fecha" class="form-control" required>
                </div>
                <input type="submit" value="Filtrar" class="btn btn-success btn-lg right">
              </form>
            <?php } else if (isset($_GET['ventas'])) { ?>
              <form action="./index.php?ventas" method="POST">
                <div class="form-group">
                  <label for="fecha">Fecha de inicio</label>
                  <input type="date" name="fechainiven" id="fecha" class="form-control" required>
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de termino</label>
                  <input type="date" name="fechaterven" id="fecha" class="form-control" required>
                </div>
                <input type="submit" value="Filtrar" class="btn btn-success btn-lg right">
              </form>
            <?php  } ?>
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <?php if ($arregloUsuario['nivel'] == 3) { ?>
              <section class="col-9 connectedSortable">

                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-chart-pie mr-1"></i>
                      <?php if (isset($_POST['fechainimax']) && isset($_POST['fechatermax']) && isset($_GET['mayor_vendedor'])) : ?>
                        <?php $fecha1 = $_POST['fechainimax'];
                        $inicial = date("d/m/Y", strtotime($fecha1)); 
                        $fecha2 = $_POST['fechatermax'];
                        $termino = date("d/m/Y", strtotime($fecha2));
                        ?>
                        El vendedor con mas ventas entre <?php echo $inicial ?> y <?php echo $termino ?>

                        <?php  elseif (isset($_POST['fechainimin']) && isset($_POST['fechatermin']) && isset($_GET['menor_vendedor'])) : ?>
                          <?php $fecha1 = $_POST['fechainimin'];
                        $inicial = date("d/m/Y", strtotime($fecha1)); 
                        $fecha2 = $_POST['fechatermin'];
                        $termino = date("d/m/Y", strtotime($fecha2));
                        ?>
                        El vendedor con menos ventas entre <?php echo $inicial ?> y <?php echo $termino ?>
                        <?php elseif (isset($_GET['ventas']) && isset($_POST['fechainiven']) && isset($_POST['fechaterven'])) : ?>
                          <?php $fecha1 = $_POST['fechainiven'];
                        $inicial = date("d/m/Y", strtotime($fecha1)); 
                        $fecha2 = $_POST['fechaterven'];
                        $termino = date("d/m/Y", strtotime($fecha2));
                        ?>
                        Total de ventas por usuario entre <?php echo $inicial ?> y <?php echo $termino ?>
                        <?php  elseif (isset($_GET['lineas']) && isset($_GET['promedio']) && isset($_SESSION['autor']) && isset($_SESSION['data'])) : ?>
                          <?php $fecha1 = $_SESSION['inicial'];
                        $inicial = date("d/m/Y", strtotime($fecha1)); 
                        $fecha2 = $_SESSION['termino'];
                        $termino = date("d/m/Y", strtotime($fecha2));
                        ?>
                        Promedio de ventas del usuario <?php echo $fila['nombre'].' '.$fila['apellidos'] ?> entre <?php echo $inicial ?> y <?php echo $termino ?>
                        <?php elseif (isset($_GET['mayor_usuario']) && isset($_POST['fechainiusumax']) && isset($_POST['fechaterusumax'])) : ?>
                          <?php $fecha1 = $_POST['fechainiusumax'];
                        $inicial = date("d/m/Y", strtotime($fecha1)); 
                        $fecha2 = $_POST['fechaterusumax'];
                        $termino = date("d/m/Y", strtotime($fecha2));
                        ?>
                        El usuario que mas ha comprado entre <?php echo $inicial ?> y <?php echo $termino ?>
                        <?php elseif (isset($_GET['menor_usuario']) && isset($_POST['fechainiusumin']) && isset($_POST['fechaterusumin'])) : ?>
                          <?php $fecha1 = $_POST['fechainiusumin'];
                        $inicial = date("d/m/Y", strtotime($fecha1)); 
                        $fecha2 = $_POST['fechaterusumin'];
                        $termino = date("d/m/Y", strtotime($fecha2));
                        ?>
                        El usuario que menos ha comprado entre <?php echo $inicial ?> y <?php echo $termino ?>
                      <?php elseif (isset($_GET['mayor_vendedor'])) : ?>
                        Vendedor con mayor cantidad de ventas 
                      <?php elseif (isset($_GET['menor_vendedor'])) : ?>
                        Vendedor con menor cantidad de ventas en el mes actual
                      <?php elseif (isset($_GET['lineas']) && isset($_GET['promedio'])) : ?>
                        Promedio de ventas en los ultimos 12 meses

                      <?php elseif (isset($_GET['mayor_usuario'])) : ?>
                        Usuario que mas ha comprado

                      <?php elseif (isset($_GET['menor_usuario'])) : ?>
                        Usuario que menos ha comprado
                        <?php elseif(isset($_GET['ventas']) && isset($_GET['actual'])) : ?>
                         Total Ventas mes actual
                      <?php endif; ?>
                    </h3>

                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content p-0">
                      <!-- Morris chart - Sales -->
                      <?php
                      if (isset($_POST['fechainimax']) && isset($_POST['fechatermax']) && isset($_GET['mayor_vendedor'])) {
                        $fechainimax = $_POST['fechainimax'];
                        $fechatermax = $_POST['fechatermax'];
                        $fechaini = strtotime($fechainimax);
                        $fechater = strtotime($fechatermax);
                        $fecha_actual = strtotime(date("Y-m-d"));
                        if ($fechatermax < $fechainimax || $fechainimax > $fechatermax || $fechater > $fecha_actual || $fechaini > $fecha_actual) {
                          echo "<script>alert('Ingrese la fecha correctamente');window.location='./index.php?mayor_vendedor'</script>";
                        } else {
                          $sql = "SELECT MAX(rut_vendedor) AS 'rut_vendedor', COUNT(rut_vendedor) AS 'total_ventas' 
  FROM ventas WHERE fecha BETWEEN '" . $fechainimax . "' AND '" . $fechatermax . "' GROUP BY rut_vendedor ORDER BY COUNT(rut_vendedor) DESC LIMIT 1;";
                          $query = $conexion->query($sql);
                          foreach ($query as $data) {
                            $total[] = $data['total_ventas'];
                            $rut_vendedor[] = $data['rut_vendedor'];
                          }
                        }
                      } else if (isset($_POST['fechainimin']) && isset($_POST['fechatermin']) && isset($_GET['menor_vendedor'])) {
                        $fechainimax = $_POST['fechainimin'];
                        $fechatermax = $_POST['fechatermin'];
                        $fechaini = strtotime($fechainimax);
                        $fechater = strtotime($fechatermax);
                        $fecha_actual = strtotime(date("Y-m-d"));
                        if ($fechatermax < $fechainimax || $fechainimax > $fechatermax || $fechater > $fecha_actual || $fechaini > $fecha_actual) {
                          echo "<script>alert('Ingrese la fecha correctamente');window.location='./index.php?menor_vendedor'</script>";
                        } else {
                          $sql = "SELECT MIN(rut_vendedor) AS 'rut_vendedor', COUNT(rut_vendedor) AS 'total_ventas' 
  FROM ventas WHERE fecha BETWEEN '" . $fechainimax . "' AND '" . $fechatermax . "' GROUP BY rut_vendedor ORDER BY COUNT(rut_vendedor) ASC LIMIT 1;";
                          $query = $conexion->query($sql);
                          foreach ($query as $data) {
                            $total[] = $data['total_ventas'];
                            $rut_vendedor[] = $data['rut_vendedor'];
                          }
                        }
                      } else if (isset($_GET['ventas']) && isset($_GET['actual'])) {
                        $sql = "SELECT rut_vendedor, COUNT(*) AS 'total_ventas' FROM ventas WHERE MONTH(fecha) = MONTH(CURDATE()) GROUP BY rut_vendedor";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['mayor_usuario']) && isset($_POST['fechainiusumax']) && isset($_POST['fechaterusumax'])) {
                        $fechainimax = $_POST['fechainiusumax'];
                        $fechatermax = $_POST['fechaterusumax'];
                        $fechaini = strtotime($fechainimax);
                        $fechater = strtotime($fechatermax);
                        $fecha_actual = strtotime(date("Y-m-d"));
                        if ($fechatermax < $fechainimax || $fechainimax > $fechatermax || $fechater > $fecha_actual || $fechaini > $fecha_actual) {
                          echo "<script>alert('Ingrese la fecha correctamente');window.location='./index.php?mayor_usuario'</script>";
                        } else {
                          $sql = "SELECT MAX(rut_usuario) AS 'rut_vendedor', COUNT(rut_usuario) AS 'total_ventas'
                          FROM ventas WHERE fecha BETWEEN '" . $fechainimax . "' AND '" . $fechatermax . "' GROUP BY rut_usuario ORDER BY COUNT(rut_usuario) DESC LIMIT 1;";

                          $query = $conexion->query($sql);
                          foreach ($query as $data) {
                            $total[] = $data['total_ventas'];
                            $rut_vendedor[] = $data['rut_vendedor'];
                          }
                        }
                      } else if (isset($_GET['menor_usuario']) && isset($_POST['fechainiusumin']) && isset($_POST['fechaterusumin'])) {
                        $fechainimax = $_POST['fechainiusumin'];
                        $fechatermax = $_POST['fechaterusumin'];
                        $fechaini = strtotime($fechainimax);
                        $fechater = strtotime($fechatermax);
                        $fecha_actual = strtotime(date("Y-m-d"));
                        if ($fechatermax < $fechainimax || $fechainimax > $fechatermax || $fechater > $fecha_actual || $fechaini > $fecha_actual) {
                          echo "<script>alert('Ingrese la fecha correctamente');window.location='./index.php?mayor_usuario'</script>";
                        } else {
                          $sql = "SELECT MIN(rut_usuario) AS 'rut_vendedor', COUNT(rut_usuario) AS 'total_ventas' FROM 
                          ventas WHERE fecha BETWEEN '" . $fechainimax . "' AND '" . $fechatermax . "' GROUP BY rut_usuario ORDER BY COUNT(rut_usuario) ASC LIMIT 1;";

                          $query = $conexion->query($sql);
                          foreach ($query as $data) {
                            $total[] = $data['total_ventas'];
                            $rut_vendedor[] = $data['rut_vendedor'];
                          }
                        }
                      } else if (isset($_GET['mayor_vendedor'])) {
                        $sql = "SELECT MAX(rut_vendedor) AS 'rut_vendedor', COUNT(rut_vendedor) AS 'total_ventas' FROM ventas GROUP BY rut_vendedor ORDER BY COUNT(rut_vendedor)  DESC LIMIT 1";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['menor_vendedor'])) {
                        $sql = "SELECT MIN(rut_vendedor) AS 'rut_vendedor', COUNT(rut_vendedor) AS 'total_ventas' FROM ventas GROUP BY rut_vendedor ORDER BY COUNT(rut_vendedor) ASC LIMIT 1";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['lineas']) && isset($_GET['promedio']) && isset($_SESSION['autor']) && isset($_SESSION['data'])) {
                        $conexion->query("SET lc_time_names = 'es_ES'");
                        $sql = "$vendedor";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['lineas']) && isset($_GET['promedio'])) {
                        $conexion->query("SET lc_time_names = 'es_ES'");
                        $sql = "SELECT rut_vendedor as 'rut', MONTHNAME(fecha) AS 'rut_vendedor' , AVG(total) AS 'total_ventas'
                        FROM ventas v 
                        WHERE v.fecha >= date_sub(curdate(), interval 12 month) GROUP BY MONTH(fecha)";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['mayor_usuario'])) {
                        $sql = "SELECT MAX(rut_usuario) AS 'rut_vendedor', COUNT(rut_usuario) AS 'total_ventas'
                         FROM ventas GROUP BY rut_usuario ORDER BY COUNT(rut_usuario) DESC LIMIT 1";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['menor_usuario'])) {
                        $sql = "SELECT MIN(rut_usuario) AS 'rut_vendedor', COUNT(rut_usuario) AS 'total_ventas' FROM 
                        ventas GROUP BY rut_usuario ORDER BY COUNT(rut_usuario) ASC LIMIT 1";
                        $query = $conexion->query($sql);
                        foreach ($query as $data) {
                          $total[] = $data['total_ventas'];
                          $rut_vendedor[] = $data['rut_vendedor'];
                        }
                      } else if (isset($_GET['ventas'])) {
                        $fechainimax = $_POST['fechainiven'];
                        $fechatermax = $_POST['fechaterven'];
                        $fechaini = strtotime($fechainimax);
                        $fechater = strtotime($fechatermax);
                        $fecha_actual = strtotime(date("Y-m-d"));
                        if ($fechatermax < $fechainimax || $fechainimax > $fechatermax || $fechater > $fecha_actual || $fechaini > $fecha_actual) {
                          echo "<script>alert('Ingrese la fecha correctamente');window.location='./index.php?ventas'</script>";
                        } else {
                          $sql = "SELECT rut_vendedor, COUNT(*) AS 'total_ventas' FROM ventas
                           WHERE fecha BETWEEN '" . $fechainimax . "' AND '" . $fechatermax . "' GROUP BY rut_vendedor;";
                          $query = $conexion->query($sql);
                          foreach ($query as $data) {
                            $total[] = $data['total_ventas'];
                            $rut_vendedor[] = $data['rut_vendedor'];
                          }
                        }
                      }



                      ?>
                      <?php if (isset($_GET['lineas']) && isset($_GET['promedio']) && isset($_SESSION['autor']) && isset($_SESSION['data']) && isset($_SESSION['inicial'])
                      && isset($_SESSION['termino'])&& isset($_SESSION['vendedor'])) { ?>
                        <div>
                          <canvas id="myChart"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                          const ctx = document.getElementById('myChart');
                          new Chart(ctx, {
                            type: 'line',
                            data: {
                              labels: <?php echo json_encode($rut_vendedor) ?>,
                              datasets: [{
                                label: 'Promedio de ventas',
                                data: <?php echo json_encode($total) ?>,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                              }]
                            },
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              }
                            }
                          });
                        </script>
                      <?php } else if (isset($_GET['lineas']) && isset($_GET['promedio'])) { ?>
                        <div>
                          <canvas id="myChart"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                          const ctx = document.getElementById('myChart');
                          new Chart(ctx, {
                            type: 'line',
                            data: {
                              labels: <?php echo json_encode($rut_vendedor) ?>,
                              datasets: [{
                                label: 'Prueba',
                                data: <?php echo json_encode($total) ?>,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                              }]
                            },
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              }
                            }
                          });
                        </script>

                      <?php } else { ?>
                        <div>
                          <canvas id="myChart"></canvas>
                        </div>

                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <script>
                          const ctx = document.getElementById('myChart');

                          new Chart(ctx, {
                            type: 'bar',
                            data: {
                              labels: <?php echo json_encode($rut_vendedor) ?>,
                              datasets: [{
                                label: 'total',
                                data: <?php echo json_encode($total) ?>,
                                borderWidth: 1,
                                barThickness: 100
                              }]
                            },
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              }
                            }
                          });
                        </script>
                      <?php  } ?>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
              </section>


            <?php } ?>

            <!-- /.row (main row) -->

          </div>
          <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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

</body>

</html>