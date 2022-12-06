<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('Admin_model', 'adminM');
  }

  public function index()
  {
    $data['title'] = 'Tour de Loksado 2022';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('about/index', $data);
    $this->load->view('templates/footer');
  }

  public function valindo()
  {
    $data['title'] = 'Valindo Event Organizer';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('about/valindo-eo', $data);
    $this->load->view('templates/footer');
  }

  public function infoUpdate()
  {
    $data['title'] = 'Informations';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['article'] = $this->adminM->getAllArticleM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('about/info-update', $data);
    $this->load->view('templates/footer');
  }

  public function infoUpdateDetail($slug)
  {
    $data['title'] = 'Information Content';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['article'] = $this->db->get_where('article', ['slug' => $slug])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('about/info-update-detail', $data);
    $this->load->view('templates/footer');
  }
}
