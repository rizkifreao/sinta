<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                <?=$page_title ?>
            </h1>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('uang_jalan') ?> ">Uang Jalan</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$page_title ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <!-- <p></p> -->
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="col-md-6" style="padding-left: 0px" data-select2-id="16">
    <div class="card"> 
    <p><small>&nbsp *Perubahan ppn tidak akan mempengaruhi harga yang sudah di pesan</small></p>      
      <form action="<?=$action?>" method="post" autocomplete="off" >
        <div class='card-body'>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label <?=form_error('deskripsi') ? 'text-danger' : ''; ?>">Nama Jenis</label>
            <div class="col-sm-9">
              <input type="text" class="form-control <?=form_error('deskripsi') ? 'is-invalid' : ''; ?>" name="deskripsi" id="deskripsi" placeholder="Enter Nama Jenis Uang Jalan" value="<?php echo $deskripsi; ?>"/>
              <div class="<?=form_error('deskripsi') ? 'invalid-feedback' : '' ?>">
              <?=form_error('deskripsi'); ?>
              </div>  
            </div>
          </div>
          
          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label <?=form_error('ppn') ? 'text-danger' : ''; ?>">PPN</label>
            <div class="col-sm-9">
              <div class="input-group">
                <input type="number" class="form-control <?=form_error('ppn') ? 'is-invalid' : ''; ?>" name="ppn" id="ppn" data-toggle="tooltip" placeholder="Enter Harga" value="<?= substr($ppn,-5,-1) ?>" data-original-title="Hanya angka, gunakan titik bila decimal" />
                <div class="input-group-append">
                  <span class="input-group-text" id="basic-addon2">%</span>
                </div>
                <div class="<?=form_error('ppn') ? 'invalid-feedback' : '' ?>">
              <?=form_error('ppn') ?>
              </div>
              </div>
              
            </div>
          </div>
          
        </div><!-- end card body -->

        <input type="hidden" name="id_uang_jalan" value="<?php echo $id_uang_jalan; ?>" />

          <div class="border-top">
              <div class="card-body">
              <button type="submit" class="btn btn-primary">Simpan</button> 
              <a href="<?php echo site_url('uang_jalan') ?>" class="btn btn-secondary">Cancel</a>
              </div>
          </div>
      </form>
    </div>
  </div>
</div>