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
              <li class="breadcrumb-item"><a href="<?= base_url('admin/article'); ?>">Article</a></li>
              <li class="breadcrumb-item active">Article Detail</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="mb-3">
        <a href="<?= base_url('admin/articleEdit/' . $article['id']); ?>" class="btn btn-success">Edit</a>
        <a href="<?= base_url('admin/articleDelete/' . $article['id']); ?>" class="btn btn-danger">Delete</a>
      </div>
      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col d-flex justify-content-center">
            <div class="card" style="width: 56rem;">
              <div class="card-body">
                <h5 class="card-title mb-3"><?= $article['judul']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">By <?= $article['penulis']; ?></h6>
                <h6 class="card-subtitle mb-2 text-muted"><?= date('d M Y', strtotime($article['tanggal'])); ?></h6>
                <div class="row mt-5">
                  <div class="col-md-6">
                    <article><?= $article['isi']; ?></article>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <img src="<?= base_url('assets/img/article/' . $article['gambar']) ?>" class="card-img-top" alt="<?= $article['gambar']; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>
    <!-- /.container-fluid -->
    </div>