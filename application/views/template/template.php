<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Project Akhir">
    <meta name="author" content="Sinta">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="50x50" href="<?= base_url('assets/img') ?>/logos.png">
    <title>Dashboard | Cv.Maju Bersama Sejahtera</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <!-- SELECT -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb-admin') ?>/assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb-admin') ?>/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb-admin') ?>/assets/libs/daterangepicker/css/daterangepicker.css">

    <link href="<?= base_url('assets/sb-admin') ?>/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/sb-admin') ?>/assets/extra-libs/multicheck/multicheck.css">
    <link href="<?= base_url('assets/sb-admin') ?>/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="<?= base_url('assets/sb-admin') ?>/assets/libs/toastr/build/toastr.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .table th {
            text-align: center;
            font-weight: bold;
        }
        .text-red {
            color: red;
        }
        #notif {
            border: none;
            border-radius: 0;
            bottom: 0;
            color: #fff;
            display: none;
            left: 0;
            margin-bottom: 0;
            position: fixed;
            text-align: center;
            width: 100%;
            z-index: 9999999999;
        }

        .alert-success {
            background: #4caf50;
        }

        .alert-error {
            background: #f44336;
        }

        #success,
        #failed {
            color: #fff !important;
            display: none;
        }
    </style>
</head>

<body>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- SELECT2 -->
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/moment/min/moment.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/daterangepicker/js/daterangepicker.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url('assets/sb-admin') ?>/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url('assets/sb-admin') ?>/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('assets/sb-admin') ?>/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="<?= base_url('assets/sb-admin') ?>/dist/js/pages/dashboards/dashboard1.js"></script> -->

    <!-- SELECT2 -->
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/select2/dist/js/select2.min.js"></script>

    


    <!-- Charts js Files -->
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/excanvas.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/jquery.flot.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/jquery.flot.time.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/dist/js/pages/chart/chart-page-init.js"></script>
    <!-- TABLE js -->
    <script src="<?= base_url('assets/sb-admin') ?>/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script src="<?= base_url('assets/sb-admin') ?>/assets/libs/toastr/build/toastr.min.js"></script>

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" class="mini-sidebar">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->

        <?php echo $_header; ?>
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php if ($this->ion_auth->is_admin()) {
            echo $_sidebar_admin;
        }
        else {
            echo $_sidebar_klien;
        } ?>
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <?php echo $_content; ?>
            <!-- footer -->
            <!-- ============================================================== -->
            
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <?php
    if ($this->session->flashdata('alert')) {
        echo $this->session->flashdata('alert');
    } ?>
    
    <script type="text/javascript">
    $(document).ready(function () {
        // $("#notif").delay(350).slideDown('slow');
        // $("#notif").alert().delay(3000).slideUp('slow');

        $('.tanggal').datepicker({
            format: 'dd/mm/yyyy',
            autoclose: true,
            todayHighlight: true
        });
    });
    </script>

</body>

</html>