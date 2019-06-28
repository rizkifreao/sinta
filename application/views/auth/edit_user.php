<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                <?php echo strtoupper(lang('edit_user_heading'));?>
            </h1>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
            <div class="text-red"><?php echo $message;?></div>                   
                <div class="card-body">
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
                    <div class="form-group row">
                        <label for="example"class="col-sm-3  control-label col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-9">
                            <?php echo form_input($company);?>
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