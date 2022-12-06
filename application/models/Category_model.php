<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_model extends CI_model
{

  public function getAllCategoryM()
  {
    return $this->db->get_where('category_view', ['id <' => 9])->result_array();
  }

  public function getCategoryNameM($kode_kategori)
  {
    return $this->db->get_where('category', ['kode_kategori' => $kode_kategori])->row_array();
  }

  public function getAllCyclistCategoryM()
  {
    return $this->db->get('cyclist_category_view')->result_array();
  }

  public function getCyclistCategoryByIdM($id)
  {
    return $this->db->get_where('cyclist_category_view', ['id' => $id])->row_array();
  }

  public function getCyclistCategoryByNoM($no_pesepeda)
  {
    return $this->db->get_where('cyclist_category_view', ['no_pesepeda' => $no_pesepeda])->row_array();
  }

  public function getCyclistPerCategoryM($kode_kategori)
  {
    return $this->db->get_where('cyclist_category_view', ['kode_kategori' => $kode_kategori])->result_array();
  }
  
  public function countCyclistPerCategoryM($kode_kategori)
  {
    return $this->db->get_where('cyclist_category_view', ['kode_kategori' => $kode_kategori])->num_rows();
  }

  public function getCyclistCategoryPerPageM($limit, $start)
  {
    return $this->db->get('cyclist_category_view', $limit, $start)->result_array();
  }

  public function cyclistCategoryUpdateM()
  {
    $no_pesepeda = $this->input->post('no_pesepeda', true);
    $challenge_kom = $this->input->post('challenge_kom', true);
    $kode_kategori = $this->input->post('kode_kategori', true);
    $bamboo_rafting = $this->input->post('bamboo_rafting', true);

    $this->db->set('no_pesepeda', $no_pesepeda);
    $this->db->set('challenge_kom', $challenge_kom);
    $this->db->set('kode_kategori', $kode_kategori);
    $this->db->set('bamboo_rafting', $bamboo_rafting);
    // $data = [
    //   "no_pesepeda" => $this->input->post('no_pesepeda', true),
    //   "challenge_kom" => $this->input->post('challenge_kom', true),
    //   "kode_kategori" => $this->input->post('kode_kategori', true),
    //   "bamboo_rafting" => $this->input->post('bamboo_rafting', true)
    // ];
    $this->db->where('no_pesepeda', $no_pesepeda);
    $this->db->update('cyclist_category');
  }

  public function cyclistCategoryDeleteM($no_pesepeda)
  {
    $this->db->where('no_pesepeda', $no_pesepeda);
    $this->db->delete('cyclist_category');
  }
}
