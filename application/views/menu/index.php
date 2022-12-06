    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
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
        <div class="col">
          <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
          <?= $this->session->flashdata('message'); ?>
          <a href="<?= base_url('menu/addMenu'); ?>" class="btn btn-primary mb-3">Add Menu</a>
          <table class="table table-hover" id="dataTable">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Menu</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $m['menu']; ?></td>
                  <td>
                    <a href="<?= base_url('menu/editMenu/' . $m['id']); ?>" class="badge badge-success" style="text-decoration: none;">Edit</a>
                    <a href="<?= base_url('menu/deleteMenu/' . $m['id']); ?>" class="badge badge-danger" style="text-decoration: none;" onclick="return confirm('Do you want to delete this menu?')">Delete</a>
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
    <!-- End of Main Content -->

    <!-- Modal Add-->
    <div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addMenuModalLabel">Add Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('menu'); ?>" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <input type="text" class="form-control" id="menu" name="menu" placeholder="New Menu Name">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Edit-->
    <div class="modal fade" id="editMenuModal" tabindex="-1" aria-labelledby="editMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMenuModalLabel">Edit Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('menu/editMenu'); ?>" method="post">
            <div class="modal-body modal-body-edit">
              <input type="hidden" name="idHidden" id="idHidden" value="<?= $m['id']; ?>">
              <div class="mb-3">
                <input type="text" class="form-control" id="menu" name="menu">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script>
      $(document).on("click", "#editMenuButton", function() {
        let idHidden = $(this).data('idHidden');
        let menu = $(this).data('menu');

        $(".modal-body-edit #idHidden").val(idHidden);
        $(".modal-body-edit #menu").val(menu);
      })
    </script>