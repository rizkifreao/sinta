<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>Konsumen</h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Konsumen</li>
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
                        <div class='box-header with-border'>
                            <!-- <h3><a href="<?php echo base_url('konsumen/add'); ?>" class="btn btn-primary btn-small"><i class="glyphicon glyphicon-plus"></i> + Tambah Data </a></h3> -->
                        </div>
                        <hr>
                        <div class="box-body table-responsive">
                            <table id="table-konsumen" class="table table-sm table-striped table-bordered" >
                                <thead>
                                    <tr>
                                        <th width="25px">#</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Perusahaan</th>
                                        <th>NPWP</th>
                                        <th width="200">Alamat</th>
                                        <th>Rute</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach ($konsumens as $row): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row->nama_konsumen ?></td>
                                        <td><?= $row->jabatan ?></td>
                                        <td><?= $row->perusahaan ?></td>
                                        <td><?= $row->npwp ?></td>
                                        <td><?= $row->alamat ?></td>
                                        <td>Rute</td>
                                        <td>
                                            <a href="<?=site_url('konsumen/detail')."/".$row->id_konsumen ?>"><i class="btn btn-primary btn-sm mdi mdi-eye" data-toggle="tooltip" title="Detail"></i></a>
                                            <a href="<?=site_url('konsumen/update')."/".$row->id_konsumen ?>"><i class="btn btn-info btn-sm fas fa-edit" data-toggle="tooltip" title="Ubah"></i></a>
                                            <a href="<?=site_url('konsumen/delete')."/".$row->id_konsumen ?>" data-toggle="tooltip" title="" class="btn btn-danger btn-sm fas fa-trash-alt" onclick="javasciprt: return confirm('Apakah anda yakin ?')" data-original-title="Hapus"><i class=""></i></a>
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
<script>
    $(document).ready(function() {
        $('#table-konsumen').DataTable();
    });
</script>