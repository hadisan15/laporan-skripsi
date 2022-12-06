<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Zone_model extends CI_model
{

  public function getAllZoneM()
  {
    return $this->db->get_where('zone_view', ['kode_asaldaerah <' => 4])->result_array();
  }

  public function getAllCyclistZoneM()
  {
    return $this->db->get('cyclist_zone_view')->result_array();
  }

  public function getCyclistZonePerPageM($limit, $start)
  {
    return $this->db->get('cyclist_zone_view', $limit, $start)->result_array();
  }

  public function getCyclistZoneByIdM($id)
  {
    return $this->db->get_where('cyclist_zone_view', ['id' => $id])->row_array();
  }

  public function getCyclistPerZoneM($kode_asaldaerah)
  {
    return $this->db->get_where('cyclist_zone_view', ['kode_asaldaerah' => $kode_asaldaerah])->result_array();
  }

  public function countCyclistPerZoneM($kode_asaldaerah)
  {
    return $this->db->get_where('cyclist_zone_view', ['kode_asaldaerah' => $kode_asaldaerah])->num_rows();
  }

  public function getZoneNameM($kode_asaldaerah)
  {
    return $this->db->get_where('zone', ['kode_asaldaerah' => $kode_asaldaerah])->row_array();
  }
}
