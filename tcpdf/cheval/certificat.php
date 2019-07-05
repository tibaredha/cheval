<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->AddPage('P','A4'); 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 0);
// $pdf->setRTL(true);
$pdf->SetDisplayMode('fullpage','single');
$file = '../../public/images/'.$id.'.jpg';
if (file_exists($file)){$pdf->Image('../../public/images/'.$id.'.jpg', $x='0', $y='2', $w=210, $h=150, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());}else{$pdf->Image('../../public/images/ch.jpg', $x='0', $y='0', $w=210, $h=150, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());}

$pdf->Rect(1,150,208,145,"d");
$pdf->Rect(1,150,208,5,"d");
$pdf->Rect(1,155,208,25,"d");
$pdf->Rect(1,155,70,5,"d");$pdf->Rect(71, 155, 24, 10,"d");$pdf->Rect(61+34, 155, 58, 10,"d");$pdf->Rect(153, 155, 56, 10,"d");
$pdf->Rect(1,160,70,20,"d");$pdf->Rect(71, 165, 41, 15,"d");                                  $pdf->Rect(153, 165, 56, 15,"d");
$pdf->SetFont('aefurat', '', 12);


$pdf->mysqlconnect();
mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
$query = "select * from cheval WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetFont('aefurat', '', 9);
// $pdf->racecertificat($result->Race);
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'');
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(1,150,"NOM DU PROPRIETAIRE : ");$pdf->SetTextColor(0,0,0);
$pdf->Text(53,150,$pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP').'_'.$pdf->nbrtostring('wil','IDWIL',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'wil')),'WILAYAS').'_'.$pdf->nbrtostring('com','IDCOM',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'com')),'COMMUNE').'_'.trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'adresse')));$pdf->SetTextColor(0,0,0);
$pdf->EAN13($x=172, $y=8,trim($result->id), $h=10, $w=.35);$pdf->SetFont('aefurat', '', 12);
$pdf->Text(1,155,"N : ");$pdf->SetTextColor(0,0,0);$pdf->Text(8,155,trim($result->N)); $pdf->SetTextColor(0,0,0);                
$pdf->Text(71,155,"Sexe : ");$pdf->SetTextColor(0,0,0);$pdf->Text(85,155,trim($result->Sexe)); $pdf->SetTextColor(0,0,0);               
$pdf->Text(61+34,155,"Date de naissance : ");$pdf->SetTextColor(0,0,0);$pdf->Text(61+69,155,$pdf->dateUS2FR(trim($result->Dns))); $pdf->SetTextColor(0,0,0);
$pdf->Text(155,155,"Père : ");$pdf->SetTextColor(0,0,0);$pdf->Text(168,155,trim($result->Pere)); $pdf->SetTextColor(0,0,0);             
$pdf->Text(1,160,"Nom du produit : ");$pdf->SetTextColor(0,0,0);$pdf->Text(33,160,trim($result->NomA)); $pdf->SetTextColor(0,0,0);      
$pdf->Text(1,170,"Race : ");$pdf->SetTextColor(0,0,0);$pdf->Text(13,170,$pdf->nbrtostring('race','id',trim($result->Race),'race') ); $pdf->SetTextColor(0,0,0);              
$pdf->Text(1,175,"Breed : ");
$pdf->Text(71,165,"Robe : ");$pdf->SetTextColor(0,0,0);$pdf->Text(83,165,$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe') ); $pdf->SetTextColor(0,0,0);              
$pdf->Text(71+41,165,"Taille : ");$pdf->SetTextColor(0,0,0);
// $pdf->Text(83+40,165,trim($result->Taille) ); 
$pdf->SetTextColor(0,0,0);              
$pdf->Text(71+41,170,"Size : ");
$pdf->Text(155,165,"Mère : ");$pdf->SetTextColor(0,0,0);$pdf->Text(168,165,trim($result->mere)); $pdf->SetTextColor(0,0,0);              
$pdf->Text(71,160,"Sex : "); $pdf->Text(61+34,160,"Date of birth : "); $pdf->Text(155,160,"Sire : ");$pdf->Text(1,165,"Name : "); $pdf->Text(71,170,"Color : ");  $pdf->Text(155,170,"Dam : ");
$pdf->SetFont('aefurat','b', 12);//helveticaB
$pdf->Text(1,180,"SIGNALEMENT DESCRIPTIF : ");
$pdf->SetXY(1,190);$pdf->SetTextColor(0,0,0);$pdf->MultiCell(208, 30, 'Tete :  '.html_entity_decode(utf8_decode($result->Tete)), 0, 'L', 0, 0, '', '', true);
$pdf->SetTextColor(0,0,0);$pdf->Text(1,190,"Tete : ");
$pdf->Text(12,190,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(1,195,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,200," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,205," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,210," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,215," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,220,"AG : ");$pdf->SetTextColor(0,0,0);$pdf->Text(10,220,html_entity_decode(utf8_decode(trim($result->AG))));$pdf->SetTextColor(0,0,0);
$pdf->Text(12,220,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(12,225,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(1,230,"AD : ");$pdf->SetTextColor(0,0,0);$pdf->Text(10,230,html_entity_decode(utf8_decode(trim($result->AD))));$pdf->SetTextColor(0,0,0);
$pdf->Text(12,230,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(12,235,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(1,240,"PG : ");$pdf->SetTextColor(0,0,0);$pdf->Text(10,240,html_entity_decode(utf8_decode(trim($result->PG))));$pdf->SetTextColor(0,0,0);
$pdf->Text(12,240,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(12,245,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(1,250,"PD : ");$pdf->SetTextColor(0,0,0);$pdf->Text(10,250,html_entity_decode(utf8_decode(trim($result->PD))));$pdf->SetTextColor(0,0,0);
$pdf->Text(12,250,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(12,255,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->SetTextColor(0,0,0);
$pdf->SetXY(1,260);$pdf->MultiCell(127, 35, 'Marques :  '.html_entity_decode(utf8_decode($result->MARQUES)), 0, 'L', 0, 0, '', '', true);
$pdf->SetTextColor(0,0,0);$pdf->Text(1,260,"Marques : ");
$pdf->Text(20,260,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(1,266,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,271,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,276,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,281,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(1,285,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Rect(128, 260, 81, 35,"d");$pdf->SetFont('aefurat','b', 10);
$pdf->Text(139,260,"Signature et cachet de l'agent recenseur");
$pdf->Text(132,265,"Signature and stemp of qualified visionary surgeon");
$pdf->Text(139,270,"a ".$pdf->nbrtostring('station','id',$result->station,'station')." Le : ".$pdf->dateUS2FR(trim($result->Datesigna)));   


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
$pdf->EAN13($x=172, $y=8,trim($result->id), $h=10, $w=.35);$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(10,55);$pdf->Cell(190,6,'CERTIFICAT SANITAIRE',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Text(20,70,"Je soussigné  : ");$pdf->Text(150,70,"Docteur Vétérinaire Inscrit à");
$pdf->Text(43,70," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(10,80,"L'AVN sous le N° : ");$pdf->Text(95,80,"atteste par la présente avoir examiné ce jour le cheval dont le");
$pdf->Text(45,80,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(10,90,"Signalement suivant : ");
$pdf->Text(10,100,"Nom  : ".trim($result->NomA));$pdf->Text(100,100,"Race : ".$pdf->nbrtostring('race','id',trim($result->Race),'race'));$pdf->Text(170,100,"Sexe : ".trim($result->Sexe));
$pdf->Text(25,100,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(113,100,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(182,100,"_ _ _ _ _ _ ");
$pdf->Text(10,110,"Robe : ".$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe'));$pdf->Text(130,110,"Age : ".$pdf->dateUS2FR(trim($result->Dns)));
$pdf->Text(25,110,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(139,110," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(10,120,"Appartenant à Mr : ".$pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP'));
$pdf->Text(42,120,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(10,130,"Demeurant à : ".trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'adresse')).' / '.$pdf->nbrtostring('com','IDCOM',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'com')),'COMMUNE'));
$pdf->Text(130,130,"Wilaya : ".$pdf->nbrtostring('wil','IDWIL',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'wil')),'WILAYAS'));
$pdf->Text(32,130," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->Text(145,130," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetFont('aefurat','B', 12);
$pdf->Text(50,141,"<< Voir signalement graphique et descriptif au verso >>");$pdf->SetFont('aefurat', '', 12);
$pdf->Text(20,150,"Et déclare qu'il ne présente ce jour aucun signe ou symptome de maladie");
$pdf->Text(10,160,"Contagieuse et à toutes les  apparences de la bonne santé");
$pdf->Text(20,170,"En foi de quoi le présent certificat  sanitaire est délivré à l'intéréssé pour servir");
$pdf->Text(10,180,"et valoir ce que de droit.");
$pdf->Text(110,190,"Fait le : ".$pdf->dateUS2FR(trim($result->Datesigna))." à : ".$pdf->nbrtostring('station','id',$result->station,'station'));
$pdf->Text(110,200,"Cachet et signature du vétérinaire");
$pdf->SetY(-10);
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
}
$pdf->Output();





























?>


