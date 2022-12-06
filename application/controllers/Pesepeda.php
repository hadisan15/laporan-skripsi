<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesepeda extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('Cyclist_model', 'cyclistM');
    $this->load->model('Category_model', 'categoryM');
    $this->load->model('Zone_model', 'zoneM');
    $this->load->model('Payment_model', 'paymentM');
    $this->load->model('Admin_model', 'adminM');
  }

  public function index()
  {
    $data['title'] = 'Home';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['myCyclistDetailData'] = $this->db->get_where('cyclist_detail_view',  ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/index', $data);
    $this->load->view('templates/footer');
  }

  public function announcements()
  {
    $data['title'] = 'Announcements';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/pesepeda-announcements', $data);
    $this->load->view('templates/footer');
  }

  public function eventRegistration()
  {
    // $this->form_validation->set_rules('no_pesepeda', 'Cyclist Number', 'required|trim|is_unique[cyclist.no_pesepeda]|max_length[3]|numeric');
    $this->form_validation->set_rules('no_identitas', 'Identity Number', 'required|trim|is_unique[cyclist.no_identitas]|max_length[16]|min_length[16]|numeric');
    $this->form_validation->set_rules('nama', 'Name', 'required|trim');
    $this->form_validation->set_rules('tanggal_lahir', 'Birth Date', 'required');
    $this->form_validation->set_rules('jenis_kelamin', 'Gender', 'required');
    $this->form_validation->set_rules('alamat', 'Address', 'required');
    $this->form_validation->set_rules('telp', 'Phone Number', 'required|numeric');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[cyclist.email]');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Tour de Loksado 2022 Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('pesepeda/pesepeda-registration');
      $this->load->view('templates/auth_footer');
    } else {
      //upload foto di cyclist
      $upload_image = $_FILES['foto']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/cyclist/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
          //hapus gambar lama
          $old_image = 'default.jpg';
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/cyclist/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('foto', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $id = $this->cyclistM->countAllCyclistM();
      $newId = $id + 1;

      $data = [
        "id" => $newId,
        "no_identitas" => $this->input->post('no_identitas', true),
        "nama" => $this->input->post('nama', true),
        "username" => url_title($this->input->post('nama'), '-', true),
        "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
        "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
        "alamat" => $this->input->post('alamat', true),
        "telp" => $this->input->post('telp', true),
        "email" => $this->input->post('email', true),
        "tanggal_daftar" => date('Y-m-d')
      ];
      $dataCategory = [
        "id" => $newId,
        "kode_kategori" => '8'
      ];
      $dataZone = [
        "id" => $newId,
        "kode_asaldaerah" => '4'
      ];
      $dataPayment = [
        "id" => $newId,
        "ukuran_jersey" => '*',
        "bayar_asuransi" => 'nobukti.jpg',
        "status_bayar_asuransi" => 'Not Uploaded',
        "bayar_jersey" => 'nobukti.jpg',
        "status_bayar_jersey" => 'Not Uploaded'
      ];
      $dataIncident = [
        "id" => $newId,
        "kecelakaan" => '-'
      ];
      $dataWinner = [
        "id" => $newId,
        "urutan_finish" => 0,
        "jam" => '00',
        "menit" => '00',
        "detik" => '00'
      ];

      $dataFeedback = [
        "id" => $newId,
        "komentar" => '-'
      ];

      $password = random_int(100000, 999999);
      $dataReg = [
        "id" => $newId,
        'name' => htmlspecialchars($this->input->post('nama', true)),
        "username" => url_title($this->input->post('nama'), '-', true),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];

      $email = $this->input->post('email');
      $subject = "Tour de Loksado 2022";
      $pesan = "Selamat, Anda Telah Terdaftar Sebagai Peserta Event Tour de Loksado 2022. Email: ". $email ." dan Password: ". $password;
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

      $this->db->insert('cyclist', $data);
      $this->db->insert('cyclist_category', $dataCategory);
      $this->db->insert('cyclist_zone', $dataZone);
      $this->db->insert('cyclist_payment', $dataPayment);
      $this->db->insert('cyclist_incident', $dataIncident);
      $this->db->insert('cyclist_winner', $dataWinner);
      $this->db->insert('user', $dataReg);

      // $this->_sendEmail();

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat, Anda Telah Terdaftar! Silakan login dengan username dan password yang telah dikirimkan ke email anda.</div>');
      redirect('auth');
    }
  }

  private function _sendEmail()
  {
    $config = [
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_user' => 'tourdeloksado2022@gmail.com',
      'smtp_pass' => 'valindotdl22*',
      'smtp_port' => 465,
      'mailtype' => 'html',
      'charset' => 'utf-8',
      'newline' => "\r\n"
    ];

    // $this->load->library('email', $config);
    $this->email->initialize($config);

    $this->email->from('tourdeloksado2022@gmail.com', 'Tour de Loksado 2022');
    $this->email->to('emiyashirou551@gmail.com');
    $this->email->subject('Testing');
    $this->email->message('Hello World!');

    if ($this->email->send()) {
      return true;
    } else {
      echo $this->email->print_debugger();
      die;
    }
  }

  public function myCyclistData()
  {
    $data['title'] = 'My Cyclist Data';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/pesepeda-my-cyclist-data', $data);
    $this->load->view('templates/footer');
  }

  public function editMyCyclistData($id)
  {
    $data['title'] = 'My Cyclist Data';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();

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
      $this->load->view('pesepeda/pesepeda-edit-my-cyclist-data', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $no_identitas = $this->input->post('no_identitas');
      $nama = $this->input->post('nama');
      $tanggal_lahir = $this->input->post('tanggal_lahir');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $alamat = $this->input->post('alamat');
      $telp = $this->input->post('telp');
      $email = $this->input->post('email');
      $tanggal_daftar = $this->input->post('tanggal_daftar');

      //cek jika ada gambar yg diupload
      $upload_image = $_FILES['foto']['name'];

      // //tentukan file ext
      // $validFileExt = ['jpg', 'png'];
      // //ambil file ext
      // $fileExt = explode('.', $upload_image);
      // $fileExt = strtolower(end($fileExt));
      // if (!in_array($fileExt, $validFileExt)) {
      //   echo "<script>alert('Image Extension Must Be JPG or PNG!')</script>";
      //   return false;
      // }

      if ($upload_image) {
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/cyclist/';


        // $fileType = $_FILES['foto']['type'];
        // var_dump($fileExt);
        // die;


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
      } else {
      }

      $this->db->set('no_identitas', $no_identitas);
      $this->db->set('nama', $nama);
      $this->db->set('tanggal_lahir', $tanggal_lahir);
      $this->db->set('jenis_kelamin', $jenis_kelamin);
      $this->db->set('alamat', $alamat);
      $this->db->set('telp', $telp);
      $this->db->set('email', $email);
      $this->db->set('tanggal_daftar', $tanggal_daftar);
      $this->db->where('id', $id);
      $this->db->update('cyclist');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your cyclist data has been edited.</div>');
      redirect('pesepeda/myCyclistData');
    }
  }

  public function myCategoryData()
  {
    $data['title'] = 'My Cyclist Category';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myCategoryData'] = $this->db->get_where('cyclist_category_view', ['id' => $myId])->row_array();
    // var_dump($data['myCategoryData']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/pesepeda-my-category-data', $data);
    $this->load->view('templates/footer');
  }

  public function editMyCategoryData($id)
  {
    $data['title'] = 'Edit My Cyclist Category';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myCategoryData'] = $this->db->get_where('cyclist_category_view', ['id' => $id])->row_array();

    $this->form_validation->set_rules('challenge_kom', 'King & Queen of Mountain Challenge', 'required');
    $this->form_validation->set_rules('kode_kategori', 'King & Queen of Mountain Challenge Category', 'required');
    $this->form_validation->set_rules('bamboo_rafting', 'Bamboo Rafting', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pesepeda/pesepeda-edit-my-category-data', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $challenge_kom = $this->input->post('challenge_kom');
      $kode_kategori = $this->input->post('kode_kategori');
      $bamboo_rafting = $this->input->post('bamboo_rafting');

      $this->db->set('challenge_kom', $challenge_kom);
      $this->db->set('kode_kategori', $kode_kategori);
      $this->db->set('bamboo_rafting', $bamboo_rafting);
      $this->db->where('id', $id);
      $this->db->update('cyclist_category');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your cyclist category has been updated.</div>');
      redirect('pesepeda/myCategoryData');
    }
  }

  public function myZoneData()
  {
    $data['title'] = 'My Cyclist Zone';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myZoneData'] = $this->db->get_where('cyclist_zone_view', ['id' => $myId])->row_array();
    // var_dump($data['myZoneData']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/pesepeda-my-zone-data', $data);
    $this->load->view('templates/footer');
  }

  public function editMyZoneData($id)
  {
    $data['title'] = 'Edit My Cyclist Zone';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myZoneData'] = $this->db->get_where('cyclist_zone_view', ['id' => $myId])->row_array();

    $this->form_validation->set_rules('kode_asaldaerah', 'Zone', 'required');
    $this->form_validation->set_rules('nama_provinsi', 'Province', 'required');
    $this->form_validation->set_rules('jenis_transportasi', 'Transportation', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pesepeda/pesepeda-edit-my-zone-data', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $kode_asaldaerah = $this->input->post('kode_asaldaerah');
      $nama_provinsi = $this->input->post('nama_provinsi');
      $jenis_transportasi = $this->input->post('jenis_transportasi');

      $this->db->set('kode_asaldaerah', $kode_asaldaerah);
      $this->db->set('nama_provinsi', $nama_provinsi);
      $this->db->set('jenis_transportasi', $jenis_transportasi);
      $this->db->where('id', $id);
      $this->db->update('cyclist_zone');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your cyclist zone has been updated.</div>');
      redirect('pesepeda/myZoneData');
    }
  }

  public function myPaymentData()
  {
    $data['title'] = 'My Cyclist Payment';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myPaymentData'] = $this->db->get_where('cyclist_payment_view', ['id' => $myId])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/pesepeda-my-payment-data', $data);
    $this->load->view('templates/footer');
  }

  public function editMyPaymentData($id)
  {
    $data['title'] = 'Edit My Cyclist Payment';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myPaymentData'] = $this->db->get_where('cyclist_payment_view', ['id' => $myId])->row_array();

    $this->form_validation->set_rules('beli_jersey', 'Jersey Purchase', 'required');
    $this->form_validation->set_rules('ukuran_jersey', 'Jersey Size', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pesepeda/pesepeda-edit-my-payment-data', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $beli_jersey = $this->input->post('beli_jersey');
      $ukuran_jersey = $this->input->post('ukuran_jersey');

      //bukti tf asuransi
      $upload_image_asuransi = $_FILES['bayar_asuransi']['name'];
      if ($upload_image_asuransi) {
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/tfasuransi/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bayar_asuransi')) {
          //hapus gambar lama
          $old_image = $data['myPaymentData']['bayar_asuransi'];
          if ($old_image != 'nobukti.jpg') {
            unlink(FCPATH . 'assets/img/tfasuransi/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('bayar_asuransi', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      //bukti tf jersey
      $upload_image_jersey = $_FILES['bayar_jersey']['name'];
      if ($upload_image_jersey) {
        $configJ['allowed_types'] = 'jpg|jpeg|png';
        $configJ['max_size']     = '2048';
        $configJ['upload_path'] = './assets/img/tfjersey/';

        $this->load->library('upload', $configJ);

        if ($this->upload->do_upload('bayar_jersey')) {
          //hapus gambar lama
          $old_imageJ = $data['myPaymentData']['bayar_jersey'];
          if ($old_imageJ != 'nobukti.jpg') {
            unlink(FCPATH . 'assets/img/tfjersey/' . $old_imageJ);
          }
          $new_imageJ = $this->upload->data('file_name');
          $this->db->set('bayar_jersey', $new_imageJ);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('status_bayar_asuransi', 'Pending');
      $this->db->set('beli_jersey', $beli_jersey);
      $this->db->set('ukuran_jersey', $ukuran_jersey);
      $this->db->set('status_bayar_jersey', 'Pending');
      $this->db->where('id', $id);
      $this->db->update('cyclist_payment');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your cyclist payment has been updated.</div>');
      redirect('pesepeda/myPaymentData');
    }
  }

  public function feedback()
  {
    $data['title'] = 'Feedback';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myFeedbackData'] = $this->db->get_where('cyclist_feedback_view', ['id' => $myId])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pesepeda/pesepeda-feedback', $data);
    $this->load->view('templates/footer');
  }

  public function editMyFeedback()
  {
    $data['title'] = 'Edit My Feedback';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['myCyclistData'] = $this->db->get_where('cyclist',  ['email' => $this->session->userdata('email')])->row_array();
    $myId = $data['myCyclistData']['id'];
    $data['myFeedbackData'] = $this->db->get_where('cyclist_feedback_view', ['id' => $myId])->row_array();

    $this->form_validation->set_rules('nilai', 'Rate', 'required');
    $this->form_validation->set_rules('komentar', 'Comment', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('pesepeda/pesepeda-edit-my-feedback', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $nilai = $this->input->post('nilai');
      $komentar = $this->input->post('komentar');

      $this->db->set('nilai', $nilai);
      $this->db->set('komentar', $komentar);
      $this->db->where('id', $id);
      $this->db->update('cyclist_feedback');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your feedback has been updated.</div>');
      redirect('pesepeda/feedback');
    }
  }
}
