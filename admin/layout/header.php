<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="./dashboard/dist/img//AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Tienda Decoiart</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <i class="nav-icon fas fa-user"></i>
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $arregloUsuario['nombre'] ?> <?php echo $arregloUsuario['apellido'] ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="./index.php" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>
              Inicio
            </p>
          </a>
        </li>

     
        <?php if ($arregloUsuario['nivel'] == '1') {  ?>
          <li class="nav-item">
            <a href="./compras.php" class="nav-link">
              <i class="nav-icon fa fa-money-bill-alt"></i>
              <p>
                Compras
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./panel-cotizaciones-usuario.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Cotizaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./contacto-usuario.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Correo
              </p>
            </a>
          </li>
        <?php
        } elseif ($arregloUsuario['nivel'] == '2') {


        ?>
          <li class="nav-item">
            <a href="./pedidos.php" class="nav-link">
              <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Pedidos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./pedidos_invitado.php" class="nav-link">
              <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Pedidos invitados
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./panel-cotizaciones-admin.php" class="nav-link">
            <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Cotizaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./panel-cotizaciones-invitado-admin.php" class="nav-link">
            <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Cotizaciones invitado
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./productos.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./contacto-usuario.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
              Correo
              </p>
            </a>
          </li>

        <?php } else if ($arregloUsuario['nivel'] == '3') { ?>
          <li class="nav-item">
            <a href="./usuarios.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./vendedores.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Vendedores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./pedidos.php" class="nav-link">
              <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Pedidos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./pedidos_invitado.php" class="nav-link">
              <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Pedidos invitado
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./panel-cotizaciones-admin.php" class="nav-link">
            <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Cotizaciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./panel-cotizaciones-invitado-admin.php" class="nav-link">
            <i class="nav-icon fa fa-dolly-flatbed"></i>
              <p>
                Cotizaciones invitado
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./productos.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./trabajos.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
                Trabajos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./contacto-vendedor.php" class="nav-link">
              <i class="nav-icon fa fa-tags"></i>
              <p>
              Correo
              </p>
            </a>
          </li>
        <?php } ?>

        <li class="nav-item">
          <a href="../Carrito/index.php" class="nav-link">
            <i class="nav-icon fa fa-shopping-cart"></i>
            <p>
              Tienda Decoiart
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../Carrito/php/cerrar_sesion.php" class="nav-link">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>
              Cerrar sesion
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>