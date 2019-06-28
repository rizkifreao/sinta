<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uang_Jalan extends CI_Controller
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
        $data["potongan"] = $this->M_Uang_Jalan->getAll();
        $this->template->display($this->path."/uang_jalan/index", $data);
    }

    public function UJ_form($id = "")
    { 
        if ($id) {
            $row = $this->M_Uang_Jalan->getDetail($id);
            if ($row) {
                $data = array(
                'page_title' => 'Edit Tabel Uang Jalan',
                'action' => site_url('uang_jalan/update/'.$id),
                'deskripsi' => set_value('deskripsi',$row->deskripsi),
                'id_uang_jalan' => set_value('id_uang_jalan',$row->id_uang_jalan),
                'ppn' => set_value('ppn',$row->ppn),
                );
                $this->template->display('admin/uang_jalan/UJ_form', $data);
            } else {
                $this->session->set_flashdata('alert', error("Data tidak ditemukan !!"));
                redirect(site_url('uang_jalan'));
            }
        }else {
            $data = array(
            'page_title' => 'Tambah Data Uang Jalan',
            'action' => site_url('uang_jalan/add'),
			'deskripsi' => set_value('deskripsi'),
            'id_uang_jalan' => set_value('id_uang_jalan'),
			'ppn' => set_value('ppn'),
            );
            $this->template->display('admin/uang_jalan/UJ_form',$data);
        }
        
    }

    public function add()
    {
        $this->_validation();
        if ($this->form_validation->run()==FALSE) {
            $this->UJ_form();
        }else {
            $data = array(
                'deskripsi' => $this->input->post('deskripsi',TRUE),
                'ppn' => $this->input->post('ppn',TRUE)."%",
            );
            $this->M_Uang_Jalan->insert($data);
            $this->session->set_flashdata('alert', success("Data baru berhasil di simpan"));
            redirect(site_url('uang_jalan'));
        }
    }

    public function update($id = "")
    {
        $this->_validation();

        if ($this->form_validation->run() == FALSE) {
            $this->UJ_form($id, TRUE);
        } else {
            $data = array(
            'deskripsi' => $this->input->post('deskripsi',TRUE),
            'ppn' => $this->input->post('ppn',TRUE)."%",
            );
            $this->M_Uang_Jalan->update($this->input->post('id_uang_jalan', TRUE),$data);
            $this->session->set_flashdata('alert', success("Data berhasil diperbaharui"));
            redirect(site_url('uang_jalan'));
        }
    }

    public function delete($id) 
    {
        $row = $this->M_Uang_Jalan->getDetail($id);

        if ($row) {
            $this->M_Uang_Jalan->delete($id);
            $this->session->set_flashdata('alert', success("Data berhasil dihapus"));
            redirect(site_url('uang_jalan'));
        } else {
            $this->session->set_flashdata('alert', error("Data tidak ditemukan !"));
            redirect(site_url('uang_jalan'));
        }
    }

    private function _validation()
    {
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required|max_length[25]',
        array('required' =>'Kolom Deskripsi wajib di isi*','max-length'=>'Tidak boleh lebih dari 25 char !'));
        $this->form_validation->set_rules('ppn', 'ppn', 'trim|required|max_length[3]',
        array('required' =>'Kolom PPN wajib di isi*','max-length'=>'Tidak boleh lebih dari 3 char !'));
    }

    public function test()
    {
        $pph = "3%";
        $nilai = (float) $pph / 100;
        $ppn = 0.5;
        $harga = 200000;

        echo $nilai;
    }

    public function tester()
    {
        $name = "200%";
        echo substr($name,-5,-1);
    }
}
