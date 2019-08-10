<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2>
                <?php echo strtoupper(lang('edit_user_heading'));?>
            </h2>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ubah Pengguna</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <p><?php echo lang('edit_user_subheading');?></p>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-6" data-select2-id="16">
        <div class="card">
            <?php echo form_open(uri_string()); ?> 
            <div class="card-body">
                    <div class="text-red"><?php echo $message;?></div>                   
                    <h3><?php echo lang('edit_user_groups_heading');?></h3>
                    <?php foreach ($groups as $group):?>
                        
                        <?php
                            $gID=$group['id'];
                            $checked = null;
                            $item = null;
                            foreach($currentGroups as $grp) {
                                if ($gID == $grp->id) {
                                    $checked= ' checked="checked"';
                                break;
                                }
                            }
                        ?>
                        <div class="custom-control custom-radio" id="pilih_group">
                            <input type="radio" class="custom-control-input" id="customControlValidation<?php echo $group['id'];?>" name="groups" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                            
                            <label class="custom-control-label" for="customControlValidation<?php echo $group['id'];?>">
                                <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
                            </label>
                        </div> 
                        
                    <?php endforeach?>
                    <br><br>
                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <?php echo form_input($first_name);?>
                        </div>
                    </div>                                           
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <?php echo form_input($last_name);?>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                            <?php echo form_input($username);?>
                        </div>
                    </div>
                    
                    <div class="form-group row" id="pilih_company">
                        <label for="example"class="col-sm-3  control-label col-form-label">Perusahaan</label>
                        <div class="col-md-9">
                            <select name="company" id="companyy" class="form-control" required>
                                <option value="0">Pilih Perusahaan</option>
                                <?php foreach ($konsumens as $key):?>
                                    <option value="<?= $key->id_konsumen ?>" <?=($konsumens_selected == $key->id_konsumen) ? 'selected' : '' ?> ><?= $key->perusahaan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                      
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Telpn</label>
                        <div class="col-sm-9">
                            <?php echo form_input($phone);?>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <?php echo lang('edit_user_password_label', 'password');?> <br />
                        <?php echo form_input($password);?>
                    </div> 
                    <div class="form-group row">
                        <?php echo lang('edit_user_password_confirm_label', 'password_confirm');?><br />
                        <?php echo form_input($password_confirm);?>
                    </div>
                    
                </div>
                <?php echo form_hidden('id', $user->id);?>
                <?php echo form_hidden($csrf); ?>
                <div class="border-top">
                    <div class="card-body">
                    <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                    <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
                <?php echo form_close();?>
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#companyy').select2();

        if ("<?= $currentGroups[0]->id?>" == "1") {
            $('#pilih_company').prop('hidden', 'true');
            $('#companyy').attr('required', false); 
            $('#pilih_company').attr('disabled', 'disabled');
        }

        $('#pilih_group input[type=radio]').change(function(){
        let id_group = $(this).val();
            if (id_group == "1") {
                $('#pilih_company').prop('hidden', 'true');
                $("#companyy").attr("required", false); 
                $('#pilih_company').attr('disabled', 'disabled');           
            }else{
                $('#pilih_company').removeAttr('disabled'); 
                $('#pilih_company').prop('hidden', false);
                $("#companyy").attr("required", true); 
            }
        })
    })
</script>

