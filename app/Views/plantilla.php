<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EMA</title>
  <link rel="shortcut icon" type="image/png" href="<?= base_url("plantilla/images/logos/favicon.png"); ?>" />
  <link rel="stylesheet" href="<?= base_url("plantilla/css/styles.min.css"); ?>" />
  <link rel="stylesheet" href="<?= base_url("plantilla/libs/iziToast-master/iziToast.css") ?>">
  <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css " rel="stylesheet">
  <?= $this->renderSection("css") ?>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="<?= route_to("dashboard") ?>" class="text-nowrap logo-img">
            <img src="<?= base_url("/plantilla/images/logos/dark-logo.svg") ?>" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Inicio</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= route_to('dashboard') ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Detección Hemoglabina</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= route_to("indicadores_homeglabina") ?>" aria-expanded="false">
                <span>
                  <i class="ti  ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Indicadores</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= route_to("registrar_alumnos") ?>" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Registrar</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="<?= route_to("registros") ?>" aria-expanded="false">
                <span>
                  <i class="ti ti ti-article"></i>
                </span>
                <span class="hide-menu">Ver Registros</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="<?= base_url("plantilla/images/profile/user-1.jpg") ?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="./authentication-login.html" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
      <!-- Container Main -->
      <div class="container-fluid">
        <?= $this->renderSection("contenido") ?>
        <!--  footer -->
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Diseñado y Desarrollado con Amor por el <a href="/" target="_blank" class="pe-1 text-primary text-decoration-underline">Departamento de Tecnología de Información</a></p>
        </div>
      </div>
      <!-- Container Main end -->
    </div>
  </div>
  <script src="<?= base_url("plantilla/libs/jquery/dist/jquery.min.js") ?>"></script>
  <script src="<?= base_url("plantilla/libs/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?= base_url("plantilla/js/sidebarmenu.js") ?>"></script>
  <script src="<?= base_url("plantilla/js/app.min.js") ?>"></script>
  <script src="<?= base_url("plantilla/libs/iziToast-master/iziToast.js") ?>"></script>
  <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js "></script>
  <?= $this->renderSection("js") ?>

  <script>
    <?php echo mostrar_mensaje() ?>
  </script>

</body>

</html>