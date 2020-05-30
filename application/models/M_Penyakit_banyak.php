<?php
class M_Penyakit_banyak extends CI_Model{

    public function showPenyakit()
    {
        $bulan = getdate();
        $dataPenyakit = $this->db->select('*')
        ->from('data_penyakit')
        ->order_by('kode_icdx')
        ->limit(15)
        ->get();
        $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.kasus, laporan_lb1.tanggal, d.nama_penyakit,d.kode_icdx, kode_dx')
        ->from('laporan_lb1')
        ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx')
        ->where('month(laporan_lb1.tanggal)', $bulan['mon'])
        ->order_by('laporan_lb1.kode_icdx')
        ->get();
        $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.jenis_kelamin, rekam_medis.dalam_wilayah, rekam_medis.luar_wilayah, rekam_medis.tanggal, d.nama_penyakit,kode_penyakit,kode_dx
                            ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit')
        ->where('month(rekam_medis.tanggal)', $bulan['mon'])
        ->order_by('rekam_medis.kode_penyakit')
        ->get();
        return [
            'dataPenyakit' => $dataPenyakit->result(),
            'rekamMedis' => $rekamMedis->result(),
            'laporanlb1' => $laporanlb1->result(),
        ];
    }
    public function PenyKumulatif()
    {
        $tahun = getdate();
        $dataPenyakit = $this->db->select('*')
        ->from('data_penyakit')
        ->limit(15)
        ->get();
        $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.kasus,kode_icdx, 
        MONTH(tanggal) as bulan')
        ->from('laporan_lb1')
        ->where('year(laporan_lb1.tanggal)', $tahun['year'])
        ->order_by('laporan_lb1.kode_icdx', 'desc')
        ->get();
        $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.jenis_kelamin, rekam_medis.dalam_wilayah, rekam_medis.luar_wilayah, d.nama_penyakit,kode_penyakit,kode_dx,
        MONTH(rekam_medis.tanggal) as bulan')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit')
        ->where('year(rekam_medis.tanggal)', $tahun['year'])
        ->order_by('rekam_medis.kode_penyakit', 'desc')
        ->get();
        return [
            'dataPenyakit' => $dataPenyakit->result(),
            'rekamMedis' => $rekamMedis->result(),
            'laporanlb1' => $laporanlb1->result(),
        ];
    }
    public function getGrafik()
    {
      $bulan = getdate();
      $dataPenyakit = $this->db->select('*')
      ->from('data_penyakit')
      ->order_by('kode_icdx')
      ->limit(15)
      ->get();
      $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.kasus, laporan_lb1.tanggal, laporan_lb1.kode_icdx,')
      ->from('laporan_lb1')
      ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx')
      ->where('month(laporan_lb1.tanggal)', $bulan['mon'])
      ->order_by('laporan_lb1.kode_icdx')
      ->get();
      $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.jenis_kelamin, rekam_medis.dalam_wilayah, rekam_medis.luar_wilayah, rekam_medis.tanggal, d.nama_penyakit,kode_penyakit,kode_dx')
      ->from('rekam_medis')
      ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit')
      ->where('month(rekam_medis.tanggal)', $bulan['mon'])
      ->order_by('rekam_medis.kode_penyakit')
      ->get();
      return [
          'dataPenyakit' => $dataPenyakit->result(),
          'rekamMedis' => $rekamMedis->result(),
          'laporanlb1' => $laporanlb1->result(),
      ];
    }
    public function getFilterbln($bulan, $tahun)
    {
        if ($bulan == 'Januari') {
            $bulan =1;
        }elseif ($bulan == 'Februari') {
            $bulan =2;
        }elseif ($bulan == 'Maret') {
            $bulan =3;
        }elseif ($bulan == 'April') {
            $bulan =4;
        }elseif ($bulan == 'Mei') {
            $bulan =5;
        }elseif ($bulan == 'Juni') {
            $bulan =6;
        }elseif ($bulan == 'Juli') {
            $bulan =7;
        }elseif ($bulan == 'Agustus') {
            $bulan =8;
        }elseif ($bulan == 'September') {
            $bulan =9;
        }elseif ($bulan == 'Oktober') {
            $bulan =10;
        }elseif ($bulan == 'November') {
            $bulan =11;
        }elseif ($bulan == 'Desember') {
            $bulan =12;
        }
        $dataPenyakit = $this->db->select('*')
        ->from('data_penyakit')
        ->limit(15)
        ->get();
        $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
        ->from('laporan_lb1')
        ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx')
        ->where('month(laporan_lb1.tanggal)', $bulan)
        ->where('year(laporan_lb1.tanggal)', $tahun)
        ->order_by('laporan_lb1.kode_icdx', 'desc')
        ->get();
        $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.jenis_kelamin, rekam_medis.dalam_wilayah, rekam_medis.luar_wilayah, d.nama_penyakit,kode_penyakit,kode_dx
                            ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit')
        ->where('month(rekam_medis.tanggal)', $bulan)
        ->where('year(rekam_medis.tanggal)', $tahun)
        ->order_by('rekam_medis.kode_penyakit', 'desc')
        ->get();
        return [
            'dataPenyakit' => $dataPenyakit->result(),
            'rekamMedis' => $rekamMedis->result(),
            'laporanlb1' => $laporanlb1->result(),
        ];
    }
    public function getCetakPeny($bulan, $tahun)
    {
    if ($bulan == 'Januari') {
      $bln = 1;
    }elseif ($bulan == 'Februari') {
      $bln = 2;
    }elseif ($bulan == 'Maret') {
      $bln = 3;
    }elseif ($bulan == 'April') {
      $bln = 4;
    }elseif ($bulan == 'Mei') {
      $bln = 5;
    }elseif ($bulan == 'Juni') {
      $bln = 6;
    }elseif ($bulan = 'Juli') {
      $bln = 7;
    }elseif ($bulan = 'Agustus') {
      $bln = 8;
    }elseif ($bulan = 'September') {
      $bln = 9;
    }elseif ($bulan = 'Oktober') {
      $bln = 10;
    }elseif ($bulan = 'November') {
      $bln = 11;
    }elseif ($bulan = 'Desember') {
      $bln = 12;
    }
    $this->db->select('*');
    $this->db->from('detail_laporan');
    $this->db->where('month(tanggal)', $bln);
    $this->db->where('year(tanggal)', $tahun);
    $this->db->where('id_jp', 4);
    $query = $this->db->get();
    return $query->result();
  }
  public function CetakPenyTri($tribulan, $tahun)
  {
    if($tribulan == 'Tribulan 1'){
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 1 AND 3");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 5);
      $query = $this->db->get();
      return $query->result();
    }elseif ($tribulan == 'Tribulan 2') {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 4 AND 6");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 5);
      $query = $this->db->get();
      return $query->result();
    }elseif ($tribulan == 'Tribulan 3') {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 7 AND 9");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 5);
      $query = $this->db->get();
      return $query->result();
    }elseif ($tribulan == 'Tribulan 4') {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 10 AND 12");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 5);
      $query = $this->db->get();
      return $query->result();
    }  
  }
  public function CetakPenyTahun($tahun)
  {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 6);
      $query = $this->db->get();
      return $query->result();
  }
}