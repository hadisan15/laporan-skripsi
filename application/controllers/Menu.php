<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('Menu_model', 'menu');
  }

  public function index()
  {
    $data['title'] = 'Menu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('menu/index', $data);
    $this->load->view('templates/footer');
  }

  public function addMenu()
  {
    $data['title'] = 'Add Menu';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/menu-add', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        "menu" => $this->input->post('menu')
      ];

      $this->db->insert('user_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User menu has been added.</div>');
      redirect('menu');
    }
  }

  public function deleteMenu($id)
  {
    $this->menu->deleteMenuModel($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been deleted.</div>');
    redirect('menu');
  }

  public function editMenu($id)
  {
    $data['title'] = 'Menu Edit';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['menu'] = $this->menu->getMenuById($id);
    $this->form_validation->set_rules('menu', 'Menu', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/menu-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $menu = $this->input->post('menu');
      $this->db->set('menu', $menu);
      $this->db->where('id', $id);
      $this->db->update('user_menu');
      // $this->menu->editMenuModel();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been edited.</div>');
      redirect('menu');
    }
  }

  public function submenu()
  {
    $data['title'] = 'Submenu Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


    $data['submenu'] = $this->menu->getSubmenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();


    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('menu/submenu', $data);
    $this->load->view('templates/footer');
  }

  public function addSubmenu()
  {
    $data['title'] = 'Submenu Add';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['submenu'] = $this->menu->getSubmenu();
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu-add', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'title' => $this->input->post('title'),
        'menu_id' => $this->input->post('menu_id'),
        'url' => $this->input->post('url'),
        'icon' => $this->input->post('icon'),
        'is_active' => $this->input->post('is_active')
      ];
      $this->db->insert('user_sub_menu', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New submenu has been added.</div>');
      redirect('menu/submenu');
    }
  }

  public function deleteSubmenu($id)
  {
    $this->menu->deleteSubmenuModel($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Submenu has been deleted.</div>');
    redirect('menu/submenu');
  }

  public function editSubmenu($id)
  {
    $data['title'] = 'Submenu Edit';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['submenu'] = $this->menu->getSubmenuById($id);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'Url', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('menu/submenu-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $title = $this->input->post('title');
      $menu_id = $this->input->post('menu_id');
      $url = $this->input->post('url');
      $icon = $this->input->post('icon');

      $this->db->set('title', $title);
      $this->db->set('menu_id', $menu_id);
      $this->db->set('url', $url);
      $this->db->set('icon', $icon);
      $this->db->where('id', $id);
      $this->db->update('user_sub_menu');
      // $this->menu->editMenuModel();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sub menu has been edited.</div>');
      redirect('menu/submenu');
    }
  }
}
