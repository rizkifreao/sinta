<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PT ALMUSTIKA BIRU UTAMA</title>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/jquery.bxslider.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/animate.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets') ?>/css/styleAku.css">
</head>

<body>

    <div class="loader"></div>
    <div id="myDiv">
        <!--HEADER-->
        <div class="header">
            <div class="bg-color">
                <header id="main-header">
                    <nav class="navbar navbar-default navbar-fixed-top">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">

                                </button>
                                <a class="navbar-brand" href="#">PT ALMUSTIKA BIRU UTAMA</a>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active"><a href="#main-header">Home</a></li>
                                    <li class=""><a href="#feature">Layanan Kami</a></li>
                                    <li class=""><a href="#BookingOrder">Pemesanan</a></li>
                                    <li class=""><a href="#contact">Kontak</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>


                </header>
                <div class="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="banner-info text-center wow fadeIn delay-05s">
                                <h2 class="bnr-sub-title">Logistics, Freight Forwarding, and Cargo Container</h2>
                                <p class="bnr-para">PT. Almustika Biru Utama (AMBU Logistics) is a locally owned and operated International Freight Forwarding Company established in 2015 under the name CV. MAJU BERSAMA SEJAHTERA</p>
                                <div class="overlay-detail">
                                    <a href="#feature"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--/ HEADER-->
        <!---->

        <section id="feature" class="section-padding wow fadeIn delay-05s">
            <h1 style="text-align: center;"> Mengapa Memesan Melalui Kami ? </h1>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wrap-item text-center">
                            <div class="item-img ">
                                <img src="<?= base_url('assets') ?>/img/32.png" style="width: 100px">
                            </div>
                            <h3 class="pad-bt15">Jaringan Terluas dan Terlengkap</h3>
                            <p>Dengan lebih dari 90 kantor cabang yang tersebar di Indonesia, GoTraveler menghadirkan berbagai pilihan produk dan layanan perjalanan ke berbagai destinasi domestik dan internasional</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="<?= base_url('assets') ?>/img/6.png" style="width: 100px">
                            </div>
                            <h3 class="pad-bt15">Jaminan Pelayanan Terbaik</h3>
                            <p>Jaminan layanan perencanaan dan pemesanan produk perjalanan wisata yang mudah dan murah, didukung dengan konfirmasi singkat dan proses yang akurat.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="<?= base_url('assets') ?>/img/8.png" style="width: 100px">
                            </div>
                            <h3 class="pad-bt15">Transaksi Aman dan Terpercaya</h3>
                            <p>Transaksi perjalanan Anda dijamin aman, didukung dengan sistem teknologi reservasi dan verifikasi terkini yang terpercaya.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="wrap-item text-center">
                            <div class="item-img">
                                <img src="<?= base_url('assets') ?>/img/5.png" style="width: 100px">
                            </div>
                            <h3 class="pad-bt15">Hotline 24 jam</h3>
                            <p>Jangan sungkan untuk menghubungi kami. Siap melayani 24 jam setiap harinya, dimanapun Anda berada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="destinasi" class="section-padding wow fadeIn delay-05s">
            <div class="container">
                <form action="welcome/pemesanan" method="post">
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <h2 class="service-title pad-bt15" id=BookingOrder>Pemesanan</h2>
                            <hr class="bottom-line">
                        </div>

                        <div class="col-lg-6">
                            <label for="example-date-input" class="col-2 col-form-label">Nama Perusahaan</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="nama_perusahaan" placeholder="Enter Nama Perusahaan">
                            </div>

                            <label for="example-date-input" class="col-2 col-form-label">Asal</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="asal" placeholder="Enter Kota Asal">
                            </div>

                            <label for="example-date-input" class="col-2 col-form-label">Tujuan</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="tujuan" placeholder="Enter Kota Tujuan">
                            </div>

                            <label for="example-date-input" class="col-2 col-form-label">Keterangan (bila ada)</label>
                            <div class="col-10">
                            
                                <textarea class="form-control" type="text" id="example-date-input" name="keterangan" placeholder="Enter Keterangan"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <label for="example-date-input" class="col-2 col-form-label">Jenis Kontainer</label>
                            <select class="form-control" id="getHotel" name="jenis_kontainer">
                                <option value="" selected="">Pilih Kontainer</option>
                                <option value="20">20 feet</option>
                                <option value="40">40 feet</option>
                            </select>

                            <label for="example-date-input" class="col-2 col-form-label">Nama Barang</label>
                            <div class="col-10">
                                <input class="form-control" type="text" id="example-date-input" name="nama_barang" placeholder="Enter Nama Barang">
                            </div>

                            <label for="example-date-input" class="col-2 col-form-label">Kapasitas</label>
                            <div class="col-10">
                                <input class="form-control" type="number" id="example-date-input" name="kapasitas" placeholder="Enter Kapasitas Muat">
                            </div>
                            
                            <label for="example-date-input" class="col-2 col-form-label">Tanggal Pengiriman</label>
                            <div class="col-10">
                                <input class="form-control" type="date" id="example-date-input" name="tgl_kirim" placeholder="Enter Kapasitas Muat">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="container" style="margin-top: 50px">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Booking Order</button>
            </div>
            </form>
            <div class="container">
                <nav aria-label="Page navigation example">
                    <ul class="pagination right">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>

            </div>
        </section>
        <!---->
        <!---->
        <section id="contact" class="section-padding wow fadeInUp delay-05s">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center white">
                        <h2 class="service-title pad-bt15">Questions?</h2>
                        <hr class="bottom-line white-bg">
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="loction-info white">
                            <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Jl.Sindang Reret<br>Jawa Barat, Bandung 40625</p>
                            <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@gotraveler.com</p>
                            <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+62 8964 9919 875</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form">
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>

                            <form action="" method="post" role="form" class="contactForm">
                                <div class="col-md-6 padding-right-zero">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                        <div class="validation"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-submit">SEND NOW</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!---->
        <!---->
        <footer id="footer">
            <div class="container">
                <div class="row text-center">
                    <p>&copy; 2018 SINTA WULANSARI</p>
                </div>
            </div>
    </div>
    </footer>
    <!---->
    </div>
    <script src="<?= base_url('assets') ?>/js/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/wow.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery.bxslider.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/custom.js"></script>
    <script src="<?= base_url('assets') ?>/contactform/contactform.js"></script>

</body>

</html> 