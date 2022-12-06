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
              <li class="breadcrumb-item active"><?= $jerseyName['ukuran_jersey']; ?> Jersey Cyclist</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-2 mb-2">
            <a href="<?= base_url('payment/cyclistPerJerseyPdf/'); ?><?= $jerseyName['ukuran_jersey']; ?>" target="_blank">
              <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
            </a>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col"> </th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Insurance Payment</th>
                <th scope="col">Jersey</th>
                <th scope="col">Jersey Size</th>
                <th scope="col">Jersey Payment</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($cyclistPerJersey as $cpj) :
              ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <th><?= $cpj['id']; ?></th>
                  <th><?= $cpj['nama']; ?></th>
                  <th><img src="<?= base_url('assets/img/tfasuransi/' . $cpj['bayar_asuransi']); ?>" width="100px" alt="-"></th>
                  <th><?= $cpj['beli_jersey']; ?></th>
                  <th><?= $cpj['ukuran_jersey']; ?></th>
                  <th><img src="<?= base_url('assets/img/tfjersey/' . $cpj['bayar_jersey']); ?>" width="100px" alt="-"></th>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    </div>
    <!-- /.container-fluid -->