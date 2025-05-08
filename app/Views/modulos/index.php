<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Módulos disponibles</title>
  <link rel="stylesheet" href="<?= base_url("plantilla/css/styles.min.css") ?>">
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
    data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="text-center">
        <h2 class="mb-4">Módulos disponibles para <?= esc(session()->get('nombre_completo')) ?> (<?= esc($rol) ?>)</h2>

        <?php foreach ($modulos as $modulo): ?>
          <a href="<?= base_url("modulo{$modulo}") ?>" class="btn btn-primary btn-lg d-block mx-auto mb-3" style="width: 250px;">
            Módulo <?= $modulo ?>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <script src="<?= base_url("plantilla/libs/jquery/dist/jquery.min.js") ?>"></script>
  <script src="<?= base_url("plantilla/libs/bootstrap/dist/js/bootstrap.bundle.min.js") ?>"></script>
</body>
</html>