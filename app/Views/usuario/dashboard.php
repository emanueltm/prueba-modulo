<?= $this->extend("plantilla") ?>

<?= $this->section("css") ?>

<?= $this->endSection(); ?>

<?= $this->section("contenido") ?>
<div class="card">
  <div class="card-body">
    <h1>Bienvendio <?= session()->get('nombre_completo')?></h1>
    
    <p class="mb-0">Este es un espacio para ti</p>
  </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section("js") ?>

<?= $this->endSection(); ?>