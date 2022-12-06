<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
// require '/../../vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// require_once 'vendor/autoload.php';

class Cyclist extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('Cyclist_model', 'cyclistM');
    $this->load->model('Category_model', 'categoryM');
  }

  public function index()
  {
    $data['title'] = 'Cyclist';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclist'] = $this->cyclistM->getAllMainCyclistM();
    $data['total_rows'] = $this->cyclistM->countAllCyclistM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cyclist/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistDetail($id)
  {
    $data['title'] = 'Cyclist Detail Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclist'] = $this->db->get_where('cyclist_detail_view', ['id' => $id])->row_array();
    // $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cyclist/cyclist-detail', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistCreate()
  {
    $data['title'] = 'Cyclist Insert Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    // $this->form_validation->set_rules('no_pesepeda', 'Cyclist Number', 'required|trim|is_unique[cyclist.no_pesepeda]|max_length[3]|numeric');
    $this->form_validation->set_rules('no_identitas', 'Identity Number', 'required|trim|is_unique[cyclist.no_identitas]|max_length[16]|numeric');
    $this->form_validation->set_rules('nama', 'Name', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Birth Date', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Gender', 'required');
    $this->form_validation->set_rules('alamat', 'Address', 'required');
    $this->form_validation->set_rules('telp', 'Phone Number', 'required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    // $this->form_validation->set_rules('tanggal_daftar', 'Register Date', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('cyclist/cyclist-create', $data);
      $this->load->view('templates/footer');
    } else {
      $email = $this->input->post('email');
      $subject = "Tour de Loksado 2022";
      $pesan = "Selamat, Anda Telah Terdaftar Sebagai Peserta Event Tour de Loksado 2022. Email dan Password Anda " . $email;
      $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.mailtrap.io',
        'smtp_port' => 2525,
        'smtp_user' => '8269a914fb0fa1',
        'smtp_pass' => '77c00caf51536c',
        'crlf' => "\r\n",
        'newline' => "\r\n"
      );
      $this->load->library('email', $config);
      $this->email->initialize($config);
      $this->email->from('tourdeloksado2022@gmail.com');
      $this->email->to($email);
      $this->email->subject($subject);
      $this->email->message($pesan);
      $this->email->send();
      // echo $this->email->print_debugger();

      $this->cyclistM->cyclistCreateM();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist data has been added.</div>');
      redirect('cyclist');
    }
  }

  public function cyclistEdit($id)
  {
    $data['title'] = 'Cyclist Update Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclist'] = $this->cyclistM->getCyclistById($id);
    // $id = $this->db->get_where('cyclist', ['id' => $id])->row_array($id);

    $this->form_validation->set_rules('no_identitas', 'Identity Number', 'required|trim|max_length[16]|numeric');
    $this->form_validation->set_rules('nama', 'Name', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Birth Date', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Gender', 'required');
    $this->form_validation->set_rules('alamat', 'Address', 'required');
    $this->form_validation->set_rules('telp', 'Phone Number', 'required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('tanggal_daftar', 'Register Date', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('cyclist/cyclist-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $idHidden = $this->input->post('id');
      $no_pesepeda = $this->input->post('no_pesepeda');
      $no_identitas = $this->input->post('no_identitas');
      $nama = $this->input->post('nama');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $alamat = $this->input->post('alamat');
      $telp = $this->input->post('telp');
      $email = $this->input->post('email');
      $tanggal_daftar = $this->input->post('tanggal_daftar');
      $status = 'proses';

      //cek jika ada gambar yg diupload
      $upload_image = $_FILES['foto']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/cyclist/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          //hapus gambar lama
          $old_image = $data['cyclist']['foto'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/cyclist/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('foto', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('no_identitas', $no_identitas);
      $this->db->set('nama', $nama);
      $this->db->set('tanggal_lahir', $tanggal_lahir);
      $this->db->set('jenis_kelamin', $jenis_kelamin);
      $this->db->set('alamat', $alamat);
      $this->db->set('telp', $telp);
      $this->db->set('email', $email);
      $this->db->set('tanggal_daftar', $tanggal_daftar);
      $this->db->where('id', $idHidden);
      $this->db->update('cyclist');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist data has been edited.</div>');
      redirect('cyclist');
    }
  }

  public function cyclistDelete($id, $username)
  {


    $this->cyclistM->cyclistDeleteByIdM($id);
    $this->cyclistM->cyclistDeleteByUnM($username);
    // $this->categoryM->cyclistCategoryDeleteM($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist data has been deleted.</div>');
    redirect('cyclist');
  }

  public function cyclistPdf()
  {

    $data['title'] = 'LAPORAN DATA PESEPEDA<br>TOUR DE LOKSADO 2022';
    $data['cyclist'] = $this->cyclistM->getAllCyclistM();
    $data['pdfName'] = 'Laporan Data Pesepeda Tour de Loksado 2022.pdf';

    $this->load->view('cyclist/cyclist-pdf', $data);
  }

  public function cyclistDateFilter()
  {
    $data['title'] = 'Date Filter Cyclist Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //get date range
    $start_date = $this->input->get('start_date', TRUE);
    $end_date = $this->input->get('end_date', TRUE);

    $data['total_rows'] = $this->cyclistM->countAllCyclistDateFilterM(array($start_date, $end_date));
    $data['cyclist'] = $this->cyclistM->getCyclistDateFilterM(array($start_date, $end_date));

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cyclist/cyclist-datefilter', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistDateFilterPdf()
  {
    $start_date = $this->input->get('start_date', TRUE);
    $end_date = $this->input->get('end_date', TRUE);
    $start_date_convert = date('d M Y', strtotime($start_date));
    $end_date_convert = date('d M Y', strtotime($end_date));
    $data['cyclist'] = $this->cyclistM->getCyclistDateFilterM(array($start_date, $end_date));
    $data['title'] = 'LAPORAN DATA PESEPEDA TOUR DE LOKSADO 2022';
    $data['title2'] = 'DENGAN RENTANG TANGGAL DAFTAR ' . strtoupper($start_date_convert) . ' - ' . strtoupper($end_date_convert) . '';
    $data['total_rows'] = $this->cyclistM->countAllCyclistDateFilterM(array($start_date, $end_date));
    $data['pdfName'] = 'Laporan Data Pesepeda Tour de Loksado 2022 dengan Rentang Tanggal Daftar' . $start_date_convert . ' - ' . $end_date_convert . '.pdf';

    $this->load->view('cyclist/cyclist-datefilter-pdf', $data);
  }

  public function cyclistDetailPdf($id)
  {
    $data['cyclist'] = $this->db->get_where('cyclist_detail_view', ['id' => $id])->row_array();

    $this->load->view('cyclist/cyclist-detail-pdf', $data);
  }

  public function cyclistChart()
  {
    $data['title'] = 'Grafik Pendaftaran Pesepeda Tour de Loksado 2022';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclist'] = $this->cyclistM->getCyclistPerDate();
    // var_dump($data['cyclist']);
    // die;
    $data['labelDb'] = $this->cyclistM->getCyclistPerDateLabel();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cyclist/cyclist-chart', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistImport()
  {
    $data['title'] = 'Cyclist Import';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $conn = mysqli_connect("localhost", "root", "", "ci3-tdl22");

    if (isset($_POST['submit'])) {
      $fileName = $_FILES["import"]["name"];
      $fileExt = explode('.', $fileName);
      $fileExt = strtolower(end($fileExt));

      $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExt;
      $targetDir = "./assets/excel/" . $newFileName;
      move_uploaded_file($_FILES["import"]["tmp_name"], $targetDir);

      error_reporting(0);
      ini_set('display_errors', 0);

      require "./excelReader/excel_reader2.php";
      require "./excelReader/SpreadsheetReader.php";

      $reader = new SpreadsheetReader($targetDir);

      foreach ($reader as $key => $row) {
        $id = $row[0];
        $no_identitas = $row[1];
        $nama = $row[2];
        $username = url_title($nama, '-', true);
        $tanggal_lahir = $row[3];
        $jenis_kelamin = $row[4];
        $alamat = $row[5];
        $telp = $row[6];
        $email = $row[7];
        $password = password_hash($email, PASSWORD_DEFAULT);
        $foto = $row[8];
        $tanggal_daftar = date('Y-m-d');
        $date_created = time();
        mysqli_query($conn, "INSERT INTO cyclist VALUES('$id', '', '$no_identitas', '$nama', '$username', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$telp', '$email', '$foto', '$tanggal_daftar')");
        mysqli_query($conn, "INSERT INTO cyclist_category VALUES('$id', '', '', '8', '')");
        mysqli_query($conn, "INSERT INTO cyclist_zone VALUES('$id', '', '4', '', '')");
        mysqli_query($conn, "INSERT INTO cyclist_payment VALUES('$id', '', 'nobukti.jpg', 'Not Uploaded', '', '*', 'nobukti.jpg', 'Not Uploaded')");
        mysqli_query($conn, "INSERT INTO cyclist_incident VALUES('$id', '', '', '')");
        mysqli_query($conn, "INSERT INTO cyclist_winner VALUES('$id', '', '', '', '')");
        mysqli_query($conn, "INSERT INTO user VALUES('$id', '$nama', '$username', '$email', 'default.jpg', '$password', '2', '1', '$date_created')");
      }
      $emailSend = $email;
      $subject = "Tour de Loksado 2022";
      $pesan = "Selamat, Anda Telah Terdaftar Sebagai Peserta Event Tour de Loksado 2022. Silakan Login di Website Tour de Loksado 2022 dengan Email dan Password Anda Sebagai Berikut " . $email . ". Terima Kasih :)";
      $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.mailtrap.io',
        'smtp_port' => 2525,
        'smtp_user' => '8269a914fb0fa1',
        'smtp_pass' => '77c00caf51536c',
        'crlf' => "\r\n",
        'newline' => "\r\n"
      );
      foreach ($kirimEmail as $kirim) {
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('tourdeloksado2022@gmail.com');
        $this->email->to($emailSend);
        $this->email->subject($subject);
        $this->email->message($pesan);
        $this->email->send();
      }

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist data has been Imported.</div>');
      redirect('cyclist');
    }

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('cyclist/cyclist-import-process', $data);
    $this->load->view('templates/footer');
  }


}
