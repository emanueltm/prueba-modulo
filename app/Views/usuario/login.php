<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>(EMA)</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url("plantilla/images/logos/favicon.png") ?>" />
    <link rel="stylesheet" href="<?= base_url("plantilla/css/styles.min.css") ?>" />
  </head>

  <body>
    <!--  DIV Mensaje de Error -->
    <?php if ($msg = session()->getFlashdata('error_login')): ?>
      <div id="msg-error" class="alert alert-danger shadow text-center"
       style="position: fixed; top: 50px; left: 50%; transform: translateX(-50%);
              z-index: 9999; width: auto; max-width: 90%;">
        <?= esc($msg) ?>
      </div>
    <?php endif; ?>

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <a href="./index.html" class="text-nowrap logo-img text-center d-block py-3 w-100">
                    <img src="<?= base_url("plantilla/images/logos/dark-logo.svg") ?>" width="180" alt="">
                  </a>
                  <p class="text-center">Ingresa tus datos</p>
                  <?= form_open("validar_usuario") ?>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Usuario</label>
                      <input type="text" class="form-control" name="usuario"  aria-describedby="emailHelp">
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                      <input type="password" class="form-control" name="contrasena">
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label text-dark" for="flexCheckChecked">
                          Recordar en este dispositivo
                        </label>
                      </div>
                      <a class="text-primary fw-bold" href="/">Olvido su contraseña ?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2"> Iniciar Sesión</button>
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-bold">Nuevo en EMA?</p>
                      <a class="text-primary fw-bold ms-2" href="">Crear una cuenta</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?= base_url("plantilla/libs/jquery/dist/jquery.min.js") ?>"></script>
    <script src="<?= base_url("plantilla/libs/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>

    <!--  Script Mensaje de Error -->
    <script>
      setTimeout(() => {
        const msg = document.getElementById('msg-error');
          if (msg) {
            msg.style.transition = 'opacity 0.5s ease';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
          }
        }, 3500); // 5 segundos
    </script>
  </body>
</html>