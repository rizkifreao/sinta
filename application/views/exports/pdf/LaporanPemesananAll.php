<?php
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

        
        $this->apdf->SetFont('Times','',9);
        if ($jenis == "periode") {
            $this->apdf->marginKiri(); $this->apdf->Cell(30,5,"Periode",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,date('d-m-Y',strtotime($tgl_awal))." s/d ".date('d-m-Y',strtotime($tgl_akhir)),0,1);
        }else {
            $this->apdf->marginKiri(); $this->apdf->Cell(30,5,"Hari, Tanggal",0,0); $this->apdf->Cell(5,5,":",0,0); $this->apdf->Cell(40,5,nama_hari($tgl_awal).", ".tgl_indo($tgl_awal),0,1);
        }
        
        $this->apdf->marginKiri();
        $this->apdf->SetLineWidth(0.3);
        $this->apdf->SetFont('Times','B',9);
        $this->apdf->Cell(10,5,"No",1,0,"C");
        $this->apdf->Cell(40,5,"Perusahaan","TRB",0,"C");
        $this->apdf->Cell(15,5,"Jumlah","TRB",0,"C");
        $this->apdf->Cell(15,5,"Proses","TRB",0,"C");
        $this->apdf->Cell(15,5,"Batal","TRB",0,"C");
        $this->apdf->Cell(30,5,"Jumlah Biaya","TRB",0,"C");
        $this->apdf->Cell(30,5,"Jumlah Tarif","TRB",1,"C");

        $no = 1;
        $tot_tambahan = 0;
        $total = 0;
        foreach ($konsumens as $key) {
            $this->apdf->marginKiri();
            $this->apdf->SetLineWidth(0.1);
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(10,5,$no++,"LBR",0,"C");
            $this->apdf->Cell(40,5,$key['perusahaan'],"BR",0,"L");
            $this->apdf->Cell(15,5,$key['jumlah_pemesanan'],"BR",0,"C");
            $this->apdf->Cell(15,5,$key['proses'],"BR",0,"C");
            $this->apdf->Cell(15,5,$key['batal'],"BR",0,"C");
            $this->apdf->Cell(30,5,rupiah($key['total_biaya']),"BR",0,"R");
            $this->apdf->Cell(30,5,rupiah($key['total_harga']),"BR",1,"R");
            $tot_tambahan += $key['total_biaya'];
            $total += $key['total_harga'];
        }

        $this->apdf->SetFont('Times','B',9);
        $this->apdf->SetLineWidth(0.3);
        $this->apdf->marginKiri();
        $this->apdf->Cell(95,6,"TOTAL BIAYA TAMBAHAN",1,0,"C");
        $this->apdf->Cell(60,6,"Rp. ".rupiah($tot_tambahan),1,1,"C");
        $this->apdf->marginKiri();
        $this->apdf->Cell(95,6,"TOTAL TARIF","LB",0,"C");
        $this->apdf->Cell(60,6,"Rp. ".rupiah($total),"LBR",1,"C");
        $this->apdf->marginKiri();
        $this->apdf->Cell(95,6,"TOTAL HARGA","LB",0,"C");
        $this->apdf->Cell(60,6,"Rp. ".rupiah($total+$tot_tambahan),"LBR",1,"C");

?>