<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    private $path = "";
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        chek_session();
        if ($this->ion_auth->is_admin()) {
            $this->path = "admin";
        }else {
            $this->path = "page";
        }
    }

    public function test()
    {
        $kondisi_pesanan = array('status_pengiriman !=' => 'BATAL', );
        echo $this->M_Pesanan->CountPesananBy($kondisi_pesanan);
    }

    public function index()
    {
        if ($this->ion_auth->is_admin()) {
            $data = $this->dataAdmin();
        }else {
            // CountPemesanan
            $kondisi_pesanan = array('status_pengiriman !=' => 'BATAL', 'id_konsumen' => $this->session->userdata('konsumen_id') );
            $data['jum_pemesanan'] = $this->M_Pesanan->CountPesananBy($kondisi_pesanan);
            $kondisi_pesanan_batal = array('status_pengiriman' => 'BATAL', 'id_konsumen' => $this->session->userdata('konsumen_id') );
            $data['jum_pemesanan_batal'] = $this->M_Pesanan->CountPesananBy($kondisi_pesanan_batal);
        }

        $this->template->display($this->path.'/dashboard/index',$data);
    }

    public function TotalHargaPemesananTahun($tahun)
    {
        header('Content-Type: application/json');
        
        if ($this->ion_auth->is_admin()) {
            $konsumen = $this->M_Konsumen->getAllby(array(
            'is_delete ' => 0
            ),'ASC');
        }else {
            $konsumen = $this->M_Konsumen->getAllby(array(
            'id_konsumen' => $this->session->userdata('konsumen_id'),
            'is_delete ' => 0
            ),'ASC');
        }
        $response['results'] = [];
        $response['bulan'] = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $response['total_harga'] = 0;

        foreach ($konsumen as $key) {
            $data = [];
            for ($i=1; $i <= 12 ; $i++) { 
                $kondisi = array(
                    'id_konsumen' => ($this->ion_auth->is_admin()) ? $key->id_konsumen : $this->session->userdata('konsumen_id'),
                    'month(tgl_pesan)' => $i,
                    'year(tgl_pesan)' => $tahun );

                $kondisi2 = array(
                    'pemesanan.id_konsumen' => ($this->ion_auth->is_admin()) ? $key->id_konsumen : $this->session->userdata('konsumen_id'),
                    'month(tgl_pesan)' => $i,
                    'year(tgl_pesan)'=> $tahun );
                
                array_push($data,
                    $this->M_Pesanan->TotPesananBy($kondisi,$kondisi2)
                );

                $response['total_harga'] += $this->M_Pesanan->TotPesananBy($kondisi,$kondisi2);
            }
            array_push($response['results'],array(
                'name' => $key->perusahaan,
                'data' => $data,
                'tooltip' => ['valuePrefix' => 'Rp. ']
            ));
        }

        echo json_encode($response);
    }

    public function pesananPerTahun($tahun)
    {
        header('Content-Type: application/json');
        if ($this->ion_auth->is_admin()) {
            $konsumen = $this->M_Konsumen->getAllby(array(
            'is_delete ' => 0
            ),'ASC');
        }else {
            $konsumen = $this->M_Konsumen->getAllby(array(
            'id_konsumen' => $this->session->userdata('konsumen_id'),
            'is_delete ' => 0
            ),'ASC');
        }
        $response['results'] = [];
        $response['bulan'] = ['Januari','Febuari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
        $response['total'] = 0;
        // $id,$bulan,$tahun

        foreach ($konsumen as $key) {
            $data = [];
            for ($a=1; $a <= 12; $a++) { 
                array_push($data,
                    $this->M_Pesanan->CountPesananBy(array(
                        'id_konsumen' => ($this->ion_auth->is_admin()) ? $key->id_konsumen : $this->session->userdata('konsumen_id'),
                        'month(tgl_pesan)' => $a,
                        'year(tgl_pesan)' => $tahun,
                        'status_pengiriman !=' => 'BATAL'
                    ))
                );
                $response['total'] += $this->M_Pesanan->CountPesananBy(array(
                    'id_konsumen' => ($this->ion_auth->is_admin()) ? $key->id_konsumen : $this->session->userdata('konsumen_id'),
                    'month(tgl_pesan)' => $a,
                    'year(tgl_pesan)' => $tahun,
                    'status_pengiriman !=' => 'BATAL'
                ));
            }

            array_push($response['results'],array(
                'name' => $key->perusahaan,
                'data' => $data
            ));
        }

        echo json_encode($response);    
    }

    public function dataAdmin()
    {
        // Total Jumlah user
        $this->db->where('id !=',$this->session->userdata('user_id'));
        $this->db->from("tb_users");
        $data['jum_user'] = $this->db->count_all_results();

        $kondisi_pesanan = array('status_pengiriman !=' => 'BATAL', );
        $this->db->where($kondisi_pesanan);
        $this->db->from("pemesanan");
        $data['jum_pemesanan'] = $this->db->count_all_results();

        
        $pesana_batal = array('status_pengiriman =' => 'BATAL', );
        $this->db->where($pesana_batal);
        $this->db->from("pemesanan");
        $data['jum_pemesanan_batal'] = $this->db->count_all_results();

        $kondisi_konsumen = array('is_delete =' => 0, );
        $this->db->where($kondisi_konsumen);
        $this->db->from("konsumen");
        $data['jum_konsumen'] = $this->db->count_all_results();

        // echo json_encode($data);
        return $data;
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
