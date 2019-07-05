<?php

if (!ISSET($_POST['Datedebut'])||!ISSET($_POST['Datefin'])){$datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");}else{if(empty($_POST['Datedebut'])||empty($_POST['Datefin'])){ $datejour1 =date("Y-m-d");$datejour2 =date("Y-m-d");} else{$datejour1 = $_POST['Datedebut'] ;$datejour2 = $_POST['Datefin'];}}
if ($datejour1>$datejour2 or  $datejour1==$datejour2 ){header("Location: ../dashboard/Evaluation") ;}


require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$station=$_SESSION["station"];


if ($_POST['Evaluation']==0)//Registre signalement
{
$pdf->Regsigna($datejour1,$datejour2,$station);
}

if ($_POST['Evaluation']==1)//Registre saillie
{
$pdf->Regsaille($datejour1,$datejour2,$station);
}

if ($_POST['Evaluation']==4)//stud book global
{
$pdf->studbookdz('IS NOT NULL',"DU CHEVAL",$station,$datejour1,$datejour2); 
}

if ($_POST['Evaluation']==5)//stud book  Pur-Sang-Arabe
{
$pdf->studbookdz('=2',"DU PUR-SANG-ARABE",$station,$datejour1,$datejour2); 
}

if ($_POST['Evaluation']==6)//stud book  Pur-Sang-Anglais
{
$pdf->studbookdz('=3',"PUR-SANG-ANGLAIS",$station,$datejour1,$datejour2); 
}

if ($_POST['Evaluation']==7)//stud book  Arabe-Barbe
{
$pdf->studbookdz('=4',"DU ARABE-BARBE",$station,$datejour1,$datejour2);
}

if ($_POST['Evaluation']==8)//stud book  Baudets
{
$pdf->studbookdz('=5',"DU BAUDETS",$station,$datejour1,$datejour2); 
}

if ($_POST['Evaluation']==9)//stud book  Barbe
{
$pdf->studbookdz('=6',"DU BARBE",$station,$datejour1,$datejour2);
}


if ($_POST['Evaluation']==2)//Bilan saison de monte
{

$pdf->AddPage('L','A4');
//$pdf->setRTL(true); 
$pdf->SetDisplayMode('fullpage','single');
$pdf->SetFont('dejavusans', '', 12);

$pdf->entetel();



// $pdf->SetXY(10,80);$pdf->Cell(270,6,'Station : '.$pdf->nbrtostring('station','id',trim($station),'station'),1,1,'C');
// $pdf->SetFillColor(240);
// $pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(270,6,'Repartition Des Etalons',1,1,1,'L');
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(10,6,'N°',1,1,1,'L');  
// $pdf->SetXY(20,$pdf->GetY()-6);$pdf->Cell(40,6,'N° Mle',1,1,1,'C');
// $pdf->SetXY(60,$pdf->GetY()-6);$pdf->Cell(40,6,'Nom',1,1,1,'C');
// $pdf->SetXY(100,$pdf->GetY()-6);$pdf->Cell(40,6,'Race',1,1,1,'C');
// $pdf->SetXY(140,$pdf->GetY()-6);$pdf->Cell(20,6,'Age',1,1,1,'C');
// $pdf->SetXY(160,$pdf->GetY()-6);$pdf->Cell(30,6,'Robe',1,1,1,'C');
// $pdf->SetXY(190,$pdf->GetY()-6);$pdf->Cell(30,6,'Pere',1,1,1,'C');
// $pdf->SetXY(220,$pdf->GetY()-6);$pdf->Cell(30,6,'Mere',1,1,1,'C');
// $pdf->SetXY(250,$pdf->GetY()-6);$pdf->Cell(30,6,'IMPL',1,1,1,'C');
// $pdf->SetFillColor(255, 255, 255);
// $db_host="localhost"; 
// $db_name="cheval"; 
// $db_user="root";
// $db_pass="";
// $cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
// $db  = mysql_select_db($db_name,$cnx) ;
// mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
// $queryvac = "select * from cheval  WHERE  station=$station  AND Sexe='M' ";
// $resultat=mysql_query($queryvac);
// $totalmbr1=mysql_num_rows($resultat);
// while($resultvac=mysql_fetch_object($resultat))
// {
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(10,6,trim($resultvac->id),1,1,'L');  
// $pdf->SetXY(20,$pdf->GetY()-6);$pdf->Cell(40,6,trim($resultvac->N),1,1,'L');
// $pdf->SetXY(60,$pdf->GetY()-6);$pdf->Cell(40,6,trim($resultvac->NomA) ,1,1,'L');
// $pdf->SetXY(100,$pdf->GetY()-6);$pdf->Cell(40,6,$pdf->nbrtostring('race','id',trim($resultvac->Race),'race'),1,1,'L');
// $pdf->SetXY(140,$pdf->GetY()-6);$pdf->Cell(20,6,trim(substr($resultvac->Dns,0,4)),1,1,'C');
// $pdf->SetXY(160,$pdf->GetY()-6);$pdf->Cell(30,6,$pdf->nbrtostring('robe','id',trim($resultvac->Nobo),'robe'),1,1,'C');
// $pdf->SetXY(190,$pdf->GetY()-6);$pdf->Cell(30,6,trim($resultvac->Pere),1,1,'C');
// $pdf->SetXY(220,$pdf->GetY()-6);$pdf->Cell(30,6,trim($resultvac->mere),1,1,'C');
// $pdf->SetXY(250,$pdf->GetY()-6);$pdf->Cell(30,6,$pdf->dateUS2FR(trim($resultvac->Datesigna)),1,1,'C');
// }
// $pdf->SetFillColor(240);$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(270,6,'Total station : '.$totalmbr1.' étalons',1,1,1,'L');$pdf->SetFillColor(255, 255, 255);


// function jumsai($station,$datejour1,$datejour2,$datemonte)
// {
// $query_liste = "SELECT * FROM saillie WHERE  station=$station  and ( $datemonte BETWEEN '$datejour1' AND '$datejour2')";  //
// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// $totalmbr1=mysql_num_rows($requete);
// return $totalmbr1;
// }
// $pdf->SetFillColor(240);
// $pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(270,6,'Juments saillies du '.$pdf->dateUS2FR($datejour1).' au '.$pdf->dateUS2FR($datejour2),1,1,1,'L');
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(67,6,'Au 1èr saut',1,1,1,'L');  
// $pdf->SetXY(77,$pdf->GetY()-6);$pdf->Cell(67,6,'Au 2eme saut',1,1,1,'L');  
// $pdf->SetXY(144,$pdf->GetY()-6);$pdf->Cell(67,6,'Au 3eme saut',1,1,1,'L');  
// $pdf->SetXY(211,$pdf->GetY()-6);$pdf->Cell(69,6,'Total',1,1,1,'L');
// $pdf->SetFillColor(255, 255, 255); 
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(67,6,jumsai($station,$datejour1,$datejour2,'datemonte1'),1,1,'C');  
// $pdf->SetXY(77,$pdf->GetY()-6);$pdf->Cell(67,6,jumsai($station,$datejour1,$datejour2,'datemonte2'),1,1,'C');  
// $pdf->SetXY(144,$pdf->GetY()-6);$pdf->Cell(67,6,jumsai($station,$datejour1,$datejour2,'datemonte3'),1,1,'C');  
// $pdf->SetXY(211,$pdf->GetY()-6);$pdf->Cell(69,6,jumsai($station,$datejour1,$datejour2,'datemonte1')+jumsai($station,$datejour1,$datejour2,'datemonte2')+jumsai($station,$datejour1,$datejour2,'datemonte3'),1,1,'C'); 

// function prodec($station,$datejour1,$datejour2,$datemonte)
// {
// $query_liste = "SELECT * FROM saillie WHERE  station=$station  and  Resultas=0  and  ( $datemonte BETWEEN '$datejour1' AND '$datejour2')";  //
// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// $totalmbr1=mysql_num_rows($requete);
// return $totalmbr1;
// }
// $pdf->SetFillColor(240);
// $pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(270,6,'Produits déclares du '.$pdf->dateUS2FR($datejour1).' au '.$pdf->dateUS2FR($datejour2),1,1,1,'L');
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(67,6,'OC',1,1,1,'L');  
// $pdf->SetXY(77,$pdf->GetY()-6);$pdf->Cell(67,6,'OI',1,1,1,'L');  
// $pdf->SetXY(144,$pdf->GetY()-6);$pdf->Cell(67,6,'Total',1,1,1,'L');  
// $pdf->SetXY(211,$pdf->GetY()-6);$pdf->Cell(69,6,'Obs',1,1,1,'L');
// $pdf->SetFillColor(255, 255, 255); 
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(67,6,'***',1,1,'C');  
// $pdf->SetXY(77,$pdf->GetY()-6);$pdf->Cell(67,6,'***',1,1,'C');  
// $pdf->SetXY(144,$pdf->GetY()-6);$pdf->Cell(67,6,prodec($station,$datejour1,$datejour2,'dateresultas'),1,1,'C');  
// $pdf->SetXY(211,$pdf->GetY()-6);$pdf->Cell(69,6,'***',1,1,'C'); 


// SELECT *
// FROM table1
// INNER JOIN table2
// WHERE table1.id = table2.fk_id

// SELECT * FROM `saillie` INNER JOIN cheval WHERE saillie.jument= cheval.id


// function jumsairace($station,$datejour1,$datejour2,$datemonte,$race)
// {
// $query_liste = "SELECT * FROM `saillie` INNER JOIN cheval WHERE saillie.station=$station  and ( saillie.$datemonte BETWEEN '$datejour1' AND '$datejour2')  and 	cheval.Race=$race  and  saillie.jument= cheval.id    ";  //
//////$query_liste = "SELECT * FROM saillie WHERE  station=$station  and ( $datemonte BETWEEN '$datejour1' AND '$datejour2')";  //
// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
// $totalmbr1=mysql_num_rows($requete);
// return $totalmbr1;
// }


// $pdf->SetFillColor(240);
// $pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(270,6,'Recette  saillies du '.$pdf->dateUS2FR($datejour1).' au '.$pdf->dateUS2FR($datejour2),1,1,1,'L');
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(90,6,'Nombre de juments',1,1,1,'L');  
// $pdf->SetXY(100,$pdf->GetY()-6);$pdf->Cell(90,6,'P. U en (DA)',1,1,1,'L');  
// $pdf->SetXY(190,$pdf->GetY()-6);$pdf->Cell(90,6,'Montant total',1,1,1,'L');  
// $pdf->SetFillColor(255, 255, 255); 
// $pdf->SetXY(10,$pdf->GetY());$pdf->Cell(90,6,jumsairace($station,$datejour1,$datejour2,'datemonte1',4),1,1,'C');  
// $pdf->SetXY(100,$pdf->GetY()-6);$pdf->Cell(90,6,'2 000.00',1,1,'C');  
// $pdf->SetXY(190,$pdf->GetY()-6);$pdf->Cell(90,6,jumsai($station,$datejour1,$datejour2,'datemonte1')*2000,1,1,'C');  

//prevoir le prix par race



$pdf->SetXY(100,$pdf->GetY()+5);$pdf->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
$pdf->SetY(-10);$pdf->SetFont('helvetica', 'I', 8);$pdf->Cell(0, 10, 'Page '.$pdf->getAliasNumPage().'/'.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Output();
}



if ($_POST['Evaluation']==3)
{
$pdf->AddPage('P','A4');
$pdf->entetex('',$datejour1,$datejour2,$station);
$pdf->etalonsep($_POST["Datedebut"],$_POST["Datefin"]); 
$pdf->etalonsrr($_POST["Datedebut"],$_POST["Datefin"]);

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des étalons par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(2,'M');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des étalons par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(3,'M');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des étalons par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(4,'M');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des étalons par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(5,'M');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des étalons par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(6,'M');

$pdf->AddPage('P','A4');
$pdf->entetex("Effectif des juments saillies par race d'etalon",$datejour1,$datejour2,$station);
$pdf->jse($datejour1,$datejour2);
$pdf->jsey($datejour1,$datejour2); 

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des juments par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(2,'F');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des juments par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(3,'F');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des juments par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(4,'F');

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des juments par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(5,'F');


$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des juments par région et station ( public et privé )',$datejour1,$datejour2,$station);
$pdf->equinr(6,'F');

$pdf->AddPage('P','A4');
$pdf->entetex('Effectif produits déclarés',$datejour1,$datejour2,$station);
$pdf->produit($_POST["Datedebut"],$_POST["Datefin"]); 
$pdf->produitreg($_POST["Datedebut"],$_POST["Datefin"]); 

$pdf->AddPage('P','A4');
$pdf->entetex('Répartition des equides par age',$datejour1,$datejour2,$station);

//$pdf->SetXY(150,43);$pdf->Cell(96,6,'Station de monte de : '.$pdf->nbrtostring('station','id',$pdf->nbrtostring('cheval','id',trim($id),'station'),'station') ,0,1,'L');
//	$pdf->SetXY(88,43);$pdf->Cell(96,6,'Wilaya : '.$pdf->nbrtostring('wilregion','id',$pdf->nbrtostring('cheval','id',trim($id),'wregion'),'wilregion'),0,1,'L');
	// $pdf->SetFont('aefurat', '', 30);
	// $pdf->SetXY(10,50);$pdf->Cell(205,6,' ',0,1,'C');
	// $pdf->SetFont('aefurat', '', 13);
	$pdf->SetFillColor(240);
	$pdf->SetXY(10,$pdf->GetY()+20);$pdf->Cell(40,12,'Année de naissance',1,1,'C',1);
	$pdf->SetXY(50,$pdf->GetY()-12);$pdf->Cell(40,12,'Age en Année',1,1,'C',1);
	$pdf->SetXY(90,$pdf->GetY()-12);$pdf->Cell(55,12,"Nombre Equides",1,1,'C',1);
	$queryjsa = "SELECT SUBSTR(Dns, 1, 4) AS AGE1 ,count(SUBSTR(Dns, 1, 4)) AS AGE FROM cheval  GROUP BY AGE1";
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
$pdf->Output();
}




?>


