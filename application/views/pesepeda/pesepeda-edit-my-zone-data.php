    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="<?= base_url('pesepeda/myZoneData'); ?>">My Cyclist Zone</a></li>
              <li class="breadcrumb-item active">Edit My Cyclist Zone</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('pesepeda/editMyZoneData/' . $myZoneData['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $myZoneData['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $myZoneData['nama']; ?>" readonly>
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="kode_asaldaerah" class="col-sm-3 col-form-label">Zone</label>
            <div class="col-sm-9">
              <select class="form-select" name="kode_asaldaerah" id="kode_asaldaerah">
                <option selected><?= $myZoneData['kode_asaldaerah']; ?>. <?= $myZoneData['nama_asaldaerah']; ?></option>
                <option value="1">1. Kalimantan Selatan</option>
                <option value="2">2. Luar Kalimantan Selatan</option>
                <option value="3">3. Luar Pulau Kalimantan</option>
              </select>
              <small class="text-danger"><?= form_error('kode_asaldaerah') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama_provinsi" class="col-sm-3 col-form-label">Province</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama_provinsi" name="nama_provinsi" value="<?= $myZoneData['nama_provinsi']; ?>">
              <small class="text-danger"><?= form_error('nama_provinsi') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="jenis_transportasi" class="col-sm-3 col-form-label">Transportation</label>
            <div class="col-sm-9">
              <select class="form-select" name="jenis_transportasi" id="jenis_transportasi">
                <option selected><?= $myZoneData['jenis_transportasi']; ?></option>
                <option value="Panitia">Panitia</option>
                <option value="Mandiri">Mandiri</option>
              </select>
              <small class="text-danger"><?= form_error('jenis_transportasi') ?></small>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->