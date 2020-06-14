<?php
class DataLB1_model extends CI_Model{

  function tambahLB1($data, $table){
    $this->db->insert($table, $data);  
  }
  public function notif()
  {
    $this->db->where("(status=1 OR status=11 OR status=3 OR status=4)", NULL, FALSE);
    // $this->db->where('pesan', 5);
    $result = $this->db->get('detail_laporan')->result_array();
    return $result;
  }
  public function pesan()
  {
    $this->db->where('pesan', 5);
    // $this->db->where('pesan', 11);
    $result = $this->db->get('detail_laporan')->result_array();
    return $result;
  }
  function getJumlahLB(){
    $bulan = getdate();
    $dataPenyakit = $this->db->get('data_penyakit');
    $dataKategori = $this->db->select('kategori_penyakit.kode_dx, kategori_penyakit.kategori_penyakit, d.kode_dx')
    ->from('kategori_penyakit')
    ->join('data_penyakit as d', 'd.kode_dx = kategori_penyakit.kode_dx', 'left')
    ->get();
    $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.kasus, laporan_lb1.tanggal, d.nama_penyakit,d.kode_icdx, kode_dx')
    ->from('laporan_lb1')
    ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
    ->where('month(laporan_lb1.tanggal)', $bulan['mon'])
    ->get();
    $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                          ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
        ->where('month(rekam_medis.tanggal)', $bulan['mon'])
        ->get();
    return [
        'dataPenyakit' => $dataPenyakit->result(),
        'dataKategori' => $dataKategori->result(),
        'rekamMedis' => $rekamMedis->result(),
        'laporanlb1' => $laporanlb1->result(),
    ];
  }
  public function getJumTribulan()
  {
    $tribulan = getdate();
    $dataPenyakit = $this->db->get('data_penyakit');
    $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
    ->from('laporan_lb1')
    ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
    ->where('month(laporan_lb1.tanggal)', $tribulan['mon'])
    ->get();
    $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                          ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
        ->where('month(rekam_medis.tanggal)', $tribulan['mon'])
        ->get();
    return [
        'dataPenyakit' => $dataPenyakit->result(),
        'rekamMedis' => $rekamMedis->result(),
        'laporanlb1' => $laporanlb1->result(),
    ];
  }
  public function getJumTahun()
  {
    $tahun = getdate();
    $dataPenyakit = $this->db->get('data_penyakit');
    $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
    ->from('laporan_lb1')
    ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
    ->where('month(laporan_lb1.tanggal)', $tahun['year'])
    ->get();
    $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                          ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
        ->where('month(rekam_medis.tanggal)', $tahun['year'])
        ->get();
    return [
        'dataPenyakit' => $dataPenyakit->result(),
        'rekamMedis' => $rekamMedis->result(),
        'laporanlb1' => $laporanlb1->result(),
    ];
  }
  
  function sendKP($data, $table)
  {
    $query = $this->db->insert($table, $data);
    return $this->db->insert_id();// return last insert id
  }
  public function tampil_status()
  {
    return $this->db->get('detail_laporan');
  }
  public function getDataLB1($id)
  {
    $this->db->select('*');
    $this->db->from('detail_laporan');
    $this->db->where('id_laporan', $id);
    $query = $this->db->get();
    return $query->result();
  }
  public function getCetakLB1($bulan, $tahun)
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
    $this->db->where('id_jp', 1);
    $query = $this->db->get();
    return $query->result();
  }
  public function getCetakTribln($tribulan, $tahun)
  {
    if($tribulan == 'Tribulan 1'){
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 1 AND 3");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 2);
      $query = $this->db->get();
      return $query->result();
    }elseif ($tribulan == 'Tribulan 2') {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 4 AND 6");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 2);
      $query = $this->db->get();
      return $query->result();
    }elseif ($tribulan == 'Tribulan 3') {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 7 AND 9");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 2);
      $query = $this->db->get();
      return $query->result();
    }elseif ($tribulan == 'Tribulan 4') {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where("month(tanggal) BETWEEN 10 AND 12");
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 2);
      $query = $this->db->get();
      return $query->result();
    }  
  }
  public function getCetakTahun($tahun)
  {
      $this->db->select('*');
      $this->db->from('detail_laporan');
      $this->db->where('year(tanggal)', $tahun);
      $this->db->where('id_jp', 3);
      $query = $this->db->get();
      return $query->result();
  }
  public function updateLB($data, $where)
  {
        $this->db->where($where);
        $this->db->update('detail_laporan', $data);
  }
  public function filter($bulan, $tahun)
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
    }elseif ($bulan = 'Juli') {
      $bulan = 7;
    }elseif ($bulan = 'Agustus') {
      $bulan = 8;
    }elseif ($bulan = 'September') {
      $bulan = 9;
    }elseif ($bulan = 'Oktober') {
      $bulan = 10;
    }elseif ($bulan = 'November') {
      $bulan = 11;
    }elseif ($bulan = 'Desember') {
      $bulan = 12;
    }
    $dataPenyakit = $this->db->get('data_penyakit');
    $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
    ->from('laporan_lb1')
    ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
    ->where('month(laporan_lb1.tanggal)', $bulan)
    ->where('year(laporan_lb1.tanggal)', $tahun)
    ->get();
    $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                          ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
        ->where('month(rekam_medis.tanggal)', $bulan)
        ->where('year(rekam_medis.tanggal)', $tahun)
        ->get();
    return [
        'dataPenyakit' => $dataPenyakit->result(),
        'rekamMedis' => $rekamMedis->result(),
        'laporanlb1' => $laporanlb1->result(),
    ];
  }
  public function filter_Tribln($tribulan, $tahun)
  {
    if($tribulan == 'Tribulan 1'){
      $dataPenyakit = $this->db->get('data_penyakit');
      $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
      ->from('laporan_lb1')
      ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
      ->where("month(laporan_lb1.tanggal) BETWEEN 1 AND 3")
      ->where('year(laporan_lb1.tanggal)', $tahun)
      ->get();
      $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                            ')
      ->from('rekam_medis')
      ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
      ->where("month(rekam_medis.tanggal) BETWEEN 1 AND 3")
      ->where('year(rekam_medis.tanggal)', $tahun)
      ->get();
      return [
      'dataPenyakit' => $dataPenyakit->result(),
      'rekamMedis' => $rekamMedis->result(),
      'laporanlb1' => $laporanlb1->result(),
      ];
    }elseif ($tribulan == 'Tribulan 2'){
      $dataPenyakit = $this->db->get('data_penyakit');
      $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
      ->from('laporan_lb1')
      ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
      ->where("month(laporan_lb1.tanggal) BETWEEN 4 AND 5")
      ->where('year(laporan_lb1.tanggal)', $tahun)
      ->get();
      $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                            ')
      ->from('rekam_medis')
      ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
      ->where("month(rekam_medis.tanggal) BETWEEN 4 AND 6")
      ->where('year(rekam_medis.tanggal)', $tahun)
      ->get();
      return [
      'dataPenyakit' => $dataPenyakit->result(),
      'rekamMedis' => $rekamMedis->result(),
      'laporanlb1' => $laporanlb1->result(),
      ];
    }elseif ($tribulan == 'Tribulan 3'){
      $dataPenyakit = $this->db->get('data_penyakit');
      $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
      ->from('laporan_lb1')
      ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
      ->where("month(laporan_lb1.tanggal) BETWEEN 7 AND 9")
      ->where('year(laporan_lb1.tanggal)', $tahun)
      ->get();
      $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                            ')
      ->from('rekam_medis')
      ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
      ->where("month(rekam_medis.tanggal) BETWEEN 4 AND 5")
      ->where('year(rekam_medis.tanggal)', $tahun)
      ->get();
      return [
      'dataPenyakit' => $dataPenyakit->result(),
      'rekamMedis' => $rekamMedis->result(),
      'laporanlb1' => $laporanlb1->result(),
      ];
    }elseif ($tribulan == 'Tribulan 4'){
      $dataPenyakit = $this->db->get('data_penyakit');
      $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
      ->from('laporan_lb1')
      ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
      ->where("month(laporan_lb1.tanggal) BETWEEN 4 AND 5")
      ->where('year(laporan_lb1.tanggal)', $tahun)
      ->get();
      $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                            ')
      ->from('rekam_medis')
      ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
      ->where("month(rekam_medis.tanggal) BETWEEN 10 AND 12")
      ->where('year(rekam_medis.tanggal)', $tahun)
      ->get();
      return [
      'dataPenyakit' => $dataPenyakit->result(),
      'rekamMedis' => $rekamMedis->result(),
      'laporanlb1' => $laporanlb1->result(),
      ];
    }
    
  }
  public function filter_Tahun($tahun)
  {
    $dataPenyakit = $this->db->get('data_penyakit');
    $laporanlb1 = $this->db->select('laporan_lb1.id_umr, laporan_lb1.jenis_kelamin, laporan_lb1.tanggal, laporan_lb1.kasus, d.nama_penyakit,d.kode_icdx, kode_dx')
    ->from('laporan_lb1')
    ->join('data_penyakit as d', 'd.kode_icdx = laporan_lb1.kode_icdx', 'left')
    ->where('year(laporan_lb1.tanggal)', $tahun)
    ->get();
    $rekamMedis = $this->db->select('rekam_medis.id_umr, rekam_medis.tanggal, rekam_medis.jenis_kelamin,dalam_wilayah, luar_wilayah, d.nama_penyakit,kode_penyakit, kode_dx
                          ')
        ->from('rekam_medis')
        ->join('data_penyakit as d', 'd.kode_icdx = kode_penyakit', 'left')
        ->where('year(rekam_medis.tanggal)', $tahun)
        ->get();
    return [
        'dataPenyakit' => $dataPenyakit->result(),
        'rekamMedis' => $rekamMedis->result(),
        'laporanlb1' => $laporanlb1->result(),
    ];
  }
}