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
$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 9);

$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,6,$pdf->repar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->Cell(190,6,$pdf->minar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->minfr,0,1,'C');
$pdf->Cell(190,6,$pdf->ondeecar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->ondeecfr,0,1,'C');
$pdf->Cell(190,5,'-------------------------------------------------------------------------------------',0,1,'C');
$pdf->Cell(190,5,'Direction de développement des filières équines et camelines',0,1,'C');
$pdf->Text(20,60,"N°:...../DG/ONDEEC/".date('Y'));$pdf->SetFont('aefurat', 'U', 16);

$pdf->SetXY(10,70);$pdf->Cell(190,6,"ATTESTATION D'ELEVEUR",0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Text(40,$pdf->GetY()+10,"Nous soussignés Office National de Développement des Elevages  Equins et Camelins");
$pdf->Text(20,$pdf->GetY()+5,"attestons par la presente que Monsieur : ");
$url = explode(' ', $result->NomP);
if (isset($url[0])) {$nom=$url[0];}else{$nom="";}
if (isset($url[1])) {$prenom=$url[1];}else{$prenom=$url[0];}
$pdf->Text(20,$pdf->GetY()+10,"Nom : ".$nom);
$pdf->Text(20,$pdf->GetY()+5,"Prénom : ".$prenom);


$pdf->Text(20,$pdf->GetY()+5,"Née le : ");
$pdf->Text(20,$pdf->GetY()+5,"Demeurant à  : ".$pdf->nbrtostring('wil','IDWIL',trim($result->wil),'WILAYAS').'_'.$pdf->nbrtostring('com','IDCOM',trim($result->com),'COMMUNE').'_'.trim($result->adresse));
$pdf->Text(40,$pdf->GetY()+10,"Est propriétaire/Eleveur de chevaux immatriculés et repertoriés à notre niveau à ce jour");

$pdf->mysqlconnect();
$queryvac1 = "select * from cheval where ideleveur='$result->id'  ";
$resultat1 = mysql_query($queryvac1);
$num_rows1 = mysql_num_rows($resultat1);
if ($num_rows1 == 1) {
$pdf->Text(40,$pdf->GetY()+10,"Effectifs détenus actuellement : ".$num_rows1." cheval dont la référence est la suivante ");	
} else {
$pdf->Text(40,$pdf->GetY()+10,"Effectifs détenus actuellement : ".$num_rows1." chevaux dont les références sont les suivantes ");	
}
		

		
$pdf->SetXY(45,$pdf->GetY()+10);$pdf->SetFillColor(248, 248, 255);			
while($resultvac1=mysql_fetch_object($resultat1))
{
$pdf->SetXY(45,$pdf->GetY());
$pdf->Cell(55,5,trim($resultvac1->NomA),0,1,'L',1,0);
$pdf->SetXY(100,$pdf->GetY()-5.5); 
$pdf->Cell(55,5,$pdf->nbrtostring('race','id',trim($resultvac1->Race),'race'),0,1,'L',1,0);
$pdf->SetXY(155,$pdf->GetY()-5.5);
$pdf->Cell(35,5,$resultvac1->N,0,1,'L',1,0);
$pdf->SetXY(155,$pdf->GetY()+2);
}
$pdf->SetTextColor(0,0,0);			
$pdf->Text(40,$pdf->GetY()+10,"Cette attestation est délivrée pour servir et faire valoir ce que de droit. ");
$pdf->Text(110,$pdf->GetY()+10,"Fait le : ".date('d-m-Y')." à : Tiaret ");
$pdf->Text(70,$pdf->GetY()+10,"LA DIRECTRICE DVLPT FILIERES EQUINES ET CAMELINES");
$pdf->Text(120,$pdf->GetY()+10,"F.BENMORSLI");

$pdf->SetY(-10);
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(60,$pdf->GetY()-5,"TEL/FAX : 046-21-43-50 EMAIL : ondeec_dz@yahoo.fr");
$pdf->Text(30,$pdf->GetY()-5,"________________________________________________________________________");
$pdf->Text(30,$pdf->GetY()-2,"ADRESSE ONDEEC -CENTRE COMERCIAL ROUTE D ALGER- TIARET BP 438  ");

// } else {

// header("Location: ../../dashboard/search/0/10?o=NomP&q=") ;
// }
}
$pdf->Output();
?>


