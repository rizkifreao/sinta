<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                <?=$page_title ?>
            </h1>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('konsumen') ?> ">Konsumen</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$page_title ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <!-- <p><?php echo lang('edit_user_subheading');?></p> -->
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="col-md-6" style="padding-left: 0px" data-select2-id="16">
    <div class="card">       
      <!-- <form action="<?=$action?>" method="post" autocomplete="off" enctype="multipart/form-data"> -->
      <?=form_open_multipart($action)?>
        <div class='card-body'>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label <?=form_error('nama_konsumen') ? 'text-danger' : ''; ?>">Nama Konsumen</label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?=form_error('nama_konsumen') ? 'is-invalid' : ''; ?>" name="nama_konsumen" id="nama_konsumen" placeholder="Masukan Nama Konsumen" value="<?php echo $nama_konsumen; ?>"/>
              <div class="<?=form_error('nama_konsumen') ? 'invalid-feedback' : '' ?>">
              <?=form_error('nama_konsumen'); ?>
              </div>  
            </div>
          </div>
          
          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label <?=form_error('jabatan') ? 'text-danger' : ''; ?>">Jabatan</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control <?=form_error('jabatan') ? 'is-invalid' : ''; ?>" name="jabatan" id="jabatan" data-toggle="tooltip" placeholder="Masukan Jabatan" value="<?php echo $jabatan; ?>" />
                 <div class="<?=form_error('jabatan') ? 'invalid-feedback' : '' ?>">
                  <?=form_error('jabatan') ?>
                 </div>
            </div>
          </div>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?=form_error('perusahaan') ? 'text-danger' : ''; ?>>Perusahaan</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control <?=form_error('perusahaan') ? 'is-invalid' : ''; ?>" name="perusahaan" id="perusahaan" data-toggle="tooltip" placeholder="Masukan Nama Perusahaan" value="<?php echo $perusahaan;  ?>" value="<?php echo $jabatan; ?>"/>
                 <div class="<?=form_error('perusahaan') ? 'invalid-feedback' : '' ?>">
                 <?=form_error('perusahaan') ?>
                 </div>
            </div>
          </div>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?=form_error('npwp') ? 'text-danger' : ''; ?>>NPWP</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control <?=form_error('npwp') ? 'is-invalid' : ''; ?>" name="npwp" id="npwp" data-toggle="tooltip" placeholder="Masukan Nomor NPWP" value="<?php echo $npwp;  ?>" value="<?php echo $jabatan; ?>"/>
                 <div class="<?=form_error('npwp') ? 'invalid-feedback' : '' ?>">
                 <?=form_error('npwp') ?>
                 </div>
            </div>
          </div>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?=form_error('alamat') ? 'text-danger' : ''; ?>>Alamat</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control <?=form_error('alamat') ? 'is-invalid' : ''; ?>" name="alamat" id="alamat" data-toggle="tooltip" placeholder="Masukan Alamat" value="<?php echo $alamat;  ?>" value="<?php echo $jabatan; ?>"/>
                 <div class="<?=form_error('alamat') ? 'invalid-feedback' : '' ?>">
                 <?=form_error('alamat') ?>
                 </div>
            </div>
          </div>

          <div class="form-group row">
              <label class="col-md-3 control-label col-form-label">Unggah Profil Perusahaan</label>
              <div class="col-md-9">
                  <div class="custom-file">
                      <input type="file" name="dok_MOU">
                  </div>
              </div>
          </div>
          
        </div><!-- end card body -->

        <input type="hidden" name="id_konsumen" value="<?php echo $id_konsumen; ?>" />

          <div class="border-top">
              <div class="card-body">
              <button type="submit" class="btn btn-primary">Simpan</button> 
              <a href="<?php echo site_url('konsumen') ?>" class="btn btn-secondary">Cancel</a>
              </div>
          </div>
      </form>
    </div>
  </div>
</div>