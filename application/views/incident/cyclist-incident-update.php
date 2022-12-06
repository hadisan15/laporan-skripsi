    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('incident'); ?>">Cyclist Incident</a></li>
              <li class="breadcrumb-item active">Cyclist Incident Update</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('incident/cyclistIncidentEdit/' . $cyclistIncident['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $cyclistIncident['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $cyclistIncident['nama']; ?>" disabled>
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="level_kecelakaan" class="col-sm-3 col-form-label">Incident Level</label>
            <div class="col-sm-9">
              <select class="form-select" name="level_kecelakaan" id="level_kecelakaan">
                <option selected><?= $cyclistIncident['level_kecelakaan']; ?></option>
                <option value="Aman">Aman</option>
                <option value="Ringan">Ringan</option>
                <option value="Sedang">Sedang</option>
                <option value="Berat">Berat</option>
              </select>
              <small class="text-danger"><?= form_error('level_kecelakaan') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="kecelakaan" class="col-sm-3 col-form-label">Incident Description</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="kecelakaan" name="kecelakaan" value="<?= $cyclistIncident['kecelakaan']; ?>">
              <small class="text-danger"><?= form_error('kecelakaan') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="status_pesepeda" class="col-sm-3 col-form-label">Cyclist Status</label>
            <div class="col-sm-9">
              <select class="form-select" name="status_pesepeda" id="status_pesepeda">
                <option selected><?= $cyclistIncident['status_pesepeda']; ?></option>
                <option value="-">-</option>
                <option value="Lanjut Bersepeda">Lanjut Bersepeda</option>
                <option value="Dievakuasi">Dievakuasi</option>
              </select>
              <small class="text-danger"><?= form_error('status_pesepeda') ?></small>
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