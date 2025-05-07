<?= $this->extend("plantilla") ?>

<?= $this->section("css") ?>

<?= $this->endSection(); ?>

<?= $this->section("contenido") ?>
<div class="card" >
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Ya estamos en vista indicadores</h5>
    
  </div>
</div>

<div class="row">
  <div class="col-lg-4">
    <div class="card overflow-hidden">
      <div class="card-body p-4">
        <h5 class="card-title mb-9 fw-semibold">Escuelas Avanzadas</h5>
        <div class="row align-items-center">
          <div class="col-8">
            <h4 class="fw-semibold mb-3"><?= $total_escuelas ?></h4>
            <div class="d-flex align-items-center mb-3">
              <span
                class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                <i class="ti ti-arrow-up-left text-success"></i>
              </span>
              <p class="text-dark me-1 fs-3 mb-0">+9%</p>
              <p class="fs-3 mb-0">last year</p>
            </div>
            <div class="d-flex align-items-center">
              <div class="me-4">
                <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                <span class="fs-2">2023</span>
              </div>
              <div>
                <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                <span class="fs-2">2023</span>
              </div>
            </div>
          </div>
          <div class="col-4">
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-8 card card-body">
  <table class="table w-100 table-striped table-bordered display text-nowrap">
    <thead>
      <tr>
        <td>Municipio</td>
        <td>Nombre Escuela</td>
        <td>Grupos Registrados</td>
      </tr>
    </thead>
              <?php
                foreach ($escuelas as $key => $value) {
                  echo "<tr>";
                  echo "<td>".$value->municipio."</td>";
                  echo "<td>".$value->nombre."</td>";
                  echo "<td>".$value->total_grupos."</td>";
                  echo "</tr>";
                }
              ?>
            </table>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("js") ?>
<script src="<?= base_url("plantilla/js/m1/registrar.js") ?>"></script>
<?= $this->endSection(); ?> 