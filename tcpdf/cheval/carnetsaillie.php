<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'L', 'mm', 'A4',true,'UTF-8',false );
// $pdf->SetTextColor(0,0,255);
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->setPrintFooter(false);
$pdf->AddPage('L','A4');
//$pdf->setRTL(true); 
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('dejavusans', '', 12);
$pdf->entete() ;




$pdf->EAN13($x=10, $y=125,trim($pdf->nbrtostring('cheval','id',trim($id),'id')), $h=16, $w=.35);$pdf->SetFont('aefurat', '', 12);
$pdf->raceequin1($pdf->nbrtostring('cheval','id',trim($id),'Race'));
$pdf->SetXY(150,43);$pdf->Cell(96,6,'Station de monte de : '.$pdf->nbrtostring('station','id',$pdf->nbrtostring('cheval','id',trim($id),'station'),'station') ,0,1,'L');
$pdf->SetXY(88,43);$pdf->Cell(96,6,'Wilaya : '.$pdf->nbrtostring('wilregion','id',$pdf->nbrtostring('cheval','id',trim($id),'wregion'),'wilregion'),0,1,'L');
$pdf->SetFont('aefurat', '', 30);
$pdf->SetXY(10,50);$pdf->Cell(275,6,'REGISTRE DES SAILLIES ',0,1,'C');
$pdf->SetFont('aefurat', '', 13);
$pdf->SetXY(10,70);$pdf->Cell(68,10,'N° matricule : '.$pdf->nbrtostring('cheval','id',trim($id),'N'),1,1,'L');
$pdf->SetXY(78,70);$pdf->Cell(68,10,'Nom : '.$pdf->nbrtostring('cheval','id',trim($id),'NomA'),1,1,'L');
$pdf->SetXY(146,70);$pdf->Cell(68,10,'Robe : '.$pdf->nbrtostring('robe','id',$pdf->nbrtostring('cheval','id',trim($id),'Nobo'),'robe'),1,1,'L');
$pdf->SetXY(214,70);$pdf->Cell(68,10,'Inscrit au S B N° : ',1,1,'L');
$pdf->SetXY(10,80);$pdf->Cell(272,10,'Race : '.$pdf->nbrtostring('race','id',$pdf->nbrtostring('cheval','id',trim($id),'Race'),'race'),1,1,'C');
$pdf->SetXY(10,90);$pdf->Cell(136,10,'Par : '.$pdf->nbrtostring('cheval','id',trim($id),'Pere'),1,1,'L');
$pdf->SetXY(146,90);$pdf->Cell(136,10,'Et : '.$pdf->nbrtostring('cheval','id',trim($id),'mere'),1,1,'L');
$pdf->SetXY(10,100);$pdf->Cell(68,10,'Année de Naissance : '.$pdf->dateUS2FR($pdf->nbrtostring('cheval','id',trim($id),'Dns')),1,1,'L');
$pdf->SetXY(78,100);$pdf->Cell(68,10,'Taille : ',1,1,'L');
$pdf->SetXY(146,100);$pdf->Cell(68,10,'Tour de Canon : ',1,1,'L');
$pdf->SetXY(214,100);$pdf->Cell(68,10,'Nombre du 1er Saut° : ',1,1,'L');
$pdf->SetXY(78,130);$pdf->Cell(68,10,'Soins Spéciaux : ',0,1,'L');
$pdf->SetXY(146,110);$pdf->Cell(136,10,'Nourriture : ------------------------------------------------------------------ ',0,1,'L');
$pdf->SetXY(146,120);$pdf->Cell(136,10,'Membres : -------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(146,130);$pdf->Cell(136,10,'Fourreau : -------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(146,140);$pdf->Cell(136,10,'Pieds : -----------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(146,150);$pdf->Cell(136,10,'Ferrure : ---------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(10,160);$pdf->Cell(272,10,'Caractère à la saillie : -----------------------------------------------------------------------------------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(10,170);$pdf->Cell(272,10,'Nbr Jument à lui donner : ------------------------------------------------------------------------------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(10,180);$pdf->Cell(272,10,'Désignation comme souffleur : -----------------------------------------------------------------------------------------------------------------------------------',0,1,'L');
$pdf->SetXY(10,190);$pdf->Cell(272,10,"Etat d'entretient au départ : ----------------------------------------------------------------------------------------------------------------------------------------",0,1,'L');
$pdf->SetY(-10);$pdf->SetFont('helvetica', 'I', 8);$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->AddPage('L','A4');
$db_host="localhost"; 
$db_name="cheval"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
$pdf->SetFont('aefurat', '', 12);

if ($pdf->nbrtostring('cheval','id',trim($id),'Sexe')=='M') {
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,10);$pdf->Cell(10,12,'N°',1,1,1,'C');
	$pdf->SetXY(20,10);$pdf->Cell(50,12,'Nom du Proprietaire',1,1,1,'C');
	$pdf->SetXY(20+50,10);$pdf->Cell(50,12,'Adresse du Proprietaire',1,1,1,'C');
	$pdf->SetXY(20+100,10);$pdf->Cell(85,5,'Signalement de la jument',1,1,1,'C');
	$pdf->SetXY(20+100,15.5);$pdf->Cell(25,6.5,'Nom',1,1,1,'C');
	$pdf->SetXY(20+125,15.5);$pdf->Cell(25,6.5,'Robe',1,1,1,'C');
	$pdf->SetXY(20+150,15.5);$pdf->Cell(10,6.5,'Age',1,1,1,'C');
	$pdf->SetXY(180,15.5);$pdf->Cell(25,6.5,'Matricule',1,1,1,'C');
	$pdf->SetXY(205,10);$pdf->Cell(22,12,'1 Saut',1,1,1,'C');
	$pdf->SetXY(227,10);$pdf->Cell(22,12,'2 Saut',1,1,1,'C');
	$pdf->SetXY(249,10);$pdf->Cell(22,12,'3 Saut',1,1,1,'C');
	$pdf->SetXY(271,10);$pdf->Cell(15,12,'Resultas',1,1,1,'C');
	$pdf->SetFillColor(255, 255, 255);
	$queryvac = "select * from saillie WHERE  idcheval = '$id'   ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$pdf->SetFont('aefurat', '', 11);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(10,10,trim($resultvac->id),1,1,'C',0);
	$pdf->SetXY(20,$pdf->GetY()-10);$pdf->Cell(50,10,$pdf->nbrtostring('cheval','id',$pdf->nbrtostringv('eleveur','id',trim($resultvac->jument),'ideleveur'),'NomP')  ,1,1,'L',0); 
	$pdf->SetXY(70,$pdf->GetY()-10);$pdf->Cell(50,10,$pdf->nbrtostringv('eleveur','id',$pdf->nbrtostring('cheval','id',trim($resultvac->jument),'ideleveur'),'adresse'),1,1,'L',0); $pdf->racesregistre($pdf->nbrtostring('cheval','id',trim($resultvac->jument),'Race')); 
	$pdf->SetXY(120,$pdf->GetY()-10);$pdf->Cell(25,10,$pdf->nbrtostring('cheval','id',trim($resultvac->jument),'NomA'),1,1,'L',1,0); $pdf->SetFillColor(0, 0, 0);
	$pdf->SetXY(145,$pdf->GetY()-10);$pdf->Cell(25,10,$pdf->nbrtostring('robe','id',$pdf->nbrtostring('cheval','id',trim($resultvac->jument),'Nobo'),'robe'),1,1,'L',0); 
	$pdf->SetXY(170,$pdf->GetY()-10);$pdf->Cell(10,10,substr($pdf->dateUS2FR($pdf->nbrtostring('cheval','id',trim($resultvac->jument),'Dns')),6,4),1,1,'C',0); 
	$pdf->SetXY(180,$pdf->GetY()-10);$pdf->Cell(25,10,$pdf->nbrtostring('cheval','id',trim($resultvac->jument),'N'),1,1,'C',0); 
	if ($resultvac->datemonte1=='0000-00-00') 
	{
	$pdf->SetXY(205,$pdf->GetY()-10);$pdf->Cell(22,10,'***',1,1,'C',0);
	} 
	else 
	{
	$pdf->SetXY(205,$pdf->GetY()-10);$pdf->Cell(22,10,$pdf->dateUS2FR(trim($resultvac->datemonte1)),1,1,'C',0);
	}

	if ($resultvac->datemonte2=='0000-00-00') 
	{
	$pdf->SetXY(227,$pdf->GetY()-10);$pdf->Cell(22,10,'***',1,1,'C',0);
	} 
	else 
	{
	$pdf->SetXY(227,$pdf->GetY()-10);$pdf->Cell(22,10,$pdf->dateUS2FR(trim($resultvac->datemonte2)),1,1,'C',0);
	}
	if ($resultvac->datemonte3=='0000-00-00') 
	{
	$pdf->SetXY(249,$pdf->GetY()-10);$pdf->Cell(22,10,'***',1,1,'C',0);
	} 
	else 
	{
	$pdf->SetXY(249,$pdf->GetY()-10);$pdf->Cell(22,10,$pdf->dateUS2FR(trim($resultvac->datemonte3)),1,1,'C',0);
	}
	if ($resultvac->Resultas==1) 
	{
	$pdf->SetFillColor(144, 238, 144);
	$pdf->SetXY(271,$pdf->GetY()-10);$pdf->Cell(15,10,'S',1,1,'C',1,0);
	$pdf->SetFillColor(255, 255, 255);
	} 
	else 
	{
	$pdf->SetFillColor(255, 99, 71);
	$pdf->SetXY(271,$pdf->GetY()-10);$pdf->Cell(15,10,'NF',1,1,'C',1,0);
	$pdf->SetFillColor(255, 255, 255);
	} 
	}
	function fecondem($id)
	{
	$query_liste = "SELECT * FROM saillie WHERE  idcheval=$id  and  Resultas=1 ";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function nbrsaut($id,$col)
	{
	$query_liste = "SELECT * FROM saillie WHERE  idcheval=$id  and   $col !='0000-00-00' ";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(195,10,"Nombre totale de saillies : ".$num_rows,1,1,1,'L',0); 
	$pdf->SetXY(205,$pdf->GetY()-10);$pdf->Cell(22,10,nbrsaut($id,'datemonte1').' (s)',1,1,'C',1,0); 
	$pdf->SetXY(227,$pdf->GetY()-10);$pdf->Cell(22,10,nbrsaut($id,'datemonte2').' (s)',1,1,'C',1,0); 
	$pdf->SetXY(249,$pdf->GetY()-10);$pdf->Cell(22,10,nbrsaut($id,'datemonte3').' (s)',1,1,'C',1,0); 
	$pdf->SetXY(271,$pdf->GetY()-10);$pdf->Cell(15,10,fecondem($id).' (s)',1,1,'C',1,0); 
	
	if($num_rows!=0) {
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(195,10,'Taux de fécondite : '.round((fecondem($id)/$num_rows)*100,2).' %',1,1,1,'L',0); 
	} else {
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(195,10,'Taux de fécondite : 00'.' %',1,1,1,'L',0); 
	}
	
	
	$pdf->SetXY(205,$pdf->GetY()-10);$pdf->Cell(81,10,nbrsaut($id,'datemonte1')+nbrsaut($id,'datemonte2')+nbrsaut($id,'datemonte3').' Sauts',1,1,'C',1,0); 
	$pdf->SetFillColor(255, 255, 255);
	
	$pdf->AddPage('L','A4');
	$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
	$pdf->SetFont('dejavusans', '', 12);
	$pdf->entete() ;
	// $pdf->EAN13($x=10, $y=125,trim($pdf->nbrtostring('cheval','id',trim($id),'N')), $h=16, $w=.35);$pdf->SetFont('aefurat', '', 12);
	// $pdf->raceequin1($pdf->nbrtostring('cheval','id',trim($id),'Race'));
	$pdf->SetXY(150,43);$pdf->Cell(96,6,'Station de monte de : '.$pdf->nbrtostring('station','id',$pdf->nbrtostring('cheval','id',trim($id),'station'),'station') ,0,1,'L');
	$pdf->SetXY(88,43);$pdf->Cell(96,6,'Wilaya : '.$pdf->nbrtostring('wilregion','id',$pdf->nbrtostring('cheval','id',trim($id),'wregion'),'wilregion'),0,1,'L');
	$pdf->SetFont('aefurat', '', 30);
	$pdf->SetXY(10,50);$pdf->Cell(275,6,'REPARTITION DES JUMENTS SAILLIES PAR AGE ',0,1,'C');
	$pdf->SetFont('aefurat', '', 13);
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(40,12,'Année de naissance',1,1,'C',1);
	$pdf->SetXY(50,$pdf->GetY()-12);$pdf->Cell(40,12,'Age en Année',1,1,'C',1);
	$pdf->SetXY(90,$pdf->GetY()-12);$pdf->Cell(55,12,'Nombre de juments saillies',1,1,'C',1);
	$queryjsa = "SELECT SUBSTR(cheval.Dns, 1, 4) AS AGE1 ,count(SUBSTR(cheval.Dns, 1, 4)) AS AGE FROM saillie  INNER JOIN cheval  where   saillie.`jument` = cheval.id AND  saillie.idcheval='$id' GROUP BY AGE1";
	$resultatjsa=mysql_query($queryjsa);
	$num_rows = mysql_num_rows($resultatjsa);
	$pdf->SetFont('aefurat', '', 11);
	$pdf->SetFillColor(255, 255, 255);
	while($resultjsa=mysql_fetch_object($resultatjsa))
	{
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(40,6,trim($resultjsa->AGE1),1,1,'C',0);
	$pdf->SetXY(50,$pdf->GetY()-6);$pdf->Cell(40,6,date('Y')-trim($resultjsa->AGE1),1,1,'C',0);
	$pdf->SetXY(90,$pdf->GetY()-6);$pdf->Cell(55,6,trim($resultjsa->AGE),1,1,'C',0);
	}	
}

if ($pdf->nbrtostring('cheval','id',trim($id),'Sexe')=='F') {
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,10);$pdf->Cell(10,12,'N°',1,1,1,'C');
	$pdf->SetXY(20,10);$pdf->Cell(50,12,'Nom du Proprietaire',1,1,1,'C');
	$pdf->SetXY(20+50,10);$pdf->Cell(50,12,'Adresse du Proprietaire',1,1,1,'C');
	$pdf->SetXY(20+100,10);$pdf->Cell(100,5,"Signalement de L'étalon",1,1,1,'C');
	$pdf->SetXY(20+100,15.5);$pdf->Cell(25,6.5,'Nom',1,1,1,'C');
	$pdf->SetXY(20+125,15.5);$pdf->Cell(25,6.5,'Robe',1,1,1,'C');
	$pdf->SetXY(20+150,15.5);$pdf->Cell(10,6.5,'Age',1,1,1,'C');
	$pdf->SetXY(180,15.5);$pdf->Cell(25,6.5,'Matricule',1,1,1,'C');
	$pdf->SetXY(205,10);$pdf->Cell(22,12,'1 Saut',1,1,1,'C');
	$pdf->SetXY(227,10);$pdf->Cell(22,12,'2 Saut',1,1,1,'C');
	$pdf->SetXY(249,10);$pdf->Cell(22,12,'3 Saut',1,1,1,'C');
	$pdf->SetXY(271,10);$pdf->Cell(15,12,'Resultas',1,1,1,'C');
	$pdf->SetFillColor(255, 255, 255);
	$queryvac = "select * from saillie WHERE  jument = '$id'   ";//WHERE  id = '$id' limit 0,9
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(10,10,trim($resultvac->id),1,1,'C',0);
	$pdf->SetXY(20,$pdf->GetY()-10);$pdf->Cell(50,10,$pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'NomP'),1,1,'L',0); 
	$pdf->SetXY(70,$pdf->GetY()-10);$pdf->Cell(50,10,$pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'adresse'),1,1,'L',0);$pdf->racesregistre($pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'Race'));  
	$pdf->SetXY(120,$pdf->GetY()-10);$pdf->Cell(25,10,$pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'NomA'),1,1,'L',1,0); $pdf->SetFillColor(0, 0, 0);
	$pdf->SetXY(145,$pdf->GetY()-10);$pdf->Cell(25,10,$pdf->nbrtostring('robe','id',$pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'Nobo'),'robe'),1,1,'L',0); 
	$pdf->SetXY(170,$pdf->GetY()-10);$pdf->Cell(10,10,substr($pdf->dateUS2FR($pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'Dns')),6,4),1,1,'C',0); 
	$pdf->SetXY(180,$pdf->GetY()-10);$pdf->Cell(25,10,$pdf->nbrtostring('cheval','id',trim($resultvac->idcheval),'N'),1,1,'C',0); 
	if ($resultvac->datemonte1=='0000-00-00') 
	{
	$pdf->SetXY(205,$pdf->GetY()-10);$pdf->Cell(22,10,'***',1,1,'C',0);
	} 
	else 
	{
	$pdf->SetXY(205,$pdf->GetY()-10);$pdf->Cell(22,10,$pdf->dateUS2FR(trim($resultvac->datemonte1)),1,1,'C',0);
	}

	if ($resultvac->datemonte2=='0000-00-00') 
	{
	$pdf->SetXY(227,$pdf->GetY()-10);$pdf->Cell(22,10,'***',1,1,'C',0);
	} 
	else 
	{
	$pdf->SetXY(227,$pdf->GetY()-10);$pdf->Cell(22,10,$pdf->dateUS2FR(trim($resultvac->datemonte2)),1,1,'C',0);
	}
	if ($resultvac->datemonte3=='0000-00-00') 
	{
	$pdf->SetXY(249,$pdf->GetY()-10);$pdf->Cell(22,10,'***',1,1,'C',0);
	} 
	else 
	{
	$pdf->SetXY(249,$pdf->GetY()-10);$pdf->Cell(22,10,$pdf->dateUS2FR(trim($resultvac->datemonte3)),1,1,'C',0);
	}
	if ($resultvac->Resultas==1) 
	{
	$pdf->SetFillColor(144, 238, 144);
	$pdf->SetXY(271,$pdf->GetY()-10);$pdf->Cell(15,10,'S',1,1,'C',1,0);
	$pdf->SetFillColor(255, 255, 255);
	} 
	else 
	{
	$pdf->SetFillColor(255, 99, 71);
	$pdf->SetXY(271,$pdf->GetY()-10);$pdf->Cell(15,10,'NF',1,1,'C',1,0);
	$pdf->SetFillColor(255, 255, 255);
	}
	}
	function fecondef($id)
	{
	$query_liste = "SELECT * FROM saillie WHERE  jument=$id  and  Resultas=1 ";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(276,10,"Nombre totale de saillies : ".$num_rows.'  Taux de fécondite : '.round((fecondef($id)/$num_rows)*100,2).' %',1,1,1,'L',0); 
	$pdf->SetFillColor(255, 255, 255);
	
    $pdf->AddPage('L','A4');
	$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
	$pdf->SetFont('dejavusans', '', 12);
	$pdf->entete() ;
	// $pdf->EAN13($x=10, $y=125,trim($pdf->nbrtostring('cheval','id',trim($id),'N')), $h=16, $w=.35);$pdf->SetFont('aefurat', '', 12);
	// $pdf->raceequin1($pdf->nbrtostring('cheval','id',trim($id),'Race'));
	$pdf->SetXY(150,43);$pdf->Cell(96,6,'Station de monte de : '.$pdf->nbrtostring('station','id',$pdf->nbrtostring('cheval','id',trim($id),'station'),'station') ,0,1,'L');
	$pdf->SetXY(88,43);$pdf->Cell(96,6,'Wilaya : '.$pdf->nbrtostring('wilregion','id',$pdf->nbrtostring('cheval','id',trim($id),'wregion'),'wilregion'),0,1,'L');
	$pdf->SetFont('aefurat', '', 30);
	$pdf->SetXY(10,50);$pdf->Cell(275,6,'REPARTITION DES ETALONS SAILLIES PAR AGE ',0,1,'C');
	$pdf->SetFont('aefurat', '', 13);
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(40,12,'Année de naissance',1,1,'C',1);
	$pdf->SetXY(50,$pdf->GetY()-12);$pdf->Cell(40,12,'Age en Année',1,1,'C',1);
	$pdf->SetXY(90,$pdf->GetY()-12);$pdf->Cell(55,12,"Nombre d'étalons",1,1,'C',1);
	$queryjsa = "SELECT SUBSTR(cheval.Dns, 1, 4) AS AGE1 ,count(SUBSTR(cheval.Dns, 1, 4)) AS AGE FROM saillie  INNER JOIN cheval  where   saillie.`idcheval` = cheval.id AND  saillie.jument='$id' GROUP BY AGE1";
	$resultatjsa=mysql_query($queryjsa);
	$num_rows = mysql_num_rows($resultatjsa);
	$pdf->SetFont('aefurat', '', 11);
	$pdf->SetFillColor(255, 255, 255);
	while($resultjsa=mysql_fetch_object($resultatjsa))
	{
	$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(40,6,trim($resultjsa->AGE1),1,1,'C',0);
	$pdf->SetXY(50,$pdf->GetY()-6);$pdf->Cell(40,6,date('Y')-trim($resultjsa->AGE1),1,1,'C',0);
	$pdf->SetXY(90,$pdf->GetY()-6);$pdf->Cell(55,6,trim($resultjsa->AGE),1,1,'C',0);
	}





	
}
$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
$pdf->SetY(-10);$pdf->SetFont('helvetica', 'I', 8);$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');


	
	
	// $EPH1="='1'";
// $datejour1='2000-01-01';
// $datejour2='2020-01-01';
// $pdf->AddPage();
// $pdf->SetFont( 'helvetica', '', 10 );
// $pdf->dureehospitalisation1(html_entity_decode(utf8_decode("II-Distribution des décès par Durée D'hospitalisation")),$datejour1,$datejour2,'SERVICEHOSPIT',$EPH1);








$pdf->Output();
?>


