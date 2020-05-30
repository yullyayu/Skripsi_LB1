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
    function tampilPuskesmas(){
      $data['puskesmas'] = $this->M_Data_Puskesmas->tampil_puskesmas()->result();
      $this->load->view('header/d_header');
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
      redirect('dinkes/tampilPuskesmas');
    }
    function tampilEdit($kd)
    {
      $where = array('kd_puskesmas' => $kd);
      $data['editPuskesmas'] = $this->M_Data_Puskesmas->getPuskesmas($where, 'data_puskesmas')->result();
      $this->load->view('header/d_header');
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
      redirect('dinkes/tampilPuskesmas');
    }
    public function hapus_Puskesmas($kd)
    {
      $where = array('kd_puskesmas' => $kd);
      $this->M_Data_Puskesmas->deletePuskesmas($where, 'data_puskesmas');
      redirect('dinkes/tampilPuskesmas');
    }
    public function monitoringLB1()
    {
      $data['monitoring'] = $this->M_Dinkes->monitoringLB();
      // $tgl = 5;
      // $tgl = date('d');
      $this->load->view('header/d_header');
      $this->load->view('dinkes/monitoring_LB1', $data); 
      $this->load->view('footer/d_footer');
    }
    public function laporanDinkes()
    {
      $data['status'] = $this->M_Dinkes->tampilLB();
      $this->load->view('header/d_header');
      $this->load->view('dinkes/laporan_masukdinkes', $data); 
      $this->load->view('footer/d_footer');
    }
    public function detailLBdinkes($id)
    {
      $data['detail'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/d_header');
      $this->load->view('dinkes/detail_laporandinkes', $data);
      $this->load->view('footer/d_footer');
    }
    public function detailPenyBulan($id)
    {
      $data['peny_bln'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/d_header');
      $this->load->view('dinkes/detail_PenyBulan', $data);
      // $this->load->view('footer/d_footer');
    }
    public function detailPenyTri($id)
    {
      $data['peny_tri'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/d_header');
      $this->load->view('dinkes/detail_PenyTri', $data);
      $this->load->view('footer/d_footer');
    }
    public function detailPenyThn($id)
    {
      $data['peny_thn'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/d_header');
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
    public function dataLB1_dinkes()
    {
      $data['lbbulan'] = $this->M_Dinkes->getLB1bulan();
      $this->load->view('header/d_header');
      $this->load->view('dinkes/laporan_bulananDinkes', $data);
      $this->load->view('footer/d_footer');
    }
    public function tribulanLB1_dinkes()
    {
      $data['lb_tribulan'] = $this->M_Dinkes->getLBtribulan();
      $this->load->view('header/d_header');
      $this->load->view('dinkes/laporan_tribulanDinkes', $data);
      $this->load->view('footer/d_footer');
    }
    public function rekapLB1_dinkes()
    {
      $data['lb_tahun'] = $this->M_Dinkes->getLBtahun();
      $this->load->view('header/d_header');
      $this->load->view('dinkes/laporan_tahunanDinkes', $data);
      $this->load->view('footer/d_footer');
    }
    public function viewCetakBln()
    {
      $this->load->view('header/d_header');
      $this->load->view('dinkes/view_cetakBulan');
      $this->load->view('footer/d_footer');
    }
    public function viewCetakTribln()
    {
      $this->load->view('header/d_header');
      $this->load->view('dinkes/view_cetakTribulan');
      $this->load->view('footer/d_footer');
    }
    public function viewCetakThn()
    {
      $this->load->view('header/d_header');
      $this->load->view('dinkes/view_cetakTahun');
      $this->load->view('footer/d_footer');
    }
}