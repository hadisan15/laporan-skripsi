<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_model
{

  public function getAllMenu()
  {
    return $this->db->get('user_menu')->result_array();
  }
  // public function addMenu()
  // {
  //   $data = [
  //     "menu" => $this->input->post('menu')
  //   ];
  //   $this->db->insert('user_menu', $data)
  // }

  public function getMenuById($id)
  {
    return $this->db->get_where('user_menu', ['id' => $id])->row_array();
  }

  public function addMenu()
  {
    
  }

  public function deleteMenuModel($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_menu');
  }

  public function editMenuModel($id)
  {
    $data = [
      "menu" => $this->input->post('menu', true)
    ];
    $idHidden = $this->input->post('id');
    $this->db->where('id', $idHidden);
    $this->db->update('menu', $data);
  }

  public function getSubmenu()
  {
    $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getSubmenuById($id)
  {
    return $this->db->get_where('user_sub_menu_view', ['id' => $id])->row_array();
  }

  public function deleteSubmenuModel($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('user_sub_menu');
  }
}
