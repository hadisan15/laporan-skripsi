<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_model
{

  
  public function deleteRoleModel($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_role');
  }

  public function getAllArticleM()
  {
    $this->db->order_by('tanggal', 'DESC');
    $sql = $this->db->get('article');
    return $sql->result_array();
  }

  public function articleCreateM()
  {
    //cek jika ada gambar yg diupload
    $upload_image = $_FILES['gambar']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './assets/img/article/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('gambar')) {
        //hapus gambar lama
        $old_image = 'default-article-img.jpg';
        if ($old_image != 'default-article-img.jpg') {
          unlink(FCPATH . 'assets/img/article/' . $old_image);
        }
        $new_image = $this->upload->data('file_name');
        $this->db->set('gambar', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $penulis = $data['user']['name'];
    $data = [
      "judul" => $this->input->post('judul', true),
      "slug" => url_title($this->input->post('judul'), '-', true),
      "isi" => $this->input->post('isi', true),
      "tanggal" => date('Y-m-d'),
      "penulis" => $penulis
    ];
    $this->db->insert('article', $data);
  }

  public function deleteArticleModel($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('article');
  }



  public function getChartPerDate()
  {
    $this->db->order_by('tanggal_daftar', 'ASC');
    $sql = $this->db->get('count_cyclist_per_date_view');
    return $sql->result_array();
  }

  public function getChartPerCategory()
  {
    $this->db->order_by('kode_kategori', 'ASC');
    $sql = $this->db->get_where('category_view', ['kode_kategori <' => 8]);
    return $sql->result_array();
  }

  public function getChartPerProvince()
  {
    $this->db->order_by('nama_provinsi', 'ASC');
    $sql = $this->db->get('count_cyclist_per_province_view');
    return $sql->result_array();
  }

  public function getAllUserM()
  {
    $this->db->order_by('role', 'ASC');
    return $this->db->get('user_view')->result_array();
  }

  public function userDeleteM($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user');
  }
}
