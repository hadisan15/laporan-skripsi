<?php

require_once __DIR__ . "/../../../mpdf/vendor/autoload.php";


$stylesheet = file_get_contents(base_url('/assets/css/print.css'));
// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf([
  'mode' => 'utf-8',
  'format' => 'A4-L',
  'orientation' => 'L'
]);

$html = '
        <!DOCTYPE html>
          <html lang="en">
            <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <title></title>
            </head>
            <body>
              <img src="' . base_url('assets/img/valindo-eo.png') . '" class="valindo-logo-page-l" >
              <p class="alamat">
                Jl. Sultan Adam, Gg. Hamhas, No. 62, Kel. Surgi Mufti, <br>
                Kec. Banjarmasin Barat, Kota Banjarmasin, Kalimantan Selatan
              </p>
              <hr class="top-line" size="5">
              <h2 class="title">' . $title . '</h2>
              <br>
              <center>
              <table border="1" cellpadding="10" cellspacing="0" class="table">
                <tr>
                  <th rowspan="2">#</th>
                  <th rowspan="2" class="text-center">Ukuran Jersey</th>
                  <th colspan="4">Detail Ukuran Jersey</th>
                  <th rowspan="2" style="width: 180px">Gambar Detail Ukuran Jersey</th>
                  <th rowspan="2">Jumlah</th>
                </tr>
                <tr>
                  <th>Dada</th>
                  <th>Lengan</th>
                  <th>Depan</th>
                  <th>Belakang</th>
                </tr>';
$i = 1;
foreach ($jersey as $j) {
  $html .= '
                <tr>
                  <td>' . $j["id"] . '</td>
                  <td>' . $j["keterangan"] . '</td>
                  <td>' . $j["chest"] . '</td>
                  <td>' . $j["sleeve"] . '</td>
                  <td>' . $j["front"] . '</td>
                  <td>' . $j["back"] . '</td>
                  <td><img src="' . base_url('assets/img/jersey/' . $j['gambar_ukuran']) . '" width="130px"></td>
                  <td>' . $j["jlh"] . '</td>
                </tr>';
}
$html .= '
              </table>
              <div class="ttd">
                <div class="mengetahui">Banjarmasin, ' . date("d F Y") . ' <br>Mengetahui,</div> 
                <div class="nama">ISMAIL HASAN MAGI</div>
                <div class="jabatan">Pimpinan Tim Valindo EO</div>
              </div>
            </body>
          </html>';

$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output($pdfName, \Mpdf\Output\Destination::INLINE);
