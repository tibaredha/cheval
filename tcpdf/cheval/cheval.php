<?php
require('../tcpdf.php');
class cheval extends TCPDF
{ 
    public $nomprenom ="tibaredha";
	public $db_host="localhost";
	public $db_name="cheval";   
    public $db_user="root";
    public $db_pass="";
	public $utf8 = "" ;
	
	
	public $logo = "../../public/images/logox.png" ;
	public $repar = "الجمهورية الجزائرية الديمقراطية الشعبية" ;
	public $repfr = "République Algérienne Démocratique et Populaire" ;
	public $minar = "وزارة الفلاحة و التنمية الريفية والصيد البحري " ;
	public $minfr = "MINISTERE DE L'AGRICULTURE,DU DEVELOPPEMENT RURAL ET DE LA PÊCHE " ;
	public $ondeecar = "الديوان الوطني لتنمية تربية الخيول و الإبل " ;//"الديوان الوطني لتنية تربية الخيول و الإبل " ;
	public $ondeecfr = "Office National de Développement des Elevages  Equins et Camelins" ;
	
	
	
	function dateFR2US($date)
	{
	$J= substr($date,0,2);$M= substr($date,3,2);$A= substr($date,6,4);$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;
	}
	function dateUS2FR($date)
    {
	$J= substr($date,8,2);$M= substr($date,5,2);$A= substr($date,0,4);$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;
    }	
	
	function mysqlconnect()
	{
	$this->db_host;
	$this->db_name;
	$this->db_user;
	$this->db_pass;
    $cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	//***********************************************************evaluation*******************************************************************************//
	function Regsigna ($datejour1,$datejour2,$station)
	{
	$this->SetHeaderMargin(2);
	$this->SetFooterMargin(6);
	$this->setTitle('Registre signalement');
	$this->AddPage('L','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entete() ;	
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,80);$this->Cell(276,6,'Registre signalement  Station  de monte : '.$this->nbrtostring('station','id',trim($station),'station'),0,1,'C',1,0,'');$this->SetFillColor(0, 0, 0);
	$this->SetFillColor(240);
	$this->SetXY(10,96);$this->Cell(276,10,'Registre signalement du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,106);$this->Cell(10,12,'N°',1,1,1,'C');
	$this->SetXY(20,106);$this->Cell(20,12,'Date ',1,1,1,'C');
	$this->SetXY(40,106);$this->Cell(40,12,'Proprietaire',1,1,1,'C');
	$this->SetXY(20+60,106);$this->Cell(85+40,5,"Signalement de l'equin",1,1,1,'C');
	$this->SetXY(20+25+35,111.5);$this->Cell(35,6.5,'Nom',1,1,1,'C');
	$this->SetXY(115,111.5);$this->Cell(30,6.5,'Race',1,1,1,'C');
	$this->SetXY(20+125,111.5);$this->Cell(25,6.5,'Robe',1,1,1,'C');
	$this->SetXY(20+150,111.5);$this->Cell(10,6.5,'Age',1,1,1,'C');
	$this->SetXY(180,111.5);$this->Cell(25,6.5,'Matricule',1,1,1,'C');
	$this->SetXY(205,106);$this->Cell(27,12,'Pere',1,1,1,'C');
	$this->SetXY(232,106);$this->Cell(27,12,'Mere',1,1,1,'C');
	$this->SetXY(259,106);$this->Cell(12,12,'Sexe',1,1,1,'C');
	$this->SetXY(271,106);$this->Cell(15,12,'Taille ',1,1,1,'C');
	$this->SetFillColor(255, 255, 255);
	$this->mysqlconnect();	
	$queryvac = "select * from cheval  WHERE station=$station  and  (Datesigna BETWEEN '$datejour1' AND '$datejour2') order by Datesigna,NomA ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(10,10,trim($resultvac->id),1,1,'C',0);
	$this->SetXY(20,$this->GetY()-10);$this->Cell(20,10,$this->dateUS2FR(trim($resultvac->Datesigna)),1,1,'L',0);
	$this->SetXY(40,$this->GetY()-10);$this->Cell(40,10,$this->nbrtostringv('eleveur','id',$resultvac->ideleveur,'NomP'),1,1,'L',0);
	$this->SetXY(80,$this->GetY()-10);$this->Cell(35,10,trim($resultvac->NomA),1,1,'L',0);$this->racesregistre($resultvac->Race); 
	$this->SetXY(115,$this->GetY()-10);$this->Cell(30,10,$this->nbrtostring('race','id',trim($resultvac->Race),'race'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(145,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostring('robe','id',trim($resultvac->Nobo),'robe'),1,1,'L',0);
	$this->SetXY(170,$this->GetY()-10);$this->Cell(10,10,substr($this->dateUS2FR(trim($resultvac->Dns)),6,4),1,1,'C',0);
	$this->SetXY(180,$this->GetY()-10);$this->Cell(25,10,trim($resultvac->N),1,1,'C',0);
	$this->SetXY(205,$this->GetY()-10);$this->Cell(27,10,trim($resultvac->Pere),1,1,'L',0);
	$this->SetXY(232,$this->GetY()-10);$this->Cell(27,10,trim($resultvac->mere),1,1,'L',0);
	$this->SetXY(259,$this->GetY()-10);$this->Cell(12,10,trim($resultvac->Sexe),1,1,'C',0);
	$this->SetXY(271,$this->GetY()-10);$this->Cell(15,10,'',1,1,'C',0);
	}
	$this->SetFillColor(240);$this->SetXY(10,$this->GetY());$this->Cell(276,10,'Nombre des signalements : '.$num_rows,1,1,1,'L');$this->SetFillColor(255, 255, 255);
	$this->SetXY(100,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
	//$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	$this->Output();	
	}
	function Regsaille ($datejour1,$datejour2,$station)
	{
	$this->AddPage('L','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entete() ;

	$this->SetXY(10,80);$this->Cell(276,6,'Registre des saillies Station  de monte : '.$this->nbrtostring('station','id',trim($station),'station'),1,1,'C');
	$this->SetFillColor(240);
	$this->SetXY(10,96);$this->Cell(276,10,'Registre des saillies du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,106);$this->Cell(10,12,'N°',1,1,1,'C');
	$this->SetXY(20,106);$this->Cell(20,12,'Date saillie',1,1,1,'C');
	$this->SetXY(40,106);$this->Cell(50,12,'Etalon',1,1,1,'C');
	$this->SetXY(90,106);$this->Cell(30,12,'Race',1,1,1,'C');
	$this->SetXY(20+100,106);$this->Cell(85,5,'Signalement de la jument',1,1,1,'C');
	$this->SetXY(20+100,111.5);$this->Cell(25,6.5,'Nom',1,1,1,'C');
	$this->SetXY(20+125,111.5);$this->Cell(25,6.5,'Robe',1,1,1,'C');
	$this->SetXY(20+150,111.5);$this->Cell(10,6.5,'Age',1,1,1,'C');
	$this->SetXY(180,111.5);$this->Cell(25,6.5,'Matricule',1,1,1,'C');
	$this->SetXY(205,106);$this->Cell(22,12,'1 Saut',1,1,1,'C');
	$this->SetXY(227,106);$this->Cell(22,12,'2 Saut',1,1,1,'C');
	$this->SetXY(249,106);$this->Cell(22,12,'3 Saut',1,1,1,'C');
	$this->SetXY(271,106);$this->Cell(15,12,'Resultas',1,1,1,'C');
	$this->SetFillColor(255, 255, 255);
	$queryvac = "select * from saillie WHERE station=$station  and  (datemonte BETWEEN '$datejour1' AND '$datejour2') order by datemonte";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(10,10,trim($resultvac->id),1,1,'C',0);
	$this->SetXY(20,$this->GetY()-10);$this->Cell(20,10,$this->dateUS2FR($resultvac->datemonte),1,1,'C',0);
	$this->racesregistre($this->nbrtostring('cheval','id',trim($resultvac->idcheval),'Race')); 
	$this->SetXY(40,$this->GetY()-10);$this->Cell(50,10,$this->nbrtostring('cheval','id',trim($resultvac->idcheval),'NomA'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(90,$this->GetY()-10);$this->Cell(30,10,$this->nbrtostring('race','id',$this->nbrtostring('cheval','id',trim($resultvac->idcheval),'Race'),'race'),1,1,'L',0);
	$this->racesregistre($this->nbrtostringv('cheval','id',trim($resultvac->jument),'Race')); 
	$this->SetXY(120,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostringv('cheval','id',trim($resultvac->jument),'NomA'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(145,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostringv('robe','id',$this->nbrtostringv('cheval','id',trim($resultvac->jument),'Nobo'),'robe'),1,1,'L',0);
	$this->SetXY(170,$this->GetY()-10);$this->Cell(10,10,substr($this->dateUS2FR($this->nbrtostringv('cheval','id',trim($resultvac->jument),'Dns')),6,4),1,1,'C',0);
	$this->SetXY(180,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostringv('cheval','id',trim($resultvac->jument),'N'),1,1,'C',0);
	$this->SetXY(205,$this->GetY()-10);$this->Cell(22,10,trim($resultvac->datemonte1),1,1,'C',0);
	$this->SetXY(227,$this->GetY()-10);$this->Cell(22,10,trim($resultvac->datemonte2),1,1,'C',0);
	$this->SetXY(249,$this->GetY()-10);$this->Cell(22,10,trim($resultvac->datemonte3),1,1,'C',0);
			if ($resultvac->Resultas==1) 
			{
			$this->SetFillColor(144, 238, 144);
			$this->SetXY(271,$this->GetY()-10);$this->Cell(15,10,'S',1,1,'C',1,0);
			$this->SetFillColor(255, 255, 255);
			} 
			else 
			{
			$this->SetFillColor(255, 99, 71);
			$this->SetXY(271,$this->GetY()-10);$this->Cell(15,10,'NF',1,1,'C',1,0);
			$this->SetFillColor(255, 255, 255);
			}
	}
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY());$this->Cell(276,10,'Nombre des saillies : '.$num_rows,1,1,1,'L');
	$this->SetFillColor(255, 255, 255);
	$this->SetXY(100,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
	//$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	$this->Output();
	}
	//**Bsm**//
	function jumsai($station,$datejour1,$datejour2,$datemonte)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM saillie WHERE  station=$station  and ( $datemonte BETWEEN '$datejour1' AND '$datejour2')";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function prodec($station,$datejour1,$datejour2,$datemonte)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM saillie WHERE  station=$station  and  poulin != '0'  and  ( $datemonte BETWEEN '$datejour1' AND '$datejour2')";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function jumsairace($station,$datejour1,$datejour2,$datemonte,$race)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM `saillie` INNER JOIN cheval WHERE saillie.station=$station  and ( saillie.$datemonte BETWEEN '$datejour1' AND '$datejour2')  and 	cheval.Race=$race  and  saillie.jument= cheval.id    ";  //
	////$query_liste = "SELECT * FROM saillie WHERE  station=$station  and ( $datemonte BETWEEN '$datejour1' AND '$datejour2')";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	
	function Bsm ($datejour1,$datejour2,$station)
	{
	$this->AddPage('L','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('dejavusans', '', 12);
	$this->entetel();
	$this->SetXY(10,80);$this->Cell(270,6,'Station : '.$this->nbrtostring('station','id',trim($station),'station'),1,1,'C');
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY()+5);$this->Cell(270,6,'Repartition Des Etalons',1,1,1,'L');
	$this->SetXY(10,$this->GetY());$this->Cell(10,6,'N°',1,1,1,'L');  
	$this->SetXY(20,$this->GetY()-6);$this->Cell(40,6,'N° Mle',1,1,1,'C');
	$this->SetXY(60,$this->GetY()-6);$this->Cell(40,6,'Nom',1,1,1,'C');
	$this->SetXY(100,$this->GetY()-6);$this->Cell(40,6,'Race',1,1,1,'C');
	$this->SetXY(140,$this->GetY()-6);$this->Cell(20,6,'Age',1,1,1,'C');
	$this->SetXY(160,$this->GetY()-6);$this->Cell(30,6,'Robe',1,1,1,'C');
	$this->SetXY(190,$this->GetY()-6);$this->Cell(30,6,'Pere',1,1,1,'C');
	$this->SetXY(220,$this->GetY()-6);$this->Cell(30,6,'Mere',1,1,1,'C');
	$this->SetXY(250,$this->GetY()-6);$this->Cell(30,6,'IMPL',1,1,1,'C');
	$this->SetFillColor(255, 255, 255);
	$this->mysqlconnect();	
	$queryvac = "select * from cheval  WHERE  station=$station  AND Sexe='M' and  aprouve = 1 and ( Datesigna BETWEEN '$datejour1' AND '$datejour2')  order by  Datesigna ";
	$resultat=mysql_query($queryvac);
	$totalmbr1=mysql_num_rows($resultat);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(10,6,trim($resultvac->id),1,1,'L');  
	$this->SetXY(20,$this->GetY()-6);$this->Cell(40,6,trim($resultvac->N),1,1,'L');
	$this->SetXY(60,$this->GetY()-6);$this->Cell(40,6,trim($resultvac->NomA) ,1,1,'L');
	$this->SetXY(100,$this->GetY()-6);$this->Cell(40,6,$this->nbrtostring('race','id',trim($resultvac->Race),'race'),1,1,'L');
	$this->SetXY(140,$this->GetY()-6);$this->Cell(20,6,trim(substr($resultvac->Dns,0,4)),1,1,'C');
	$this->SetXY(160,$this->GetY()-6);$this->Cell(30,6,$this->nbrtostring('robe','id',trim($resultvac->Nobo),'robe'),1,1,'C');
	$this->SetXY(190,$this->GetY()-6);$this->Cell(30,6,trim($resultvac->Pere),1,1,'C');
	$this->SetXY(220,$this->GetY()-6);$this->Cell(30,6,trim($resultvac->mere),1,1,'C');
	$this->SetXY(250,$this->GetY()-6);$this->Cell(30,6,$this->dateUS2FR(trim($resultvac->Datesigna)),1,1,'C');
	}
	$this->SetFillColor(240);$this->SetXY(10,$this->GetY());$this->Cell(270,6,'Total station : '.$totalmbr1.' étalons',1,1,1,'L');$this->SetFillColor(255, 255, 255);
	$this->AddPage('L','A4');
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('dejavusans', '', 12);
	$this->entetel();
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY()+40);$this->Cell(270,6,'Juments saillies du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,$this->GetY());$this->Cell(67,6,'Au 1èr saut',1,1,1,'L');  
	$this->SetXY(77,$this->GetY()-6);$this->Cell(67,6,'Au 2eme saut',1,1,1,'L');  
	$this->SetXY(144,$this->GetY()-6);$this->Cell(67,6,'Au 3eme saut',1,1,1,'L');  
	$this->SetXY(211,$this->GetY()-6);$this->Cell(69,6,'Total',1,1,1,'L');
	$this->SetFillColor(255, 255, 255); 
	$this->SetXY(10,$this->GetY());$this->Cell(67,6,$this->jumsai($station,$datejour1,$datejour2,'datemonte1'),1,1,'C');  
	$this->SetXY(77,$this->GetY()-6);$this->Cell(67,6,$this->jumsai($station,$datejour1,$datejour2,'datemonte2'),1,1,'C');  
	$this->SetXY(144,$this->GetY()-6);$this->Cell(67,6,$this->jumsai($station,$datejour1,$datejour2,'datemonte3'),1,1,'C');  
	$this->SetXY(211,$this->GetY()-6);$this->Cell(69,6,$this->jumsai($station,$datejour1,$datejour2,'datemonte1')+$this->jumsai($station,$datejour1,$datejour2,'datemonte2')+$this->jumsai($station,$datejour1,$datejour2,'datemonte3'),1,1,'C'); 

	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY()+5);$this->Cell(270,6,'Produits déclares du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,$this->GetY());$this->Cell(67,6,'OC',1,1,1,'L');  
	$this->SetXY(77,$this->GetY()-6);$this->Cell(67,6,'OI',1,1,1,'L');  
	$this->SetXY(144,$this->GetY()-6);$this->Cell(67,6,'Total',1,1,1,'L');  
	$this->SetXY(211,$this->GetY()-6);$this->Cell(69,6,'Obs',1,1,1,'L');
	$this->SetFillColor(255, 255, 255); 
	$this->SetXY(10,$this->GetY());$this->Cell(67,6,$this->prodec($station,$datejour1,$datejour2,'dateresultas'),1,1,'C');  
	$this->SetXY(77,$this->GetY()-6);$this->Cell(67,6,'0',1,1,'C');  
	$this->SetXY(144,$this->GetY()-6);$this->Cell(67,6,$this->prodec($station,$datejour1,$datejour2,'dateresultas'),1,1,'C');  
	$this->SetXY(211,$this->GetY()-6);$this->Cell(69,6,'***',1,1,'C'); 

	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY()+5);$this->Cell(270,6,'Recette  saillies du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,$this->GetY());$this->Cell(90,6,'Nombre de juments',1,1,1,'L');  
	$this->SetXY(100,$this->GetY()-6);$this->Cell(90,6,'P. U en (DA)',1,1,1,'L');  
	$this->SetXY(190,$this->GetY()-6);$this->Cell(90,6,'Montant total',1,1,1,'L');  
	$this->SetFillColor(255, 255, 255); 
	$this->SetXY(10,$this->GetY());$this->Cell(90,6,$this->jumsairace($station,$datejour1,$datejour2,'datemonte1',4),1,1,'C');  
	$this->SetXY(100,$this->GetY()-6);$this->Cell(90,6,'2 000.00',1,1,'C');  
	$this->SetXY(190,$this->GetY()-6);$this->Cell(90,6,$this->jumsai($station,$datejour1,$datejour2,'datemonte1')*2000,1,1,'C');  
	//prevoir le prix par race
	$this->SetXY(100,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
	//$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	$this->AddPage('L','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');
	$this->SetFont('dejavusans', '', 12);
	$this->entetel();
	$this->SetXY(10,80);$this->Cell(270,6,'Station : '.$this->nbrtostring('station','id',trim($station),'station'),1,1,'C');
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY()+5);$this->Cell(270,6,'Repartition Des produits declarés',1,1,1,'L');
	$this->SetXY(10,$this->GetY());$this->Cell(10,6,'N°',1,1,1,'L');  
	$this->SetXY(20,$this->GetY()-6);$this->Cell(40,6,'N° Mle',1,1,1,'C');
	$this->SetXY(60,$this->GetY()-6);$this->Cell(40,6,'Nom',1,1,1,'C');
	$this->SetXY(100,$this->GetY()-6);$this->Cell(40,6,'Race',1,1,1,'C');
	$this->SetXY(140,$this->GetY()-6);$this->Cell(20,6,'Age',1,1,1,'C');
	$this->SetXY(160,$this->GetY()-6);$this->Cell(30,6,'Robe',1,1,1,'C');
	$this->SetXY(190,$this->GetY()-6);$this->Cell(30,6,'Pere',1,1,1,'C');
	$this->SetXY(220,$this->GetY()-6);$this->Cell(30,6,'Mere',1,1,1,'C');
	$this->SetXY(250,$this->GetY()-6);$this->Cell(30,6,'IMPL',1,1,1,'C');
	$this->SetFillColor(255, 255, 255);
	
	$this->mysqlconnect();
	mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
	$queryvac= "SELECT * FROM saillie WHERE  station=$station  and  poulin != '0'  and  ( datemonte BETWEEN '$datejour1' AND '$datejour2')"; 
	$resultat=mysql_query($queryvac);
	$totalmbr1=mysql_num_rows($resultat);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(10,6,trim($resultvac->poulin),1,1,'L');  
	$this->SetXY(20,$this->GetY()-6);$this->Cell(40,6,$this->nbrtostring('cheval','id',trim($resultvac->poulin),'N'),1,1,'C');
	$this->SetXY(60,$this->GetY()-6);$this->Cell(40,6,$this->nbrtostring('cheval','id',trim($resultvac->poulin),'NomA'),1,1,'L');
	$this->SetXY(100,$this->GetY()-6);$this->Cell(40,6,$this->nbrtostring('race','id',$this->nbrtostring('cheval','id',trim($resultvac->poulin),'Race'),'race'),1,1,'L');
	$this->SetXY(140,$this->GetY()-6);$this->Cell(20,6,trim(substr($this->nbrtostring('cheval','id',trim($resultvac->poulin),'Dns'),0,4)),1,1,'C');
	$this->SetXY(160,$this->GetY()-6);$this->Cell(30,6,$this->nbrtostring('robe','id',$this->nbrtostring('cheval','id',trim($resultvac->poulin),'Nobo'),'robe'),1,1,'L');
	$this->SetXY(190,$this->GetY()-6);$this->Cell(30,6,$this->nbrtostring('cheval','id',trim($resultvac->poulin),'Pere'),1,1,'L');
	$this->SetXY(220,$this->GetY()-6);$this->Cell(30,6,$this->nbrtostring('cheval','id',trim($resultvac->poulin),'mere'),1,1,'L');
	$this->SetXY(250,$this->GetY()-6);$this->Cell(30,6,$this->dateUS2FR(trim($this->nbrtostring('cheval','id',trim($resultvac->poulin),'Datesigna'))),1,1,'C');
	}
	$this->SetFillColor(240);$this->SetXY(10,$this->GetY());$this->Cell(270,6,'Total station : '.$totalmbr1.' Produits',1,1,1,'L');$this->SetFillColor(255, 255, 255);
	$this->Output();
	}
	
	/**/
	function valeurmultigraphe($TBL,$COLONE1,$DATEJOUR1,$DATEJOUR2) 
	{
	$this->mysqlconnect();
	$sql = " select * from $TBL where $COLONE1 BETWEEN '$DATEJOUR1' AND '$DATEJOUR2' ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function catrace($datejour1,$datejour2,$Race,$Sexe,$cat)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval WHERE  Datesigna BETWEEN '$datejour1' AND '$datejour2'  and   Race='$Race' and Sexe='$Sexe'       ";//and secteur='$cat'
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function regracet($datejour1,$datejour2,$Race,$Sexe)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval WHERE  Datesigna BETWEEN '$datejour1' AND '$datejour2'  and  Race='$Race' and Sexe='$Sexe'  ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function etalonsep($datejour1,$datejour2) 
	{ 
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,100);$this->Cell(190,6,'A / Repartition des effectifs étalons par race et par categorie :',1,1,'L',1,0,'');
	$this->SetXY(10,106);$this->Cell(20,12,'Categorie',1,1,'L',1,0,'');  $this->SetXY(30,106);$this->Cell(170,6,'Race',1,1,'C',1,0,'');
	$this->SetXY(30,112);$this->Cell(20,6,'AR',1,1,'C',1,0,'');$this->SetXY(50,112);$this->Cell(20,6,'PS',1,1,'C',1,0,'');$this->SetXY(70,112);$this->Cell(20,6,'BE',1,1,'C',1,0,'');$this->SetXY(90,112);$this->Cell(20,6,'AR-BE',1,1,'C',1,0,'');$this->SetXY(110,112);$this->Cell(20,6,'TI',1,1,'C',1,0,'');$this->SetXY(130,112);$this->Cell(20,6,'TROTT',1,1,'C',1,0,'');$this->SetXY(150,112);$this->Cell(20,6,'ASINS',1,1,'C',1,0,'');$this->SetXY(170,112);$this->Cell(30,6,'Total',1,1,'C',1,0,'');
	$this->SetXY(10,118);$this->Cell(20,6,'Nationaux',1,1,'L',1,0,''); 
	$n1=$this->catrace($datejour1,$datejour2,2,'M',1);$n2=$this->catrace($datejour1,$datejour2,3,'M',1);$n3=$this->catrace($datejour1,$datejour2,6,'M',1);$n4=$this->catrace($datejour1,$datejour2,4,'M',1);$n5=0;$n6=0; $n7=0;$nt=$n1+$n2+$n3+$n4+$n5+$n6+$n7;
	$this->SetXY(30,118);$this->Cell(20,6,$n1,1,1,'C');$this->SetXY(50,118);$this->Cell(20,6,$n2,1,1,'C');$this->SetXY(70,118);$this->Cell(20,6,$n3,1,1,'C');$this->SetXY(90,118);$this->Cell(20,6,$n4,1,1,'C');$this->SetXY(110,118);$this->Cell(20,6,$n5,1,1,'C');$this->SetXY(130,118);$this->Cell(20,6,$n6,1,1,'C');$this->SetXY(150,118);$this->Cell(20,6,$n7,1,1,'C');$this->SetXY(170,118);$this->Cell(30,6,$nt,1,1,'C',1,0,'');
	$this->SetXY(10,124);$this->Cell(20,6,'Privés',1,1,'L',1,0,''); 
	$p1=$this->catrace($datejour1,$datejour2,2,'M',0);$p2=$this->catrace($datejour1,$datejour2,3,'M',0);$p3=$this->catrace($datejour1,$datejour2,6,'M',0);$p4=$this->catrace($datejour1,$datejour2,4,'M',0);$p5=0;$p6=0;$p7=0;$pt=$p1+$p2+$p3+$p4+$p5+$p6+$p7;
	$this->SetXY(30,124);$this->Cell(20,6,$p1,1,1,'C');$this->SetXY(50,124);$this->Cell(20,6,$p2,1,1,'C');$this->SetXY(70,124);$this->Cell(20,6,$p3,1,1,'C');$this->SetXY(90,124);$this->Cell(20,6,$p4,1,1,'C');$this->SetXY(110,124);$this->Cell(20,6,$p5,1,1,'C');$this->SetXY(130,124);$this->Cell(20,6,$p6,1,1,'C');$this->SetXY(150,124);$this->Cell(20,6,$p7,1,1,'C');$this->SetXY(170,124);$this->Cell(30,6,$pt,1,1,'C',1,0,'');
	$this->SetXY(10,130);$this->Cell(20,6,'Total',1,1,'L',1,0,'');  
	$this->SetXY(30,130);$this->Cell(20,6,$n1+$p1,1,1,'C',1,0,'');$this->SetXY(50,130);$this->Cell(20,6,$n2+$p2,1,1,'C',1,0,'');$this->SetXY(70,130);$this->Cell(20,6,$n3+$p3,1,1,'C',1,0,'');$this->SetXY(90,130);$this->Cell(20,6,$n4+$p4,1,1,'C',1,0,'');$this->SetXY(110,130);$this->Cell(20,6,$n5+$p5,1,1,'C',1,0,'');$this->SetXY(130,130);$this->Cell(20,6,$n6+$p6,1,1,'C',1,0,'');$this->SetXY(150,130);$this->Cell(20,6,$n7+$p7,1,1,'C',1,0,'');$this->SetXY(170,130);$this->Cell(30,6,$nt+$pt,1,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0); 
	}
	function regrace($datejour1,$datejour2,$Race,$Sexe,$reg)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval WHERE  Datesigna BETWEEN '$datejour1' AND '$datejour2'  and  Race='$Race' and Sexe='$Sexe' and region='$reg' ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function etalonsrr($datejour1,$datejour2) 
	{ 
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,160);$this->Cell(190,6,'B / Repartition des effectifs étalons par race et par région :',1,1,'L',1,0,'');
	$this->SetXY(10,166);$this->Cell(20,12,'Région',1,1,'L',1,0,'');  $this->SetXY(30,166);$this->Cell(170,6,'Race',1,1,'C',1,0,''); 
	$this->SetXY(30,172);$this->Cell(20,6,'AR',1,1,'C',1,0,'');$this->SetXY(50,172);$this->Cell(20,6,'PS',1,1,'C',1,0,'');$this->SetXY(70,172);$this->Cell(20,6,'BE',1,1,'C',1,0,'');$this->SetXY(90,172);$this->Cell(20,6,'AR-BE',1,1,'C',1,0,'');$this->SetXY(110,172);$this->Cell(20,6,'TI',1,1,'C',1,0,'');$this->SetXY(130,172);$this->Cell(20,6,'TROTT',1,1,'C',1,0,'');$this->SetXY(150,172);$this->Cell(20,6,'ASINS',1,1,'C',1,0,'');$this->SetXY(170,172);$this->Cell(30,6,'Total',1,1,'C',1,0,'');
	$this->mysqlconnect();
	$queryvac = "select * from region where id!=1 ORDER BY id ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(20,6,$resultvac->region,1,1,'L',1,0,''); 
	$t1=$this->regrace($datejour1,$datejour2,2,'M',$resultvac->id);
	$t2=$this->regrace($datejour1,$datejour2,3,'M',$resultvac->id);
	$t3=$this->regrace($datejour1,$datejour2,6,'M',$resultvac->id);
	$t4=$this->regrace($datejour1,$datejour2,4,'M',$resultvac->id);
	$t5=0;
	$t6=0;
	$t7=0;
	$tt=$t1+$t2+$t3+$t4+$t5+$t6+$t7;
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$t1,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$t2,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$t3,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$t4,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$t5,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$t6,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$t7,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$tt,1,1,'C',1,0,'');
	}
	$rt1=$this->regracet($datejour1,$datejour2,2,'M');
	$rt2=$this->regracet($datejour1,$datejour2,3,'M');
	$rt3=$this->regracet($datejour1,$datejour2,6,'M');
	$rt4=$this->regracet($datejour1,$datejour2,4,'M');
	$rt5=0;
	$rt6=0;
	$rt7=0;
	$rtt=$rt1+$rt2+$rt3+$rt4+$rt5+$rt6+$rt7;
	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Total',1,1,'L',1,0,'');  
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$rt1,1,1,'C',1,0,'');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$rt2,1,1,'C',1,0,'');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$rt3,1,1,'C',1,0,'');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$rt4,1,1,'C',1,0,'');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$rt5,1,1,'C',1,0,'');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$rt6,1,1,'C',1,0,'');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$rt7,1,1,'C',1,0,'');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$rtt,1,1,'C',1,0,'');
    $this->SetFillColor(0, 0, 0); 
	}
	function equinr($region,$sexe) 
	{
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,70);$this->Cell(190,6,'Region : '.$this->nbrtostring('region','id',$region,'region'),1,1,'L',1,0,'');
	$this->SetXY(10,106-30);$this->Cell(40,6,'Station',1,1,'L',1,0,'');  
	if ($sexe=='M') {$this->SetXY(50,106-30);$this->Cell(40,6,'Nom Etalon',1,1,'C',1,0,'');} else {$this->SetXY(50,106-30);$this->Cell(40,6,'Nom Jument',1,1,'C',1,0,'');}
	$this->SetXY(90,106-30);$this->Cell(40,6,'Race',1,1,'C',1,0,'');
	$this->SetXY(130,106-30);$this->Cell(20,6,'Age',1,1,'C',1,0,'');
	$this->SetXY(150,106-30);$this->Cell(25,6,'Affectation',1,1,'C',1,0,'');
	$this->SetXY(175,106-30);$this->Cell(25,6,'Secteur',1,1,'C',1,0,'');
	$this->mysqlconnect();
	$queryvac = "select * from cheval where region='$region'  and Sexe='$sexe'   ORDER BY station,secteur ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	
	if ($num_rows > 0) {
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(40,6,$this->nbrtostring('station','id',trim($resultvac->station),'station'),1,1,'L');  
	$this->SetXY(50,$this->GetY()-6);$this->Cell(40,6,trim($resultvac->NomA),1,1,'L');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(40,6,$this->nbrtostring('race','id',trim($resultvac->Race),'race') ,1,1,'L');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,trim(substr($resultvac->Dns,0,4)),1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(25,6,$this->dateUS2FR($resultvac->Datesigna),1,1,'C');
	if ($resultvac->secteur==1) {$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,'public',1,1,'C');} else {$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,'privé',1,1,'C');}
	}
	} else {
	$this->SetXY(10,$this->GetY());$this->Cell(40,6,'***',1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(40,6,'***',1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(40,6,'***',1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,'***',1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(25,6,'***',1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,'***',1,1,'C');
	}
	$this->SetXY(10,$this->GetY());$this->Cell(190,6,'Total Region '.$this->nbrtostring('region','id',$region,'region').' : '.$num_rows,1,1,'L',1,0,'');
    $this->SetFillColor(0, 0, 0); 
	}
	
	function sm ($datejour1,$datejour2,$station)
	{
	$this->AddPage('P','A4');
	$this->entetex('CONCLUSION',$datejour1,$datejour2,$station);
	//************************//
	$DATE=date("Y");
	$va=$this->valeurmultigraphe('saillie','datemonte1',($DATE-9).'-01-01',($DATE-9).'-12-31') ;
	$vb=$this->valeurmultigraphe('saillie','datemonte1',($DATE-8).'-01-01',($DATE-8).'-12-31') ;
	$vc=$this->valeurmultigraphe('saillie','datemonte1',($DATE-7).'-01-01',($DATE-7).'-12-31') ;
	$vd=$this->valeurmultigraphe('saillie','datemonte1',($DATE-6).'-01-01',($DATE-6).'-12-31') ;
	$ve=$this->valeurmultigraphe('saillie','datemonte1',($DATE-5).'-01-01',($DATE-5).'-12-31') ;
	$vf=$this->valeurmultigraphe('saillie','datemonte1',($DATE-4).'-01-01',($DATE-4).'-12-31') ;
	$vg=$this->valeurmultigraphe('saillie','datemonte1',($DATE-3).'-01-01',($DATE-3).'-12-31') ;
	$vh=$this->valeurmultigraphe('saillie','datemonte1',($DATE-2).'-01-01',($DATE-2).'-12-31') ;
	$vi=$this->valeurmultigraphe('saillie','datemonte1',($DATE-1).'-01-01',($DATE-1).'-12-31') ;
	$vj=$this->valeurmultigraphe('saillie','datemonte1',($DATE-0).'-01-01',($DATE-0).'-12-31') ;
	
	$total1=$va+$vb+$vc+$vd+$ve+$vf+$vg+$vh+$vi+$vj;
	if ($total1==0)  {$total=1;} else {$total=$total1;} 
	$h=round($va*100/$total,2);
	$h1=round($vb*100/$total,2);
	$h2=round($vc*100/$total,2);
	$h3=round($vd*100/$total,2);
	$h4=round($ve*100/$total,2);
	$h5=round($vf*100/$total,2);
	$h6=round($vg*100/$total,2);
	$h7=round($vh*100/$total,2);
	$h8=round($vi*100/$total,2);
	$h9=round($vj*100/$total,2);

	$x=50;
	$y=200-30;
	$w=110;
	$this->RoundedRect($x-5, $y-$w, 110, $w, 2.50, '1111');

	$this->SetFillColor(154 ,205 ,50);
	$this->SetXY($x-5,$y-$w);$this->Cell($w,6,'Répartition Des Juments Saillies',1,1,'C',1);
	$this->RoundedRect($x-5+8, $y-$h-5, 5, $h, 0.5, '1111','df');
	$this->RoundedRect($x+5+8, $y-$h1-5, 5, $h1, 0.5, '1111','df');
	$this->RoundedRect($x+15+8, $y-$h2-5, 5, $h2, 0.5, '1111','df');
	$this->RoundedRect($x+25+8, $y-$h3-5, 5, $h3, 0.5, '1111','df');
	$this->RoundedRect($x+35+8, $y-$h4-5, 5, $h4, 0.5, '1111','df');
	$this->RoundedRect($x+45+8, $y-$h5-5, 5, $h5, 0.5, '1111','df');
	$this->RoundedRect($x+55+8, $y-$h6-5, 5, $h6, 0.5, '1111','df');
	$this->RoundedRect($x+65+8, $y-$h7-5, 5, $h7, 0.5, '1111','df');
	$this->RoundedRect($x+75+8, $y-$h8-5, 5, $h8, 0.5, '1111','df');
	$this->RoundedRect($x+85+8, $y-$h9-5, 5, $h9, 0.5, '1111','df');
	$this->SetFillColor(0, 0, 0);

	$this->SetXY($x-5+8,$y-5);  $this->Cell(5,4,$h,0,1,'C');
	$this->SetXY($x+5+8,$y-5);  $this->Cell(5,4,$h1,0,1,'C');
	$this->SetXY($x+15+8,$y-5);  $this->Cell(5,4,$h2,0,1,'C');
	$this->SetXY($x+25+8,$y-5);  $this->Cell(5,4,$h3,0,1,'C');
	$this->SetXY($x+35+8,$y-5);  $this->Cell(5,4,$h4,0,1,'C');
	$this->SetXY($x+45+8,$y-5);  $this->Cell(5,4,$h5,0,1,'C');
	$this->SetXY($x+55+8,$y-5);  $this->Cell(5,4,$h6,0,1,'C');
	$this->SetXY($x+65+8,$y-5);  $this->Cell(5,4,$h7,0,1,'C');
	$this->SetXY($x+75+8,$y-5);  $this->Cell(5,4,$h8,0,1,'C');
	$this->SetXY($x+85+8,$y-5);  $this->Cell(5,4,$h9,0,1,'C');

	$xc = 100;
	$yc = 230;
	$r = 40;


	$this->RoundedRect($xc-55,$yc -55, 110, $w, 2.50, '1111');
	$this->SetFillColor(154 ,205 ,50);
	$this->SetXY($xc-55,$yc -55);$this->Cell($w,6,'Répartition Des Produits Par Race',1,1,'C',1);
	$this->SetFillColor(0, 0, 0);
	$va=10;
	$vb=10;
	$vc=10;
	$vd=10;
	$tot1=$va+$vb+$vc+$vd;
	if ($tot1==0)  {$tot=1;} else {$tot=$tot1;} 
	$p1=round($va*100/$tot,2);
	$p2=round($vb*100/$tot,2);
	$p3=round($vc*100/$tot,2);
	$p4=round($vd*100/$tot,2);
	$a1=$p1*3.6;
	$a2=$a1+($p2*3.6);
	$a3=$a2+($p3*3.6);
	$a4=$a3+($p4*3.6);
	$this->SetFillColor(0, 0, 255);$this->PieSector($xc, $yc, $r, $a4, $a1, 'FD', false, 0, 2);
	$this->SetFillColor(0, 0, 100);$this->PieSector($xc, $yc, $r, $a1, $a2, 'FD', false, 0, 2);
	$this->SetFillColor(0, 255, 0);$this->PieSector($xc, $yc, $r, $a2, $a3, 'FD', false, 0, 2);
	$this->SetFillColor(255, 0, 0);$this->PieSector($xc, $yc, $r, $a3, $a4, 'FD', false, 0, 2);

	$this->AddPage('P','A4');
	$this->entetebsm('',$datejour1,$datejour2,$station);//.$station
	
	//**************************************1ere partie etalon ************************************************************//
	$this->AddPage('P','A4');
	$this->entetex('Les étalons en activites étatiques et prives',$datejour1,$datejour2,$station);
	//a Repartition des effectifs étalons par race et par categorie
		$this->etalonsep($this->dateFR2US($datejour1),$this->dateFR2US($datejour2)); 
	//b Repartition des effectifs étalons par race et par région
		$this->etalonsrr($this->dateFR2US($datejour1),$this->dateFR2US($datejour2));
	///c Répartition des étalons par région et station
		$this->mysqlconnect();
		$queryvac = "select * from region where id!=1 ORDER BY id ";
		$resultat=mysql_query($queryvac);
		$num_rows = mysql_num_rows($resultat);
		while($resultvac=mysql_fetch_object($resultat))
		{
		$this->AddPage('P','A4');
		$this->entetex('Répartition des étalons par région et station ( public et privé )',$datejour1,$datejour2,$station);
		//$this->equinr($resultvac->id,'M');
		}
	
//**************************************2eme partie juments ************************************************************//
$this->AddPage('P','A4');
$this->entetex("Effectif des juments saillies par race d'etalon",$datejour1,$datejour2,$station);
//a Repartition du nombre de juments saillies par race d'etalon et par categorie  
     //$this->jse($datejour1,$datejour2);
//b Repartition du nombre de juments saillies par race d'etalon et par et par région 
     //$this->jsey($datejour1,$datejour2); 
//c Répartition des juments par région et station ( public et privé )
    $this->mysqlconnect();
	$queryvac = "select * from region where id!=1 ORDER BY id ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->AddPage('P','A4');
	$this->entetex('Répartition des juments par région et station ( public et privé )',$datejour1,$datejour2,$station);
	//$this->equinr($resultvac->id,'F');
	}	
	
//**************************************3eme partie produits ************************************************************//
$this->AddPage('P','A4');
$this->entetex('Effectif produits déclarés',$datejour1,$datejour2,$station);
//a Repartition du nombre de produits déclarés par race et par categorie 
    //$this->produit($this->dateFR2US($_POST["Datedebut"]),$this->dateFR2US($_POST["Datefin"])); 
//b Repartition du nombre de produits déclarés par race et par région 
    //$this->produitreg($this->dateFR2US($_POST["Datedebut"]),$this->dateFR2US($_POST["Datefin"])); 
//c Répartition des equides par age
    $this->mysqlconnect();
	$queryvac = "select * from region where id!=1 ORDER BY id ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->AddPage('P','A4');
	$this->entetex('Répartition des produits declarés par région et station ( public et privé )',$datejour1,$datejour2,$station);
	//$this->equinpr($resultvac->id,$this->dateFR2US($_POST["Datedebut"]),$this->dateFR2US($_POST["Datefin"]));
	}
	
//**************************************4eme partie JUMENT - PRODUIT -RACE -REGION-STATION  ************************************************************//
$this->AddPage('P','A4');
$this->entetex('Répartition Des Juments Saillies Et Des Produits Declarés Par Race (Région et Station) ',$datejour1,$datejour2,$station);
//a Repartition du nombre de juments saillies par race  produit region station   

//**************************************5eme partie ETAT COMPARATIF SAISON DE MONTE   ************************************************************//
$this->AddPage('P','A4');
$this->entetex('ETAT COMPARATIF SAISONS DE MONTE',$datejour1,$datejour2,$station);

//**************************************6eme CONCLUSION   ************************************************************//
$this->AddPage('P','A4');
$this->entetex('CONCLUSION',$datejour1,$datejour2,$station);

//************************//
$this->SetFillColor(248, 248, 255);;
$this->SetXY(10,120);$this->Cell(10,36,'',1,1,'L'); 
$this->SetFillColor(0, 0, 0);	
	
	
	
	
	
	
	
	
	}
	
	function racestudbook($raceequin) 
	{
	if ($raceequin=='=2')
	{
	$this->SetFillColor(255, 228, 225);
	$this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	$this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}

	if ($raceequin=='=3')
	{
	$this->SetFillColor(255, 255, 255);
	$this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	$this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}
	if ($raceequin=='=4')
	{
	$this->SetFillColor(152 ,251 ,152);
	$this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	$this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}
	if ($raceequin=='=6')
	{
	$this->SetFillColor(135 ,206 ,235);
	$this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	$this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}
	}
	function entetebsm($titre,$datejour1,$datejour2,$station) 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->SetXY(10,10);
	$this->Cell(190,6,$this->repar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->repfr,0,1,'C');
	$this->Cell(190,6,$this->minar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->minfr,0,1,'C');
	$this->Cell(190,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->ondeecfr,0,1,'C');
	$this->Image('logoof.png', $x=80, $y=48, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$this->SetFillColor(248, 248, 255);$this->SetFont('dejavusans', '', 16);
	$this->SetXY(10,80);$this->Cell(190,12,'BILAN SAISON DE MONTE',0,1,'C',1,0,'');
	$this->SetXY(10,90);$this->Cell(190,12,$titre,0,1,'C',1,0,'');
	$this->SetXY(10,100);$this->Cell(190,12,$this->nbrtostring('station','id',trim($station),'station'),0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);$this->SetFont('dejavusans', '', 12);
	$this->SetFillColor(248, 248, 255);$this->SetFont('dejavusans', '', 14);
	$this->SetXY(10,250);$this->Cell(190,12,'DPT ELEVAGE ET COMMUNICATION',0,1,'C',1,0,'');
	$this->dateUS2FR(trim($datejour1));
	$this->SetXY(10,260);$this->Cell(190,12,' Du '.$this->dateUS2FR(trim($datejour1)).' Au '.$this->dateUS2FR(trim($datejour2)),0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);$this->SetFont('dejavusans', '', 12);
	}
	function entetep($titre,$datejour1,$datejour2,$station) 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->SetXY(10,10);
	$this->Cell(190,6,$this->repar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->repfr,0,1,'C');
	$this->Cell(190,6,$this->minar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->minfr,0,1,'C');
	$this->Cell(190,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->ondeecfr,0,1,'C');
	$this->Image('logoof.png', $x=80, $y=48, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$this->SetFillColor(248, 248, 255);$this->SetFont('dejavusans', '', 16);
	$this->SetXY(10,80);$this->Cell(190,12,'STUD BOOK ALGERIEN',0,1,'C',1,0,'');
	$this->SetXY(10,90);$this->Cell(190,12,$titre,0,1,'C',1,0,'');
	$this->SetXY(10,100);$this->Cell(190,12,$this->nbrtostring('station','id',trim($station),'station'),0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);$this->SetFont('dejavusans', '', 12);
	$this->SetFillColor(248, 248, 255);$this->SetFont('dejavusans', '', 14);
	$this->SetXY(10,250);$this->Cell(190,12,'VOLUME I',0,1,'C',1,0,'');
	$this->dateUS2FR(trim($datejour1));
	$this->SetXY(10,260);$this->Cell(190,12,' Du '.$this->dateUS2FR(trim($datejour1)).' Au '.$this->dateUS2FR(trim($datejour2)),0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);$this->SetFont('dejavusans', '', 12);
	}
	function entetel() 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetXY(10,5);
	$this->Cell(275,6,$this->repar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,$this->repfr,0,1,'C');
	$this->Cell(275,6,$this->minar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,$this->minfr,0,1,'C');
	$this->Cell(275,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,$this->ondeecfr,0,1,'C');//
	$this->Image('logoof.png', $x=120, $y=45, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
	function entetep1($titre) 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->SetXY(10,10);
	$this->Cell(190,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->ondeecfr,0,1,'C');
	$this->Image('logoof.png', $x=80, $y=28, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$this->SetFillColor(248, 248, 255);$this->SetFont('dejavusans', '', 16);
	$this->SetXY(10,60);$this->Cell(190,12,'STUD BOOK ALGERIEN',0,1,'C',1,0,'');
	$this->SetXY(10,70);$this->Cell(190,12,$titre,0,1,'C',1,0,'');
	$this->SetFillColor(248, 248, 255);$this->SetFont('dejavusans', '', 10);
	$this->SetXY(10,230);
	$this->Cell(190,6,'Adresse : ',0,1,'C',1,0,'');
	$this->Cell(190,6,'Cité Volani BP : 438 ',0,1,'C',1,0,'');
	$this->Cell(190,6,'TIARET - 14000',0,1,'C',1,0,'');
	$this->Cell(190,6,'ALGERIE',0,1,'C',1,0,'');
	$this->Cell(190,6,'Contact : Mr Ahmed BOUAKKAZ, chef du département stud-book,ONDEEC. ',0,1,'C',1,0,'');
	$this->Cell(190,6,'Téléphone et Fax : 00-213-(0)46-42-27-84 ',0,1,'C',1,0,'');
	$this->Cell(190,6,'e.mail : - ondeec_dz@yahoo.fr - ahmedstudbook@yahoo.fr ',0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);$this->SetFont('dejavusans', '', 12);
	}
	function entetex($titre) 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->SetXY(10,10);
	$this->Cell(190,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,$this->ondeecfr,0,1,'C');
	$this->Image('logoof.png', $x=10, $y=10, $w=41-15, $h=25-15, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,40);$this->Cell(190,12,$titre,0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);
	}
	function studbookdz($race,$race1,$station,$datejour1,$datejour2) 
	{
	$this->setTitle($race1);
	$this->SetHeaderMargin(2);
	$this->SetFooterMargin(6);
	$this->AddPage('p','A4');$this->SetDisplayMode('fullpage','single');
	$this->racestudbook($race);
	$this->entetep($race1,$datejour1,$datejour2,$station);//.$station
	$this->AddPage('p','A4');$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->entetep1($race1);
	require('decret.php');
	$this->AddPage('p','A4');$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->racestudbook($race);
	$this->entetep("Inscription au titre de l'ascendance",$datejour1,$datejour2,$station); 
	$this->AddPage('p','A4');$this->SetDisplayMode('fullpage','single');
	$this->racestudbook($race);$this->SetFont('dejavusans', '', 12);
	$this->entetep('I-MALES',$datejour1,$datejour2,$station); 
	$this->studbook($race,'M',$station);//manque prise en charge station et date a complete ulterieurement
	$this->AddPage('p','A4');$this->SetDisplayMode('fullpage','single'); 
	$this->racestudbook($race);
    $this->SetFont('dejavusans', '', 12);
	$this->entetep('II-FEMELLES',$datejour1,$datejour2,$station); 
	$this->studbook($race,'F',$station);//manque prise en charge station et date a  complete ulterieurement
	$this->Output();
	}
	function studbook($Race,$Sexe,$station)
	{
	$this->mysqlconnect();
	$queryvac = "select * from cheval where  Sexe='$Sexe' AND Race $Race order by NomA  ";//
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,'Total inscrit : '.$num_rows,0,1,'L',0);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
		if ($resultvac->Pere=='') 
		{
		$this->SetFont('aefurat', 'B', 12);
		$this->SetFillColor(248, 248, 255);
		$this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,trim($resultvac->NomA).'*',0,1,'L',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 10);
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,'Propriétaire : '.$this->nbrtostringv('eleveur','id',$resultvac->ideleveur,'NomP').' - '.$this->nbrtostring('wil','IDWIL',trim($this->nbrtostringv('eleveur','id',$resultvac->ideleveur,'wil')),'WILAYAS'),0,1,'L',0);
		
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,$this->nbrtostring('robe','id',trim($resultvac->Nobo),'robe').','."né le : ".substr($this->dateUS2FR(trim($resultvac->Dns)),0,10).', Insccrit à titre initial sous le numéro : '.trim($resultvac->N),0,1,'L',0);
		} 
		else 
		{
		$this->SetFont('aefurat', 'B', 12);$this->SetFillColor(248, 248, 255);
		$this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,trim($resultvac->NomA),0,1,'L',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 10);
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,'Propriétaire : '.$this->nbrtostringv('eleveur','id',$resultvac->ideleveur,'NomP').' - '.$this->nbrtostring('wil','IDWIL',trim($this->nbrtostringv('eleveur','id',$resultvac->ideleveur,'wil')),'WILAYAS'),0,1,'L',0);
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,$this->nbrtostring('robe','id',trim($resultvac->Nobo),'robe').','."né le : ".substr($this->dateUS2FR(trim($resultvac->Dns)),0,10),0,1,'L',0);
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,'Par : '.trim($resultvac->Pere).' et '.trim($resultvac->mere),0,1,'L',0);
		}
		// $this->SetXY(10,$this->GetY());$this->Cell(190,5,'______',1,1,'L',0);	
		if ($Sexe=='M') 
		{
			$queryvac1 = "select * from saillie where idcheval=$resultvac->id  and  Resultas=1 order by dateresultas ";
			$resultat1=mysql_query($queryvac1);
			$num_rows1 = mysql_num_rows($resultat1);
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,$num_rows1.' Produits immatriculés',0,1,'L',0);
			while($resultvac1=mysql_fetch_object($resultat1))
			{
			$this->SetXY(15,$this->GetY());$this->Cell(10,5,substr($this->dateUS2FR(trim($resultvac1->dateresultas)),6,4),0,1,'L',0);
			$this->SetXY(25,$this->GetY()-5);$this->Cell(25,5,'- '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'Sexe').'.'.$this->nbrtostringv('robe','id',$this->nbrtostringv('cheval','id',$resultvac1->poulin,'Nobo'),'robe'),0,1,'L',0);
			$this->SetXY(50,$this->GetY()-5);$this->Cell(35,5,'- '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'NomA'),0,1,'L',0);
			$this->SetXY(85,$this->GetY()-5);$this->Cell(35,5,'  Par  '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'mere'),0,1,'L',0);
			$this->SetXY(125,$this->GetY()-5);$this->Cell(35,5,' MLE : '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'N'),0,1,'L',0);
			$this->SetFillColor(248, 248, 255);$this->SetXY(165,$this->GetY()-4);$this->Cell(35,3,'***',0,1,'C',1,0,'');$this->SetFillColor(0, 0, 0);
			}
		} 
		else 
		{
			$queryvac1 = "select * from saillie where jument=$resultvac->id  and  Resultas=1 order by dateresultas ";
			$resultat1=mysql_query($queryvac1);
			$num_rows1 = mysql_num_rows($resultat1);
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,$num_rows1.' Produits  immatriculés',0,1,'L',0);
			while($resultvac1=mysql_fetch_object($resultat1))
			{
			$this->SetXY(15,$this->GetY());$this->Cell(10,5,substr($this->dateUS2FR(trim($resultvac1->dateresultas)),6,4),0,1,'L',0);
			$this->SetXY(25,$this->GetY()-5);$this->Cell(180,5,'- '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'Sexe').'.'.$this->nbrtostringv('robe','id',$this->nbrtostringv('cheval','id',$resultvac1->poulin,'Nobo'),'robe'),0,1,'L',0);
			$this->SetXY(50,$this->GetY()-5);$this->Cell(35,5,'- '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'NomA'),0,1,'L',0);
			$this->SetXY(85,$this->GetY()-5);$this->Cell(35,5,'  Par  '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'Pere'),0,1,'L',0);
			$this->SetXY(125,$this->GetY()-5);$this->Cell(50,5,' MLE : '.$this->nbrtostringv('cheval','id',$resultvac1->poulin,'N'),0,1,'L',0);
			$this->SetFillColor(248, 248, 255);$this->SetXY(165,$this->GetY()-4);$this->Cell(35,3,'***',0,1,'C',1,0,'');$this->SetFillColor(0, 0, 0);
			}
		}
		
	}
	}
	function nbrequide ($ideleveur)
	{
	$this->mysqlconnect();
	$queryvac1 = "select  * from cheval where ideleveur=$ideleveur  GROUP BY  id ";
	$resultat1 = mysql_query($queryvac1);
	$num_rows1 = mysql_num_rows($resultat1);
	return $num_rows1;
	}
	function Annuaire ($datejour1,$datejour2,$station)
	{
	$this->AddPage('P','A4');
    $this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entetex('Annuaire des éleveurs');
	$this->mysqlconnect();
	
	$queryvac = "select * from wil  where  IDWIL !=99000 order by IDWIL ";// Sexe='$Sexe' AND Race $Race  NomA 
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,'Total Wilayas : '.$num_rows,0,1,'L',0);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
		    $this->SetFont('aefurat', 'B', 12);
		    $this->SetFillColor(248, 248, 255);
		    $this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,trim($resultvac->WILAYAS).' ('.$resultvac->IDWIL.')',0,1,'L',1,0,'');$this->SetFillColor(0, 0, 0);
		    $this->SetFont('aefurat', '', 10);
		    $this->SetXY(10,$this->GetY());$this->Cell(190,5,'Annuaire des éleveurs',0,1,'L',0);
			$queryvac1 = "select  id,wil,com,adresse from eleveur where wil=$resultvac->IDWIL  GROUP BY  id ";
			$resultat1 = mysql_query($queryvac1);
			$num_rows1 = mysql_num_rows($resultat1);
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,$num_rows1.' éleveurs ',0,1,'L',0);
			while($resultvac1=mysql_fetch_object($resultat1))
			{
			$this->SetXY(15,$this->GetY());$this->Cell(55,5,$this->nbrtostringv('eleveur','id',$resultvac1->id,'NomP'),0,1,'L',0);
			$this->SetXY(70,$this->GetY()-5);$this->Cell(50,5,'Commune : '.$this->nbrtostringv('com','IDCOM',$resultvac1->com,'COMMUNE'),0,1,'L',0);
			$this->SetXY(125,$this->GetY()-5);$this->Cell(50,5,'Adresse : '.$resultvac1->adresse,0,1,'L',0);
			$this->SetXY(172,$this->GetY()-5);$this->Cell(10,5,'Equidées  : ',0,1,'L',0);
			$this->SetFillColor(248, 248, 255);
			$this->SetXY(190,$this->GetY()-4);$this->Cell(10,3,$this->nbrequide ($resultvac1->id),0,1,'C',1,0,'');
			$this->SetFillColor(0, 0, 0);
			}
			
	}
   $this->SetXY(50,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
   $this->Output();
	}
	function stockequin ($datejour1,$datejour2,$station)
	{
	$this->SetHeaderMargin(2);
	$this->SetFooterMargin(6);
	$this->setTitle('Registre signalement');
	$this->AddPage('P','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entetex("ETAT DES STOCKS CHEPTEL EQUIN ");	
	$this->SetFillColor(240);
	$this->SetXY(10,58);$this->Cell(190,10,'Du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,68);$this->Cell(10,12,'N°',1,1,1,'C');
	$this->SetXY(20,68);$this->Cell(45,12,'Nom',1,1,'C',1);
	$this->SetXY(65,68);$this->Cell(45,12,'Race',1,1,'C',1);
	$this->SetXY(110,68);$this->Cell(45,12,'Estimation (DA)',1,1,'C',1);
    $this->SetXY(155,68);$this->Cell(45,12,'Observation',1,1,'C',1);
    $this->SetFillColor(255, 255, 255);
	$this->mysqlconnect();	
	$queryvac = "select * from cheval  WHERE station=$station  and  (Datesigna BETWEEN '$datejour1' AND '$datejour2') order by Datesigna,NomA ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(10,10,trim($resultvac->id),1,1,'C',0);
	$this->SetXY(20,$this->GetY()-10);$this->Cell(45,10,trim($resultvac->NomA),1,1,'L',0);$this->racesregistre($resultvac->Race); 
	$this->SetXY(65,$this->GetY()-10);$this->Cell(45,10,$this->nbrtostring('race','id',trim($resultvac->Race),'race'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(110,$this->GetY()-10);$this->Cell(45,10,trim($resultvac->prix),1,1,'C',0);
	$this->SetXY(155,$this->GetY()-10);$this->Cell(45,10,"***",1,1,'C',0);
	}
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY());$this->Cell(100,10,'Nombre des equins : '.$num_rows,1,1,1,'L');
	//*****//
	$queryvac = "select SUM(prix)as prixt,station,Datesigna,NomA   from cheval  WHERE station=$station  and  (Datesigna BETWEEN '$datejour1' AND '$datejour2') order by Datesigna,NomA ";
	$requete=mysql_query($queryvac);
	$row = mysql_fetch_array($requete); 
	$this->SetXY(110,$this->GetY()-10);$this->Cell(90,10,'Montant global : '.$row['prixt'],1,1,1,'L');$this->SetFillColor(255, 255, 255);
	$this->SetXY(10,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
	
	$this->Output();	
	}
	function Primes ($datejour1,$datejour2,$station)
	{
	$this->AddPage('P','A4');
    $this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entetex('LISTE DES ELEVEURS BENEFICIAIRES DES PRIMES DE NAISSANCES');
	$this->mysqlconnect();
	
	$queryvac = "select * from wil  where  IDWIL !=99000 order by IDWIL ";// Sexe='$Sexe' AND Race $Race  NomA 
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,'Total Wilayas : '.$num_rows,0,1,'L',0);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
	        $this->AddPage('P','A4');
		    $this->SetFont('aefurat', 'B', 12);
		    $this->SetFillColor(248, 248, 255);
		    $this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,"POUR L'ANNEE 2017- WILAYA ".trim($resultvac->WILAYAS).' ('.$resultvac->IDWIL.')',0,1,'C',1,0,'');$this->SetFillColor(0, 0, 0);
		    $this->SetFont('aefurat', '', 10);
		    //$this->SetXY(10,$this->GetY());$this->Cell(190,5,'Annuaire des éleveurs',0,1,'L',0);
		 
			// $queryvac1 = "select DISTINCT NomP,wil,com,adresse,COUNT(NomP) as nbr  from cheval where wil=$resultvac->IDWIL    GROUP BY  NomP ";
			// $resultat1 = mysql_query($queryvac1);
			// $num_rows1 = mysql_num_rows($resultat1);
			
			// $this->SetXY(15,$this->GetY());$this->Cell(190,5,'',0,1,'L',0);
			// $this->SetXY(15,$this->GetY());$this->Cell(190,5,' ____________________________________________________________________________________________________ ',0,1,'L',0);
            // $this->SetXY(15,$this->GetY());$this->Cell(190,5,'',0,1,'L',0);
			// while($resultvac1=mysql_fetch_object($resultat1))
			// {
			// $this->SetXY(15,$this->GetY());$this->Cell(55,5,trim($resultvac1->NomP),0,1,'L',0);
			// $this->SetXY(70,$this->GetY()-5);$this->Cell(50,5,'Commune : '.$this->nbrtostringv('com','IDCOM',$resultvac1->com,'COMMUNE'),0,1,'L',0);
			// $this->SetXY(125,$this->GetY()-5);$this->Cell(50,5,'Adresse : '.$resultvac1->adresse,0,1,'L',0);
			// $this->SetXY(172,$this->GetY()-5);$this->Cell(10,5,'Equidées  : ',0,1,'L',0);
			// $this->SetFillColor(248, 248, 255);
			// $this->SetXY(190,$this->GetY()-4);$this->Cell(10,3,$resultvac1->nbr,0,1,'C',1,0,'');
			// $this->SetFillColor(0, 0, 0);
			// }
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,' ____________________________________________________________________________________________________ ',0,1,'L',0);
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,'',0,1,'L',0);
			$this->SetFillColor(248, 248, 255);
			//$this->SetXY(10,$this->GetY());$this->Cell(190,5,$num_rows1.' éleveurs ',0,1,'C',1,0,'');
			$this->SetFillColor(0, 0, 0);
		
	}
   $this->SetXY(50,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
   $this->Output();
	}
	
	function traspondeur ($datejour1,$datejour2,$station)
	{
	$this->SetHeaderMargin(2);
	$this->SetFooterMargin(6);
	$this->setTitle('Registre signalement');
	$this->AddPage('P','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entetex("Liste nominative des chevaux  puces ");	
	$this->SetFillColor(240);
	$this->SetXY(10,58);$this->Cell(190,10,'Du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	
	
	$this->SetXY(10,68);$this->Cell(45,12,'Nom',1,1,1,'C');
	$this->SetXY(40,68);$this->Cell(10,12,'Sexe',1,1,'C',1);
	$this->SetXY(50,68);$this->Cell(45,12,'Race',1,1,'C',1);
	$this->SetXY(95,68);$this->Cell(25,12,'Mle',1,1,'C',1);
    $this->SetXY(120,68);$this->Cell(32,12,'N° Puce ',1,1,'C',1);
    $this->SetXY(152,68);$this->Cell(48,12,'Propriétaires',1,1,'C',1);
    
	$this->SetFillColor(255, 255, 255);
	$this->mysqlconnect();	
	$queryvac = "select * from cheval  WHERE station=$station  and  (Datesigna BETWEEN '$datejour1' AND '$datejour2') order by Datesigna,NomA ";
	$resultat=mysql_query($queryvac);
	$num_rows = mysql_num_rows($resultat);
	$this->SetFont('aefurat', '', 10);
	while($resultvac=mysql_fetch_object($resultat))
	{
	$this->SetXY(10,$this->GetY());$this->Cell(30,10,trim($resultvac->NomA),1,1,'L',0);
	$this->SetXY(40,$this->GetY()-10);$this->Cell(10,10,trim($resultvac->Sexe),1,1,'C',0); $this->racesregistre($resultvac->Race);
	$this->SetXY(50,$this->GetY()-10);$this->Cell(45,10,$this->nbrtostring('race','id',trim($resultvac->Race),'race'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(95,$this->GetY()-10);$this->Cell(25,10,trim($resultvac->N),1,1,'C',0);
	$this->SetXY(120,$this->GetY()-10);$this->Cell(32,10,trim($resultvac->NPPRODUIT),1,1,'C',0);
	$this->SetXY(152,$this->GetY()-10);$this->Cell(48,10,$this->nbrtostring('eleveur','id',trim($resultvac->ideleveur),'NomP') ,1,1,'L',0);
	}
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY());$this->Cell(190,10,'Nombre des equins : '.$num_rows,1,1,1,'L');
	//*****//
	// $queryvac = "select SUM(prix)as prixt,station,Datesigna,NomA   from cheval  WHERE station=$station  and  (Datesigna BETWEEN '$datejour1' AND '$datejour2') order by Datesigna,NomA ";
	// $requete=mysql_query($queryvac);
	// $row = mysql_fetch_array($requete); 
	// $this->SetXY(110,$this->GetY()-10);$this->Cell(90,10,'Montant global : '.$row['prixt'],1,1,1,'L');
	$this->SetFillColor(255, 255, 255);
	$this->SetXY(10,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
	
	$this->Output();	
	}
	
	
	
	//******************************************************************************************************************************************//
	function entete() 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetXY(10,5);
	$this->Cell(275,6,$this->repar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,$this->repfr,0,1,'C');
	$this->Cell(275,6,$this->minar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,$this->minfr,0,1,'C');
	$this->Cell(275,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,$this->ondeecfr,0,1,'C');//
	$this->Image('logoof.png', $x=20, $y=20, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
	function racelivreta44($x,$y,$raceequin,$NPPRODUIT,$N,$page) 
	{
		if ($raceequin=='4')
		{
		$this->SetFont('helvetica', 'I', 8);
		$this->SetFillColor(152 ,251 ,152);
		$this->SetXY(5,$y);$this->Cell(100,5,"Numéro de puce : ".$NPPRODUIT,0,1,'L',1,0,'');
		$this->SetXY(105,$y);$this->Cell(100,5,"N : ".$N,0,1,'R',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFillColor(152 ,251 ,152);
		$this->SetXY(5,$y+140);$this->Cell(200,5,$page,0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('dejavusans', '', 12);
		}
		if ($raceequin=='6')
		{
		$this->SetFont('helvetica', 'I', 8);
		$this->SetFillColor(135 ,206 ,235);
		$this->SetXY(5,$y);$this->Cell(100,5,"Numéro de puce : ".$NPPRODUIT,0,1,'L',1,0,'');
		$this->SetXY(105,$y);$this->Cell(100,5,"N : ".$N,0,1,'R',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFillColor(135 ,206 ,235);
		$this->SetXY(5,$y+140);$this->Cell(200,5,$page,0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('dejavusans', '', 12);
		}
		if ($raceequin=='2')
		{
		$this->SetFont('helvetica', 'I', 8);
		$this->SetFillColor(255, 228, 225);
		$this->SetXY(5,$y);$this->Cell(100,5,"Numéro de puce : ".$NPPRODUIT,0,1,'L',1,0,'');
		$this->SetXY(105,$y);$this->Cell(100,5,"N : ".$N,0,1,'R',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFillColor(255, 228, 225);
		$this->SetXY(5,$y+140);$this->Cell(200,5,$page,0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('dejavusans', '', 12);
		}
		if ($raceequin=='3')
		{
		$this->SetFont('helvetica', 'I', 8);
		$this->SetFillColor(255, 255, 225);
		$this->SetXY(5,$y);$this->Cell(100,5,"Numéro de puce : ".$NPPRODUIT,0,1,'L',1,0,'');
		$this->SetXY(105,$y);$this->Cell(100,5,"N : ".$N,0,1,'R',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFillColor(255, 255, 225);
		$this->SetXY(5,$y+140);$this->Cell(200,5,$page,0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('dejavusans', '', 12);
		}
	}
	
	function racelivreta4($x,$y,$y1,$w,$h,$raceequin) 
	{

	if ($raceequin=='4')
	{
	$this->SetFillColor(152 ,251 ,152);
	$this->RoundedRect($x, $y, $w, 5, 1.50, '1111', 'DF');
	$this->SetFont('helvetica', 'I', 8);
    $this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));
    $this->Text(180,1.5,"N : ".trim($result->N));
	
	
	
	$this->RoundedRect($x, $y1, $w, $h, 1.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}
	if ($raceequin=='6')
	{
	$this->SetFillColor(135 ,206 ,235);
	$this->RoundedRect($x, $y, $w, 5, 1.50, '1111', 'DF');
	$this->RoundedRect($x, $y1, $w, $h, 1.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}
	if ($raceequin=='2')
	{
	$this->SetFillColor(255, 228, 225);
	$this->RoundedRect($x, $y, $w, 5, 1.50, '1111', 'DF');
	$this->RoundedRect($x, $y1, $w, $h, 1.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}

	if ($raceequin=='3')
	{
	$this->SetFillColor(255, 255, 255);
	$this->RoundedRect($x, $y, $w, 5, 1.50, '1111', 'DF');
	$this->RoundedRect($x, $y1, $w, $h, 1.50, '1111', 'DF');
	$this->SetFillColor(0, 0, 0);
	}
	}
	function racesregistre($raceequin) 
	{
	if ($raceequin=='2')
	{
	$this->SetFillColor(255, 228, 225);
	}

	if ($raceequin=='3')
	{
	$this->SetFillColor(255, 255, 255);
	}
	if ($raceequin=='4')
	{
	$this->SetFillColor(152 ,251 ,152);
	}
	if ($raceequin=='6')
	{
	$this->SetFillColor(135 ,206 ,235);
	}
	}
	function livret ($id)
	{
		$this->mysqlconnect();
		$query = "select * from cheval WHERE  id = '$id'    ";
		$resultat=mysql_query($query);
		while($result=mysql_fetch_object($resultat))
		{
		$this->setTitle('Livret');
		$this->AddPage('L','A5');//1
		$this->SetFont('dejavusans', '', 12);	
		$this->racelivret($result->Race);
		$this->Cell(190,6,$this->repar,0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,$this->repfr,0,1,'C');
		$this->Cell(190,6,$this->minar,0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,$this->minfr,0,1,'C');
		$this->Cell(190,6,$this->ondeecar,0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,$this->ondeecfr,0,1,'C');
		$this->Image('logoof.png', $x=80, $y=65, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
		
		$this->SetFillColor(248, 248, 255);
		$this->SetXY(10,100);
		$this->Cell(190,6,'دفتر وصفي',0,1,'C',1,0,'');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'LIVRET SIGNALETIQUE',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->EAN13($x=87, $y=120,trim($result->id), $h=10, $w=.35);$this->SetFont('aefurat', '', 12);
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));
		
		
		$this->AddPage('L','A5');//2
		$this->SetFont('dejavusans', '', 12);$this->racelivret($result->Race);
		$this->SetXY(10,30);
		$this->Cell(190,6,'الجمهورية الجزائرية الديمقراطية الشعبية',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'République Algérienne Démocratique et Populaire',0,1,'C');
		$this->Cell(190,6,'وزارة الفلاحة و التنمية الريفية ',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL",0,1,'C');
		$this->Cell(190,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'Office National de Développement des Elevages  Equins et Camélins',0,1,'C');
		$this->Cell(190,6,'دفتر وصفي',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'LIVRET SIGNALETIQUE',0,1,'C');
		$this->Cell(190,6,'يرمي إلى التعريف بحصان',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,"( déstiné à l'identification d'un équidé )",0,1,'C');
		$this->Cell(190,6,'قرار رقم 641 بتاريخ 23 أوت 1987',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'Arrété N° 641 du 23 Aout 1987',0,1,'C');
		$this->EAN13($x=87, $y=120,trim($result->id), $h=10, $w=.35);$this->SetFont('aefurat', '', 12);
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));
 
		$this->AddPage('L','A5');//3
		$this->SetDisplayMode('fullpage','single');$this->racelivret($result->Race);
		$this->Rect(103,5,1,135,"d");
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->SetXY(5,11);$this->Cell(95,6,'INSTRUCTIONS GENERALES',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('dejavusans', '',6.5);
		$this->SetXY(5,$this->getY());$this->Cell(95,6,"l'office national de developpement des élevage équin a établi pour votre cheval ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,6,"une carte d'immatriculation ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,6,'un livret signaletique ',0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,'ces deux élements portent le mème N° matricule correspondant',0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"à l'enregistrement au fichier central de L'ONDEEC toute perte de ces documents",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"doit etre déclare à L'ONDEEC 8 Amrani Benouda TIARET ALGERIE",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"ils doivent etre retournée a la meme adresse a la mort de l'animal",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"1-la carte d'immatriculation: doit etre conservé soigneusement,en cas de vente",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"elle doit etre endossé et remise à l'acheteur elle est considérée comme une",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"présemption de proprieté si elle a ete regulierement en- ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"dossé à chaque transaction.",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"2-livret signalétique : est destiné à l'identification de l'animal et doit ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"l'accompagner dans tous ces déplacements pour etre présenté à toute",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"demande des autorités chargées des controles administratifs ,techniques",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"et sanitaires. Il ne constitue pas un titre de propriété.",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"Toute personne qui se rend coupable de fausse déclaration ,contrefacons",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"ou falsifications de ce document s'expose aux poursuites des services de l'ONDEEC",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"Le livret signaletique prend toute sa validation :le signalement",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"descriptif du produit relevé sans la mére doit etre vérifier et complété ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"du signalement graphique par un agent de l'ONDEEC ou un vétérinaire agrée ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"par cette administration , lorseque l'animal a atteint l'age de de 18 mois ou avant ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"son exportation .Le livret signalétique est alors transmise à l'ONDEEC ( service ",0,1,'L');
		$this->SetXY(5,$this->getY());$this->Cell(95,5,"controle et vérification ) pour visa. ",0,1,'L');
		$this->SetFont('aefurat', '', 12);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->SetXY(110,11);$this->Cell(95,6,'تعليمات عامة',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 10);
		$this->SetXY(110,11+6);$this->Cell(95,6,'إن الديوان الوطني لتربية الخيول أعد لحصانكم',0,1,'R');
		$this->SetXY(110,11+12);$this->Cell(95,6,'-بطاقة التسجيل',0,1,'R');
		$this->SetXY(110,11+18);$this->Cell(95,6,'-دفتر وصفي ',0,1,'R');
		$this->SetXY(110,11+24);$this->Cell(95,6,'و يحملان هذان العنصران نفس الرقم المطابق للتسجيل ضمن السجل المركزي',0,1,'R');
		$this->SetXY(110,11+30);$this->Cell(95,6,'للديوان الوطني لتربية الخيول و يجب الإتصال بالديوان الكائن 8,شارع عمراني',0,1,'R');
		$this->SetXY(110,11+36);$this->Cell(95,6,'بن عودة - تيارت (الجزائر) في حالة ضياع هذه الوثائق كما ينبغي إعادتها عند',0,1,'R');
		$this->SetXY(110,11+42);$this->Cell(95,6,'وفاة الحيوان',0,1,'R');
		$this->SetXY(110,11+48);$this->Cell(95,6,'يجب الإحتفاظ ببطاقة التسجيل و في حالة البيع ينبغي تظهيرها و تسليمها ',0,1,'R');
		$this->SetXY(110,11+54);$this->Cell(95,6,'للمشتري و تعتبر بمثابة قرينة للملكية إذا ما تم تطهيرها بإنتظام و عند كل عملية ',0,1,'R');
		$this->SetXY(110,11+60);$this->Cell(95,6,'لحارية',0,1,'R');
		$this->SetXY(110,11+66);$this->Cell(95,6,'2(-الدفتر الوصفي يرمي إلى تعريف الحيوان و يجب أن يرافقه في جميع إنتقالاته ',0,1,'R');
		$this->SetXY(110,11+72);$this->Cell(95,6,'قصد تقديمه عند طلب السلطات المكلفة بالمراقبة الإدارية و التقنية ',0,1,'R');
		$this->SetXY(110,11+78);$this->Cell(95,6,'و الصحية و لا يشكل عقد للملكية',0,1,'R');
		$this->SetXY(110,11+84);$this->Cell(95,6,'كل من إرتكب تصريح مزور جريمة التقليد لهذه الوثيقة يتعرض لملاحظات ',0,1,'R');
		$this->SetXY(110,11+90);$this->Cell(95,6,'الديوان الوطني لتربية الخيول',0,1,'R');
		$this->SetXY(110,11+96);$this->Cell(95,6,'- يتمتع الدفتر الوصفي بقيمة بعد التصديق عليه ',0,1,'R');
		$this->SetXY(110,11+102);$this->Cell(95,6,'- يجب تدقيق الوصف البياني للمنتوج المسجل يجب الأم و تكميله بالوصف',0,1,'R');
		$this->SetXY(110,11+108);$this->Cell(95,6,'الخطي عون الديوان الوطني لتربية الخيول او طبيب بيطري معتمد من طرف هذه',0,1,'R');
		$this->SetXY(110,11+114);$this->Cell(95,6,'الإدارة و عند بلوغ الحيوان سن 18 شهر أو قبل تصديره يرسل الدفتر الوصفي ',0,1,'R');
		$this->SetXY(110,11+120);$this->Cell(95,6,'إلى الديوان ( مصلحة المراقبة و التحقيق )للتأشيرة',0,1,'R');
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));

		$this->AddPage('L','A5');//4
		$this->SetFont('dejavusans', '', 12);$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'شهادة النسب أو الوصل',0,1,'C',1,0,'');
		$this->Cell(190,5,"CERTIFICAT D'ORIGINE",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetXY(10,30);$this->Cell(10,6,'الرقم',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,36);$this->Cell(10,6,"N : ",0,1,'L');    
		$this->SetXY(15,36);$this->Cell(10,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');    
		$this->SetTextColor(225,0,0);$this->SetXY(20,36);$this->Cell(50,6,trim($result->N),0,1,'L');$this->SetTextColor(0,0,0); 
		$this->SetXY(10,42);$this->Cell(63,6,'الإسم',0,1,'L');$this->SetXY(10+63,42);$this->Cell(63,6,'الجنس',0,1,'L');$this->SetXY(10+63+63,42);$this->Cell(63,6,'اللون',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,48);$this->Cell(13,6,'Nom : ',0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(23,48);$this->Cell(50,6,trim($result->NomA),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22,48);$this->Cell(13,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
		$this->SetXY(10+63,48);$this->Cell(13,6,'Sexe :',0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(10+63+13,48);$this->Cell(50,6,trim($result->Sexe),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10+75,48);$this->Cell(13,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
		$this->SetXY(10+63+63,48);$this->Cell(13,6,'Robe :',0,1,'L');$this->SetXY(10+63+63+13,48);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('robe','id',trim($result->Nobo),'robe'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10+75+63,48);$this->Cell(13,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
		$this->SetXY(10,54);$this->Cell(190,6,'السلالة',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,60);$this->Cell(13,6,"Race :",0,1,'L');$this->SetXY(23,60);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('race','id',trim($result->Race),'race'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22,60);$this->Cell(13,6,"_ _ _ _  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10,66);$this->Cell(95,6,'الأب',0,1,'L');$this->SetXY(10+95,66);$this->Cell(95,6,'السلالة',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,72);$this->Cell(13,6,"Père :",0,1,'L');   $this->SetXY(23,72);$this->SetTextColor(225,0,0);   $this->Cell(50,6,trim($result->Pere),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22,72);$this->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');
		$this->SetXY(10+95,72);$this->Cell(13,6,"Race :",0,1,'L');$this->SetXY(23+95,72);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('race','id',trim($result->RacePere),'race'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22+95,72);$this->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10,78);$this->Cell(95,6,'الأم',0,1,'L');$this->SetXY(10+95,78);$this->Cell(95,6,'السلالة',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,84);$this->Cell(13,6,"Mère :",0,1,'L');$this->SetXY(23,84);$this->SetTextColor(225,0,0);$this->Cell(50,6,trim($result->mere),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22,84);$this->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10+95,84);$this->Cell(13,6,"Race :",0,1,'L');$this->SetXY(23+95,84);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('race','id',trim($result->RaceMere),'race'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22+95,84);$this->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10,90);$this->Cell(190,6,'تاريخ الميلاد',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,96);$this->Cell(36,6,"Date de Naissance :",0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(46,96);$this->Cell(50,6,$this->dateUS2FR(trim($result->Dns)),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(45,96);$this->Cell(36,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10,102);$this->Cell(120,6,'المالك',0,1,'L'); $this->SetXY(20+120,102);$this->Cell(70,6,'شهادة النسب مصادق عليها في',0,1,'L');   $this->SetFont('aefurat', '', 12);
		$this->SetXY(10,108);$this->Cell(26,6,"Propriètaire :",0,1,'L');$this->SetXY(36,108);$this->SetTextColor(225,0,0);$this->Cell(50,6,trim($result->NomP),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(35,108);$this->Cell(26,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(20+120,113);$this->Cell(36,6,"Certificat d'origine",0,1,'L');$this->SetXY(46+120,108);
		$this->SetXY(10,114);$this->Cell(120,6,'العنوان',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,120);$this->Cell(20,6,"Adresse :",0,1,'L');$this->SetXY(30,120);$this->SetTextColor(225,0,0);$this->Cell(100,6,$this->nbrtostring('wil','IDWIL',trim($result->wil),'WILAYAS').'_'.$this->nbrtostring('com','IDCOM',trim($result->com),'COMMUNE').'_'.trim($result->adresse),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(28,120);$this->Cell(20,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10,132);$this->Cell(20,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(20+120,119);$this->Cell(20,6,"Validé Le :",0,1,'L');
		$this->SetXY(40+120,119);$this->SetTextColor(225,0,0);$this->Cell(20,6,$this->dateUS2FR(trim($result->Datesigna)),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));

		$this->AddPage('L','A5');//5
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'الأب',0,1,'C',1,0,'');
		$this->Cell(190,5,'PERE',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetXY(10,30);$this->Cell(95,6,'الإسم',0,1,'L');$this->SetXY(10+95,30);$this->Cell(95,6,'تاريخ الميلاد',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,36);$this->Cell(95,6,"Nom :",0,1,'L');$this->SetXY(22,36);$this->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L'); 
		$this->SetXY(23,36);$this->SetTextColor(225,0,0);$this->Cell(50,6,trim($result->Pere),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10+95,36);$this->Cell(95,6,"Date de Naissance :",0,1,'L');$this->SetXY(45+95,36);$this->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(45+95,36);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->dateUS2FR(trim($result->DnsPere)),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10,42);$this->Cell(95,6,'السلالة',0,1,'L');$this->SetXY(10+95,42);$this->Cell(95,6,'اللون',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,48);$this->Cell(95,6,"Race :",0,1,'L');$this->SetXY(22,48);$this->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L'); 
		$this->SetXY(23,48);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('race','id',trim($result->RacePere),'race'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10+95,48);$this->Cell(95,6,"Robe :",0,1,'L');$this->SetXY(22+95,48);$this->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(22+95,48);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('robe','id',trim($result->CouleurPere),'robe'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10,54);$this->Cell(120,6,"N° S. B. A. :",0,1,'L');
		$this->SetXY(10,60);$this->Cell(63,6,'حصان فحل',0,1,'L');$this->SetXY(10+63,60);$this->Cell(63,6,'سنة النزول',0,1,'L');$this->SetXY(10+63+63,60);$this->Cell(63,6,'المحطة',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10+63,66);$this->Cell(63,6,'Année de la Monté :',0,1,'L');$this->SetXY(45+63,66);$this->Cell(63,6,' _ _ _ _ _ _ _ _',0,1,'L');
		$this->SetXY(10+63+63,66);$this->Cell(63,6,'Station :',0,1,'L');$this->SetXY(25+63+63,66);$this->Cell(63,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
		if(trim($result->aprouve)==1)
		{
		$this->SetXY(10,66);$this->Cell(63,6,'Etalon : Oui',0,1,'L');$this->SetXY(25,66);$this->Cell(63,6,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,1,'L');
		} 
		else 
		{
		$this->SetXY(10,66);$this->Cell(63,6,'Etalon : Oui',0,1,'L');$this->SetXY(25,66);$this->Cell(63,6,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,1,'L');
		}
		$this->SetXY(10,73);$this->Cell(15,7.5,'من طرف',0,1,'C');
		$this->SetXY(10,73+7.5);$this->Cell(15,7.5,'Par',0,1,'C');
		$this->SetXY(10,73+24);$this->Cell(15,7.5,'و',0,1,'C');
		$this->SetXY(10,73+24+7.5);$this->Cell(15,7.5,'Et',0,1,'C');
		$this->SetXY(10,76+15+18);$this->Cell(15,7.5,'رقم',0,1,'C');
		$this->SetXY(10,76+15+18+7.5);$this->Cell(15,7.5,'N°',0,1,'C');

		$this->Rect(85,80,15,1,"d");$this->Rect(92,80,1,12,"d");$this->Rect(92,92,8,1,"d");
		$this->SetFillColor(248, 248, 255);
		$this->SetXY(25,76);$this->Cell(60,10,$this->nbrtostringv('cheval','id',$result->idpere,'Pere'),1,1,'C',1,0,'');         $this->SetXY(100,76);$this->Cell(100,10,'',1,1,'C',1,0,'');
																		                                                         $this->SetXY(100,76+12);$this->Cell(100,10,'',1,1,'C',1,0,'');	
		$this->SetFillColor(0, 0, 0);													 
		$this->Rect(85,80+25,15,1,"d");$this->Rect(92,80+25,1,12,"d");$this->Rect(92,92+25,8,1,"d");														 
		$this->SetFillColor(248, 248, 255);
		$this->SetXY(25,76+24);$this->Cell(60,10,$this->nbrtostringv('cheval','id',$result->idpere,'mere'),1,1,'C',1,0,'');     $this->SetXY(100,76+24);$this->Cell(100,10,'',1,1,'C',1,0,'');
																	                                                            $this->SetXY(100,76+36);$this->Cell(100,10,'',1,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetXY(25,76+36);$this->Cell(60,10,'',1,1,'L');

		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));

		$this->AddPage('L','A5');//6
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'الأم',0,1,'C',1,0,'');
		$this->Cell(190,5,'MERE',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetXY(10,30);$this->Cell(95,6,'الإسم',0,1,'L');$this->SetXY(10+95,30);$this->Cell(95,6,'تاريخ الميلاد',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,36);$this->Cell(95,6,"Nom :",0,1,'L');
		$this->SetXY(22,36);$this->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(23,36);$this->SetTextColor(225,0,0);$this->Cell(50,6,trim($result->mere),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10+95,36);$this->Cell(95,6,"Date de Naissance :",0,1,'L');
		$this->SetXY(45+95,36);$this->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(45+95,36);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->dateUS2FR(trim($result->DnsMere)),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10,42);$this->Cell(95,6,'السلالة',0,1,'L');$this->SetXY(10+95,42);$this->Cell(95,6,'اللون',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,48);$this->Cell(95,6,"Race :",0,1,'L');$this->SetXY(22,48);$this->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(23,48);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('race','id',trim($result->RaceMere),'race'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10+95,48);$this->Cell(95,6,"Robe :",0,1,'L');$this->SetXY(22+95,48);$this->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(22+95,48);$this->SetTextColor(225,0,0);$this->Cell(50,6,$this->nbrtostring('robe','id',trim($result->CouleurMere),'robe'),0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(10,54);$this->Cell(120,6,"N° S. B. A. :",0,1,'L');
		$this->SetXY(10,73);$this->Cell(15,7.5,'من طرف',0,1,'C');
		$this->SetXY(10,73+7.5);$this->Cell(15,7.5,'Par',0,1,'C');
		$this->SetXY(10,73+24);$this->Cell(15,7.5,'و',0,1,'C');
		$this->SetXY(10,73+24+7.5);$this->Cell(15,7.5,'Et',0,1,'C');
		$this->SetXY(10,76+15+18);$this->Cell(15,7.5,'رقم',0,1,'C');
		$this->SetXY(10,76+15+18+7.5);$this->Cell(15,7.5,'N°',0,1,'C');
		$this->Rect(85,80,15,1,"d");$this->Rect(92,80,1,12,"d");$this->Rect(92,92,8,1,"d");
		$this->SetFillColor(248, 248, 255);
		$this->SetXY(25,76);$this->Cell(60,10,$this->nbrtostringv('cheval','id',$result->idmere,'Pere'),1,1,'C',1,0,'');         $this->SetXY(100,76);$this->Cell(100,10,'',1,1,'C',1,0,'');
																		                                                         $this->SetXY(100,76+12);$this->Cell(100,10,'',1,1,'C',1,0,'');	
		$this->SetFillColor(0, 0, 0);													 
		$this->Rect(85,80+25,15,1,"d");$this->Rect(92,80+25,1,12,"d");$this->Rect(92,92+25,8,1,"d");														 
		$this->SetFillColor(248, 248, 255);
		$this->SetXY(25,76+24);$this->Cell(60,10,$this->nbrtostringv('cheval','id',$result->idmere,'mere'),1,1,'C',1,0,'');     $this->SetXY(100,76+24);$this->Cell(100,10,'',1,1,'C',1,0,'');
																	                                                            $this->SetXY(100,76+36);$this->Cell(100,10,'',1,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetXY(25,76+36);$this->Cell(60,10,'',1,1,'L');
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));

		$this->AddPage('L','A5');//7
		$file = '../../public/images/'.$id.'.jpg';
		if (file_exists($file))
		{
		$this->Image('../../public/images/'.$id.'.jpg', $x=2, $y=20, $w=210, $h=125, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
		}
		else
		{
		$this->Image('../../public/images/ch.jpg', $x=2, $y=20, $w=210, $h=125, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
		}
		$this->SetFont('dejavusans', '', 12);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'وصف الرسم',0,1,'C',1,0,'');
		$this->Cell(190,5,'Signalement graphique',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->racelivret($result->Race);
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		//Typage ADN   TYPÉ ADN, CONTROLE DE FILIATION COMPATIBLE  Signalement graphique Outline diagram
		$this->AddPage('L','A5');//8
		$this->SetFont('dejavusans', '', 12);$this->racelivret($result->Race);
		$this->Rect(0,8,42,12,"d");$this->Rect(42,8,42,12,"d");$this->Rect(42+42,8,42,12,"d");$this->Rect(42+42+42,8,42,12,"d");$this->Rect(42+42+42+42,8,42,12,"d");
		$this->SetXY(0,8);$this->Cell(42,5,'الرقم',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(0,14);$this->Cell(42,5,'N° : ',0,0,'L');$this->SetTextColor(225,0,0);
		$this->SetXY(10,14);$this->Cell(32,5,trim($result->N),0,0,'L');$this->SetTextColor(0,0,0);$this->SetFont('dejavusans', '', 12);
		$this->SetXY(42,8);$this->Cell(42,5,'الإسم',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(42,14);$this->Cell(42,5,'Nom : ',0,1,'L');$this->SetTextColor(225,0,0);
		$this->SetXY(55,14);$this->Cell(29,5,trim($result->NomA),0,0,'L');$this->SetTextColor(0,0,0); $this->SetFont('dejavusans', '', 12);
		$this->SetXY(42+42,8);$this->Cell(42,5,'السلالة',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(42+42,14);$this->Cell(42,5,'Race : ',0,1,'L');$this->SetTextColor(225,0,0);
		$this->SetXY(96,14);$this->Cell(30,5,$this->nbrtostring('race','id',trim($result->Race),'race'),0,0,'L');$this->SetTextColor(0,0,0);$this->SetFont('dejavusans', '', 12);
		$this->SetXY(42+42+42,8);$this->Cell(42,5,'الجنس',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(42+42+42,14);$this->Cell(42,5,'Sexe : ',0,1,'L');$this->SetTextColor(225,0,0);
		$this->SetXY(96+42,14);$this->Cell(42,5,trim($result->Sexe),0,0,'L');$this->SetTextColor(0,0,0);$this->SetFont('dejavusans', '', 12);
		$this->SetXY(42+42+42+42,8);$this->Cell(42,5,'اللون',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(42+42+42+42,14);$this->Cell(42,5,'Robe : ',0,1,'L');$this->SetTextColor(225,0,0);
		$this->SetXY(96+85,14);$this->Cell(30,5,$this->nbrtostring('robe','id',trim($result->Nobo),'robe'),0,0,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(5,20);$this->Cell(190,6,'الوصف المسجل تحت الأم',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(5,26);$this->Cell(190,6,"Signalement rélevé sous la mère :",0,1,'L');
		$this->SetXY(68,26);$this->Cell(190,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');
		$this->SetXY(5,31);$this->Cell(190,6,'الرأس',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(5,36);$this->Cell(190,6,'Tete : ',0,1,'L');$this->SetFont('aefurat', '', 11);$this->SetTextColor(225,0,0);
		$this->SetXY(20,36);$this->MultiCell(185, 18,html_entity_decode(utf8_decode($result->Tete)), 0, 'L', 0, 0, '', '', true);$this->SetTextColor(0,0,0);
		$this->SetXY(22,36);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22,36+5);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(22,36+10);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(5,54);$this->Cell(190,6,'الأمامي الأيسر',0,1,'L');$this->SetFont('aefurat', '', 11);
		$this->SetXY(5,60);$this->Cell(190,6,"Ant. G :",0,1,'L');$this->SetXY(22,60);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(20,60);$this->Cell(185,6,html_entity_decode(utf8_decode(trim($result->AG))),0,0,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(5,66);$this->Cell(190,6,'الأمامي الأيمن',0,1,'L');$this->SetFont('aefurat', '', 11);
		$this->SetXY(5,72);$this->Cell(190,6,"Ant. D :",0,1,'L');$this->SetXY(22,72);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(20,72);$this->Cell(185,6,html_entity_decode(utf8_decode(trim($result->AD))),0,0,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(5,78);$this->Cell(190,6,'الخلفي الأيسر',0,1,'L');$this->SetFont('aefurat', '', 10);
		$this->SetXY(5,84);$this->Cell(190,6,"Post. G :",0,1,'L');$this->SetXY(22,84);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(20,84);$this->Cell(185,6,html_entity_decode(utf8_decode(trim($result->PG))),0,0,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(5,90);$this->Cell(190,6,'الخلفي الأيمن',0,1,'L');$this->SetFont('aefurat', '', 11);
		$this->SetXY(5,96);$this->Cell(190,6,"Post. D :",0,1,'L');$this->SetXY(22,96);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$this->SetTextColor(225,0,0);$this->SetXY(20,96);$this->Cell(185,6,html_entity_decode(utf8_decode(trim($result->PD))),0,0,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(5,90+12);$this->Cell(190,6,'علامات',0,1,'L');$this->SetFont('aefurat', '', 11);
		$this->SetXY(5,108);$this->Cell(190,6,"Marques : ",0,1,'L');$this->SetXY(22,108);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');                                                       $this->SetTextColor(225,0,0);$this->SetXY(22,108);$this->MultiCell(185, 18,html_entity_decode(utf8_decode($result->MARQUES)), 0, 'L', 0, 0, '', '', true);$this->SetTextColor(0,0,0);
		$this->SetXY(22,108+5);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(10,120);$this->Cell(190,6,'تدقيق الوصف إبتداء من سن 18 شهر',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,126);$this->Cell(190,6,"Vérification du Signalement à partir de 18 Mois :",0,1,'L');
		$this->SetXY(10,132);$this->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
		$this->SetXY(140,114);$this->Cell(190,6,'حرر ب                     في ',0,1,'L');$this->SetFont('aefurat', '', 12);
		$this->SetXY(130,120);$this->Cell(190,6,"Fait a : ".$this->nbrtostring('station','id',$result->station,'station')." le : ".$this->dateUS2FR(trim($result->Datesigna)),0,1,'L');//$this->SetTextColor(225,0,0);$this->SetXY(28,108);$this->Cell(42,6,trim($result->MARQUES),0,0,'L');$this->SetTextColor(0,0,0);
		$this->SetXY(125,126);$this->Cell(70,6,'امضاء مصالح الديوان ',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->SetXY(125,132);$this->Cell(70,6,"signature des services de L'ONDEEC",0,1,'C');
		// $this->SetXY(125,126);$this->Cell(70,6," ou du vétérinaire agréé :",0,1,'C');
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


				
		$this->AddPage('L','A5');//9
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'التلقيحات',0,1,'C',1,0,'');
		$this->Cell(190,5,'VACCINATIONS',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 10);$this->SetXY(105,25);$this->Cell(95,10,'تسجيل فوريا من طرف الطبيب البيطري و تصنيفه واضحة و دقيقة ',1,1,'C');
		$this->SetXY(105,35);$this->Cell(95,5,'في الإطار أدناه كل التلقيحات المستفاد بها الحيوان ',1,1,'C');
		$this->SetXY(10,25);$this->Cell(95,5,"toute vaccination subie par l'animal doit etre immediatement ",1,1,'L');
		$this->SetXY(10,30);$this->Cell(95,5,'inscrit par le veterinaire effectuant la vaccination de façon lisible',1,1,'L');
		$this->SetXY(10,35);$this->Cell(95,5,'et précisé dans le cadre  ci-dessous ',1,1,'L');
		$this->SetXY(10,40);$this->Cell(40,5,'طابع صيدلي و اسم الدواء',1,1,'C');
		$this->SetXY(10+40,40);$this->Cell(31,5,'الأمراض المعينة',1,1,'C');
		$this->SetXY(10+40+31,40);$this->Cell(21,5,'تاريخ',1,1,'C');
		$this->SetXY(10+40+31+21,40);$this->Cell(31,5,'مكان',1,1,'C');
		$this->SetXY(10+40+31+21+31,40);$this->Cell(47,5,'خاتم و عنوان الطبيب',1,1,'C');
		$this->SetXY(10+40+31+21+31+47,40);$this->Cell(20,5,'الإمضاء',1,1,'C');
		$this->SetXY(10,45);$this->Cell(40,5,'Vignette ou nom du vaccin',1,1,'C');
		$this->SetXY(10+40,45);$this->Cell(31,5,'Maladies Concernés',1,1,'C');
		$this->SetXY(10+40+31,45);$this->Cell(21,5,'Date',1,1,'C');
		$this->SetXY(10+40+31+21,45);$this->Cell(31,5,'Lieu',1,1,'C');
		$this->SetXY(10+40+31+21+31,45);$this->Cell(47,5,'Cachet et Adresse du Vétérinaire',1,1,'C');
		$this->SetXY(10+40+31+21+31+47,45);$this->Cell(20,5,'Signature',1,1,'C');
		$queryvac = "select * from vaccination WHERE  idcheval = '$id'  limit 0,9 ";//WHERE  id = '$id' 
		$resultat=mysql_query($queryvac);
		while($resultvac=mysql_fetch_object($resultat))
		{
		$this->SetXY(10,$this->GetY());$this->Cell(40,10,"***",1,1,'C',0);
		$this->SetXY(50,$this->GetY()-10);$this->Cell(31,10,trim($resultvac->vaccin),1,1,'C',0);
		$this->SetXY(81,$this->GetY()-10);$this->Cell(21,10,trim($resultvac->datevaccination),1,1,'C',0);
		$this->SetXY(102,$this->GetY()-10);$this->Cell(31,10,trim($resultvac->com),1,1,'C',0);
		$this->SetXY(133,$this->GetY()-10);$this->Cell(47,10,trim($resultvac->veterinaire),1,1,'C',0);
		$this->SetXY(180,$this->GetY()-10);$this->Cell(20,10,"",1,1,'C',0); 
		}
		for ($i = 50; $i <= 130; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(40,10,'',1,1,'C');
		$this->SetXY(50,$i);$this->Cell(31,10,'',1,1,'C');
		$this->SetXY(81,$i);$this->Cell(21,10,'',1,1,'C');
		$this->SetXY(102,$i);$this->Cell(31,10,'',1,1,'C');
		$this->SetXY(133,$i);$this->Cell(47,10,'',1,1,'C');
		$this->SetXY(180,$i);$this->Cell(20,10,'',1,1,'C');   
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		$this->AddPage('L','A5');//10
		$this->SetFont('aefurat', '', 10);$this->racelivret($result->Race);
		$queryvac = "select * from vaccination WHERE  idcheval = '$id'  limit 9,13 ";//WHERE  id = '$id' 
		$resultat=mysql_query($queryvac);
		while($resultvac=mysql_fetch_object($resultat))
		{
		$this->SetXY(10,$this->GetY());$this->Cell(40,10,"***",1,1,'C',0);
		$this->SetXY(50,$this->GetY()-10);$this->Cell(31,10,trim($resultvac->vaccin),1,1,'C',0);
		$this->SetXY(81,$this->GetY()-10);$this->Cell(21,10,trim($resultvac->datevaccination),1,1,'C',0);
		$this->SetXY(102,$this->GetY()-10);$this->Cell(31,10,trim($resultvac->com),1,1,'C',0);
		$this->SetXY(133,$this->GetY()-10);$this->Cell(47,10,trim($resultvac->veterinaire),1,1,'C',0);
		$this->SetXY(180,$this->GetY()-10);$this->Cell(20,10,trim($resultvac->id),1,1,'C',0); 
		}
		for ($i = 10; $i <= 130; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(40,10,'',1,1,'C');
		$this->SetXY(50,$i);$this->Cell(31,10,'',1,1,'C');
		$this->SetXY(81,$i);$this->Cell(21,10,'',1,1,'C');
		$this->SetXY(102,$i);$this->Cell(31,10,'',1,1,'C');
		$this->SetXY(133,$i);$this->Cell(47,10,'',1,1,'C');
		$this->SetXY(180,$i);$this->Cell(20,10,'',1,1,'C');   
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		$this->AddPage('L','A5');//11
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'اختبار المخبر',0,1,'C',1,0,'');
		$this->Cell(190,5,'TEST DE LABORATOIRE',0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetXY(10,25);$this->Cell(33,10,"موضوع",1,1,'C');
		$this->SetXY(10+33,25);$this->Cell(33,10,'طبيعة',1,1,'C');
		$this->SetXY(10+66,25);$this->Cell(33,10,'مخبر',1,1,'C');
		$this->SetXY(10+99,25);$this->Cell(33,10,"تاريخ ارسال",1,1,'C');
		$this->SetXY(10+132,25);$this->Cell(33,10,'تاريخالاجابة ',1,1,'C');
		$this->SetXY(10+165,25);$this->Cell(26,10,'ختم و امضاء ',1,1,'C');
		$this->SetXY(10,35);$this->Cell(33,10,"Objet ",1,1,'C');
		$this->SetXY(10+33,35);$this->Cell(33,10,'Nature',1,1,'C');
		$this->SetXY(10+66,35);$this->Cell(33,10,'Laboratoire',1,1,'C');
		$this->SetXY(10+99,35);$this->Cell(33,10,"Date d'envoie",1,1,'C');
		$this->SetXY(10+132,35);$this->Cell(33,10,'Date réponse ',1,1,'C');
		$this->SetXY(10+165,35);$this->Cell(26,10,'Signature ',1,1,'C');
		for ($i = 45; $i <= 130; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(33,10," ",1,1,'C');
		$this->SetXY(10+33,$i);$this->Cell(33,10,'',1,1,'C');
		$this->SetXY(10+66,$i);$this->Cell(33,10,'',1,1,'C');
		$this->SetXY(10+99,$i);$this->Cell(33,10,"",1,1,'C');
		$this->SetXY(10+132,$i);$this->Cell(33,10,'',1,1,'C');
		$this->SetXY(10+165,$i);$this->Cell(26,10,'',1,1,'C');
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));




		$this->AddPage('L','A5');//12
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'مراقبة هوية الحيوان',0,1,'C',1,0,'');
		$this->Cell(190,5,"CONTROLE DE L'IDENTITE DE L'ANIMAL",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 9);
		$this->SetXY(10,21);$this->Cell(95,52,"",1,1,'L');$this->SetXY(10+95,21);$this->Cell(95,52,"",1,1,'R');
		$this->SetXY(10,21);$this->Cell(95,7,"toute personne qui en application de la reglementation ou des codes",0,1,'L');
		$this->SetXY(10,21+7);$this->Cell(95,7,"vigueur est dans l'obligation de controle d'identite de l'animal qui lui est",0,1,'L');
		$this->SetXY(10,21+14);$this->Cell(95,7,"presente doit porter sa signature dans le cadre ci-dessus en indiquant",0,1,'L');
		$this->SetXY(10,21+21);$this->Cell(95,7,"la raison du controle son lieu et sa date ",0,1,'L');
		$this->SetXY(10,21+28);$this->Cell(95,7,"en cas de non conformite du signalement le livret doit retourné a",0,1,'L');
		$this->SetXY(10,21+35);$this->Cell(95,7,"LONDEEC 8 rue amrani benouda TIARET en indiquant sur une note",0,1,'L');
		$this->SetXY(10,21+42);$this->Cell(95,7,"annexée les differences constatées",0,1,'L');
		$this->SetXY(10+95,21);$this->Cell(95,7,"كل شخص يحول له التنظيم و القوانين السارية المفعول إلزامه مراقبة هوية",0,1,'R');
		$this->SetXY(10+95,21+7);$this->Cell(95,7,"الحيوان المقدم له مجبر على وضع إمضائه في الخانة المذكورة أدناه مع ذكر سبب ",0,1,'R');
		$this->SetXY(10+95,21+14);$this->Cell(95,7,"المراقبة تاريخها و مكانها",0,1,'R');
		$this->SetXY(10,73);$this->Cell(58,10,"سبب مراقبة الهوية ",1,1,'C');
		$this->SetXY(10+58,73);$this->Cell(37,10,"تاريخ و مكان",1,1,'C');
		$this->SetXY(10+58+37,73);$this->Cell(58,10,"سبب مراقبة الهوية",1,1,'C');
		$this->SetXY(10+58+37+58,73);$this->Cell(37,10,"تاريخ و مكان",1,1,'C');
		$this->SetXY(10,83);$this->Cell(58,10,"Raison Du controle de l'identite",1,1,'C');
		$this->SetXY(10+58,83);$this->Cell(37,10,"Date et lieu",1,1,'C');
		$this->SetXY(10+58+37,83);$this->Cell(58,10,"Raison du controle de l'identite",1,1,'C');
		$this->SetXY(10+58+37+58,83);$this->Cell(37,10,"Date et lieu",1,1,'C');
		for ($i = 93; $i <= 126; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58,$i);$this->Cell(37,10,"",1,1,'C');
		$this->SetXY(10+58+37,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58+37+58,$i);$this->Cell(37,10,"",1,1,'C');
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		$this->AddPage('L','A5');//13
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'مراقبة هوية الحيوان',0,1,'C',1,0,'');
		$this->Cell(190,5,"CONTROLE DE L'IDENTITE DE L'ANIMAL",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		for ($i = 25; $i <= 125; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58,$i);$this->Cell(37,10,"",1,1,'C');
		$this->SetXY(10+58+37,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58+37+58,$i);$this->Cell(37,10,"",1,1,'C');
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		$this->AddPage('L','A5');//14
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'مراقبة هوية الحيوان',0,1,'C',1,0,'');
		$this->Cell(190,5,"CONTROLE DE L'IDENTITE DE L'ANIMAL",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		for ($i = 25; $i <= 125; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58,$i);$this->Cell(37,10,"",1,1,'C');
		$this->SetXY(10+58+37,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58+37+58,$i);$this->Cell(37,10,"",1,1,'C');
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		$this->AddPage('L','A5');//15
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'التأشيرات الادارية',0,1,'C',1,0,'');
		$this->Cell(190,5,"VISAS ADMINISTRATIFS",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 9);
		$this->SetXY(10,21);$this->Cell(95,52,"",1,1,'L');$this->SetXY(10+95,21);$this->Cell(95,52,"",1,1,'R');
		$this->SetXY(10,21);$this->Cell(95,7,"Les cachets, attestations concernant l'animal doivent etre porteé dans le",0,1,'L');
		$this->SetXY(10,21+7);$this->Cell(95,7,"cadre ci-dessous par l'autorité compétante avec indication de la date et",0,1,'L');
		$this->SetXY(10,21+14);$this->Cell(95,7,"eventuellement du lieu en particulier:",0,1,'L');
		$this->SetXY(10,21+21);$this->Cell(95,7,"Il peut s'agir des mentions de non inscription sur la liste des oppositions",0,1,'L');
		$this->SetXY(10,21+21+7);$this->Cell(95,7,"pour une exportation, d'inscription sur liste des chevaux de sports",0,1,'L');
		$this->SetXY(10,21+21+14);$this->Cell(95,7,"d'obtention de la prime de sélection , d'inscription au lieu génialogique",0,1,'L');
		$this->SetXY(10,21+21+21);$this->Cell(95,7,"ou de toute décision administrative.",0,1,'L');
		$this->SetXY(10+95,21);$this->Cell(95,7,"يجب على السلطة المختصة وضع في الإطار أدناه الخواتم و الشهادات الخاصة",0,1,'R');
		$this->SetXY(10+95,21+7);$this->Cell(95,7,"بالحيوان مع ذكر التاريخ و عند الإقتضاء المكان",0,1,'R');
		$this->SetXY(10+95,21+14);$this->Cell(95,7,"يمكن أن يتعلق الأمر بعبارات عدم التسجيل على قائمة الإعتراضات قصد التصدير ",0,1,'R');
		$this->SetXY(10+95,21+21);$this->Cell(95,7,"تسجيل على قائمة خيول الرياضة للحصول على منحة الإنتقاء تسجيل في دفتر",0,1,'R');
		$this->SetXY(10+95,21+21+7);$this->Cell(95,7,"السلالي أو كل قرار إداري",0,1,'R');
		$this->SetFont('aefurat', '', 12);
		$this->SetXY(10,73);$this->Cell(58,10,"السلطة المختصة ",1,1,'C');
		$this->SetXY(10+58,73);$this->Cell(37,10,"سبب التأشيرة",1,1,'C');
		$this->SetXY(10+58+37,73);$this->Cell(58,10,"السلطة المختصة",1,1,'C');
		$this->SetXY(10+58+37+58,73);$this->Cell(37,10,"سبب التاشيرة",1,1,'C');
		$this->SetXY(10,83);$this->Cell(58,10,"Raison du controle de l'identite",1,1,'C');
		$this->SetXY(10+58,83);$this->Cell(37,10,"Date et lieu",1,1,'C');
		$this->SetXY(10+58+37,83);$this->Cell(58,10,"Raison du controle de l'identite",1,1,'C');
		$this->SetXY(10+58+37+58,83);$this->Cell(37,10,"Date Et Lieu",1,1,'C');
		for ($i = 93; $i <= 126; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58,$i);$this->Cell(37,10,"",1,1,'C');
		$this->SetXY(10+58+37,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58+37+58,$i);$this->Cell(37,10,"",1,1,'C');
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));



		$this->AddPage('L','A5');//16
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'التأشيرات الادارية',0,1,'C',1,0,'');
		$this->Cell(190,5,"VISAS ADMINISTRATIFS",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		for ($i = 25; $i <= 125; $i+=10) {
		$this->SetXY(10,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58,$i);$this->Cell(37,10,"",1,1,'C');
		$this->SetXY(10+58+37,$i);$this->Cell(58,10,"",1,1,'C');
		$this->SetXY(10+58+37+58,$i);$this->Cell(37,10,"",1,1,'C');
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		$this->AddPage('L','A5');//17
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'تأشيرات مصالح الجمارك',0,1,'C',1,0,'');
		$this->Cell(190,5,"VISAS DES DOUANES",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));



		$this->AddPage('L','A5');//18
		$this->SetFont('dejavusans', '', 12);
		$this->racelivret($result->Race);
		$this->SetFillColor(248, 248, 255);
		$this->SetFont('aefurat', '', 12);
		$this->Cell(190,5,'الملاك المتعاقبون',0,1,'C',1,0,'');
		$this->Cell(190,5,"LES PROPRIÉTAIRES SUCCESSIFS ",0,1,'C',1,0,'');
		$this->SetFillColor(0, 0, 0);

		//En cas de changement de propriétaire,  , l’association ou le service officiel l’ayant délivré  afin de le lui transmettre après réenregistrement.


		$this->SetFont('aefurat', '', 10);
		$this->SetXY(105,25);$this->Cell(95,10,'*** ',1,1,'C');
		$this->SetXY(105,35);$this->Cell(95,5,'**** ',1,1,'C');
		$this->SetXY(10,25);$this->Cell(95,5,"En cas de changement de propriétaire le document d'identification  ",1,1,'L');
		$this->SetXY(10,30);$this->Cell(95,5,"doit être immédiatement déposé auprès de l'organisation l'ayant  ",1,1,'L');
		$this->SetXY(10,35);$this->Cell(95,5,"délivré avec le nom et l'adresse du nouveau propriétaire",1,1,'L');
		$this->SetXY(10,40);$this->Cell(20,5,'بيـــــع في',1,1,'C');
		$this->SetXY(30,40);$this->Cell(35,5,'الى السيــــــــد',1,1,'C');
		$this->SetXY(65,40);$this->Cell(35,5,'الولاية',1,1,'C');
		$this->SetXY(100,40);$this->Cell(35,5,'البلدية',1,1,'C');
		$this->SetXY(135,40);$this->Cell(35,5,'العنوان',1,1,'C');
		$this->SetXY(170,40);$this->Cell(30,5,'الإمضاء',1,1,'C');
		$this->SetXY(10,45);$this->Cell(20,5,'Vendu le',1,1,'C');
		$this->SetXY(30,45);$this->Cell(35,5,'à Mr  ',1,1,'C');
		$this->SetXY(65,45);$this->Cell(35,5,'wilaya',1,1,'C');
		$this->SetXY(100,45);$this->Cell(35,5,'commune',1,1,'C');
		$this->SetXY(135,45);$this->Cell(35,5,'adresse',1,1,'C');
		$this->SetXY(170,45);$this->Cell(30,5,'Signature',1,1,'C');
		$queryS = "select * from sale  where idcheval=$id  order by  datesale asc LIMIT 0,6  ";//
		$resultatS=mysql_query($queryS);
		while($resultS=mysql_fetch_object($resultatS))
		{
		$this->SetFont('aefurat', '', 10);
		$this->SetXY(10,$this->GetY());$this->Cell(20,15,$this->dateUS2FR(trim($resultS->datesale)),1,1,'C',0);
		$this->SetXY(30,$this->GetY()-15);$this->Cell(35,15,trim($resultS->NomP),1,1,'L',0);
		$this->SetXY(65,$this->GetY()-15);$this->Cell(35,15,$this->nbrtostring('wil','IDWIL',trim($resultS->wil),'WILAYAS'),1,1,'L',0);
		$this->SetXY(100,$this->GetY()-15);$this->Cell(35,15,$this->nbrtostring('com','IDCOM',trim($resultS->com),'COMMUNE'),1,1,'L');
		$this->SetXY(135,$this->GetY()-15);$this->Cell(35,15,trim($resultS->adresse),1,1,'L',0);
		$this->SetXY(170,$this->GetY()-15);$this->Cell(30,15,'',1,1,'C',0); 
		}
		for ($i = 50; $i <= 130; $i+=15) {
		$this->SetXY(10,$i);$this->Cell(20,15,'',1,1,'C');
		$this->SetXY(30,$i);$this->Cell(35,15,'',1,1,'C');
		$this->SetXY(65,$i);$this->Cell(35,15,'',1,1,'C');
		$this->SetXY(100,$i);$this->Cell(35,15,'',1,1,'C');
		$this->SetXY(135,$i);$this->Cell(35,15,'',1,1,'C');
		$this->SetXY(170,$i);$this->Cell(30,15,'',1,1,'C');   
		}
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));

		$this->AddPage('L','A5');//18
		$this->SetFont('dejavusans', '', 12);$this->racelivret($result->Race);
		$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Text(5,1.5,"Numéro de puce : ".trim($result->NPPRODUIT));$this->Text(180,1.5,"N : ".trim($result->N));


		// $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
		// $style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
		// $style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
		// $style4 = array('L' => 0,
						// 'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
						// 'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
						// 'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
		// $style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 64, 128));
		// $style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
		// $style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));
		// Rounded rectangle
		// $this->Text(5, 249, 'Rounded rectangle examples');
		// $this->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
		// $this->RoundedRect(5, 25, 40, 30, 3.50, '1111', 'DF','',array(200, 200, 200));
		//$this->RoundedRect(50, 25, 40, 30, 6.50, '1000');
		//$this->RoundedRect(95, 25, 40, 30, 10.0, '1111', null, $style6);
		//$this->RoundedRect(140, 25, 40, 30, 8.0, '0101', 'DF', $style6, array(200, 200, 200));
		
		
		}
		$this->Output();
	}
	
	
	



}