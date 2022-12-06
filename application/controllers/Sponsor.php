<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sponsor extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Sponsorship';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['sponsor'] = $this->db->get('sponsor')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('sponsor/index', $data);
    $this->load->view('templates/footer');
  }

  public function sponsorCreate()
  {
    $data['title'] = 'Sponsorship Insert Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama_event', 'Nama Event', 'required');
    $this->form_validation->set_rules('tanggal_event', 'Tanggal Event', 'required');
    $this->form_validation->set_rules('nama_sponsor', 'Nama Sponsor', 'required');
    $this->form_validation->set_rules('bentuk_dukungan', 'Bentuk Dukungan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('sponsor/sponsor-create', $data);
      $this->load->view('templates/footer');
    } else {
      $data = [
        'nama_event' => $this->input->post('nama_event'),
        'tanggal_event' => $this->input->post('tanggal_event'),
        'nama_sponsor' => $this->input->post('nama_sponsor'),
        'bentuk_dukungan' => $this->input->post('bentuk_dukungan')
      ];
      $this->db->insert('sponsor', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sponsorship has been added.</div>');
      redirect('sponsor');
    }
  }

  public function sponsorEdit($id)
  {
    $data['title'] = 'Sponsorship Edit Page';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['sponsor'] = $this->db->get_where('sponsor', ['id' => $id])->row_array();

    $this->form_validation->set_rules('nama_event', 'Nama Event', 'required');
    $this->form_validation->set_rules('tanggal_event', 'Tanggal Event', 'required');
    $this->form_validation->set_rules('nama_sponsor', 'Nama Sponsor', 'required');
    $this->form_validation->set_rules('bentuk_dukungan', 'Bentuk Dukungan', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('sponsor/sponsor-edit', $data);
      $this->load->view('templates/footer');
    } else {
      $id = $this->input->post('id');
      $nama_event = $this->input->post('nama_event');
      $tanggal_event = $this->input->post('tanggal_event');
      $nama_sponsor = $this->input->post('nama_sponsor');
      $bentuk_dukungan = $this->input->post('bentuk_dukungan');

      $this->db->set('nama_event', $nama_event);
      $this->db->set('tanggal_event', $tanggal_event);
      $this->db->set('nama_sponsor', $nama_sponsor);
      $this->db->set('bentuk_dukungan', $bentuk_dukungan);
      $this->db->where('id', $id);
      $this->db->update('sponsor');
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sponsorship data has been edited.</div>');
      redirect('sponsor');
    }
  }

  public function sponsorDelete($id)
  {
    $this->db->where('id', $id);
    $this->db->delete('sponsor');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Sponsorship data has been deleted.</div>');
    redirect('sponsor');
  }

  public function sponsorPdf()
  {

    $data['title'] = 'LAPORAN DATA SPONSOR<br>TOUR DE LOKSADO 2022';
    $data['sponsor'] = $this->db->get('sponsor')->result_array();
    $data['pdfName'] = 'Laporan Data Sponsor Tour de Loksado 2022.pdf';

    $this->load->view('sponsor/sponsor-pdf', $data);
  }
}
