    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('sponsor'); ?>">Sponsor</a></li>
              <li class="breadcrumb-item active">Insert</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('sponsor/sponsorCreate'); ?>
          <div class="row mb-3">
            <label for="nama_event" class="col-sm-3 col-form-label">Nama Event</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_event" name="nama_event" placeholder="Tambahkan Nama Event">
              <small class="text-danger"><?= form_error('nama_event') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tanggal_event" class="col-sm-3 col-form-label">Tanggal Event</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tanggal_event" name="tanggal_event">
              <small class="text-danger"><?= form_error('tanggal_event') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama_sponsor" class="col-sm-3 col-form-label">Nama Sponsor</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_sponsor" name="nama_sponsor"  placeholder="Tambahkan Nama Sponsor">
              <small class="text-danger"><?= form_error('nama_sponsor') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="bentuk_dukungan" class="col-sm-3 col-form-label">Bentuk Dukungan</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="bentuk_dukungan" name="bentuk_dukungan" placeholder="Tambahkan Bentuk Dukungan">
              <small class="text-danger"><?= form_error('bentuk_dukungan') ?></small>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" name="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->