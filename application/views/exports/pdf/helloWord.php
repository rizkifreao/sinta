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
        
        $this->apdf->marginKiri();
        $this->apdf->Rect(20, 68, 170, 80, "D");
            $this->apdf->marginKonten();
            $this->apdf->MultiCell(165, 8,"",1,"L");

        
        

    


    // MARGIN KIRI
    // $this->apdf->SetFont('Arial','B',16);
    // $this->apdf->MultiCell(10,10,"HELOOOW SINTAA",1);

    // $pdf = new FPDF('P','mm','A4');
    // $pdf->SetMargins(6,1,6);
    // $pdf->AddPage();
    // $pdf->SetFont('Arial','B',16);
    // $pdf->Cell(10,10,"HELOOOW SINTAA",1);
?>