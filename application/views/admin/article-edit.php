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
              <li class="breadcrumb-item active">Edit Article</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col">
            <?= form_open_multipart('admin/articleEdit/' . $article['id']); ?>
            <input type="hidden" name="id" value="<?= $article['id']; ?>">
            <div class="row mb-3">
              <label for="judul" class="col-sm-3 col-form-label">Title</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Insert Article Title" value="<?= $article['judul']; ?>">
                <small class="text-danger"><?= form_error('judul') ?></small>
              </div>
            </div>
            <div class="row mb-3">
              <label for="isi" class="col-sm-3 col-form-label">Content</label>
              <div class="col-sm-9">
                <textarea class="form-control" id="isi" name="isi" placeholder="Insert Article Content"><?= $article['isi']; ?></textarea>
                <!-- <input type="text" class="form-control" id="isi" name="isi" placeholder="Insert Article Content"> -->
                <small class="text-danger"><?= form_error('isi') ?></small>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-sm-3">
                Image
              </div>
              <div class="col-sm-9">
                <div class="row">
                  <div class="col-sm-3">
                    <img src="<?= base_url('assets/img/article/' . $article['gambar']); ?>" alt="" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group mb-3">
                      <label class="input-group-text" for="gambar">Upload</label>
                      <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group row d-flex justify-content-end">
              <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">Post</button>
              </div>
            </div>
          </div>
        </div>


      </div>



    </div>
    <!-- /.container-fluid -->
    </div>