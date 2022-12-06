<div class="container">

  <div class="row d-flex justify-content-center mt-3" style="margin-bottom: -30px;">
    <div class="col-md">
      <div class="card" style="width: 70rem;">
        <img src="<?= base_url('assets/img/header-tdl22.png'); ?>" class="card-img-top" alt="...">
      </div>
    </div>
  </div>

  <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">

        <div class="col-md">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Register</h1>
            </div>
            <?= form_open_multipart('pesepeda/eventRegistration'); ?>
            <div class="row mb-3">
              <label for="no_identitas" class="col-sm-3 col-form-label">Identity Number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Insert Identity Number" autocomplete="off">
                <small class="text-danger"><?= form_error('no_identitas') ?></small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nama" class="col-sm-3 col-form-label">Name</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Insert Cyclist Name" autocomplete="off">
                <small class="text-danger"><?= form_error('nama') ?></small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tanggal_lahir" class="col-sm-3 col-form-label">Birth Date</label>
              <div class="col-sm-9">
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" autocomplete="off">
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
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Insert Address" autocomplete="off">
                <small class="text-danger"><?= form_error('alamat') ?></small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="telp" class="col-sm-3 col-form-label">Phone Number</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="telp" name="telp" placeholder="Insert Phone Number" autocomplete="off">
                <small class="text-danger"><?= form_error('telp') ?></small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="email" class="col-sm-3 col-form-label">Email</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="email" name="email" placeholder="Insert Email" autocomplete="off">
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
            <hr>
            <!-- <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div> -->
            <div class="text-center">
              <a class="small" href="<?= base_url('auth/'); ?>">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>