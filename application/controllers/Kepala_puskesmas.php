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
    
    public function laporanKP()
    {
      $data['status'] = $this->DataLB1_model->tampil_status()->result();

      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_masukKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function persetujuanLB($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/detail_laporanKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function detailPenyBln($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/detail_penyakitBln', $data);
      // $this->load->view('footer/kp_footer');
    }
    public function detailPenyTri($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/detail_penyakitTribln', $data);
      $this->load->view('footer/kp_footer');
    }
    public function detailPenyThn($id)
    {
      $data['status'] = $this->DataLB1_model->getDataLB1($id);
      $this->load->view('header/kp_header');
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
    public function dataLB1_kepala()
    {
      $data['lbbulan'] = $this->M_Kepala_puskesmas->getLB1bulan();
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_bulananKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function tribulanLB1_kepala()
    {
      $data['lb_tribulan'] = $this->M_Kepala_puskesmas->getLBtribulan();
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_tribulanKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function rekapLB1_kepala()
    {
      $data['lb_tahun'] = $this->M_Kepala_puskesmas->getLBtahun();
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_tahunanKP', $data);
      $this->load->view('footer/kp_footer');
    }
    public function filterBulan()
    {
      $data['daftarBulan'] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November", "Desember");
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $data['lbbulan'] = $this->M_Kepala_puskesmas->getCetakBulan($bulan, $tahun);
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_bulananKP',$data);
      $this->load->view('footer/kp_footer');
    }
    public function filterTribulan()
    {
      $data['daftarTribulan'] = array("Tribulan 1","Tribulan 2","Tribulan 3", "Tribulan 4");
      $tribulan = $this->input->post('tribulan');
      $tahun = $this->input->post('tahun');
      $data = $this->M_Kepala_puskesmas->getCetakTribulan($tribulan, $tahun);
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_tribulanKP');
      $this->load->view('footer/kp_footer');
    }
    public function filterTahun()
    {
      $tahun = $this->input->post('tahun');
      $data = $this->M_Kepala_puskesmas->getCetakTahun($tahun);
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/laporan_tahunanKP');
      $this->load->view('footer/kp_footer');
    }
    public function viewCetakbln()
    {
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/view_cetakBulanLB');
      $this->load->view('footer/kp_footer');
    }
    public function viewCetakTribln()
    {
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/view_cetakTriblnLB');
      $this->load->view('footer/kp_footer');
    }
    public function viewCetakTahun()
    {
      $this->load->view('header/kp_header');
      $this->load->view('kepala_puskesmas/view_cetakTahunLB');
      $this->load->view('footer/kp_footer');
    }
}