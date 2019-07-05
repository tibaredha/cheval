<?php
$id=$_GET["id"];
require('cheval.php');
require('nbrtostring.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->setPrintFooter(false);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 12);
// $pdf->SetFillColor(225, 0,0);//rouge

$pdf->mysqlconnect();
$query = "select * from saillie WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetXY(5,11);$pdf->Cell(48,6,'N° : '.$result->id,0,1,'L');
$pdf->SetXY(5+48,11);$pdf->Cell(48,6,'Année : '.substr($result->datemonte,0,4),0,1,'L');
$pdf->SetXY(5,17);$pdf->Cell(96,6,'Station de monte de : '.$pdf->nbrtostring('station','id',$result->station,'station') ,0,1,'L');
$pdf->SetXY(5,17+6);$pdf->Cell(96,6,'Wilaya : '.$pdf->nbrtostring('wilregion','id',$result->wregion,'wilregion'),0,1,'L');

$pdf->Rect(5,31,96,1,"d");
$pdf->Rect(4+96,1,1,206,"d");
	$query1 = "select * from cheval WHERE  id = $result->idcheval ";
	$resultat1=mysql_query($query1);
	while($result1=mysql_fetch_object($resultat1))
	{
	$pdf->raceequin($result1->Race);
	
	$pdf->SetFont('aefurat', 'U', 22);
	$pdf->SetXY(5,1);$pdf->Cell(96,10,' -ONDEEC- ',1,1,'C');
	$pdf->SetFont('aefurat', '', 12);
	
	$pdf->SetXY(5,36);$pdf->Cell(48,6,'Etalon : '.$result1->NomA,0,1,'L');	
	$pdf->SetXY(5+48,36);$pdf->Cell(48,6,'N° Mte : '.$result1->N,0,1,'L');	
	$pdf->SetXY(5,42);$pdf->Cell(48,6,'Race  : '.$pdf->nbrtostring('race','id',$result1->Race,'race'),0,1,'L');
	$pdf->SetXY(5+48,42);$pdf->Cell(48,6,'ESB N° : ',0,1,'L');		

	$pdf->SetXY(101,41);$pdf->Cell(48,12,'Etalon : '.$result1->NomA,1,1,'L');
	$pdf->SetXY(101+48,41);$pdf->Cell(48,12,'N° Mte : '.$result1->N,1,1,'L');
	$pdf->SetXY(150+47,41);$pdf->Cell(48,12,'Race  : '.$pdf->nbrtostring('race','id',$result1->Race,'race'),1,1,'L');
	$pdf->SetXY(150+48+47,41);$pdf->Cell(22,12,'Age : '.substr($result1->Dns,0,4),1,1,'L');
	$pdf->SetXY(150+48+47+22,41);$pdf->Cell(26,12,'ESB N° : *** ',1,1,'L');
	
	$pdf->SetXY(199,96);$pdf->Cell(47,6,'robe : '.$pdf->nbrtostring('robe','id',$result1->Nobo,'robe'),0,1,'L');$pdf->SetXY(199+47,96);$pdf->Cell(47,6,'taille : ***',0,1,'L');
	$pdf->SetXY(199,102);$pdf->Cell(47,6,'Père : '.$result1->Pere,0,1,'L');$pdf->SetXY(199+47,102);$pdf->Cell(47,6,'Race : '.$pdf->nbrtostring('race','id',$result1->RacePere,'race'),0,1,'L');
	$pdf->SetXY(199,108);$pdf->Cell(47,6,'Mère : '.$result1->mere,0,1,'L');$pdf->SetXY(199+47,108);$pdf->Cell(47,6,'Race : '.$pdf->nbrtostring('race','id',$result1->RaceMere,'race'),0,1,'L');

	$pdf->SetXY(199,114);$pdf->Cell(94,6,"Signalement",0,1,'L');
	$pdf->SetXY(199,114+6);$pdf->Cell(94,6," ",0,1,'L');
	$pdf->SetXY(199,114+12);$pdf->Cell(94,6," ",0,1,'L');
	$pdf->SetXY(199,114+18);$pdf->Cell(94,6," ",0,1,'L');
	$pdf->SetXY(199,114+24);$pdf->Cell(94,6," ",0,1,'L');
	$pdf->SetXY(199,114+30);$pdf->Cell(94,6," ",0,1,'L');
	}
	
	$query2 = "select * from cheval WHERE  id = $result->jument ";
	$resultat2=mysql_query($query2);
	while($result2=mysql_fetch_object($resultat2))
	{
	 //1ere partie gauche
	$pdf->SetXY(5,48);$pdf->Cell(96,6,'La jument nommée : '.$result2->NomA,0,1,'L');
	//$pdf->SetXY(5,54);$pdf->Cell(96,6,'Appartenant à M : '.$result2->NomP,0,1,'L');
	//$pdf->SetXY(5,60);$pdf->Cell(96,6,'Adresse  : '.$result2->adresse,0,1,'L');
	$pdf->SetXY(5,66);$pdf->Cell(96,6,'Signalement de la jument',0,1,'C');
	$pdf->SetXY(5,72);$pdf->Cell(48,6,'An/naissance : '.substr($result2->Dns,0,4),0,1,'L');
	$pdf->SetXY(5+48,72);$pdf->Cell(48,6,'Lieu : ',0,1,'L');
	$pdf->SetXY(5,78);$pdf->Cell(48,6,'Robe : '.$pdf->nbrtostring('robe','id',$result2->Nobo,'robe'),0,1,'L');
	$pdf->SetXY(5+48,78);$pdf->Cell(48,6,'Taille : ***',0,1,'L');
	$pdf->SetXY(5,84);$pdf->Cell(96,6,'Race  : '.$pdf->nbrtostring('race','id',$result2->Race,'race'),0,1,'L');
	$pdf->SetXY(5,90);$pdf->Cell(48,6,'Père : '.$result2->Pere,0,1,'L');
	$pdf->SetXY(5+48,90);$pdf->Cell(48,6,'Race : '.$pdf->nbrtostring('race','id',$result2->RacePere,'race'),0,1,'L');
	$pdf->SetXY(5,96);$pdf->Cell(48,6,'Mère : '.$result2->mere,0,1,'L');
	$pdf->SetXY(5+48,96);$pdf->Cell(48,6,'Race : '.$pdf->nbrtostring('race','id',$result2->RaceMere,'race'),0,1,'L');
	$pdf->SetXY(5,102);$pdf->Cell(96,6,'Signalement descriptif',0,1,'L');
	$pdf->SetXY(5,108);$pdf->Cell(96,6,'Tete : '.html_entity_decode(utf8_decode($result2->Tete)),0,1,'L');
	$pdf->SetXY(5,114);$pdf->Cell(96,6,' ',0,1,'L');
	$pdf->SetXY(5,120);$pdf->Cell(96,6,'AG : '.html_entity_decode(utf8_decode($result2->AG)),0,1,'L');
	$pdf->SetXY(5,126);$pdf->Cell(96,6,'AD : '.html_entity_decode(utf8_decode($result2->AD)),0,1,'L');
	$pdf->SetXY(5,132);$pdf->Cell(96,6,'PG : '.html_entity_decode(utf8_decode($result2->PG)),0,1,'L');
	$pdf->SetXY(5,138);$pdf->Cell(96,6,'PD : '.html_entity_decode(utf8_decode($result2->PD)),0,1,'L');
	$pdf->SetXY(5,144);$pdf->MultiCell(95, 18,'MARQUES : '.html_entity_decode(utf8_decode($result2->MARQUES)), 0, 'L', 0, 0, '', '', true);
	
	
	
	$pdf->SetXY(5,150);$pdf->Cell(96,6,'',0,1,'L');
    //2eme partie centrale
	$pdf->SetXY(101,66);$pdf->Cell(96,6,'Signalement de la jument',0,1,'C');
	$pdf->SetXY(101,72);$pdf->Cell(48,6,'An/naissance : '.substr($result2->Dns,0,4),0,1,'L');
	$pdf->SetXY(101+48,72);$pdf->Cell(48,6,'Lieu : ',0,1,'L');
	$pdf->SetXY(101,78);$pdf->Cell(48,6,'Robe : '.$pdf->nbrtostring('robe','id',$result2->Nobo,'robe'),0,1,'L');
	$pdf->SetXY(101+48,78);$pdf->Cell(48,6,'Taille : ***',0,1,'L');
	$pdf->SetXY(101,84);$pdf->Cell(96,6,'Race  : '.$pdf->nbrtostring('race','id',$result2->Race,'race'),0,1,'L');
	$pdf->SetXY(101,90);$pdf->Cell(48,6,'Père : '.$result2->Pere,0,1,'L');
	$pdf->SetXY(101+48,90);$pdf->Cell(48,6,'Race : '.$pdf->nbrtostring('race','id',$result2->RacePere,'race'),0,1,'L');
	$pdf->SetXY(101,96);$pdf->Cell(48,6,'Mère : '.$result2->mere,0,1,'L');
	$pdf->SetXY(101+48,96);$pdf->Cell(48,6,'Race : '.$pdf->nbrtostring('race','id',$result2->RaceMere,'race'),0,1,'L');
	$pdf->SetXY(101,102);$pdf->Cell(96,6,'Signalement descriptif',0,1,'L');
	$pdf->SetXY(101,108);$pdf->Cell(96,6,'Tete : '.html_entity_decode(utf8_decode($result2->Tete)),0,1,'L');
	$pdf->SetXY(101,114);$pdf->Cell(96,6,' ',0,1,'L');
	$pdf->SetXY(101,120);$pdf->Cell(96,6,'AG : '.html_entity_decode(utf8_decode($result2->AG)),0,1,'L');
	$pdf->SetXY(101,126);$pdf->Cell(96,6,'AD : '.html_entity_decode(utf8_decode($result2->AD)),0,1,'L');
	$pdf->SetXY(101,132);$pdf->Cell(96,6,'PG : '.html_entity_decode(utf8_decode($result2->PG)),0,1,'L');
	$pdf->SetXY(101,138);$pdf->Cell(96,6,'PD : '.html_entity_decode(utf8_decode($result2->PD)),0,1,'L');
	$pdf->SetXY(101,144);$pdf->MultiCell(95, 18,'MARQUES : '.html_entity_decode(utf8_decode($result2->MARQUES)), 0, 'L', 0, 0, '', '', true);
	$pdf->SetXY(101,150);$pdf->Cell(96,6,'',0,1,'L');
	//3emepartie droite 
	$pdf->SetXY(199,66);$pdf->Cell(94,6,'La Jument nommée : '.$result2->NomA,0,1,'L');
	$pdf->SetXY(199,72);$pdf->Cell(94,6,'dont le signalement ci contre appartenant a M : ',0,1,'L');
	//$pdf->SetXY(199,78);$pdf->Cell(94,6,$result2->NomP,0,1,'L');
	//$pdf->SetXY(199,84);$pdf->Cell(94,6,'Adresse : '.$result2->adresse,0,1,'L');
	$pdf->SetXY(199,90);$pdf->Cell(94,6,"a été saillie aujourd'huit par l'etalon indiqué ci desus ",0,1,'L');
	}
	
$pdf->Rect(101,57,96,1,"d");
$pdf->Rect(101+96,57,1,150,"d");
$pdf->SetXY(101,1);$pdf->Cell(15,10,'N°',1,1,'C');
$pdf->SetXY(101,11);$pdf->Cell(15,10,$result->id,1,1,'C');

$pdf->SetXY(116,1);$pdf->Cell(81,10,'Office National de Développement',1,1,'C');
$pdf->SetXY(116,11);$pdf->Cell(81,10,'des Elevages Equins et Camelins',1,1,'C');
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetXY(101,21);$pdf->Cell(144,20,'Certificat Réglementaire de Saillie',1,1,'C');
$pdf->SetFont('aefurat', '', 22);
$pdf->SetXY(197,1);$pdf->Cell(48,20,'ONDEEC',1,1,'C');
$pdf->SetFont('aefurat', '', 12);


$pdf->SetXY(197+48,1);$pdf->Cell(48,13,'Année : '.substr($result->datemonte,0,4),1,1,'L');	
$pdf->SetXY(197+48,14);$pdf->Cell(48,13,'Station : '.$pdf->nbrtostring('station','id',$result->station,'station'),1,1,'L');		
$pdf->SetXY(197+48,27);$pdf->Cell(48,14,'Wilaya : '.$pdf->nbrtostring('wilregion','id',$result->wregion,'wilregion'),1,1,'L');


 //1ere partie gauche	
$pdf->SetXY(5,156+5);$pdf->Cell(96,6,'La jument a été saillie :',0,1,'L');
$pdf->SetXY(5,162+5);$pdf->Cell(96,6,'1-Saut le : '.$pdf->dateUS2FR($result->datemonte1),0,1,'L');
$pdf->SetXY(5,168+5);$pdf->Cell(96,6,'2-Saut le : '.$pdf->dateUS2FR($result->datemonte2),0,1,'L');
$pdf->SetXY(5,174+5);$pdf->Cell(96,6,'3-Saut le : '.$pdf->dateUS2FR($result->datemonte3),0,1,'L');
$pdf->SetXY(5,180+5);$pdf->Cell(58,6,"Revue par l'etalon le  : ".$pdf->dateUS2FR($result->daterevue),0,1,'L');
$pdf->SetXY(5+62,180+5);$pdf->Cell(38,6,'CSN : ',0,1,'L');
$pdf->SetXY(5,186+5);$pdf->Cell(96,6,'Recu la somme de  : '.$result->SommeRecu.' DA',0,1,'L');
$obj = new nuts($result->SommeRecu, "EUR");
$text = $obj->convert("fr-FR");
$pdf->SetFont('helveticaB', 'B', 10);
$pdf->Text(5,186+6+5,ucwords($text).' DA');
$pdf->SetFont('aefurat', '', 12); 
 //2eme partie centrale
$pdf->SetXY(101,156+5);$pdf->Cell(96,6,'La jument a été saillie :',0,1,'L');
$pdf->SetXY(101,162+5);$pdf->Cell(96,6,'1-Saut le : '.$pdf->dateUS2FR($result->datemonte1),0,1,'L');
$pdf->SetXY(101,168+5);$pdf->Cell(96,6,'2-Saut le : '.$pdf->dateUS2FR($result->datemonte2),0,1,'L');
$pdf->SetXY(101,174+5);$pdf->Cell(96,6,'3-Saut le : '.$pdf->dateUS2FR($result->datemonte3),0,1,'L');
$pdf->SetXY(101,180+5);$pdf->Cell(58,6,"Revue par l'etalon le  : ".$pdf->dateUS2FR($result->daterevue),0,1,'L');
$pdf->SetXY(105+58,180+5);$pdf->Cell(38,6,'CSN : ',0,1,'L');
// $pdf->SetXY(101,186);$pdf->Cell(96,6,'Recu la somme de  : '.$result->SommeRecu.' DA',0,1,'L');
// $obj = new nuts($result->SommeRecu, "EUR");
// $text = $obj->convert("fr-FR");
// $pdf->SetFont('helveticaB', 'B', 10);
// $pdf->Text(101,186+6,ucwords($text).' DA');
$pdf->SetFont('aefurat', '', 12);
//3eme partie a droite
$pdf->Rect(199,154,96,1,"d");
$pdf->SetXY(199,160);$pdf->Cell(96,6,'Recu la somme de  : '.$result->SommeRecu.' DA',0,1,'L');
$obj = new nuts($result->SommeRecu, "EUR");
$text = $obj->convert("fr-FR");
$pdf->SetFont('helveticaB', 'B', 10);
$pdf->Text(199,167,ucwords($text).' DA');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(199,166+6);$pdf->Cell(96,6,'fait a   :',0,1,'L');
$pdf->SetXY(199,172+6);$pdf->Cell(96,6,'Signature:',0,1,'C');		


$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 12);
$pdf->Rect(4,133,191,1,"d");
$pdf->Rect(197,1,1,206,"d");
$pdf->SetXY(5,11);$pdf->Cell(96+96,6,'DECLARATION DE NAISSANCE',0,1,'C');$pdf->SetXY(5+96+96,11);$pdf->Cell(96,6,'NOTES',0,1,'C');
$pdf->SetXY(5,17);$pdf->Cell(96,6,'Je sousigné Mr : ',0,1,'L');$pdf->SetXY(5+96,17);$pdf->Cell(96,6,'Qualité : ',0,1,'L');
$pdf->SetXY(5,17+6);$pdf->Cell(96,6,"déclare qu'il est né le  : ".$pdf->dateUS2FR($result->dateresultas),0,1,'L');$pdf->SetXY(5+96,17+6);$pdf->Cell(96,6,'de la jument : '.$pdf->nbrtostring('cheval','id',$result->jument,'NomA'),0,1,'L');
$pdf->SetXY(5,17+12);$pdf->Cell(96+96,6,"un(e) poulin / pouliche qui a recu le nom de   : ".$pdf->nbrtostring0('cheval','id',$result->poulin,'NomA'),0,1,'L');
$pdf->SetXY(5,35);$pdf->Cell(192,6,'Signalement descriptif',0,1,'L');
$pdf->SetXY(5,41);
$pdf->MultiCell(192, 30, 'Tete :  '.html_entity_decode(utf8_decode($pdf->nbrtostring0('cheval','id',$result->poulin,'Tete'))), 0, 'L', 0, 0, '', '', true);
$pdf->SetXY(5,47);$pdf->Cell(192,6,' ',0,1,'L');
$pdf->SetXY(5,53);$pdf->Cell(192,6,'AG : '.html_entity_decode(utf8_decode($pdf->nbrtostring0('cheval','id',$result->poulin,'AG'))),0,1,'L');
$pdf->SetXY(5,59);$pdf->Cell(192,6,'AD : '.html_entity_decode(utf8_decode($pdf->nbrtostring0('cheval','id',$result->poulin,'AD'))),0,1,'L');
$pdf->SetXY(5,65);$pdf->Cell(192,6,'PG : '.html_entity_decode(utf8_decode($pdf->nbrtostring0('cheval','id',$result->poulin,'PG'))),0,1,'L');
$pdf->SetXY(5,71);$pdf->Cell(192,6,'PD : '.html_entity_decode(utf8_decode($pdf->nbrtostring0('cheval','id',$result->poulin,'PD'))),0,1,'L');
$pdf->SetXY(5,77);
$pdf->MultiCell(192, 35, 'Marques :  '.html_entity_decode(utf8_decode($pdf->nbrtostring0('cheval','id',$result->poulin,'MARQUES'))), 0, 'L', 0, 0, '', '', true);
$pdf->SetXY(5,83);$pdf->Cell(192,6,'',0,1,'L');
$pdf->SetXY(5,95);$pdf->Cell(192,6,'fait a '.$pdf->nbrtostring('station','id',$result->station,'station').'  le : ',0,1,'C');
$pdf->SetXY(5,140);$pdf->Cell(192,6,'Dispositions réglementaires ',0,1,'C');
$pdf->SetXY(5,146);$pdf->Cell(192,6,'la saillie des etalons est payante',0,1,'L');
$pdf->SetXY(5,152);$pdf->Cell(192,6,'la somme recue exigible au 1er saut doit etre portée en toutes lettres sur le certificat réglementaire',0,1,'L');
$pdf->SetXY(5,158);$pdf->Cell(192,6,'de la saillie celle-ci est délivré pour chaque jument est signé par le chef de station de monte ',0,1,'L');
$pdf->SetXY(5,164);$pdf->Cell(192,6,"le chef de station est chargé de veiller a la vérification de l'identité de la jument presentée et",0,1,'L');
$pdf->SetXY(5,170);$pdf->Cell(192,6,"d'orienté l'éleveur dans le choix de l'étalon celon les criteres zootechniques",0,1,'L');
$pdf->SetXY(5,176);$pdf->Cell(192,6,"la déclaration de naissance sera faite en periode de monte au chef de station par le proprietaire ",0,1,'L');
$pdf->SetXY(5,182);$pdf->Cell(192,6,"de la jument auquel est retirée le certificat reglementaire de saillie contre remise d'un recu ",0,1,'L');
$pdf->SetXY(5,188);$pdf->Cell(192,6,"tout certificat de saillie détaché est considéré comme ayant ete attribué ",0,1,'L');
$pdf->Output();

}
?>


