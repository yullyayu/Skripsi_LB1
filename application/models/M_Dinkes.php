<?php
class M_Dinkes extends CI_Model{

    public function tampilLB()
    {
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where("status BETWEEN 2 AND 3");
        $query = $this->db->get();
        return $query->result();
        // return $this->db->get_where('detail_laporan', ['status' => 2]);
        // return $this->db->get('detail_laporan');
    }
    public function getLB1bulan()
    {
        $bulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan['mon']);
        $this->db->where('jenis_laporan', 'Bulanan');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLBtribulan()
    {
        $tribulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $tribulan['mon']);
        $this->db->where('jenis_laporan', 'Tribulan');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLBtahun()
    {
        $tahun = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan['year']);
        $this->db->where('jenis_laporan', 'Tahunan');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result();
    }
    public function monitoringLB()
    {
        $bulan = getdate();
        $this->db->select('*');
        $this->db->from('jenis_laporan as jp');
        $this->db->join('detail_laporan as lb', 'lb.id_jp = jp.id_jp', 'left');
        $this->db->join('data_puskesmas as dp', 'dp.nama_puskesmas = lb.nama_puskesmas', 'left');
        // $this->db->where('month(lb.tanggal)', $bulan['mon']);  
        $query = $this->db->get();
        return $query->result();
        // $this->db->select('*');
        // $this->db->from('jenis_laporan as jp');
        // $this->db->join('detail_laporan as lb', 'lb.id_jp = jp.id_jp', 'left');
        // $this->db->join('data_puskesmas as dp', 'dp.nama_puskesmas = lb.nama_puskesmas', 'left');
        // $query = $this->db->get();
        // return $query->result();
    }
    public function CetakBulan($bulan, $tahun)
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
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan);
        $this->db->where('year(tanggal)', $tahun);
        $this->db->where('jenis_laporan', 'Bulanan');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result();
    }
    public function CetakTribulan($tribulan, $tahun)
    {
        if ($tribulan == 'Tribulan 1') {
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 1 AND 3");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status', 3);
            $query = $this->db->get();
            return $query->result();
        }elseif ($tribulan == 'Tribulan 2') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 4 AND 6");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status', 3);
            $query = $this->db->get();
            return $query->result();
        }elseif ($tribulan == 'Tribulan 3') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 7 AND 9");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status', 3);
            $query = $this->db->get();
            return $query->result();
        }elseif ($tribulan == 'Tribulan 4') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 10 AND 12");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status', 3);
            $query = $this->db->get();
            return $query->result();
        }
    }
    public function CetakTahun($tahun)
    {
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('year(tanggal)', $tahun);
        $this->db->where('jenis_laporan', 'Tahunan');
        $this->db->where('status', 3);
        $query = $this->db->get();
        return $query->result();
    }
}