<?php

require_once __DIR__ . "/../../../mpdf/vendor/autoload.php";


$stylesheet = file_get_contents(base_url('/assets/css/print2.css'));
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
              <img src="' . base_url('assets/img/valindo-eo.png') . '" class="valindo-logo">
              <p class="alamat">
                Jl. Sultan Adam, Gg. Hamhas, No. 62, Kel. Surgi Mufti, <br>
                Kec. Banjarmasin Barat, Kota Banjarmasin, Kalimantan Selatan
              </p>
              <hr class="top-line" size="5">
              <h2 class="title"></h2>
              <br>
      
              <table style="margin: auto">
                <tr>
                  <th>' . $cyclist['id'] . '</th>
                  <th>' . $cyclist['nama'] . '</th>
                </tr>
              </table>
              <table style="margin-top: 20px">
                <tr>
                  <td colspan="3"><img src="' . base_url('assets/img/cyclist/' . $cyclist["foto"]) . '" class="valindo-logo"></td>
                </tr>
              </table>


              <hr>
              <table>
                <tr>
                  <td colspan="3"><h6>Data Pribadi</h6></td>
                </tr>
                <tr>
                  <td>No Identitas</td>
                  <td> :</td>
                  <td>' . $cyclist['no_identitas'] . '</td>
                </tr>
                <tr>
                  <td>Tanggal Lahir</td>
                  <td> :</td>
                  <td>' . $cyclist['tanggal_lahir'] . '</td>
                </tr>
                <tr>
                  <td>Jenis Kelamin</td>
                  <td> :</td>
                  <td>' . $cyclist['jenis_kelamin'] . '</td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td> :</td>
                  <td>' . $cyclist['alamat'] . '</td>
                </tr>
                <tr>
                  <td>No Telepon</td>
                  <td> :</td>
                  <td>' . $cyclist['telp'] . '</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td> :</td>
                  <td>' . $cyclist['email'] . '</td>
                </tr>
              </table>
              <hr>

              <table>
                <tr>
                  <td colspan="3"><h6>Data Kategori</h6></td>
                </tr>
                <tr>
                  <td>Challenge Kom</td>
                  <td> :</td>
                  <td>' . $cyclist['challenge_kom'] . '</td>
                </tr>
                <tr>
                  <td>Kategori Challenge KoM</td>
                  <td> :</td>
                  <td>' . $cyclist['nama_kategori'] . '</td>
                </tr>
                <tr>
                  <td>Bamboo Rafting</td>
                  <td> :</td>
                  <td>' . $cyclist['bamboo_rafting'] . '</td>
                </tr>
              </table>
              <hr>

              <table>
                <tr>
                  <td colspan="3"><h6>Data Asal Daerah</h6></td>
                </tr>
                <tr>
                  <td>Asal Daerah</td>
                  <td> :</td>
                  <td>' . $cyclist['nama_asaldaerah'] . '</td>
                </tr>
                <tr>
                  <td>Nama Provinsi</td>
                  <td> :</td>
                  <td>' . $cyclist['nama_provinsi'] . '</td>
                </tr>
                <tr>
                  <td>Jenis Transportasi</td>
                  <td> :</td>
                  <td>' . $cyclist['jenis_transportasi'] . '</td>
                </tr>
              </table>
              <hr>

              <table>
                <tr>
                  <td colspan="3"><h6>Data Pembayaran</h6></td>
                </tr>
                <tr>
                  <td>Pembayaran Asuransi</td>
                  <td> :</td>
                  <td><img src="' . base_url('assets/img/tfasuransi/' . $cyclist["bayar_asuransi"]) . '" width="150px"></td>
                </tr>
                <tr>
                  <td>Pemesanan Jersey</td>
                  <td> :</td>
                  <td>' . $cyclist['beli_jersey'] . ' (' . $cyclist['ukuran_jersey'] . ')</td>
                </tr>
                <tr>
                  <td>Pembayaran Jersey</td>
                  <td> :</td>
                  <td><img src="' . base_url('assets/img/tfjersey/' . $cyclist["bayar_jersey"]) . '" width="150px"></td>
                </tr>
              </table>
              <hr>
              <div class="ttd">
                <div class="mengetahui">Banjarmasin, ' . date("d F Y") . ' <br>Mengetahui,</div> 
                <div class="nama">ISMAIL HASAN MAGI</div>
                <div class="jabatan">Pimpinan Tim Valindo EO</div>
              </div>
            </body>
          </html>';

$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output($pfdName, \Mpdf\Output\Destination::INLINE);
