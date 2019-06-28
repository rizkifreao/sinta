<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>Rute</h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
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
                        <div class="box-body table-responsive">
                            <table id="table-rute" class="table table-sm table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="25px">#</th>
                                        <th>TUJUAN</th>
                                        <th>20'</th>
                                        <th>40'</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $n=1; foreach ($rutes as $rute) : ?>
                                        <tr>
                                            <td align="center"><?= $n++ ?></td>
                                            <td><?= $rute->tujuan ?></td>
                                            <td><?= "Rp. " . number_format($rute->_20, 0, ".", ",") ?></td>
                                            <td><?= "Rp. " . number_format($rute->_40, 0, ".", ",") ?></td>
                                            <!-- <td style="text-align:center" width="140px">
                                                <a href="<?=site_url('rute/update')."/".$rute->id_rute ?>"><i class="btn btn-info btn-sm fas fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                                                <a href="<?=site_url('rute/delete')."/".$rute->id_rute ?>" data-toggle="tooltip" title="" class="btn btn-danger btn-sm fas fa-trash-alt" onclick="javasciprt: return confirm('Apakah anda yakin ?')" data-original-title="Hapus"><i class=""></i></a>
                                            </td> -->
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
        $('#table-rute').DataTable();
    });
</script>