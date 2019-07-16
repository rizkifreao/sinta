<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('dashboard'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span class="hide-menu">Data Master </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="<?= base_url('konsumen'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Konsumen </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url('uang_jalan'); ?>" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu"> Uang Jalan </span></a></li>
                        <li class="sidebar-item"><a href="<?= base_url('auth/member'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> User </span></a></li>
                        <!-- <li class="sidebar-item"><a href="<?= base_url('supir'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Supir </span></a></li> -->
                        <li class="sidebar-item"><a href="<?= base_url('groups'); ?>" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu"> Groups </span></a></li>

                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('pemesanan'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Daftar Pesanan</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('tagihan'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Daftar Tagihan</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?= base_url('laporan'); ?>" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Laporan</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside> 