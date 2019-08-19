<?php 
    $rutes = $this->M_Rute->getAllBy(array('id_konsumen' => $this->session->userdata('konsumen_id')));
?>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2 class="page-title">Daftar Pesanan</h2>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Pesanan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- FORM PEMESANAN -->
<div class="container-fluid">

    <!-- begin: TABEL PESANAN -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="tabel-pemesanan" class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No Pemesanan</th>
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
                                            <td><?= $row->id_pesanan ?></td>
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
                                                <?php if($row->status_pengiriman == "PROSES" ):  ?>
                                                    <button type="button" class="btn btn-info btn-sm margin-5 text-white" data-id="<?=$row->id_pesanan?>" data-toggle="modal" data-target="#detail_pesanan" onclick="getDetail(this)" id="add_detail">
                                                        <i class="far fa-file-archive"></i>
                                                        Buat Tagihan
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
    <!-- END: CARD TABLE -->

</div>


<!-- MODAL DETAIL PESANAN -->
<div class="modal fade" id="detail_pesanan">
    <div class="modal-dialog modal-lg" style="min-width: 95%" >
        <div class="modal-content" >
            <form action="<?= base_url('pemesanan/addDetail')?>" method="post" autocomplete="off">
                 
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Add detail</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                <div class="modal-body">
                    <input type="text" id="id_pemesanan" name="id_pemesanan">   
                    <input type="text" id="jumlah" name="jumlah">   
                    <div id="baris"></div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save-settings"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    var table = $('#tabel-pemesanan').dataTable({
            language: {
                search: '<span>Cari:</span> _INPUT_',
                searchPlaceholder: 'Ketik untuk Cari...',
                lengthMenu: '<span>Tampilkan:</span> _MENU_ Baris',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
    });
});

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
                                            <input type="text" class="form-control" id="fname" name="no_kontainer`+i+`" pattern=".{7,}" placeholder="Masukan no kontainer" required oninvalid="setCustomValidity('Kolom ini harus diisi !')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">No Seal</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="fname" name="no_seal`+i+`" placeholder="Masukan no seal" required oninvalid="setCustomValidity('Kolom ini harus diisi !')" oninput="setCustomValidity('')">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-4 text-right control-label col-form-label">Biaya Tambahan</label>
                                        <div class="col-sm-8">
                                            <input type="number" min="0" class="form-control" id="fname" name="biaya`+i+`" placeholder="Masukan biaya" required>
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