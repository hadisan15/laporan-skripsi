    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('payment'); ?>">Payment</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('payment/cyclistPayment'); ?>">All Cyclist Payment</a></li>
              <li class="breadcrumb-item active">Cyclist Payment Update</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('payment/cyclistPaymentUpdate/' . $cyclistPayment['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $cyclistPayment['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $cyclistPayment['nama']; ?>" disabled>
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
                  <img src="<?= base_url('assets/img/tfasuransi/' . $cyclistPayment['bayar_asuransi']); ?>" width="100px" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="bayar_asuransi">Upload</label>
                    <input type="file" class="form-control" id="bayar_asuransi" name="bayar_asuransi">
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="status_bayar_asuransi" class="col-sm-3 col-form-label">Insurance Payment Status</label>
                <div class="col-sm-9">
                  <select class="form-select" name="status_bayar_asuransi" id="status_bayar_asuransi">
                    <option selected><?= $cyclistPayment['status_bayar_asuransi']; ?></option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                  </select>
                  <small class="text-danger"><?= form_error('status_bayar_asuransi') ?></small>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="beli_jersey" class="col-sm-3 col-form-label">Jersey Purchase</label>
            <div class="col-sm-9">
              <select class="form-select" name="beli_jersey" id="beli_jersey">
                <option selected><?= $cyclistPayment['beli_jersey']; ?></option>
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
                <option selected><?= $cyclistPayment['ukuran_jersey']; ?></option>
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
                  <img src="<?= base_url('assets/img/tfjersey/' . $cyclistPayment['bayar_jersey']); ?>" width="100px" alt="" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <label class="input-group-text" for="bayar_jersey">Upload</label>
                    <input type="file" class="form-control" id="bayar_jersey" name="bayar_jersey">

                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="status_bayar_jersey" class="col-sm-3 col-form-label">Jersey Payment Status</label>
                <div class="col-sm-9">
                  <select class="form-select" name="status_bayar_jersey" id="status_bayar_jersey">
                    <option selected><?= $cyclistPayment['status_bayar_jersey']; ?></option>
                    <option value="Accepted">Accepted</option>
                    <option value="Rejected">Rejected</option>
                    <option value="Pending">Pending</option>
                  </select>
                  <small class="text-danger"><?= form_error('status_bayar_jersey') ?></small>
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