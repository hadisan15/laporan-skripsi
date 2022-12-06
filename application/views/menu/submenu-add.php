    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('menu/submenu'); ?>">Submenu Management</a></li>
              <li class="breadcrumb-item active">Add Submenu</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('menu/addSubmenu'); ?>
          <input type="hidden" name="id">
          <div class="row mb-3">
            <label for="title" class="col-sm-3 col-form-label">Title</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="title" name="title">
              <small class="text-danger"><?= form_error('title') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="menu_id" class="col-sm-3 col-form-label">Menu</label>
            <div class="col-sm-9">
              <select name="menu_id" id="menu_id" class="form-control">
                <option value="">Select Menu</option>
                <?php foreach ($menu as $m) : ?>
                  <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                <?php endforeach; ?>
              </select>
              <small class="text-danger"><?= form_error('menu_id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="url" class="col-sm-3 col-form-label">Url</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="url" name="url">
              <small class="text-danger"><?= form_error('url') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="icon" class="col-sm-3 col-form-label">Icon</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="icon" name="icon">
              <small class="text-danger"><?= form_error('icon') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    Active?
                  </label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row d-flex justify-content-end">
            <div class="col-sm-9">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->