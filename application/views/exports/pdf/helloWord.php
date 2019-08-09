<?php 
    $sistem = $this->M_Sistem_setting->getDetail();
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
        $this->apdf->image(base_url('assets/img/'.$sistem->logo),25,9,30,30);
        $this->apdf->Cell(35);
            // begin::judul
            $this->apdf->SetFont('Times','B',19);
            $this->apdf->Cell(135,8,$sistem->nama_perusahaan,0,2);
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(30,5,'LAND TRANSPORTATION - FREIGHT FORWARDING - PROJECT CARGO',0,2);
            $this->apdf->SetFont('Times','',10);
            $this->apdf->Cell(30,5,$sistem->alamat,0,2);
            $this->apdf->Cell(30,5,'Telp    : '.$sistem->telp,0,2);
            $this->apdf->Cell(15,5,'e-mail  : ',0,0);
            $this->apdf->SetFont('Times','I',10);
            $this->apdf->Cell(15,5,$sistem->email,0,1);
    // end::HEADER

    // begin::KONTEN
        // begin::GARIS ATAS
        $this->apdf->marginKiri();
            $this->apdf->SetLineWidth(0.5);
            $this->apdf->Line(20, 40, 190, 40);
            
        // end:GARIS ATAS
        $this->apdf->SetLineWidth(0.1);
        $this->apdf->Ln(6);
        // begin::SUBHEADER
        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',10);
            $this->apdf->Cell(5,6,"",0,0);
            $this->apdf->Cell(30,6,"KEPADA, YTH   ",0,0);
            $this->apdf->SetFont('Times','B',10);
            $this->apdf->Cell(135,6,": ".$this->M_Konsumen->getDetail($pemesanan->id_konsumen)->perusahaan,0,2);
        // end::SUBHEADER

        $this->apdf->Ln(2);

        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(107,8,"",0,0);
                $this->apdf->Cell(25,8,"",0,0);
                    $this->apdf->Cell(2,8,"",0,0);
                    $this->apdf->Cell(30,8,"",0,1);
                    
        $this->apdf->marginKiri();
            $this->apdf->Cell(107,3,"",0,0);
                $this->apdf->Cell(25,4,"TANGGAL",0,0);
                $this->apdf->Cell(2,4,":",0,0);
                    $this->apdf->Cell(30,4,date("d-M-y",strtotime($pemesanan->tgl_pesan)),0,1);

        $this->apdf->SetFont('Times','B',9);
        $this->apdf->Text(26,66,"INVOICE NO : ".$no_invoice);

        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(107,4,"",0,0);
                $this->apdf->Cell(25,4,"NPWP CV. MBS",0,0);
                $this->apdf->Cell(2,4,":",0,0);
                    $this->apdf->Cell(30,4,$sistem->npwp,0,1);
        
        // begin:TABEL DETAIL PESANAN
        $this->apdf->marginKiri();
            // set::TABEL HEADER
            $this->apdf->SetFont('Times','B',9);
            $this->apdf->Cell(130,4,"DETAIL PESANAN",1,0,"C");
            $this->apdf->Cell(40,4,"JUMLAH","RTB",1,"C");
            
            // begin::TABEL KONTEN
            $this->apdf->SetFont('Times','',9);
            $this->apdf->marginKiri();
                $this->apdf->marginKonten();
                $this->apdf->Cell(125,4,"",0,0);
                $this->apdf->Cell(40,4,"","LR",1,"C");

                $this->apdf->marginKiri();
                $this->apdf->marginKonten();
                $this->apdf->Cell(30,4,"TRUCKING",0,0);
                $this->apdf->Cell(20,4,":",0,0);
                $this->apdf->Cell(75,4,$pemesanan->jum_kontainer." X ".$pemesanan->tipe,0,0,"");
                $this->apdf->Cell(10,4,"Rp.","L",0,"R");
                $this->apdf->Cell(30,4,rupiah($pemesanan->total_tarif),"R",1,"R");

                $i = 1;
                foreach ($detail_tagihan as $row) {
                    if ($i < 2) {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"CONT NO",0,0);
                        $this->apdf->Cell(20,4,":",0,0);
                        $this->apdf->Cell(75,4,$row->no_kontainer,0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }else {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"",0,0);
                        $this->apdf->Cell(20,4,"",0,0);
                        $this->apdf->Cell(75,4,$row->no_kontainer,0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }
                    $i++;
                }

                // JARAK TENGAH
                $this->apdf->marginKiri();
                        $this->apdf->Cell(5,10,"","L",0);
                        $this->apdf->Cell(125,10,"",0,0);
                        $this->apdf->Cell(40,10,"","LR",1,"C");
                
                $a = 1;
                foreach ($detail_tagihan as $row ) {
                    if ($a < 2) {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"LIFT OFF",0,0);
                        $this->apdf->Cell(20,4,":",0,0);
                        $this->apdf->Cell(75,4,"Rp. ".rupiah($row->biaya_tambahan),0,0);
                        
                        if (count($detail_tagihan)==1) {
                            $this->apdf->Cell(10,4,"Rp.","L",0,"R");
                            $this->apdf->Cell(30,4,rupiah($total_biaya),"R",1,"R");
                        }else{
                            $this->apdf->Cell(10,4,"","L",0,"R");
                            $this->apdf->Cell(30,4,"","R",1,"R");
                        }
                    }else if($a == count($detail_tagihan) ) {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"",0,0);
                        $this->apdf->Cell(20,4,"",0,0);
                        $this->apdf->Cell(75,4,"Rp. ".rupiah($row->biaya_tambahan),0,0);
                        $this->apdf->Cell(10,4,"Rp.","L",0,"R");
                        $this->apdf->Cell(30,4,rupiah($total_biaya),"R",1,"R");
                    }else {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"",0,0);
                        $this->apdf->Cell(20,4,"",0,0);
                        $this->apdf->Cell(75,4,"Rp. ".rupiah($row->biaya_tambahan),0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }
                    $a++;
                }
                
                // JARAK TENGAH
                $this->apdf->marginKiri();
                        $this->apdf->Cell(5,10,"","L",0);
                        $this->apdf->Cell(125,10,"",0,0);
                        $this->apdf->Cell(40,10,"","LR",1,"C");
        
                // TABEL FOOTER
                $this->apdf->marginKiri();
                    $this->apdf->SetFont('Times','B',9);
                    $this->apdf->Cell(130,6,"TOTAL",1,0,"C");
                    $this->apdf->Cell(10,6,"Rp.","TB",0,"R");
                    $this->apdf->Cell(30,6,rupiah($total_tagihan),"RTB",1,"R");

            // endTABEL KONTEN
        // end::TABEL
        
        // TERBILANG
        $this->apdf->Ln(5);
        $this->apdf->marginKiri();
        $this->apdf->marginKonten(4,"");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(120,4,"TERBILANG  :",0,1,"L");
        
        $this->apdf->marginKiri();
        $this->apdf->marginKonten(4,"");
        $this->apdf->SetFont('Times','BI',9);
        $this->apdf->Cell(165,6,terbilang($total_tagihan)." Rupiah",1,0,"C");
        
        // KETERANGAN
        $this->apdf->Ln(20);
        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(40,4,"Untuk Pelunasan Pembayaran","LT",0,"L");
        $this->apdf->Cell(40,4,"","RT",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->Cell(40,4,"Mohon Ditransfer ke Rekening :","L",0,"L");
        $this->apdf->Cell(40,4,"","R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','B',9);
        $this->apdf->Cell(40,4,"Bank ".$sistem->bank,"L",0,"L");
        $this->apdf->Cell(40,4,"","R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(37,4,"Cabang","L",0,"L");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(3,4,":",0,0,"R");
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(40,4,$sistem->cabang_bank,"R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(37,4,"No.Rek","L",0,"L");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(3,4,":",0,0,"R");
        $this->apdf->SetFont('Times','BI',9);
        $this->apdf->Cell(40,4,$sistem->no_rekening,"R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(37,4,"A N","LB",0,"L");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(3,4,":","B",0,"R");
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(40,4,$sistem->atas_nama,"RB",1,"L");
        
        $this->apdf->Ln(5);
        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','BI',9);
        $this->apdf->Cell(120,4,"Mohon untuk tidak melakukan pembayaran secara tunai kepada petugas kami",0,1,"L");

        // TANDA TANGAN
        $this->apdf->Ln(5);
        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(100,4,"",0,0,"C");
        $this->apdf->Cell(50,4,"HORMAT KAMI",0,1,"C");
        
        $this->apdf->Ln(25);

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','BU',9);
        $this->apdf->Cell(100,4,"",0,0,"C");
        $this->apdf->Cell(50,4,$sistem->direktur,0,1,"C");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(100,3,"",0,0,"C");
        $this->apdf->Cell(50,3,"DIREKTUR",0,1,"C");
?>