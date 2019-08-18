<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class NotificationModels extends CI_Model {

    var $table_name = "notifikasi";
    var $pk = "id_notif";
    var $order = 'DESC';
    // var $broker_id = $this->session->userdata('broker_id');

    function getAll() {
        $penerima = $this->session->userdata('user_id');
        $query = $this->db->query(
            "SELECT * FROM notifikasi WHERE penerima = '$penerima' ORDER BY id_notif DESC LIMIT 5"
        );
        $output = '';
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row)
            {
                $id_konsumen = $this->ion_auth->user($row['pengirim'])->row();
                $perusahaan = '';
                if ($this->ion_auth->is_admin()) {
                    $perusahaan = $this->M_Konsumen->getDetail($id_konsumen->id_konsumen)->perusahaan;
                }else { $perusahaan = $this->M_Sistem_setting->getDetail->nama_perusahaan; }
                $output .= '
                            <a href="'.base_url('pemesanan').'" class="link border-top">
                                <div class="d-flex no-block align-items-center p-10">
                                    <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
                                    <div class="m-l-10">
                                        <h5 class="m-b-0">'.$perusahaan.'</h5>
                                        <span class="mail-desc">'. $row['keterangan'].'</span>
                                    </div>
                                </div>
                            </a>
                            ';
                // return $output;
            }
        } else {
            echo '
                    <a href="javascript:void(0)">
                        <h4>
                        Tidak ada notifikasi !!
                        </h4>
                    </a>
                ';
        }
        return $output;
        // return $query->row_array();
    }

    function countNotif(){
        $penerima = $this->session->userdata('user_id');
        $query = $this->db->query("SELECT * FROM notifikasi WHERE status_notif = 'FALSE' AND penerima = '$penerima' ");
        $count = $query->num_rows();
        return $count;
    }
    
    function add($data) {
        $this->db->insert($this->table_name, $data);
    }

    function getDetail($id) {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id_debitur',$id);
        return $this->db->get()->row();
        
    }
    
    function update($id) {
        
        $this->db->where('penerima', $id);
        $this->db->update($this->table_name,array('status_notif' => 'TRUE'));
    }

    function upadateNotif(){
        $this->db->where('status','FALSE');
        $this->db->update($this->table_name,array('status' => 'TRUE'));
    }
    
    function delete($id) {
        $this->db->where($this->pk,$id);
        $this->db->update($this->table_name,array('deleted_at' => date('Y-m-d'), 'is_deleted' => 'TRUE'));
    }

    function restoreDelete($id)
    {
        if ($this->ion_auth->is_admin()) {
            $this->db->where($this->pk,$id);
            $this->db->update($this->table_name,array('deleted_at' => NULL));
        }else {
            echo "Maaf hanya admin yang dapat memakai fungsi ini";
        }
    }
}