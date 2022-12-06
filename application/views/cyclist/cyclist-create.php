    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('cyclist'); ?>">Cyclist</a></li>
              <li class="breadcrumb-item active">Insert</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('cyclist/cyclistCreate'); ?>
          <!-- <div class="row mb-3">
            <label for="no_pesepeda" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="no_pesepeda" name="no_pesepeda" placeholder="Insert Cyclist Number">
              <small class="text-danger"><?= form_error('no_pesepeda') ?></small>
            </div>
          </div> -->
          <div class="row mb-3">
            <label for="no_identitas" class="col-sm-3 col-form-label">Identity Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Insert Identity Number">
              <small class="text-danger"><?= form_error('no_identitas') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Insert Cyclist Name">
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Birth Date</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
              <small class="text-danger"><?= form_error('tanggal_lahir') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
              <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                <option selected>Select Gender</option>
                <option value="Laki-laki">Male</option>
                <option value="Perempuan">Female</option>
              </select>
              <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Insert Address">
              <small class="text-danger"><?= form_error('alamat') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="telp" class="col-sm-3 col-form-label">Phone Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="telp" name="telp" placeholder="Insert Phone Number">
              <small class="text-danger"><?= form_error('telp') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" name="email" placeholder="Insert Email">
              <small class="text-danger"><?= form_error('email') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3">
              Picture
            </div>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/default.jpg'); ?>" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="foto">Upload</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" name="submit_email" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->