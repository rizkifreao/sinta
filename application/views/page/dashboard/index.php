<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2 class="page-title">Dashboard</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
   <div class="row">
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-file-document"></i></h1>
                    <h5 class="m-b-0 m-t-5 text-white"><?= $jum_pemesanan ?></h5>
                    <h6 class="text-white">Jumlah Pesanan</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-file-excel"></i></h1>
                    <h5 class="m-b-0 m-t-5 text-white"><?= $jum_pemesanan_batal ?></h5>
                    <h6 class="text-white">Jumlah Pesanan Batal</h6>
                </div>
            </div>
        </div>
   </div>

   <div class="card-transparent">
        <div class="card shadow">
            <!-- <h4 class="card-header" width="100">Revenue <span class="tag tag-success" id="revenue-tag">$15,341,110</span>
            </h4> -->
            <div class="card-header">
                <div class="row" style="margin-bottom: -10px">
                    <div class="col-md-9">
                        <h4 style="margin-top: 10px">Total Pesanan <span class="tag tag-success" id="revenue-tag"></span> Pesanan
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-8 text-right control-label col-form-label" style="margin-top: 5px"><h6>Tahun</h6></label>
                            <div class="col-sm-4">
                                <select name="tahun" id="tahun" class="form-control">
                                    <?php
                                    $mulai= date('Y') - 50;
                                    $thn_skr = date('Y');
                                    for($i = $mulai;$i<=$thn_skr; $i++){
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-block">
                <div id="myChart" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>

        <div class="card shadow">
            <!-- <h4 class="card-header" width="100">Revenue <span class="tag tag-success" id="revenue-tag">$15,341,110</span>
            </h4> -->
            <div class="card-header">
                <div class="row" style="margin-bottom: -10px">
                    <div class="col-md-9">
                        <h4 style="margin-top: 10px">Total Harga : <span class="tag tag-success" id="tot_harga"></span>
                        </h4>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group row">
                            <label for="fname" class="col-sm-8 text-right control-label col-form-label" style="margin-top: 5px"><h6>Tahun</h6></label>
                            <div class="col-sm-4">
                                <select name="tahun" id="tahun_harga" class="form-control">
                                    <?php
                                    $mulai= date('Y') - 50;
                                    $thn_skr = date('Y');
                                    for($i = $mulai;$i<=$thn_skr; $i++){
                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                        echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card-block">
                <div id="TotPemesanan" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
        </div>
   </div>

   <!-- <div class="row m-b-1">
        <div class="col-xs-12">
            <div class="card shadow">
                <h4 class="card-header">Revenue <span class="tag tag-success" id="revenue-tag">$15,341,110</span>
                </h4>
                <div class="card-block">
                    <div id="revenue-column-chart"></div>
                </div>
            </div>
        </div>
    </div> -->

</div>
<script>
    var options;
    var options_harga;
    var url;
    var url_total;
    $(document).ready(function() {
        $('#tahun').select2();
        var d = new Date();
        var thn_skrg = d.getFullYear();
        // tahun = $('#tahun').val();

        options = {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Pemesanan Tahun '+ thn_skrg
            },
            credits: {
                enabled: false
            },
            subtitle: {
                text: 'Pemesanan Semua Konsumen'
            },
            xAxis: {
                categories: [],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Pesanan'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.0f} pesanan</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: []
        };

        options_harga = {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Total Harga Pemesanan '+ thn_skrg
            },
            credits: {
                enabled: false
            },
            subtitle: {
                text: 'Total harga pemesanan konsumen per bulan'
            },
            xAxis: {
                categories: [],
                crosshair: true
            },
            yAxis: {
                // min: 0,
                tickInterval: 1000000,
                labels: {
                    formatter: function() {
                        if (this.value >= 0) {
                            // return 'Rp. ' + this.value
                            return 'Rp. ' + formatRupiah(this.value)
                        } else {
                            return 'Rp. ' + formatRupiah(this.value)
                        }
                    }
                },
                title: {
                    text: 'Pesanan'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [],
            // exporting: {
            //     showTable: true,
            //     allowHTML: true
            // }
        };

        $('#tahun').on('change',function () {
            var sel_tahun = $(this).val();
            if (sel_tahun == thn_skrg) {
                urll = "<?=base_url('dashboard/pesananPerTahun')?>/"+thn_skrg;
                options.title.text = 'Jumlah Pemesanan Tahun '+thn_skrg;
                $("#revenue-tag").html("");
                Jum_Pemesanan(options,url);
            }else{
                url = "<?=base_url('dashboard/pesananPerTahun')?>/"+sel_tahun ;
                options.title.text = 'Jumlah Pemesanan Tahun '+sel_tahun;
                $("#revenue-tag").html("");
                Jum_Pemesanan(options,url);
            }
        });

        $('#tahun_harga').on('change',function () {
            var sel_tahun = $(this).val();
            if (sel_tahun == thn_skrg) {
                url = "<?=base_url('dashboard/TotalHargaPemesananTahun')?>/"+thn_skrg;
                options_harga.title.text = 'Total Harga Pemesanan '+thn_skrg;
                $("#tot_harga").html("");
                Tot_Pemesanan(options_harga,url);
            }else{
                url = "<?=base_url('dashboard/TotalHargaPemesananTahun')?>/"+sel_tahun ;
                options_harga.title.text = 'Total Harga Pemesanan '+sel_tahun;
                $("#tot_harga").html("");
                Tot_Pemesanan(options_harga,url);
            }
        });

        url = "<?=base_url('dashboard/pesananPerTahun')?>/"+thn_skrg;
        Jum_Pemesanan(options,url);

        url_total = "<?=base_url('dashboard/TotalHargaPemesananTahun')?>/"+thn_skrg;
        Tot_Pemesanan(options_harga,url_total);

    });

    function Jum_Pemesanan(options,url) {
        $.getJSON(url,  function(data) {
            var hasil = data.results;
            $('#revenue-tag').append(data.total);
            options.xAxis.categories = data.bulan;
            
            $.each(hasil,(index)=>{
                options.series[index] = hasil[index];
            });
            var chart = new Highcharts.Chart('myChart',options);
            
        });
    }

    function Tot_Pemesanan(options,url) {
        $.getJSON(url,  function(data) {
            var hasil = data.results;
            $('#tot_harga').append('Rp. '+ formatRupiah(data.total_harga));
            options.xAxis.categories = data.bulan;
            
            $.each(hasil,(index)=>{
                options.series[index] = hasil[index];
            });

            Highcharts.setOptions({
                lang: {
                    thousandsSep: ',',
                    numericSymbols: [" k" , " Jt" , " M" , " T" , "P" , "E"]
                },
            });
            $('#TotPemesanan').highcharts(options);
            // var chart_pesanan = new Highcharts.Chart('TotPemesanan',options);
            
        });
    }

    function formatRupiah(bilangan){
		
        var	reverse = bilangan.toString().split('').reverse().join(''),
            ribuan 	= reverse.match(/\d{1,3}/g);
            ribuan	= ribuan.join('.').split('').reverse().join('');

        // Cetak hasil // Hasil: 23.456.789
        return ribuan;
    }
</script>