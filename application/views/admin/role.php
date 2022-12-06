    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><?= $title; ?></li>
            </ol>
          </nav>
        </div>
      </div>


      <div class="row">
        <div class="col-lg-6">
          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= $this->session->flashdata('message'); ?>
          <a href="<?= base_url('admin/addRole'); ?>" class="btn btn-primary mb-3">Add Role</a>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($role as $r) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $r['role']; ?></td>
                  <td>
                    <a href="<?= base_url('admin/roleAccess/' . $r['id']); ?>" class="badge badge-warning" style="text-decoration: none;">Access</a>
                    <a href="<?= base_url('admin/editRole/' . $r['id']); ?>" class="badge badge-success" id="editRoleButton" style="text-decoration: none;">Edit</a>
                    <a href="<?= base_url('admin/deleteRole/' . $r['id']); ?>" class="badge badge-danger" style="text-decoration: none;" onclick="return confirm('Do you want to delete this role?')">Delete</a>
                  </td>
                </tr>
                <?php $i++; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->
              </div>

    <script>
      $(document).on("click", "#editMenuButton", function() {
        let idHidden = $(this).data('idHidden');
        let menu = $(this).data('menu');

        $(".modal-body-edit #idHidden").val(idHidden);
        $(".modal-body-edit #menu").val(menu);
      })
    </script>