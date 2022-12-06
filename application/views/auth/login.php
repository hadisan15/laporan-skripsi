<div class="container">

  <!-- Outer Row -->
  <div class="row d-flex justify-content-center mt-3" style="margin-bottom: -30px;">
    <div class="col-md-10">
      <div class="card" style="width: 58rem;">
        <img src="<?= base_url('assets/img/header-tdl22.png'); ?>" class="card-img-top" alt="...">
      </div>
    </div>
  </div>

  <div class="row justify-content-center" style="margin-bottom: -80px;">
    <div class="col-md-5">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <img src="<?= base_url('assets/img/flyer-tdl22.png'); ?>" class="card-img-top" alt="...">
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card o-hidden border-0 shadow-lg my-5" style="height: 450px;">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row d-flex justify-content-center" style="margin-top: -30px;">
            <!-- <div class="col-lg-6 d-none d-lg-block" style="background-image: url('<?= base_url('assets/'); ?>img/fyer-tdl22.png'); background-size: 450px 430px; background-repeat: no-repeat;"></div> -->
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                
                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Username/Email" value="<?= set_value('email'); ?>" autocomplete="off">
                    <small class="text-danger"><?= form_error('email') ?></small>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" autocomplete="off">
                    <small class="text-danger"><?= form_error('password') ?></small>
                  </div>
                  <button type="submit" href="index.html" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                </form>
                <!-- <hr> -->
                <!-- <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/registration'); ?>">Create an Account!</a>
                </div> -->
                <div class="text-center text-primary mt-3">
                  <p class="small" style="font-weight: bold;">Jadilah Cyclist di Tour de Loksado 2022! <a href="<?= base_url('pesepeda/eventRegistration'); ?>" style="text-decoration: none; font-weight: bolder;">Click Here!</a></p>
                </div>
                <?= $this->session->flashdata('message'); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center" style="margin-bottom: -50px;">
    <div class="col-md-5">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <img src="<?= base_url('assets/img/flyer2-tdl22.png'); ?>" class="card-img-top" alt="...">
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <img src="<?= base_url('assets/img/flyer3-tdl22.png'); ?>" class="card-img-top" alt="...">
        </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center mt-3" style="margin-top: -100px; margin-bottom: 20px;">
    <div class="col-md-10">
      <div class="card" style="width: 58rem; background-image: url(<?= base_url('assets/img/home-tdl22.png'); ?>);">
        <div class="card-body">
          <!-- <h3 class="card-title mt-3 text-white">Tour de Loksado 2022</h3> -->
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="desc-line mt-2">
                <div class="card-text text-white fw-bold" style="margin-left: 150px; font-size: larger;">TENTANG TOUR DE LOKSADO 2022</div>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-8">
              <h5 class="card-text mt-3 text-white">
                Tour de loksado merupakan event sepeda tahunan dari Dinas Pariwisata Provinsi Kalimantan Selatan. Di tahun 2022 ini menjadi event sport tourism ketiga yang diadakan.
              </h5>
              <h5 class="card-text mt-3 text-white">
                Event sepeda terbesar di Kalimantan Selatan ini nantinya akan diikuti oleh para Cyclist, mulai dari Cyclist lokal dari Kalimantan Selatan, maupun Cyclist Nasional, hingga bahkan Cyclist Mancanegara.
              </h5>
              <h5 class="card-text mt-3 text-white">
                Rute dari event sepeda ini yaitu dimulai dari titik start di Kiram Park Banjarbaru. Dilanjutkan dengan beberapa titik pitstop yaitu di Mataraman, Binuang, Rantau serta Kandangan. Hingga titik finishnya yaitu di tempat wisata kebanggaan Kalimantan Selatan yaitu “LOKSADO” Hulu Sungai Selatan kurang lebih dengan jarak tempuh 164 KM.
              </h5>
              <h5 class="card-text mt-3 text-white">
                Para cyclist akan menikmati keindahan alam Kalimantan Selatan yang terkenal memiliki spot-spot yang sangat eksotis. Melintasi area persawahan, hutan tropis, rawa dan wisata bamboo rafting yang menjadi salah satu andalan wisata dari Loksado.
              </h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>