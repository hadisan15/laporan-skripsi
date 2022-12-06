<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Category_model', 'categoryM');
    $this->load->model('Cyclist_model', 'cyclistM');
  }

  public function index()
  {
    $data['title'] = 'Cyclist Category';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['category'] = $this->categoryM->getAllCategoryM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('category/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistCategory()
  {
    $data['title'] = 'All Cyclist Category Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['category'] = $this->categoryM->getAllCategoryM();
    $data['cyclistCategory'] = $this->categoryM->getAllCyclistCategoryM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('category/cyclist-category', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistPerCategory($kode_kategori)
  {
    $data['title'] = 'Cyclist Per Category Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistPerCategory'] = $this->categoryM->getCyclistPerCategoryM($kode_kategori);
    $data['categoryName'] = $this->categoryM->getCategoryNameM($kode_kategori); 

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('category/cyclist-per-category', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistCategoryUpdate($id)
  {
    $data['title'] = 'Cyclist Category Update Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistCategory'] = $this->categoryM->getCyclistCategoryByIdM($id);

    $this->form_validation->set_rules('challenge_kom', 'King & Queen of Mountain Challenge', 'required');
    $this->form_validation->set_rules('kode_kategori', 'King & Queen of Mountain Challenge Category', 'required');
    $this->form_validation->set_rules('bamboo_rafting', 'Bamboo Rafting', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('category/cyclist-category-update', $data);
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
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Cyclist Category has been updated.</div>');
      redirect('category/cyclistCategory');
    }
  }

  public function categoryPdf()
  {

    $data['title'] = 'LAPORAN DATA KATEGORI KING & QUEEN OF MOUNTAIN<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['category'] = $this->categoryM->getAllCategoryM();
    $data['pdfName'] = 'Laporan Data Kategori King & Queen of Mountain Pesepeda Tour de Loksado 2022.pdf';

    $this->load->view('category/category-pdf', $data);
  }
  
  public function allCyclistCategoryPdf()
  {

    $data['title'] = 'LAPORAN DATA KATEGORI SELURUH<br>PESEPEDA TOUR DE LOKSADO 2022';
    $data['cyclistCategory'] = $this->categoryM->getAllCyclistCategoryM();
    $data['pdfName'] = 'Laporan Data Kategori Seluruh Pesepeda Tour de Loksado 2022.pdf';

    $this->load->view('category/cyclist-category-pdf', $data);
  }

  public function cyclistPerCategoryPdf($kode_kategori)
  {
    $data['categoryName'] = $this->categoryM->getCategoryNameM($kode_kategori); 
    $data['title'] = 'Cyclist Per Category Report';
    $data['cyclistPerCategory'] = $this->categoryM->getCyclistPerCategoryM($kode_kategori);
    $data['total_rows'] = $this->categoryM->countCyclistPerCategoryM($kode_kategori);

    $this->load->view('category/cyclist-per-category-pdf', $data);
  }

}
