<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h2>Laporan Pemesanan</h2>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?> ">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan Pemesanan</li>
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
                        <form action="<?=$action?>" method="POST" autocomplete="off">
                            <input type="hidden" id="perusahaan" name="perusahaan" value="<?= $this->session->userdata('konsumen_id')?>">
                            <div class="row">
                                <!-- beign::KOLOM1 -->
                                <div class="col-md-6">
                                    <div class='form-group'>
                                        <label for="lname"class="control-label col-form-label" >Tanggal Periode</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="tanggalPeriodeAwal" name="value_from_start_date" placeholder="Pilih tanggal awal"  data-datepicker="separateRange" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">s/d</span>
                                                </div>
                                                <input type="text" class="form-control" id="tanggalPeriodeAkhir" name="value_from_end_date" placeholder="Pilih tanggal akhir" data-datepicker="separateRange" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-default"><i class="mdi mdi-arrow-down-bold-circle"></i>Download Laporan</button>
                                </div>
                                <!-- beign::KOLOM1 -->
                                
                            </div>
                        </form>

                        <br>
                        <br>
                        <!-- <div class="table-responsive">
                            <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12"> -->
                                        <table id="tabel_laporan" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Barang</th>
                                                    <th>Kapasitas</th>
                                                    <th>Tujuan</th>
                                                    <th>Jumlah</th>
                                                    <th>Tipe</th>
                                                    <th width="80px">Total Tarif</th>
                                                    <th>Tgl Pesan</th>
                                                    <th>Jadwal Kirim</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    
                                                    <th colspan=5>TOTAL</th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    <!-- </div>
                                </div>
                            </div>
                        </div> -->
                    </div><!-- /.box -->
                </div>
            </div>
        </section>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#tabel_laporan').DataTable(table_options);

    // $("#perusahaan").select2();

    var separator = ' - ', dateFormat = 'YYYY-MM-DD';
    var options = {
        autoUpdateInput: false,
        autoApply: true,
        locale: {
            format: dateFormat,
            separator: separator,
            applyLabel: '確認',
            cancelLabel: '取消',
            daysOfWeek: [
                "Min",
                "Sen",
                "Sel",
                "Rab",
                "Kam",
                "Jum",
                "Sab"
            ],
            monthNames: [
                "Januari",
                "Februari",
                "Maret",
                "April",
                "Mei",
                "Juni",
                "Juli",
                "Agustus",
                "September",
                "Oktober",
                "November",
                "Desember"
            ],
        },
        // minDate: moment().add(1, 'days'),
        // maxDate: moment().add(359, 'days'),
        opens: "right"
    };

    // SET FIELD TANGGAL
    $('[data-datepicker=separateRange]')
        .daterangepicker(options)
        .on('apply.daterangepicker' ,function(ev, picker) {
            var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
            var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

            var mainName = this.name.replace('value_from_start_', '');
            if(boolEnd) {
                mainName = this.name.replace('value_from_end_', '');
                $(this).closest('form').find('[name=value_from_end_'+ mainName +']').blur();
            }

            $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val(picker.startDate.format(dateFormat));
            $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val(picker.endDate.format(dateFormat));

            $(this).trigger('change').trigger('keyup');
        })
        .on('show.daterangepicker', function(ev, picker) {
            var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
            var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
            var mainName = this.name.replace('value_from_start_', '');
            if(boolEnd) {
                mainName = this.name.replace('value_from_end_', '');
            }

            var startDate = $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val();
            var endDate = $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val();

            $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
            $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');
            
            if(boolEnd) {
                $('[name=daterangepicker_end]').focus();
            }
    });
    
    // EVENT KETIKA TANGGAL DIPILIH
    $('[data-datepicker=separateRange]').on('change', function (ev) {
        if ($('#tanggalPeriodeAkhir').val() != '' && $('#tanggalPeriodeAwal').val() != '') {
            var startDate = $('#tanggalPeriodeAwal').val().replace(/\//g, '');
            var endDate = $('#tanggalPeriodeAkhir').val().replace(/\//g, '');
            var konsumenId = $('#perusahaan').val();

            // console.log(startDate +" "+endDate);
            drawTabel(konsumenId, startDate, endDate);
        }else {
            toastr.error('Pilih tanggal periode', 'Error');
        }

    });

    $('#perusahaan').on('change', function (ev) {
        if ($('#tanggalPeriodeAkhir').val() != '' && $('#tanggalPeriodeAwal').val() != null) {
        var startDate = $('#tanggalPeriodeAwal').val().replace(/\//g, '');
        var endDate = $('#tanggalPeriodeAkhir').val().replace(/\//g, '');
        var konsumenId = $('#perusahaan').val();

        // alert(konsumenId);
        drawTabel(konsumenId, startDate, endDate);
        }else {
            toastr.error('Pilih tanggal periode', 'Error');
        }
    });

});

function drawTabel(konsumenId, startDate, endDate){
    // console.log(konsumenId);
    // console.log(startDate);
    // console.log(konsumenId);
    
    var t = $('#tabel_laporan').DataTable();
    t.destroy();
    var table = $('#tabel_laporan').DataTable({
        // "processing": true,
        // "serverSide": true,
        // dom: 'Bfrtip',
        // buttons: [
        //     'copy', 'csv', 'excel', 'pdf', 'print'
        // ],
        language: {
            "emptyTable": "Tidak ada data yang tersedia pada tabel ini",
            "zeroRecords": "Tidak ada catatan yang cocok ditemukan",
            "info": "Menampilkan _START_ - _END_ dari _TOTAL_ baris",
            "infoEmpty": "Tidak ada yang ditampilkan",
            "search": "Cari:",
            'searchPlaceholder': 'Ketik untuk mencari...',
            "lengthMenu": "Tampilkan _MENU_ baris",
            "infoFiltered":   "(difilter dari _MAX_ total baris)",
            "paginate": {
                "first": "<<",
                "last": ">>",
                "next": $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
                "previous": $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
            },
        },
        autoWidth: true,
        // "scrollY": 250,
        scrollX: 500,
        ajax: {
            "url": "<?=base_url('laporan')?>/reloadbydate/"+konsumenId+"/"+startDate+"/"+endDate,
            "type": "GET",
            "dataSrc": function ( json ) {
            //Make your callback here.
            if (json.data.length == 0) {
                toastr.error('Data tidak ditemukan !', 'Error');
            }
                return json.data;
            }
        },
        order: [[ 0, 'asc' ]],
        footerCallback: function ( row, data, start, end, display ) {
            var api = this.api();
            var nb_cols = 7
            var j = 6;
            while(j < nb_cols){
                var pageTotal = api
                        .column( j, { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return Number(a) + Number(b);
                        }, 0 );
                // Update footer
                var numFormat = $.fn.dataTable.render.number( '.', ',', 0,'Rp. ').display;
                $( api.column( j ).footer() ).html(numFormat(pageTotal));
                j++;
            } 
        },
        columns : [
            { "data": null},
            { "data": "nama_barang" },
            { "data": "kapasitas_muat" },
            { "data": "tujuan" },
            { "data": "jum_kontainer" },
            { "data": "tipe" },
            { "width": "100px","data": "total_tarif" ,"render": $.fn.dataTable.render.number( '.', ',', 0,'') },
            { "width": "100px","data": "tgl_pesan" },
            { "width": "100px","data": "jadwal_kirim" },
            { "data": "keterangan" },
            { "data": "status_pengiriman" },
            ],
    });

    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    }).draw();

    $('#tabel_laporan').DataTable().ajax.reload();
    
    // if (table.rows().data() == null) {
    //     toastr.error('Data tidak ditemukan !', 'Error');
    // }

    var data_pesanan = table.rows().data();
    // // console.log(table);
    
}
</script>