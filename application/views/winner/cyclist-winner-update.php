    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('winner'); ?>">Cyclist Finisher</a></li>
              <li class="breadcrumb-item active">Cyclist Finisher Update</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('winner/cyclistWinnerEdit/' . $cyclistWinner['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $cyclistWinner['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $cyclistWinner['nama']; ?>" disabled>
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama_kategori" class="col-sm-3 col-form-label">Category</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $cyclistWinner['nama_kategori']; ?>" disabled>
              <small class="text-danger"><?= form_error('nama_kategori') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="urutan_finish" class="col-sm-3 col-form-label">Finish Order</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="urutan_finish" name="urutan_finish" value="<?= $cyclistWinner['urutan_finish']; ?>" >
              <small class="text-danger"><?= form_error('urutan_finish') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="jam" class="col-sm-3 col-form-label">Finish Time</label>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="jam" name="jam" value="<?= $cyclistWinner['jam']; ?>">
              <small class="text-danger"><?= form_error('jam') ?></small>
            </div>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="menit" name="menit" value="<?= $cyclistWinner['menit']; ?>">
              <small class="text-danger"><?= form_error('menit') ?></small>
            </div>
            <div class="col-sm-1">
              <input type="number" class="form-control" id="detik" name="detik" value="<?= $cyclistWinner['detik']; ?>">
              <small class="text-danger"><?= form_error('detik') ?></small>
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