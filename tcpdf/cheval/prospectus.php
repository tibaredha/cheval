<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'L', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->setRTL(true); 
$pdf->SetDisplayMode('fullpage','single');


$pdf->SetFont('aefurat', '', 12);
$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");// 
$query = "select * from cheval WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
    //1ere page
	$pdf->AddPage();
	$pdf->SetFont('aefurat', '', 12);                 
	$pdf->RoundedRect(2, 2, 95, 205, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$pdf->SetTextColor(225,0,0);
	$pdf->SetTextColor(225,0,0);
	$pdf->Text(5+20,184,$pdf->ondeecar);
	$pdf->SetTextColor(0,0,0);
	$pdf->RoundedRect(2+95+3, 2, 95, 205, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$pdf->SetTextColor(225,0,0);
	$pdf->Text(103+20,184,$pdf->ondeecar);
	$pdf->SetTextColor(0,0,0);
	$pdf->RoundedRect(2+95+95+6, 2, 95, 205, 2,$round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$pdf->SetTextColor(225,0,0);
	$pdf->Text(200+20,184,$pdf->ondeecar);
	$pdf->SetTextColor(0,0,0);
	//2eme page
	$pdf->AddPage();
	$pdf->SetFont('aefurat', '', 12);
	$pdf->RoundedRect(2, 2, 95, 205, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$pdf->SetTextColor(225,0,0);
	$pdf->Text(5+20,184,$pdf->ondeecar);
	$pdf->SetTextColor(0,0,0);
	$pdf->RoundedRect(2+95+3, 2, 95, 205, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$pdf->Text(103,60,"هام جدا");
	$pdf->Text(126,120,trim($result->NomP)."_".trim($result->NomA));
	$pdf->SetTextColor(0,0,0);
	$pdf->Image('../logoof.png', $x=70+100, $y=130, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$pdf->SetXY(104,170);$pdf->Cell(90,6,$pdf->repar,1,1,'C');
	$pdf->SetXY(104,176);$pdf->Cell(90,6,$pdf->minar,1,1,'C');
	$pdf->SetXY(104,182);$pdf->Cell(90,6,$pdf->ondeecar,1,1,'C');
	$pdf->SetXY(104,188);$pdf->Cell(90,6,'الهاتف 88/32/82/027  مكتب 34 ',1,1,'C');
	$pdf->SetXY(104,188+6);$pdf->Cell(90,6,'الفاكس 80/12/82/027',1,1,'C');
	$pdf->SetTextColor(0,0,0);
	$pdf->RoundedRect(2+95+95+6, 2, 95, 205, 2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$pdf->SetXY(202,10);$pdf->Cell(90,6,$pdf->repar,1,1,'C');
	$pdf->SetXY(202,16);$pdf->Cell(90,6,$pdf->minar,1,1,'C');
	$pdf->SetXY(202,22);$pdf->Cell(90,6,$pdf->ondeecar,1,1,'C');
	$pdf->SetXY(202,28);$pdf->Cell(90,6,'----',1,1,'C');
	$pdf->Image('../logoof.png', $x=70, $y=130, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());	
	$file = '../../public/images/cheval/'.$id.'.jpg';
    if (file_exists($file)){$pdf->Image('../../public/images/cheval/'.$id.'.jpg', $x='70', $y='100', $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());}else{$pdf->Image('../../public/images/cheval/cr.jpg', $x='70', $y='100', $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());}
	$pdf->SetFont('aefurat', 'B', 16);
	$pdf->SetFont('aefurat', '', 12);
	$pdf->Text(235,163,DATE('Y-m-d'));
	$pdf->SetTextColor(225,0,0);
	$pdf->Text(200+20,184,$pdf->ondeecar);
	$pdf->SetTextColor(0,0,0);
}


$pdf->Output();





























?>


