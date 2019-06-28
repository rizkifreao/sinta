<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class M_Rute extends CI_Model
{

    var $table_name = "rute";
    var $pk = "id_rute";

    function getAll()
    {
        $query = $this->db->get($this->table_name);
        return $query->result();
    }

    function getAllBy($kondisi)
    {
        $query = $this->db->get_where($this->table_name, $kondisi);
        return $query->result();
    }

    function getDetail($id)
    {
        $this->db->where($this->pk, $id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function insert($data)
    {
        $this->db->insert($this->table_name, $data);
    }

    function update($id, $data)
    {
        $this->db->where($this->pk, $id);
        $this->db->update($this->table_name, $data);
    }

    function delete($id)
    {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table_name);
    }

      public function deleteBy($colums,$con)
    {
        $this->db->where($colums, $con);
        $this->db->delete($this->table_name);
    }
}
