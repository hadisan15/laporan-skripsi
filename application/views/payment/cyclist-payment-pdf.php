<?php

require_once __DIR__ . "/../../../mpdf/vendor/autoload.php";


$stylesheet = file_get_contents(base_url('/assets/css/print.css'));
$mpdf = new \Mpdf\Mpdf();
$mpdf->showImageErrors = true;

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
                  <th scope="col"> </th>
                  <th scope="col">#</th>
                  <th scope="col">Nama Pesepeda</th>
                  <th scope="col">Pembayaran Asuransi</th>
                  <th scope="col">Jersey</th>
                  <th scope="col">Ukuran Jersey</th>
                  <th scope="col">Pembayaran Jersey</th>
                </tr>';
$i = 1;
foreach ($cyclistPayment as $cp) {
  $html .= '
                <tr>
                  <td>' . $i++ . '</td>
                  <td>' . $cp["id"] . '</td>
                  <td>' . $cp["nama"] . '</td>
                  <td><img src="' . base_url('assets/img/tfasuransi/' . $cp["bayar_asuransi"]) . '" width="100px"></td>
                  <td>' . $cp["beli_jersey"] . '</td>
                  <td>' . $cp["ukuran_jersey"] . '</td>
                  <td><img src="' . base_url('assets/img/tfjersey/' . $cp["bayar_jersey"]) . '" width="100px"></td>
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
