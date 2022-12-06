    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('menu'); ?>">Menu Management</a></li>
              <li class="breadcrumb-item active">Add Menu</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('menu/addMenu/'); ?>
          <input type="hidden" name="id">
          <div class="row mb-3">
            <label for="menu" class="col-sm-3 col-form-label">Menu</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="menu" name="menu">
              <small class="text-danger"><?= form_error('menu') ?></small>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->