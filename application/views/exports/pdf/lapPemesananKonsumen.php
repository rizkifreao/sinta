<?php
    $page_height = 255;
    $page_width = 210;
    $konten = 170;
    // SET PDF
    $this->apdf->FPDF('P','mm','A4');;
    $this->apdf->AddPage();
    $this->apdf->no_headfoot();

    // begin::HEADER
    $this->apdf->marginKiri();
        // begin::image
        $this->apdf->image(base_url('assets/img/logos.png'),25,9,30,30);
        $this->apdf->Cell(35);
            // begin::judul
            $this->apdf->SetFont('Times','B',19);
            $this->apdf->Cell(135,8,"CV. MAJU BERSAMA RAHAYU",0,2);
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(30,5,'LAND TRANSPORTATION - FREIGHT FORWARDING - PROJECT CARGO',0,2);
            $this->apdf->SetFont('Times','',10);
            $this->apdf->Cell(30,5,'Jl. Setrawangi IV No 24 Babakan Surabaya Kiaracondong Bandung 40215',0,2);
            $this->apdf->Cell(30,5,'Telp    : (022) 20527470',0,2);
            $this->apdf->Cell(15,5,'e-mail  : ',0,0);
            $this->apdf->SetFont('Times','I',10);
            $this->apdf->Cell(15,5,'mbsmajubersama@gmail.com',0,1);
    // end::HEADER

    // begin::KONTEN
        // begin::GARIS ATAS
        $this->apdf->marginKiri();
            $this->apdf->SetLineWidth(0.5);
            $this->apdf->Line(20, 40, 190, 40);
            $this->apdf->SetLineWidth(0.1);
        // end:GARIS ATAS

        $this->apdf->Ln(6);

         $this->apdf->marginKiri();
            // set::JUDUL
            $this->apdf->SetFont('Times','B',12);
            $this->apdf->Cell(170,5,$judul,0,0,"C");
        
        $this->apdf->Ln(15);

        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(30,5,"Perusahaan",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,$detail_konsumen->perusahaan,0,1);
            if ($jenis == "periode") {
                $this->apdf->marginKiri(); $this->apdf->Cell(30,5,"Periode",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,date('d-m-Y',strtotime($tgl_awal))." s/d ".date('d-m-Y',strtotime($tgl_akhir)),0,1);
            }else {
                $this->apdf->marginKiri(); $this->apdf->Cell(30,5,"Hari, Tanggal",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,nama_hari($tgl_awal).", ".tgl_indo($tgl_awal),0,1);
            }

        $this->apdf->Ln(5);
        $this->apdf->marginKiri(); $this->apdf->Cell(30,5,"Jumlah",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,count($pemesanan)." Pesanan",0,1);
        $this->apdf->marginKiri(); $this->apdf->Cell(30,5,"Detail Pemesanan",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,"",0,1);

        $this->apdf->marginKiri();
        $this->apdf->SetLineWidth(0.3);
        $this->apdf->SetFont('Times','B',9);
        $this->apdf->Cell(10,5,"No",1,0,"C");
        $this->apdf->Cell(40,5,"Nama Barang","TRB",0,"C");
        $this->apdf->Cell(30,5,"Tujuan","TRB",0,"C");
        $this->apdf->Cell(15,5,"Jumlah","TRB",0,"C");
        $this->apdf->Cell(10,5,"Tipe","TRB",0,"C");
        $this->apdf->Cell(25,5,"Tanggal Pesan","TRB",0,"C");
        $this->apdf->Cell(20,5,"Status","TRB",0,"C");
        $this->apdf->Cell(25,5,"Total Tarif","TRB",1,"C");

        $this->apdf->SetFont('Times','',9);
        $this->apdf->SetLineWidth(0.1);
        $no = 1;
        $total = 0;
        foreach ($pemesanan as $key) {
            $this->apdf->marginKiri();
            $this->apdf->Cell(10,5,$no++,"LBR",0,"C");
            $this->apdf->Cell(40,5,$key->nama_barang,"BR",0,"L");
            $this->apdf->Cell(30,5,$key->tujuan,"BR",0,"L");
            $this->apdf->Cell(15,5,$key->jum_kontainer,"BR",0,"C");
            $this->apdf->Cell(10,5,$key->tipe,"BR",0,"C");
            $this->apdf->Cell(25,5,tgl_indo($key->tgl_pesan),"BR",0,"C");
            $this->apdf->Cell(20,5,$key->status_pengiriman,"BR",0,"C");
            $this->apdf->Cell(25,5,rupiah($key->total_tarif),"BR",1,"R");
            $total += $key->total_tarif;
        }
        $this->apdf->SetFont('Times','B',9);
        $this->apdf->SetLineWidth(0.3);
        $this->apdf->marginKiri();
        $this->apdf->Cell(130,7,"TOTAL",1,0,"C");
        $this->apdf->Cell(45,7,"Rp. ".rupiah($total),1,1,"C");
    

?>