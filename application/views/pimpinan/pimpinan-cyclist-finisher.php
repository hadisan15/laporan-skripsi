    <!-- Begin Page Content -->
    <div class="container-fluid" style="min-height: 1000px;">

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
              <li class="breadcrumb-item active">Cyclist Finisher</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-5 mb-2">
            <a href="<?= base_url('winner/cyclistWinnerPdf'); ?>" target="_blank">
              <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
            </a>
          </div>

          <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th> </th>
                  <th>#</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Cyclist Status</th>
                  <th>Finish Order</th>
                  <th>Finish Time</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($cyclistWinner as $cw) : ?>
                  <tr>
                    <th><?= $i++; ?></th>
                    <th><?= $cw['id']; ?></th>
                    <th><?= $cw['nama']; ?></th>
                    <th><?= $cw['nama_kategori']; ?></th>
                    <th><?= $cw['status_pesepeda']; ?></th>
                    <th><?= $cw['urutan_finish']; ?></th>
                    <th><?= $cw['jam']; ?>:<?= $cw['menit']; ?>:<?= $cw['detik']; ?></th>
                    

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
    <!-- /.container-fluid -->