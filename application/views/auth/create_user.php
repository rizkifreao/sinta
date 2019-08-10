<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2>
                <?php echo strtoupper(lang('create_user_heading'));?>
            </h2>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-6" data-select2-id="16">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('auth/create_user') ?>" method="post">
                <div class="card-body">
                    <div class="text-red"><?php echo $message;?></div>
                    <h4 class="card-title">Form Tambah Pengguna</h4>
                    <br>
                    <br>
                    <div class="form-group row">
                    <!-- <label for="fname" class="col-sm-3  control-label col-form-label">Anggota dari grup</label> -->
                    <label class="col-md-3">Anggota dari grup</label>
                        <div class="col-md-9" id="pilih_group">
                            <?php foreach ($groups as $group):?>
                                <?php
                                    $gID=$group['id'];
                                    $checked = null;
                                    $item = null;
                                ?>
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="customControlValidation<?php echo $group['id'];?>" name="groups" value="<?php echo $group['id'];?>" required>
                                    
                                    <label class="custom-control-label" for="customControlValidation<?php echo $group['id'];?>">
                                        <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                                    </label>
                                </div>
                            <?php endforeach?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" id="first_name" class="form-control" required oninvalid="setCustomValidity('Nama Depan !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Depan" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3  control-label col-form-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" id="last_name" required oninvalid="setCustomValidity('Nama Belakang !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Belakang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3  control-label col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" required oninvalid="setCustomValidity('Nama Pengguna !')"
                                   oninput="setCustomValidity('')" placeholder="Nama Pengguna">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3  control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" required oninvalid="setCustomValidity('Email Kosong/ Format Tidak Sesuai !')"
                                   oninput="setCustomValidity('')" placeholder="example@example.com">
                        </div>
                    </div>
                    <div class="form-group row" id="pilih_PT">
                        <label for="cono1" class="col-sm-3  control-label col-form-label">Perusahaan</label>
                        <div class="col-sm-9">
                            <?php $konsumens = $this->M_Konsumen->getAll(); ?>
                            <select name="name_toko" id="name_toko" class="form-control" required>
                                <option value="">Pilih Perusahaan</option>
                                <option value="admin">CV MJB</option>
                                <?php foreach ($konsumens as $key):?>
                                    <option value="<?= $key->id_konsumen ?>"><?= $key->perusahaan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3  control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password" required oninvalid="setCustomValidity('Password Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Password (min 8 max 20)">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3  control-label col-form-label">Ulangi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" required oninvalid="setCustomValidity('Ulang Password Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Ulangi Password">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function () {
    $('#name_toko').select2();

    $('#pilih_PT').prop('hidden', 'true');
    $("#name_toko").attr("required", false); 
    $('#pilih_PT').attr('disabled', 'disabled');

    $('#pilih_group input[type=radio]').change(function(){
       let id_group = $(this).val();
        if (id_group == "1") {
            $('#pilih_PT').prop('hidden', 'true');
            $("#name_toko").attr("required", false); 
            $('#pilih_PT').attr('disabled', 'disabled');           
        }else{
            $('#pilih_PT').prop('hidden', false);
        }
    })
})
</script>