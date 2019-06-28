<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                Table Groups
            </h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Groups</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
			<div class='row'>
				<div class="col-md-12">
					<div class='box-header with-border'>
						<h3 class='box-title'><a href="<?php echo base_url('groups/create/'); ?>" class="btn btn-primary btn-small">
								<i class="glyphicon glyphicon-plus"></i> + Tambah Data</a></h3>
					</div>
					<hr>
						<div class='table-responsive'>
							<table class="table table-sm table-striped table-bordered" id="mytable" width="100%">
								<thead>
									<tr>
										<th width="30px">#</th>
										<th>Name</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$start = 0;
											foreach ($groups_data as $groups){ ?>
									<tr>
										<td><?php echo ++$start ?></td>
										<td><?php echo $groups->name ?></td>
										<td><?php echo $groups->description ?></td>
										<td style="text-align:center" width="140px">
										<?php 
										// echo anchor(site_url('groups/read/'.$groups->id),'<i class="fa fa-eye"></i>',array('data-toggle'=>'tooltip','title'=>'detail','class'=>'btn btn-info btn-sm')); 
										echo '  '; 
										echo anchor(site_url('groups/update/'.$groups->id),'<i class="fas fa-edit"></i>',array('data-toggle'=>'tooltip','title'=>'edit','class'=>'btn btn-info btn-sm')); 
										echo '  '; 
										echo anchor(site_url('groups/delete/'.$groups->id),'<i class="fas fa-trash-alt"></i>','data-toggle="tooltip" title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
										?>
										</td>
									</tr>
									<?php }	?>
								</tbody>
							</table>					
					
			</div><!-- /.row -->
        </div>
    </div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$("#mytable").dataTable();
	});
</script>
