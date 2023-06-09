<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="container">
  <div class="row">
    <div class="col-8 mt-3">
      <h2>Form Tambah Data</h2>
      <?php if (session()->has('error')) : ?>
        <div class="alert alert-success" role="alert">
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>
      <form action="/komik/save" method="post">
        <?= csrf_field(); ?>
        <div class="row mb-3">
          <label for="judul" class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" name="judul" autofocus>
          </div>
        </div>
        <div class="row mb-3">
          <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" name="penulis">
          </div>
        </div>
        <div class="row mb-3">
          <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="penerbit" name="penerbit">
          </div>
        </div>
        <div class="row mb-3">
          <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sampul" name="sampul">
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Tambah data</button>
      </form>
    </div>
  </div>
</div>
<?= $this->endSection() ?>