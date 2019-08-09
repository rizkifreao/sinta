<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Konsumen extends CI_Model {

    var $table_name = "konsumen";
    var $pk = "id_konsumen";
    var $order = "DESC";

    function getAll() {
        $this->db->order_by($this->pk,$this->order);
        return $this->db->get_where($this->table_name)->result();
    }

    function getAllArray() {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $array_keys_values = $this->db->get();

        $hasil[''] = '- Pilih Perusahaan -';

        foreach ($array_keys_values->result() as $row) {
            $hasil[$row->id_konsumen] = $row->perusahaan;
        }

        return $hasil;
}
    
    function getAllBy($kondisi) {
        $this->db->order_by($this->pk,$this->order);
        return $this->db->get_where($this->table_name, $kondisi)->result();
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
        $query = $this->db->get($this->table_name);
        $row = $query->row();
        unlink("./public/documents/dok_MOU/$row->dok_MOU"); 
        $this->db->delete($this->table_name, array($this->pk => $id));
    }

    public function getLast()
    {
        $query = $this->db->query(
            "SELECT id_konsumen
                FROM konsumen
                WHERE id_konsumen
                IN
                (
                SELECT MAX(id_konsumen)
                FROM konsumen
                )"
        );
        return $query->row();
    }
}