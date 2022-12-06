<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Winner extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_model', 'categoryM');
    $this->load->model('Cyclist_model', 'cyclistM');
    $this->load->model('Incident_model', 'incidentM');
    $this->load->model('Winner_model', 'winnerM');
  }

  public function index()
  {
    $data['title'] = 'Cyclist Finisher';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistWinner'] = $this->winnerM->getAllCyclistWinnerM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('winner/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistWinnerEdit($id)
  {
    $data['title'] = 'Cyclist Finisher Update';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistWinner'] = $this->winnerM->getCyclistWinnerByIdM($id);

    $this->form_validation->set_rules('urutan_finish', 'Finish Order', 'required');
    $this->form_validation->set_rules('jam', 'Hour', 'required');
    $this->form_validation->set_rules('menit', 'Minute', 'required');
    $this->form_validation->set_rules('detik', 'Second', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('winner/cyclist-winner-update', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $urutan_finish = $this->input->post('urutan_finish');
      $jam = $this->input->post('jam');
      $menit = $this->input->post('menit');
      $detik = $this->input->post('detik');

      $this->db->set('urutan_finish', $urutan_finish);
      $this->db->set('jam', $jam);
      $this->db->set('menit', $menit);
      $this->db->set('detik', $detik);
      $this->db->where('id', $id);
      $this->db->update('cyclist_winner');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist finisher has been updated.</div>');
      redirect('winner');
    }
  }

  public function cyclistWinnerPdf()
  {
    $data['title'] = 'LAPORAN DATA FINISHER<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['cyclistWinner'] = $this->winnerM->getAllCyclistWinnerPdfM();
    $data['pdfName'] = 'Laporan Data Finisher Pesepeda Tour de Loksado 2022.pdf';

    $this->load->view('winner/cyclist-winner-pdf', $data);
  }
}
