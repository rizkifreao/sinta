<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfigurasi extends CI_Controller
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

    public function testt()
    {
        $logos = $_FILES['logo']['name'];
        $additional_data = array(
            'nama_perusahaan' => strtolower($this->input->post('nama_perusahaan')),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'bank' => strtolower($this->input->post('bank')),
            'cabang' => strtolower($this->input->post('cabang')),
            'norek' => $this->input->post('norek'),
            'atas_nama' => strtolower($this->input->post('atas_nama')),
            'npwp' => $this->input->post('npwp'),
            'direktur' => strtolower($this->input->post('direktur')),
        );

        echo json_encode($additional_data);
    }

    public function index()
    {
        $id = 0 ;
        $data_setting = $this->M_Sistem_setting->getDetail();
        $this->form_validation->set_rules('nama_perusahaan', "Nama Perusahaan", 'required');
        $this->form_validation->set_rules('alamat', "Alamat", 'required');
        $this->form_validation->set_rules('telp', "Telepon", 'required|trim');
        $this->form_validation->set_rules('email', "Email", 'required|valid_email');
        $this->form_validation->set_rules('bank', "Bank", 'required');
        $this->form_validation->set_rules('cabang', "Cabang Bank", 'required');
        $this->form_validation->set_rules('norek', "No Rekening", 'required');
        $this->form_validation->set_rules('atas_nama', "Atas Nama", 'required');
        $this->form_validation->set_rules('npwp', "No NPWP", 'required');
        $this->form_validation->set_rules('direktur',"Direktur", 'required');

        if (isset($_POST) && !empty($_POST)) {
            // do we have a valid request?
            if ($this->form_validation->run() === TRUE) {
                // if ($this->input->post('id_setting',TRUE)) {
                    $logos = $_FILES['logo']['name'];
                    $additional_data = array(
                        'nama_perusahaan' => strtoupper($this->input->post('nama_perusahaan')),
                        'alamat' => $this->input->post('alamat'),
                        'telp' => $this->input->post('telp'),
                        'email' => $this->input->post('email'),
                        'bank' => strtoupper($this->input->post('bank')),
                        'cabang_bank' => strtoupper($this->input->post('cabang')),
                        'no_rekening' => $this->input->post('norek'),
                        'atas_nama' => strtoupper($this->input->post('atas_nama')),
                        'npwp' => $this->input->post('npwp'),
                        'direktur' => strtoupper($this->input->post('direktur')),
                    );
                    if ($logos) {
                        unlink("./assets/img/".$data_setting->logo);
                        $this->uploadLogo($id,$logos);
                    }
                    $this->M_Sistem_setting->update($additional_data);
                    $this->session->set_flashdata('alert', success("Berhasil diperbaharui"));
                    redirect('konfigurasi');
                }else {
                    $this->session->set_flashdata('alert', error("Gagal diperbaharui"));
                    redirect('konfigurasi');
                }
            // }
        }
        
        $data['message'] = validation_errors();
        $data['setting'] = $data_setting;
        $data['nama_perusahaan'] = array(
            'name' => 'nama_perusahaan',
            'id' => 'nama_perusahaan',
            'type' => 'text',
            'value' => $this->form_validation->set_value('nama_perusahaan', $data_setting->nama_perusahaan),
            'disabled' => 'disabled',
        );
        $data['alamat'] = array(
            'name' => 'alamat',
            'id' => 'alamat',
            'value' => $this->form_validation->set_value('alamat', $data_setting->alamat),
            'rows' => '3',
            'class' => 'form-control',
            'cols' => '10',
            'disabled' => 'disabled',
        );
        $data['telp'] = array(
            'name' => 'telp',
            'id' => 'telp',
            'type' => 'text',
            'value' => $this->form_validation->set_value('telp', $data_setting->telp),
            'disabled' => 'disabled',
        );
        $data['email'] = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'email',
            'value' => $this->form_validation->set_value('email', $data_setting->email),
            'disabled' => 'disabled',
        );
        $data['bank'] = array(
            'name' => 'bank',
            'id' => 'bank',
            'type' => 'text',
            'value' => $this->form_validation->set_value('bank', $data_setting->bank),
            'disabled' => 'disabled',
        );
        $data['cabang'] = array(
            'name' => 'cabang',
            'id' => 'cabang',
            'type' => 'text',
            'value' => $this->form_validation->set_value('cabang', $data_setting->cabang_bank),
            'disabled' => 'disabled',
        );
        $data['norek'] = array(
            'name' => 'norek',
            'id' => 'norek',
            'type' => 'text',
            'value' => $this->form_validation->set_value('norek', $data_setting->no_rekening),
            'disabled' => 'disabled',
        );
        $data['atas_nama'] = array(
            'name' => 'atas_nama',
            'id' => 'atas_nama',
            'type' => 'text',
            'value' => $this->form_validation->set_value('atas_nama', $data_setting->atas_nama),
            'disabled' => 'disabled',
        );
        $data['npwp'] = array(
            'name' => 'npwp',
            'id' => 'npwp',
            'type' => 'text',
            'value' => $this->form_validation->set_value('npwp', $data_setting->npwp),
            'disabled' => 'disabled',
        );
        $data['direktur'] = array(
            'name' => 'direktur',
            'id' => 'direktur',
            'type' => 'text',
            'value' => $this->form_validation->set_value('direktur', $data_setting->direktur),
            'disabled' => 'disabled',
        );
        // echo json_encode($data);
        $this->template->display('admin/konfigurasi/index',$data);
    }

    public function uploadLogo($id,$logos = "")
    {
        $this->load->library('upload');

            if (!empty($logos)) {
                $config['upload_path'] = './assets/img/';
                $config['file_types'] = array('image/jpeg','image/png','application/x-download');
                $config['allowed_types'] = array("png","jpg","jpeg");
                $config['file_ext_tolower'] = TRUE;
                $config['max_size'] = '20971520';
                $config['overwrite'] = TRUE;
                $x = explode(".", $logos);
                $ext = strtolower(end($x));
                $config['file_name'] = "Logo.".$ext;
                $gambar = $config['file_name'];
                $this->upload->initialize($config);
                $this->upload->do_upload('logo');
            }

            if (!empty($logos) && !$this->upload->do_upload('logo')) {
                $this->session->set_flashdata('alert', error($this->upload->display_errors()));
                redirect('konfigurasi');
            }else{
                $data = array(
                    'logo' => (!empty($gambar)) ? $gambar : NULL,
                );
                // var_dump($data);
                $this->M_Sistem_setting->update($data);
            }
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
