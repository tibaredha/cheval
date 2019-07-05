<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );
// $pdf->SetTextColor(0,0,255);
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->setPrintFooter(false);
$pdf->mysqlconnect();
$query = "select * from cheval WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(1,1,"Numéro de puce : ".trim($result->NPPRODUIT));
$pdf->SetFont('dejavusans', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,6,$pdf->repar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->Cell(190,6,$pdf->minar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->minfr,0,1,'C');
$pdf->Cell(190,6,$pdf->ondeecar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->ondeecfr,0,1,'C');
$pdf->EAN13($x=175, $y=2,trim($result->id), $h=10, $w=.35);$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(10,55);$pdf->Cell(190,6,'Certificat de bilan des chevaux',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,55+6);$pdf->Cell(190,6,'Contre la Grippe-Tetanos-Rage',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Text(20,70,"Je soussigné  : ");$pdf->Text(150,70,"Docteur Vétérinaire Inscrit à");
$pdf->Text(43,70," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(10,80,"L'AVN sous le N° : ");$pdf->Text(95,80,"certifie avoir vacciné ce jour le cheval dont le");
$pdf->Text(45,80,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(10,90,"Signalement suivant : ");
$pdf->Text(10,100,"Nom  : ".trim($result->NomA));$pdf->Text(100,100,"Race : ".$pdf->nbrtostring('race','id',trim($result->Race),'race'));$pdf->Text(170,100,"Sexe : ".trim($result->Sexe));
$pdf->Text(25,100,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(113,100,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(182,100,"_ _ _ _ _ _ ");
$pdf->Text(10,110,"Robe : ".$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe'));$pdf->Text(130,110,"Age : ".$pdf->dateUS2FR(trim($result->Dns)));
$pdf->Text(25,110,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->Text(139,110," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(10,120,"Appartenant à Mr : ".trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP')));
$pdf->Text(42,120,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->Text(10,130,"Demeurant à : ".$pdf->nbrtostring('com','IDCOM',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'com')),'COMMUNE'));
$pdf->Text(130,130,"Wilaya : ".$pdf->nbrtostring('wil','IDWIL',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'wil')),'WILAYAS'));
$pdf->Text(32,130," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");$pdf->Text(145,130," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetFont('aefurat','B', 12);
$pdf->Text(50,140,"");$pdf->SetFont('aefurat', '', 12);
 function vaccin($vaccin,$limit,$idcheval)
	{
	$db_host="localhost"; 
	$db_name="cheval"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier and id=87
	$query_liste = "SELECT * FROM vaccination WHERE vaccin='$vaccin'  and idcheval='$idcheval'  order by datevaccination  limit $limit,1";//   Datesigna BETWEEN '$datejour1' AND '$datejour2'  and   Race='$Race' and Sexe='$Sexe' and   secteur='$cat'  
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	while ($row = mysql_fetch_array($requete, MYSQL_BOTH))
	return $comme=$row['datevaccination'];
	}

                                                                             $pdf->SetXY(65,144);$pdf->Cell(55,6,'Date de la premiere injection',1,1,'C');  $pdf->SetXY(120,144);$pdf->Cell(55,6,'Date de la deuxième injection',1,1,'C'); $pdf->SetXY(120+55,144);$pdf->Cell(30,6,'Date rappel',1,1,'C');
$pdf->SetXY(10,150);$pdf->Cell(55,10,'la primo-vaccination Grippe',1,1,'C'); $pdf->SetXY(65,150);$pdf->Cell(55,10,vaccin('grippe',0,$result->id),1,1,'C');  $pdf->SetXY(120,150);$pdf->Cell(55,10,vaccin('grippe',1,$result->id),1,1,'C'); $pdf->SetXY(120+55,150);$pdf->Cell(30,10,vaccin('grippe',2,$result->id),1,1,'C');
$pdf->SetXY(10,160);$pdf->Cell(55,10,'la primo-vaccination Tetanos',1,1,'C');$pdf->SetXY(65,160);$pdf->Cell(55,10,vaccin('tetanos',0,$result->id),1,1,'C'); $pdf->SetXY(120,160);$pdf->Cell(55,10,vaccin('tetanos',1,$result->id),1,1,'C');$pdf->SetXY(120+55,160);$pdf->Cell(30,10,vaccin('tetanos',2,$result->id),1,1,'C');
$pdf->SetXY(10,170);$pdf->Cell(55,10,'la primo-vaccination Rage',1,1,'C');   $pdf->SetXY(65,170);$pdf->Cell(55,10,vaccin('rage',0,$result->id),1,1,'C');    $pdf->SetXY(120,170);$pdf->Cell(55,10,vaccin('rage',1,$result->id),1,1,'C');   $pdf->SetXY(120+55,170);$pdf->Cell(30,10,vaccin('rage',2,$result->id),1,1,'C');

$pdf->Text(10,190,"les rappels :");
$pdf->Text(10,190+6,"la Grippe : le premier rappel : 05 mois aprés la primo-vaccination");
   $pdf->Text(29,190+12,"Rappel annuel : 12 mois aprés le premier rappel");
$pdf->Text(10,190+18,"Tetanos : le premier rappel : 17 mois plus tard aprés la primo-vaccination");
   $pdf->Text(27,190+24,"Ensuite un interval maximal de 24 mois ,est recommandé pour effectuer  :");
   $pdf->Text(27,190+30,"Les rappels suivants.");
$pdf->Text(10,190+36,"Rage : Rappel annuel : 12 mois aprés la primo-vaccination");

$pdf->Text(20,240,"En foi de quoi le présent certificat sanitaire est délivré à l'intéréssé pour servir");
$pdf->Text(10,246,"et valoir ce que de droit.");
$pdf->Text(110,252,"Fait le : ".$pdf->dateUS2FR(trim($result->Datesigna))." à : ".$pdf->nbrtostring('station','id',$result->station,'station'));
$pdf->Text(110,258,"Cachet et signature du vétérinaire");
$pdf->SetY(-10);
$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
}
$pdf->Output();
?>


