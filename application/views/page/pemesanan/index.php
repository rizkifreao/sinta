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
                <label for="lname"class="col-sm-3  control-label col-form-label <?php //form_error('tujuan') ? 'text-danger' : ''; ?>">Tujuan</label>
                <div class="col-sm-9">
                <select id="tujuan" name="tujuan" class="form-control  custom-select">
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
                <label for="lname"class="col-sm-3 text-success  control-label col-form-label <?php //form_error('U20') ? 'text-danger' : ''; ?>">Harga Ukuran 20</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control is-valid <?php //form_error('U20') ? 'is-invalid' : ''; ?>" id="U20_dis" placeholder="Enter Harga" value="<?php //echo $U20; ?>" disabled/>
                    <input type="hidden" name="U20" id="U20" value=""/>
                    <div class="<?php //form_error('U20') ? 'invalid-feedback' : '' ?>">
                        <?php //form_error('U20') ?>
                    </div>
                </div>
                </div>
            </div>

            <div id="F40">
                <div class='form-group row'>
                <label for="lname"class="col-sm-3 text-success  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Harga Ukuran 40</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control is-valid <?php //form_error('U40') ? 'is-invalid' : ''; ?>" id="U40_dis" placeholder="Enter Harga" value="<?php //echo $U40;  ?>" disabled/>
                    <input type="hidden" name="U40" id="U40" value=""/>
                    <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U40') ?>
                    </div>
                </div>
                </div>
            </div>
        
            <div class='form-group row'>
                <label for="lname"class="col-sm-3   control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Nama Barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control  <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="nama_barang" id="nama_barang" placeholder="Masukan nama barang" value="<?php //echo $U40;  ?>"required/>
                    <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U40') ?>
                    </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Jadwal Kirim</label>
                <div class="col-sm-9">
                <div class="input-group">
                    <input type="text" class="form-control tanggal" name="jadwal_kirim" placeholder="dd/mm/yyyy" required>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Jumlah Kontainer</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="jum_kontainer" id="jum_kontainer" placeholder="Masukan jumlah kontainer" value="<?php //echo $U40;  ?>" required/>
                    <div class="<?php //form_error('U40') ? 'invalid-feedback' : '' ?>">
                    <?php //form_error('U40') ?>
                    </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Kapasitas Muatan</label>
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
                        <input type="number" class="form-control <?php //form_error('U40') ? 'is-invalid' : ''; ?>" name="kapasistas" id="kapasistas" placeholder="Masukan nama barang" value="<?php //echo $U40;  ?>" required/>
                    </div>
                </div>
            </div>

            <div class='form-group row'>
                <label for="lname"class="col-sm-3  control-label col-form-label" <?php //form_error('U40') ? 'text-danger' : ''; ?>>Keterangan</label>
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


    <!-- begin: TABEL PESANAN -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="tbl_pesanan" class="table table-sm">;
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Perusahaan</th>
                                        <th>Nama Barang</th>
                                        <th>Kapasitas</th>
                                        <th>Tujuan</th>
                                        <th>Jumlah</th>
                                        <th>Tarif</th>
                                        <th width="80px">Tgl Order</th>
                                        <th width="80px">Jadwal Kirim</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th> Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($pemesanans as $row) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->konsumen ?></td>
                                            <td><?= $row->nama_barang ?></td>
                                            <td><?= $row->kapasitas_muat?></td>
                                            <td><?= $row->tujuan ?></td>
                                            <td><?= $row->jum_kontainer ?></td>
                                            <td><?= rupiah($row->tarif);?></td>
                                            <td><?= tgl_indo($row->tgl_pesan); ?></td>
                                            <td><?= tgl_indo($row->jadwal_kirim); ?></td>
                                            <td><?= $row->keterangan ?></td>
                                            <?= status_kirim($row->status_pengiriman) ?>
                                            
                                            <td>
                                                <?php if($row->jadwal_kirim == date('Y-m-d') ):  ?>
                                                    <button type="button" class="btn btn-warning margin-5 text-white" data-id="<?=$row->id_pesanan?>" data-toggle="modal" data-target="#detail_pesanan" onclick="getDetail(this)" id="add_detail">
                                                        Alert
                                                    </button>

                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
    </div><!-- END: CARD TABLE -->
</div>



<!-- MODAL DETAIL PESANAN -->
<!-- <div class="modal fade" id="detail_pesanan">
    <div class="modal-dialog modal-lg" style="min-width: 95%" >
        <div class="modal-content" >
            <form action="<?= base_url('pemesanan/addDetail')?>" method="post" autocomplete="off">
                  -->
                <!-- Modal Header -->
                <!-- <div class="modal-header">
                <h4 class="modal-title">Add detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div> -->
            
                <!-- Modal body -->
                <!-- <div class="modal-body">
                    <input type="text" id="id_pemesanan" name="id_pemesanan">   
                    <input type="text" id="jumlah" name="jumlah">   
                    <div id="baris"></div>
                </div> -->

                <!-- Modal footer -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save-settings"></i> Simpan</button>
                </div> -->
            <!-- </form>
        </div>
    </div>
</div> -->


<script>
$(document).ready(function() {
    var table = $('#tbl_pesanan').dataTable({
            language: {
                search: '<span>Cari:</span> _INPUT_',
                searchPlaceholder: 'Ketik untuk Cari...',
                lengthMenu: '<span>Tampilkan:</span> _MENU_ Baris',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
    });

    $('.tanggal').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
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

function getDetail(ini) {
    var id = $(ini).attr('data-id');
    $.ajax({
      type: 'GET',
      url: "<?=base_url('');?>pemesanan/detailJson/"+id,
      success: function (data) {
            $('#id_pemesanan').val(id).hide();
            $('#jumlah').val(data.jum_kontainer).hide();
            if (data.jum_kontainer > 0) {
                for (let i = 1; i <= data.jum_kontainer; i++) {
                    $('#baris').append(`
                        Pemesanan `+i+`
                        <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">No Kontainer</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="no_kontainer`+i+`" placeholder="Masukan no kontainer">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">No Seal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="no_seal`+i+`" placeholder="Masukan no seal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Biaya Tambahan</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="fname" name="biaya`+i+`" placeholder="Masukan biaya">
                                        </div>
                                    </div>
                                </div>
                            </div>
                    `);
                }
            }
            $("#detail_pesanan").on("hidden.bs.modal", function(e){
                    $("#baris").html("");
            });           
        }
    });
}

function is_rupiah(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
</script>