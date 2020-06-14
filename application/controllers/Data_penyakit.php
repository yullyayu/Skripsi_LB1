<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_penyakit extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('M_Penyakit_banyak');
      $this->load->model('M_Kepala_puskesmas');
      $this->load->model('DataLB1_model');
      $this->load->model('M_Dinkes');
      $this->load->helper(array('form', 'url'));
    }
    public function header() {
        if ($this->session->userdata('level') == '2') {
            $pesan = $this->DataLB1_model->pesan();
            $data['pesan'] = count($pesan);
            $data['data_pesan'] = $pesan;
            $result = $this->DataLB1_model->notif();
            $data['notif'] = count($result);
            $data['data_notif'] = $result;
            $this->load->view('header/lb_header', $data);
        } elseif ($this->session->userdata('level') == '3') {
            $result = $this->M_Kepala_puskesmas->notif();
            $data['notif'] = count($result);
            $data['data_notif'] = $result;
            $this->load->view('header/kp_header', $data);
        } elseif ($this->session->userdata('level') == '4') {
            $result = $this->M_Dinkes->notif();
            $data['notif'] = count($result);
            $data['data_notif'] = $result;
            $this->load->view('header/d_header', $data);
        } 
    }
    public function getJum_Penyakit()
    {
        $data = $this->M_Penyakit_banyak->showPenyakit();
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rm) {
                foreach ($laporanlb1 as $lab => $lb) {
                    if ($peny->kode_icdx == $rm->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx){ 
                        $pen[$key]->pasien[0] = (object)[];
                        $pen[$key]->pasien[0]->Perempuan = (object)[];
                        $pen[$key]->pasien[0]->Laki = (object)[];
                        $pen[$key]->pasien[0]->Perempuan = 0;
                        $pen[$key]->pasien[0]->Laki = 0;
                    }          
                }
            }
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit;
        }
        foreach ($penyakit as $key => $peny) {
            foreach ($rekamMedis as $ki => $rm) {
                    if ($peny->kode_icdx == $rm->kode_penyakit) {
                        if ($rm->jenis_kelamin == 'Laki-laki') {
                            $pen[$key]->pasien[0]->Laki += 1;
                        }else {
                            $pen[$key]->pasien[0]->Perempuan += 1;
                        }
                        unset($rekamMedis[$ki]);
                    }
            }
            foreach ($laporanlb1 as $lab => $lb) {
                if($peny->kode_icdx == $lb->kode_icdx){
                    if ($lb->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[0]->Laki += 1;
                    }else {
                        $pen[$key]->pasien[0]->Perempuan +=1;
                    }
                    unset($laporanlb1[$lab]);     
                }
            }
        }
        $this->header();
        $this->load->view('laporan_bulanan/penyakit_terbanyakbln', ['data' => $pen]);
        // $this->load->view('footer/lb_footer');
    }
    public function getRekap_Penyakit()
    {
        $data = $this->M_Penyakit_banyak->PenyKumulatif();
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rm) {
                foreach ($laporanlb1 as $lab => $lb) {
                    if ($peny->kode_icdx == $rm->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx){ 
                        for ($x=0; $x < 12; $x++) { 
                            $pen[$key]->pasien[$x] = (object)[];
                            $pen[$key]->pasien[$x]->Perempuan = (object)[];
                            $pen[$key]->pasien[$x]->Laki = (object)[];
                            $pen[$key]->pasien[$x]->Perempuan = 0;
                            $pen[$key]->pasien[$x]->Laki = 0;
                        }
                    }          
                }
            }
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit;
        }
        foreach ($penyakit as $key => $peny) {
            foreach ($rekamMedis as $ki => $rm) {
                if ($peny->kode_icdx == $rm->kode_penyakit) {
                    // $lb->tanggal = Date('m');
                        if ($rm->jenis_kelamin == 'Laki-laki') {
                            // $pen[$key]->pasien[$rm->tanggal - 1]->Laki += 1;
                            $pen[$key]->pasien[$rm->bulan - 1]->Laki += 1;
                        }else {
                            // $pen[$key]->pasien[$rm->tanggal - 1]->Perempuan += 1;
                            $pen[$key]->pasien[$rm->bulan - 1]->Perempuan += 1;
                        }
                        unset($rekamMedis[$ki]);
                }
            }
            foreach ($laporanlb1 as $lab => $lb) {
                if($peny->kode_icdx == $lb->kode_icdx){
                    // $lb->tanggal = Date('m');
                        if ($lb->jenis_kelamin == 'Laki-laki') {
                            // $pen[$key]->pasien[$lb->tanggal - 1]->Laki += 1;
                            $pen[$key]->pasien[$lb->bulan - 1]->Laki += 1;
                        }else {
                            // $pen[$key]->pasien[$lb->tanggal - 1]->Perempuan +=1;
                            $pen[$key]->pasien[$lb->bulan - 1]->Perempuan +=1;
                        }
                        unset($laporanlb1[$lab]);  
                    }
            }
        }
        // print_r($pen);
        $this->header();
        $this->load->view('laporan_bulanan/penyakit_kumulatif', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
        // echo json_encode($data['rekamMedis']);
        // echo json_encode($pen);
    }
    public function filterBulan()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data = $this->M_Penyakit_banyak->getFilterbln($bulan, $tahun);
        $penyakit = $data['dataPenyakit'];
        $rekamMedis = $data['rekamMedis'];
        $laporanlb1 = $data['laporanlb1'];
        $pen = [];
        foreach ($penyakit as $key => $peny) {
            $pen[$key] = (object)[];
            $pen[$key]->pasien = [];
            foreach ($rekamMedis as $ki => $rm) {
                foreach ($laporanlb1 as $lab => $lb) {
                    if ($peny->kode_icdx == $rm->kode_penyakit || $peny->kode_icdx == $lb->kode_icdx){ 
                        $pen[$key]->pasien[0] = (object)[];
                        $pen[$key]->pasien[0]->Perempuan = (object)[];
                        $pen[$key]->pasien[0]->Laki = (object)[];
                        $pen[$key]->pasien[0]->Perempuan = 0;
                        $pen[$key]->pasien[0]->Laki = 0;
                    }          
                }
            }
            $pen[$key]->kode_dx = $peny->kode_dx;
            $pen[$key]->kode_icdx = $peny->kode_icdx;
            $pen[$key]->nama_penyakit = $peny->nama_penyakit;
        }
        foreach ($penyakit as $key => $peny) {
            foreach ($rekamMedis as $ki => $rm) {
                    if ($peny->kode_icdx == $rm->kode_penyakit) {
                        if ($rm->jenis_kelamin == 'Laki-laki') {
                            $pen[$key]->pasien[0]->Laki += 1;
                        }else {
                            $pen[$key]->pasien[0]->Perempuan += 1;
                        }
                        unset($rekamMedis[$ki]);
                    }
            }
            foreach ($laporanlb1 as $lab => $lb) {
                if($peny->kode_icdx == $lb->kode_icdx){
                    if ($lb->jenis_kelamin == 'Laki-laki') {
                        $pen[$key]->pasien[0]->Laki += 1;
                    }else {
                        $pen[$key]->pasien[0]->Perempuan +=1;
                    }
                    unset($laporanlb1[$lab]);     
                }
            }
        }
        $this->header();
        $this->load->view('laporan_bulanan/penyakit_terbanyakbln',['data' => $pen]);

    }
    public function getGrafikLB1()
    {
        $month = [1,2,3];
        $year = date('Y');
        $bulan = ['Januri','Februari','Maret'];
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
        $data['data_peny'] = $this->M_Penyakit_banyak->getGrafik($month, $year);
        $data['nama_bulan'] = $bulan;
        $data['nama_tahun'] = $year;
        $this->header();
        $this->load->view('laporan_bulanan/grafik_penyakit', $data);
        $this->load->view('footer/lb_footer');
    }
    public function dataPeny_kpl()
    {
        $dt = $this->M_Kepala_puskesmas->getPenybulan();
        if($dt == null) {
            $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Bulanan belum tersedia');
            $this->header();
            $this->load->view('kepala_puskesmas/penyakit_blnKP');
            $this->load->view('footer/kp_footer');
        }else{
            $data['peny_bulan'] = $this->M_Kepala_puskesmas->getPenybulan();
            $this->header();
            $this->load->view('kepala_puskesmas/penyakit_blnKP', $data);
            $this->load->view('footer/kp_footer');
        }
    }
    public function dataPenyTri_kpl()
    {
        $data['lb_tribulan'] = $this->M_Kepala_puskesmas->getPenyTri();
        $this->header();
        $this->load->view('kepala_puskesmas/grafik_penyakitKP', $data);
        $this->load->view('footer/kp_footer');
    }
    public function dataPenyThn_kpl()
    {
        $data['peny_tahun'] = $this->M_Kepala_puskesmas->getPenyThn();
        $this->header();
        $this->load->view('kepala_puskesmas/penyakit_kumulatifKP', $data);
        $this->load->view('footer/kp_footer');
    }
    public function filterPeny_kpl()
    {
        $data['daftarBulan'] = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November", "Desember");
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $dt = $this->M_Kepala_puskesmas->filterPeny_bln($bulan, $tahun);
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Tribulan belum tersedia');
            $this->header();
            $this->load->view('kepala_puskesmas/penyakit_blnKP');
            $this->load->view('footer/kp_footer');
        }else {
            $data['peny_bulan'] = $this->M_Kepala_puskesmas->filterPeny_bln($bulan, $tahun);
            $this->header();
            $this->load->view('kepala_puskesmas/penyakit_blnKP', $data);
            $this->load->view('footer/kp_footer');
        }
    }
    public function getGrafikLB1Kepala()
    {
        $month = [1,2,3];
        $year = date('Y');
        $bulan = ['Januri','Februari','Maret'];
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
        $dt = $this->M_Kepala_puskesmas->getPenyTri($month, $year);
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Tribulan belum tersedia');
            $this->header();
            $this->load->view('kepala_puskesmas/grafik_penyakitKP');
            $this->load->view('footer/kp_footer');
        }else {
            $data['grafik_kpl'] = $this->M_Kepala_puskesmas->getPenyTri($month, $year);
            $data['nama_bulan'] = $bulan;
            $data['nama_tahun'] = $year;
            $this->header();
            $this->load->view('kepala_puskesmas/grafik_penyakitKP', $data);
            $this->load->view('footer/kp_footer');
        }
    }
    public function dataPeny_din()
    {
        $dt = $this->M_Penyakit_banyak->getPenyDin();
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Bulanan belum tersedia');
            $this->header();
            $this->load->view('dinkes/penyakit_dinkesbln');
            $this->load->view('footer/kp_footer');
        }else {
            $data['peny_bulan'] = $this->M_Penyakit_banyak->getPenyDin();
            $this->header();
            $this->load->view('dinkes/penyakit_dinkesbln', $data);
            $this->load->view('footer/d_footer');
        }
    }
    public function dataPenyTri_din()
    {
        $month = [1,2,3];
        $year = date('Y');
        $bulan = ['Januri','Februari','Maret'];
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
        $dt = $this->M_Penyakit_banyak->getPenyTriDin($month, $year);
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Tribulan belum tersedia');
            $this->header();
            $this->load->view('dinkes/grafik_penyakitdin');
            $this->load->view('footer/d_footer');
        }else {
            $data['nama_bulan'] = $bulan;
            $data['nama_tahun'] = $year;
            $data['lb_tribulan'] = $this->M_Penyakit_banyak->getPenyTriDin($month, $year);
            $this->header();
            $this->load->view('dinkes/grafik_penyakitdin', $data);
            $this->load->view('footer/d_footer');
        }
    }
    public function dataPenyThn_din()
    {
        $dt = $this->M_Penyakit_banyak->getPenyDin();
        if ($dt == null) {
            $this->session->set_flashdata('flash', 'Data 15 Besar Penyakit Kumulutif belum tersedia');
            $this->header();
            $this->load->view('dinkes/penyakit_kumulatifdin');
            $this->load->view('footer/kp_footer');
        }else {
            $data['peny_tahun'] = $this->M_Penyakit_banyak->getPenyThnDin();
            $this->header();
            $this->load->view('dinkes/penyakit_kumulatifdin', $data);
            $this->load->view('footer/d_footer');
        }
    }
    public function filterPenyDin()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['peny_bulan'] = $this->M_Kepala_puskesmas->filterPeny_bln($bulan, $tahun);
        $this->header();
        $this->load->view('kepala_puskesmas/penyakit_blnKP', $data);
        $this->load->view('footer/kp_footer');
    }
    public function getGrafikLB1Dinkes()
    {
        $data['grafik_kpl'] = $this->M_Kepala_puskesmas->getPenyTri();
        $this->header();
        $this->load->view('kepala_puskesmas/grafik_penyakitKP', $data);
        $this->load->view('footer/kp_footer');
    }
    public function sendKP()
    {
      $tanggal = $this->input->post('tanggal');
      $jenis_laporan = $this->input->post('jenis_laporan');
      if ($jenis_laporan == 'Laporan 15 Penyakit Terbanyak Bulanan') {
        $id_jp = 4;
      }elseif ($jenis_laporan == 'Laporan 15 Penyakit Terbanyak Tribulan') {
        $id_jp = 5;
      }elseif ($jenis_laporan == 'Laporan 15 Penyakit Terbanyak Tahunan') {
        $id_jp = 6;
      }
      $nama_puskesmas = $this->input->post('nama_puskesmas');
      $datalb1 = $this->input->post('datalb1');
      $status = 0;

      $data = array(
        'tanggal' => $tanggal,
        'jenis_laporan' => $jenis_laporan,
        'nama_puskesmas' => $nama_puskesmas,
        'status' => $status,
        'id_jp' => $id_jp,
        'datalb1' => $datalb1,
      );
      $this->DataLB1_model->sendKP($data, 'detail_laporan');
      if ($id_jp == 5) {
        redirect('data_penyakit/getGrafikLB1');
      }else {
        redirect('data_penyakit/getJum_Penyakit');
      }
    }
}