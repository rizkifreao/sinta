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
            $data['action'] = "laporan/cetakPemesanan";
            $data['konsumens'] = $this->M_Konsumen->getAll();
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
        $detail_konsumen = $this->M_Konsumen->getDetail($konsumenId);
        $tgl_awal = $this->input->post('value_from_start_date',TRUE);
        $tgl_akhir = $this->input->post('value_from_end_date',TRUE);

    
        if ($konsumenId == "all_konsumen") {
            
            $id_konsumens = array();
            $konsumen = $this->M_Konsumen->getAll();
            $data['konsumens'] = [];
            $data["filename"] = date('dmy',strtotime($tgl_awal))."-".date('dmy',strtotime($tgl_akhir))."_Laporan_Pemesanan_All";
            foreach ($konsumen as $key) {
                array_push($data['konsumens'],
                    array(
                        'perusahaan' => $this->M_Konsumen->getDetail($key->id_konsumen)->perusahaan, 
                        'jumlah_pemesanan' => strval( count($this->M_Pesanan->getAllBy(array(
                                                    'status_pengiriman !=' => 'BATAL',
                                                    'id_konsumen' => $key->id_konsumen, 
                                                    'tgl_pesan >=' => $tgl_awal,
                                                    'tgl_pesan <=' => $tgl_akhir,
                                                )))) , 
                        'total_harga' => $this->M_Laporan->totalHargaBy($key->id_konsumen,$tgl_awal,$tgl_akhir),
                        'total_biaya' => $this->M_Laporan->totalBiayaKonsumen($key->id_konsumen,$tgl_awal,$tgl_akhir),
                        'proses' => strval($this->M_Laporan->countBy(array(
                            'status_pengiriman =' => 'PROSES',
                            'id_konsumen' => $key->id_konsumen, 
                            'tgl_pesan >=' => $tgl_awal,
                            'tgl_pesan <=' => $tgl_akhir,
                        ))),
                        'batal' => strval($this->M_Laporan->countBy(array(
                            'status_pengiriman =' => 'BATAL',
                            'id_konsumen' => $key->id_konsumen, 
                            'tgl_pesan >=' => $tgl_awal,
                            'tgl_pesan <=' => $tgl_akhir,
                        ))) , 
                    )
                );
            }
            $data["tgl_awal"] = $tgl_awal;
            $data["tgl_akhir"] = $tgl_akhir;
            if ($tgl_awal < $tgl_akhir) {
                $data["jenis"] = "periode";
                $data["judul"] = "Laporan Pemesanan Per-Konsumen Periode";
            }else {
                $data["jenis"] = "harian";
                $data["judul"] = "Laporan Pemesanan Per-Konsumen Harian";
            }
            echo var_dump($data);
            $this->template->view_pdf("pdf/LaporanPemesananAll",$data);
            // echo count($konsumen);
        }else {
            $data['pemesanan'] = $this->M_Pesanan->getAllBy(array(
                'status_pengiriman !=' => 'BATAL',
                'id_konsumen' => $konsumenId, 
                'tgl_pesan >=' => $tgl_awal,
                'tgl_pesan <=' => $tgl_akhir,
            ));

            $data["filename"] = date('dmy',strtotime($tgl_awal))."-".date('dmy',strtotime($tgl_akhir))."_".$detail_konsumen->perusahaan."_Laporan_Pemesanan";
            $data["detail_konsumen"] = $detail_konsumen;
            $data["tgl_awal"] = $tgl_awal;
            $data["tgl_akhir"] = $tgl_akhir;
            if ($tgl_awal < $tgl_akhir) {
                $data["jenis"] = "periode";
                $data["judul"] = "Laporan Pemesanan Periode";
            }else {
                $data["jenis"] = "harian";
                $data["judul"] = "Laporan Pemesanan Harian";
            }
            // echo json_encode($data);
            $this->template->view_pdf("pdf/lapPemesananKonsumen",$data);
        }
    }

    public function test()
    {
        $id_invoice = "7/".date("m/y", strtotime("2019-07-14"));

        echo tgl_indo("2019-07-14");
    }
}
