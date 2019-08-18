<?php
foreach ($konsumens as $key) {
            // $this->apdf->marginKiri();
            // $this->apdf->SetLineWidth(0.1);
            // $this->apdf->SetFont('Times','',9);
            // $this->apdf->Cell(10,5,$no++,"LBR",0,"C");
            // $this->apdf->Cell(40,5,,"BR",0,"L");
            // $this->apdf->Cell(15,5,$key['jumlah_pemesanan'],"BR",0,"C");
            // $this->apdf->Cell(15,5,$key['proses'],"BR",0,"C");
            // $this->apdf->Cell(15,5,$key['batal'],"BR",0,"C");
            // $this->apdf->Cell(30,5,rupiah($key['total_biaya']),"BR",0,"R");
            // $this->apdf->Cell(30,5,rupiah($key['total_harga']),"BR",1,"R");
            echo "<pre>";
            echo $key['perusahaan'];
            echo $key['proses'];
            echo $key['batal'];
            echo $key['total_biaya'];
            echo $key['total_harga'];
            echo "<br>";
            // $tot_tambahan += $key['total_biaya'];
            // $total += $key['total_harga'];
        }

?>