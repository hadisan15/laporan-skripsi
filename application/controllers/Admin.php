<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    is_logged_in();

    $this->load->model('Admin_model', 'adminM');
  }

  public function index()
  {
    $data['title'] = 'Dashboard';
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
    $this->load->view('admin/index', $data);
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

  public function role()
  {
    $data['title'] = 'Role Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get('user_role')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role', $data);
    $this->load->view('templates/footer');
  }

  public function addRole()
  {
    $data['title'] = 'Add Role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('role', 'Role Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role-add', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        "role" => $this->input->post('role')
      ];

      $this->db->insert('user_role', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User role has been added.</div>');
      redirect('admin/role');
    }
  }
  
  public function editRole($id)
  {
    $data['title'] = 'Edit Role';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['role'] = $this->db->get_where('user_role', ['id' => $id])->row_array();

    $this->form_validation->set_rules('role', 'Role Name', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/role-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $role = $this->input->post('role');
      $idHidden = $this->input->post('id');

      $this->db->set('role', $role);
      $this->db->where('id', $idHidden);
      $this->db->update('user_role');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User role has been edited.</div>');
      redirect('admin/role');
    }
  }

  public function deleteRole($id)
  {
    $this->adminM->deleteRoleModel($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been deleted.</div>');
    redirect('admin/role');
  }

  public function roleAccess($role_id)
  {
    $data['title'] = 'Role Access';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
    $this->db->where('id !=', 1);
    $data['menu'] = $this->db->get('user_menu')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/role-access', $data);
    $this->load->view('templates/footer');
  }

  public function changeAccess()
  {
    $menu_id = $this->input->post('menuId');
    $role_id = $this->input->post('roleId');

    $data = [
      'role_id' => $role_id,
      'menu_id' => $menu_id
    ];

    $result = $this->db->get_where('user_access_menu', $data);
    if ($result->num_rows() < 1) {
      $this->db->insert('user_access_menu', $data);
    } else {
      $this->db->delete('user_access_menu', $data);
    }

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role access has been changed.</div>');
  }

  public function userAdd()
  {
    $data['title'] = 'Add User';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'This email has already registered.'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
      'min_length' => 'Password too short.'
    ]);

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/user-add', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'name' => htmlspecialchars($this->input->post('name', true)),
        "username" => url_title($this->input->post('name'), '-', true),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time()
      ];
      $this->db->insert('user', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User has been registered.</div>');
      redirect('admin/userManagement');
    }
  }

  public function userManagement()
  {
    $data['title'] = 'User Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['userListData'] = $this->adminM->getAllUserM();
    // var_dump($data['userListData']);
    // die;

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/user-data', $data);
    $this->load->view('templates/footer');
  }

  public function userDelete($id)
  {
    $this->adminM->userDeleteM($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User data has been deleted.</div>');
    redirect('admin/userManagement');
  }

  public function article()
  {
    $data['title'] = 'Article Management';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['article'] = $this->adminM->getAllArticleM();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/article', $data);
    $this->load->view('templates/footer');
  }

  public function articleCreate()
  {
    $data['title'] = 'Write an Article';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('judul', 'Article Title', 'required|trim');
    $this->form_validation->set_rules('isi', 'Article Content', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/article-create', $data);
      $this->load->view('templates/footer');
    } else {
      $this->adminM->articleCreateM();
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Article has been posted.</div>');
      redirect('admin/article');
    }
  }

  public function articleDetail($slug)
  {
    $data['title'] = 'Manage Article';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['article'] = $this->db->get_where('article', ['slug' => $slug])->row_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/article-detail', $data);
    $this->load->view('templates/footer');
  }

  public function articleEdit($id)
  {
    $data['title'] = 'Edit Article';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['article'] = $this->db->get_where('article', ['id' => $id])->row_array();
    // $a = $data['article'];
    // var_dump($a);
    // die;

    $this->form_validation->set_rules('judul', 'Article Title', 'required|trim');
    $this->form_validation->set_rules('isi', 'Article Content', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('admin/article-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $judul = $this->input->post('judul');
      $isi = $this->input->post('isi');
      $penulis = $data['user']['name'];
      $tanggal = date('Y-m-d');
      $slug = url_title($this->input->post('judul'), '-', true);
      //cek jika ada gambar yg diupload
      $upload_image = $_FILES['gambar']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'jpg|png';
        $config['max_size']     = '2048';
        $config['upload_path'] = './assets/img/article/';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
          //hapus gambar lama
          $old_image = $data['cyclist']['gambar'];
          if ($old_image != 'default-article-img.jpg') {
            unlink(FCPATH . 'assets/img/article/' . $old_image);
          }
          $new_image = $this->upload->data('file_name');
          $this->db->set('gambar', $new_image);
        } else {
          echo $this->upload->display_errors();
        }
      }

      $this->db->set('judul', $judul);
      $this->db->set('slug', $slug);
      $this->db->set('isi', $isi);
      $this->db->set('tanggal', $tanggal);
      $this->db->set('penulis', $penulis);
      $this->db->where('id', $id);
      $this->db->update('article');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Article has been edited.</div>');
      redirect('admin/article');
    }
  }

  public function articleDelete($id)
  {
    $this->adminM->deleteArticleModel($id);
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Article has been deleted.</div>');
    redirect('admin/article');
  }
}
