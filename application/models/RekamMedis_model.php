<?php
    class RekamMedis_model extends CI_Model{
        // private $no_register;
        // private $nama;
        // private $alamat;
        // private $umur;
        // private $jenis_kelamin;
        // private $jenis_pekerjaan;
        // private $kode_penyakit;
        // private $terapi;
        // private $no_bpjs;
        // private $dalam_wilayah;
        // private $luar_wilayah;
        public function get($no_register)
        {
            return $this->db->get_where('rekam_medis', ['no_register' => $no_register]);
        }
        public function insertData($data, $table)
        {
            $this->db->insert($table, $data);       
        }

        public function tampil_data()
        {
            return $this->db->get('rekam_medis');
        }
        public function getRegister($where, $table)
        {
            return $this->db->get_where($table,$where);
        }
        public function updateRegister($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
        }
        public function hapus_register($where, $table)
        {
        $this->db->where($where);
        $this->db->delete($table);
        }
    }
?>