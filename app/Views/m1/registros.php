<?= $this->extend("plantilla") ?>

<?= $this->section("css") ?>

<?= $this->endSection(); ?>

<?= $this->section("contenido") ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4"><?= $nombre_vista ?></h5>
    <hr class="pb-1">
    <?= form_open("buscar_datos") ?>
      <label for="">Seleccionar un minucipio para filtrar la información</label>
      <select name="id_municipio" id="input-municipio" class="form-select"">
        <option value="-60">Todos los Municipios</option>
        <?php
          foreach ($municipios as $municipio) {
            echo '<option value="'.$municipio->id_municipio.'">'.$municipio->municipio.'</option>';
          }
        ?>
      </select>
      <button type="submit" class="btn btn-outline-primary m-1">Buscar</button>
      <a href="<?= route_to("generar_reporte") ?>" type="button" class="btn bg-primary-subtle text-primary">Generar Reporte</a>
    </form>
    <br>
    <h6>Municipio(s) seleccionados</h6>
    <div class="table-responsive">
      <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
        <thead>
          <tr>
            <th>Municipio</th>
            <th>Escuela</th>
            <th>Grupos Registrados</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($escuelas as $key => $escuela) {
            echo "<tr>";
            echo "<td>".$escuela->municipio."</td>";
            echo "<td>".$escuela->nombre."</td>";
            echo "<td>".$escuela->grupos."</td>";
            echo "</tr>";
          }
          ?>
          <tr></tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section("js") ?>

<?= $this->endSection(); ?> 