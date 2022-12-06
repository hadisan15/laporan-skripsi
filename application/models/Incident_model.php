<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incident_model extends CI_model
{
  public function getAllCyclistIncidentM()
  {
    return $this->db->get('cyclist_incident_view')->result_array();

  }
  public function getAllCyclistEvacuateM()
  {
    return $this->db->get('cyclist_evacuate_view')->result_array();
  }

  public function getCyclistIncidentByIdM($id)
  {
    return $this->db->get_where('cyclist_incident_view', ['id' => $id])->row_array();
  }
}
