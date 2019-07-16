<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_DetailPesanan extends CI_Model {

    var $table_name = "detail_pesanan";
    var $pk = "id";
    var $order = "DESC";

    function getAll() {
        $this->db->order_by($this->pk,$this->order);
        return $this->db->get_where($this->table_name)->result();
    }
    
    function getAllBy($kondisi) {
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

    public function bulk_insert($data)
    {
        try {
            $this->db->insert_batch($this->table_name, $data);
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    
    function update($id, $data) {
        $this->db->where($this->pk, $id);
        $this->db->update($this->table_name, $data);
    }
    
    function delete($id) {
        $this->db->where($this->pk, $id);
        $this->db->delete($this->table_name);
    }

    function CountBiaya($id)
    {
        return $this->db->query('
            SELECT (SELECT COUNT(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = "'.$id.'") as jumlah
        ')->row()->jumlah;
    }

    function totalBiaya($id)
    {
        return $this->db->query('
            SELECT (SELECT SUM(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = "'.$id.'") as TotalBiaya
        ')->row()->TotalBiaya;
    }

    function TotalPerTagihan($id)
    {
        return $this->db->query('
            SELECT 
                (SELECT SUM(total_tarif) FROM pemesanan WHERE id_pesanan= "'.$id.'") + 
                (SELECT SUM(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = "'.$id.'" )
                 as result
        ')->row()->result;
    }
}