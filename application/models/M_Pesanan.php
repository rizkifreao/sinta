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

    function TotPesananBy($kondisi1,$kondisi2)
    {
        // TARIF TARIF
        $this->db->select_sum('total_tarif');
        $this->db->where($kondisi1);
        $tot_tarif_konsumen = $this->db->get('pemesanan')->row()->total_tarif;

        // $kondisi = array('pemesanan.id_konsumen' => 7,'month(tgl_pesan)' => 7,'year(tgl_pesan)'=> 2019 );
        // BIAYA TOTAL
        $this->db->select('SUM(detail_pesanan.biaya_tambahan) as tot_biaya FROM pemesanan',true);
        $this->db->join('detail_pesanan', 'detail_pesanan.pemesanan_id = pemesanan.id_pesanan');
        $this->db->where($kondisi2);
        $tot_biaya_konsumen = $this->db->get()->row()->tot_biaya;

        return $tot_tarif_konsumen + $tot_biaya_konsumen;

    }

    public function CountPesananBy($kondisi)
    {
        $this->db->order_by($this->pk,'DESC');
        $this->db->where($kondisi);
        $this->db->from("pemesanan");
        return $this->db->count_all_results();
    }

    public function updateStatus()
    {
        $this->db->query('UPDATE pemesanan SET status_pengiriman = "PROSES" where jadwal_kirim = "'.date('Y-m-d').'"');
    }
}