<?php

Class Cetak extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(270,7,'LAPORAN ARSIP',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(270,7,'DAFTAR ARSIP',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
      
        $pdf->Cell(50,6,'ID arsip',1,0);
        $pdf->Cell(38,6,'Nama Arsip',1,0);
        $pdf->Cell(38,6,'ID Kategori',1,0);
        $pdf->Cell(33,6,'Tanggal arsip',1,0);       
        //$pdf->Cell(50,6,'foto',1,0);
        $pdf->SetFont('Arial','',10);
        $Cetak = $this->db->get('arsip')->result();
        foreach ($Cetak as $row){
            $pdf->Cell(10,7,'',0,1);
            $pdf->Cell(50,6,$row->id_arsip,1,0);
            $pdf->Cell(38,6,$row->nama_arsip,1,0);
            $pdf->Cell(38,6,$row->id_kategori,1,0);
            $pdf->Cell(33,6,$row->tgl_arsip,1,0); 
            //$pdf->Cell(50,6,$row->foto,1,0);
          
        }
        $pdf->Output();
    }
}