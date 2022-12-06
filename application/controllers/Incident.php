<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incident extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_model', 'categoryM');
    $this->load->model('Cyclist_model', 'cyclistM');
    $this->load->model('Incident_model', 'incidentM');
  }

  public function index()
  {
    $data['title'] = 'Cyclist Incident';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistIncident'] = $this->incidentM->getAllCyclistIncidentM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('incident/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistEvacuate()
  {
    $data['title'] = 'Cyclist Evacuate';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistEvacuate'] = $this->incidentM->getAllCyclistEvacuateM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('incident/cyclist-evacuate', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistIncidentEdit($id)
  {
    $data['title'] = 'Cyclist Incident Update';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistIncident'] = $this->incidentM->getCyclistIncidentByIdM($id);

    $this->form_validation->set_rules('level_kecelakaan', 'Incident Level', 'required');
    $this->form_validation->set_rules('kecelakaan', 'Incident Description', 'required');
    $this->form_validation->set_rules('status_pesepeda', 'Cyclist Status', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('incident/cyclist-incident-update', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $no_pesepeda = $this->input->post('no_pesepeda');
      $level_kecelakaan = $this->input->post('level_kecelakaan');
      $kecelakaan = $this->input->post('kecelakaan');
      $status_pesepeda = $this->input->post('status_pesepeda');

      // $this->db->set('no_pesepeda', $no_pesepeda);
      $this->db->set('level_kecelakaan', $level_kecelakaan);
      $this->db->set('kecelakaan', $kecelakaan);
      $this->db->set('status_pesepeda', $status_pesepeda);
      $this->db->where('id', $id);
      $this->db->update('cyclist_incident');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist Incident has been updated.</div>');
      redirect('incident');
    }
  }

  public function cyclistIncidentPdf()
  {
    $data['title'] = 'LAPORAN DATA INSIDEN<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['cyclistIncident'] = $this->incidentM->getAllCyclistIncidentM();
    $data['pdfName'] = 'Laporan Data Insiden Pesepeda Tour de Loksado 2022.pdf';

    $this->load->view('incident/cyclist-incident-pdf', $data);
  }

  public function cyclistEvacuatePdf()
  {
    $data['title'] = 'LAPORAN DATA PESEPEDA YANG DIEVAKUASI<br>TOUR DE LOKSADO 2022';
    $data['cyclistEvacuate'] = $this->incidentM->getAllCyclistEvacuateM();
    $data['pdfName'] = 'Laporan Data Pesepeda yang Dievakuasi Tour de Loksado 2022.pdf';

    $this->load->view('incident/cyclist-evacuate-pdf', $data);
  }
}
