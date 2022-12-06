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
              <li class="breadcrumb-item active">Cyclist Incident</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-5 mb-2">
            <a href="<?= base_url('pimpinan/evacuatePimpinan'); ?>">
              <button type="button" class="btn btn-primary"><i class="fa-solid fa-burst"></i> Cyclist Evacuate</button>
            </a>
            <a href="<?= base_url('incident/cyclistIncidentPdf'); ?>" target="_blank">
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
                  <th>Incident Level</th>
                  <th>Incident Description</th>
                  <th>Cyclist Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($cyclistIncident as $ci) : ?>
                  <tr>
                    <th><?= $i++; ?></th>
                    <th><?= $ci['id']; ?></th>
                    <th><?= $ci['nama']; ?></th>
                    <th><?= $ci['level_kecelakaan']; ?></th>
                    <th><?= $ci['kecelakaan']; ?></th>
                    <th><?= $ci['status_pesepeda']; ?></th>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
    <!-- /.container-fluid -->