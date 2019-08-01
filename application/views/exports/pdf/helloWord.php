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
            
        // end:GARIS ATAS
        $this->apdf->SetLineWidth(0.1);
        $this->apdf->Ln(6);
        // begin::SUBHEADER
        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',10);
            $this->apdf->Cell(5,6,"",0,0);
            $this->apdf->Cell(30,6,"KEPADA, YTH   ",0,0);
            $this->apdf->SetFont('Times','B',10);
            $this->apdf->Cell(135,6,": PT. KONSUMEN",0,2);
        // end::SUBHEADER

        $this->apdf->Ln(2);

        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(107,8,"",0,0);
                $this->apdf->Cell(25,8,"REMARKS",0,0);
                    $this->apdf->Cell(2,8,":",0,0);
                    $this->apdf->Cell(30,8,"IMPORT",0,1);
                    
        $this->apdf->marginKiri();
            $this->apdf->Cell(107,3,"",0,0);
                $this->apdf->Cell(25,4,"TANGGAL",0,0);
                $this->apdf->Cell(2,4,":",0,0);
                    $this->apdf->Cell(30,4,"12-Feb-19",0,1);

        $this->apdf->SetFont('Times','B',9);
        $this->apdf->Text(26,66,"INVOICE NO : 1200/11/18");

        $this->apdf->marginKiri();
            $this->apdf->SetFont('Times','',9);
            $this->apdf->Cell(107,4,"",0,0);
                $this->apdf->Cell(25,4,"NPWP CV. MBS",0,0);
                $this->apdf->Cell(2,4,":",0,0);
                    $this->apdf->Cell(30,4,"74 309 766 9 424 000",0,1);
        
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
                $this->apdf->Cell(75,4,"3 X 40'",0,0,"");
                $this->apdf->Cell(10,4,"Rp.","L",0,"R");
                $this->apdf->Cell(30,4,"23,000.000","R",1,"R");

                for ($i=1; $i <= 6; $i++) { 
                    if ($i < 2) {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"LIFT OFF",0,0);
                        $this->apdf->Cell(20,4,":",0,0);
                        $this->apdf->Cell(75,4,"A11111$i",0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }else {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"",0,0);
                        $this->apdf->Cell(20,4,"",0,0);
                        $this->apdf->Cell(75,4,"A11111$i",0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }
                }

                // JARAK TENGAH
                $this->apdf->marginKiri();
                        $this->apdf->Cell(5,10,"","L",0);
                        $this->apdf->Cell(125,10,"",0,0);
                        $this->apdf->Cell(40,10,"","LR",1,"C");

                for ($i=1; $i <= 6; $i++) { 
                    if ($i < 2) {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"LIFT OFF",0,0);
                        $this->apdf->Cell(20,4,":",0,0);
                        $this->apdf->Cell(75,4,"Rp. 20000$i",0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }else if($i == 6) {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"",0,0);
                        $this->apdf->Cell(20,4,"",0,0);
                        $this->apdf->Cell(75,4,"Rp. 20000$i",0,0);
                        $this->apdf->Cell(10,4,"Rp.","L",0,"R");
                        $this->apdf->Cell(30,4,"60000","R",1,"R");
                    }else {
                        $this->apdf->marginKiri();
                        $this->apdf->marginKonten();
                        $this->apdf->Cell(30,4,"",0,0);
                        $this->apdf->Cell(20,4,"",0,0);
                        $this->apdf->Cell(75,4,"Rp. 20000$i",0,0);
                        $this->apdf->Cell(10,4,"","L",0,"R");
                        $this->apdf->Cell(30,4,"","R",1,"R");
                    }
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
                    $this->apdf->Cell(30,6,"23.000.000","RTB",1,"R");

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
        $this->apdf->Cell(165,6,terbilang(23000000),1,0,"C");
        
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
        $this->apdf->Cell(40,4,"Bank MANDIRI","L",0,"L");
        $this->apdf->Cell(40,4,"","R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(37,4,"Cabang","L",0,"L");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(3,4,":",0,0,"R");
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(40,4,"BANDUNG","R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(37,4,"No.Rek","L",0,"L");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(3,4,":",0,0,"R");
        $this->apdf->SetFont('Times','BI',9);
        $this->apdf->Cell(40,4,"131-00-1383634-3","R",1,"L");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(37,4,"A N","LB",0,"L");
        $this->apdf->SetFont('Times','',9);
        $this->apdf->Cell(3,4,":","B",0,"R");
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(40,4,"CV.MAJU BERSAMA","RB",1,"L");
        
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
        $this->apdf->Cell(50,4,"IMAN HERI ALFIANSYAH, S.Sos",0,1,"C");

        $this->apdf->marginKiri();
        $this->apdf->SetFont('Times','I',9);
        $this->apdf->Cell(100,3,"",0,0,"C");
        $this->apdf->Cell(50,3,"DIREKTUR",0,1,"C");
?>