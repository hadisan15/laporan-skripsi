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
              <li class="breadcrumb-item"><a href="<?= base_url('payment'); ?>">Payment</a></li>
              <li class="breadcrumb-item active">All Cyclist Payment</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-2 mb-2">
            <a href="<?= base_url('payment/allCyclistPaymentPdf'); ?>" target="_blank">
              <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
            </a>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cyclist Number</th>
                <th scope="col">Name</th>
                <th scope="col">Insurance Payment</th>
                <th scope="col">Jersey</th>
                <th scope="col">Jersey Size</th>
                <th scope="col">Jersey Payment</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($cyclistPayment as $cpy) :
              ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <th><?= $cpy['id']; ?></th>
                  <th><?= $cpy['nama']; ?></th>
                  <th>
                    <?php
                    if ($cpy['status_bayar_asuransi'] == "Pending") {
                      $badgeColor = "bg-warning";
                    } elseif ($cpy['status_bayar_asuransi'] == "Accepted") {
                      $badgeColor = "bg-success";
                    } elseif ($cpy['status_bayar_asuransi'] == "Rejected") {
                      $badgeColor = "bg-danger";
                    } elseif ($cpy['status_bayar_asuransi'] == "Not Uploaded") {
                      $badgeColor = "bg-secondary";
                    }
                    ?>
                    <span class="badge rounded-pill text-white <?= $badgeColor; ?>"><?= $cpy['status_bayar_asuransi']; ?></span><br>
                    <img src="<?= base_url('assets/img/tfasuransi/' . $cpy['bayar_asuransi']); ?>" width="100px" alt="-">
                  </th>
                  <th><?= $cpy['beli_jersey']; ?></th>
                  <th><?= $cpy['ukuran_jersey']; ?></th>
                  <th>
                    <?php

                    if ($cpy['status_bayar_jersey'] == "Pending") {
                      $badgeColor = "bg-warning";
                    } elseif ($cpy['status_bayar_jersey'] == "Accepted") {
                      $badgeColor = "bg-success";
                    } elseif ($cpy['status_bayar_jersey'] == "Rejected") {
                      $badgeColor = "bg-danger";
                    } elseif ($cpy['status_bayar_jersey'] == "Not Uploaded") {
                      $badgeColor = "bg-secondary";
                    }
                    ?>
                    <span class="badge rounded-pill text-white <?= $badgeColor; ?>"><?= $cpy['status_bayar_jersey']; ?></span><br>
                    <img src="<?= base_url('assets/img/tfjersey/' . $cpy['bayar_jersey']); ?>" width="100px" alt="-">
                  </th>
                  <th>
                    <a href="<?= base_url('payment/cyclistPaymentUpdate/') . $cpy['id'] ?>">
                      <span class="badge bg-warning"><i class="fa-solid fa-pen"></i></span>
                    </a>
                  </th>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    </div>
    <!-- /.container-fluid -->