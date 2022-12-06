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
              <li class="breadcrumb-item"><a href="<?= base_url('zone'); ?>">Zone</a></li>
              <li class="breadcrumb-item active"><?= $zoneName['nama_asaldaerah']; ?> Cyclist</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-2 mb-2">
            <a href="<?= base_url('zone/cyclistPerZonePdf/'); ?><?= $zoneName['kode_asaldaerah']; ?>" target="_blank">
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
                <th scope="col">Zone</th>
                <th scope="col">Province</th>
                <th scope="col">Transportation</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($cyclistPerZone as $cpz) :
              ?>
                <tr>
                  <th scope="row"><?= $i++ ?></th>
                  <th scope="row"><?= $cpz['id']; ?></th>
                  <th><?= $cpz['nama']; ?></th>
                  <th><?= $cpz['nama_asaldaerah']; ?></th>
                  <th><?= $cpz['nama_provinsi']; ?></th>
                  <th><?= $cpz['jenis_transportasi']; ?></th>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->