<?php 
$rutes = $this->M_Rute->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));
?>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2>
                <?=$page_title ?>
            </h2>
            
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
                <option value="pilih">Pilih Tujuan</option>
                <optgroup label="Kota">
                  <?php foreach ($rutes as $row) :?>
                    <option value="<?=$row->id_rute?>"><?=$row->tujuan?></option>
                  <?php endforeach; ?>
                </optgroup>
              </select>

              <div class="<?php //form_error('tujuan') ? 'invalid-feedback' : '' ?>">
              <?php //form_error('tujuan'); ?>
              </div>  
            </div>
          </div>

          <div id="F20">
            <div class='form-group row'>
              <label for="lname"class="col-sm-3  control-label col-form-label <?php //form_error('U20') ? 'text-danger' : ''; ?>">Ukuran 20</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control <?php //form_error('U20') ? 'is-invalid' : ''; ?>" name="U20" id="U20" placeholder="Enter Harga" value="<?php //echo $U20; ?>" disabled />
                  <div class="<?php //form_error('U20') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U20') ?>
                  </div>
              </div>
            </div>
          </div>

          <div id="F40">
            <div class='form-group row'>
              <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Ukuran 40</label>
              <div class="col-sm-9">
                  <input type="text" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="U40" id="U40" placeholder="Enter Harga" value="<?php //echo $U40;  ?>" disabled/>
                  <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                  <?php //form_error('U40') ?>
                  </div>
              </div>
            </div>
          </div>
          
          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Nama Barang</label>
            <div class="col-sm-9">
                <input type="text" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="nama_barang" id="nama_barang" placeholder="Masukan nama barang" value="<?php //echo $U40;  ?>"/>
                <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                <?php //form_error('U40') ?>
                </div>
            </div>
          </div>

          <td><?= $no++ ?></td>
          <td><?= $pemesanan->nama_barang ?></td>
          <td><?= $pemesanan->kapasitas_muat?></td>
          <td><?= $pemesanan->tujuan ?></td>
          <td><?= $pemesanan->jum_kontainer ?></td>
          <td><?= rupiah($pemesanan->tarif)?></td>
          <td><?= tgl_indo($pemesanan->tgl_kirim) ?></td>
          <td><?= tgl_indo($pemesanan->jadwal_kirim) ?></td>
          <td><?= $pemesanan->keterangan ?></td>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Jadwal Kirim</label>
            <div class="col-sm-9">
              <div class="input-group">
                <input type="text" class="form-control tanggal" name="jadwal_kirim" placeholder="dd/mm/yyyy">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
            </div>
          </div>

          <div class='form-group row'>
            <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Keterangan</label>
            <div class="col-sm-9">
                <textarea class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" value="<?php //echo $U40;  ?>"></textarea>
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
  $(document).ready(function(){
    $('#F20').prop('hidden', 'true');
    $('#F40').prop('hidden', 'true');
    
    $("#tujuan").select2().on('change', function(){
      var id = $(this).find(":selected").val();

      $.ajax({
        type: 'GET',
        url: "<?=base_url('');?>rute/detailJson/"+id,
        success: function (response) {
          //Do stuff with the JSON data
          if (response._20 === "0") {
            $('#F20').prop('hidden', 'true');
            $('#F40').prop('hidden', false);
            $('#U40').val('Rp. '+response._40);
          }else if (response._40 === "0" ){
            $('#F40').prop('hidden', 'true');
            $('#F20').prop('hidden', false);
            $('#U20').val('Rp. '+response._20);
          }
          }
      });
    });
  });
</script>