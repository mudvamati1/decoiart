<?php
session_start();
include '../Carrito/php/conexion.php';

if (!isset($_SESSION['carrito'])) {
  header("Location: ./index.php");
}

if (isset($_SESSION['datos_login'])) {
  $arregloUsuario = $_SESSION['datos_login'];
}
if (isset($_SESSION['correo'])) {
  $correo = $_SESSION['correo'];
}

if (isset($_SESSION['correo'])) {
  $rut = $_SESSION['rut'];
}


$arreglo = $_SESSION['carrito'];








?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Formulario </title>
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
  <script src='main.js'></script>

  <script src="https://kit.fontawesome.com/048fc24e51.js" crossorigin="anonymous"></script>



</head>

<body>

  <div class="site-wrap">
    <?php include './layouts/header.php' ?>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Tienda</strong>
          </div>
        </div>
      </div>
    </div>
    <form action="./php/insertarpedido.php" method="POST">
      <div class="site-section">
        <div class="container">

          <div class="row">

            <div class="col-md-10 mb-5 mb-md-0">
              <h2 class="h3 mb-3 text-black">Formulario de cotización</h2>
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
             
              <div class="p-3 p-lg-5 border">
                <?php if (isset($_SESSION['datos_login'])) { ?>
                <div class="form-group row ">
                  <h2 class="h3 mb-3 text-black">Hola
                    <?php echo $arregloUsuario['nombre'] . " " . $arregloUsuario['apellido'] ?>
                  </h2>
                </div>

                <?php } else { ?>
                <div class="border p-4 rounded" role="alert">
                  Ya tienes una cuenta? <a href="../html/login.php">Click aqui</a> para logearte
                </div>
                <div class="form-group row">
                  <h2 class="h3 mb-3 text-black">Datos personales</h2>
                  <div class="col-md-12">
                    <label for="c_address" class="text-black">RUT <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="rut" pattern="\d{3,8}-[\d|kK]{1}" required="required"
                      oninput="checkRut(this)" name="rut" placeholder="Ingrese su rut sin puntos y con guion">
                  </div>
                </div>

                <div class="form-group row">

                  <div class="col-md-6">
                    <label for="c_fname" class="text-black">Nombre <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="c_fname" pattern="[a-zA-Z ]{2,254}"
                      placeholder="Ej: Matias" title="DEBE SER SOLO TEXTO" required="required">
                  </div>
                  <div class="col-md-6">
                    <label for="c_lname" class="text-black">Apellido<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_lname" name="c_lname" pattern="[a-zA-Z ]{2,254}"
                      placeholder="Ej: Acevedo" title="DEBE SER SOLO TEXTO" required="required">
                  </div>
                </div>
                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="c_email_address" class="text-black">Correo electronico <span
                        class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_email_address" name="c_email_address"
                      required="required" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                      placeholder="ejemplo@ejemplo.com">
                  </div>
                  <div class="col-md-6">
                    <label for="fdn" class="text-black">Fecha de nacimiento <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="c_address" required="required" name="fdn"
                      pattern="\d{1,2}/\d{1,2}/\d{4}" title="Ingrese el formato solicitado" placeholder="dd/mm/yyyy">
                  </div>
                </div>

                <?php } ?>
                <h2 class="h3 mb-3 text-black">Informacion de envio</h2>
                <div class="form-group row mb-5">
                  <div class="col-md-6">

                    <label for="region" class="text-black">Region <span class="text-danger">*</span></label>
                    <select id="region1" class="form-control" name="region1">
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label for="comuna" class="text-black">Comuna <span class="text-danger"></span></label>
                    <select id="comuna1" name="c_state_country1" class="form-control"></select>
                  </div>
                </div>
                <div class="form-group row mb-5">
                  <div class="col-md-6">
                    <label for="c_address" class="text-black">Direccion <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_address" name="c_address1"
                      placeholder="Nombre de la calle y numero">
                  </div>
                  <div class="col-md-6">
                    <label for="c_postal_zip" class="text-black">Codigo postal(opcional) <span
                        class="text-danger"></span></label>
                    <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                  </div>
                </div>
                <div class="form-group row mb-5">
                  <div class="col-md-12">
                    <label for="c_phone" class="text-black">Telefono/Celular <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_phone" name="c_phone"
                      placeholder="Numero de telefono">
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="row mb-5">
                    <div class="col-md-12">
                      <h2 class="h3 mb-3 text-black">Tu pedido</h2>
                      <div class="p-3 p-lg-5 border">
                        <table class="table site-block-order-table mb-5">
                          <thead>
                            <th>Producto</th>
                            <th>Total</th>
                          </thead>
                          <tbody>
                            <?php
                            $total = 0;
                            for ($i = 0; $i < count($arreglo); $i++) {
                              $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);

                            ?>
                            <tr>
                              <td>
                                <?php echo $arreglo[$i]['Nombre'] ?>
                              </td>
                              <td>$
                                <?php echo $arreglo[$i]['Precio'] ?>
                              </td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                              <td> Orden total</td>
                              <td>$
                                <?php echo $total ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>






                        <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Realizar orden</button>


                      </div>
                    </div>
                  </div>



                </div>
              </div>




            </div>
          </div>

          <!-- </form> -->
        </div>
      </div>

    </form>
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


  <script>
    $(document).ready(function () {
      $.ajax({
        url: ('../admin/cargar_region.php'),
        method: 'POST'

      })
        .done(function (regiones) {
          $('#region').html(regiones)
        })
        .fail(function () {
          alert('Hubo un errror al cargar las regiones')
        })

      $('#region').on('change', function () {
        var id = $('#region').val()
        $.ajax({
          url: ('../admin/cargar_comuna.php'),
          method: 'POST',
          data: {
            'id': id
          }
        })
          .done(function (regiones) {
            $('#comuna').html(regiones)
          })
          .fail(function () {
            alert('Hubo un error al cargar las comunas')
          });
      });
    });
  </script>
  <script>
    $(document).ready(function () {
      $.ajax({
        url: ('../admin/cargar_region1.php'),
        method: 'POST'

      })
        .done(function (regiones1) {
          $('#region1').html(regiones1)
        })
        .fail(function () {
          alert('Hubo un errror al cargar las regiones')
        })

      $('#region1').on('change', function () {
        var id = $('#region1').val()
        $.ajax({
          url: ('../admin/cargar_comuna1.php'),
          method: 'POST',
          data: {
            'id': id
          }
        })
          .done(function (regiones1) {
            $('#comuna1').html(regiones1)
          })
          .fail(function () {
            alert('Hubo un error al cargar las comunas')
          });
      });
    });
  </script>


</body>

</html>