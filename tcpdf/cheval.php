<?php
//archives
require('tcpdf.php');
class cheval extends TCPDF
{ 
     public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="cheval";   
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	
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
	//*********************************************************************************************************************//
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
		$this->Cell(190,6,'الجمهورية الجزائرية الديمقراطية الشعبية',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'République Algérienne Démocratique et Populaire',0,1,'C');
		$this->Cell(190,6,'وزارة الفلاحة و التنمية الريفية ',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,"MINISTERE DE L'AGRICULTURE ET DU DEVELOPPEMENT RURAL",0,1,'C');
		$this->Cell(190,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
		$this->Cell(190,6,'Office National de Développement des Elevages  Equins et Camélins',0,1,'C');
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
		$file = '../public/images/'.$id.'.jpg';
		if (file_exists($file))
		{
		$this->Image('../public/images/'.$id.'.jpg', $x=2, $y=20, $w=210, $h=125, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
		}
		else
		{
		$this->Image('../public/images/ch.jpg', $x=2, $y=20, $w=210, $h=125, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
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
		
		$this->Output();
		}	
	}
	
	
	
	
	
	//*********************************************************************************************************************//
	function racesregistre($raceequin) 
	{
	if ($raceequin=='2')
	{
	$this->SetFillColor(255, 228, 225);
	// $this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	// $this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	// $this->SetFillColor(0, 0, 0);
	}

	if ($raceequin=='3')
	{
	$this->SetFillColor(255, 255, 255);
	// $this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	// $this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	// $this->SetFillColor(0, 0, 0);
	}
	if ($raceequin=='4')
	{
	$this->SetFillColor(152 ,251 ,152);
	// $this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	// $this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	// $this->SetFillColor(0, 0, 0);
	}
	if ($raceequin=='6')
	{
	$this->SetFillColor(135 ,206 ,235);
	// $this->RoundedRect(5, 1, 200, 5, 2.50, '1111', 'DF');
	// $this->RoundedRect(5, 291, 200, 5, 2.50, '1111', 'DF');
	// $this->SetFillColor(0, 0, 0);
	}
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
		 
			$queryvac1 = "select DISTINCT NomP,wil,com,adresse,COUNT(NomP) as nbr  from cheval where wil=$resultvac->IDWIL    GROUP BY  NomP ";
			$resultat1 = mysql_query($queryvac1);
			$num_rows1 = mysql_num_rows($resultat1);
			//if ($num_rows1 > 0) {
			
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,$num_rows1.' éleveurs ',0,1,'L',0);
			while($resultvac1=mysql_fetch_object($resultat1))
			{
			$this->SetXY(15,$this->GetY());$this->Cell(55,5,trim($resultvac1->NomP),0,1,'L',0);
			$this->SetXY(70,$this->GetY()-5);$this->Cell(50,5,'Commune : '.$this->nbrtostringv('com','IDCOM',$resultvac1->com,'COMMUNE'),0,1,'L',0);
			$this->SetXY(125,$this->GetY()-5);$this->Cell(50,5,'Adresse : '.$resultvac1->adresse,0,1,'L',0);
			$this->SetXY(172,$this->GetY()-5);$this->Cell(10,5,'Equidées  : ',0,1,'L',0);
			$this->SetFillColor(248, 248, 255);
			$this->SetXY(190,$this->GetY()-4);$this->Cell(10,3,$resultvac1->nbr,0,1,'C',1,0,'');
			$this->SetFillColor(0, 0, 0);
			}
		//} 	
	}
   $this->SetXY(50,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
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
		 
			$queryvac1 = "select DISTINCT NomP,wil,com,adresse,COUNT(NomP) as nbr  from cheval where wil=$resultvac->IDWIL    GROUP BY  NomP ";
			$resultat1 = mysql_query($queryvac1);
			$num_rows1 = mysql_num_rows($resultat1);
			//if ($num_rows1 > 0) {
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,'',0,1,'L',0);
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,' ____________________________________________________________________________________________________ ',0,1,'L',0);
            $this->SetXY(15,$this->GetY());$this->Cell(190,5,'',0,1,'L',0);
			while($resultvac1=mysql_fetch_object($resultat1))
			{
			$this->SetXY(15,$this->GetY());$this->Cell(55,5,trim($resultvac1->NomP),0,1,'L',0);
			$this->SetXY(70,$this->GetY()-5);$this->Cell(50,5,'Commune : '.$this->nbrtostringv('com','IDCOM',$resultvac1->com,'COMMUNE'),0,1,'L',0);
			$this->SetXY(125,$this->GetY()-5);$this->Cell(50,5,'Adresse : '.$resultvac1->adresse,0,1,'L',0);
			$this->SetXY(172,$this->GetY()-5);$this->Cell(10,5,'Equidées  : ',0,1,'L',0);
			$this->SetFillColor(248, 248, 255);
			$this->SetXY(190,$this->GetY()-4);$this->Cell(10,3,$resultvac1->nbr,0,1,'C',1,0,'');
			$this->SetFillColor(0, 0, 0);
			}
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,' ____________________________________________________________________________________________________ ',0,1,'L',0);
			$this->SetXY(15,$this->GetY());$this->Cell(190,5,'',0,1,'L',0);
			$this->SetFillColor(248, 248, 255);
			$this->SetXY(10,$this->GetY());$this->Cell(190,5,$num_rows1.' éleveurs ',0,1,'C',1,0,'');
			$this->SetFillColor(0, 0, 0);
		//} 	
	}
   $this->SetXY(50,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
   $this->Output();
	}
	// function calcule($vac,$datejour1,$datejour2,$AVN,$avn)
	// {
	// $query_liste = "SELECT datevac,SUM($vac)as Qvac  FROM regvac where datevac >='$datejour1'and datevac <='$datejour2' and $AVN='$avn' ";
	// $requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL num?: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	// $row = mysql_fetch_array($requete); 
	// $Qvac=$row['Qvac'];
	// mysql_free_result($requete);
	// return $Qvac;
	// }
	
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
	
	
	
	
	function Regsigna ($datejour1,$datejour2,$station)
	{
	$this->SetHeaderMargin(2);
	$this->SetFooterMargin(6);
	$this->setTitle('Registre signalement');
	$this->AddPage('L','A4');
	//$this->setRTL(true); 
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->entetel();	
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
	// $this->SetXY(40,$this->GetY()-10);$this->Cell(40,10,trim($resultvac->NomP),1,1,'L',0);
	$this->SetXY(80,$this->GetY()-10);$this->Cell(35,10,trim($resultvac->NomA),1,1,'L',0);$this->racesregistre($resultvac->Race); 
	$this->SetXY(115,$this->GetY()-10);$this->Cell(30,10,$this->nbrtostring('race','id',trim($resultvac->Race),'race'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(145,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostring('robe','id',trim($resultvac->Nobo),'robe'),1,1,'L',0);
	$this->SetXY(170,$this->GetY()-10);$this->Cell(10,10,substr($this->dateUS2FR(trim($resultvac->Dns)),6,4),1,1,'C',0);
	$this->SetXY(180,$this->GetY()-10);$this->Cell(25,10,trim($resultvac->N),1,1,'C',0);
	$this->SetXY(205,$this->GetY()-10);$this->Cell(27,10,trim($resultvac->Pere),1,1,'L',0);
	$this->SetXY(232,$this->GetY()-10);$this->Cell(27,10,trim($resultvac->mere),1,1,'L',0);
	$this->SetXY(259,$this->GetY()-10);$this->Cell(12,10,trim($resultvac->Sexe),1,1,'C',0);
	// $this->SetXY(271,$this->GetY()-10);$this->Cell(15,10,trim($resultvac->Taille),1,1,'C',0);
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
	$this->entetel();

	$this->SetXY(10,80);$this->Cell(276,6,'Registre des saillies Station  de monte : '.$this->nbrtostring('station','id',trim($station),'station'),1,1,'C');
	$this->SetFillColor(240);
	$this->SetXY(10,96);$this->Cell(276,10,'Registre des saillies du '.$this->dateUS2FR($datejour1).' au '.$this->dateUS2FR($datejour2),1,1,1,'L');
	$this->SetXY(10,106);$this->Cell(10,12,'N°',1,1,1,'C');
	$this->SetXY(20,106);$this->Cell(20,12,'Date saillie',1,1,1,'C');
	$this->SetXY(40,106);$this->Cell(50,12,'Etalon',1,1,1,'C');
	$this->SetXY(90,106);$this->Cell(50,12,'Race',1,1,1,'C');
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
	$this->SetXY(90,$this->GetY()-10);$this->Cell(50,10,$this->nbrtostring('race','id',$this->nbrtostring('cheval','id',trim($resultvac->idcheval),'Race'),'race'),1,1,'L',0);
	$this->racesregistre($this->nbrtostring('cheval','id',trim($resultvac->jument),'Race')); 
	$this->SetXY(120,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostring('cheval','id',trim($resultvac->jument),'NomA'),1,1,'L',1,0);$this->SetFillColor(0, 0, 0);
	$this->SetXY(145,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostring('robe','id',$this->nbrtostring('cheval','id',trim($resultvac->jument),'Nobo'),'robe'),1,1,'L',0);
	$this->SetXY(170,$this->GetY()-10);$this->Cell(10,10,substr($this->dateUS2FR($this->nbrtostring('cheval','id',trim($resultvac->jument),'Dns')),6,4),1,1,'C',0);
	$this->SetXY(180,$this->GetY()-10);$this->Cell(25,10,$this->nbrtostring('cheval','id',trim($resultvac->jument),'N'),1,1,'C',0);
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
	
	
	
	// $this->SetXY(271,$this->GetY()-10);$this->Cell(15,10,trim($resultvac->Resultas),1,1,'C',0);
	}
	$this->SetFillColor(240);
	$this->SetXY(10,$this->GetY());$this->Cell(276,10,'Nombre des saillies : '.$num_rows,1,1,1,'L');
	$this->SetFillColor(255, 255, 255);
	$this->SetXY(100,$this->GetY()+5);$this->Cell(195,10,"Le Responssable de la Station de monte ",0,1,'C',0); 
	//$this->SetY(-10);$this->SetFont('helvetica', 'I', 8);$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	$this->Output();
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
	$this->Cell(190,6,'الجمهورية الجزائرية الديمقراطية الشعبية',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'République Algérienne Démocratique et Populaire',0,1,'C');
	$this->Cell(190,6,'وزارة الفلاحة و التنمية الريفية ',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL',0,1,'C');
	$this->Cell(190,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'Office national de développement des élevages  équins et camélins',0,1,'C');
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
	$this->Cell(190,6,'الجمهورية الجزائرية الديمقراطية الشعبية',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'République Algérienne Démocratique et Populaire',0,1,'C');
	$this->Cell(190,6,'وزارة الفلاحة و التنمية الريفية ',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL',0,1,'C');
	$this->Cell(190,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'Office national de développement des élevages  équins et camélins',0,1,'C');
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
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,'Propriétaire : '.trim($resultvac->NomP).' - '.$this->nbrtostring('wil','IDWIL',trim($resultvac->wil),'WILAYAS'),0,1,'L',0);
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,$this->nbrtostring('robe','id',trim($resultvac->Nobo),'robe').','."né le : ".substr($this->dateUS2FR(trim($resultvac->Dns)),0,10).', Insccrit à titre initial sous le numéro : '.trim($resultvac->N),0,1,'L',0);
		} 
		else 
		{
		$this->SetFont('aefurat', 'B', 12);$this->SetFillColor(248, 248, 255);
		$this->SetXY(10,$this->GetY()+10);$this->Cell(190,5,trim($resultvac->NomA),0,1,'L',1,0,'');$this->SetFillColor(0, 0, 0);
		$this->SetFont('aefurat', '', 10);
		$this->SetXY(10,$this->GetY());$this->Cell(190,5,'Propriétaire : '.trim($resultvac->NomP).' - '.$this->nbrtostring('wil','IDWIL',trim($resultvac->wil),'WILAYAS'),0,1,'L',0);
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
	//*************************************************************************************************************************//
	function entete() 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetXY(10,5);
	$this->Cell(275,6,'الجمهورية الجزائرية الديمقراطية الشعبية',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,'République Algérienne Démocratique et Populaire',0,1,'C');
	$this->Cell(275,6,'وزارة الفلاحة و التنمية الريفية ',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,'MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL',0,1,'C');
	$this->Cell(275,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,'Office National de Développement des Elevages  Equins et Camélins',0,1,'C');//
	$this->Image('logoof.png', $x=20, $y=20, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
    
	
	
	function entetep1($titre) 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->SetXY(10,10);
	$this->Cell(190,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'Office national de développement des élevages  équins et camélins',0,1,'C');
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
	
	
	
    function entetel() 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetXY(10,5);
	$this->Cell(275,6,'الجمهورية الجزائرية الديمقراطية الشعبية',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,'République Algérienne Démocratique et Populaire',0,1,'C');
	$this->Cell(275,6,'وزارة الفلاحة و التنمية الريفية ',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,'MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL',0,1,'C');
	$this->Cell(275,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(275,6,'Office National de Développement des Elevages  Equins et Camélins',0,1,'C');//
	$this->Image('logoof.png', $x=120, $y=45, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
	
	function entetex($titre) 
	{
	$this->SetDisplayMode('fullpage','single');//mode d affichage 
	$this->SetFont('dejavusans', '', 12);
	$this->SetXY(10,10);
	$this->Cell(190,6,'الديوان الوطني لتربية الخيول و الإبل',0,1,'C');$this->SetFont('aefurat', '', 12);
	$this->Cell(190,6,'Office national de développement des élevages  équins et camélins',0,1,'C');
	$this->Image('logoof.png', $x=10, $y=10, $w=41-15, $h=25-15, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,40);$this->Cell(190,12,$titre,0,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);
	}
	
	
  //************************************************************************************************************************//
    function catrace($datejour1,$datejour2,$Race,$Sexe,$cat)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval WHERE  Datesigna BETWEEN '$datejour1' AND '$datejour2'  and   Race='$Race' and Sexe='$Sexe' and   secteur='$cat'   ";
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function catracet($datejour1,$datejour2,$Race,$Sexe,$cat)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval WHERE  Datesigna BETWEEN '$datejour1' AND '$datejour2'  and   Race='$Race' and Sexe='$Sexe' ";
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
	
	//************************************************************************************************************************//

	function regrace($datejour1,$datejour2,$Race,$Sexe,$reg)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval WHERE  Datesigna BETWEEN '$datejour1' AND '$datejour2'  and  Race='$Race' and Sexe='$Sexe' and region='$reg' ";
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

    //************************************************************************************************************************//

	
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
	function equinpr($region,$datejour1,$datejour2) 
	{
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,70);$this->Cell(190,6,'Region : '.$this->nbrtostring('region','id',$region,'region'),1,1,'L',1,0,'');
	$this->SetXY(10,106-30);$this->Cell(40,6,'Station',1,1,'L',1,0,''); 
	$this->SetXY(50,106-30);$this->Cell(40,6,'Nom Produit',1,1,'C',1,0,'');
	$this->SetXY(90,106-30);$this->Cell(40,6,'Race',1,1,'C',1,0,'');
	$this->SetXY(130,106-30);$this->Cell(20,6,'Age',1,1,'C',1,0,'');
	$this->SetXY(150,106-30);$this->Cell(25,6,'Affectation',1,1,'C',1,0,'');
	$this->SetXY(175,106-30);$this->Cell(25,6,'Secteur',1,1,'C',1,0,'');
	$this->mysqlconnect();
	$queryvac = "select * from cheval where region='$region'  and  Dns BETWEEN '$datejour1' AND '$datejour2'    ORDER BY station,secteur ";
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
    //************************************************************************************************************************//
	
	function jser($datejour1,$datejour2,$Race,$secteur)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM saillie INNER JOIN cheval WHERE saillie.idcheval = cheval.id  and cheval.Race=$Race and  cheval.secteur=$secteur  ";  //
	
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function jsert($datejour1,$datejour2,$Race,$secteur)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM saillie INNER JOIN cheval WHERE saillie.idcheval = cheval.id  and cheval.Race=$Race ";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
    function jse($datejour1,$datejour2) 
	{ 
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,100);$this->Cell(190,6,"A / Repartition du nombre de juments saillies par race d'etalon et par categorie ",1,1,'L',1,0,'');
	$this->SetXY(10,106);$this->Cell(25,12,'Categorie',1,1,'L',1,0,''); $this->SetXY(35,106);$this->Cell(165,6,'Race',1,1,'C',1,0,'');
 
	$this->SetXY(35,112);$this->Cell(20,6,'AR',1,1,'C',1,0,'');
	$this->SetXY(55,112);$this->Cell(20,6,'PS',1,1,'C',1,0,'');
	$this->SetXY(75,112);$this->Cell(20,6,'BE',1,1,'C',1,0,'');
	$this->SetXY(95,112);$this->Cell(20,6,'AR-BE',1,1,'C',1,0,'');
	$this->SetXY(115,112);$this->Cell(20,6,'TI',1,1,'C',1,0,'');
	$this->SetXY(135,112);$this->Cell(20,6,'TROTT',1,1,'C',1,0,'');
	$this->SetXY(155,112);$this->Cell(20,6,'ASINS',1,1,'C',1,0,'');
	$this->SetXY(175,112);$this->Cell(25,6,'Total',1,1,'C',1,0,'');
	
	$ae=$this->jser($datejour1,$datejour2,2,1);
	$be=$this->jser($datejour1,$datejour2,3,1);
	$ce=$this->jser($datejour1,$datejour2,6,1);
	$de=$this->jser($datejour1,$datejour2,4,1);
	$ee=$this->jser($datejour1,$datejour2,1,1);
	$fe=$this->jser($datejour1,$datejour2,1,1);
	$ge=$this->jser($datejour1,$datejour2,1,1);
	$te=$ae+$be+$ce+$de+$ee+$fe+$ge;if ($te==0) {$tec=1;} else {$tec=$ae+$be+$ce+$de+$ee+$fe+$ge;}
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Nationaux',1,1,'L',1,0,'');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,$ae,1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,$be,1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,$ce,1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,$de,1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,$ee,1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,$fe,1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,$ge,1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,$te,1,1,'C',1,0,'');
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Pourcentage',1,1,'L',1,0,'');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,round(($ae/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,round(($be/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,round(($ce/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,round(($de/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,round(($ee/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,round(($fe/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,round(($ge/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,round(($te/$tec)*100,2).'%',1,1,'C',1,0,'');
	
	$ap=$this->jser($datejour1,$datejour2,2,0);
	$bp=$this->jser($datejour1,$datejour2,3,0);
	$cp=$this->jser($datejour1,$datejour2,6,0);
	$dp=$this->jser($datejour1,$datejour2,4,0);
	$ep=$this->jser($datejour1,$datejour2,1,0);
	$fp=$this->jser($datejour1,$datejour2,1,0);
	$gp=$this->jser($datejour1,$datejour2,1,0);
	$tp=$ap+$bp+$cp+$dp+$ep+$fp+$gp;if ($tp==0) {$tpc=1;} else {$tpc=$ap+$bp+$cp+$dp+$ep+$fp+$gp;} 
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Privés',1,1,'L',1,0,'');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,$ap,1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,$bp,1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,$cp,1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,$dp,1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,$ep,1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,$fp,1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,$gp,1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,$tp,1,1,'C',1,0,'');
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Pourcentage',1,1,'L',1,0,'');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,round(($ap/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,round(($bp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,round(($cp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,round(($dp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,round(($ep/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,round(($fp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,round(($gp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,round(($tp/$tpc)*100,2).'%',1,1,'C',1,0,'');
	
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Total',1,1,'L',1,0,'');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,$ae+$ap,1,1,'C',1,0,'');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,$be+$bp,1,1,'C',1,0,'');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,$ce+$cp,1,1,'C',1,0,'');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,$de+$dp,1,1,'C',1,0,'');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,$ee+$ep,1,1,'C',1,0,'');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,$fe+$fp,1,1,'C',1,0,'');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,$ge+$gp,1,1,'C',1,0,'');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,$te+$tp,1,1,'C',1,0,'');
	$this->SetFillColor(0, 0, 0);
	}
	
	
	function jseyy($datejour1,$datejour2,$Race,$reg)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM saillie INNER JOIN cheval WHERE saillie.idcheval = cheval.id  and cheval.Race=$Race  and cheval.region=$reg ";  //
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
	function jsey($datejour1,$datejour2) 
	{ 
	$this->SetFillColor(248, 248, 255);
	$this->SetXY(10,160);$this->Cell(190,6,"B / Repartition du nombre de juments saillies par race d'etalon et par et par région ",1,1,'L',1,0,'');
	$this->SetXY(10,166);$this->Cell(20,12,'Région',1,1,'L',1,0,'');  $this->SetXY(30,166);$this->Cell(170,6,'Race',1,1,'C',1,0,'');
	  
	$this->SetXY(30,172);$this->Cell(20,6,'AR',1,1,'C',1,0,'');
	$this->SetXY(50,172);$this->Cell(20,6,'PS',1,1,'C',1,0,'');
	$this->SetXY(70,172);$this->Cell(20,6,'BE',1,1,'C',1,0,'');
	$this->SetXY(90,172);$this->Cell(20,6,'AR-BE',1,1,'C',1,0,'');
	$this->SetXY(110,172);$this->Cell(20,6,'TI',1,1,'C',1,0,'');
	$this->SetXY(130,172);$this->Cell(20,6,'TROTT',1,1,'C',1,0,'');
	$this->SetXY(150,172);$this->Cell(20,6,'ASINS',1,1,'C',1,0,'');
	$this->SetXY(170,172);$this->Cell(30,6,'Total',1,1,'C',1,0,'');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Tiaret',1,1,'L',1,0,'');  
	$a2=$this->jseyy($datejour1,$datejour2,2,2);
	$b2=$this->jseyy($datejour1,$datejour2,3,2);
	$c2=$this->jseyy($datejour1,$datejour2,6,2);
	$d2=$this->jseyy($datejour1,$datejour2,4,2);
	$e2=$this->jseyy($datejour1,$datejour2,1,2);
	$f2=$this->jseyy($datejour1,$datejour2,1,2);
	$g2=$this->jseyy($datejour1,$datejour2,1,2);
	$t2=$a2+$b2+$c2+$d2+$e2+$f2+$g2;if ($t2==0) {$t2c=1;} else {$t2c=$a2+$b2+$c2+$d2+$e2+$f2+$g2;} 
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a2,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b2,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c2,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d2,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e2,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f2,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g2,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t2,1,1,'C',1,0,'');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Oran',1,1,'L',1,0,'');
    $a4=$this->jseyy($datejour1,$datejour2,2,4);
	$b4=$this->jseyy($datejour1,$datejour2,3,4);
	$c4=$this->jseyy($datejour1,$datejour2,6,4);
	$d4=$this->jseyy($datejour1,$datejour2,4,4);
	$e4=$this->jseyy($datejour1,$datejour2,1,4);
	$f4=$this->jseyy($datejour1,$datejour2,1,4);
	$g4=$this->jseyy($datejour1,$datejour2,1,4);
	$t4=$a4+$b4+$c4+$d4+$e4+$f4+$g4;if ($t4==0) {$t4c=1;} else {$t4c=$a4+$b4+$c4+$d4+$e4+$f4+$g4;} 
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a4,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b4,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c4,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d4,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e4,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f4,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g4,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t4,1,1,'C',1,0,'');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Constantine',1,1,'L',1,0,'');  
	$a3=$this->jseyy($datejour1,$datejour2,2,3);
	$b3=$this->jseyy($datejour1,$datejour2,3,3);
	$c3=$this->jseyy($datejour1,$datejour2,6,3);
	$d3=$this->jseyy($datejour1,$datejour2,4,3);
	$e3=$this->jseyy($datejour1,$datejour2,1,3);
	$f3=$this->jseyy($datejour1,$datejour2,1,3);
	$g3=$this->jseyy($datejour1,$datejour2,1,3);
	$t3=$a3+$b3+$c3+$d3+$e3+$f3+$g3;if ($t3==0) {$t3c=1;} else {$t3c=$a3+$b3+$c3+$d3+$e3+$f3+$g3;} 
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a3,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b3,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c3,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d3,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e3,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f3,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g3,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t3,1,1,'C',1,0,'');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Total',1,1,'L',1,0,'');  
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a2+$a3+$a4,1,1,'C',1,0,'');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b2+$b3+$b4,1,1,'C',1,0,'');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c2+$c3+$c4,1,1,'C',1,0,'');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d2+$d3+$d4,1,1,'C',1,0,'');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e2+$e3+$e4,1,1,'C',1,0,'');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f2+$f3+$f4,1,1,'C',1,0,'');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g2+$g3+$g4,1,1,'C',1,0,'');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t2+$t3+$t4,1,1,'C',1,0,'');
    $this->SetFillColor(0, 0, 0);
	}
//**********************************************************************************************************************************//
    function nbrproduit($datejour1,$datejour2,$Race,$secteur)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval where  ( Dns BETWEEN '$datejour1' AND '$datejour2') and  Race=$Race  and secteur=$secteur ";  //Dns    saillie INNER JOIN cheval WHERE saillie.idcheval = cheval.id  and cheval.Race=$Race and  cheval.secteur=$secteur
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
    function produit($datejour1,$datejour2) 
	{ 
	
	$this->SetXY(10,100);$this->Cell(190,6,"A / Repartition du nombre de produits déclarés par race et par categorie ",1,1,'L');
	$this->SetXY(10,106);$this->Cell(25,6,'',1,1,'L'); $this->SetXY(35,106);$this->Cell(165,6,'Race',1,1,'C');
	$this->SetXY(10,112);$this->Cell(25,6,'Categorie',1,1,'L');  
	$this->SetXY(35,112);$this->Cell(20,6,'AR',1,1,'C');
	$this->SetXY(55,112);$this->Cell(20,6,'PS',1,1,'C');
	$this->SetXY(75,112);$this->Cell(20,6,'BE',1,1,'C');
	$this->SetXY(95,112);$this->Cell(20,6,'AR-BE',1,1,'C');
	$this->SetXY(115,112);$this->Cell(20,6,'TI',1,1,'C');
	$this->SetXY(135,112);$this->Cell(20,6,'TROTT',1,1,'C');
	$this->SetXY(155,112);$this->Cell(20,6,'ASINS',1,1,'C');
	$this->SetXY(175,112);$this->Cell(25,6,'Total',1,1,'C');
	
	$ae=$this->nbrproduit($datejour1,$datejour2,2,1);
	$be=$this->nbrproduit($datejour1,$datejour2,3,1);
	$ce=$this->nbrproduit($datejour1,$datejour2,6,1);
	$de=$this->nbrproduit($datejour1,$datejour2,4,1);
	$ee=$this->nbrproduit($datejour1,$datejour2,1,1);
	$fe=$this->nbrproduit($datejour1,$datejour2,1,1);
	$ge=$this->nbrproduit($datejour1,$datejour2,1,1);
	$te=$ae+$be+$ce+$de+$ee+$fe+$ge;if ($te==0) {$tec=1;} else {$tec=$ae+$be+$ce+$de+$ee+$fe+$ge;}
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Nationaux',1,1,'L');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,$ae,1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,$be,1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,$ce,1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,$de,1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,$ee,1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,$fe,1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,$ge,1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,$te,1,1,'C');
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Pourcentage',1,1,'L');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,round(($ae/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,round(($be/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,round(($ce/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,round(($de/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,round(($ee/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,round(($fe/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,round(($ge/$tec)*100,2).'%',1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,round(($te/$tec)*100,2).'%',1,1,'C');
	
	$ap=$this->nbrproduit($datejour1,$datejour2,2,0);
	$bp=$this->nbrproduit($datejour1,$datejour2,3,0);
	$cp=$this->nbrproduit($datejour1,$datejour2,6,0);
	$dp=$this->nbrproduit($datejour1,$datejour2,4,0);
	$ep=$this->nbrproduit($datejour1,$datejour2,1,0);
	$fp=$this->nbrproduit($datejour1,$datejour2,1,0);
	$gp=$this->nbrproduit($datejour1,$datejour2,1,0);
	$tp=$ap+$bp+$cp+$dp+$ep+$fp+$gp;if ($tp==0) {$tpc=1;} else {$tpc=$ap+$bp+$cp+$dp+$ep+$fp+$gp;} 
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Privés',1,1,'L');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,$ap,1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,$bp,1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,$cp,1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,$dp,1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,$ep,1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,$fp,1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,$gp,1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,$tp,1,1,'C');
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Pourcentage',1,1,'L');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,round(($ap/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,round(($bp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,round(($cp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,round(($dp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,round(($ep/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,round(($fp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,round(($gp/$tpc)*100,2).'%',1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,round(($tp/$tpc)*100,2).'%',1,1,'C');
	
	$this->SetXY(10,$this->GetY());$this->Cell(25,6,'Total',1,1,'L');  
	$this->SetXY(35,$this->GetY()-6);$this->Cell(20,6,$ae+$ap,1,1,'C');
	$this->SetXY(55,$this->GetY()-6);$this->Cell(20,6,$be+$bp,1,1,'C');
	$this->SetXY(75,$this->GetY()-6);$this->Cell(20,6,$ce+$cp,1,1,'C');
	$this->SetXY(95,$this->GetY()-6);$this->Cell(20,6,$de+$dp,1,1,'C');
	$this->SetXY(115,$this->GetY()-6);$this->Cell(20,6,$ee+$ep,1,1,'C');
	$this->SetXY(135,$this->GetY()-6);$this->Cell(20,6,$fe+$fp,1,1,'C');
	$this->SetXY(155,$this->GetY()-6);$this->Cell(20,6,$ge+$gp,1,1,'C');
	$this->SetXY(175,$this->GetY()-6);$this->Cell(25,6,$te+$tp,1,1,'C');
	}
    function nbrproduitreg($datejour1,$datejour2,$Race,$reg)
	{
	$this->mysqlconnect();
	$query_liste = "SELECT * FROM cheval where  ( Dns BETWEEN '$datejour1' AND '$datejour2') and  Race=$Race  and region=$reg ";  
	$requete = mysql_query( $query_liste ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
	$totalmbr1=mysql_num_rows($requete);
	return $totalmbr1;
	}
    function produitreg($datejour1,$datejour2) 
	{ 
	$this->SetXY(10,160);$this->Cell(190,6,"B / Repartition du nombre de produits déclarés par race et par région ",1,1,'L');
	$this->SetXY(10,166);$this->Cell(20,6,'',1,1,'L');  $this->SetXY(30,166);$this->Cell(170,6,'Race',1,1,'C');
	$this->SetXY(10,172);$this->Cell(20,6,'Région',1,1,'L');  
	$this->SetXY(30,172);$this->Cell(20,6,'AR',1,1,'C');
	$this->SetXY(50,172);$this->Cell(20,6,'PS',1,1,'C');
	$this->SetXY(70,172);$this->Cell(20,6,'BE',1,1,'C');
	$this->SetXY(90,172);$this->Cell(20,6,'AR-BE',1,1,'C');
	$this->SetXY(110,172);$this->Cell(20,6,'TI',1,1,'C');
	$this->SetXY(130,172);$this->Cell(20,6,'TROTT',1,1,'C');
	$this->SetXY(150,172);$this->Cell(20,6,'ASINS',1,1,'C');
	$this->SetXY(170,172);$this->Cell(30,6,'Total',1,1,'C');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Tiaret',1,1,'L');  
	$a2=$this->nbrproduitreg($datejour1,$datejour2,2,2);
	$b2=$this->nbrproduitreg($datejour1,$datejour2,3,2);
	$c2=$this->nbrproduitreg($datejour1,$datejour2,6,2);
	$d2=$this->nbrproduitreg($datejour1,$datejour2,4,2);
	$e2=$this->nbrproduitreg($datejour1,$datejour2,1,2);
	$f2=$this->nbrproduitreg($datejour1,$datejour2,1,2);
	$g2=$this->nbrproduitreg($datejour1,$datejour2,1,2);
	$t2=$a2+$b2+$c2+$d2+$e2+$f2+$g2;if ($t2==0) {$t2c=1;} else {$t2c=$a2+$b2+$c2+$d2+$e2+$f2+$g2;} 
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a2,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b2,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c2,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d2,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e2,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f2,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g2,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t2,1,1,'C');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Oran',1,1,'L');
    $a4=$this->nbrproduitreg($datejour1,$datejour2,2,4);
	$b4=$this->nbrproduitreg($datejour1,$datejour2,3,4);
	$c4=$this->nbrproduitreg($datejour1,$datejour2,6,4);
	$d4=$this->nbrproduitreg($datejour1,$datejour2,4,4);
	$e4=$this->nbrproduitreg($datejour1,$datejour2,1,4);
	$f4=$this->nbrproduitreg($datejour1,$datejour2,1,4);
	$g4=$this->nbrproduitreg($datejour1,$datejour2,1,4);
	$t4=$a4+$b4+$c4+$d4+$e4+$f4+$g4;if ($t4==0) {$t4c=1;} else {$t4c=$a4+$b4+$c4+$d4+$e4+$f4+$g4;} 
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a4,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b4,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c4,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d4,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e4,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f4,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g4,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t4,1,1,'C');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Constantine',1,1,'L');  
	$a3=$this->nbrproduitreg($datejour1,$datejour2,2,3);
	$b3=$this->nbrproduitreg($datejour1,$datejour2,3,3);
	$c3=$this->nbrproduitreg($datejour1,$datejour2,6,3);
	$d3=$this->nbrproduitreg($datejour1,$datejour2,4,3);
	$e3=$this->nbrproduitreg($datejour1,$datejour2,1,3);
	$f3=$this->nbrproduitreg($datejour1,$datejour2,1,3);
	$g3=$this->nbrproduitreg($datejour1,$datejour2,1,3);
	$t3=$a3+$b3+$c3+$d3+$e3+$f3+$g3;if ($t3==0) {$t3c=1;} else {$t3c=$a3+$b3+$c3+$d3+$e3+$f3+$g3;} 
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a3,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b3,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c3,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d3,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e3,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f3,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g3,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t3,1,1,'C');

	$this->SetXY(10,$this->GetY());$this->Cell(20,6,'Total',1,1,'L');  
	$this->SetXY(30,$this->GetY()-6);$this->Cell(20,6,$a2+$a3+$a4,1,1,'C');
	$this->SetXY(50,$this->GetY()-6);$this->Cell(20,6,$b2+$b3+$b4,1,1,'C');
	$this->SetXY(70,$this->GetY()-6);$this->Cell(20,6,$c2+$c3+$c4,1,1,'C');
	$this->SetXY(90,$this->GetY()-6);$this->Cell(20,6,$d2+$d3+$d4,1,1,'C');
	$this->SetXY(110,$this->GetY()-6);$this->Cell(20,6,$e2+$e3+$e4,1,1,'C');
	$this->SetXY(130,$this->GetY()-6);$this->Cell(20,6,$f2+$f3+$f4,1,1,'C');
	$this->SetXY(150,$this->GetY()-6);$this->Cell(20,6,$g2+$g3+$g4,1,1,'C');
	$this->SetXY(170,$this->GetY()-6);$this->Cell(30,6,$t2+$t3+$t4,1,1,'C');
    }





//**********************************************************************************************************************************//

   function pie2($data)
    {
	$xc=$data['x'];
	$yc=$data['y'];
	$r=$data['r'];
	if ($data['v1']+$data['v2'] > 0){$tot=$data['v1']+$data['v2'];}else {$tot=1;}
	$p1=round($data['v1']*100/$tot,2);
	$p2=round($data['v2']*100/$tot,2);
	$a1=$p1*3.6;
	$a2=$a1+($p2*3.6);
	$this->SetFont('helvetica', 'BIU', 11);
	$this->SetXY($xc-20,$yc-25);$this->Cell(0, 5,$data['t0'] ,0, 2, 'L');
	//$this->RoundedRect($xc-20,$yc-25, 90, 45, 2, $style = '');
	$this->SetFont('helvetica', 'B', 11);
	$this->SetFillColor(120,120,255);$this->Sector($xc,$yc,$r,0,$a1);
	$this->SetXY($xc+25,$yc-15);$this->cell(10,5,'',1,0,'C',1,0);$this->cell(10,5,$data['t1'],1,0,'C',0,0);$this->cell(20,5,$p1.'%',1,0,'C',0,0);
	$this->SetFillColor(120,255,120);$this->Sector($xc,$yc,$r,$a1,$a2);
	$this->SetXY($xc+25,$yc-5);$this->cell(10,5,'',1,0,'C',1,0);$this->cell(10,5,$data['t2'],1,0,'C',0,0);$this->cell(20,5,$p2.'%',1,0,'C',0,0);
	$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);//text noire
	$this->SetFont('helvetica', 'B', 11);
	}
    function barservice($x,$y,$a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o,$p,$q,$r,$s,$t,$titre)
    {
	$total=$a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l+$m+$n+$o+$p+$q+$r+$s+$t;
	$ap=round($a*100/$total,2);
	$bp=round($b*100/$total,2);
	$cp=round($c*100/$total,2);
	$dp=round($d*100/$total,2);
	$ep=round($e*100/$total,2);
	$fp=round($f*100/$total,2);
	$gp=round($g*100/$total,2);
	$hp=round($h*100/$total,2);
	$ip=round($i*100/$total,2);
	$jp=round($j*100/$total,2);
	$kp=round($k*100/$total,2);
	$lp=round($l*100/$total,2);
	$mp=round($m*100/$total,2);
	$np=round($n*100/$total,2);
	$op=round($o*100/$total,2);
	$pp=round($p*100/$total,2);
	$qp=round($q*100/$total,2);
	$rp=round($r*100/$total,2);
	$sp=round($s*100/$total,2);
	$tp=round($t*100/$total,2);
	$this->SetFont('helvetica', 'BIU', 11);
	$this->SetXY($x-20,$y-108);$this->Cell(0, 5,$titre ,0, 2, 'L');
	//$this->RoundedRect($x-20,$y-108, 90, 130, 2, $style = '');
	$this->SetFont('helvetica', 'B',08);
	$this->SetFillColor(120,255,120);
	$w=4.5;
	
	 
	
	$this->SetXY($x-20,$y+10);
	$this->cell($w,$ap,'',1,0,'C',1,0);        
	$this->cell($w,$bp,'',1,0,'C',1,0);
	$this->cell($w,$cp,'',1,0,'C',1,0);
	$this->cell($w,$dp,'',1,0,'C',1,0);
	$this->cell($w,$ep,'',1,0,'C',1,0);
	$this->cell($w,$fp,'',1,0,'C',1,0);
	$this->cell($w,$gp,'',1,0,'C',1,0);
	$this->cell($w,$hp,'',1,0,'C',1,0);
	$this->cell($w,$ip,'',1,0,'C',1,0);
	$this->cell($w,$jp,'',1,0,'C',1,0);
	$this->cell($w,$kp,'',1,0,'C',1,0);        
	$this->cell($w,$lp,'',1,0,'C',1,0);
	$this->cell($w,$mp,'',1,0,'C',1,0);
	$this->cell($w,$np,'',1,0,'C',1,0);
	$this->cell($w,$op,'',1,0,'C',1,0);
	$this->cell($w,$pp,'',1,0,'C',1,0);
	$this->cell($w,$qp,'',1,0,'C',1,0);
	$this->cell($w,$rp,'',1,0,'C',1,0);
	$this->cell($w,$sp,'',1,0,'C',1,0);
	$this->cell($w,$tp,'',1,0,'C',1,0);
	$this->SetXY($x-20,$y+12);    
	$this->cell($w,5,'1',1,0,'C',0,0);
	$this->cell($w,5,'2',1,0,'C',0,0);
	$this->cell($w,5,'3',1,0,'C',0,0);
	$this->cell($w,5,'4',1,0,'C',0,0);
	$this->cell($w,5,'5',1,0,'C',0,0);
	$this->cell($w,5,'6',1,0,'C',0,0);
	$this->cell($w,5,'7',1,0,'C',0,0);
	$this->cell($w,5,'8',1,0,'C',0,0);
	$this->cell($w,5,'9',1,0,'C',0,0);
	$this->cell($w,5,'10',1,0,'C',0,0);
	$this->cell($w,5,'11',1,0,'C',0,0);
	$this->cell($w,5,'12',1,0,'C',0,0);
	$this->cell($w,5,'13',1,0,'C',0,0);
	$this->cell($w,5,'14',1,0,'C',0,0);
	$this->cell($w,5,'15',1,0,'C',0,0);
	$this->cell($w,5,'16',1,0,'C',0,0);
	$this->cell($w,5,'17',1,0,'C',0,0);
	$this->cell($w,5,'18',1,0,'C',0,0);
	$this->cell($w,5,'19',1,0,'C',0,0);
	$this->cell($w,5,'20',1,0,'C',0,0);
	$this->SetFont('helvetica', 'B', 9);
	$this->SetXY(111,160-2.5);$this->cell(5,5,'00-',0,0,'C',0);
	$this->SetXY(111,150-2.5);$this->cell(5,5,'10-',0,0,'C',0);
	$this->SetXY(111,140-2.5);$this->cell(5,5,'20-',0,0,'C',0);
	$this->SetXY(111,130-2.5);$this->cell(5,5,'30-',0,0,'C',0);
	$this->SetXY(111,120-2.5);$this->cell(5,5,'40-',0,0,'C',0);
	$this->SetXY(111,110-2.5);$this->cell(5,5,'50-',0,0,'C',0);
	$this->SetXY(111,100-2.5);$this->cell(5,5,'60-',0,0,'C',0);
	$this->SetXY(111,90-2.5);$this->cell(5,5,'70-',0,0,'C',0);
	$this->SetXY(111,80-2.5);$this->cell(5,5,'80-',0,0,'C',0);
	$this->SetXY(111,70-2.5);$this->cell(5,5,'90-',0,0,'C',0);
	$this->SetXY(111,60-2.5);$this->cell(5,5,'100-',0,0,'C',0);
	$this->SetTextColor(255,0,0);
	$this->RotatedText($x-17.5,$y+10-$ap,'-'.$ap.'%',80);
	$this->RotatedText($x-17.5+5,$y+10-$bp,'-'.$bp.'%',80);
	$this->RotatedText($x-17.5+9,$y+10-$cp,'-'.$cp.'%',80);
	$this->RotatedText($x-17.5+14,$y+10-$dp,'-'.$dp.'%',80);
	$this->RotatedText($x-17.5+18.5,$y+10-$ep,'-'.$ep.'%',80);
	$this->RotatedText($x-17.5+23,$y+10-$fp,'-'.$fp.'%',80);
	$this->RotatedText($x-17.5+27,$y+10-$gp,'-'.$gp.'%',80);
	$this->RotatedText($x-17.5+32,$y+10-$hp,'-'.$hp.'%',80);
	$this->RotatedText($x-17.5+36.5,$y+10-$ip,'-'.$ip.'%',80);
	$this->RotatedText($x-17.5+41,$y+10-$jp,'-'.$jp.'%',80);
	$this->RotatedText($x-17.5+45.5,$y+10-$kp,'-'.$kp.'%',80);
	$this->RotatedText($x-17.5+49.5,$y+10-$lp,'-'.$lp.'%',80);
	$this->RotatedText($x-17.5+54,$y+10-$mp,'-'.$mp.'%',80);
	$this->RotatedText($x-17.5+59,$y+10-$np,'-'.$np.'%',80);
	$this->RotatedText($x-17.5+63,$y+10-$op,'-'.$op.'%',80);
	$this->RotatedText($x-17.5+68,$y+10-$pp,'-'.$pp.'%',80);
	$this->RotatedText($x-17.5+72.5,$y+10-$qp,'-'.$qp.'%',80);
	$this->RotatedText($x-17.5+77,$y+10-$rp,'-'.$rp.'%',80);
	$this->RotatedText($x-17.5+81.5,$y+10-$sp,'-'.$sp.'%',80);
	$this->RotatedText($x-17.5+85.5,$y+10-$tp,'-'.$tp.'%',80);
	$this->SetTextColor(0,0,0);
	$this->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$this->SetTextColor(0,0,0);//text noire
	$this->SetFont('helvetica', 'B', 11);
	}
	function nbrservicedinf($nbrservice,$datejour1,$datejour2,$eph)
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where DUREEHOSPIT <= $nbrservice  and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	function nbrserviced($nbrservice,$datejour1,$datejour2,$eph)
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where DUREEHOSPIT=$nbrservice  and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	function nbrservicedsup($nbrservice,$datejour1,$datejour2,$eph)
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where DUREEHOSPIT >= $nbrservice  and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	
	function nbrservicedsexe($sexe,$datejour1,$datejour2,$eph)
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where SEX = '$sexe'  and STRUCTURED $eph and (DINS BETWEEN '$datejour1' AND '$datejour2')";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$collecte=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $collecte;
	}
	function dureehospitalisation1($titre,$datejour1,$datejour2,$valeurs,$eph) 
	   { 
		$TA1=$this->nbrservicedinf(0,$datejour1,$datejour2,$eph);	
		$TA2=$this->nbrserviced(1,$datejour1,$datejour2,$eph);	
		$TA3=$this->nbrserviced(2,$datejour1,$datejour2,$eph);	
		$TA4=$this->nbrserviced(3,$datejour1,$datejour2,$eph);	
		$TA5=$this->nbrserviced(4,$datejour1,$datejour2,$eph);	
		$TA6=$this->nbrserviced(5,$datejour1,$datejour2,$eph);	
		$TA7=$this->nbrserviced(6,$datejour1,$datejour2,$eph);	
		$TA8=$this->nbrserviced(7,$datejour1,$datejour2,$eph);	
		$TA9=$this->nbrserviced(8,$datejour1,$datejour2,$eph);	
		$TA10=$this->nbrserviced(9,$datejour1,$datejour2,$eph);	
		$TA11=$this->nbrserviced(10,$datejour1,$datejour2,$eph);	
		$TA12=$this->nbrserviced(11,$datejour1,$datejour2,$eph);	
		$TA13=$this->nbrserviced(12,$datejour1,$datejour2,$eph);	
		$TA14=$this->nbrserviced(13,$datejour1,$datejour2,$eph);	
		$TA15=$this->nbrserviced(14,$datejour1,$datejour2,$eph);	
		$TA16=$this->nbrserviced(15,$datejour1,$datejour2,$eph);	
		$TA17=$this->nbrserviced(16,$datejour1,$datejour2,$eph);	
		$TA18=$this->nbrserviced(17,$datejour1,$datejour2,$eph);	
		$TA19=$this->nbrserviced(18,$datejour1,$datejour2,$eph);	
		$TA20=$this->nbrservicedsup(19,$datejour1,$datejour2,$eph);	
		$TA21=$TA1+$TA2+$TA3+$TA4+$TA5+$TA6+$TA7+$TA8+$TA9+$TA10+$TA11+$TA12+$TA13+$TA14+$TA15+$TA16+$TA17+$TA18+$TA19+$TA20;
		$datamf = array($TA1,$TA2,$TA3,$TA4,$TA5,$TA6,$TA7,$TA8,$TA9,$TA10,$TA11,$TA12,$TA13,$TA14,$TA15,$TA16,$TA17,$TA18,$TA19,$TA20);
		$this->SetXY(5,25+10);$this->cell(285,5,html_entity_decode(utf8_decode("Cette étude a porté sur ".$TA21." décès survenus durant la periode du ".$this->dateUS2FR($datejour1)." au ".$this->dateUS2FR($datejour2)." au niveau de 36 communes ")),0,0,'L',0);
		$this->SetFont('helvetica', 'B', 10);
		$this->SetXY(5,25);$this->cell(200,5,$titre,1,0,'C',1,0);
		$this->SetXY(5,35+7);$this->cell(105,5,html_entity_decode(utf8_decode("Repartition des deces par Durée D'hospitalisation ")),1,0,'L',1,0);
		$this->SetXY(5,35+7+5);$this->cell(60,5,"Nombre de jours",1,0,'C',1,0);                    $this->cell(20,5,"Nbr Deces",1,0,'C',1,0);$this->cell(25,5,"Tx %",1,0,'C',1,0);
		
		$this->SetXY(5,35+7+10);$this->cell(60,5,"0",1,0,'C',0);        $this->cell(20,5,$TA1,1,0,'C',0);         $this->cell(25,5,round(($TA1*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+15);$this->cell(60,5,"1",1,0,'C',0);        $this->cell(20,5,$TA2,1,0,'C',0);         $this->cell(25,5,round(($TA2*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+20);$this->cell(60,5,"2",1,0,'C',0);        $this->cell(20,5,$TA3,1,0,'C',0);         $this->cell(25,5,round(($TA3*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+25);$this->cell(60,5,"3",1,0,'C',0);        $this->cell(20,5,$TA4,1,0,'C',0);         $this->cell(25,5,round(($TA4*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+30);$this->cell(60,5,"4",1,0,'C',0);        $this->cell(20,5,$TA5,1,0,'C',0);         $this->cell(25,5,round(($TA5*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+35);$this->cell(60,5,"5",1,0,'C',0);        $this->cell(20,5,$TA6,1,0,'C',0);         $this->cell(25,5,round(($TA6*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+40);$this->cell(60,5,"6",1,0,'C',0);        $this->cell(20,5,$TA7,1,0,'C',0);         $this->cell(25,5,round(($TA7*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+45);$this->cell(60,5,"7",1,0,'C',0);        $this->cell(20,5,$TA8,1,0,'C',0);         $this->cell(25,5,round(($TA8*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+50);$this->cell(60,5,"8",1,0,'C',0);        $this->cell(20,5,$TA9,1,0,'C',0);         $this->cell(25,5,round(($TA9*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+55);$this->cell(60,5,"9",1,0,'C',0);       $this->cell(20,5,$TA10,1,0,'C',0);         $this->cell(25,5,round(($TA10*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+60);$this->cell(60,5,"10",1,0,'C',0);       $this->cell(20,5,$TA11,1,0,'C',0);         $this->cell(25,5,round(($TA11*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+65);$this->cell(60,5,"11",1,0,'C',0);       $this->cell(20,5,$TA12,1,0,'C',0);         $this->cell(25,5,round(($TA12*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+70);$this->cell(60,5,"12",1,0,'C',0);       $this->cell(20,5,$TA13,1,0,'C',0);         $this->cell(25,5,round(($TA13*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+75);$this->cell(60,5,"13",1,0,'C',0);       $this->cell(20,5,$TA14,1,0,'C',0);         $this->cell(25,5,round(($TA14*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+80);$this->cell(60,5,"14",1,0,'C',0);       $this->cell(20,5,$TA15,1,0,'C',0);         $this->cell(25,5,round(($TA15*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+85);$this->cell(60,5,"15",1,0,'C',0);       $this->cell(20,5,$TA16,1,0,'C',0);         $this->cell(25,5,round(($TA16*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+90);$this->cell(60,5,"16",1,0,'C',0);       $this->cell(20,5,$TA17,1,0,'C',0);         $this->cell(25,5,round(($TA17*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+95);$this->cell(60,5,"17",1,0,'C',0);       $this->cell(20,5,$TA18,1,0,'C',0);         $this->cell(25,5,round(($TA18*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+100);$this->cell(60,5,"18",1,0,'C',0);      $this->cell(20,5,$TA19,1,0,'C',0);         $this->cell(25,5,round(($TA19*100)/$TA21,2),1,0,'C',0);
		$this->SetXY(5,35+7+105);$this->cell(60,5,">=19",1,0,'C',0);     $this->cell(20,5,$TA20,1,0,'C',0);         $this->cell(25,5,round(($TA20*100)/$TA21,2),1,0,'C',0);
        $this->SetXY(5,35+7+110); $this->cell(60,5,"Total",1,0,'L',1,0);$this->cell(20,5,$TA21,1,0,'C',1,0);        $this->cell(25,5,round(($TA21*100)/$TA21,2),1,0,'C',1,0);						
		$mas=$this->nbrservicedsexe('M',$datejour1,$datejour2,$eph);
		$fem=$this->nbrservicedsexe('F',$datejour1,$datejour2,$eph);
		$pie2 = array(
		"x" => 135, 
		"y" => 200, 
		"r" => 17,
		"v1" =>$mas ,
		"v2" =>$fem ,
		"t0" => html_entity_decode(utf8_decode("Distribution des décès par sexe ")),
		"t1" => "M",
		"t2" => "F");
		$this->pie2($pie2);
		$this->SetXY(5,175+5);  $this->cell(285,5,html_entity_decode(utf8_decode("2-Répartition des décès par sexe : ")),0,0,'L',0);
	    $this->SetXY(5,175+10);$this->cell(285,5,html_entity_decode(utf8_decode("La répartition des ".$TA21." décès enregistrés montre que :")),0,0,'L',0);
	    $this->SetXY(5,175+15);$this->cell(285,5,html_entity_decode(utf8_decode(round(($mas/$TA21)*100,2)."% des décès touche les hommes. ")),0,0,'L',0);
	    $this->SetXY(5,175+20);$this->cell(285,5,html_entity_decode(utf8_decode(round(($fem/$TA21)*100,2)."% des décès touche les femmes. ")),0,0,'L',0);
	    if ($fem > 0){$fem=$fem;}else{$fem=1;}
	    $this->SetXY(5,175+25);$this->cell(285,5,html_entity_decode(utf8_decode("avec un sexe ratio de ".round(($mas/$fem),2))),0,0,'L',0);
		$this->SetXY(5,160);$this->cell(285,5,html_entity_decode(utf8_decode("1-Repartition des deces par Durée D'hospitalisation : ")),0,0,'L',0);
	    rsort($datamf);
	    $this->SetXY(5,165);$this->cell(285,5,html_entity_decode(utf8_decode("la proportion des décès la plus élevée est : ".round($datamf[0]*100/$TA21,2)."%")),0,0,'L',0);
	    sort($datamf);
	    $this->SetXY(5,170);$this->cell(285,5,html_entity_decode(utf8_decode("la proportion des décès la moins élevée est : ".round($datamf[0]*100/$TA21,2)."%")),0,0,'L',0);
		
		
		$this->barservice(135,150,$TA1,$TA2,$TA3,$TA4,$TA5,$TA6,$TA7,$TA8,$TA9,$TA10,$TA11,$TA12,$TA13,$TA14,$TA15,$TA16,$TA17,$TA18,$TA19,$TA20,$titre); 	
	}





	
	

	
	//*******************//
	function Sector($xc, $yc, $r, $a, $b, $style='FD', $cw=true, $o=90)
	{
		$d0 = $a - $b;
		if($cw){
			$d = $b;
			$b = $o - $a;
			$a = $o - $d;
		}else{
			$b += $o;
			$a += $o;
		}
		while($a<0)
			$a += 360;
		while($a>360)
			$a -= 360;
		while($b<0)
			$b += 360;
		while($b>360)
			$b -= 360;
		if ($a > $b)
			$b += 360;
		$b = $b/360*2*M_PI;
		$a = $a/360*2*M_PI;
		$d = $b - $a;
		if ($d == 0 && $d0 != 0)
			$d = 2*M_PI;
		$k = $this->k;
		$hp = $this->h;
		if (sin($d/2))
			$MyArc = 4/3*(1-cos($d/2))/sin($d/2)*$r;
		else
			$MyArc = 0;
		//first put the center
		$this->_out(sprintf('%.2F %.2F m',($xc)*$k,($hp-$yc)*$k));
		//put the first point
		$this->_out(sprintf('%.2F %.2F l',($xc+$r*cos($a))*$k,(($hp-($yc-$r*sin($a)))*$k)));
		//draw the arc
		if ($d < M_PI/2){
			$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
						$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
						$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
						$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
						$xc+$r*cos($b),
						$yc-$r*sin($b)
						);
		}else{
			$b = $a + $d/4;
			$MyArc = 4/3*(1-cos($d/8))/sin($d/8)*$r;
			$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
						$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
						$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
						$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
						$xc+$r*cos($b),
						$yc-$r*sin($b)
						);
			$a = $b;
			$b = $a + $d/4;
			$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
						$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
						$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
						$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
						$xc+$r*cos($b),
						$yc-$r*sin($b)
						);
			$a = $b;
			$b = $a + $d/4;
			$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
						$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
						$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
						$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
						$xc+$r*cos($b),
						$yc-$r*sin($b)
						);
			$a = $b;
			$b = $a + $d/4;
			$this->_Arc($xc+$r*cos($a)+$MyArc*cos(M_PI/2+$a),
						$yc-$r*sin($a)-$MyArc*sin(M_PI/2+$a),
						$xc+$r*cos($b)+$MyArc*cos($b-M_PI/2),
						$yc-$r*sin($b)-$MyArc*sin($b-M_PI/2),
						$xc+$r*cos($b),
						$yc-$r*sin($b)
						);
		}
		//terminate drawing
		if($style=='F')
			$op='f';
		elseif($style=='FD' || $style=='DF')
			$op='b';
		else
			$op='s';
		$this->_out($op);
	}
	function _Arc($x1, $y1, $x2, $y2, $x3, $y3 )
	{
		$h = $this->h;
		$this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c',
			$x1*$this->k,
			($h-$y1)*$this->k,
			$x2*$this->k,
			($h-$y2)*$this->k,
			$x3*$this->k,
			($h-$y3)*$this->k));
	}
	
	var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
	if($x==-1)
		$x=$this->x;
	if($y==-1)
		$y=$this->y;
	if($this->angle!=0)
		$this->_out('Q');
	$this->angle=$angle;
	if($angle!=0)
	{
		$angle*=M_PI/180;
		$c=cos($angle);
		$s=sin($angle);
		$cx=$x*$this->k;
		$cy=($this->h-$y)*$this->k;
		$this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
	}
}

function _endpage1()
{
	if($this->angle!=0)
	{
		$this->angle=0;
		$this->_out('Q');
	}
	parent::_endpage1();
}

function RotatedText($x,$y,$txt,$angle)
{
	//Rotation du texte autour de son origine
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
	//Rotation de l'image autour du coin supérieur gauche
	$this->Rotate($angle,$x,$y);
	$this->Image($file,$x,$y,$w,$h);
	$this->Rotate(0);
}

	//********************//
	
	
	
	
	
	
	



}