<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    private $path = "";
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jakarta");
        if ($this->ion_auth->is_admin()) {
            $this->path = "admin";
        }else {
            $this->path = "page";
        }
        $this->M_Pesanan->updateStatus();
        chek_session();
    }

    public function index()
    {
        $data = array(
            'form_title' => 'Form Pemesanan',
            'action' => site_url('pemesanan/pesan'),
        );

        if ($this->ion_auth->is_admin()) {
            $data["pemesanans"] = $this->M_Pesanan->getAllBy(array(
                'status_pengiriman !=' => "BATAL",
                'is_tagihan !=' => 1,
            ));
        } else {
            $data["pemesanans"] = $this->M_Pesanan->getAllBy(array(
                'id_konsumen' => $this->session->userdata('konsumen_id')
            ));            
        }
        $this->template->display($this->path."/pemesanan/index", $data);
    }

    public function ruteJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->M_Rute->getDetail($id);
	    echo json_encode( $rowData );
	}

     public function detailJson($id){
	    header('Content-Type: application/json');
		$rowData = $this->M_Pesanan->getDetail($id);
	    echo json_encode( $rowData );
    }
    

    public function addDetail()
    {
        if ($this->ion_auth->is_admin()) {

            $id_pemesanan = $this->input->post('id_pemesanan',TRUE);
            $jumlah = $this->input->post('jumlah',TRUE);
            $data = array();
            for ($i=1; $i <= $jumlah; $i++) { 

                // VALIDASI TIDAK 7
                if (strlen($this->input->post('no_kontainer'.$i)) !==7) {
                    $this->session->set_flashdata('alert', error("No Kontainer di Pemesanan ".$i." tidak sama dengan 7 "));
                    redirect('pemesanan');
                    break;
                }else{
                    // LOLOS VALIDASI
                    array_push($data, array(
                        'pemesanan_id' => $id_pemesanan,
                        'no_kontainer' => $this->input->post('no_kontainer'.$i,TRUE),
                        'no_seal' => $this->input->post('no_seal'.$i,TRUE),
                        'biaya_tambahan' => $this->input->post('biaya'.$i,TRUE)
                    ));
                }
            }
            
            // MASUKAN DETAIL PESANAN KE DATABASE
            $this->M_DetailPesanan->bulk_insert($data);

            // PERUBAHAN DATA PEMESANAN
            $pemesanan = array(
                'is_tagihan' => 1,
                'status_pengiriman'=>'SELESAI'
            );
            // UPDATE STATUS DATA PEMESANAN
            $this->M_Pesanan->update($id_pemesanan, $pemesanan);

            $this->session->set_flashdata('alert', success("Data berhasil disimpan"));
            redirect('pemesanan');
        }else{
            $this->session->set_flashdata('alert', error("Tidak diizinkan"));
            redirect('pemesanan');
        }
    }

    public function cek_status_kirim()
    {
        echo date('Y-m-d');
    }

    public function pesan()
    {
        $U20 = $this->input->post('U20',TRUE);
        $U40 = $this->input->post('U40',TRUE);
        $jum_pesanan = $this->input->post('jum_kontainer',TRUE);
        $data = array(
            'id_konsumen' => $this->session->userdata('konsumen_id'),
            'konsumen' => $this->M_Konsumen->getDetail($this->session->userdata('konsumen_id'))->perusahaan,
            'nama_barang' => $this->input->post('nama_barang',TRUE),
            'kapasitas_muat' => $this->input->post('kapasistas',TRUE).$this->input->post('satuan',TRUE),
            'tujuan' => $this->input->post('tujuan',TRUE),
            'jum_kontainer' => $jum_pesanan,
            'tipe'=>($U20) ? "20'" : "40'",
            '_20' => $U20,
            '_40' => $U40,
            'tarif' => ($U20) ? $U20 : $U40,
            'total_tarif'=> ($U20) ? $U20 * $jum_pesanan : $U40 * $jum_pesanan,
            'tgl_pesan' => date("Y-m-d"),
            'jadwal_kirim' => $this->input->post('jadwal_kirim',TRUE),
            'status_pengiriman' => ($this->input->post('jadwal_kirim',TRUE) == date('Y-m-d')) ? 'PROSES' : 'PENDING',
            'keterangan' => $this->input->post('keterangan',TRUE),
        );

        $pilih = $this->input->post('tujuan',TRUE);
        if ($pilih === "0") {
            $this->session->set_flashdata('alert', error("Tujuan belum dipilih !!"));
            redirect(site_url('pemesanan'));
        }else{
            $this->M_Pesanan->insert($data);
            $this->session->set_flashdata('alert', success("Terimakasih sudah memesan kepada kami"));
            redirect(site_url('pemesanan'));
        }    
    }
    
    public function test()
    {
        $pph = "2%";
        $nilai = (float) $pph / 100;
        $ppn = 0.5;
        $harga = 200000;

        echo $nilai;
    }
}
