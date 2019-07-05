<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );$pdf->setPrintHeader(false);$pdf->setPrintFooter(false);$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->SetDisplayMode('fullpage','single');
$pdf->SetFont('aefurat', '', 12);
$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
$query = "select * from eleveur WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
// if ($result->aprouve=='1') {	
//1ere page droite	
$pdf->AddPage('p','A5');
// $pdf->SetDisplayMode('fullpage','single');
$pdf->Rect(78, 1, 70, 100,"d");
$pdf->SetFont('aefurat','B',6);	
$pdf->SetXY(78,5);	$pdf->Cell(70,5,$pdf->repar,0,1,'C');
$pdf->SetXY(78,10);	$pdf->Cell(70,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(78,15);	$pdf->Cell(70,5,$pdf->minar,0,1,'C');
$pdf->SetXY(78,20);	$pdf->Cell(70,5,$pdf->minfr,0,1,'C');
$pdf->SetXY(78,25);	$pdf->Cell(70,5,$pdf->ondeecar,0,1,'C');
$pdf->SetXY(78,30);	$pdf->Cell(70,5,$pdf->ondeecfr,0,1,'C');
$pdf->SetFont('aefurat','B',8);	
$pdf->Image($pdf->logo, $x=100, $y=42, $w=20, $h=20, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());

$pdf->SetFont('aefurat','B',14);
$pdf->SetXY(78,70);	$pdf->Cell(70,5,"CARTE D'ELEVEUR",0,1,'C');
$pdf->SetFont('aefurat','B',12);	
$pdf->Text(80,94,"N°:............/ONDEEC/Année : ".date('Y'));	
//1ere page gauche
$pdf->Rect(1, 1, 70, 100,"d");
$pdf->Rect(1, 1, 35, 50,"d");                                      
$pdf->SetXY(01,1);$pdf->cell(35,10,"Année ".(date('Y')+4),0,0,'L',0);
$pdf->SetXY(01,11);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(01,21);$pdf->cell(35,10,"Visa",0,0,'L',0);
$pdf->Rect(36, 1, 35, 50,"d");
$pdf->SetXY(36,1);$pdf->cell(35,10,"Année ".(date('Y')+5),0,0,'L',0);
$pdf->SetXY(36,11);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(36,21);$pdf->cell(35,10,"Visa",0,0,'L',0);
$pdf->Rect(1, 51, 35, 50,"d");
$pdf->SetXY(01,51);$pdf->cell(35,10,"Année ".(date('Y')+6),0,0,'L',0);
$pdf->SetXY(01,61);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(01,71);$pdf->cell(35,10,"Visa",0,0,'L',0);
$pdf->Rect(36, 51, 35, 50,"d");
$pdf->SetXY(36,51);$pdf->cell(35,10,"Année ".(date('Y')+7),0,0,'L',0);
$pdf->SetXY(36,61);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(36,71);$pdf->cell(35,10,"Visa",0,0,'L',0);	
// 2eme page gauche	
$pdf->AddPage('p','A5');
$pdf->SetDisplayMode('fullpage','single');	
$pdf->Rect(1, 1, 70, 100,"d");
$file = '../../public/webcam/eleveur/'.$id.'.jpg';
if (file_exists($file)){$pdf->Image('../../public/webcam/eleveur/'.$id.'.jpg', $x='36', $y='1', $w=35, $h=50, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());}else{$pdf->Image('../../public/webcam/eleveur/m.jpg', $x='36', $y='1', $w=35, $h=50, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());}
$pdf->SetXY(36,1);$pdf->cell(35,50,"",1,0,'C',0);
$url = explode(' ', $result->NomP);
if (isset($url[0])) {$nom=$url[0];}else{$nom="";}
if (isset($url[1])) {$prenom=$url[1];}else{$prenom=$url[0];}
$pdf->Text(1,$pdf->GetY()+55,"Nom : ".$nom);
$pdf->Text(1,$pdf->GetY()+5,"Prénom : ".$prenom);
$pdf->Text(1,$pdf->GetY()+5,"Né(e) le : ");
$pdf->Text(1,$pdf->GetY()+5,"Adresse : ".$pdf->nbrtostring('com','IDCOM',trim($result->com),'COMMUNE').'_'.trim($result->adresse));
$pdf->Text(24,$pdf->GetY()+8,"le Directeur Général");
// 2eme page droite 		
$pdf->Rect(78, 1, 70, 100,"d");
$pdf->Rect(78, 1, 35, 50,"d");                                      
$pdf->SetXY(78,1);$pdf->cell(35,10,"Année ".date('Y'),0,0,'L',0);
$pdf->SetXY(78,11);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(78,21);$pdf->cell(35,10,"Visa",0,0,'L',0);
$pdf->Rect(113, 1, 35, 50,"d");
$pdf->SetXY(113,1);$pdf->cell(35,10,"Année ".(date('Y')+1),0,0,'L',0);
$pdf->SetXY(113,11);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(113,21);$pdf->cell(35,10,"Visa",0,0,'L',0);
$pdf->Rect(78, 51, 35, 50,"d");
$pdf->SetXY(78,51);$pdf->cell(35,10,"Année ".(date('Y')+2),0,0,'L',0);
$pdf->SetXY(78,61);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(78,71);$pdf->cell(35,10,"Visa",0,0,'L',0);
$pdf->Rect(113, 51, 35, 50,"d");
$pdf->SetXY(113,51);$pdf->cell(35,10,"Année ".(date('Y')+3),0,0,'L',0);
$pdf->SetXY(113,61);$pdf->cell(35,10,"EFFECTIF ",0,0,'C',0);
$pdf->SetXY(113,71);$pdf->cell(35,10,"Visa",0,0,'L',0);			
// } else {
// header("Location: ../../dashboard/search/0/10?o=NomP&q=") ;
// }
}	
$pdf->Output();
?>


