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
              <li class="breadcrumb-item active">Informations</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row mt-3 justify-content-center">
          <?php foreach ($article as $row) : ?>
            <div class="col-md-4 mb-3">
              <div class="card" style="width: 18rem;">
                <img src="<?= base_url('assets/img/article/' . $row['gambar']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?= $row['judul']; ?></h5>
                  <p class="card-text">By <?= $row['penulis']; ?></p>
                  <p class="card-text"><?= date('d M Y', strtotime($row['tanggal'])); ?></p>
                  <p class="card-text"><?= substr($row['isi'], 0, 100) ?>...</p>
                  <a href="<?= base_url('about/infoUpdateDetail/' . $row['slug']); ?>" class="btn btn-primary">Read More</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
    </div>