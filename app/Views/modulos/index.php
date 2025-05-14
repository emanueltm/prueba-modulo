<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Módulos</title>
    <link rel="shortcut icon" type="image/png" href="/plantilla/images/logos/favicon.png" />
    <link rel="stylesheet" href="/plantilla/css/styles.min.css" />
    <link rel="stylesheet" href="/plantilla/libs/iziToast-master/iziToast.css" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/plantilla/icons/tabler-icons/tabler-icons.min.css" />
  </head>

  <body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
      data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

      <!-- Sidebar -->
      <aside class="left-sidebar">
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="#" class="text-nowrap logo-img">
              <img src="/plantilla/images/logos/dark-logo.svg" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>

          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap"><i class="ti ti-dots nav-small-cap-icon fs-4"></i><span class="hide-menu">Inicio</span></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/index.php" aria-expanded="false"><i class="ti ti-layout-dashboard"></i><span class="hide-menu">Mis Modulos</span></a></li>
              <li class="nav-small-cap"><i class="ti ti-dots nav-small-cap-icon fs-4"></i><span class="hide-menu">Mis Datos</span></li>
                <li class="sidebar-item"><a class="sidebar-link" href="#"><i class="ti ti-user-plus"></i><span class="hide-menu">Mi Perfil</span></a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/logout"><i class="ti ti-login"></i><span class="hide-menu">Cerrar Sesión</span></a></li>
            </ul>
          </nav>
        </div>
      </aside>

      <!-- Main content -->
      <div class="body-wrapper">

        <!-- Header -->
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

        <!-- Contenido principal -->
        <div class="container-fluid mt-4">
          <h2 class="mb-4 text-center">Módulos disponibles</h2>
          <div class="row justify-content-center">
            <?php foreach (session('modulos') as $id => $datos): ?>
              <div class="col-md-4 mb-4">
                <div class="card shadow border-0 h-100">
                  <div class="card-body text-center">
                    <img src="/plantilla/images/logos/dark-logo.svg" width="60" class="mb-3" alt="">
                    <h5 class="card-title"><?= esc($datos['modulo']) ?></h5>
                    <p class="card-text">Rol: <?= implode(', ', $datos['roles']) ?></p>
                    <a href="/m<?= $id ?>" class="btn btn-primary w-100">Entrar</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Footer -->
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Diseñado y Desarrollado con Amor por el <a href="/" class="pe-1 text-primary text-decoration-underline">Departamento de Tecnología de Información</a></p>
        </div>

      </div>
    </div>

    <!-- Scripts -->
    <script src="/plantilla/libs/simplebar/dist/simplebar.js"></script>
    <script src="/plantilla/libs/jquery/dist/jquery.min.js"></script>
    <script src="/plantilla/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/plantilla/js/sidebarmenu.js"></script>
    <script src="/plantilla/js/app.min.js"></script>
    <script src="/plantilla/libs/iziToast-master/iziToast.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
  </body>
</html>
