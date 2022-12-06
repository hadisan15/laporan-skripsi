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
              <li class="breadcrumb-item"><a href="<?= base_url('pimpinan/categoryPimpinan'); ?>">Category</a></li>
              <li class="breadcrumb-item active">All Cyclist Category</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-2 mb-2">
            <a href="<?= base_url('category/allCyclistCategoryPdf'); ?>" target="_blank">
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
                <th scope="col">Challenge</th>
                <th scope="col">Challenge Category</th>
                <th scope="col">Bamboo Rafting</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              foreach ($cyclistCategory as $cc) :
              ?>
                <tr>
                  <th><?= $i++; ?></th>
                  <th scope="row"><?= $cc['id']; ?></th>
                  <th><?= $cc['nama']; ?></th>
                  <th><?= $cc['challenge_kom']; ?></th>
                  <th><?= $cc['nama_kategori']; ?></th>
                  <th><?= $cc['bamboo_rafting']; ?></th>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
    <!-- /.container-fluid -->