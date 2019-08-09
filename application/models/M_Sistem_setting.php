<?php (defined('BASEPATH')) or exit('No direct script access allowed');

class M_Sistem_setting extends CI_Model
{

    var $table_name = "sistem_setting";
    var $pk = "id";
    var $id = 0;

    function getDetail()
    {
        $this->db->where($this->pk, $this->id);
        $query = $this->db->get($this->table_name);
        return $query->row();
    }

    function update($data)
    {
        $this->db->where($this->pk, $this->id);
        $this->db->update($this->table_name, $data);
    }
}
