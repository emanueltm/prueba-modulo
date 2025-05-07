<?= $this->extend("plantilla") ?>

<?= $this->section("css") ?>

<?= $this->endSection(); ?>

<?= $this->section("contenido") ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title fw-semibold mb-4">Ver todos los registros</h5>
    <div class="table-responsive">
      <table id="file_export" class="table w-100 table-striped table-bordered display text-nowrap">
        <thead>
          <tr>
            <th>Municipio</th>
            <th>Escuela</th>
            <th>grupo</th>
            <th>Total</th>
            <th>Niñas</th>
            <th>Niños</th>
            <th>Peso bajo</th>
            <th>Peso normal</th>
            <th>Peso alto</th>
            <th>Sobrepeso</th>
            <th>Hemoglabina<br>niñas</th>
            <th>Hemoglabina<br>niños</th>
            <th>Anemia<br>niñas</th>
            <th>Anemia<br>niños</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($escuelas as $key => $escuela) {
            $num_grupos = sizeof($escuela->grupos);
            echo "<tr>";
            echo "<td rowspan='".$num_grupos."'>".$escuela->municipio."</td>";
            echo "<td rowspan='".$num_grupos."'>".$escuela->nombre."</td>";
            echo "<td>".$escuela->grupos[0]->grupo."</td>";
            echo "<td>".$escuela->grupos[0]->ninos + $escuela->grupos[0]->ninas."</td>";
            echo "<td>".$escuela->grupos[0]->ninas."</td>";
            echo "<td>".$escuela->grupos[0]->ninos."</td>";
            echo "<td>".$escuela->grupos[0]->peso_bajo_ninos + $escuela->grupos[0]->peso_bajo_ninas."</td>";
            echo "<td>".$escuela->grupos[0]->peso_normal_ninos + $escuela->grupos[0]->peso_normal_ninas."</td>";
            echo "<td>".$escuela->grupos[0]->sobrepeso_ninos + $escuela->grupos[0]->sobrepeso_ninas."</td>";
            echo "<td>".$escuela->grupos[0]->sobrepeso_ninos + $escuela->grupos[0]->sobrepeso_ninas."</td>";
            echo "<td>".$escuela->grupos[0]->hemo_ninas."</td>";
            echo "<td>".$escuela->grupos[0]->hemo_ninos."</td>";
            echo "<td>".$escuela->grupos[0]->anemia_ninas."</td>";
            echo "<td>".$escuela->grupos[0]->anemia_ninos."</td>";
            echo "</tr>";
            if($num_grupos > 1){
              for ($i=1; $i < $num_grupos; $i++) { 
                echo "<tr>";
                echo "<td>".$escuela->grupos[$i]->grupo."</td>";
                echo "<td>".$escuela->grupos[$i]->ninos + $escuela->grupos[$i]->ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->ninos."</td>";
                echo "<td>".$escuela->grupos[$i]->peso_bajo_ninos + $escuela->grupos[$i]->peso_bajo_ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->peso_normal_ninos + $escuela->grupos[$i]->peso_normal_ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->sobrepeso_ninos + $escuela->grupos[$i]->sobrepeso_ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->sobrepeso_ninos + $escuela->grupos[$i]->sobrepeso_ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->hemo_ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->hemo_ninos."</td>";
                echo "<td>".$escuela->grupos[$i]->anemia_ninas."</td>";
                echo "<td>".$escuela->grupos[$i]->anemia_ninos."</td>";
                echo "</tr>";
              }
            }
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