<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Winner_model extends CI_model
{
  public function getAllCyclistWinnerM()
  {
    $this->db->order_by('urutan_finish', 'asc');
    return $this->db->get('cyclist_winner_view')->result_array();
  }
  
  public function getAllCyclistWinnerPdfM()
  {
    $this->db->order_by('urutan_finish', 'asc');
    return $this->db->get_where('cyclist_winner_view', ['urutan_finish >' => 0])->result_array();
  }

  public function getCyclistWinnerByIdM($id)
  {
    return $this->db->get_where('cyclist_winner_view', ['id' => $id])->row_array();
  }
}
