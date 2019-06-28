<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                Tambah Groups
            </h1>
            
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('groups') ?> ">Groups</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-12 d-flex no-block">
            <p><?php echo lang('edit_user_subheading');?></p>
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="col-md-6" data-select2-id="16">
    <div class="card">       
      <form action="<?php echo $action; ?>" method="post">
        <div class='card-body'>

          <div class='form-group row'><?php echo form_error('name') ?>
            <label for="lname"class="col-sm-3  control-label col-form-label">Name</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
            </div>
          </div>
          
          <div class='form-group row'><?php echo form_error('name') ?>
            <label for="lname"class="col-sm-3  control-label col-form-label">Description</label>
            <div class="col-sm-9">
                 <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $description; ?>" />
            </div>
          </div>
        </div><!-- end card body -->

        <input type="hidden" name="id" value="<?php echo $id; ?>" />

          <div class="border-top">
              <div class="card-body">
              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
              <a href="<?php echo site_url('groups') ?>" class="btn btn-default">Cancel</a>
              </div>
          </div>
      </form>
    </div>
  </div>
</div>