<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dinkes extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('M_Data_Puskesmas');
      $this->load->model('M_Dinkes');
      $this->load->model('DataLB1_model');
      $this->load->helper(array('form', 'url'));
    }
    public function header()
    {
      $result = $this->M_Dinkes->notif();
      $data['notif'] = count($result);
      $data['data_notif'] = $result;
      $this->load->view('header/d_header', $data);
    }
    public function dt_laporan()
    {
      $data['dt_laporan'] = $this->M_Dinkes->dt_laporan();
      $this->header();
      $this->load->view('dinkes/data_laporan', $data);
      $this->load->view('footer/d_footer');
    }
    public function dashboard()
    {
      $this->header();
      $this->load->view('dinkes/dashboard_dinkes');
      $this->load->view('footer/d_footer');
    }
    function tampilPuskesmas(){
      $data['puskesmas'] = $this->M_Data_Puskesmas->tampil_puskesmas()->result();
      $this->header();
      $this->load->view('dinkes/data_puskesmas', $data);
      $this->load->view('footer/d_footer');
    }
    function addPuskesmas()
    {
      $kd_puskesmas = $this->input->post('kd_puskesmas');
      $nama_puskesmas = $this->input->post('nama_puskesmas');
      $kecamatan = $this->input->post('kecamatan');
      $kota = $this->input->post('kota');

      $data = array(
        'kd_puskesmas' => $kd_puskesmas,
        'nama_puskesmas' => $nama_puskesmas,
        'kecamatan' => $kecamatan,
        'kota' => $kota,
      );
      $this->M_Data_Puskesmas->insert_puskesmas($data, 'data_puskesmas');
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect('dinkes/tampilPuskesmas');
    }
    function tampilEdit($kd)
    {
      $where = array('kd_puskesmas' => $kd);
      $data['editPuskesmas'] = $this->M_Data_Puskesmas->getPuskesmas($where, 'data_puskesmas')->result();
      $this->header();
      $this->load->view('dinkes/edit_puskesmas', $data); 
      $this->load->view('footer/d_footer');
    }
    function editPuskesmas()
    {
      $kd_puskesmas = $this->input->post('kd_puskesmas');
      $nama_puskesmas = $this->input->post('nama_puskesmas');
      $kecamatan = $this->input->post('kecamatan');
      $kota = $this->input->post('kota');

      $data = array(
        'kd_puskesmas' => $kd_puskesmas,
        'nama_puskesmas' => $nama_puskesmas,
        'kecamatan' => $kecamatan,
        'kota' => $kota,
      );
      $where = array('kd_puskesmas'=>$kd_puskesmas);
      $this->M_Data_Puskesmas->update_puskesmas($where, $data, 'data_puskesmas');
      $this->session->set_flashdata('update', 'Data berhasil diupdate');
      redirect('dinkes/tampilPuskesmas');
    }
    public function hapus_Puskesmas($kd)
    {
      $where = array('kd_puskesmas' => $kd);
      $this->M_Data_Puskesmas->deletePuskesmas($where, 'data_puskesmas');
      $this->session->set_flashdata('flash', 'Data berhasil dihapus');
      redirect('dinkes/tampilPuskesmas');
    }
    public function monitoringLB1()
    {
      $data['puskesmas'] = $this->M_Data_Puskesmas->tampil_puskesmas()->result();
      $data['monitoring'] = $this->M_Dinkes->monitoringLB();
      $this->header();
      $this->load->view('dinkes/monitoring_LB1', $data); 
      $this->load->view('footer/d_footer');
    }
    public function laporanDinkes()
    {
      $data['status'] = $this->M_Dinkes->tampilLB();
      $this->header();
      $this->load->view('dinkes/laporan_masukdinkes', $data); 
      $this->load->view('footer/d_footer');
    }
    public function detailLBdinkes($id)
    {
      $data['detail'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('dinkes/detail_laporandinkes', $data);
      $this->load->view('footer/d_footer');
    }
    public function detailPenyBulan($id)
    {
      $data['peny_bln'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('dinkes/detail_PenyBulan', $data);
      // $this->load->view('footer/d_footer');
    }
    public function detailPenyTri($id)
    {
      $data['peny_tri'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('dinkes/detail_PenyTri', $data);
      $this->load->view('footer/d_footer');
    }
    public function detailPenyThn($id)
    {
      $data['peny_thn'] = $this->DataLB1_model->getDataLB1($id);
      $this->header();
      $this->load->view('dinkes/detail_PenyThn', $data);
      $this->load->view('footer/d_footer');
    }
    public function accLB1($id)
    {
      if (isset($_POST['acc'])) {
        $status = array('status' => 3);
      }
      $where = array('id_laporan' => $id);
      $this->DataLB1_model->updateLB($status, $where);
      redirect('dinkes/laporanDinkes');
    }
    public function sendMessage($id)
    {
      if (isset($_POST['acc'])) {
        $data = array('pesan' => 5);
        $data['tanggal'] = $this->input->post('tanggal');
        $data['waktu'] = $this->input->post('waktu');
        $where = array('id_laporan' => $id);
        $this->M_Dinkes->sendMonitor($data, $where);
      }
      redirect('dinkes/monitoringLB1');
    }
    public function evaluasiLB1($id){
      if (isset($_POST['acc'])) {
        $st = $this->input->post('status');
        if ($st == 'Terima') {
          $status['status'] = 3;
          $status['ket'] = $this->input->post('ket');
          $where = array('id_laporan' => $id);
          $this->DataLB1_model->updateLB($status, $where);
        }elseif ($st == 'Tolak') {
          $status['status'] = 4;
          $status['ket'] = $this->input->post('ket');
          $where = array('id_laporan' => $id);
          $this->DataLB1_model->updateLB($status, $where);
        }
      }
      redirect('dinkes/laporanDinkes');
    }
    public function dataLB1_dinkes($id)
    { 
      $dt = $this->M_Dinkes->getLB1bulan($id);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $data['lbbulan'] = $this->M_Dinkes->getLB1bulan($id);
        $this->header();
        $this->load->view('dinkes/laporan_bulananDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lbbulan'] = $this->M_Dinkes->getLB1bulan($id);
        $this->header();
        $this->load->view('dinkes/laporan_bulananDinkes', $data);
        $this->load->view('footer/d_footer');
      }
    }
    public function filterDataLB1()
    {
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $dt = $this->M_Dinkes->CetakBulan($bulan, $tahun);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $data['lbbulan'] = $this->M_Dinkes->CetakBulan($bulan, $tahun);
        $this->header();
        $this->load->view('dinkes/laporan_bulananDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lbbulan'] = $this->M_Dinkes->CetakBulan($bulan, $tahun);
        $this->header();
        $this->load->view('dinkes/laporan_bulananDinkes', $data);
        $this->load->view('footer/d_footer');
      }
    }
    public function tribulanLB1_dinkes()
    {
      $dt = $this->M_Dinkes->getLBtribulan();
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Tribulan(LB1) belum tersedia');
        $data['lb_tribulan'] = $this->M_Dinkes->getLBtribulan();
        $this->header();
        $this->load->view('dinkes/laporan_tribulanDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lb_tribulan'] = $this->M_Dinkes->getLBtribulan();
        $this->header();
        $this->load->view('dinkes/laporan_tribulanDinkes', $data);
        $this->load->view('footer/d_footer');
      }
    }
    public function filterTriLB1()
    {
      $tribulan = $this->input->post('tribulan');
      $tahun = $this->input->post('tahun');
      $dt = $this->M_Dinkes->CetakTribulan($tribulan, $tahun);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Tribulan(LB1) belum tersedia');
        $data['lb_tribulan'] = $this->M_Dinkes->CetakTribulan($tribulan, $tahun);
        $this->header();
        $this->load->view('dinkes/laporan_tribulanDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lb_tribulan'] = $this->M_Dinkes->CetakTribulan($tribulan, $tahun);
        $this->header();
        $this->load->view('dinkes/laporan_tribulanDinkes', $data);
        $this->load->view('footer/d_footer');
      }
    }
    public function rekapLB1_dinkes()
    {
      $dt = $this->M_Dinkes->getLBtahun();
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Tahunan(LB1) belum tersedia');
        $data['lb_tahun'] = $this->M_Dinkes->getLBtahun();
        $this->header();
        $this->load->view('dinkes/laporan_tahunanDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lb_tahun'] = $this->M_Dinkes->getLBtahun();
        $this->header();
        $this->load->view('dinkes/laporan_tahunanDinkes', $data);
        $this->load->view('footer/d_footer');
      }
    }
    public function filterRekap()
    {
      $tahun = $this->input->post('tahun');
      $dt = $this->M_Dinkes->CetakTahun($tahun);
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Tahunan(LB1) belum tersedia');
        $data['lb_tahun'] = $this->M_Dinkes->CetakTahun($tahun);
        $this->header();
        $this->load->view('dinkes/laporan_tahunanDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lb_tahun'] = $this->M_Dinkes->CetakTahun($tahun);
        $this->header();
        $this->load->view('dinkes/laporan_tahunanDinkes', $data);
        $this->load->view('footer/d_footer');
      }
    }
    public function viewCetakBln()
    {
      $this->header();
      $this->load->view('dinkes/view_cetakBulan');
      $this->load->view('footer/d_footer');
    }
    public function viewCetakTribln()
    {
      $this->header();
      $this->load->view('dinkes/view_cetakTribulan');
      $this->load->view('footer/d_footer');
    }
    public function viewCetakThn()
    {
      $this->header();
      $this->load->view('dinkes/view_cetakTahun');
      $this->load->view('footer/d_footer');
    }
}