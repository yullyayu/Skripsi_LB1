<?php
class M_Data_Puskesmas extends CI_Model{

    public function insert_puskesmas($data, $table)
    {
        $this->db->insert($table, $data);       
    }
    public function tampil_puskesmas()
    {
        return $this->db->get('data_puskesmas');
    }
    public function getPuskesmas($where, $table)
    {
        return $this->db->get_where($table,$where);
    }
    public function update_puskesmas($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function deletePuskesmas($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
?>