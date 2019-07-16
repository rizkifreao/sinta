<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Pesanan extends CI_Model {

    var $table_name = "pemesanan";
    var $pk = "id_pesanan";
    var $order = "DESC";

    function getAll() {
        $this->db->order_by($this->pk,$this->order);
        return $this->db->get_where($this->table_name)->result();
    }
    
    function getAllBy($kondisi) {
        $this->db->order_by($this->pk,$this->order);
        $query = $this->db->get_where($this->table_name, $kondisi);
        return $query->result();
    }
    
    function getDetail($id) {
        $this->db->where($this->pk, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function insert($data) {
        $this->db->insert($this->table_name, $data);
    }
    
    function update($id, $data) {
        $this->db->where($this->pk, $id);
        $this->db->update($this->table_name, $data);
    }
    
    function delete($id) {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table_name);
    }

    public function updateStatus()
    {
        $this->db->query('UPDATE pemesanan SET status_pengiriman = "PROSES" where jadwal_kirim = "'.date('Y-m-d').'"');
    }
}