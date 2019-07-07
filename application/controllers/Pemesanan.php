<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    private $path = "";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        if ($this->ion_auth->is_admin()) {
            $this->path = "admin";
        }else {
            $this->path = "page";
        }
        chek_session();
    }

    public function index()
    {
        $data = array(
        'form_title' => 'Form Pemesanan',
        'action' => site_url('pemesanan/pesan'),
        'nama_barang' => set_value('nama_barang'),
        'id_konsumen' => set_value('id_konsumen'),
        'kapasitas_muat' => set_value('kapasitas_muat'),
        'U20' => set_value('U20'),
        'U40' => set_value('U40'),
        'jadwal_kirim' => set_value('jadwal_kirim'),
        'keterangan' => set_value('keterangan'),
        );

        if ($this->ion_auth->is_admin()) {
            $data["pemesanans"] = $this->M_Pesanan->getAll();
        } else {
            $data["pemesanans"] = $this->M_Pesanan->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));            
        }
        $this->template->display($this->path."/pemesanan/index", $data);
    }

    public function tester()
    {
        $rutes = $this->M_Rute->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));
        echo json_encode($rutes);
        // echo $this->session->userdata('konsumen_id');
    }

    public function pemesanan_form($id="")
    {
        if ($id) {
            $row = $this->M_Pesanan->getDetail($id);
            if ($row) {
                // $data['rutes'] = $this->M_Rute->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));
                $data = array(
                'page_title' => 'Edit Pesanan',
                'action' => site_url('pemesanan/update/'.$id),
                'nama_barang' => set_value('nama_barang',$row->nama_barang),
                'id_konsumen' => set_value('id_konsumen',$row->id_konsumen),
                'kapasitas_muat' => set_value('kapasitas_muat',$row->kapasitas_muat),
                'tarif' => set_value('tarif',$row->tarif),
                'tgl_kirim' => set_value('tgl_kirim',$row->tgl_kirim),
                'keterangan' => set_value('keterangan',$row->keterangan),
                'status_pengiriman' => set_value('status_pengiriman',$row->status_pengiriman),
                );
                $this->template->display($this->path.'/pemesanan/pemesanan_form', $data);
            } else {
                $this->session->set_flashdata('alert', error("Data tidak ditemukan !!"));
                redirect(site_url('pemesanan'));
            }
        }else {  
            
            // $data['rutes'] = $rutes;
            $this->template->display($this->path.'/pemesanan/pemesanan_form',$data);
        }
    }

    public function pesan()
    {
        $U20 = $this->input->post('U20',TRUE);
        $U40 = $this->input->post('U40',TRUE);
        $data = array(
            'id_konsumen' => $this->session->userdata('konsumen_id'),
            'nama_barang' => $this->input->post('nama_barang',TRUE),
            'kapasitas_muat' => $this->input->post('kapasistas',TRUE).$this->input->post('satuan',TRUE),
            'tujuan' => $this->input->post('tujuan',TRUE),
            'jum_kontainer' => $this->input->post('jum_kontainer',TRUE),
            '_20' => $U20,
            '_40' => $U40,
            'tarif' => ($U20) ? $U20 : $U40,
            'tgl_pesan' => date("Y/m/d"),
            'jadwal_kirim' => date('Y/m/d',strtotime($this->input->post('jadwal_kirim',TRUE))),
            'keterangan' => $this->input->post('keterangan',TRUE),
        );

        $pilih = $this->input->post('tujuan',TRUE);
        if ($pilih === "0") {
            $this->session->set_flashdata('alert', error("Tujuan belum dipilih !!"));
            redirect(site_url('pemesanan'));
        }else{
            $this->M_Pesanan->insert($data);
            $this->session->set_flashdata('alert', success("Konsumen baru berhasil di simpan"));
            redirect(site_url('pemesanan'));
        }    
    }

    public function delete($id="")
    {
        # code...
    }

    public function test()
    {
        $pph = "2%";
        $nilai = (float) $pph / 100;
        $ppn = 0.5;
        $harga = 200000;

        echo $nilai;
    }

    public function _validation()
    {
        
    }
}
