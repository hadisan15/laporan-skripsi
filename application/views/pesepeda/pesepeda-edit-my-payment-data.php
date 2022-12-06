    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="<?= base_url('pesepeda/myPaymentData'); ?>">My Cyclist Payment</a></li>
              <li class="breadcrumb-item active">Edit My Cyclist Payment</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('pesepeda/editMyPaymentData/' . $myPaymentData['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $myPaymentData['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $myPaymentData['nama']; ?>" disabled>
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-3">
              Insurance Payment Receipt
            </div>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/tfasuransi/' . $myPaymentData['bayar_asuransi']); ?>" width="100px" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="bayar_asuransi">Upload</label>
                    <input type="file" class="form-control" id="bayar_asuransi" name="bayar_asuransi">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="beli_jersey" class="col-sm-3 col-form-label">Jersey Purchase</label>
            <div class="col-sm-9">
              <select class="form-select" name="beli_jersey" id="beli_jersey">
                <option selected><?= $myPaymentData['beli_jersey']; ?></option>
                <option value="Ya">Ya</option>
                <option value="Tidak">Tidak</option>
              </select>
              <small class="text-danger"><?= form_error('beli_jersey') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="ukuran_jersey" class="col-sm-3 col-form-label">Jersey Size</label>
            <div class="col-sm-9">
              <select class="form-select" name="ukuran_jersey" id="ukuran_jersey">
                <option selected><?= $myPaymentData['ukuran_jersey']; ?></option>
                <option value="XS">1. XS</option>
                <option value="S">2. S</option>
                <option value="M">3. M</option>
                <option value="L">4. L</option>
                <option value="XL">5. XL</option>
                <option value="XXL">6. XXL</option>
                <option value="-">7. -</option>
              </select>
              <small class="text-danger"><?= form_error('ukuran_jersey') ?></small>
            </div>
          </div>
          
          <div class="row mb-3">
            <div class="col-sm-3">
              Jersey Payment Receipt
            </div>
            <div class="col-sm-9">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/tfjersey/' . $myPaymentData['bayar_jersey']); ?>" width="100px" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="bayar_jersey">Upload</label>
                    <input type="file" class="form-control" id="bayar_jersey" name="bayar_jersey">
                  </div>
                </div>
              </div>
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