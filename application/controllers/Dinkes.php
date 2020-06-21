<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dinkes extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('M_Data_Puskesmas');
      $this->load->model('M_Dinkes');
      $this->load->model('DataLB1_model');
      $this->load->model('Login_model');
      $this->load->helper(array('form', 'url'));
    }
    public function header()
    {
      $data['puskesmas'] = $this->M_Data_Puskesmas->tampil_puskesmas()->result();
      $data['user'] = $this->Login_model->get()->result();
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
    public function data_penyakit()
    {
      $data['kp'] = $this->DataLB1_model->getKategoriPeny()->result();
      $data['penyakit'] = $this->DataLB1_model->get()->result();
      $this->header();
      $this->load->view('dinkes/data_penyakitDin', $data); 
      $this->load->view('footer/d_footer');
    }
    public function tambahPenyakit()
    {
      $kode_icdx = $this->input->post('kode_icdx');
      $data = $this->DataLB1_model->getPeny($kode_icdx);
      if ($data->num_rows() > 0) {
        $this->session->set_flashdata('flash', 'Data tersedia pada database');
        redirect('dinkes/data_penyakit');
      }else {
        $kode_dx = $this->input->post('kode_dx');
        $kode_icdx = $this->input->post('kode_icdx');
        $nama_penyakit = $this->input->post('nama_penyakit');
        $data = array(
        'kode_dx' => $kode_dx,
        'kode_icdx' => $kode_icdx,
        'nama_penyakit' => $nama_penyakit,
      );
      $this->DataLB1_model->addPenyakit($data, 'data_penyakit');
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect('dinkes/data_penyakit');
      }
    }
    public function tambahKategori()
    {
      $kode_dx = $this->input->post('kode_dx');
      $data = $this->DataLB1_model->getKP($kode_dx);
      if ($data->num_rows() > 0) {
        $this->session->set_flashdata('flash', 'Data tersedia pada database');
        redirect('dinkes/data_penyakit');
      }else {
        $kode_dx = $this->input->post('kode_dx');
        $kategori_penyakit = $this->input->post('kategori_penyakit');
        $data = array(
        'kode_dx' => $kode_dx,
        'kategori_penyakit' => $kategori_penyakit,
      );
      $this->DataLB1_model->addPenyakit($data, 'kategori_penyakit');
      $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
      redirect('dinkes/data_penyakit');
      }
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
      $data = $this->M_Dinkes->monitoringLB();
      $jenisLaporan = $data['jenisLaporan'];
      $detailLaporan = $data['detailLaporan'];
      $st = [];
      foreach ($jenisLaporan as $key => $dt) {
        $st[$key] = (object)[];
        $st[$key]->status = [];
        foreach ($detailLaporan as $ki => $dl) {
          if ($dt->id_jp == $dl->id_jp) {
            $st[$key]->status[0] = (object)[];
            $st[$key]->status[0]->Sudah = (object)[];
            $st[$key]->status[0]->Belum = (object)[];
            $st[$key]->status[0]->Sudah = null;
            $st[$key]->status[0]->Belum = null;
          }
        }
        $st[$key]->id_jp = $dt->id_jp;
        $st[$key]->nama_laporan = $dt->nama_laporan;
      }
      foreach ($jenisLaporan as $key => $dt) {
        foreach ($detailLaporan as $ki => $dl) {
          if ($dt->id_jp == $dl->id_jp){
            if ($dl->status == 2 || $dl->status == 3) {
              $st[$key]->status[0]->Sudah = 1;
            }else {
              $st[$key]->status[0]->Belum = 2;
            }
            unset($detailLaporan[$ki]);
          }
        }
        # code...
      }
      $this->header();
      $this->load->view('dinkes/monitoring_LB1', ['data' => $st]); 
      $this->load->view('footer/d_footer');
    }
    public function FilterMonitor()
    {
      $bulan = $this->input->post('bulan');
      $tahun = $this->input->post('tahun');
      $data = $this->M_Dinkes->FilterMonitoring($bulan, $tahun);
      $jenisLaporan = $data['jenisLaporan'];
      $detailLaporan = $data['detailLaporan'];
      $st = [];
      foreach ($jenisLaporan as $key => $dt) {
        $st[$key] = (object)[];
        $st[$key]->status = [];
        foreach ($detailLaporan as $ki => $dl) {
          if ($dt->id_jp == $dl->id_jp) {
            $st[$key]->status[0] = (object)[];
            $st[$key]->status[0]->Sudah = (object)[];
            $st[$key]->status[0]->Belum = (object)[];
            $st[$key]->status[0]->Sudah = null;
            $st[$key]->status[0]->Belum = null;
          }
        }
        $st[$key]->id_jp = $dt->id_jp;
        $st[$key]->nama_laporan = $dt->nama_laporan;
      }
      foreach ($jenisLaporan as $key => $dt) {
        foreach ($detailLaporan as $ki => $dl) {
          if ($dt->id_jp == $dl->id_jp){
            if ($dl->status == 2 || $dl->status == 3) {
              $st[$key]->status[0]->Sudah = 1;
            }else {
              $st[$key]->status[0]->Belum = 2;
            }
            unset($detailLaporan[$ki]);
          }
        }
        # code...
      }
      $this->header();
      $this->load->view('dinkes/monitoring_LB1', ['data' => $st]); 
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
      $data['detail'] = $this->DataLB1_model->getData($id);
      $this->header();
      $this->load->view('dinkes/detail_laporandinkes', $data);
      $this->load->view('footer/d_footer');
    }
    public function detailPenyBulan($id)
    {
      $data['peny_bln'] = $this->DataLB1_model->getData($id);
      $this->header();
      $this->load->view('dinkes/detail_PenyBulan', $data);
      // $this->load->view('footer/d_footer');
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
      $data['peny_tri'] = $this->DataLB1_model->getDataLB1($id, $month, $year);
      $data['nama_bulan'] = $bulan;
      $data['nama_tahun'] = $year;
      $this->header();
      $this->load->view('dinkes/detail_Penytri', $data);
      $this->load->view('footer/d_footer');
    }
    public function detailPenyThn($id)
    {
      $data['peny_thn'] = $this->DataLB1_model->getData($id);
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
        $data['id_jp'] = $this->input->post('id_jp');
        $data['nama_laporan'] = $this->input->post('nama_laporan');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['waktu'] = $this->input->post('waktu');
        // $where = array('id_laporan' => $id);
        $this->M_Dinkes->sendMonitor($data, 'monitoring');
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
    public function dataLB1_bulan()
    { 
      $dt = $this->M_Dinkes->getLB1();
      if ($dt == null) {
        $this->session->set_flashdata('flash', 'Data Laporan Bulanan(LB1) belum tersedia');
        $data['lbbulan'] = $this->M_Dinkes->getLB1();
        $this->header();
        $this->load->view('dinkes/laporan_bulananDinkes', $data);
        $this->load->view('footer/d_footer');
      }else {
        $data['lbbulan'] = $this->M_Dinkes->getLB1();
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