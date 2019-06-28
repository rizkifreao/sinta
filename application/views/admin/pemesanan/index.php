<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Pemesanan</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div>
                <button type="button" class="btn btn-primary btn-sm">+ Tambah Data</button>
                <hr>
            </div>
            <div class="table-responsive">
                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="table-rute" class="table table-sm table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perusahaan</th>
                                        <th>Jenis Kontainer</th>
                                        <th>Asal</th>
                                        <th>Tujuan</th>
                                        <th>Nama Barang</th>
                                        <th>Kapasitas</th>
                                        <th>Tarif</th>
                                        <th>Tgl Kirim</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($pemesanans as $pemesanan) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $pemesanan->nama_perusahaan ?></td>
                                            <td><?= $pemesanan->jenis_kontainer ?></td>
                                            <td><?= $pemesanan->asal ?></td>
                                            <td><?= $pemesanan->tujuan ?></td>
                                            <td><?= $pemesanan->nama_barang ?></td>
                                            <td><?= $pemesanan->kapasitas_muat ?></td>
                                            <td><?= $pemesanan->tarif ?></td>
                                            <td><?= $pemesanan->tgl_kirim ?></td>
                                            <td><?= $pemesanan->keterangan ?></td>
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


</div>

<script>
    $(document).ready(function() {
        $('#table-rute').DataTable();
    });
</script>