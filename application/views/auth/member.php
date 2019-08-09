<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1><?php echo strtoupper(lang('index_heading'));?></h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <?php echo lang('index_subheading');?>            
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
                            <h3 class='box-title'><a href="<?php echo base_url('auth/create_user'); ?>" class="btn btn-primary btn-small">
                                    <i class="glyphicon glyphicon-plus"></i> <?php echo "+ ". lang('index_create_user_link');?></a></h3>
                        </div>
                        <hr>
                        <div class="box-body table-responsive">
                            <table id="mytable" class="table table-sm table-striped table-bordered" width="100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama User</th>
                                        <th>Nama Lengkap</th>
                                        <th>Alamat Email</th>
                                        <th>Nama Perusahaan</th> 
                                        <th>Telpn</th>   
                                        <th>Status</th>                                                           
                                        <th>Grup</th>                                                           
                                        <th>Action</th>                                
                                    </tr>
                                </thead>
                            <?php
                            $no=1;                  
                            foreach ($tb_users as $user){
                                if ($this->session->userdata('user_id') == $user->id) {
                                    # code...
                                }
                                else{
                                    $grup = "Admin";
                                    $pt = $this->M_Sistem_setting->getDetail()->nama_perusahaan;
                                    if ($this->ion_auth->in_group(2,$user->id)) {
                                        $grup = "Konsumen";
                                        $pt = $this->M_Konsumen->getDetail($user->id_konsumen)->perusahaan;
                                    }
                                    echo"
                                    <tr>
                                    <td>".$no++."</td>
                                    <td>".$user->username."</td>
                                    <td>".strtoupper($user->first_name),' ',strtoupper($user->last_name)."</td>
                                    <td>".$user->email."</td>
                                    <td>".strtoupper($pt)."</td> 
                                    <td>".$user->phone."</td>
                                    ";?>                        
                                    <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>
                                    <?php echo"
                                    <td>". $grup."</td> 
                                    <td>" . anchor('auth/edit_user/'.$user->id, '<i class="btn btn-info btn-sm fas fa-edit" data-toggle="tooltip" title="Edit"></i>') . "&nbsp". anchor('auth/delete/' . $user->id, '<i class="btn btn-danger fas fa-trash-alt btn-sm" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")) . "</td>
                                    </tr>";
                                }
                            }
                            ?>
                            </Table> 
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>
        </div>
    </div>
</div>
</section><!-- /.content -->
<script type="text/javascript">
    $(document).ready(function () {
        $("#mytable").dataTable();
    });
</script>