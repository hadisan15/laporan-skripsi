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
              <li class="breadcrumb-item"><a href="<?= base_url('zone'); ?>">Zone</a></li>
              <li class="breadcrumb-item active">Cyclist Zone</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-2 mb-2">
            <a href="<?= base_url('zone/allCyclistZonePdf'); ?>" target="_blank">
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
                <th scope="col">Provinsi</th>
                <th scope="col">Transportation</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($cyclistZone as $cz) :
              ?>
                <tr>
                  <th scope="row"><?= $i++; ?></th>
                  <th scope="row"><?= $cz['id']; ?></th>
                  <th><?= $cz['nama']; ?></th>
                  <th><?= $cz['nama_asaldaerah']; ?></th>
                  <th><?= $cz['nama_provinsi']; ?></th>
                  <th><?= $cz['jenis_transportasi']; ?></th>
                  <th>
                    <a href="<?= base_url('zone/cyclistZoneUpdate/') . $cz['id'] ?>">
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