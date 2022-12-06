<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_model
{

  public function getAllJerseyM()
  {
    $this->db->order_by('id', 'ASC');
    return $this->db->get_where('jersey_view', ['id <' => 15])->result_array();
  }

  public function getCyclistPaymentByIdM($id)
  {
    return $this->db->get_where('cyclist_payment_view', ['id' => $id])->row_array();
  }
  public function getCyclistPaymentByNoM($no_pesepeda)
  {
    return $this->db->get_where('cyclist_payment_view', ['no_pesepeda' => $no_pesepeda])->row_array();
  }

  public function getCyclistPaymentPerPageM($limit, $start)
  {
    return $this->db->get('cyclist_payment_view', $limit, $start)->result_array();
  }

  public function getCyclistPerJerseyM($ukuran_jersey)
  {
    return $this->db->get_where('cyclist_payment_view', ['ukuran_jersey' => $ukuran_jersey])->result_array();
  }

  public function countCyclistPerJerseyM($ukuran_jersey)
  {
    return $this->db->get_where('cyclist_payment_view', ['ukuran_jersey' => $ukuran_jersey])->num_rows();
  }

  public function getJerseyNameM($ukuran_jersey)
  {
    return $this->db->get_where('jersey', ['ukuran_jersey' => $ukuran_jersey])->row_array();
  }

  public function getAllCyclistPaymentM()
  {
    return $this->db->get('cyclist_payment_view')->result_array();
  }

}
