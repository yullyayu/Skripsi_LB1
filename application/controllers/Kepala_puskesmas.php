<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kepala_puskesmas extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('DataLB1_model');
      $this->load->model('M_Kepala_puskesmas');
      $this->load->helper(array('form', 'url'));
    }
    public function header()
    {
      $result = $this->M_Kepala_puskesmas->notif();
      $data['notif'] = count($result);
      $data['data_notif'] = $result;
      $this->load->view('header/kp_header', $data);
    }
    public function dashboard()
    {
      $this->header();
      $this->load->view('kepala_puskesmas/dashboard_kp');
      $this->load->view('footer/kp_footer');
    }
    public function laporanKP()
    {
      $data['status'] = $this->DataLB1_model->tampil_status()->result();
      $this->header();
      $this->load->view('kepala_puskesmas/laporan_masukKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function persetujuanLB($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('kepala_puskesmas/detail_laporanKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function detailPenyBln($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('kepala_puskesmas/detail_penyakitBln', $data);
      // $this->load->view('footer/kp_footer');
    }
    public function detailPenyTri($id)
    {
      $tgl = $this->input->post('tanggal');
      $bln = date('m', strtotime($tgl));
      $year = date('Y', strtotime($tgl));
      if ($bln == 1 || $bln == 2 || $bln == 3) {
        $month = [1,2,3];
        $bulan = ['Januri','Februari','Maret'];
      }elseif ($bln == 4 || $bln == 5 || $bln == 6) {
        $month = [4,5,6];
        $bulan = ['April','Mei','Juni'];
      }elseif ($bln == 7 || $bln == 8 || $bln == 9) {
        $month = [7,8,9];
        $bulan = ['Juli','Agustus','September'];
      }elseif ($bln == 10 || $bln == 11 || $bln == 12) {
        $month = [10,11,12];
        $bulan = ['Oktober','November','Desember'];
      }
      $data['status'] = $this->M_Kepala_puskesmas->getDetailTri($id, $month, $year);
      $data['nama_bulan'] = $bulan;
      $data['nama_tahun'] = $year;
      $this->header();
      $this->load->view('kepala_puskesmas/detail_penyakitTribln', $data);
      $this->load->view('footer/kp_footer');
    }
    public function detailPenyThn($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('kepala_puskesmas/detail_penyakitThn', $data);
      $this->load->view('footer/kp_footer');
    }

    public function accLB1($id)
    {
      if (isset($_POST['acc'])) {
        $status = array('status' => 1);
      }
      $where = array('id_laporan' => $id);
      $this->DataLB1_model->updateLB($status, $where);
      redirect('kepala_puskesmas/laporanKP');
    }
    public function catatan($id){
      if (isset($_POST['acc'])) {
          $ket['ket'] = $this->input->post('ket');
          $ket['status'] = 11;
          $where = array('id_laporan' => $id);
          $this->DataLB1_model->updateLB($ket, $where);
      }
      redirect('kepala_puskesmas/laporanKP');
    }
    public function dataLB1_kepala()
    {
      $dt = $this->M_Kepala_puskesmas->getLB1bulan();
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_bulananKP');
        $this->load->view('footer/kp_footer');
      }else {
        $data['lbbulan'] = $this->M_Kepala_puskesmas->getLB1bulan();
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_bulananKP', $data);
        $this->load->view('footer/kp_footer');
      }
    }
    public function tribulanLB1_kepala()
    {
      $month = [1,2,3];
      $year = date('Y');
      $bulan = ['Januari', 'Februari', 'Maret'];
      $dt = $this->M_Kepala_puskesmas->getLBtribulan($month, $year);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tribulanKP');
        $this->load->view('footer/kp_footer');
      }else {
        $data['lb_tribulan'] = $this->M_Kepala_puskesmas->getLBtribulan($month, $year);
        $data['nama_bulan'] = $bulan;
        $data['nama_tahun'] = $year;
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tribulanKP', $data);
        $this->load->view('footer/kp_footer');
      }
    }
    public function rekapLB1_kepala()
    {
      $dt = $this->M_Kepala_puskesmas->getLBtahun();
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Tahunan(LB1) belum tersedia');
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tahunanKP');
        $this->load->view('footer/kp_footer');
      }else {
        $data['lb_tahun'] = $this->M_Kepala_puskesmas->getLBtahun();
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tahunanKP', $data);
        $this->load->view('footer/kp_footer');
      }
    }
    public function filterBulan()
    {
      $data['daftarBulan'] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November", "Desember");
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $dt = $this->M_Kepala_puskesmas->getCetakBulan($bulan, $tahun);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_bulananKP');
        $this->load->view('footer/kp_footer');
      }else {
        $data['lbbulan'] = $this->M_Kepala_puskesmas->getCetakBulan($bulan, $tahun);
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_bulananKP',$data);
        $this->load->view('footer/kp_footer');
      }
    }
    public function filterTribulan()
    {
      if(isset($_POST['triwulan']) && isset($_POST['year'])){
        $triwulan = $_POST['triwulan'];
        $year = $_POST['year'];
        if($triwulan==1){
            $month = [1,2,3];
            $bulan = ['Januri','Februari','Maret'];
        }else if ($triwulan==2){
            $month = [4,5,6];
            $bulan = ['April','Mei','Juni'];
        }else if($triwulan==3){
            $month = [7,8,9];
            $bulan = ['Juli','Agustus','September'];
        }else if($triwulan==4){
            $month = [10,11,12];
            $bulan = ['Oktober','November','Desember'];
        }
      }
      $dt = $this->M_Kepala_puskesmas->getLBtribulan($month, $year);
      if($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Tribulan(LB1) belum tersedia');
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tribulanKP');
        $this->load->view('footer/kp_footer');
      }else{
        $data['lb_tribulan'] = $this->M_Kepala_puskesmas->getLBtribulan($month, $year);
        $data['nama_bulan'] = $bulan;
        $data['nama_tahun'] = $year;
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tribulanKP', $data);
        $this->load->view('footer/kp_footer');
      }
    }
    public function filterTahun()
    {
      $tahun = $this->input->post('tahun');
      $dt = $this->M_Kepala_puskesmas->getCetakTahun($tahun);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tahunanKP');
        $this->load->view('footer/kp_footer');
      }else {
        $data = $this->M_Kepala_puskesmas->getCetakTahun($tahun);
        $this->header();
        $this->load->view('kepala_puskesmas/laporan_tahunanKP', $data);
        $this->load->view('footer/kp_footer');
      }
    }
    public function viewCetakbln()
    {
      $this->header();
      $this->load->view('kepala_puskesmas/view_cetakBulanLB');
      $this->load->view('footer/kp_footer');
    }
    public function viewCetakTribln()
    {
      $this->header();
      $this->load->view('kepala_puskesmas/view_cetakTriblnLB');
      $this->load->view('footer/kp_footer');
    }
    public function viewCetakTahun()
    {
      $this->header();
      $this->load->view('kepala_puskesmas/view_cetakTahunLB');
      $this->load->view('footer/kp_footer');
    }
}