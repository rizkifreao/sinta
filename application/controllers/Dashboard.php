<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        chek_session();
    }

    public function index()
    {
        $this->template->display('admin/dashboard/index');
    }

    public function pemesanan()
    {

        $data["nama_perusahaan"] = $this->input->post("nama_perusahaan");
        $data["asal"] = $this->input->post("asal");
        $data["tujuan"] = $this->input->post("tujuan");
        $data["keterangan"] = $this->input->post("keterangan");
        $data["jenis_kontainer"] = $this->input->post("jenis_kontainer");
        $data["nama_barang"] = $this->input->post("nama_barang");
        $data["kapasitas_muat"] = $this->input->post("kapasitas");
        $data["tgl_kirim"] = $this->input->post("tgl_kirim");

        $this->M_Pesanan->add($data);
        $this->session->set_flashdata('sucsess', 'Berhasil Menyimpan Data !!');
        redirect(base_url());
    }
}
