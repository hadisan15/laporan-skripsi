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
              <li class="breadcrumb-item active">Cyclist</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-5 mb-2">
            <a href="<?= base_url('sponsor/sponsorCreate'); ?>">
              <button type="button" class="btn btn-primary me-1"><i class="fa-solid fa-circle-plus"></i> Add Data</button>
            </a>
            <a href="<?= base_url('sponsor/sponsorPdf'); ?>" target="_blank">
              <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
            </a>
          </div>
          <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Event</th>
                  <th>Tanggal Event</th>
                  <th>Nama Sponsor</th>
                  <th>Bentuk Dukungan</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($sponsor as $s) :
                ?>
                  <tr>
                    <th><?= $i++; ?></th>
                    <th><?= $s['nama_event']; ?></th>
                    <th><?= date('d M Y', strtotime($s['tanggal_event'])); ?></th>
                    <th><?= $s['nama_sponsor']; ?></th>
                    <th><?= $s['bentuk_dukungan']; ?></th>
                    <th>
                      <a href="<?= base_url('sponsor/sponsorEdit/') . $s['id'] ?>">
                        <span class="badge bg-warning"><i class="fa-solid fa-pen"></i></span>
                      </a>
                      <a href="<?= base_url('sponsor/sponsorDelete/') . $s['id'] ?>" onclick="return confirm('Do you want to delete this sponsorship data?')">
                        <span class="badge bg-danger"><i class="fa-solid fa-trash"></i></span>
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