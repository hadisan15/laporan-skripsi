    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">My Category Data</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <?= $this->session->flashdata('message'); ?>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <div class="row">
            <div class="col-md-6 mb-2">
              <a href="<?= base_url('pesepeda/editMyCategoryData/') . $myCyclistData['id']; ?>">
                <button type="button" class="btn btn-primary me-1 text-white"><i class="fa-solid fa-pen"></i> Edit My Cyclist Category</button>
              </a>
            </div>
          </div>
          <div class="card">
            <div class="card-header fw-bolder">
              <div class="row">
                <div class="col-md-8">
                  <h5 class="card-title">Cyclist #<?= $myCyclistData['id']; ?></h5>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="card mt-3 ms-3">
                  <div class="card-header fw-bolder">
                    <div class="card-title">
                      <?= $myCyclistData['nama']; ?>
                    </div>
                    <div class="card-body">
                      <img src="<?= base_url('assets/img/cyclist/') . $myCyclistData['foto']; ?>" class="card-img-top img-thumbnail" alt="...">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card mt-3 mb-3 me-3">
                  <div class="card-header fw-bolder">
                    <h5 class="card-title">Category Data</h5>
                  </div>
                  <div class="card-body">
                    <ol class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Challenge King of Mountain
                          <?php if ($myCategoryData['challenge_kom'] === "") { ?>
                            <div class="fw-bold">-</div>
                          <?php } else { ?>
                            <div class="fw-bold"><?= $myCategoryData['challenge_kom']; ?></div>
                          <?php } ?>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Kategori Challenge
                          <div class="fw-bold"><?= $myCategoryData['nama_kategori']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Bamboo Rafting
                          <?php if ($myCategoryData['bamboo_rafting'] === "") { ?>
                            <div class="fw-bold">-</div>
                          <?php } else { ?>
                            <div class="fw-bold"><?= $myCategoryData['bamboo_rafting']; ?></div>
                          <?php } ?>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>



            <!-- 
              


            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-9">
                <div class="card mt-3 mb-3 me-3">
                  <div class="card-header fw-bolder">
                    <h5 class="card-title">Data Asal Wilayah</h5>
                  </div>
                  <div class="card-body">
                    <ol class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Asal Daerah
                          <div class="fw-bold"><?= $cyclist['nama_asaldaerah']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Nama Provinsi
                          <div class="fw-bold"><?= $cyclist['nama_provinsi']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Transportasi
                          <div class="fw-bold"><?= $cyclist['jenis_transportasi']; ?></div>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-9">
                <div class="card mt-3 mb-3 me-3">
                  <div class="card-header fw-bolder">
                    <h5 class="card-title">Data Pembayaran</h5>
                  </div>
                  <div class="card-body">
                    <ol class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Pembayaran Asuransi
                          <div class="fw-bold"><?= $cyclist['bayar_asuransi']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Bukti Pembayaran Asuransi
                          <div class="fw-bold"><img src="<?= base_url('assets/img/tfasuransi/' . $cyclist['bukti_asuransi']); ?>" width="200px" alt=""></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Pemesanan Jersey
                          <div class="fw-bold"><?= $cyclist['beli_jersey']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Pembayaran Jersey
                          <div class="fw-bold"><?= $cyclist['bayar_jersey']; ?>, <?= $cyclist['ukuran_jersey']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Bukti Pembayaran Jersey
                          <div class="fw-bold"><img src="<?= base_url('assets/img/tfjersey/' . $cyclist['bukti_jersey']); ?>" width="200px" alt=""></div>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>


            </div> -->
          </div>
        </div>



      </div>
    </div>
    </div>
    <!-- /.container-fluid -->