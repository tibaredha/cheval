<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );$pdf->setPrintHeader(false);$pdf->setPrintFooter(false);$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->SetDisplayMode('fullpage','single');
$pdf->SetFont('aefurat', '', 12);
$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
$query = "select * from cheval WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
if ($result->aprouve=='1') {
$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 9);
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,6,$pdf->repar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->Cell(190,6,$pdf->minar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->minfr,0,1,'C');
$pdf->Cell(190,6,$pdf->ondeecar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->ondeecfr,0,1,'C');
$pdf->EAN13($x=172, $y=8,trim($result->id), $h=10, $w=.35);
$pdf->Text(5,49,'Nom eleveur : '.$pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP'));
$pdf->SetXY(10,49);$pdf->Cell(190,6,'A Monsieur le Directeur Général  ONDEEC - Tiaret ',0,1,'R');$pdf->SetFont('aefurat', 'U', 16);

$pdf->SetXY(10,60);$pdf->Cell(190,6,'DEMANDE PERMIS DE MONTE '.date ('Y'),0,1,'C');$pdf->SetFont('aefurat', '', 12);

$pdf->SetXY(40,70);$pdf->Cell(190,6,"J'ai l'honneur de vous demander de bien vouloir accepter de ",0,1,'l');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(20,75);$pdf->Cell(190,6,"m'accorder un permis de monte au titre de la saison de monte ".date ('Y').", pour ",0,1,'l');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(20,80);$pdf->Cell(190,6,"mon cheval, dont le signalement suit :",0,1,'l');$pdf->SetFont('aefurat', '', 12);
$pdf->Text(20,90,"Nom du produit : ");        $pdf->SetTextColor(0,0,225);$pdf->Text(100,90,trim($result->NomA)); $pdf->SetTextColor(0,0,0);  
$pdf->Text(20,95,"Race : ");                  $pdf->SetTextColor(0,0,225);$pdf->Text(100,95,$pdf->nbrtostring('race','id',trim($result->Race),'race') ); $pdf->SetTextColor(0,0,0);              
$pdf->Text(20,100,"N° d'immatriculation  : ");$pdf->SetTextColor(0,0,225);$pdf->Text(100,100,trim($result->N)); $pdf->SetTextColor(0,0,0);                
$pdf->Text(20,105,"Robe : ");                 $pdf->SetTextColor(0,0,225);$pdf->Text(100,105,$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe') ); $pdf->SetTextColor(0,0,0);              
$pdf->Text(20,110,"Date de naissance : ");    $pdf->SetTextColor(0,0,225);$pdf->Text(100,110,$pdf->dateUS2FR(trim($result->Dns))); $pdf->SetTextColor(0,0,0);
$pdf->SetXY(40,120);$pdf->Cell(190,6,"Veuillez agréer, Monsieur le directeur, l'expression de mon ",0,1,'l');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(20,125);$pdf->Cell(190,6,"profond respect ",0,1,'l');$pdf->SetFont('aefurat', '', 12);

$pdf->Text(110,150,"Fait le : ".$pdf->dateUS2FR(trim($result->Datesigna))." à : Tiaret ");
$pdf->SetXY(120,155);$pdf->Cell(25,6,"L'Intéressé ",0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Text(125,160,$pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP'));

$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 9);
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,6,$pdf->repar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->Cell(190,6,$pdf->minar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->minfr,0,1,'C');
$pdf->Cell(190,6,$pdf->ondeecar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->ondeecfr,0,1,'C');
$pdf->Text(20,50,"N°:...../D.SB/ONDEEC/".date('Y'));
$pdf->EAN13($x=172, $y=8,trim($result->id), $h=10, $w=.35);$pdf->SetFont('aefurat', 'U', 16);
$pdf->SetXY(10,55);$pdf->Cell(190,6,'PERMIS  DE  MONTE',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Text(20,70,"Nom du produit : ");$pdf->SetTextColor(0,0,225);$pdf->Text(100,70,trim($result->NomA)); $pdf->SetTextColor(0,0,0);  
$pdf->Text(20,75,"Race : ");$pdf->SetTextColor(0,0,225);$pdf->Text(100,75,$pdf->nbrtostring('race','id',trim($result->Race),'race') ); $pdf->SetTextColor(0,0,0);              
$pdf->Text(20,80,"N° d'immatriculation  : ");$pdf->SetTextColor(0,0,225);$pdf->Text(100,80,trim($result->N)); $pdf->SetTextColor(0,0,0);                
$pdf->Text(20,85,"Robe : ");$pdf->SetTextColor(0,0,225);$pdf->Text(100,85,$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe') ); $pdf->SetTextColor(0,0,0);              
$pdf->Text(20,90,"Date de naissance : ");$pdf->SetTextColor(0,0,225);$pdf->Text(100,90,$pdf->dateUS2FR(trim($result->Dns))); $pdf->SetTextColor(0,0,0);
$pdf->Rect(20,98,172,40,"d");

$pdf->SetFillColor(248, 228, 255);				
						$pdf->SetXY(150-10,100);$pdf->Cell(50,5,$pdf->nbrtostringv('cheval','id',$result->idpere,'Pere'),0,1,'C',1,0,'');				
						$pdf->SetXY(100-20,105);$pdf->Cell(50,5,trim($result->Pere),0,1,'C',1,0,'');				
						$pdf->SetXY(150-10,110);$pdf->Cell(50,5,$pdf->nbrtostringv('cheval','id',$result->idpere,'mere'),0,1,'C',1,0,'');				
$pdf->SetXY(22,115);$pdf->Cell(50,5,trim($result->NomA),0,1,'C',1,0,'');
						$pdf->SetXY(150-10,120);$pdf->Cell(50,5,$pdf->nbrtostringv('cheval','id',$result->idmere,'Pere'),0,1,'C',1,0,'');
						$pdf->SetXY(100-20,125);$pdf->Cell(50,5,trim($result->mere),0,1,'C',1,0,'');				
						$pdf->SetXY(150-10,130);$pdf->Cell(50,5,$pdf->nbrtostringv('cheval','id',$result->idmere,'mere'),0,1,'C',1,0,'');				
$pdf->SetFillColor(0, 0, 0);										

$pdf->Text(20,150,"Appartenant à Monsieur  : ");
$pdf->SetTextColor(0,0,225);$pdf->Text(100,150,$pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP'));$pdf->SetTextColor(0,0,0);
$pdf->Text(20,155,"Demeurant à  : ");
$pdf->SetTextColor(0,0,225);$pdf->Text(100,155,$pdf->nbrtostring('wil','IDWIL',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'wil')),'WILAYAS').'_'.$pdf->nbrtostring('com','IDCOM',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'com')),'COMMUNE').'_'.trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'adresse')));$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10,165);$pdf->Cell(190,6,'Valable pour la saison de monte '.date('Y'),0,1,'C');
$pdf->Text(20,175,"NB : La reconnaissance des produits issus des saillies de l'étalon indiqué ci-dessus, est ");
$pdf->Text(20,180,"subordonnée à un certificat de contrôle de filiation ( hémotypage ou ADN ). ");
$pdf->Text(110,195,"Fait le : ".$pdf->dateUS2FR(trim($result->Datesigna))." à : Tiaret ");//.$pdf->nbrtostring('station','id',$result->station,'station')
$pdf->Text(110,205,"Le chef du Département des Centres");
$pdf->Text(115,210,"Sites & Livres Généalogiques");
$pdf->SetY(-10);
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
} else {

header("Location: ../../dashboard/search/0/10?o=NomP&q=") ;
}
}
$pdf->Output();
?>


