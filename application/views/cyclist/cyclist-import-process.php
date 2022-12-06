<?php

require 'vendor/autoload.php';


?>
<!-- Begin Page Content -->
<div class="container-fluid">

  <div class="row">
    <div class="col-sm">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Breadcrumb -->
  <div class="row">
    <div class="col-sm">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Cyclist Import</li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row">
    <div class="col-sm">
      <?= form_open_multipart('cyclist/cyclistImport'); ?>
      <!-- <div class="row mb-3">
            <div class="col-sm-3">
              Picture
            </div>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="import">Upload</label>
                    <input type="file" class="form-control" id="import" name="import">
                  </div>
                </div>
              </div>
            </div>
          </div> -->
      <div class="row mb-3">
        <label for="import" class="col-sm-3 col-form-label">Import Cyclist Data</label>
        <div class="col-sm-9">
          <input type="file" class="form-control" id="import" name="import" placeholder="Insert Email">
          <small class="text-danger"><?= form_error('import') ?></small>
        </div>
      </div>
      <div class="form-group row d-flex justify-content-end">
        <div class="col-sm-9">
          <button type="submit" name="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->