    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="<?= base_url('pesepeda/myCategoryData'); ?>">My Cyclist Category</a></li>
              <li class="breadcrumb-item active">Edit My Cyclist Category</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('pesepeda/editMyCategoryData/' . $myCategoryData['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $myCategoryData['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $myCategoryData['nama']; ?>" disabled>
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="challenge_kom" class="col-sm-3 col-form-label">KoM Challenge</label>
            <div class="col-sm-9">
              <select class="form-select" name="challenge_kom" id="challenge_kom">
                <option selected><?= $myCategoryData['challenge_kom']; ?></option>
                <option value="Ya">Yes</option>
                <option value="Tidak">No</option>
              </select>
              <small class="text-danger"><?= form_error('challenge_kom') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="kode_kategori" class="col-sm-3 col-form-label">KoM Challenge Category</label>
            <div class="col-sm-9">
              <select class="form-select" name="kode_kategori" id="kode_kategori">
                <option selected><?= $myCategoryData['kode_kategori']; ?>. <?= $myCategoryData['nama_kategori']; ?></option>
                <option value="1">1. Woman Open</option>
                <option value="2">2. Man Junior</option>
                <option value="3">3. Man Elite</option>
                <option value="4">4. Man Master A</option>
                <option value="5">5. Man Master B</option>
                <option value="6">6. Man Master C</option>
                <option value="7">7. Uncategorize</option>
              </select>
              <small class="text-danger"><?= form_error('kode_kategori') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="bamboo_rafting" class="col-sm-3 col-form-label">Bamboo Rafting</label>
            <div class="col-sm-9">
              <select class="form-select" name="bamboo_rafting" id="bamboo_rafting">
                <option selected><?= $myCategoryData['bamboo_rafting']; ?></option>
                <option value="Ya">Yes</option>
                <option value="Tidak">No</option>
              </select>
              <small class="text-danger"><?= form_error('bamboo_rafting') ?></small>
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