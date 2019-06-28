<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsumen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        chek_session();
        $this->load->model("M_Konsumen");
        if (!$this->ion_auth->is_admin()){
            $data['error'] = 'You must be an administrator to view this page.';
            return $this->template->display('errors/error_general',$data);
        }

        //memanggil tabel konsumen melalui model M_konsumen
        
    }

    public function index()
    {
        $data['konsumens'] = $this->M_Konsumen->getAll();
        $this->template->display('admin/konsumen/index',$data);
    }

    public function detailJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->M_Konsumen->getDetail($id);
	    echo json_encode( $rowData );
	}

    public function konsumen_form($id = "")
    { 
        if ($id) {
            $row = $this->M_Konsumen->getDetail($id);
            if ($row) {
                $data = array(
                'page_title' => 'Edit Konsumen',
                'action' => site_url('konsumen/update/'.$id),
                'nama_konsumen' => set_value('nama_konsumen',$row->nama_konsumen),
                'id_konsumen' => set_value('id_konsumen',$row->id_konsumen),
                'perusahaan' => set_value('perusahaan',$row->perusahaan),
                'jabatan' => set_value('jabatan',$row->jabatan),
                'npwp' => set_value('npwp',$row->npwp),
                'alamat' => set_value('alamat',$row->alamat),
                'dok_MOU' => set_value('dok_MOU',$row->dok_MOU),
                );
                $this->template->display('admin/konsumen/konsumen_form', $data);
            } else {
                $this->session->set_flashdata('alert', error("Data tidak ditemukan !!"));
                redirect(site_url('konsumen'));
            }
        }else {
            $data = array(
            'page_title' => 'Tambah Konsumen',
            'action' => site_url('konsumen/add'),
			'nama_konsumen' => set_value('nama_konsumen'),
            'id_konsumen' => set_value('id_konsumen'),
            'perusahaan' => set_value('perusahaan'),
            'jabatan' => set_value('jabatan'),
            'npwp' => set_value('npwp'),
            'alamat' => set_value('alamat'),
            'dok_MOU' => set_value('dok_MOU'),
            );
            $this->template->display('admin/konsumen/konsumen_form',$data);
        }
        
    }

    public function uploadDok($id,$dok_MOU = "")
    {
        $this->load->library('upload');

            if (!empty($dok_MOU)) {
                $config['upload_path'] = './public/documents/dok_MOU/';
                $config['file_types'] = array('image/jpeg','application/pdf','image/png','image/jpeg','application/x-download');
                $config['allowed_types'] = array("pdf","doc","docx","png","jpg","jpeg","gif");
                $config['file_ext_tolower'] = TRUE;
                $config['max_size'] = '20971520';
                $config['overwrite'] = TRUE;
                $x = explode(".", $dok_MOU);
                $ext = strtolower(end($x));
                $config['file_name'] = $id."-MOU.".$ext;
                $mou = $config['file_name'];
                $this->upload->initialize($config);
                $this->upload->do_upload('dok_MOU');
            }

            if (!empty($dok_MOU) && !$this->upload->do_upload('dok_MOU')) {
                $data['err_spk'] = $this->upload->display_errors();
                redirect('konsumen');
            }else{
                $data = array(
                    'dok_MOU' => (!empty($mou)) ? $mou : NULL,
                );
                // var_dump($data);
                $this->M_Konsumen->update($id,$data);
            }
    }

    public function add()
    {
        $this->_validation();
        if ($this->form_validation->run()==FALSE) {
            $this->konsumen_form();
        }else {
            $dok_MOU = $_FILES['dok_MOU']['name'];
            $data = array(
                'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
                'id_konsumen' => $this->input->post('id_konsumen',TRUE),
                'perusahaan' => $this->input->post('perusahaan',TRUE),
                'jabatan' => $this->input->post('jabatan',TRUE),
                'npwp' => $this->input->post('npwp',TRUE),
                'alamat' => $this->input->post('alamat',TRUE),
                'dok_MOU' => (!empty($mou)) ? $mou : NULL,
            );
            $this->M_Konsumen->insert($data);
            $this->uploadDok($this->M_Konsumen->getLast()->id_konsumen,$dok_MOU);
            $this->session->set_flashdata('alert', success("Konsumen baru berhasil di simpan"));
            redirect(site_url('konsumen'));
        }
    }

    public function update($id = "")
    {
        $this->_validation();

        if ($this->form_validation->run() == FALSE) {
            $this->konsumen_form($id, TRUE);
        } else {
            $dok_MOU = $_FILES['dok_MOU']['name'];
            $data = array(
            'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
            'id_konsumen' => $this->input->post('id_konsumen',TRUE),
            'perusahaan' => $this->input->post('perusahaan',TRUE),
            'jabatan' => $this->input->post('jabatan',TRUE),
            'npwp' => $this->input->post('npwp',TRUE),
            'alamat' => $this->input->post('alamat',TRUE),
            );
            $this->M_Konsumen->update($this->input->post('id_konsumen', TRUE),$data);
            if ($dok_MOU) {
                unlink("./public/documents/dok_MOU/".$this->M_Konsumen->getDetail($id)->dok_MOU);
                $this->uploadDok($id,$dok_MOU);
            }
            $this->session->set_flashdata('alert', success("Konsumen berhasil diperbaharui"));
            redirect(site_url('konsumen'));
        }
    }

    public function delete($id) 
    {
        $row = $this->M_Konsumen->getDetail($id);

        if ($row) {
            $this->M_Rute->deleteBy('id_konsumen',$id);
            $this->M_Konsumen->delete($id);
            $this->session->set_flashdata('alert', success("Data berhasil dihapus"));
            redirect(site_url('konsumen'));
        } else {
            $this->M_Konsumen->set_flashdata('alert', error("Data tidak ditemukan !"));
            redirect(site_url('konsumen'));
        }
    }

    public function detail($id)
    {
        $data['konsumens'] = $this->M_Konsumen->getDetail($id);
        $data['rutes'] = $this->M_Rute->getAllBy("id_konsumen = ".$id);
        $data['forms'] =  array(
            'page_title' => 'Tambah Rute',
            'action' => site_url('rute/add'),
			'tujuan' => set_value('tujuan'),
			'id_konsumen' => set_value('id_konsumen'),
            'id_rute' => set_value('id_rute'),
			'U20' => set_value('U20'),
			'U40' => set_value('U40'),
        );
        $this->template->display("admin/konsumen/detail",$data);
    }

    private function _validation()
    {
        $this->form_validation->set_rules('nama_konsumen', 'nama_konsumen', 'trim|required|max_length[25]',
        array('required' =>'*Kolom ini wajib di isi','max-length'=>'Tidak boleh lebih dari 25 char !'));
        $this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required|max_length[13]',
        array('required' =>'*Kolom ini wajib di isi','max-length'=>'Tidak boleh lebih dari 25 char !'));
        $this->form_validation->set_rules('perusahaan', 'perusahaan', 'trim|required|max_length[13]',
        array('required' =>'*Kolom ini wajib di isi','max-length'=>'Tidak boleh lebih dari 25 char !'));
        $this->form_validation->set_rules('npwp', 'npwp', 'trim|required|numeric|max_length[13]',
        array('required' =>'*Kolom ini wajib di isi','numeric'=>'Kolom harus berisi angka !!','max-length'=>'Tidak boleh lebih dari 25 char !'));
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|max_length[13]',
        array('required' =>'*Kolom ini wajib di isi','max-length'=>'Tidak boleh lebih dari 25 char !'));
    }
}
