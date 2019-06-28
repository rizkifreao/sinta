<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>Tabel Uang Jalan</h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Uang Jalan</li>
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
                            <h3><a href="<?php echo base_url('uang_jalan/add'); ?>" class="btn btn-primary btn-small">
                                    <i class="glyphicon glyphicon-plus"></i> + Tambah Data </a></h3>
                        </div>
                        <hr>
                        <div class="box-body table-responsive">
                            <table id="tb_uang_jalan" class="table table-sm table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Potongan</th>                                                           
                                        <th>Action</th>                                
                                    </tr>
                                </thead>
                            <?php
                            $no=1;                  
                            foreach ($potongan as $row){ 
                                echo"
                                    <tr>
                                    <td>$no</td>
                                    <td>".$row->deskripsi."</td>
                                    <td>".$row->ppn."</td>
                                    ";?>
                                    <?php echo"
                                    <td style='text-align:center' width='140px'>" . anchor('uang_jalan/update/'.$row->id_uang_jalan, '<i class="btn btn-info btn-sm fas fa-edit" data-toggle="tooltip" title="Edit"></i>') . "&nbsp". anchor('uang_jalan/delete/' . $row->id_uang_jalan, '<i class="btn btn-danger fas fa-trash-alt btn-sm" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")) . "</td>
                                    </tr>";
                                $no++;
                            }
                            ?>
                            </table> 
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#tb_uang_jalan").dataTable();
    });
</script>