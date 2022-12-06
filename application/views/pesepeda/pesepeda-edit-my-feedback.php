    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active"><a href="<?= base_url('pesepeda/feedback'); ?>">Feedback</a></li>
              <li class="breadcrumb-item active">Edit My Feedback</li>
            </ol>
          </nav>
        </div>
      </div>

      <div class="row">
        <div class="col-sm">
          <?= form_open_multipart('pesepeda/editMyFeedback/' . $myFeedbackData['id']); ?>
          <div class="row mb-3">
            <label for="id" class="col-sm-3 col-form-label">Cyclist Number</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="id" name="id" value="<?= $myFeedbackData['id']; ?>" readonly>
              <small class="text-danger"><?= form_error('id') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nama" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="nama" name="nama" value="<?= $myFeedbackData['nama']; ?>" disabled>
              <small class="text-danger"><?= form_error('nama') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="nilai" class="col-sm-3 col-form-label">Rate</label>
            <div class="col-sm-9">
              <select class="form-select" name="nilai" id="nilai">
                <option selected><?= $myFeedbackData['nilai']; ?></option>
                <option value="Sangat Baik">Sangat Baik</option>
                <option value="Baik">Baik</option>
                <option value="Cukup">Cukup</option>
                <option value="Tidak Baik">Tidak Baik</option>
                <option value="Sangat Tidak Baik">Sangat Tidak Baik</option>
              </select>
              <small class="text-danger"><?= form_error('nilai') ?></small>
            </div>
          </div>
          <div class="row mb-3">
            <label for="komentar" class="col-sm-3 col-form-label">Comment</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="komentar" name="komentar" value="<?= $myFeedbackData['komentar']; ?>" >
              <small class="text-danger"><?= form_error('komentar') ?></small>
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