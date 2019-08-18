<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2>
                Profil Pengguna
            </h2>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <p>Data personal pengguna</p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-6" data-select2-id="16">
        <div class="card">
            <div class="card-body">
                    <h3 class="profile-username text-center"><?php echo $first_name,' ',$last_name ;?></h3>
                    <br><br>
                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                            <?php echo form_input('',$username,'readonly');?>
                        </div>
                    </div>                                           
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-9">
                            <?php
                                $konsumen_id = $this->session->userdata('konsumen_id');
                                $perusahaan = ($this->ion_auth->is_admin())? $this->M_Sistem_setting->getDetail()->nama_perusahaan : $this->M_Konsumen->getDetail($konsumen_id)->perusahaan;
                                echo form_input('',$perusahaan,'readonly');
                            ?>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Alamat Email</label>
                        <div class="col-sm-9">
                            <?php echo form_input('',$email,'readonly');?>
                        </div>
                    </div>                      
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <?php echo form_input('',$phone,'readonly');?>
                        </div>
                    </div> 
                </div>
               
                <div class="border-top">
                    <div class="card-body">
                    <a href="<?php echo base_url('auth/edit_profil/'.$id) ?>" class="btn btn-primary btn-block"><b>Edit</b></a>
                    </div>
                </div>   
        </div>
    </div>
</div>