    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">My Cyclist Data</li>
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
              <a href="<?= base_url('pesepeda/editMyCyclistData/') . $myCyclistData['id']; ?>">
                <button type="button" class="btn btn-primary me-1 text-white"><i class="fa-solid fa-pen"></i> Edit My Cyclist Data</button>
              </a>
              <a href="<?= base_url('cyclist/cyclistDetailPdf/') . $myCyclistData['id']; ?>" target="_blank">
                <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
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
                <div class="card-body">
                  <ol class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div>
                        Foto
                        <img src="<?= base_url('assets/img/cyclist/') . $myCyclistData['foto']; ?>" class="card-img-top img-thumbnail" alt="...">
                      </div>
                    </li>
                  </ol>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card mt-3 mb-3 me-3">
                  <div class="card-header fw-bolder">
                    <h5 class="card-title">Personal Data</h5>
                  </div>
                  <div class="card-body">
                    <ol class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          No Identitas
                          <div class="fw-bold"><?= $myCyclistData['no_identitas']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Nama
                          <div class="fw-bold"><?= $myCyclistData['nama']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Tanggal Lahir
                          <div class="fw-bold"><?= date('d F Y', strtotime($myCyclistData['tanggal_lahir'])); ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Jenis Kelamin
                          <div class="fw-bold"><?= $myCyclistData['jenis_kelamin']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Alamat
                          <div class="fw-bold"><?= $myCyclistData['alamat']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          No Telepon
                          <div class="fw-bold"><?= $myCyclistData['telp']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Email
                          <div class="fw-bold"><?= $myCyclistData['email']; ?></div>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="row">
              <div class="col-md-3"> </div>
              <div class="col-md-9">
                <div class="card mt-3 mb-3 me-3">
                  <div class="card-header fw-bolder">
                    <h5 class="card-title">Data Kategori</h5>
                  </div>
                  <div class="card-body">
                    <ol class="list-group mb-3">
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Challenge King of Mountain
                          <div class="fw-bold"><?= $cyclist['challenge_kom']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Kategori Challenge
                          <div class="fw-bold"><?= $cyclist['nama_kategori']; ?></div>
                        </div>
                      </li>
                      <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 ">
                          Bamboo Rafting
                          <div class="fw-bold"><?= $cyclist['bamboo_rafting']; ?></div>
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
    <!-- /.container-fluid -->