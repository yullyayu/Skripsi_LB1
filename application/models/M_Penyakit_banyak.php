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
    public function PenyKumulatif($tahun)
    {
        // $tahun = getdate();
        $dataPenyakit = $this->db->select('*')
        ->from('data_penyakit')
        ->limit(15)
        ->get();
        $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.kasus,kode_icdx, 
        MONTH(tanggal) as bulan')
        ->from('laporan_lb1')
        ->where('year(laporan_lb1.tanggal)', $tahun)
        ->order_by('laporan_lb1.kode_icdx', 'desc')
        ->get();
        $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.jenis_kelamin, rekam_medis.dalam_wilayah, rekam_medis.luar_wilayah, d.nama_penyakit,kode_penyakit,kode_dx,
        MONTH(rekam_medis.tanggal) as bulan')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit')
        ->where('year(rekam_medis.tanggal)', $tahun)
        ->order_by('rekam_medis.kode_penyakit', 'desc')
        ->get();
        return [
            'dataPenyakit' => $dataPenyakit->result(),
            'rekamMedis' => $rekamMedis->result(),
            'laporanlb1' => $laporanlb1->result(),
        ];
    }
    public function getGrafik($month, $year)
    {
      $this->db->select('d.kode_dx, d.kode_icdx, d.nama_penyakit, coalesce(IFNULL(x.bln1,0)+IFNULL(y.bulan1,0), 0) as total, coalesce(IFNULL(z.bln2,0)+IFNULL(a.bulan2,0), 0) as total2,
      coalesce(IFNULL(b.bln3,0)+IFNULL(c.bulan3,0), 0) as total3');
        $this->db->from('data_penyakit as d');
        $this->db->join("(select l.kode_icdx, SUM(MONTH(l.tanggal) = $month[0]) as bln1  from laporan_lb1 as l where YEAR(l.tanggal)=$year group by l.kode_icdx )as x",'d.kode_icdx = x.kode_icdx', 'left');
        $this->db->join("( select r.kode_penyakit, SUM(MONTH(r.tanggal) = $month[0]) as bulan1 from rekam_medis as r where YEAR(r.tanggal)=$year group by r.kode_penyakit )as y", 'd.kode_icdx=y.kode_penyakit', 'left');
        $this->db->join("(select l.kode_icdx, SUM(MONTH(l.tanggal) = $month[1]) as bln2  from laporan_lb1 as l where YEAR(l.tanggal)=$year group by l.kode_icdx )as z",'d.kode_icdx = z.kode_icdx', 'left');
        $this->db->join("( select r.kode_penyakit, SUM(MONTH(r.tanggal) = $month[1]) as bulan2 from rekam_medis as r where YEAR(r.tanggal)=$year group by r.kode_penyakit )as a", 'd.kode_icdx=a.kode_penyakit', 'left');
        $this->db->join("(select l.kode_icdx, SUM(MONTH(l.tanggal) = $month[2]) as bln3  from laporan_lb1 as l where YEAR(l.tanggal)=$year group by l.kode_icdx )as b",'d.kode_icdx = b.kode_icdx', 'left');
        $this->db->join("( select r.kode_penyakit, SUM(MONTH(r.tanggal) = $month[2]) as bulan3 from rekam_medis as r where YEAR(r.tanggal)=$year group by r.kode_penyakit )as c", 'd.kode_icdx=c.kode_penyakit', 'left');
        $this->db->group_by('kode_icdx');
        $this->db->order_by('total', 'desc');
        $this->db->order_by('total2', 'desc');
        $this->db->order_by('total3', 'desc');
        $this->db->limit(15);
        $query = $this->db->get();
        return $query->result_array();
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
  public function CetakPenyTahun($tahun)
  {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 6);
      $query = $this->db->get();
      return $query->result();
  }
  public function getCetakPenyKP($bulan, $tahun)
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
    $this->db->where('status !=', 0);
    $this->db->where('id_jp', 4);
    $query = $this->db->get();
    return $query->result();
  }
  public function CetakPenyTahunKP($tahun)
  {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('status !=', 0);
      $this->db->where('id_jp', 6);
      $query = $this->db->get();
      return $query->result();
  }
  public function getCetakPenyDin($bulan, $tahun)
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
    $this->db->where('status =', 3);
    $this->db->where('id_jp', 4);
    $query = $this->db->get();
    return $query->result();
  }
  public function CetakPenyTahunDin($tahun)
  {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('status =', 3);
      $this->db->where('id_jp', 6);
      $query = $this->db->get();
      return $query->result();
  }
  public function getPenyDin()
    {
        $status = 3;
        $bulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan['mon']);
        $this->db->where('id_jp', 4);
        $this->db->where('status =', $status);
        $query = $this->db->get();
        return $query->result();
    }
    public function filterPenyDin($bulan, $tahun)
    {
      if ($bulan == 'Januari') {
          $bulan = 1;
      }elseif ($bulan == 'Februari') {
          $bulan = 2;
      }elseif ($bulan == 'Maret') {
          $bulan = 3;
      }elseif ($bulan == 'April') {
          $bulan = 4;
      }elseif ($bulan == 'Mei') {
          $bulan = 5;
      }elseif ($bulan == 'Juni') {
          $bulan = 6;
      }elseif ($bulan == 'Juli') {
          $bulan = 7;
      }elseif ($bulan == 'Agustus') {
          $bulan = 8;
      }elseif ($bulan == 'September') {
          $bulan = 9;
      }elseif ($bulan == 'Oktober') {
          $bulan = 10;
      }elseif ($bulan == 'November') {
          $bulan = 11;
      }elseif ($bulan == 'Desember') {
          $bulan = 12;
      }
      $status = 3;
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where('month(tanggal)', $bulan);
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 4);
      $this->db->where('status !=', $status);
      $query = $this->db->get();
      return $query->result();
    }
    public function getPenyTriDin($month, $year)
    {
        $status = 3;
        $tribulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where("(month(tanggal)= $month[0] OR month(tanggal)= $month[1] OR month(tanggal)= $month[2])", NULL, FALSE);
        $this->db->where('year(tanggal)', $year);
        $this->db->where('id_jp', 5);
        $this->db->where('status =', $status);
        $query = $this->db->get();
        return $query->result();
    }
    public function getPenyThnDin()
    {
        $status = 3;
        $tahun = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('year(tanggal)', $tahun['year']);
        $this->db->where('id_jp', 6);
        $this->db->where('status =', $status);
        $query = $this->db->get();
        return $query->result();
    }
}