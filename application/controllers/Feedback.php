<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Feedback extends CI_Controller
{
  public function index()
  {
    $data['title'] = 'Cyclist Feedback';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    $data['cyclistFeedback'] = $this->db->get('cyclist_feedback_view')->result_array();
    $data['total_rows'] = $this->db->get('cyclist_feedback_view')->num_rows();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('feedback/index', $data);
    $this->load->view('templates/footer');
  }

  public function cyclistFeedbackPdf()
  {
    $data['title'] = 'LAPORAN DATA EVALUASI PESEPEDA<br>TOUR DE LOKSADO 2022';
    $data['cyclistFeedback'] = $this->db->get('cyclist_feedback_view')->result_array();
    $data['pdfName'] = 'Laporan Data Evaluasi Pesepeda Tour de Loksado 2022.pdf';

    $this->load->view('feedback/cyclist-feedback-pdf', $data);
  }
}