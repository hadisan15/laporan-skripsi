<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // is_logged_in();
    $this->load->model('Cyclist_model', 'cyclistM');
    $this->load->model('Category_model', 'categoryM');
    $this->load->model('Zone_model', 'zoneM');
    $this->load->model('Payment_model', 'paymentM');
    $this->load->model('Incident_model', 'incidentM');
    $this->load->model('Winner_model', 'winnerM');
    $this->load->model('Admin_model', 'adminM');
  }

  public function cyclistPimpinan()
  {
    $data['title'] = 'Cyclist';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclist'] = $this->cyclistM->getAllMainCyclistM();
    $data['total_rows'] = $this->cyclistM->countAllCyclistM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistDateFilterPimpinan()
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
    $this->load->view('pimpinan/pimpinan-cyclist-datefilter', $data);
    $this->load->view('templates/footer');
  }

  public function categoryPimpinan()
  {
    $data['title'] = 'Cyclist Category';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['category'] = $this->categoryM->getAllCategoryM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-category', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistCategoryPimpinan()
  {
    $data['title'] = 'All Cyclist Category Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['category'] = $this->categoryM->getAllCategoryM();
    $data['cyclistCategory'] = $this->categoryM->getAllCyclistCategoryM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-category', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPerCategoryPimpinan($kode_kategori)
  {
    $data['title'] = 'Cyclist Per Category Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPerCategory'] = $this->categoryM->getCyclistPerCategoryM($kode_kategori);
    $data['categoryName'] = $this->categoryM->getCategoryNameM($kode_kategori);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-per-category', $data);
    $this->load->view('templates/footer');
  }

  public function zonePimpinan()
  {
    $data['title'] = 'Cyclist Zone';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['zone'] = $this->zoneM->getAllZoneM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-zone', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistZonePimpinan()
  {
    $data['title'] = 'All Cyclist Zone Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['zone'] = $this->zoneM->getAllZoneM();
    $data['cyclistZone'] = $this->zoneM->getAllCyclistZoneM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-zone', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPerZonePimpinan($kode_asaldaerah)
  {
    $data['title'] = 'Cyclist Per Zone Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPerZone'] = $this->zoneM->getCyclistPerZoneM($kode_asaldaerah);
    $data['zoneName'] = $this->zoneM->getZoneNameM($kode_asaldaerah);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-per-zone', $data);
    $this->load->view('templates/footer');
  }

  public function paymentPimpinan()
  {
    $data['title'] = 'Cyclist Payment';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['jersey'] = $this->paymentM->getAllJerseyM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-payment', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPaymentPimpinan()
  {
    $data['title'] = 'All Cyclist Payment';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['jersey'] = $this->paymentM->getAllJerseyM();
    $data['cyclistPayment'] = $this->paymentM->getAllCyclistPaymentM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-payment', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPerJerseyPimpinan($ukuran_jersey)
  {
    $data['title'] = 'Cyclist Per Jersey Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPerJersey'] = $this->paymentM->getCyclistPerJerseyM($ukuran_jersey);
    $data['jerseyName'] = $this->paymentM->getJerseyNameM($ukuran_jersey);

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-per-jersey', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistDetailPimpinan($id)
  {
    $data['title'] = 'Cyclist Detail Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclist'] = $this->db->get_where('cyclist_detail_view', ['id' => $id])->row_array();
    // $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-detail', $data);
    $this->load->view('templates/footer');
  }

  public function chart()
  {
    $data['title'] = 'Cyclist Chart';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['chartAreaTitle'] = 'Grafik Pendaftaran Pesepeda Tour de Loksado 2022';
    $data['chartAreaLabel'] = $this->adminM->getChartPerDate();

    $data['chartPieTitle'] = 'Grafik Kategori Pesepeda Tour de Loksado 2022';
    $data['chartPieLabel'] = $this->adminM->getChartPerCategory();

    $data['chartBarTitle'] = 'Grafik Asal Provinsi Pesepeda Tour de Loksado 2022';
    $data['chartBarLabel'] = $this->adminM->getChartPerProvince();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-chart', $data);
    // $this->load->view('templates/footer');
  }

  public function chartAreaPdf()
  {
    $data['title'] = 'Grafik Pendaftaran Pesepeda Tour de Loksado 2022';

    $data['chartAreaLabel'] = $this->adminM->getChartPerDate();

    $this->load->view('admin/chart-area-pdf', $data);
  }

  public function chartPiePdf()
  {
    $data['title'] = 'Grafik Kategori Pesepeda Tour de Loksado 2022';

    $data['chartPieLabel'] = $this->adminM->getChartPerCategory();

    $this->load->view('admin/chart-pie-pdf', $data);
  }

  public function chartBarPdf()
  {
    $data['title'] = 'Grafik Asal Provinsi Pesepeda Tour de Loksado 2022';

    $data['chartBarLabel'] = $this->adminM->getChartPerProvince();

    $this->load->view('admin/chart-bar-pdf', $data);
  }

  public function incidentPimpinan()
  {
    $data['title'] = 'Cyclist Incident';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistIncident'] = $this->incidentM->getAllCyclistIncidentM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-incident', $data);
    $this->load->view('templates/footer');
  }

  public function evacuatePimpinan()
  {
    $data['title'] = 'Cyclist Evacuate';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistEvacuate'] = $this->incidentM->getAllCyclistEvacuateM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-evacuate', $data);
    $this->load->view('templates/footer');
  }

  public function finisherPimpinan()
  {
    $data['title'] = 'Cyclist Finisher';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistWinner'] = $this->winnerM->getAllCyclistWinnerM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('pimpinan/pimpinan-cyclist-finisher', $data);
    $this->load->view('templates/footer');
  }
}
