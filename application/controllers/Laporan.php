<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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
           $data['action'] = "laporan/cetakPemesanan";
           $data['konsumens'] = $this->M_Konsumen->getAll();
        }else{
             
        }
        $this->template->display($this->path."/laporan/index",$data);
    }

    public function reloadbydate($konsumenId = "",$tgl_awal = "", $tgl_akhir = "")
    {
        if ($konsumenId == "all_konsumen") {
            $data['data'] = $this->M_Pesanan->getAllBy(array(
                'status_pengiriman !=' => 'BATAL', 
                'tgl_pesan >=' => $tgl_awal,
                'tgl_pesan <=' => $tgl_akhir,
            ));
        
            if ($data) {
                echo json_encode($data);
            }else {
                $this->session->set_flashdata('alert', error("Data tidak ditemukan"));
            }
        }else {
            $data['data'] = $this->M_Pesanan->getAllBy(array(
                'status_pengiriman !=' => 'BATAL',
                'id_konsumen' => $konsumenId,
                'tgl_pesan >=' => $tgl_awal,
                'tgl_pesan <=' => $tgl_akhir,
            ));
            if ($data) {
                echo json_encode($data);
            }else {
                $this->session->set_flashdata('alert', error("Data tidak ditemukan"));
            }
        }
        
    }

    public function cetakPemesanan()
    {   
        $konsumenId = $this->input->post('perusahaan',TRUE);
        $tgl_awal = $this->input->post('value_from_start_date',TRUE);
        $tgl_akhir = $this->input->post('value_from_end_date',TRUE);
    
        if ($konsumenId == "all_konsumen") {
            $this->template->view_pdf("pdf/LapPemesananAdmin",$data);
        }else {
            $data[pemesanan] = $this->M_Pesanan->getAllBy(array(
                'status_pengiriman !=' => 'BATAL',
                'id_konsumen' => $konsumenId, 
                'tgl_pesan >=' => $tgl_awal,
                'tgl_pesan <=' => $tgl_akhir,
            ));
            $data["filename"] = "invoice";
            if ($tgl_awal == $tgl_akhir) {
                $data["judul"] = "Laporan Pemesanan Harian";
            }else {
                $data["judul"] = "Laporan Pemesanan Periode";
            }

            $this->template->view_pdf("pdf/lapPemesananKonsumen",$data);
        }
   
        

        // $id_pemesanan = $this->M_Pesanan->getDetail($id);
        
        // if (!empty($id_pemesanan)) {
        //     $data['pemesanan'] = $pemesanan = $this->M_Pesanan->getDetail($id);
        //     $data["detail_tagihan"] = $this->M_DetailPesanan->getAllDetailPesananBy("pemesanan_id = ".$id);
        //     $data['jumlah_biaya'] = $this->M_DetailPesanan->CountBiaya($pemesanan->id_pesanan);
        //     $data['total_biaya'] = $this->M_DetailPesanan->totalBiaya($pemesanan->id_pesanan);
        //     $data['total_tagihan'] = $this->M_DetailPesanan->TotalPerTagihan($pemesanan->id_pesanan);
        //     $data["filename"] = "invoice";
        //     $this->template->view_pdf("pdf/helloWord",$data);
        // }else {
        //     $this->session->set_flashdata('alert', error("Data tidak ditemukan"));
        //     redirect('tagihan');
        // }
        
    }

    public function test()
    {
        $id_invoice = "7/".date("m/y", strtotime("2019-07-14"));

        echo $id_invoice;
    }
}
