<?php

require_once __DIR__ . "/../../../mpdf/vendor/autoload.php";


$stylesheet = file_get_contents(base_url('/assets/css/print.css'));
$mpdf = new \Mpdf\Mpdf();

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
              <img src="'.base_url('assets/img/valindo-eo.png').'" class="valindo-logo">
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
                  <th scope="col">#</th>
                  <th scope="col">Cyclist Number</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Challenge KoM</th>
                  <th scope="col">Kategori Challenge KoM</th>
                  <th scope="col">Bamboo Rafting</th>
                </tr>';
$i = 1;
foreach ($cyclistCategory as $cc) {
  $html .= '
                <tr>
                  <td>' . $i++ . '</td>
                  <td>' . $cc["id"] . '</td>
                  <td>' . $cc["nama"] . '</td>
                  <td>' . $cc["challenge_kom"] . '</td>
                  <td>' . $cc["nama_kategori"] . '</td>
                  <td>' . $cc["bamboo_rafting"] . '</td>
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
$mpdf->Output('Laporan Data Cyclist.pdf', \Mpdf\Output\Destination::INLINE);
