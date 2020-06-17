<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('M_Dinkes');
    $this->load->model('M_Kepala_puskesmas');
    $this->load->model('DataLB1_model');
    $this->load->model('Login_model');
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }
  public function header() {
    if ($this->session->userdata('level') == '2') {
      $data['user'] = $this->Login_model->get()->result();
      $pesan = $this->DataLB1_model->pesan();
      $data['pesan'] = count($pesan);
      $data['data_pesan'] = $pesan;
      $result = $this->DataLB1_model->notif();
      $data['notif'] = count($result);
      $data['data_notif'] = $result;
      $this->load->view('header/lb_header', $data);
    } elseif ($this->session->userdata('level') == '3') {
      $data['user'] = $this->Login_model->get()->result();
      $result = $this->M_Kepala_puskesmas->notif();
      $data['notif'] = count($result);
      $data['data_notif'] = $result;
      $this->load->view('header/kp_header', $data);
    } elseif ($this->session->userdata('level') == '4') {
      $data['user'] = $this->Login_model->get()->result();
      $result = $this->M_Dinkes->notif();
      $data['notif'] = count($result);
      $data['data_notif'] = $result;
      $this->load->view('header/d_header', $data);
    } 
  }

  function index(){
      if($this->session->userdata('level')==='1'){
          $data['user'] = $this->Login_model->get()->result();
          $this->load->view('header/rm_header', $data);
          $this->load->view('rekam_medis/dashboard_rm');
          $this->load->view('footer/rm_footer');
      }else{
          echo "Access Denied";
      }

  }
  function lb1(){
    if($this->session->userdata('level')==='2'){
      $this->header();
      $this->load->view('laporan_bulanan/dashboard_lb1');
      $this->load->view('footer/lb_footer');
    }else{
        echo "Access Denied";
    }
  }
  function kepala(){
    if($this->session->userdata('level')==='3'){
      $this->header();
      $this->load->view('kepala_puskesmas/dashboard_kp');
      $this->load->view('footer/kp_footer');
    }else{
        echo "Access Denied";
    }
  }
  function dinkes(){
    if($this->session->userdata('level')==='4'){
      $this->header();
      $this->load->view('dinkes/dashboard_dinkes');
      $this->load->view('footer/d_footer');
    }else{
      echo "Succses";
    }
  }

}
