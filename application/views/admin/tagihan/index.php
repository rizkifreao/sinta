<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h1>Daftar Tagihan</h1>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Daftar Tagihan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <table id="admin_tagihan" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Pesanan</th>
                        <th>Perusahaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach ($tagihan as $row):?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $row->id_pesanan?></td>
                        <td><?= $row->konsumen?></td>
                        <td><button>ASD</button></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>