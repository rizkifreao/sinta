<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2 class="page-title">Data Pemesanan</h2>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pemesanan</li>
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
                            <table id="tbl_pesanan" class="table table-sm">
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
                                        <th>Action</th>
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
                                                <?php else: echo "";?>

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

<script>
$(document).ready(function() {
    var table = $('#tbl_pesanan').dataTable(table_options);
});

function resetForm() {
    document.getElementById("form_order").reset();
    $("#tujuan").select2("val", "0");
}

function is_rupiah(num) {
  return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
}
</script>