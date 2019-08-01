<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{
    private $path = "";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        date_default_timezone_set("Asia/Jakarta");
        if ($this->ion_auth->is_admin()) {
            $this->path = "admin";
        }else {
            $this->path = "page";
        }
        chek_session();
    }

    public function index()
    {
        if ($this->ion_auth->is_admin()) {
            $data['tagihan'] = $this->getTagihan(
                array(
                    'is_tagihan' => 1,
                )
            );
        }else{
             $data['tagihan'] = $this->M_Pesanan->getAllBy(
                array(
                    'is_tagihan' => 1,
                    'id_konsumen' => $this->session->userdata('konsumen_id')
                )
            );
        }
        $this->template->display($this->path."/tagihan/index",$data);
    }

    public function getTagihan($kondisi = "")
    {
        return $this->M_DetailPesanan->getAllPemesananBy($kondisi);
    }

    public function detail($id)
    {
        $data['pemesanan'] = $pemesanan = $this->M_Pesanan->getDetail($id);
        $data["detail_tagihan"] = $this->M_DetailPesanan->getAllDetailPesananBy("pemesanan_id = ".$id);
        $data['jumlah_biaya'] = $this->M_DetailPesanan->CountBiaya($pemesanan->id_pesanan);
        $data['total_biaya'] = $this->M_DetailPesanan->totalBiaya($pemesanan->id_pesanan);
        $data['total_tagihan'] = $this->M_DetailPesanan->TotalPerTagihan($pemesanan->id_pesanan);
        echo json_encode($data);
        // echo $data->detail_tagihan;

        // echo $this->M_DetailPesanan->CountBiaya($id);
    }

    public function tester()
    {
        echo json_encode($this->M_DetailPesanan->getAllPemesananBy());
    }
    
    public function test()
    {
        $pph = "2%";
        $nilai = (float) $pph / 100;
        $ppn = 0.5;
        $harga = 200000;

        echo $nilai;
    }

    public function cetakKwitansi($id)
    {
        $id_pemesanan = $this->M_Pesanan->getDetail($id);
        
        if (!empty($id_pemesanan)) {
            $data['pemesanan'] = $pemesanan = $this->M_Pesanan->getDetail($id);
            $data["detail_tagihan"] = $this->M_DetailPesanan->getAllDetailPesananBy("pemesanan_id = ".$id);
            $data['jumlah_biaya'] = $this->M_DetailPesanan->CountBiaya($pemesanan->id_pesanan);
            $data['total_biaya'] = $this->M_DetailPesanan->totalBiaya($pemesanan->id_pesanan);
            $data['total_tagihan'] = $this->M_DetailPesanan->TotalPerTagihan($pemesanan->id_pesanan);
            $data["filename"] = "invoice";
            $this->template->view_pdf("pdf/helloWord",$data);
        }else {
            $this->session->set_flashdata('alert', error("Data tidak ditemukan"));
            redirect('tagihan');
        }
        
    }
}
