    <!-- Begin Page Content -->
    <div class="container-fluid">

      <div class="row">
        <div class="col-sm">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/userManagement'); ?>">User Management</a></li>
              <li class="breadcrumb-item active">Add User</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('admin/userAdd'); ?>
          <div class="row mb-3">
            <label for="name" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
              <small class="text-danger"><?= form_error('name') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
              <small class="text-danger"><?= form_error('email') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <small class="text-danger"><?= form_error('password') ?></small>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->