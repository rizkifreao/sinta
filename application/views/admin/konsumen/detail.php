<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2>Tambah Rute</h2>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('konsumen') ?> ">Konsumen</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rute</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-6">

                                <div class='form-group row'>
                                    <label for="lname"class="col-sm-3  control-label col-form-label">Nama Konsumen</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $konsumens->nama_konsumen; ?>" disabled/>
                                    </div>  
                                </div>

                                <div class='form-group row'>
                                    <label for="lname"class="col-sm-3  control-label col-form-label">Perusahaan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $konsumens->perusahaan; ?>" disabled/>
                                    </div>  
                                </div>

                                <div class='form-group row'>
                                    <label for="lname"class="col-sm-3  control-label col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $konsumens->jabatan; ?>" disabled/>
                                    </div>  
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class='form-group row'>
                                    <label for="lname"class="col-sm-3  control-label col-form-label">Nomor NPWP</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $konsumens->npwp; ?>" disabled/>
                                    </div>  
                                </div>

                                <div class='form-group row'>
                                    <label for="lname"class="col-sm-3  control-label col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea type="text" class="form-control" value="" disabled><?php echo $konsumens->alamat; ?> </textarea>
                                    </div>  
                                </div>

                                <div class='form-group row'>
                                    <label for="lname"class="col-sm-3  control-label col-form-label">Dokumen MOU</label>
                                    <div class="col-sm-9">
                                    <?php
                                        $url = $konsumens->dok_MOU;
                                        $dokumen = "";
                                        if ($url == "") {
                                            $dokumen = "#";
                                            // $this->session->set_flashdata('alert', error("Dokumen tidak ada"));
                                        }else{
                                            $dokumen = base_url('public/documents/dok_MOU')."/".$konsumens->dok_MOU;
                                        }
                                    
                                    ?>
                                        <a href="<?=$dokumen ?>" target="_blank" class="btn btn-success"> Unduh &nbsp;<i class="mdi mdi-arrow-down-bold-circle"></i></a>
                                    </div>  
                                </div>
                            </div>
                            </div>
                        </div>



                        <!-- TABEL -->
                        <hr>
                        <div class='box-header with-border'>
                        <h3><a href="<?=base_url('konsumen') ?>" class="btn btn-secondary "><i class="mdi mdi-keyboard-backspace"></i>Data Konsumen</a> 
                        <button onclick="clearForm()" type="button" class="btn btn-primary btn-small" data-toggle="modal" data-target="#tambah_modal">
                                    <i class="mdi mdi-library-plus"></i> Tambah Rute
                        </button></h3> 
                        </div>
                        <div class="box-body table-responsive">
                            <table id="table-konsumen" class="table table-sm table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="25px">#</th>
                                        <th>Tujuan</th>
                                        <th>20'</th>
                                        <th>40'</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($rutes as $rute):?>
                                    <tr>
                                        <td><?=$no++ ?></td>
                                        <td><?=$rute->tujuan ?></td>
                                        <td><?="Rp. ".number_format($rute->_20,0,',','.')?></td>
                                        <td><?="Rp. ".number_format($rute->_40,0,',','.')?></td>
                                        <td width="100">
                                            <button onclick="getDetail(this)" data-id="<?=$rute->id_rute?>" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_modal">
                                                    <i class=" fas fa-edit" data-toggle="tooltip" title="Edit"></i>
                                            </button>
                                            <a href="<?=site_url('rute/delete')."/".$rute->id_rute."/".$konsumens->id_konsumen ?>" data-toggle="tooltip" title="" class="btn btn-danger btn-sm fas fa-trash-alt" onclick="javasciprt: return confirm('Apakah anda yakin ?')" data-original-title="Hapus"><i class=""></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
        </div>
    </div>
</div>

<!-- TAMBAH MODALLLLL -->
<div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=$forms['action']?>" method="post" autocomplete="off" >
                    <div class='card-body'>

                    <div class="form-group row">
                        <label for="tipe" class="col-sm-3  control-label col-form-label"> Type </label>
                            <div class="col-sm-9">
                                <select name="tipe" id="tipe" class="form-control  custom-select" required>
                                    <option value="pilih">Pilih Tipe</option>
                                    <option value="20">20'</option>
                                    <option value="40">40'</option>
                                </select>
                            </div>
                    </div>

                    <div class='form-group row'>
                        <label for="lname"class="col-sm-3  control-label col-form-label ">Tujuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="tujuan" id="tujuan" placeholder="Enter Tujuan" value=""/>
                        </div>  
                    </div>
                    
                    <div id="T20">
                    <div class='form-group row'>
                        <label for="lname"class="col-sm-3  control-label col-form-label <?=form_error('U20') ? 'text-danger' : ''; ?>">Ukuran 20</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control " name="U20" id="U20" data-toggle="tooltip" placeholder="Enter Harga" value="" data-original-title="Tanpa tanda koma (,) atau Titik (.)" />
                        </div>
                    </div>
                    </div>

                    <div id="T40">
                    <div class='form-group row'>
                        <label for="lname"class="col-sm-3  control-label col-form-label" <?=form_error('U40') ? 'text-danger' : ''; ?>>Ukuran 40</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="U40" id="U40" data-toggle="tooltip" placeholder="Enter Harga" value=""  data-original-title="Tanpa tanda koma (,) atau Titik (.)"/>
                        </div>
                    </div>
                    </div>
                    
                    </div><!-- end card body -->

                    <input type="hidden" id="id_rute" name="id_rute" value="" />
                    <input type="hidden" name="id_konsumen" value="<?php echo $konsumens->id_konsumen; ?>" />
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button> 
                <a href="" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true ">
    <div class="modal-dialog" role="document ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rute</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true ">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=$forms['action']?>" method="post" autocomplete="off" >
                    <div class='card-body'>

                    <div class="form-group row">
                        <label for="tipe" class="col-sm-3  control-label col-form-label"> Type </label>
                            <div class="col-sm-9">
                                <select name="tipe" id="tipe_det" class="form-control  custom-select" required>
                                    <option value="pilih">Pilih Tipe</option>
                                    <option value="20">20'</option>
                                    <option value="40">40'</option>
                                </select>
                            </div>
                    </div>

                    <div class='form-group row'>
                        <label for="lname"class="col-sm-3  control-label col-form-label ">Tujuan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="tujuan" id="tujuan_det" placeholder="Enter Tujuan" value=""/>
                        </div>  
                    </div>
                    
                    <div id="T20_det">
                    <div class='form-group row'>
                        <label for="lname"class="col-sm-3  control-label col-form-label <?=form_error('U20') ? 'text-danger' : ''; ?>">Ukuran 20</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control " name="U20" id="20_det" data-toggle="tooltip" placeholder="Enter Harga" value="" data-original-title="Tanpa tanda koma (,) atau Titik (.)" />
                        </div>
                    </div>
                    </div>

                    <div id="T40_det">
                    <div class='form-group row'>
                        <label for="lname"class="col-sm-3  control-label col-form-label" <?=form_error('U40') ? 'text-danger' : ''; ?>>Ukuran 40</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="U40" id="40_det" data-toggle="tooltip" placeholder="Enter Harga" value=""  data-original-title="Tanpa tanda koma (,) atau Titik (.)"/>
                        </div>
                    </div>
                    </div>
                    
                    </div><!-- end card body -->

                    <input type="hidden" id="id_rute_det" name="id_rute" value="" />
                    <input type="hidden" name="id_konsumen" value="<?php echo $konsumens->id_konsumen; ?>" />
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button> 
                <a href="" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#T20').prop('hidden', 'true');
    $('#T40').prop('hidden', 'true');
    $('#simpan').prop('disabled', 'true');
    $("#tipe").on('change',function(){
        clearForm();
        if ($("#tipe option:selected").val() == '20') {
             $('#T20').prop('hidden', false);
             $('#T40').prop('hidden', 'true');
             $('#simpan').prop('disabled', false);
        }else if ($("#tipe option:selected").val() == '40') {
             $('#T20').prop('hidden', 'true');
             $('#T40').prop('hidden', false);
             $('#simpan').prop('disabled', false);
        }else{
            $('#T20').prop('hidden', 'true');
            $('#T40').prop('hidden', 'true');
            $('#simpan').prop('disabled', 'true');
        } 
    });

    function getDetail(ini) {
    $('#T20_det').prop('hidden', 'true');
    $('#T40_det').prop('hidden', 'true');
    var id = $(ini).attr('data-id');
    $.ajax({
      type: 'GET',
      url: "<?=base_url('');?>rute/detailJson/"+id,
      success: function (data) {
        //Do stuff with the JSON data
          console.log(data);
          console.log(id);
         $('#id_rute_det').val(id).hide();
         $('#tujuan_det').val(data.tujuan);
         

         if (data._20 != 0) {
            document.getElementById("tipe_det").selectedIndex = "1";
            $('#T20_det').prop('hidden', false);
            $('#20_det').val(data._20);
             $("#tipe_det").on('change', function(){

                if ($("#tipe_det option:selected").val() == '20') {
                    $('#T20_det').prop('hidden', false);
                    $('#20_det').val(data._20);
                    $('#40_det').val("");
                    $('#T40_det').prop('hidden', 'true');
                }else if($("#tipe_det option:selected").val() == '40'){
                    $('#T40_det').prop('hidden', false);
                    $('#T20_det').prop('hidden', 'true');
                    $('#20_det').val("");
                    $('#40_det').val(data._40);
                }
             });
         }else if (data._40 != 0) {
            document.getElementById("tipe_det").selectedIndex = "2";
            $('#T40_det').prop('hidden', false);
            $('#40_det').val(data._40);
            $("#tipe_det").on('change', function(){
                if ($("#tipe_det option:selected").val() == '20') {
                    $('#T20_det').prop('hidden', false);
                    $('#20_det').val(data._20);
                    $('#40_det').val("");
                    $('#T40_det').prop('hidden', 'true');
                }else if($("#tipe_det option:selected").val() == '40'){
                    $('#T40_det').prop('hidden', false);
                    $('#T20_det').prop('hidden', 'true');
                    $('#20_det').val("");
                    $('#40_det').val(data._40);
                }
             });
             
         }
        }
    });
  }
  
    function clearForm() { 
     $('#U20').val("");
     $('#U40').val("");
     $('#tujuan').val("");
     $('#20_det').val("");
     $('#40_det').val("");

  }
</script>

