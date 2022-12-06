<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Payment_model', 'paymentM');
    $this->load->model('Cyclist_model', 'cyclistM');
  }

  public function index()
  {
    $data['title'] = 'Cyclist Payment';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['jersey'] = $this->paymentM->getAllJerseyM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('payment/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPayment()
  {
    $data['title'] = 'All Cyclist Payment';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['jersey'] = $this->paymentM->getAllJerseyM();
    $data['cyclistPayment'] = $this->paymentM->getAllCyclistPaymentM();
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('payment/cyclist-payment', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPerJersey($ukuran_jersey)
  {
    $data['title'] = 'Cyclist Per Jersey Size Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPerJersey'] = $this->paymentM->getCyclistPerJerseyM($ukuran_jersey);
    $data['jerseyName'] = $this->paymentM->getJerseyNameM($ukuran_jersey);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('payment/cyclist-per-jersey', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPaymentUpdate($id)
  {
    $data['title'] = 'Cyclist Payment Update Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPayment'] = $this->paymentM->getCyclistPaymentByIdM($id);

    $this->form_validation->set_rules('beli_jersey', 'Jersey Purchase', 'required');
    $this->form_validation->set_rules('ukuran_jersey', 'Jersey Size', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('payment/cyclist-payment-update', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $status_bayar_asuransi = $this->input->post('status_bayar_asuransi');
      $beli_jersey = $this->input->post('beli_jersey');
      $ukuran_jersey = $this->input->post('ukuran_jersey');
      $status_bayar_jersey = $this->input->post('status_bayar_jersey');

      //bukti tf asuransi
      $upload_image_asuransi = $_FILES['bayar_asuransi']['name'];
      if ($upload_image_asuransi) {
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/tfasuransi/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bayar_asuransi')) {
          //hapus gambar lama
          $old_image = $data['cyclistPayment']['bayar_asuransi'];
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
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/tfjersey/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('bayar_jersey')) {
          //hapus gambar lama
          $old_image = $data['cyclistPayment']['bayar_jersey'];
          if ($old_image != 'nobukti.jpg') {
            unlink(FCPATH . 'assets/img/tfjersey/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('bayar_jersey', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('status_bayar_asuransi', $status_bayar_asuransi);
      $this->db->set('beli_jersey', $beli_jersey);
      $this->db->set('ukuran_jersey', $ukuran_jersey);
      $this->db->set('status_bayar_jersey', $status_bayar_jersey);
      $this->db->where('id', $id);
      $this->db->update('cyclist_payment');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist payment has been updated.</div>');
      redirect('payment/cyclistPayment');
    }
  }

  public function jerseyPdf()
  {
    $data['title'] = 'LAPORAN DATA JERSEY PESEPEDA<br>TOUR DE LOKSADO 2022';
    $data['jersey'] = $this->paymentM->getAllJerseyM();
    $data['pdfName'] = "Laporan Data Jersey Pesepeda Tour de Loksado 2022.pdf";
    $this->load->view('payment/jersey-pdf', $data);
  }

  public function allCyclistPaymentPdf()
  {

    $data['title'] = 'LAPORAN DATA PEMBAYARAN ASURANSI DAN JERSEY<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['cyclistPayment'] = $this->paymentM->getAllCyclistPaymentM();
    $data['pdfName'] = "Laporan Data Pembayaran Asuransi dan Jersey Pesepeda Tour de Loksado 2022.pdf";

    $this->load->view('payment/cyclist-payment-pdf', $data);
  }

  public function cyclistPerJerseyPdf($ukuran_jersey)
  {
    $data['jerseyName'] = $this->paymentM->getJerseyNameM($ukuran_jersey);
    $data['cyclistPerJersey'] = $this->paymentM->getCyclistPerJerseyM($ukuran_jersey);
    $data['total_rows'] = $this->paymentM->countCyclistPerJerseyM($ukuran_jersey);

    $this->load->view('payment/cyclist-per-jersey-pdf', $data);
  }
}
