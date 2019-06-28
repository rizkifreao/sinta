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
    }

    public function pemesanan_form($id="")
    {
        $rutes = $this->M_Rute->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));

        if ($id) {
            $row = $this->M_Pesanan->getDetail($id);
            if ($row) {
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
            $data = array(
            'page_title' => 'Tambah pemesanan',
            'action' => site_url('pemesanan/add'),
            'nama_barang' => set_value('nama_barang'),
            'id_konsumen' => set_value('id_konsumen'),
            'kapasitas_muat' => set_value('kapasitas_muat'),
            'tarif' => set_value('tarif'),
            'tgl_kirim' => set_value('tgl_kirim'),
            'keterangan' => set_value('keterangan'),
            'status_pengiriman' => set_value('status_pengiriman'),
            );
            $data['rutes'] = $rutes;
            $this->template->display($this->path.'/pemesanan/pemesanan_form',$data);
        }
    }

    public function pesan()
    {
        $this->_validation();
        if ($this->form_validation->run()==FALSE) {
            $this->pemesanan_form();
        }else {
            $data = array(
                'nama_barang' => $this->input->post('nama_barang',TRUE),
                'id_konsumen' => $this->input->post('id_konsumen',TRUE),
                'kapasistas_muat' => $this->input->post('kapasistas_muat',TRUE),
                'tarif' => $this->input->post('tarif',TRUE),
                'npwp' => $this->input->post('npwp',TRUE),
                'tgl_kirim' => $this->input->post('tgl_kirim',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
                'status_pengiriman' => $this->input->post('status_pengiriman',TRUE),
            );
            $this->M_Pesanan->insert($data);
            $this->session->set_flashdata('alert', success("Konsumen baru berhasil di simpan"));
            redirect(site_url('konsumen'));
        
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
