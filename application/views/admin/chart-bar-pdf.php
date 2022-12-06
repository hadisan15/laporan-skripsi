<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <link rel="shortcut icon" href="<?= base_url('assets/img/logo-tdl22.png'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <!-- my css -->
  <link href="<?= base_url('assets/css/print.css'); ?>" rel="stylesheet">

  <!-- Bootstrap 5.1 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Custom styles for this page -->
  <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">

  <style>
    a {
      text-decoration: none;
    }

    .cl-link {
      text-decoration: none;
    }

    @media print {
      .btn {
        display: none;
      }
    }
  </style>
</head>

<body id="page-top">
  <div class="row">
    <div class="col">

    </div>
  </div>
  <div class="row mx-5 my-5 px-3 py-3">
    <div class="col">
      <button class="btn btn-success" type="submit" name="date_filter" onclick="myfun()">
        <i class="fa-solid fa-file-pdf"></i> Save to PDF
      </button>
      <div class="card">
        <img src="<?= base_url('assets/img/valindo-eo.png'); ?>" class="valindo-logo" style="margin-top: 100px; margin-left: 350px;">
        <p class="alamat" style="font-family: 'Times New Roman', Times, serif; font-size: 25px;">
          Jl. Sultan Adam, Gg. Hamhas, No. 62, Kel. Surgi Mufti, <br>
          Kec. Banjarmasin Barat, Kota Banjarmasin, Kalimantan Selatan
        </p>

        <hr class="top-line" size="5">
        <h3 class="title" style="margin-bottom: -5px; font-family: 'Times New Roman', Times, serif; font-weight: bold;">LAPORAN GRAFIK DATA PENDAFTAR <br> TOUR DE LOKSADO 2022 PER TANGGAL DAFTAR</h3>
        <div class="row">
          <div class="col">
            <div class="card px-2 py-2" style="min-height: 260px; margin-bottom: 20px;">
              <!-- Area Chart -->
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="chart-bar">
                    <canvas id="myBarChart"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="ttd" style="margin-right: -450px; font-family: 'Times New Roman', Times, serif;">
          <div class="mengetahui">Banjarmasin, <?= date("d F Y"); ?> <br>Mengetahui,</div>
          <div class="nama">ISMAIL HASAN MAGI</div>
          <div class="jabatan">Pimpinan Tim Valindo EO</div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function myfun() {
      window.print();
    }
  </script>

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
              max: 200,
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