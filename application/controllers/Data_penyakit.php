<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_penyakit extends CI_Controller{
    function __construct(){
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('M_Penyakit_banyak');
      $this->load->helper(array('form', 'url'));
    //   $this->load->model('M_Data_Puskesmas');
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
        $this->load->view('header/lb_header');
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
                    $rm->tanggal = Date('m');
                        if ($rm->jenis_kelamin == 'Laki-laki') {
                            $pen[$key]->pasien[$rm->tanggal - 1]->Laki += 1;
                        }else {
                            $pen[$key]->pasien[$rm->tanggal - 1]->Perempuan += 1;
                        }
                        unset($rekamMedis[$ki]);
                }
            }
            foreach ($laporanlb1 as $lab => $lb) {
                if($peny->kode_icdx == $lb->kode_icdx){
                    $lb->tanggal = Date('m');
                        if ($lb->jenis_kelamin == 'Laki-laki') {
                            $pen[$key]->pasien[$lb->tanggal - 1]->Laki += 1;
                        }else {
                            $pen[$key]->pasien[$lb->tanggal - 1]->Perempuan +=1;
                        }
                        unset($laporanlb1[$lab]);  
                    }
            }
        }
        // print_r($pen);
        $this->load->view('header/lb_header');
        $this->load->view('laporan_bulanan/penyakit_kumulatif', ['data' => $pen]);
        $this->load->view('footer/lb_footer');
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
        $this->load->view('header/lb_header');
        $this->load->view('laporan_bulanan/penyakit_terbanyakbln',['data' => $pen]);

    }
    public function getGrafikLB1()
    {
        $this->load->view('header/lb_header');
        $this->load->view('laporan_bulanan/grafik_penyakit');
        $this->load->view('footer/lb_footer');
    }
    public function getJum_PenyakitKepala()
    {
        $this->load->view('header/kp_header');
        $this->load->view('kepala_puskesmas/penyakit_blnKP');
        $this->load->view('footer/kp_footer');
    }
    public function getRekap_PenyakitDinkes()
    {
        $this->load->view('header/kp_header');
        $this->load->view('kepala_puskesmas/penyakit_kumulatifKP');
        $this->load->view('footer/kp_footer');
    }
    public function getGrafikLB1Kepala()
    {
        $this->load->view('header/kp_header');
        $this->load->view('kepala_puskesmas/grafik_penyakitKP');
        $this->load->view('footer/kp_footer');
    }
}