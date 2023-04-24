<?php
require('fpdf185.zip.drag/fpdf.php');

//db connection
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'projetp');

//get factures data
$query = mysqli_query($con,"select * from facture
	inner join client using(id)
	where
	id_facture = '".$_GET['id_facture']."'");
$facture = mysqli_fetch_array($query);

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130	,5,'Gemul Cars Co',0,0);
$pdf->Cell(59	,5,'facture',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130	,5,'[Street Address]',0,0);
$pdf->Cell(59	,5,'',0,1);//end of line



$pdf->Cell(130	,5,'Phone [+12345678]',0,0);
$pdf->Cell(25	,5,'facture #',0,0);
$pdf->Cell(34	,5,$facture['id_facture'],0,1);//end of line



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//billing address
$pdf->Cell(100	,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$facture['name'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$facture['email'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$facture['adresse'],0,1);

$pdf->Cell(10	,5,'',0,0);
$pdf->Cell(90	,5,$facture['phone'],0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189	,10,'',0,1);//end of line

//facture contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130	,5,'Description',1,0);
$pdf->Cell(25	,5,'Taxable',1,0);
$pdf->Cell(34	,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

//items
$query = mysqli_query($con,"select * from cmd where id_facture = '".$facture['id_facture']."'");
$tax = 0; //total tax
$amount = 0; //total amount

//display the items
while($item = mysqli_fetch_array($query)){
	$pdf->Cell(130	,5,$item['id_cmd'],1,0);
	//add thousand separator using number_format function
	$pdf->Cell(25	,5,number_format($item['quantite']),1,0);
	$pdf->Cell(34	,5,number_format($item['prix']),1,1,'R');//end of line
	//accumulate tax and amount
	$tax += $item['quantite'];
	$amount += $item['prix'];
}

//summary
$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Subtotal',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($amount),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Taxable',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($tax),1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Tax Rate',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,'10%',1,1,'R');//end of line

$pdf->Cell(130	,5,'',0,0);
$pdf->Cell(25	,5,'Total Due',0,0);
$pdf->Cell(4	,5,'$',1,0);
$pdf->Cell(30	,5,number_format($amount + $tax),1,1,'R');//end of line





















$pdf->Output();
?>