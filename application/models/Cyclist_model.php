<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cyclist_model extends CI_model
{

  public function getAllCyclistM()
  {
    $this->db->order_by('id', 'ASC');
    $sql = $this->db->get('cyclist_detail_view');
    return $sql->result_array();
    // return $this->db->get('cyclist_detail_view')->result_array();
  }

  public function getAllMainCyclistM()
  {
    return $this->db->get('cyclist')->result_array();
  }

  public function getAllCyclistImportM()
  {
    return $this->db->get('cyclist_import')->result_array();
  }

  public function getCyclistById($id)
  {
    return $this->db->get_where('cyclist', ['id' => $id])->row_array();
  }

  public function cyclistCreateM()
  {
    //cek jika ada gambar yg diupload
    $upload_image = $_FILES['foto']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './assets/img/cyclist/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('foto')) {
        //hapus gambar lama
        $old_image = 'default.jpg';
        if ($old_image != 'default.jpg') {
          unlink(FCPATH . 'assets/img/cyclist/' . $old_image);
        }
        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }
    $data = [
      // "no_pesepeda" => $this->input->post('no_pesepeda', true),
      "no_identitas" => $this->input->post('no_identitas', true),
      "nama" => $this->input->post('nama', true),
      "username" => url_title($this->input->post('nama'), '-', true),
      "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
      "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
      "alamat" => $this->input->post('alamat', true),
      "telp" => $this->input->post('telp', true),
      "email" => $this->input->post('email', true),
      // "foto" => $this->upload->do_upload('foto', true),
      "tanggal_daftar" => date('Y-m-d')
    ];
    $dataCategory = [
      // "no_pesepeda" => $this->input->post('no_pesepeda', true),
      "kode_kategori" => '8'
    ];
    $dataZone = [
      // "no_pesepeda" => $this->input->post('no_pesepeda', true),
      "kode_asaldaerah" => '4'
      // "nama_provinsi" => 'Nama Provinsi',
      // "jenis_transportasi" => 'Panitia'
    ];
    $dataPayment = [
      // "no_pesepeda" => $this->input->post('no_pesepeda', true),
      "ukuran_jersey" => '*',
      "bayar_asuransi" => 'nobukti.jpg',
      "bayar_jersey" => 'nobukti.jpg'
    ];
    $dataIncident = [
      "kecelakaan" => '-'
    ];
    $dataWinner = [
      "urutan_finish" => 0
    ];
    $dataReg = [
      'name' => htmlspecialchars($this->input->post('nama', true)),
      "username" => url_title($this->input->post('nama'), '-', true),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'image' => 'default.jpg',
      'password' => password_hash($this->input->post('email'), PASSWORD_DEFAULT),
      'role_id' => 2,
      'is_active' => 1,
      'date_created' => time()
    ];
    
    $this->db->insert('cyclist', $data);
    $this->db->insert('cyclist_category', $dataCategory);
    $this->db->insert('cyclist_zone', $dataZone);
    $this->db->insert('cyclist_payment', $dataPayment);
    $this->db->insert('cyclist_incident', $dataIncident);
    $this->db->insert('cyclist_winner', $dataWinner);
    $this->db->insert('user', $dataReg);
  }

  public function cyclistEditM($id)
  {
    // $id = $this->cyclistM->getCyclistById($id);
    $data['cyclist'] = $this->cyclistM->getCyclistById($id);
    //cek jika ada gambar yg diupload
    $upload_image = $_FILES['foto']['name'];
    if ($upload_image) {
      $config['allowed_types'] = 'jpg|png';
      $config['max_size']     = '2048';
      $config['upload_path'] = './assets/img/cyclist/';

      $this->load->library('upload', $config);

      if ($this->upload->do_upload('foto')) {
        //hapus gambar lama
        $old_image = $data['cyclist']['foto'];
        if ($old_image != 'default.jpg') {
          unlink(FCPATH . 'assets/img/cyclist/' . $old_image);
        }
        $new_image = $this->upload->data('file_name');
        $this->db->set('foto', $new_image);
      } else {
        echo $this->upload->display_errors();
      }
    }
    $data = [
      "no_pesepeda" => $this->input->post('no_pesepeda', true),
      "no_identitas" => $this->input->post('no_identitas', true),
      "nama" => $this->input->post('nama', true),
      "tanggal_lahir" => $this->input->post('tanggal_lahir', true),
      "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
      "alamat" => $this->input->post('alamat', true),
      "telp" => $this->input->post('telp', true),
      "email" => $this->input->post('email', true),
      "foto" => $this->upload->do_upload('foto'),
      "tanggal_daftar" => $this->input->post('tanggal_daftar', true),
    ];
    $id = $this->input->post('id');
    $this->db->where('id', $id);
    $this->db->update('cyclist', $data);
  }

  public function cyclistDeleteByIdM($id)
  {
    // $idn = $this->uri->segment(3);
    
    $unn = $this->uri->segment(4);
    $this->db->where('id', $id);
    $this->db->delete(array('cyclist', 'cyclist_category', 'cyclist_zone', 'cyclist_payment', 'cyclist_incident', 'cyclist_winner'));
    $this->db->where('username', $unn);
    $this->db->delete('user');
    
  }
  
  public function cyclistDeleteByUnM($unn)
  {
    
  }

  // public function getCyclistPerPageM($limit, $start)
  // {
  //   return $this->db->get('cyclist', $limit, $start)->result_array();
  // }
  public function getCyclistPerPageM($limit, $start, $keyword = null)
  {
    if ($keyword) {
      $this->db->like('nama', $keyword);
    }
    return $this->db->get('cyclist', $limit, $start)->result_array();
  }

  public function countAllCyclistM()
  {
    return $this->db->get('cyclist')->num_rows();
  }

  public function countAllCyclistDateFilterM($date_range)
  {
    $this->db->where('tanggal_daftar >=', $date_range[0]);
    $this->db->where('tanggal_daftar <=', $date_range[1]);
    return $this->db->get('cyclist')->num_rows();
  }

  public function getCyclistDateFilterM($date_range)
  {
    $this->db->where('tanggal_daftar >=', $date_range[0]);
    $this->db->where('tanggal_daftar <=', $date_range[1]);
    return $this->db->get('cyclist')->result_array();
  }

  public function getCyclistPerDate()
  {
    return $this->db->get('count_cyclist_per_date_view')->result_array();
  }

  public function getCyclistPerDateLabel()
  {
    $this->db->order_by('tanggal_daftar', 'ASC');
    $sql = $this->db->get('count_cyclist_per_date_view');
    return $sql->result_array();
  }
}
