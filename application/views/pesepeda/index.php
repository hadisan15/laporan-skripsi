    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Breadcrumb -->
      <div class="row">
        <div class="col-sm">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </nav>
        </div>
      </div>
      <h1 class="h3 mb-2" style="color: #108bb5;">Selamat Datang di Aplikasi Pengelolaan Data Tour de Loksado 2022</h1>
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Notifications <i class="bi bi-bell-fill"></i></h5>
            </div>
            <div class="card-body">
              <!-- notif semua -->
              <?php if (
                $myCyclistDetailData['challenge_kom'] === "" ||
                $myCyclistDetailData['nama_kategori'] === "*" ||
                $myCyclistDetailData['bamboo_rafting'] === "" ||
                $myCyclistDetailData['nama_asaldaerah'] === "" ||
                $myCyclistDetailData['nama_provinsi'] === "*" ||
                $myCyclistDetailData['jenis_transportasi'] === "" ||
                $myCyclistDetailData['bayar_asuransi'] === "nobukti.jpg" ||
                $myCyclistDetailData['beli_jersey'] === "" ||
                $myCyclistDetailData['ukuran_jersey'] === "" ||
                $myCyclistDetailData['bayar_jersey'] === "nobukti.jpg" ||
                $myCyclistDetailData['status_bayar_asuransi'] != "Accepted" ||
                $myCyclistDetailData['status_bayar_jersey'] != "Accepted"
              ) { ?>
                <div class="alert alert-danger fw-bold" role="alert">
                  <i class="bi bi-x-circle-fill"></i>
                  Data Belum Lengkap atau Status Pembayaran Belum Diverifikasi.
                </div>
              <?php } elseif (
                $myCyclistDetailData['challenge_kom'] != "" &&
                $myCyclistDetailData['nama_kategori'] != "*" &&
                $myCyclistDetailData['bamboo_rafting'] != "" &&
                $myCyclistDetailData['nama_asaldaerah'] != "8" &&
                $myCyclistDetailData['nama_provinsi'] != "" &&
                $myCyclistDetailData['jenis_transportasi'] != "" &&
                $myCyclistDetailData['bayar_asuransi'] != "nobukti.jpg" &&
                $myCyclistDetailData['beli_jersey'] != "" &&
                $myCyclistDetailData['ukuran_jersey'] != "" &&
                $myCyclistDetailData['bayar_jersey'] === "nobukti.jpg" &&
                $myCyclistDetailData['status_bayar_asuransi'] === "Accepted" &&
                $myCyclistDetailData['status_bayar_jersey'] === "Accepted"
              ) { ?>
                <div class="alert alert-success fw-bold" role="alert">
                  <i class="bi bi-check-circle-fill"></i>
                  Data Sudah Lengkap dan Status Pembayaran Telah Diverifikasi.
                </div>
              <?php } elseif (
                $myCyclistDetailData['challenge_kom'] != "" &&
                $myCyclistDetailData['nama_kategori'] != "*" &&
                $myCyclistDetailData['bamboo_rafting'] != "" &&
                $myCyclistDetailData['nama_asaldaerah'] != "8" &&
                $myCyclistDetailData['nama_provinsi'] != "" &&
                $myCyclistDetailData['jenis_transportasi'] != "" &&
                $myCyclistDetailData['bayar_asuransi'] != "nobukti.jpg" &&
                $myCyclistDetailData['beli_jersey'] != "" &&
                $myCyclistDetailData['ukuran_jersey'] != "" &&
                $myCyclistDetailData['bayar_jersey'] != "nobukti.jpg" &&
                $myCyclistDetailData['status_bayar_asuransi'] === "Accepted" &&
                $myCyclistDetailData['status_bayar_jersey'] === "Accepted"
              ) { ?>
                <div class="alert alert-success fw-bold" role="alert">
                  <i class="bi bi-check-circle-fill"></i>
                  Data Sudah Lengkap dan Status Pembayaran Telah Diverifikasi.
                </div>
              <?php } ?>
              <!-- notif kategori -->
              <?php if ($myCyclistDetailData['challenge_kom'] === "" || $myCyclistDetailData['nama_kategori'] === "*" || $myCyclistDetailData['bamboo_rafting'] === "") { ?>
                <div class="alert alert-danger" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Data Kategori Belum Ditambahkan. Tambahkan di Menu <a href="<?= base_url('pesepeda/myCategoryData'); ?>" style="text-decoration: none; color: #800000;" class="fw-bold">My Cyclist Category</a>.
                </div>
              <?php } else { ?>
                <div class="alert alert-success" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-check-circle-fill"></i>
                  Data Kategori Sudah Ditambahkan.
                </div>
              <?php } ?>
              <!-- notif asal daerah -->
              <?php if ($myCyclistDetailData['nama_asaldaerah'] === "*" || $myCyclistDetailData['nama_provinsi'] === "" || $myCyclistDetailData['jenis_transportasi'] === "") { ?>
                <div class="alert alert-danger" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Data Asal Daerah Belum Ditambahkan. Tambahkan di Menu <a href="<?= base_url('pesepeda/myZoneData'); ?>" style="text-decoration: none; color: #800000;" class="fw-bold">My Cyclist Zone</a>.
                </div>
              <?php } else { ?>
                <div class="alert alert-success" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-check-circle-fill"></i>
                  Data Asal Daerah Sudah Ditambahkan.
                </div>
              <?php } ?>
              <!-- notif pembayaran & jersey -->
              <?php if ($myCyclistDetailData['bayar_asuransi'] === "nobukti.jpg" || $myCyclistDetailData['beli_jersey'] === "" || $myCyclistDetailData['ukuran_jersey'] === "") { ?>
                <div class="alert alert-danger" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Data Pembayaran dan Jersey Belum Ditambahkan. Tambahkan di Menu <a href="<?= base_url('pesepeda/myPaymentData'); ?>" style="text-decoration: none; color: #800000;" class="fw-bold">My Cyclist Payment</a>
                </div>
              <?php } elseif ($myCyclistDetailData['bayar_asuransi'] != "nobukti.jpg" && $myCyclistDetailData['beli_jersey'] === "Tidak" && $myCyclistDetailData['ukuran_jersey'] === "-" && $myCyclistDetailData['bayar_jersey'] === "nobukti.jpg") { ?>
                <div class="alert alert-success" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-check-circle-fill"></i>
                  Data Pembayaran dan Jersey Sudah Ditambahkan.
                </div>
              <?php } elseif ($myCyclistDetailData['bayar_asuransi'] != "nobukti.jpg" && $myCyclistDetailData['beli_jersey'] === "Ya" && $myCyclistDetailData['ukuran_jersey'] != "-" && $myCyclistDetailData['bayar_jersey'] != "nobukti.jpg") { ?>
                <div class="alert alert-success" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-check-circle-fill"></i>
                  Data Pembayaran dan Jersey Sudah Ditambahkan.
                </div>
              <?php } ?>
              <!-- notif asuransi -->
              <?php if ($myCyclistDetailData['status_bayar_asuransi'] == "Pending") { ?>
                <div class="alert alert-warning" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-exclamation-circle-fill"></i>
                  Bukti Pembayaran Asuransi Belum Diverifikasi
                </div>
              <?php } elseif ($myCyclistDetailData['status_bayar_asuransi'] == "Rejected") { ?>
                <div class="alert alert-danger" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Bukti Pembayaran Asuransi Ditolak
                </div>
              <?php } elseif ($myCyclistDetailData['status_bayar_asuransi'] == "Accepted") { ?>
                <div class="alert alert-success" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-check-circle-fill"></i>
                  Bukti Pembayaran Asuransi Diterima
                </div>
              <?php } elseif ($myCyclistDetailData['status_bayar_asuransi'] == "Not Uploaded") { ?>
                <div class="alert alert-secondary" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Bukti Pembayaran Asuransi Belum Ditambahkan
                </div>
              <?php } ?>
              <!-- notif jersey -->
              <?php if ($myCyclistDetailData['status_bayar_jersey'] == "Pending") { ?>
                <div class="alert alert-warning" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-exclamation-circle-fill"></i>
                  Bukti Pembayaran Jersey Belum Diverifikasi
                </div>
              <?php } elseif ($myCyclistDetailData['status_bayar_jersey'] == "Rejected") { ?>
                <div class="alert alert-danger" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Bukti Pembayaran Jersey Ditolak
                </div>
              <?php } elseif ($myCyclistDetailData['status_bayar_jersey'] == "Accepted") { ?>
                <div class="alert alert-success" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-check-circle-fill"></i>
                  Bukti Pembayaran Jersey Diterima
                </div>
              <?php } elseif ($myCyclistDetailData['status_bayar_jersey'] == "Not Uploaded") { ?>
                <div class="alert alert-secondary" role="alert" style="margin-top: -15px;">
                  <i class="bi bi-x-circle-fill"></i>
                  Bukti Pembayaran Jersey Belum Ditambahkan
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title">Announcements <i class="bi bi-megaphone-fill"></i></h5>
            </div>
            <div class="card-body">
              <div class="alert alert-info" role="alert">
                <h6><i class="bi bi-info-circle-fill"></i> Seluruh pesepeda diharapkan untuk melengkapi data masing-masing pada menu yang telah disediakan.</h6>
              </div>
              <div class="alert alert-info" role="alert">
                <h6><i class="bi bi-info-circle-fill"></i> Pemberitahuan lebih lengkap dapat dilihat pada halaman Announcements.
                </h6>
              </div>
              <a href="<?= base_url('pesepeda/announcements/'); ?>" class="btn btn-info text-white fw-bold">Open All Announcements</a>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>
    <!-- /.container-fluid -->