<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>
                <?php echo strtoupper(lang('create_user_heading'));?>
            </h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="col-md-6" data-select2-id="16">
        <div class="card">
            <form class="form-horizontal" action="<?= base_url('auth/create_user') ?>" method="post">
            <div class="text-red"><?php echo $message;?></div>
                <div class="card-body">
                    <h4 class="card-title">Form Buat Pengguna</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3  control-label col-form-label">Nama Depan</label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" id="first_name" class="form-control" required oninvalid="setCustomValidity('Nama Depan !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Depan" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3  control-label col-form-label">Nama Belakang</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="last_name" id="last_name" required oninvalid="setCustomValidity('Nama Belakang !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Nama Belakang">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3  control-label col-form-label">Nama Pengguna</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" required oninvalid="setCustomValidity('Nama Pengguna !')"
                                   oninput="setCustomValidity('')" placeholder="Nama Pengguna">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3  control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" required oninvalid="setCustomValidity('Email Kosong/ Format Tidak Sesuai !')"
                                   oninput="setCustomValidity('')" placeholder="example@example.com">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3  control-label col-form-label">Nama Perusahaan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name_toko" id="name_toko" required oninvalid="setCustomValidity('Email Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Alamat email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3  control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password" required oninvalid="setCustomValidity('Password Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Masukan Password (min 8 max 20)">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="cono1" class="col-sm-3  control-label col-form-label">Ulangi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password_confirm" id="password_confirm" required oninvalid="setCustomValidity('Ulang Password Kosong !')"
                                   oninput="setCustomValidity('')" placeholder="Ulangi Password">
                        </div>
                    </div>

                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="javascript:history.back()" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>