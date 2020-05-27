<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('login');
    }
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
          $this->load->view('header/rm_header');
          $this->load->view('rekam_medis/dashboard_rm');
          $this->load->view('footer/rm_footer');
      }else{
          echo "Access Denied";
      }

  }

  function lb1(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      $this->load->view('header/lb_header');
      $this->load->view('laporan_bulanan/dashboard_lb1');
      $this->load->view('footer/lb_footer');
    }else{
        echo "Access Denied";
    }
  }

  function kepala(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/dashboard_kp');
      $this->load->view('footer/kp_footer');
    }else{
        echo "Access Denied";
    }
  }

  function dinkes(){
    if($this->session->userdata('level')==='4'){
      $this->load->view('header/d_header');
      $this->load->view('dinkes/dashboard_dinkes');
      $this->load->view('footer/d_footer');
    }else{
      echo "Succses";
    }
  }

}
