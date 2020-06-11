<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rekam_medis extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('RekamMedis_model');
    }
    function index(){
        $this->load->view('header/rm_header');
        $this->load->view('rekam_medis/form_register');
        $this->load->view('footer/rm_footer');
    }
    public function dashboard()
    {
      $this->load->view('header/rm_header');
      $this->load->view('rekam_medis/dashboard_rm');
      $this->load->view('footer/rm_footer');
    }
    public function formRegister()
    {
      $no_register = $this->input->post('no_register');
      $data = $this->RekamMedis_model->get($no_register);
      if ($data->num_rows() > 0) {
        $this->session->set_flashdata('flash', 'Data tersedia pada database');
        redirect('rekam_medis/index');
      } else {
      $no_register = $this->input->post('no_register');
      $tanggal = $this->input->post('tanggal');
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $umur = $this->input->post('umur');
      $jenis_umur = $this->input->post('jenis_umur');
      $id_umr='';
      if ($jenis_umur == 'Hari') {
        if ($umur >= 0 && $umur <=7) {
          $id_umr = 1;
        }elseif ($umur >= 8 && $umur <=28) {
          $id_umr = 2 ; 
        }elseif ($umur >= 29) {
          $id_umr = 3 ; 
        }
      }elseif ($jenis_umur == 'Tahun') {
        if ($umur >= 1 && $umur <=4) {
          $id_umr = 4;
        }elseif ($umur >= 5 && $umur <=9) {
          $id_umr = 5;
        }elseif ($umur >= 10 && $umur <=14) {
          $id_umr = 6;
        }elseif ($umur >= 15 && $umur <=19) {
          $id_umr = 7;
        }elseif ($umur >= 20 && $umur <=44) {
          $id_umr = 8;
        }elseif ($umur >= 45 && $umur <=54) {
          $id_umr = 9;
        }elseif ($umur >= 55 && $umur <=59) {
          $id_umr = 10;
        }elseif ($umur >= 60 && $umur <=69) {
          $id_umr = 11;
        }elseif ($umur >= 70) {
          $id_umr = 12;
        }
      }
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $jenis_pekerjaan = $this->input->post('jenis_pekerjaan');
      $kode_penyakit = $this->input->post('kode_penyakit');
      
      $terapi = $this->input->post('terapi');
      $no_bpjs = $this->input->post('no_bpjs');
      $dalam_wilayah = "";
      if ($this->input->post('dalam_wilayah') == 'Baru'){
        $dalam_wilayah = $this->input->post('dalam_wilayah');
      }elseif ($this->input->post('dalam_wilayah') == 'Lama') {
        $dalam_wilayah = $this->input->post('dalam_wilayah');
      }elseif ($this->input->post('dalam_wilayah') == 'KKL') {
        $dalam_wilayah = $this->input->post('dalam_wilayah');
      }else {
        $dalam_wilayah = "-";
      }
      $luar_wilayah = "";
      if ($this->input->post('luar_wilayah') == 'Baru'){
        $luar_wilayah = $this->input->post('luar_wilayah');
      }elseif ($this->input->post('luar_wilayah') == 'Lama') {
        $luar_wilayah = $this->input->post('luar_wilayah');
      }elseif($this->input->post('luar_wilayah') == 'KKL'){
        $luar_wilayah = $this->input->post('luar_wilayah');
      }else {
        $luar_wilayah = "-";
      }
           
      $data = array(
        'no_register' => $no_register,
        'tanggal' => $tanggal,
        'nama' => $nama,
        'alamat' => $alamat,
        'umur' => $umur,
        'id_umr' => $id_umr,
        'jenis_umur' => $jenis_umur,
        'jenis_kelamin' => $jenis_kelamin,
        'jenis_pekerjaan' => $jenis_pekerjaan,
        'kode_penyakit' => $kode_penyakit,
        'terapi' => $terapi,
        'no_bpjs' => $no_bpjs,
        'dalam_wilayah' => $dalam_wilayah,
        'luar_wilayah' => $luar_wilayah,
      );
      $this->RekamMedis_model->insertData($data, 'rekam_medis');
      $this->session->set_flashdata('success', 'Data berhasil tersimpan');
      redirect('rekam_medis/index');
    }
  }
    public function dataRegister()
    {
      $data['rekam_medis'] = $this->RekamMedis_model->tampil_data()->result();
      $this->load->view('header/rm_header');
      $this->load->view('rekam_medis/data_register', $data); 
      $this->load->view('footer/rm_footer');
    }

    public function editRM($no)
    {
      $where = array('no_register' => $no);
      $data['rekam_medis'] = $this->RekamMedis_model->getRegister($where, 'rekam_medis')->result();
      $this->load->view('header/rm_header');
      $this->load->view('rekam_medis/edit_register', $data); 
      $this->load->view('footer/rm_footer');
    }
    public function hapusRegister($no)
    {
      $where = array('no_register' => $no);
      $this->RekamMedis_model->hapus_register($where, 'rekam_medis');
      $this->session->set_flashdata('success', 'Data berhasil dihapus');
      redirect('rekam_medis/dataRegister');
    }

    public function editRegister()
    {
      $no_register = $this->input->post('no_register');
      $nama = $this->input->post('nama');
      $alamat = $this->input->post('alamat');
      $umur = $this->input->post('umur');
      $jenis_kelamin = $this->input->post('jenis_kelamin');
      $jenis_pekerjaan = $this->input->post('jenis_pekerjaan');
      $kode_penyakit = $this->input->post('kode_penyakit');
      $terapi = $this->input->post('terapi');
      $no_bpjs = $this->input->post('no_bpjs');
      $dalam_wilayah = $this->input->post('dalam_wilayah');
      $luar_wilayah = $this->input->post('luar_wilayah');

      $data = array(
        'no_register' => $no_register,
        'nama' => $nama,
        'alamat' => $alamat,
        'umur' => $umur,
        'jenis_kelamin' => $jenis_kelamin,
        'jenis_pekerjaan' => $jenis_pekerjaan,
        'kode_penyakit' => $kode_penyakit,
        'terapi' => $terapi,
        'no_bpjs' => $no_bpjs,
        'dalam_wilayah' => $dalam_wilayah,
        'luar_wilayah' => $luar_wilayah
      );
      $where = array('no_register'=>$no_register);
      $this->RekamMedis_model->updateRegister($where, $data, 'rekam_medis');
      $this->session->set_flashdata('flash', 'Data berhasil diupdate');
      redirect('rekam_medis/dataRegister');
    }
}