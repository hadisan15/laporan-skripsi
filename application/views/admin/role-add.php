    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('admin/role'); ?>">Role</a></li>
              <li class="breadcrumb-item active">Create Role</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('admin/addRole/'); ?>
          <div class="row mb-3">
            <label for="role" class="col-sm-3 col-form-label">Role Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="role" name="role" placeholder="Insert Role Name">
              <small class="text-danger"><?= form_error('role') ?></small>
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