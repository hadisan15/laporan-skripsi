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
              <li class="breadcrumb-item"><a href="<?= base_url('cyclist'); ?>">Cyclist</a></li>
              <li class="breadcrumb-item active">Date Filter</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col">
            <div class="row">
              <div class="col-md-2">
                <form action="<?= base_url('cyclist/cyclistDateFilterPdf'); ?>" method="get" target="_blank">
                  <input type="hidden" class="form-control" name="start_date" value="<?= $_GET['start_date']; ?>" readonly>
                  <input type="hidden" class="form-control" name="end_date" value="<?= $_GET['end_date']; ?>" readonly>
                  <button class="btn btn-success" type="submit" name="date_filter"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
                </form>
              </div>
              <div class="col-md-6"></div>
              <div class="col-md-4">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" disabled placeholder="Date Filter from <?= date('d M Y', strtotime($_GET['start_date'])); ?> to <?= date('d M Y', strtotime($_GET['end_date'])); ?>">
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cyclist Number</th>
                    <th scope="col">Identity Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Birth Date</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $i = 1;
                    foreach ($cyclist as $c) : 
                  ?>
                    <tr>
                      <th scope="row"><?= $i++; ?></th>
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
                        <a href="<?= base_url('cyclist/cyclistDelete/') . $c['id'] ?>" onclick="return confirm('Do you want to delete this cyclist?')">
                          <span class="badge bg-danger"><i class="fa-solid fa-trash"></i></span>
                        </a>
                      </th>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.container-fluid -->
        </div>
      </div>
    </div>
    </div>