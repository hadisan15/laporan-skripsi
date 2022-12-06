    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('pesepeda/myCyclistData') . $myCyclistData['id']; ?>">My Cyclist Data</a></li>
              <li class="breadcrumb-item active">Edit My Cyclist Data</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('pesepeda/editMyCyclistData/' . $myCyclistData['id'])  ; ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" placeholder="Insert Cyclist Number" value="<?= $myCyclistData['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="no_identitas" class="col-sm-3 col-form-label">Identity Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="no_identitas" name="no_identitas" placeholder="Insert Identity Number" value="<?= $myCyclistData['no_identitas']; ?>" readonly>
              <small class="text-danger"><?= form_error('no_identitas') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Insert Cyclist Name" value="<?= $myCyclistData['nama']; ?>">
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Birth Date</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $myCyclistData['tanggal_lahir']; ?>">
              <small class="text-danger"><?= form_error('tanggal_lahir') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="jenis_kelamin" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-9">
              <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                <option selected><?= $myCyclistData['jenis_kelamin']; ?></option>
                <option value="Laki-laki">Male</option>
                <option value="Perempuan">Female</option>
              </select>
              <small class="text-danger"><?= form_error('jenis_kelamin') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="alamat" class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Insert Address" value="<?= $myCyclistData['alamat']; ?>">
              <small class="text-danger"><?= form_error('alamat') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="telp" class="col-sm-3 col-form-label">Phone Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="telp" name="telp" placeholder="Insert Phone Number" value="<?= $myCyclistData['telp']; ?>">
              <small class="text-danger"><?= form_error('telp') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" name="email" placeholder="Insert Email" value="<?= $myCyclistData['email']; ?>">
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
                  <img src="<?= base_url('assets/img/cyclist/' . $myCyclistData['foto']); ?>" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="foto">Upload</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <small class="text-danger"><?= form_error('foto') ?></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="tanggal_daftar" class="col-sm-3 col-form-label">Register Date</label>
            <div class="col-sm-9">
              <input type="date" class="form-control" id="tanggal_daftar" name="tanggal_daftar" value="<?= $myCyclistData['tanggal_daftar']; ?>" readonly>
              <small class="text-danger"><?= form_error('tanggal_daftar') ?></small>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-warning text-white">Edit</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->