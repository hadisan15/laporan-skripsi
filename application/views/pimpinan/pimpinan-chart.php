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
        <div class="col">
          <div class="card px-2 py-2" style="min-height: 260px; margin-bottom: 20px;">
            <div class="row">
              <div class="col-md-3 mb-3">
                <a href="<?= base_url('pimpinan/chartAreaPdf'); ?>" target="_blank">
                  <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
                </a>
              </div>
            </div>
            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $chartAreaTitle; ?></h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="card px-2 py-2" style="min-height: 260px;">
            <div class="row">
              <div class="col-md-4 mb-3">
                <a href="<?= base_url('pimpinan/chartPiePdf'); ?>" target="_blank">
                  <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
                </a>
              </div>
            </div>
            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $chartPieTitle; ?></h6>
              </div>
              <div class="card-body">
                <div class="chart-pie" style="margin-top: 43px;">
                  <canvas id="myPieChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card px-2 py-2" style="min-height: 260px;">
            <div class="row">
              <div class="col-md-4 mb-3">
                <a href="<?= base_url('pimpinan/chartBarPdf'); ?>" target="_blank">
                  <button type="button" class="btn btn-success"><i class="fa-solid fa-file-pdf"></i> Save to PDF</button>
                </a>
              </div>
            </div>
            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $chartBarTitle; ?></h6>
              </div>
              <div class="card-body">
                <div class="chart-bar">
                  <canvas id="myBarChart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="row">

      </div> -->

    </div>
    </div>
    <!-- /.container-fluid -->



    <!-- Footer -->
    <section id="footer">
      <div class="footer mt-3" style="background-color: #108bb5; margin-bottom: auto;">
        <div class="container">
          <br>
          <div class="row text-white font-weight-bold">
            <div class="col-lg-2">
              <div class="row">
                <div class="col">
                  <img src="<?= base_url('assets/img/logo-tdl22.png'); ?>" width="130px" alt="">
                </div>
              </div>
            </div>
            <div class="col-lg-2 presented">
              <div class="row">
                <div class="col">
                  <p>Presented by:</p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <img src="<?= base_url('assets/img/footer/prov-kalsel.png'); ?>" width="150px" alt="">
                </div>
              </div>
            </div>
            <div class="col-lg-5 supported">
              <div class="row">
                <div class="col">
                  <p>Supported by:</p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <img src="<?= base_url('assets/img/footer/kota-bjb.png'); ?>" width="100px" alt="" class="me-2">
                  <img src="<?= base_url('assets/img/footer/kab-banjar.png'); ?>" width="100px" alt="" class="me-2">
                  <img src="<?= base_url('assets/img/footer/kab-tapin.png'); ?>" width="100px" alt="" class="me-2">
                  <img src="<?= base_url('assets/img/footer/kab-hss.png'); ?>" width="100px" alt="" class="">
                </div>
              </div>
            </div>
            <div class="col-lg-3 organized">
              <div class="row">
                <div class="col">
                  <p>Organized by:</p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <img src="<?= base_url('assets/img/footer/issi.png'); ?>" width="100px" alt="" class="me-2">
                  <img src="<?= base_url('assets/img/footer/valindo-eo.png'); ?>" width="130px" alt="" class="me-2">
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="foot-line mt-2 mb-2"></div>
          </div>
          <div class="row">
            <div class="col">
              <p class="text-center text-white fw-bold">
                Copyright <span class="fw-bolder">&copy;</span> 2022 Hadi Santoso
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Font Awesome Script -->
    <script src="https://kit.fontawesome.com/b099bf10fc.js" crossorigin="anonymous"></script>

    <!-- Chart Page level plugins -->
    <script src="<?= base_url('assets/vendor/chart.js/Chart.min.js'); ?>"></script>

    <!-- Chart Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/chart-area-demo.js'); ?>"></script>
    <script>
      <?php
      $labelTgl = "";
      $dataJlh = "";
      foreach ($chartAreaLabel as $key => $value) {
        $labelTgl .= '"' . date('d F', strtotime($value['tanggal_daftar'])) . '",';
        $dataJlh .= '"' . $value['jlh_dftr_perhari'] . '",';
      }
      $labelTgl = rtrim($labelTgl, ",");
      $dataJlh = rtrim($dataJlh, ",");
      echo "var labelTgl = [$labelTgl];\n";
      echo "var dataJlh = [$dataJlh];";
      ?>

      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labelTgl,
          datasets: [{
            label: "Pendaftar",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: dataJlh,
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'date'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 7
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return '' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ' ' + number_format(tooltipItem.yLabel);
              }
            }
          }
        }
      });
    </script>

    <script src="<?= base_url('assets/js/demo/chart-pie-demo.js'); ?>"></script>
    <script>
      <?php
      $labelKtg = "";
      $dataJlhKtg = "";
      foreach ($chartPieLabel as $key => $value) {
        $labelKtg .= '"' . $value['nama_kategori'] . '",';
        $dataJlhKtg .= '"' . $value['jlh'] . '",';
      }
      $labelKtg = rtrim($labelKtg, ",");
      $dataJlhKtg = rtrim($dataJlhKtg, ",");
      echo "var labelKtg = [$labelKtg];\n";
      echo "var dataJlhKtg = [$dataJlhKtg];";
      ?>
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: labelKtg,
          datasets: [{
            data: dataJlhKtg,
            backgroundColor: ['#2e59d9', '#b7d9e2', '#86b6c6', '#5c93aa', '#3a728e', '#1f5372', '#0c3756'],
            hoverBackgroundColor: ['#2e59d9', '#b7d9e2', '#86b6c6', '#5c93aa', '#3a728e', '#1f5372', '#0c3756'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        },
      });
    </script>

    <script src="<?= base_url('assets/js/demo/chart-bar-demo.js'); ?>"></script>
    <script>
      <?php
      $labelProv = "";
      $dataJlhProv = "";
      foreach ($chartBarLabel as $key => $value) {
        $labelProv .= '"' . $value['nama_provinsi'] . '",';
        $dataJlhProv .= '"' . $value['jlh'] . '",';
      }
      $labelProv = rtrim($labelProv, ",");
      $dataJlhProv = rtrim($dataJlhProv, ",");
      echo "var labelProv = [$labelProv];\n";
      echo "var dataJlhProv = [$dataJlhProv];";
      ?>
      var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labelProv,
          datasets: [{
            label: "",
            backgroundColor: "#4e73df",
            hoverBackgroundColor: "#2e59d9",
            borderColor: "#4e73df",
            data: dataJlhProv,
          }],
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              time: {
                unit: 'month'
              },
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 6
              },
              maxBarThickness: 25,
            }],
            yAxes: [{
              ticks: {
                min: 0,
                max: 20,
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                  return '' + number_format(value);
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }],
          },
          legend: {
            display: false
          },
          tooltips: {
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            callbacks: {
              label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + number_format(tooltipItem.yLabel) + ' Pesepeda';
              }
            }
          },
        }
      });
    </script>

    <!-- Datatable Page level plugins -->
    <script src="<?= base_url('assets/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>

    <!-- Datatable Page level custom scripts -->
    <script src="<?= base_url('assets/js/demo/datatables-demo.js'); ?>"></script>

    <!-- sf js -->
    <script src="<?= base_url('assets/js/sf.js'); ?>"></script>

    <!-- Role Access Script -->
    <script>
      $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
          url: "<?= base_url('admin/changeAccess'); ?>",
          type: 'post',
          data: {
            menuId: menuId,
            roleId: roleId
          },
          success: function() {
            document.location.href = "<?= base_url('admin/roleAccess/'); ?>" + roleId;
          }
        })
      })
    </script>

    </body>

    </html>