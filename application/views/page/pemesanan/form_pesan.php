<?php 
    $rutes = $this->M_Rute->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2 class="page-title">Form Pemesanan</h2>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Pemesanan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- FORM PEMESANAN -->
<div class="container-fluid">
    <div class="card">       
    <form action="<?=$action?>" method="post" autocomplete="off" id="form_order" >
        <div class='card-body'>
            <h4 class="card-title"><?=$form_title ?></h4>
            <hr>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label">Tujuan</label>
                <div class="col-sm-9">
                <select id="tujuan" name="tujuan" class="form-control  custom-select" required>
                    <option value="0" data_id="0">Pilih Tujuan</option>
                    <?php foreach ($rutes as $row) :?>
                        <option data_id="<?=$row->id_rute?>" value="<?=$row->tujuan?>"><?=$row->tujuan." | ".$type=($row->_20 ==="0") ? "Type 40" : "Type 20"?></option>
                    <?php endforeach; ?>
                </select>

                <div class="<?php //form_error('tujuan') ? 'invalid-feedback' : '' ?>">
                <?php //form_error('tujuan'); ?>
                </div>  
                </div>
            </div>

            <div id="F20">
                <div class='form-group row'>
                <label for="lname"class="col-sm-3 text-success  control-label col-form-label">Harga Ukuran 20</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control is-valid" id="U20_dis" placeholder="Enter Harga" value="" disabled/>
                    <input type="hidden" name="U20" id="U20" value=""/>
                </div>
                </div>
            </div>

            <div id="F40">
                <div class='form-group row'>
                <label for="lname"class="col-sm-3 text-success  control-label col-form-label">Harga Ukuran 40</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control is-valid" id="U40_dis" placeholder="Enter Harga" value="" disabled/>
                    <input type="hidden" name="U40" id="U40" value=""/>
                    
                </div>
                </div>
            </div>
        
            <div class='form-group row'>
                <label for="lname"class="col-sm-3   control-label col-form-label">Nama Barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="nama_barang" id="nama_barang" placeholder="Masukan nama barang" value="<?php //echo $U40;  ?>"required/>
                    <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U40') ?>
                    </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label">Jadwal Kirim</label>
                <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control tanggal" id="tanggal" name="jadwal_kirim" placeholder="Pilih Tanggal" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label">Jumlah Kontainer</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="jum_kontainer" id="jum_kontainer" min="1" placeholder="Masukan jumlah kontainer" value="<?php //echo $U40;  ?>" required/>
                    <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U40') ?>
                    </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label">Kapasitas Muatan</label>
                <div class="col-sm-9">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span>
                                <select name="satuan" id="" class="form-control">
                                    <option value=" Ton">Ton</option>
                                    <option value=" Kuintal">Kuintal</option>
                                </select>
                            </span>
                        </div>
                        <input type="number" min="1" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="kapasistas" id="kapasistas" placeholder="Masukan nama barang" value="<?php //echo $U40;  ?>" required/>
                    </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label">Keterangan</label>
                <div class="col-sm-9">
                    <textarea class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="keterangan" id="keterangan" placeholder="Masukan Keterangan" value="<?php //echo $U40;  ?>" ></textarea>
                    <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U40') ?>
                    </div>
                </div>
            </div>
        
        </div>
        <!-- end card body -->

        <input type="hidden" name="id_rute" value="<?php //echo $id_rute; ?>" />

        <div class="border-top">
            <div class="card-body">
            <button type="submit" class="btn btn-primary">Simpan</button> 
            <button type="button" id="clearForm" class="btn btn-secondary" onclick="resetForm()">Bersihkan</button>
            </div>
        </div>
    </form>
    </div>

    <!-- END: FORM PEMESANAN -->
</div>

<script>
$(document).ready(function() {
   
    $('#tanggal').datepicker({
        changeYear: true,
        changeMonth: true,
        format: 'yyyy-mm-dd',
        autoclose: true,
        yearRange: "-100:+20",
        minDate: new Date(),
        todayHighlight: true
    });

    $('#F20').prop('hidden', 'true');
    $('#F40').prop('hidden', 'true');

    $("#tujuan").select2().on('change', function(){
        var id = $(this).find(":selected").attr("data_id");
        // console.log(id);
        $.ajax({
            type: 'GET',
            url: "<?=base_url('');?>pemesanan/ruteJson/"+id,
            success: function (response) {
            //Do stuff with the JSON data
                if (response) {
                    if (response._20 === "0") {
                        $('#F20').prop('hidden', 'true');
                        $('#F40').prop('hidden', false);
                        $('#U40_dis').val('Rp. '+is_rupiah(response._40));
                        $('#U40').val(response._40).hide();
                    }else if (response._40 === "0" ){
                        $('#F40').prop('hidden', 'true');
                        $('#F20').prop('hidden', false);
                        $('#U20_dis').val('Rp. '+is_rupiah(response._20));
                        $('#U20').val(response._20).hide();
                    }
                }else{
                    $('#F20').prop('hidden', 'true');
                    $('#F40').prop('hidden', 'true');
                }
            }
        });
    });
});

function resetForm() {
    document.getElementById("form_order").reset();
    $("#tujuan").select2("val", "0");
}

function is_rupiah(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
</script>