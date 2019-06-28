<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function index()
	{
		$this->load->view('page/FrontPage');
	}

	public function pemesanan(){

		$data["nama_perusahaan"] = $this->input->post("nama_perusahaan");
		$data["asal"] = $this->input->post("asal");
		$data["tujuan"] = $this->input->post("tujuan");
		$data["keterangan"] = $this->input->post("keterangan");
		$data["jenis_kontainer"] = $this->input->post("jenis_kontainer");
		$data["nama_barang"] = $this->input->post("nama_barang");
		$data["kapasitas_muat"] = $this->input->post("kapasitas");
		$data["tgl_kirim"] = $this->input->post("tgl_kirim");

		$this->M_Pesanan->add($data);
		$this->session->set_flashdata('sucsess','Berhasil Menyimpan Data !!');
		redirect(base_url());
	}
}
