<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?= form_open_multipart('user/editProfile'); ?>
      <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        </div>
      </div>
      <div class="row mb-3">
        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" >
          <small class="text-danger"><?= form_error('name') ?></small>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-sm-2">
          Picture
        </div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" alt="" class="img-thumbnail">
            </div>
            <div class="col-sm-9">
              <div class="input-group mb-3">
                <label class="input-group-text" for="image">Upload</label>
                <input type="file" class="form-control" id="image" name="image">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row d-flex justify-content-end">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Edit</button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->