<?php
class M_Kepala_puskesmas extends CI_Model{

    public function getLB1bulan()
    {
        $status = 0;
        $bulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan['mon']);
        $this->db->where('jenis_laporan', 'Bulanan');
        $this->db->where('status !=', $status);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLBtribulan()
    {
        $status = 0;
        $tribulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $tribulan['mon']);
        $this->db->where('jenis_laporan', 'Tribulan');
        $this->db->where('status !=', $status);
        $query = $this->db->get();
        return $query->result();
    }
    public function getLBtahun()
    {
        $status = 0;
        $bulan = getdate();
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan['mon']);
        $this->db->where('jenis_laporan', 'Tahunan');
        $this->db->where('status !=', $status);
        $query = $this->db->get();
        return $query->result();
    }
    public function getCetakBulan($bulan, $tahun)
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
        $status = 0;
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('month(tanggal)', $bulan);
        $this->db->where('year(tanggal)', $tahun);
        $this->db->where('jenis_laporan', 'Bulanan');
        $this->db->where('status !=', $status);
        $query = $this->db->get();
        return $query->result();
    }
    public function getCetakTribulan($tribulan, $tahun)
    {
        if ($tribulan == 'Tribulan 1') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 1 AND 3");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status !=', $status);
            $query = $this->db->get();
            return $query->result();
        }elseif ($tribulan == 'Tribulan 2') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 4 AND 6");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status !=', $status);
            $query = $this->db->get();
            return $query->result();
        }elseif ($tribulan == 'Tribulan 3') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 7 AND 9");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status !=', $status);
            $query = $this->db->get();
            return $query->result();
        }elseif ($tribulan == 'Tribulan 4') {
            $status = 0;
            $this->db->select('*');
            $this->db->from('detail_laporan');
            $this->db->where("month(tanggal) BETWEEN 10 AND 12");
            $this->db->where('year(tanggal)', $tahun);
            $this->db->where('jenis_laporan', 'Tribulan');
            $this->db->where('status !=', $status);
            $query = $this->db->get();
            return $query->result();
        } 
    }
    public function getCetakTahun($tahun)
    {
        $status = 0;
        $this->db->select('*');
        $this->db->from('detail_laporan');
        $this->db->where('year(tanggal)', $tahun);
        $this->db->where('jenis_laporan', 'Tahunan');
        $this->db->where('status !=', $status);
        $query = $this->db->get();
        return $query->result();
    }
}