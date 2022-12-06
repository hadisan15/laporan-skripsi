    <!-- Begin Page Content -->
    <div class="container-fluid" style="min-height: 1000px;">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">User Management</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>

      <div class="card px-2 py-2" style="min-height: 260px;">
        <div class="row">
          <div class="col-md-5 mb-2">
            <a href="<?= base_url('admin/userAdd'); ?>">
              <button type="button" class="btn btn-primary me-1"><i class="fa-solid fa-circle-plus"></i> Add Data</button>
            </a>
          </div>

          <div class="table-responsive">
            <table class="table" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($userListData as $u) : ?>
                  <tr>
                    <th><?= $i; ?></th>
                    <th><?= $u['name']; ?></th>
                    <th><?= $u['email']; ?></th>
                    <th><?= $u['role']; ?></th>
                    <th>
                      <img src="<?= base_url('assets/img/profile/') . $u['image']; ?>" width="100px" alt="">
                    </th>
                    <th>
                      <a href="<?= base_url('admin/userDelete/') . $u['id'] . '&' . $u['username'] ?>" onclick="return confirm('Do you want to delete this cyclist?')">
                        <span class="badge bg-danger"><i class="fa-solid fa-trash"></i></span>
                      </a>
                    </th>
                  </tr>
                  <?php $i++ ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>

    </div>
    <!-- /.container-fluid -->