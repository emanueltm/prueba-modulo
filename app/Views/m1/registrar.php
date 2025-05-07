<?= $this->extend("plantilla") ?>

<?= $this->section("css") ?>

<?= $this->endSection(); ?>

<?= $this->section("contenido") ?>
<div class="card" style="display: <?= ($escuela['id_grupo'] == null) ? 'block' :  'none' ?>">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Selecciona la Escuela</h5>
    <p class="mb-0 mt-0">Para iniciar la captura de información, indique el municipio y la escuela</p>
    <hr>
    <?= form_open("indicar_escuela", ['id' => 'form-escuela']); ?>
      <div class="mb-3">
        <label class="form-label">Selecciona un Municipio</label>
        <select name="input-municipio" id="input-municipio" class="form-select" onchange="load_escuelas(this.value)">
          <option value="0" >Selecciona una opción</option>
          <?php
            foreach ($municipios as $municipio) {
              echo '<option value="'.$municipio->id_municipio.'">'.$municipio->municipio.'</option>';
            }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Selecciona una Escuela</label>
        <select name="input-escuela" id="input-escuela" class="form-select" onchange="seleccionar_escuela(this.value)"></select>
      </div>
      <input type="hidden" name="grupo" id="grupo" value="">
      <button type="button" onclick="grado()" class="btn btn-outline-primary m-1">Ingresar</button>
    <?= form_close();?>
  </div>
</div>

<div class="card" style="display: <?= ($escuela['id_grupo'] == null) ? 'none' :  'block' ?>">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4"><?= $escuela["nombre_escuela"]." | ".$escuela['municipio']  ?></h5>
    <div class="row mb-4">
      <div class="col-md-3">
        <dt>Clave</dt>
        <dd><?= $escuela['clave'] ?></dd>
      </div>
      <div class="col-md-3">
        <dt>Turno</dt>
        <dd><?= $escuela['turno'] ?></dd>
      </div>
      <div class="col-md-3">
        <dt>Total Alumnos</dt>
        <dd><?= $escuela['total_alumnos'] ?></dd>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 col-xl-8">
        <button type="button" class="justify-content-center btn mb-1 btn-rounded bg-primary-subtle text-primary d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          <i class="ti ti-circle-plus fs-4 me-2"></i>
          Agregar
        </button>
      </div>
      <div class="col-md-7 col-xl-4 text-end  justify-content-md-end justify-content-center">
        <!-- <button type="button" class="">
          Cerrar Grupo
        </button> -->
        <a href="<?= route_to("cerrar_grupo") ?>" type="button" class="btn bg-danger-subtle text-danger">Cerrar Grupo</a>
      </div>
    </div>
    <div class="table-responsive mb-4 border rounded-1">

      <table class="table text-nowrap mb-0 align-middle">
        <thead class="text-dark fs-4">
          <tr>
            <th></th>
            <th></th>
            <th colspan="2" class="text-center">Total por</th>
            <th colspan="2" class="text-center">Peso Bajo</th>
            <th colspan="2" class="text-center">Peso Normal</th>
            <th colspan="2" class="text-center">Sobrepeso</th>
            <th colspan="2" class="text-center">Hemoglabina</th>
            <th colspan="2" class="text-center">Anemia</th>
          </tr>
          <tr>
            <th><h6 class="fs-4 fw-semibold mb-0">Grupo</h6></th>
            <th><h6 class="fs-4 fw-semibold mb-0">Total</h6></th>
            <th>Niñas</th>
            <th>Niños</th>
            <th>Niñas</th>
            <th>Niños</th>
            <th>Niñas</th>
            <th>Niños</th>
            <th>Niñas</th>
            <th>Niños</th>
            <th>Niñas</th>
            <th>Niños</th>
            <th>Niñas</th>
            <th>Niños</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= $escuela["grupo"] ?></td>
            <td><?= $total_grupo ?></td>
            <td><?= $grupo->ninas ?></td>
            <td><?= $grupo->ninos ?></td>
            <td><?= $grupo->peso_bajo_ninas ?></td>
            <td><?= $grupo->peso_bajo_ninos ?></td>
            <td><?= $grupo->peso_normal_ninas ?></td>
            <td><?= $grupo->peso_normal_ninos ?></td>
            <td><?= $grupo->sobrepeso_ninas ?></td>
            <td><?= $grupo->sobrepeso_ninos ?></td>
            <td><?= $grupo->hemo_ninas ?></td>
            <td><?= $grupo->hemo_ninos ?></td>
            <td><?= $grupo->anemia_ninas ?></td>
            <td><?= $grupo->anemia_ninos ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    
          
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header d-flex align-items-center">
            <h4 class="modal-title" id="myLargeModalLabel">
              Nuevo Alumno del grupo <?= $escuela["grupo"] ?>
            </h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <form action="<?= route_to("nuevo_alumno") ?>" method="post" class="needs-validation" novalidate> 
          <div class="modal-body">
            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-12 mb-3">
                  <label class="form-label">Nombre Alumnos</label>
                  <input type="text" id="" name="nombre_alumno" class="form-control" required>
                  <div class="invalid-feedback">Ingrese el nombre del alumno</div>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Sexo</label>
                  <select name="sexo" class="form-select" required>
                    <option value="1">Femenino</option>
                    <option value="2">Masculino</option>
                  </select>
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Censetimiento:</label>
                  <select name="consentimiento" id="consentimiento" class="form-select" onchange="validar_consentimiento(this.value)">
                    <option value="1">Firmó consentimiento</option>
                    <option value="2">Negó consentimiento</option>
                    <option value="3">No asistió</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="form-label">Peso</label>
                  <input type="text" id="peso" name="peso" class="form-control validanumericos" required>
                  <div class="invalid-feedback">Ingrese Peso</div>
                </div>
                <div class="col-md-4 mb-3">
                  <label class="form-label">Talla</label>
                  <input type="text" id="talla" name="talla" class="form-control validanumericos" onchange="calcular_imc()" required>
                  <div class="invalid-feedback">Ingrese Talla</div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 mb-3">
                  <label class="form-label">Hemoglabina</label>
                  <input type="text" id="hemo" name="hemo" class="form-control validanumericos">
                </div>
                <div class="col-md-8 ms-auto mb-3 text-center">
                  <label class="form-label">IMC</label>
                  <h4 id="label-imc">00.0</h4>
              </div>
              <input type="hidden" name="imc" id="imc">
              <input type="hidden" name="id_grupo" value="<?= $escuela['id_grupo'] ?>">
              
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn bg-danger-subtle text-danger  waves-effect text-start" data-bs-dismiss="modal">
              Cerrar
            </button>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>

  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("js") ?>
<script src="<?= base_url("plantilla/js/m1/registrar.js") ?>"></script>
<?= $this->endSection(); ?> 