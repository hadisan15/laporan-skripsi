<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zone extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Zone_model', 'zoneM');
    $this->load->model('Category_model', 'categoryM');
    $this->load->model('Cyclist_model', 'cyclistM');
  }

  public function index()
  {
    $data['title'] = 'Cyclist Zone';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['zone'] = $this->zoneM->getAllZoneM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('zone/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistZone()
  {
    $data['title'] = 'All Cyclist Zone Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['zone'] = $this->zoneM->getAllZoneM();
    $data['cyclistZone'] = $this->zoneM->getAllCyclistZoneM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('zone/cyclist-zone', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistZoneUpdate($id)
  {
    $data['title'] = 'Cyclist Zone Update Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistZone'] = $this->zoneM->getCyclistZoneByIdM($id);

    $this->form_validation->set_rules('kode_asaldaerah', 'Zone', 'required');
    $this->form_validation->set_rules('nama_provinsi', 'Province', 'required');
    $this->form_validation->set_rules('jenis_transportasi', 'Transportation', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('zone/cyclist-zone-update', $data);
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
      $tes = $this->db->update('cyclist_zone');
      
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist zone has been updated.</div>');
      redirect('zone/cyclistZone');
    }
  }

  public function cyclistPerZone($kode_asaldaerah)
  {
    $data['title'] = 'Cyclist Per Zone Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPerZone'] = $this->zoneM->getCyclistPerZoneM($kode_asaldaerah);
    $data['zoneName'] = $this->zoneM->getZoneNameM($kode_asaldaerah);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('zone/cyclist-per-zone', $data);
    $this->load->view('templates/footer');
  }

  public function zonePdf()
  {
    $data['title'] = 'LAPORAN DATA PEMBAGIAN ASAL WILAYAH<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['zone'] = $this->zoneM->getAllZoneM();
    $data['pdfName'] = "Laporan Data Pembagian Asal Wilayah Pesepeda Tour de Loksado 2022.pdf";
    $this->load->view('zone/zone-pdf', $data);
  }

  public function allCyclistZonePdf()
  {

    $data['title'] = 'LAPORAN DATA ASAL WILAYAH DAN PROVINSI<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['cyclistZone'] = $this->zoneM->getAllCyclistZoneM();
    $data['pdfName'] = "Laporan Data Asal Wilayah dan Provinsi Pesepeda Tour de Loksado 2022.pdf";
    $this->load->view('zone/cyclist-zone-pdf', $data);
  }

  public function cyclistPerZonePdf($kode_asaldaerah)
  {
    $data['zoneName'] = $this->zoneM->getZoneNameM($kode_asaldaerah);
    $data['cyclistPerZone'] = $this->zoneM->getCyclistPerZoneM($kode_asaldaerah);
    $data['total_rows'] = $this->zoneM->countCyclistPerZoneM($kode_asaldaerah);

    $this->load->view('zone/cyclist-per-zone-pdf', $data);
  }
}
