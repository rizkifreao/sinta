<?php
date_default_timezone_set('Asia/Jakarta');

$this->apdf->SetMargins(6,"",6);
$this->apdf->setFilename($filename);

echo $_konten;

//Export
$this->apdf->Output($filename.".pdf",'I');
?>