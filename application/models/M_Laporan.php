<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class M_Laporan extends CI_Model {

    function getAllPemesananBy($kondisi = "") {
        
        $query = $this->db->query(
            '   SELECT
                    * 
                FROM
                    pemesanan 
                '.$kondisi, FALSE
            );
        return $query->result();
    }

    function countBy($kondisi)
    {
        $query = $this->db->get_where("pemesanan", $kondisi);
        return $query->num_rows();
    }

    function totalHargaBy($id,$tgl_awal,$tgl_akhir)
    {
        return $this->db->query('
            SELECT (SELECT SUM(total_tarif) FROM pemesanan WHERE id_konsumen = '.$id.' AND status_pengiriman != "BATAL" AND tgl_pesan >= "'.$tgl_awal.'" AND tgl_pesan <= "'.$tgl_akhir.'") as total_harga
        ')->row()->total_harga;
    }

    function totalBiayaKonsumen($id,$tgl_awal,$tgl_akhir)
    {
        return $this->db->query('
            SELECT (
                SELECT
                SUM(detail_pesanan.biaya_tambahan)
                FROM
                pemesanan
                JOIN detail_pesanan ON detail_pesanan.pemesanan_id = pemesanan.id_pesanan
                WHERE pemesanan.id_konsumen = '.$id.' AND status_pengiriman != "BATAL" AND pemesanan.tgl_pesan >= "'.$tgl_awal.'" AND pemesanan.tgl_pesan <= "'.$tgl_akhir.'"
            ) AS total_biaya
        ')->row()->total_biaya;
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