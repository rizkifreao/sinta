<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                <?=$page_title ?>
            </h1>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('rute') ?> ">Rute</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$page_title ?></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <!-- <p><?php //echo lang('edit_user_subheading');?></p> -->
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="col-md-6" style="padding-left: 0px" data-select2-id="16">
    <div class="card">       
      <form action="<?=$action?>" method="post" autocomplete="off" >
        <div class='card-body'>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label <?php //form_error('tujuan') ? 'text-danger' : ''; ?>">Tujuan</label>
            <div class="col-sm-9">
              <select id="tujuan" class="form-control  custom-select">
                <option value="">Pilih Tujuan</option>
                <optgroup label="Kota">
                  <?php foreach ($tujuan as $row) :?>
                    <option value="<?=$row->id_rute?>"><?=$row->tujuan?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>

              <div class="<?php //form_error('tujuan') ? 'invalid-feedback' : '' ?>">
              <?php //form_error('tujuan'); ?>
              </div>  
            </div>
          </div>
          
          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label <?php //form_error('U20') ? 'text-danger' : ''; ?>">Ukuran 20</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control <?php //form_error('U20') ? 'is-invalid' : ''; ?>" name="U20" id="U20" data-toggle="tooltip" placeholder="Enter Harga" value="<?php //echo $U20; ?>" disabled />
                 <div class="<?php //form_error('U20') ? 'invalid-feedback' : '' ?>">
                  <?php //form_error('U20') ?>
                 </div>
            </div>
          </div>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Ukuran 40</label>
            <div class="col-sm-9">
                 <input type="number" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="U40" id="U40" data-toggle="tooltip" placeholder="Enter Harga" value="<?php //echo $U40;  ?>" value="<?php //echo $U20; ?>" data-original-title="Tanpa tanda koma (,) atau Titik (.)"/>
                 <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                 <?php //form_error('U40') ?>
                 </div>
            </div>
          </div>
          
        </div><!-- end card body -->

        <input type="hidden" name="id_rute" value="<?php //echo $id_rute; ?>" />

          <div class="border-top">
              <div class="card-body">
              <button type="submit" class="btn btn-primary">Simpan</button> 
              <a href="<?php //echo site_url('rute') ?>" class="btn btn-secondary">Cancel</a>
              </div>
          </div>
      </form>
    </div>
  </div>
</div>

<script>
  $("#tujuan").select2().on('change', function(){
    var id = $(this).find(":selected").val();

    $.ajax({
      type: 'GET',
      url: "<?=base_url('');?>rute/detailJson/"+id,
      success: function (data) {
        //Do stuff with the JSON data
          console.log(data);
        //  $('#pelangganid').val(id).hide();
         $('#U20').val("Rp. "+data._20);
        //  $('#notelp').val(data.notelp);
        //  $('#alamat').val(data.alamat);
        //  $('#nopolisi').val(data.nopolisi);
        //  $('#jenisid').val(data.jenisid);
        //  $('#merkid').val(data.merkid);
        }
    });
    
  });
</script>