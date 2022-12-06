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
              <li class="breadcrumb-item"><a href="<?= base_url('incident'); ?>">Cyclist Incident</a></li>
              <li class="breadcrumb-item active">Cyclist Evacuate</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-5 mb-2">
            <a href="<?= base_url('incident/cyclistEvacuatePdf'); ?>" target="_blank">
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
                  <th>Incident Level</th>
                  <th>Incident Description</th>
                  <th>Cyclist Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($cyclistEvacuate as $ce) : ?>
                  <tr>
                    <th><?= $i++; ?></th>
                    <th><?= $ce['id']; ?></th>
                    <th><?= $ce['nama']; ?></th>
                    <th><?= $ce['nama_kategori']; ?></th>
                    <th><?= $ce['level_kecelakaan']; ?></th>
                    <th><?= $ce['kecelakaan']; ?></th>
                    <th><?= $ce['status_pesepeda']; ?></th>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
    <!-- /.container-fluid -->