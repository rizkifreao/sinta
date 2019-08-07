<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rute extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        chek_session();

        if (!$this->ion_auth->is_admin()){
            $data['error'] = 'You must be an administrator to view this page.';
            return $this->template->display('errors/error_general',$data);
        }
    }

    public function index()
    {
        if ($this->ion_auth->is_admin()){
            $data["rutes"] = $this->M_Rute->getAll();
            $this->template->display("admin/rute/index", $data);
        }
    }

    public function detailJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->M_Rute->getDetail($id);
	    echo json_encode( $rowData );
	}

    public function rute_form($id = "")
    { 
        if ($this->ion_auth->is_admin()){
            if ($id) {
                $row = $this->M_Rute->getDetail($id);
                if ($row) {
                    $data = array(
                    'page_title' => 'Edit Rute',
                    'action' => site_url('rute/update/'.$id),
                    'tujuan' => set_value('tujuan',$row->tujuan),
                    'id_rute' => set_value('id_rute',$row->id_rute),
                    'U20' => set_value('U20',$row->_20),
                    'U40' => set_value('U40',$row->_40),
                    );
                    $this->template->display('admin/rute/rute_form', $data);
                } else {
                    $this->session->set_flashdata('alert', error("Data tidak ditemukan !!"));
                    redirect(site_url('rute'));
                }
            }else {
                $data = array(
                'page_title' => 'Tambah Rute',
                'action' => site_url('rute/add'),
                'tujuan' => set_value('tujuan'),
                'id_konsumen' => set_value('id_konsumen'),
                'id_rute' => set_value('id_rute'),
                'U20' => set_value('U20'),
                'U40' => set_value('U40'),
                );
                $this->template->display('admin/rute/rute_form',$data);
            }
        }
        
    }

    public function add()
    {
        if ($this->ion_auth->is_admin()){
            // Ambil nilai id dari form menggunakan input->post
            $id = $this->input->post('id_rute',TRUE);
            // Ambil nilai tipe yang di pilih di form rute
            $tipe = $this->input->post('tipe',TRUE);
            // Data ditampung untuk di masukan ke database
            $data = array(
                'id_konsumen' => $this->input->post('id_konsumen',TRUE),
                'tujuan' => strtoupper($this->input->post('tujuan',TRUE)),
                '_20' => $this->input->post('U20',TRUE),
                '_40' => $this->input->post('U40',TRUE),
            );

            // Jika id tidak kosong
            if ($id) {
                
                if (empty($this->input->post('tujuan',TRUE))) {
                    $this->session->set_flashdata('alert', error("Kolom Tujuan tidak boleh kosong !"));
                    redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                }
                switch ($tipe) {
                    case '20':
                            if (empty($this->input->post('U20',TRUE))) {
                                $this->session->set_flashdata('alert', error("Kolom Harga Type 20 tidak boleh kosong !"));
                                redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                            }
                            $this->M_Rute->update($id,$data);
                            $this->session->set_flashdata('alert', success("Rute berhasil diperbaharui"));
                            redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                        break;
                    
                    case '40':
                            if (empty($this->input->post('U40',TRUE))) {
                                $this->session->set_flashdata('alert', error("Kolom Harga Type 40 tidak boleh kosong !"));
                                redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                            }
                            $this->M_Rute->update($id,$data);
                            $this->session->set_flashdata('alert', success("Rute berhasil diperbaharui"));
                            redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                        break;
                }
                
            }else {

                if (empty($this->input->post('tujuan',TRUE))) {
                    $this->session->set_flashdata('alert', error("Kolom Tujuan tidak boleh kosong !"));
                    redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                }
                switch ($tipe) {
                    case '20':
                            if (empty($this->input->post('U20',TRUE))) {
                                $this->session->set_flashdata('alert', error("Kolom Harga Type 20 tidak boleh kosong !"));
                                redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                            }
                            $this->M_Rute->insert($data);
                            $this->session->set_flashdata('alert', success("Rute baru berhasil di simpan"));
                            redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                        break;
                    
                    case '40':
                            if (empty($this->input->post('U40',TRUE))) {
                                $this->session->set_flashdata('alert', error("Kolom Harga Type 40 tidak boleh kosong !"));
                                redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                            }
                            $this->M_Rute->insert($data);
                            $this->session->set_flashdata('alert', success("Rute baru berhasil di simpan"));
                            redirect(site_url('konsumen/detail/'.$this->input->post('id_konsumen',TRUE)));
                        break;
                }
            }
        }

    }

    public function delete($id,$konsumens) 
    {
        $row = $this->M_Rute->getDetail($id);

        if ($row) {
            $this->M_Rute->delete($id);
            $this->session->set_flashdata('alert', success("Data berhasil dihapus"));
            redirect(site_url('konsumen/detail/'.$konsumens));
        } else {
            $this->session->set_flashdata('alert', error("Data tidak ditemukan !"));
            redirect(site_url('konsumen/detail/'.$konsumens));
        }
    }
}
