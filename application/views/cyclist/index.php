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
            <a href="<?= base_url('cyclist/cyclistCreate'); ?>">
              <button type="button" class="btn btn-primary me-1"><i class="fa-solid fa-circle-plus"></i> Add Data</button>
            </a>
            <a href="<?= base_url('cyclist/cyclistImportProcess'); ?>">
              <button type="button" class="btn btn-primary me-1"><i class="fa-solid fa-file-import"></i> Import Data</button>
            </a>
            <a href="<?= base_url('cyclist/cyclistPdf'); ?>" target="_blank">
              <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
            </a>
          </div>

          <div class="col-md-7">
            <form action="<?= base_url('cyclist/cyclistDateFilter'); ?>" method="get">
              <div class="input-group mb-3">
                <input type="text" class="form-control" disabled placeholder="Select Date Range">
                <input type="date" class="form-control" name="start_date">
                <input type="date" class="form-control" name="end_date">
                <button class="btn btn-secondary" type="submit" name="date_filter"><i class="fa-solid fa-filter"></i></button>
              </div>
            </form>
          </div>
          
          <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Cyclist Number</th>
                  <th>Identity Number</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Birth Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($cyclist as $c) :
                ?>
                  <tr>
                    <th><?= $i++; ?></th>
                    <th><?= $c['id']; ?></th>
                    <th><?= $c['no_identitas']; ?></th>
                    <th><?= $c['nama']; ?></th>
                    <th><?= $c['jenis_kelamin']; ?></th>
                    <th><?= date('d M Y', strtotime($c['tanggal_lahir'])); ?></th>
                    <th>
                      <a href="<?= base_url('cyclist/cyclistDetail/' . $c['id']); ?>">
                        <span class="badge bg-primary"><i class="fa-solid fa-file"></i></span>
                      </a>
                      <a href="<?= base_url('cyclist/cyclistEdit/') . $c['id'] ?>">
                        <span class="badge bg-warning"><i class="fa-solid fa-pen"></i></span>
                      </a>
                      <a href="<?= base_url('cyclist/cyclistDelete/') . $c['id'] . '/' . $c['username']?>" onclick="return confirm('Do you want to delete this cyclist?')">
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