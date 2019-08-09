<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">KONFIGURASI SISTEM</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sistem</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-6" data-select2-id="16">
        <div class="card">
            <?php echo form_open_multipart(uri_string()); ?> 

                <div class="card-body">
                    <div class="text-red"><?php echo $message;?></div>                   
                    <?php $disabled = 'disabled="disabled"';?>
                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-9">
                            <?php echo form_input($nama_perusahaan);?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Alamat</label>
                        <div class="col-sm-9">
                            <!-- <textarea name="alamat" class="form-control" id="alamat" cols="10" rows="5"><?=$alamat?></textarea> -->
                            <?php echo form_textarea($alamat);?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Telepon</label>
                        <div class="col-sm-9">
                            <?php echo form_input($telp);?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <?php echo form_input($email);?>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Bank</label>
                        <div class="col-sm-9">
                            <?php echo form_input($bank);?>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Cabang Bank</label>
                        <div class="col-sm-9">
                            <?php echo form_input($cabang);?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">No Rekening</label>
                        <div class="col-sm-9">
                            <?php echo form_input($norek);?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Atas Nama</label>
                        <div class="col-sm-9">
                            <?php echo form_input($atas_nama);?>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">NPWP</label>
                        <div class="col-sm-9">
                            <?php echo form_input($npwp);?>
                        </div>
                    </div>   

                    <div class="form-group row">
                        <label for="lname"class="col-sm-3  control-label col-form-label">Direktur</label>
                        <div class="col-sm-9">
                            <?php echo form_input($direktur);?>
                        </div>
                    </div>

                    <div class="form-group row">
                    <label class="col-md-3 control-label col-form-label">Logo</label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <img src="<?=base_url('assets/img/'.$setting->logo)?>" width="100px" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <br><br> 
                    <div class="form-group row">
                        <label class="col-md-3 control-label col-form-label"></label>
                        <div class="col-md-9">
                            <div class="custom-file">
                                <input type="file" name="logo" id="logo" accept="image/x-png,image/jpeg" disabled="disabled">;
                            </div>
                        </div>
                    </div>

                        
                </div>
                <?php echo form_hidden('id_setting', $setting->id);?>
                <div class="border-top">
                    <div class="card-body">
                    <button type="submit" name="submit" id="simpan" class="btn btn-primary" hidden><i class="mdi mdi-content-save-settings"></i> Simpan</button>
                    <button type="button" id="batal" class="btn btn-secondary" hidden><i class="glyphicon glyphicon-hdd"></i> Batal</button>
                    <button type="button" id="edit" class="btn btn-info"><i class="mdi mdi-tooltip-edit"></i> Edit</button>
                    </div>
                </div>
            <?php echo form_close();?>  
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $('#edit').on('click',function () {
        $(this).hide();
        $('#simpan').prop('hidden', false);
        $('#batal').prop('hidden', false);

        $('#alamat').removeAttr('disabled');
        $('#telp').removeAttr('disabled');
        $('#email').removeAttr('disabled');
        $('#bank').removeAttr('disabled');
        $('#cabang').removeAttr('disabled');
        $('#norek').removeAttr('disabled');
        $('#atas_nama').removeAttr('disabled');
        $('#npwp').removeAttr('disabled');
        $('#direktur').removeAttr('disabled');
        $('#logo').removeAttr('disabled');
        $('#nama_perusahaan').removeAttr('disabled');
    });

    $('#batal').on('click',function () {
        $('#batal').prop('hidden', 'true'); 
        $('#simpan').prop('hidden', 'true');
        $('#edit').show(); 

        $('#alamat').attr('disabled', 'disabled');
        $('#telp').attr('disabled', 'disabled');
        $('#email').attr('disabled', 'disabled');
        $('#bank').attr('disabled', 'disabled');
        $('#cabang').attr('disabled', 'disabled');
        $('#norek').attr('disabled', 'disabled');
        $('#atas_nama').attr('disabled', 'disabled');
        $('#npwp').attr('disabled', 'disabled');
        $('#direktur').attr('disabled', 'disabled');
        $('#logo').attr('disabled', 'disabled');
        $('#nama_perusahaan').attr('disabled', 'disabled');

    });
})
</script>