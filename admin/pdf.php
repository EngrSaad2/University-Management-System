<?php
require_once('functions/dbconfig.php');
	require_once('functions/functions.php');
			
		$obj = new cls_func();
		require('../fpdf/fpdf.php');
		require('../fpdf/rotation.php');


class PDF extends PDF_Rotate
{
function Header()
{
	//Put the watermark
	//$this->SetFont('Arial','B',50);
	//$this->SetTextColor(255,192,203);
	//$this->RotatedText(65,190,'A p p r o v e d',45);
}
function RotatedText($x, $y, $txt, $angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}
}

//$pdf = new FPDF();
$pdf=new PDF();
$pdf->AddPage();



$iubat='                            University Management System' ;				

		
		
		$pdf->Image('../img/logo.png',10,9,25);
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',14);
		$pdf->Write(18, $iubat);
		$pdf->Ln();
		$pdf-> Cell(55);
        $pdf->SetFont('Times','',10);
        $pdf->Write(5, '');
		$pdf->Ln();
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4, '');
				$pdf->Ln();
		$pdf-> Cell(22);
		$pdf->SetFont('Times','',8);
		$pdf->Write(4,'');
		$pdf-> Cell(20);
		$pdf->SetFont('Times','',8);
		$pdf->Write(5, '__________________________________________________________________________________________________________________________________');
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf-> Cell(85);
		$pdf->SetFont('Times','U',10);
		$pdf->Write(5, 'Student List');
		$pdf->Ln();

		$pdf->Ln(2);			


$pdf-> Cell(5);
		$pdf->SetFont('Times','B',8);
		$pdf->Cell(8,6,'SL',1);
		$pdf->Cell(20,6,'Student Name',1);
		$pdf->Cell(20,6,'Student ID',1);
		$pdf->Cell(20,6,'Program',1);
		$pdf->Cell(20,6,'Phone no',1);
		$pdf->Cell(40,6,'Email',1);
		$pdf->Cell(20,6,'DOB',1);
		$pdf->Cell(20,6,'Picture',1);
		$pdf->Ln();

					$qry = $obj->view_university_management();
					
 
					$sl=1;
					while($rec = $qry->fetch_assoc())
                     {
						$pdf-> Cell(5);
						$pdf->SetFont('Times','',8);
						$pdf->Cell(8,20,$sl,1);
						$pdf->Cell(20,20,$rec['Name'],1);
						$pdf->Cell(20,20,$rec['id'],1);
						$pdf->Cell(20,20,$rec['Program'],1);
						$pdf->Cell(20,20,$rec['Phone_no'],1);
						$pdf->Cell(40,20,$rec['Email'],1);
						$pdf->Cell(20,20,$rec['DOB'],1);
						$image1='../images/'.$rec['pic'];
						$pdf->Cell( 20, 20, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(),20, 20.1), 0, 0, 'L', false);

						$sl++;
						$pdf->Ln();
						}      
                

		
		$pdf->Ln();
		$pdf->Ln();	
		
		$pdf->Output();



?>

