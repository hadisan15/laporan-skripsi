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
        <div class="col-lg">
          <?php if (validation_errors()) : ?>
            <div class="alert alert-danger" role="alert">
              <?= validation_errors(); ?>
            </div>
          <?php endif; ?>
          <?= $this->session->flashdata('message'); ?>
          <a href="<?= base_url('menu/addSubmenu'); ?>" class="btn btn-primary mb-3">Add Submenu</a>
          <div class="table-responsive">
            <table class="table table-hover" id="dataTable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Menu</th>
                  <th scope="col">Url</th>
                  <th scope="col">Icon</th>
                  <th scope="col">Active</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($submenu as $sm) : ?>
                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $sm['title']; ?></td>
                    <td><?= $sm['menu']; ?></td>
                    <td><?= $sm['url']; ?></td>
                    <td><?= $sm['icon']; ?></td>
                    <td><?= $sm['is_active']; ?></td>
                    <td>
                      <a href="<?= base_url('menu/editSubmenu/' . $sm['id']); ?>" class="badge badge-success" style="text-decoration: none;">Edit</a>
                      <a href="<?= base_url('menu/deleteSubmenu/' . $sm['id']); ?>" class="badge badge-danger" style="text-decoration: none;" onclick="return confirm('Do you want to delete this submenu?')">Delete</a>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Modal Add-->
    <div class="modal fade" id="addSubmenuModal" tabindex="-1" aria-labelledby="addSubmenuModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addSubmenuModalLabel">Add Submenu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="<?= base_url('menu/submenu'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu Title">
              </div>
              <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="">Select Menu</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu Icon">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    Active?
                  </label>
                </div>
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
          <form action="<?= base_url('menu'); ?>" method="post">
            <div class="modal-body">
              <div class="mb-3">
                <input type="text" class="form-control" id="menu" name="menu" value="<?= $m['menu']; ?>">
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