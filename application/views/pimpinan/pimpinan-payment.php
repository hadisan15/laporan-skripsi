    <!-- Begin Page Content -->
    <div class="container-fluid" style="min-height: 450px;">

      <div class="row">
        <div class="col-sm">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>

      <!-- Page Heading -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Payment</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-6 mb-2">
            <a href="<?= base_url('pimpinan/cyclistPaymentPimpinan/'); ?>">
              <button type="button" class="btn btn-primary me-1"><i class="fa-solid fa-clipboard-list"></i> Open All Cyclist Payment</button>
            </a>
            <a href="<?= base_url('payment/jerseyPdf'); ?>" target="_blank">
              <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
            </a>
          </div>
        </div>
        <div class="row mt-3 justify-content-center">
          <h4 class="mb-3">Cyclist Jersey</h4>
          <?php foreach ($jersey as $row) : ?>
            <div class="col-md-4 mb-3">
              <div class="card" style="width: 18rem;">
                <img src="<?= base_url('assets/img/jersey/' . $row['gambar_ukuran']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $row['keterangan']; ?></h5>
                  <ul>
                    <li>Chest (A): <?= $row['chest']; ?></li>
                    <li>Sleeve (B): <?= $row['sleeve']; ?></li>
                    <li>Front (C): <?= $row['front']; ?></li>
                    <li>Back (D): <?= $row['back']; ?></li>
                  </ul>
                  <p class="card-text">Number of Cyclists: <?= $row['jlh']; ?></p>
                  <a href="<?= base_url('pimpinan/cyclistPerJerseyPimpinan/' . $row['ukuran_jersey']); ?>" class="btn btn-primary">Open</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->