<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_DetailPesanan extends CI_Model {

    var $table_name = "detail_pesanan";
    var $pk = "id_pesanan";
    var $order = "DESC";

    function getAllDetailPesanan() {
        $this->db->order_by($this->pk,$this->order);
        return $this->db->get_where($this->table_name)->result();
    }
    
    function getAllDetailPesananBy($kondisi) {
        $query = $this->db->get_where($this->table_name, $kondisi);
        return $query->result();
    }

    function getAllPemesananBy($kondisi = "") {
        $this->db->order_by($this->pk,$this->order);
        $this->db->select(
            '   pemesanan.id_pesanan,
                pemesanan.id_konsumen,
                pemesanan.konsumen,
                pemesanan.nama_barang,
                pemesanan.kapasitas_muat,
                pemesanan.tujuan,
                pemesanan.jum_kontainer,
                pemesanan.tipe,
                pemesanan._20,
                pemesanan._40,
                pemesanan.tarif,
                pemesanan.total_tarif,
                pemesanan.tgl_pesan,
                pemesanan.jadwal_kirim,
                pemesanan.keterangan,
                pemesanan.status_pengiriman,
                pemesanan.is_tagihan,
                (SELECT SUM(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = pemesanan.id_pesanan) as biaya_tambahan,
                pemesanan.total_tarif + (SELECT SUM(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = pemesanan.id_pesanan) as total_tagihan
                ', FALSE
            );
        if (!empty($kondisi)) {
            $this->db->where($kondisi);
        }
        return $this->db->get('pemesanan')->result();
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

    function getAllTagihan()
    {
        return $this->db->query('
            SELECT
                pemesanan.id_pesanan,
                pemesanan.id_konsumen,
                pemesanan.konsumen,
                pemesanan.nama_barang,
                pemesanan.kapasitas_muat,
                pemesanan.tujuan,
                pemesanan.jum_kontainer,
                pemesanan.tipe,
                pemesanan._20,
                pemesanan._40,
                pemesanan.tarif,
                pemesanan.total_tarif,
                pemesanan.tgl_pesan,
                pemesanan.jadwal_kirim,
                pemesanan.keterangan,
                pemesanan.status_pengiriman,
                pemesanan.is_tagihan,
                (SELECT SUM(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = pemesanan.id_pesanan) as biaya_tambahan,
                pemesanan.total_tarif + (SELECT SUM(biaya_tambahan) FROM detail_pesanan WHERE pemesanan_id = pemesanan.id_pesanan) as total_tagihan
                FROM
                pemesanan
        ')->result();
    }
}