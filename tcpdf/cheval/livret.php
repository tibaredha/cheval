<?php
// require('cheval.php');
// $pdf = new cheval( 'L', 'mm', 'A5',true,'UTF-8',false );
// $pdf->setPrintHeader(false);
// $pdf->setPrintFooter(false);
// $pdf->SetAutoPageBreak(TRUE, 0);
// $pdf->livret($_GET["id"]);
?>
<?php
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetAutoPageBreak(TRUE, 0);

$pdf->mysqlconnect();$id=$_GET["id"];
$query = "select * from cheval WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');//1
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 20/20');


$pdf->SetFont('dejavusans', '', 12);
$pdf->StartTransform();
$pdf->Rotate(180, 100, 110);$pdf->Text(60, 170, $pdf->ondeecar);
$pdf->StopTransform();
$pdf->StartTransform();
$pdf->Rotate(180, 100, 110);$pdf->Text(20, 176, $pdf->ondeecfr);
$pdf->StopTransform();
$pdf->StartTransform();
$pdf->Rotate(180, 100, 110);$pdf->Text(45, 182, 'حي فولانى ص ب : 438 تيارت - 14000 الجزائر ');
$pdf->StopTransform();
$pdf->StartTransform();
$pdf->Rotate(180, 100, 110);$pdf->Text(35, 188, 'Adresse : Cité Volani BP : 438 TIARET - 14000 ALGERIE ');
$pdf->StopTransform();

$pdf->StartTransform();
$pdf->Rotate(180, 100, 110);$pdf->Text(48, 194, '  الهاتف الفاكس : 00-213 (0) 46-24-31-46 ');
$pdf->StopTransform();
$pdf->StartTransform();
$pdf->Rotate(180, 100, 110);$pdf->Text(45, 200, 'Téléphone et Fax : 00-213-(0)46-24-31-46 ');
$pdf->StopTransform();


//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 1/20');	
$pdf->SetXY(5,10+150);
$pdf->Cell(190,6,$pdf->repar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->Cell(190,6,$pdf->minar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->minfr,0,1,'C');
$pdf->Cell(190,6,$pdf->ondeecar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->ondeecfr,0,1,'C');
$pdf->Image($pdf->logo, $x=80, $y=65+150, $w=41, $h=25, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());

$pdf->SetFillColor(248, 248, 255);
$pdf->SetXY(10,100+150);
$pdf->Cell(190,6,'دفتر وصفي',0,1,'C',1,0,'');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,'LIVRET SIGNALETIQUE',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->EAN13($x=87, $y=120+150,trim($result->id), $h=10, $w=.35);$pdf->SetFont('aefurat', '', 12);




$pdf->AddPage('P','A4');//2
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 18/20');

$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,5,'تأشيرات مصالح الجمارك',0,1,'C',1,0,'');
$pdf->Cell(190,5,"VISAS DES DOUANES",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);

//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 3/20');
$pdf->SetXY(10,30+150);
$pdf->Cell(190,6,$pdf->repar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->repfr,0,1,'C');
$pdf->Cell(190,6,$pdf->minar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->minfr,0,1,'C');
$pdf->Cell(190,6,$pdf->ondeecar,0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,$pdf->ondeecfr,0,1,'C');
$pdf->Cell(190,6,'دفتر وصفي',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,'LIVRET SIGNALETIQUE',0,1,'C');
$pdf->Cell(190,6,'يرمي إلى التعريف بحصان',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,"( déstiné à l'identification d'un équidé )",0,1,'C');
$pdf->Cell(190,6,'قرار رقم 641 بتاريخ 23 أوت 1987',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->Cell(190,6,'Arrété N° 641 du 23 Aout 1987',0,1,'C');
$pdf->EAN13($x=87, $y=120+150,trim($result->id), $h=10, $w=.35);$pdf->SetFont('aefurat', '', 12);




$pdf->AddPage('P','A4');//3
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 16/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,5,'التأشيرات الادارية',0,1,'C',1,0,'');
$pdf->Cell(190,5,"VISAS ADMINISTRATIFS",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('aefurat', '', 9);
$pdf->SetXY(10,21);$pdf->Cell(95,52,"",1,1,'L');$pdf->SetXY(10+95,21);$pdf->Cell(95,52,"",1,1,'R');
$pdf->SetXY(10,21);$pdf->Cell(95,7,"Les cachets, attestations concernant l'animal doivent etre porteé dans le",0,1,'L');
$pdf->SetXY(10,21+7);$pdf->Cell(95,7,"cadre ci-dessous par l'autorité compétante avec indication de la date et",0,1,'L');
$pdf->SetXY(10,21+14);$pdf->Cell(95,7,"eventuellement du lieu en particulier:",0,1,'L');
$pdf->SetXY(10,21+21);$pdf->Cell(95,7,"Il peut s'agir des mentions de non inscription sur la liste des oppositions",0,1,'L');
$pdf->SetXY(10,21+21+7);$pdf->Cell(95,7,"pour une exportation, d'inscription sur liste des chevaux de sports",0,1,'L');
$pdf->SetXY(10,21+21+14);$pdf->Cell(95,7,"d'obtention de la prime de sélection , d'inscription au lieu génialogique",0,1,'L');
$pdf->SetXY(10,21+21+21);$pdf->Cell(95,7,"ou de toute décision administrative.",0,1,'L');
$pdf->SetXY(10+95,21);$pdf->Cell(95,7,"يجب على السلطة المختصة وضع في الإطار أدناه الخواتم و الشهادات الخاصة",0,1,'R');
$pdf->SetXY(10+95,21+7);$pdf->Cell(95,7,"بالحيوان مع ذكر التاريخ و عند الإقتضاء المكان",0,1,'R');
$pdf->SetXY(10+95,21+14);$pdf->Cell(95,7,"يمكن أن يتعلق الأمر بعبارات عدم التسجيل على قائمة الإعتراضات قصد التصدير ",0,1,'R');
$pdf->SetXY(10+95,21+21);$pdf->Cell(95,7,"تسجيل على قائمة خيول الرياضة للحصول على منحة الإنتقاء تسجيل في دفتر",0,1,'R');
$pdf->SetXY(10+95,21+21+7);$pdf->Cell(95,7,"السلالي أو كل قرار إداري",0,1,'R');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,73);$pdf->Cell(58,10,"السلطة المختصة ",1,1,'C');
$pdf->SetXY(10+58,73);$pdf->Cell(37,10,"سبب التأشيرة",1,1,'C');
$pdf->SetXY(10+58+37,73);$pdf->Cell(58,10,"السلطة المختصة",1,1,'C');
$pdf->SetXY(10+58+37+58,73);$pdf->Cell(37,10,"سبب التاشيرة",1,1,'C');
$pdf->SetXY(10,83);$pdf->Cell(58,10,"Autorité Compétente",1,1,'C');
$pdf->SetXY(10+58,83);$pdf->Cell(37,10,"Motif du Visa",1,1,'C');
$pdf->SetXY(10+58+37,83);$pdf->Cell(58,10,"Autorité Compétente",1,1,'C');
$pdf->SetXY(10+58+37+58,83);$pdf->Cell(37,10,"Motif du Visa",1,1,'C');
for ($i = 93; $i <= 126; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58,$i);$pdf->Cell(37,10,"",1,1,'C');
$pdf->SetXY(10+58+37,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58+37+58,$i);$pdf->Cell(37,10,"",1,1,'C');
}

//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 5/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10+150);
$pdf->Cell(190,5,'شهادة النسب أو الوصل',0,1,'C',1,0,'');
$pdf->Cell(190,5,"CERTIFICAT D'ORIGINE",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetXY(10,30+150);$pdf->Cell(10,6,'الرقم',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,36+150);$pdf->Cell(10,6,"N : ",0,1,'L');    
$pdf->SetXY(15,36+150);$pdf->Cell(10,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');    
$pdf->SetTextColor(225,0,0);$pdf->SetXY(20,36+150);$pdf->Cell(50,6,trim($result->N),0,1,'L');$pdf->SetTextColor(0,0,0); 
$pdf->SetXY(10,42+150);$pdf->Cell(63,6,'الإسم',0,1,'L');$pdf->SetXY(10+63,42+150);$pdf->Cell(63,6,'الجنس',0,1,'L');$pdf->SetXY(10+63+63,42+150);$pdf->Cell(63,6,'اللون',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,48+150);$pdf->Cell(13,6,'Nom : ',0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(23,48+150);$pdf->Cell(50,6,trim($result->NomA),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,48+150);$pdf->Cell(13,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
$pdf->SetXY(10+63,48+150);$pdf->Cell(13,6,'Sexe :',0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(10+63+13,48+150);$pdf->Cell(50,6,trim($result->Sexe),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10+75,48+150);$pdf->Cell(13,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
$pdf->SetXY(10+63+63,48+150);$pdf->Cell(13,6,'Robe :',0,1,'L');$pdf->SetXY(10+63+63+13,48+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10+75+63,48+150);$pdf->Cell(13,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
$pdf->SetXY(10,54+150);$pdf->Cell(190,6,'السلالة',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,60+150);$pdf->Cell(13,6,"Race :",0,1,'L');$pdf->SetXY(23,60+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('race','id',trim($result->Race),'race'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,60+150);$pdf->Cell(13,6,"_ _ _ _  _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10,66+150);$pdf->Cell(95,6,'الأب',0,1,'L');$pdf->SetXY(10+95,66+150);$pdf->Cell(95,6,'السلالة',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,72+150);$pdf->Cell(13,6,"Père :",0,1,'L');   $pdf->SetXY(23,72+150);$pdf->SetTextColor(225,0,0);   $pdf->Cell(50,6,trim($result->Pere),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,72+150);$pdf->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');
$pdf->SetXY(10+95,72+150);$pdf->Cell(13,6,"Race :",0,1,'L');$pdf->SetXY(23+95,72+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('race','id',trim($result->RacePere),'race'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22+95,72+150);$pdf->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10,78+150);$pdf->Cell(95,6,'الأم',0,1,'L');$pdf->SetXY(10+95,78+150);$pdf->Cell(95,6,'السلالة',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,84+150);$pdf->Cell(13,6,"Mère :",0,1,'L');$pdf->SetXY(23,84+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,trim($result->mere),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,84+150);$pdf->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10+95,84+150);$pdf->Cell(13,6,"Race :",0,1,'L');$pdf->SetXY(23+95,84+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('race','id',trim($result->RaceMere),'race'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22+95,84+150);$pdf->Cell(13,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10,90+150);$pdf->Cell(190,6,'تاريخ الميلاد',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,96+150);$pdf->Cell(36,6,"Date de Naissance :",0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(46,96+150);$pdf->Cell(50,6,$pdf->dateUS2FR(trim($result->Dns)),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(45,96+150);$pdf->Cell(36,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10,102+150);$pdf->Cell(120,6,'المالك',0,1,'L'); $pdf->SetXY(20+120,102+150);$pdf->Cell(70,6,'شهادة النسب مصادق عليها في',0,1,'L');   $pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,108+150);$pdf->Cell(26,6,"Propriètaire :",0,1,'L');$pdf->SetXY(36,108+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostringv('eleveur','id',$result->ideleveur,'NomP'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(35,108+150);$pdf->Cell(26,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(20+120,113+150);$pdf->Cell(36,6,"Certificat d'origine",0,1,'L');$pdf->SetXY(46+120,108+150);
$pdf->SetXY(10,114+150);$pdf->Cell(120,6,'العنوان',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,120+150);$pdf->Cell(20,6,"Adresse :",0,1,'L');$pdf->SetXY(30,120+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(100,6,$pdf->nbrtostring('wil','IDWIL',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'wil')),'WILAYAS').'_'.$pdf->nbrtostring('com','IDCOM',trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'com')),'COMMUNE').'_'.trim($pdf->nbrtostringv('eleveur','id',$result->ideleveur,'adresse')),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(28,120+150);$pdf->Cell(20,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10,132+150);$pdf->Cell(20,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(20+120,119+150);$pdf->Cell(20,6,"Validé Le :",0,1,'L');
$pdf->SetXY(40+120,119+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(20,6,$pdf->dateUS2FR(trim($result->Datesigna)),0,1,'L');$pdf->SetTextColor(0,0,0);




$pdf->AddPage('P','A4');//4
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 14/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);

$pdf->SetXY(10,10);
$pdf->Cell(190,5,'مراقبة هوية الحيوان',0,1,'C',1,0,'');
$pdf->Cell(190,5,"CONTROLE DE L'IDENTITE DE L'ANIMAL",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
for ($i = 25; $i <= 125; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58,$i);$pdf->Cell(37,10,"",1,1,'C');
$pdf->SetXY(10+58+37,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58+37+58,$i);$pdf->Cell(37,10,"",1,1,'C');
}

//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 7/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10+150);
$pdf->Cell(190,5,'الأم',0,1,'C',1,0,'');
$pdf->Cell(190,5,'MERE',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetXY(10,30+150);$pdf->Cell(95,6,'الإسم',0,1,'L');$pdf->SetXY(10+95,30+150);$pdf->Cell(95,6,'تاريخ الميلاد',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,36+150);$pdf->Cell(95,6,"Nom :",0,1,'L');
$pdf->SetXY(22,36+150);$pdf->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(23,36+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,trim($result->mere),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10+95,36+150);$pdf->Cell(95,6,"Date de Naissance :",0,1,'L');
$pdf->SetXY(45+95,36+150);$pdf->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(45+95,36+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->dateUS2FR(trim($result->DnsMere)),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10,42+150);$pdf->Cell(95,6,'السلالة',0,1,'L');$pdf->SetXY(10+95,42+150);$pdf->Cell(95,6,'اللون',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,48+150);$pdf->Cell(95,6,"Race :",0,1,'L');$pdf->SetXY(22,48+150);$pdf->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(23,48+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('race','id',trim($result->RaceMere),'race'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10+95,48+150);$pdf->Cell(95,6,"Robe :",0,1,'L');$pdf->SetXY(22+95,48+150);$pdf->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(22+95,48+150);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('robe','id',trim($result->CouleurMere),'robe'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10,54+150);$pdf->Cell(120,6,"N° S. B. A. :",0,1,'L');
$pdf->SetXY(10,73+150);$pdf->Cell(15,7.5,'من طرف',0,1,'C');
$pdf->SetXY(10,73+7.5+150);$pdf->Cell(15,7.5,'Par',0,1,'C');
$pdf->SetXY(10,73+24+150);$pdf->Cell(15,7.5,'و',0,1,'C');
$pdf->SetXY(10,73+24+7.5+150);$pdf->Cell(15,7.5,'Et',0,1,'C');
$pdf->SetXY(10,76+15+18+150);$pdf->Cell(15,7.5,'رقم',0,1,'C');
$pdf->SetXY(10,76+15+18+7.5+150);$pdf->Cell(15,7.5,'N°',0,1,'C');
$pdf->Rect(85,80+150,15,1,"d");$pdf->Rect(92,80+150,1,12,"d");$pdf->Rect(92,92+150,8,1,"d");
$pdf->SetFillColor(248, 248, 255);
$pdf->SetXY(25,76+150);$pdf->Cell(60,10,$pdf->nbrtostringv('cheval','id',$result->idmere,'Pere'),1,1,'C',1,0,'');         $pdf->SetXY(100,76+150);       $pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idmere,'idpere'),'Pere'),1,1,'C',1,0,'');  
																														  $pdf->SetXY(100,76+12+150);    $pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idmere,'idpere'),'mere'),1,1,'C',1,0,'');	
$pdf->SetFillColor(0, 0, 0);													 
$pdf->Rect(85,80+25+150,15,1,"d");$pdf->Rect(92,80+25+150,1,12,"d");$pdf->Rect(92,92+25+150,8,1,"d");														 
$pdf->SetFillColor(248, 248, 255);
$pdf->SetXY(25,76+24+150);$pdf->Cell(60,10,$pdf->nbrtostringv('cheval','id',$result->idmere,'mere'),1,1,'C',1,0,'');      $pdf->SetXY(100,76+24+150);    $pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idmere,'idmere'),'Pere'),1,1,'C',1,0,'');
																														  $pdf->SetXY(100,76+36+150);    $pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idmere,'idmere'),'mere'),1,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetXY(25,76+36+150);$pdf->Cell(60,10,'',1,1,'L');




$pdf->AddPage('P','A4');//5
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 12/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,5,'اختبار المخبر',0,1,'C',1,0,'');
$pdf->Cell(190,5,'TEST DE LABORATOIRE',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetXY(10,25);$pdf->Cell(33,10,"موضوع",1,1,'C');
$pdf->SetXY(10+33,25);$pdf->Cell(33,10,'طبيعة',1,1,'C');
$pdf->SetXY(10+66,25);$pdf->Cell(33,10,'مخبر',1,1,'C');
$pdf->SetXY(10+99,25);$pdf->Cell(33,10,"تاريخ ارسال",1,1,'C');
$pdf->SetXY(10+132,25);$pdf->Cell(33,10,'تاريخ الاجابة',1,1,'C');//تاريخا لاجابة 
$pdf->SetXY(10+165,25);$pdf->Cell(26,10,'ختم و امضاء ',1,1,'C');
$pdf->SetXY(10,35);$pdf->Cell(33,10,"Objet ",1,1,'C');
$pdf->SetXY(10+33,35);$pdf->Cell(33,10,'Nature',1,1,'C');
$pdf->SetXY(10+66,35);$pdf->Cell(33,10,'Laboratoire',1,1,'C');
$pdf->SetXY(10+99,35);$pdf->Cell(33,10,"Date d'envoie",1,1,'C');
$pdf->SetXY(10+132,35);$pdf->Cell(33,10,'Date réponse ',1,1,'C');
$pdf->SetXY(10+165,35);$pdf->Cell(26,10,'Signature ',1,1,'C');
for ($i = 45; $i <= 130; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(33,10," ",1,1,'C');
$pdf->SetXY(10+33,$i);$pdf->Cell(33,10,'',1,1,'C');
$pdf->SetXY(10+66,$i);$pdf->Cell(33,10,'',1,1,'C');
$pdf->SetXY(10+99,$i);$pdf->Cell(33,10,"",1,1,'C');
$pdf->SetXY(10+132,$i);$pdf->Cell(33,10,'',1,1,'C');
$pdf->SetXY(10+165,$i);$pdf->Cell(26,10,'',1,1,'C');
}

//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 9/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('dejavusans', '', 12);
$pdf->Rect(0,8+150,42,12,"d");$pdf->Rect(42,8+150,42,12,"d");$pdf->Rect(42+42,8+150,42,12,"d");$pdf->Rect(42+42+42,8+150,42,12,"d");$pdf->Rect(42+42+42+42,8+150,42,12,"d");
$pdf->SetXY(0,8+150);$pdf->Cell(42,5,'الرقم',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(0,14+150);$pdf->Cell(42,5,'N° : ',0,0,'L');$pdf->SetTextColor(225,0,0);
$pdf->SetXY(10,14+150);$pdf->Cell(32,5,trim($result->N),0,0,'L');$pdf->SetTextColor(0,0,0);$pdf->SetFont('dejavusans', '', 12);
$pdf->SetXY(42,8+150);$pdf->Cell(42,5,'الإسم',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(42,14+150);$pdf->Cell(42,5,'Nom : ',0,1,'L');$pdf->SetTextColor(225,0,0);
$pdf->SetXY(55,14+150);$pdf->Cell(29,5,trim($result->NomA),0,0,'L');$pdf->SetTextColor(0,0,0); $pdf->SetFont('dejavusans', '', 12);
$pdf->SetXY(42+42,8+150);$pdf->Cell(42,5,'السلالة',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(42+42,14+150);$pdf->Cell(42,5,'Race : ',0,1,'L');$pdf->SetTextColor(225,0,0);
$pdf->SetXY(96,14+150);$pdf->Cell(30,5,$pdf->nbrtostring('race','id',trim($result->Race),'race'),0,0,'L');$pdf->SetTextColor(0,0,0);$pdf->SetFont('dejavusans', '', 12);
$pdf->SetXY(42+42+42,8+150);$pdf->Cell(42,5,'الجنس',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(42+42+42,14+150);$pdf->Cell(42,5,'Sexe : ',0,1,'L');$pdf->SetTextColor(225,0,0);
$pdf->SetXY(96+42,14+150);$pdf->Cell(42,5,trim($result->Sexe),0,0,'L');$pdf->SetTextColor(0,0,0);$pdf->SetFont('dejavusans', '', 12);
$pdf->SetXY(42+42+42+42,8+150);$pdf->Cell(42,5,'اللون',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(42+42+42+42,14+150);$pdf->Cell(42,5,'Robe : ',0,1,'L');$pdf->SetTextColor(225,0,0);
$pdf->SetXY(96+85,14+150);$pdf->Cell(30,5,$pdf->nbrtostring('robe','id',trim($result->Nobo),'robe'),0,0,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,20+150);$pdf->Cell(190,6,'الوصف المسجل تحت الأم',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,26+150);$pdf->Cell(190,6,"Signalement relevé sous la mère :",0,1,'L');
$pdf->SetXY(68,26+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(68,26+150);$pdf->Cell(190,6,$_SESSION['login'].'  '.$pdf->nbrtostring('station','id',$result->station,'station'),0,1,'L');

$pdf->SetXY(5,31+150);$pdf->Cell(190,6,'الرأس',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,36+150);$pdf->Cell(190,6,'Tete : ',0,1,'L');$pdf->SetFont('aefurat', '', 11);$pdf->SetTextColor(225,0,0);
$pdf->SetXY(20,36+150);$pdf->MultiCell(185, 18,html_entity_decode(utf8_decode($result->Tete)), 0, 'L', 0, 0, '', '', true);$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,36+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,36+5+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,36+10+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ",0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,54+150);$pdf->Cell(190,6,'الأمامي الأيسر',0,1,'L');$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,60+150);$pdf->Cell(190,6,"Ant. G :",0,1,'L');$pdf->SetXY(22,60+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(20,60+150);$pdf->Cell(185,6,html_entity_decode(utf8_decode(trim($result->AG))),0,0,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,66+150);$pdf->Cell(190,6,'الأمامي الأيمن',0,1,'L');$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,72+150);$pdf->Cell(190,6,"Ant. D :",0,1,'L');$pdf->SetXY(22,72+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(20,72+150);$pdf->Cell(185,6,html_entity_decode(utf8_decode(trim($result->AD))),0,0,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,78+150);$pdf->Cell(190,6,'الخلفي الأيسر',0,1,'L');$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(5,84+150);$pdf->Cell(190,6,"Post. G :",0,1,'L');$pdf->SetXY(22,84+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(20,84+150);$pdf->Cell(185,6,html_entity_decode(utf8_decode(trim($result->PG))),0,0,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,90+150);$pdf->Cell(190,6,'الخلفي الأيمن',0,1,'L');$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,96+150);$pdf->Cell(190,6,"Post. D :",0,1,'L');$pdf->SetXY(22,96+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');$pdf->SetTextColor(225,0,0);$pdf->SetXY(20,96+150);$pdf->Cell(185,6,html_entity_decode(utf8_decode(trim($result->PD))),0,0,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(5,90+12+150);$pdf->Cell(190,6,'علامات',0,1,'L');$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,108+150);$pdf->Cell(190,6,"Marques : ",0,1,'L');$pdf->SetXY(22,108+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');                                                       $pdf->SetTextColor(225,0,0);$pdf->SetXY(22,108+150);$pdf->MultiCell(185, 18,html_entity_decode(utf8_decode($result->MARQUES)), 0, 'L', 0, 0, '', '', true);$pdf->SetTextColor(0,0,0);
$pdf->SetXY(22,108+5+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(10,120+150);$pdf->Cell(190,6,'تدقيق الوصف إبتداء من سن 18 شهر',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,126+150);$pdf->Cell(190,6,"Vérification du Signalement à partir de 18 Mois :",0,1,'L');
$pdf->SetXY(10,132+150);$pdf->Cell(190,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(140,114+150);$pdf->Cell(190,6,'حرر بـ                   في',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(130,120+150);$pdf->Cell(190,6,"Fait a : Tiaret  le ".$pdf->dateUS2FR(trim($result->Datesigna)),0,1,'L');//$pdf->SetTextColor(225,0,0);$pdf->SetXY(28,108);$pdf->Cell(42,6,trim($result->MARQUES),0,0,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(125,126+150);$pdf->Cell(70,6,'امضاء مصالح الديوان ',0,1,'C');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(125,132+150);$pdf->Cell(70,6,"signature des services de L'ONDEEC",0,1,'C');
// $pdf->SetXY(125,126);$pdf->Cell(70,6," ou du vétérinaire agréé :",0,1,'C');




$pdf->AddPage('P','A4');//6
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 2/20');
//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 19/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10+150);
$pdf->Cell(190,5,'الملاك المتعاقبون',0,1,'C',1,0,'');
$pdf->Cell(190,5,"LES PROPRIÉTAIRES SUCCESSIFS ",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);

$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(105,25+150);$pdf->Cell(95,10,'*** ',1,1,'C');
$pdf->SetXY(105,35+150);$pdf->Cell(95,5,'**** ',1,1,'C');
$pdf->SetXY(10,25+150);$pdf->Cell(95,5,"En cas de changement de propriétaire le document d'identification  ",1,1,'L');
$pdf->SetXY(10,30+150);$pdf->Cell(95,5,"doit être immédiatement déposé auprès de l'organisation l'ayant  ",1,1,'L');
$pdf->SetXY(10,35+150);$pdf->Cell(95,5,"délivré avec le nom et l'adresse du nouveau propriétaire",1,1,'L');
$pdf->SetXY(10,40+150);$pdf->Cell(20,5,'بيـــــع في',1,1,'C');
$pdf->SetXY(30,40+150);$pdf->Cell(35,5,'الى السيــــــــد',1,1,'C');
$pdf->SetXY(65,40+150);$pdf->Cell(35,5,'الولاية',1,1,'C');
$pdf->SetXY(100,40+150);$pdf->Cell(35,5,'البلدية',1,1,'C');
$pdf->SetXY(135,40+150);$pdf->Cell(35,5,'العنوان',1,1,'C');
$pdf->SetXY(170,40+150);$pdf->Cell(30,5,'الإمضاء',1,1,'C');
$pdf->SetXY(10,45+150);$pdf->Cell(20,5,'Vendu le',1,1,'C');
$pdf->SetXY(30,45+150);$pdf->Cell(35,5,'à Mr  ',1,1,'C');
$pdf->SetXY(65,45+150);$pdf->Cell(35,5,'wilaya',1,1,'C');
$pdf->SetXY(100,45+150);$pdf->Cell(35,5,'commune',1,1,'C');
$pdf->SetXY(135,45+150);$pdf->Cell(35,5,'adresse',1,1,'C');
$pdf->SetXY(170,45+150);$pdf->Cell(30,5,'Signature',1,1,'C');

$queryS = "select * from sale  where idcheval=$id  order by  datesale asc LIMIT 0,6  ";//
$resultatS=mysql_query($queryS);
while($resultS=mysql_fetch_object($resultatS))
{
$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(20,15,$pdf->dateUS2FR(trim($resultS->datesale)),1,1,'C',0);
$pdf->SetXY(30,$pdf->GetY()-15);$pdf->Cell(35,15,$pdf->nbrtostringv('eleveur','id',$resultS->ideleveur,'NomP'),1,1,'L',0);
$pdf->SetXY(65,$pdf->GetY()-15);$pdf->Cell(35,15,$pdf->nbrtostring('wil','IDWIL',trim($pdf->nbrtostringv('eleveur','id',$resultS->ideleveur,'wil')),'WILAYAS'),1,1,'L',0);
$pdf->SetXY(100,$pdf->GetY()-15);$pdf->Cell(35,15,$pdf->nbrtostring('com','IDCOM',trim($pdf->nbrtostringv('eleveur','id',$resultS->ideleveur,'com')),'COMMUNE'),1,1,'L');
$pdf->SetXY(135,$pdf->GetY()-15);$pdf->Cell(35,15,trim($pdf->nbrtostringv('eleveur','id',$resultS->ideleveur,'adresse')),1,1,'L',0);
$pdf->SetXY(170,$pdf->GetY()-15);$pdf->Cell(30,15,'',1,1,'C',0); 
}
for ($i = 50+150; $i <= 130+150; $i+=15) {
$pdf->SetXY(10,$i);$pdf->Cell(20,15,'',1,1,'C');
$pdf->SetXY(30,$i);$pdf->Cell(35,15,'',1,1,'C');
$pdf->SetXY(65,$i);$pdf->Cell(35,15,'',1,1,'C');
$pdf->SetXY(100,$i);$pdf->Cell(35,15,'',1,1,'C');
$pdf->SetXY(135,$i);$pdf->Cell(35,15,'',1,1,'C');
$pdf->SetXY(170,$i);$pdf->Cell(30,15,'',1,1,'C');   
}



$pdf->AddPage('P','A4');//7
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 4/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetXY(5,10);
$pdf->Cell(95,6,'INSTRUCTIONS GENERALES',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('dejavusans', '',6.5);
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,6,"l'office national de developpement des élevage équin a établi pour votre cheval ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,6,"une carte d'immatriculation ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,6,'un livret signaletique ',0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,'ces deux élements portent le mème N° matricule correspondant',0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"à l'enregistrement au fichier central de L'ONDEEC toute perte de ces documents",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"doit etre déclaré à L'ONDEEC 8 Amrani Benouda TIARET ALGERIE",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"ils doivent etre retournée a la meme adresse a la mort de l'animal",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"1-la carte d'immatriculation: doit etre conservé soigneusement,en cas de vente",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"elle doit etre endossé et remise à l'acheteur elle est considérée comme une",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"présemption de proprieté si elle a été régulierement en- ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"dossé à chaque transaction.",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"2-livret signalétique : est destiné à l'identification de l'animal et doit ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"l'accompagner dans tous ces déplacements pour etre présenté à toute",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"demande des autorités chargées des controles administratifs ,techniques",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"et sanitaires. Il ne constitue pas un titre de propriété.",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"Toute personne qui se rend coupable de fausse déclaration ,contrefacons",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"ou falsifications de ce document s'éxpose aux poursuites des services de l'ONDEEC",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"Le livret signaletique prend toute sa validation :le signalement",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"descriptif du produit relevé sans la mére doit etre vérifié et complété ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"du signalement graphique par un agent de l'ONDEEC ou un vétérinaire agrée ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"par cette administration , lorseque l'animal a atteint l'age de de 18 mois ou avant ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"son exportation .Le livret signalétique est alors transmis à l'ONDEEC ( service ",0,1,'L');
$pdf->SetXY(5,$pdf->getY());$pdf->Cell(95,5,"controle et vérification ) pour visa. ",0,1,'L');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(110,11);$pdf->Cell(95,6,'تعليمات عامة',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('aefurat', '', 10);
$pdf->SetXY(110,11+6);$pdf->Cell(95,6,'إن الديوان الوطني لتربية الخيول أعد لحصانكم',0,1,'R');
$pdf->SetXY(110,11+12);$pdf->Cell(95,6,'-بطاقة التسجيل',0,1,'R');
$pdf->SetXY(110,11+18);$pdf->Cell(95,6,'-دفتر وصفي ',0,1,'R');
$pdf->SetXY(110,11+24);$pdf->Cell(95,6,'و يحملان هذان العنصران نفس الرقم المطابق للتسجيل ضمن السجل المركزي',0,1,'R');
$pdf->SetXY(110,11+30);$pdf->Cell(95,6,'للديوان الوطني لتربية الخيول و يجب الإتصال بالديوان الكائن 8,شارع عمراني',0,1,'R');
$pdf->SetXY(110,11+36);$pdf->Cell(95,6,'بن عودة - تيارت (الجزائر) في حالة ضياع هذه الوثائق كما ينبغي إعادتها عند',0,1,'R');
$pdf->SetXY(110,11+42);$pdf->Cell(95,6,'وفاة الحيوان',0,1,'R');
$pdf->SetXY(110,11+48);$pdf->Cell(95,6,'يجب الإحتفاظ ببطاقة التسجيل و في حالة البيع ينبغي تظهيرها و تسليمها ',0,1,'R');
$pdf->SetXY(110,11+54);$pdf->Cell(95,6,'للمشتري و تعتبر بمثابة قرينة للملكية إذا ما تم تطهيرها بإنتظام و عند كل عملية ',0,1,'R');
$pdf->SetXY(110,11+60);$pdf->Cell(95,6,'لحارية',0,1,'R');
$pdf->SetXY(110,11+66);$pdf->Cell(95,6,'2(-الدفتر الوصفي يرمي إلى تعريف الحيوان و يجب أن يرافقه في جميع إنتقالاته ',0,1,'R');
$pdf->SetXY(110,11+72);$pdf->Cell(95,6,'قصد تقديمه عند طلب السلطات المكلفة بالمراقبة الإدارية و التقنية ',0,1,'R');
$pdf->SetXY(110,11+78);$pdf->Cell(95,6,'و الصحية و لا يشكل عقد للملكية',0,1,'R');
$pdf->SetXY(110,11+84);$pdf->Cell(95,6,'كل من إرتكب تصريح مزور جريمة التقليد لهذه الوثيقة يتعرض لملاحظات ',0,1,'R');
$pdf->SetXY(110,11+90);$pdf->Cell(95,6,'الديوان الوطني لتربية الخيول',0,1,'R');
$pdf->SetXY(110,11+96);$pdf->Cell(95,6,'- يتمتع الدفتر الوصفي بقيمة بعد التصديق عليه ',0,1,'R');
$pdf->SetXY(110,11+102);$pdf->Cell(95,6,'- يجب تدقيق الوصف البياني للمنتوج المسجل يجب الأم و تكميله بالوصف',0,1,'R');
$pdf->SetXY(110,11+108);$pdf->Cell(95,6,'الخطي عون الديوان الوطني لتربية الخيول او طبيب بيطري معتمد من طرف هذه',0,1,'R');
$pdf->SetXY(110,11+114);$pdf->Cell(95,6,'الإدارة و عند بلوغ الحيوان سن 18 شهر أو قبل تصديره يرسل الدفتر الوصفي ',0,1,'R');
$pdf->SetXY(110,11+120);$pdf->Cell(95,6,'إلى الديوان ( مصلحة المراقبة و التحقيق )للتأشيرة',0,1,'R');
//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 17/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);$pdf->SetXY(10,10+150);
$pdf->Cell(190,5,'التأشيرات الادارية',0,1,'C',1,0,'');
$pdf->Cell(190,5,"VISAS ADMINISTRATIFS",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
for ($i = 25+150; $i <= 125+150; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58,$i);$pdf->Cell(37,10,"",1,1,'C');
$pdf->SetXY(10+58+37,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58+37+58,$i);$pdf->Cell(37,10,"",1,1,'C');
}




$pdf->AddPage('P','A4');//8
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 6/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,5,'الأب',0,1,'C',1,0,'');
$pdf->Cell(190,5,'PERE',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetXY(10,30);$pdf->Cell(95,6,'الإسم',0,1,'L');$pdf->SetXY(10+95,30);$pdf->Cell(95,6,'تاريخ الميلاد',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,36);$pdf->Cell(95,6,"Nom :",0,1,'L');$pdf->SetXY(22,36);$pdf->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L'); 
$pdf->SetXY(23,36);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,trim($result->Pere),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10+95,36);$pdf->Cell(95,6,"Date de Naissance :",0,1,'L');$pdf->SetXY(45+95,36);$pdf->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(45+95,36);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->dateUS2FR(trim($result->DnsPere)),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10,42);$pdf->Cell(95,6,'السلالة',0,1,'L');$pdf->SetXY(10+95,42);$pdf->Cell(95,6,'اللون',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,48);$pdf->Cell(95,6,"Race :",0,1,'L');$pdf->SetXY(22,48);$pdf->Cell(95,6," _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L'); 
$pdf->SetXY(23,48);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('race','id',trim($result->RacePere),'race'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10+95,48);$pdf->Cell(95,6,"Robe :",0,1,'L');$pdf->SetXY(22+95,48);$pdf->Cell(95,6,"_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _",0,1,'L');
$pdf->SetXY(22+95,48);$pdf->SetTextColor(225,0,0);$pdf->Cell(50,6,$pdf->nbrtostring('robe','id',trim($result->CouleurPere),'robe'),0,1,'L');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10,54);$pdf->Cell(120,6,"N° S. B. A. :",0,1,'L');
$pdf->SetXY(10,60);$pdf->Cell(63,6,'حصان فحل',0,1,'L');$pdf->SetXY(10+63,60);$pdf->Cell(63,6,'سنة النزول',0,1,'L');$pdf->SetXY(10+63+63,60);$pdf->Cell(63,6,'المحطة',0,1,'L');$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10+63,66);$pdf->Cell(63,6,'Année de la Monté :',0,1,'L');$pdf->SetXY(45+63,66);$pdf->Cell(63,6,' _ _ _ _ _ _ _ _',0,1,'L');
$pdf->SetXY(10+63+63,66);$pdf->Cell(63,6,'Station :',0,1,'L');$pdf->SetXY(25+63+63,66);$pdf->Cell(63,6,' _ _ _ _ _ _ _ _ _ _ _ _ _ _ _',0,1,'L');
if(trim($result->aprouve)==1)
{
$pdf->SetXY(10,66);$pdf->Cell(63,6,'Etalon : Oui',0,1,'L');$pdf->SetXY(25,66);$pdf->Cell(63,6,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,1,'L');
} 
else 
{
$pdf->SetXY(10,66);$pdf->Cell(63,6,'Etalon : Oui',0,1,'L');$pdf->SetXY(25,66);$pdf->Cell(63,6,'_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ',0,1,'L');
}
$pdf->SetXY(10,73);$pdf->Cell(15,7.5,'من طرف',0,1,'C');
$pdf->SetXY(10,73+7.5);$pdf->Cell(15,7.5,'Par',0,1,'C');
$pdf->SetXY(10,73+24);$pdf->Cell(15,7.5,'و',0,1,'C');
$pdf->SetXY(10,73+24+7.5);$pdf->Cell(15,7.5,'Et',0,1,'C');
$pdf->SetXY(10,76+15+18);$pdf->Cell(15,7.5,'رقم',0,1,'C');
$pdf->SetXY(10,76+15+18+7.5);$pdf->Cell(15,7.5,'N°',0,1,'C');

$pdf->Rect(85,80,15,1,"d");$pdf->Rect(92,80,1,12,"d");$pdf->Rect(92,92,8,1,"d");
$pdf->SetFillColor(248, 248, 255);
$pdf->SetXY(25,76);$pdf->Cell(60,10,$pdf->nbrtostringv('cheval','id',$result->idpere,'Pere'),1,1,'C',1,0,'');        $pdf->SetXY(100,76);   $pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idpere,'idpere'),'Pere'),1,1,'C',1,0,'');
																												     $pdf->SetXY(100,76+12);$pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idpere,'idpere'),'mere'),1,1,'C',1,0,'');	
$pdf->SetFillColor(0, 0, 0);													 
$pdf->Rect(85,80+25,15,1,"d");$pdf->Rect(92,80+25,1,12,"d");$pdf->Rect(92,92+25,8,1,"d");														 
$pdf->SetFillColor(248, 248, 255);
$pdf->SetXY(25,76+24);$pdf->Cell(60,10,$pdf->nbrtostringv('cheval','id',$result->idpere,'mere'),1,1,'C',1,0,'');     $pdf->SetXY(100,76+24);$pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idpere,'idmere'),'Pere'),1,1,'C',1,0,'');
																													 $pdf->SetXY(100,76+36);$pdf->Cell(100,10,$pdf->nbrtostringv('cheval','id',$pdf->nbrtostringv('cheval','id',$result->idpere,'idmere'),'mere'),1,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetXY(25,76+36);$pdf->Cell(60,10,'',1,1,'L');
//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 15/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10+150);
$pdf->Cell(190,5,'مراقبة هوية الحيوان',0,1,'C',1,0,'');
$pdf->Cell(190,5,"CONTROLE DE L'IDENTITE DE L'ANIMAL",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
for ($i = 25+150; $i <= 125+150; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58,$i);$pdf->Cell(37,10,"",1,1,'C');
$pdf->SetXY(10+58+37,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58+37+58,$i);$pdf->Cell(37,10,"",1,1,'C');
}



$pdf->AddPage('P','A4');//9
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 8/20');
$file = '../../public/images/'.$id.'.jpg';
if (file_exists($file))
{
$pdf->Image('../../public/images/'.$id.'.jpg', $x=2, $y=20, $w=210, $h=120, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
}
else
{
$pdf->Image('../../public/images/ch.jpg', $x=2, $y=20, $w=210, $h=120, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=5, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
}
$pdf->SetFont('dejavusans', '', 12);
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,5,'الوصف الخطى',0,1,'C',1,0,'');
$pdf->Cell(190,5,'Signalement graphique',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);

//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 13/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10+150);
$pdf->Cell(190,5,'مراقبة هوية الحيوان',0,1,'C',1,0,'');
$pdf->Cell(190,5,"CONTROLE DE L'IDENTITE DE L'ANIMAL",0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('aefurat', '', 9);
$pdf->SetXY(10,21+150);$pdf->Cell(95,52,"",1,1,'L');$pdf->SetXY(10+95,21+150);$pdf->Cell(95,52,"",1,1,'R');
$pdf->SetXY(10,21+150);$pdf->Cell(95,7,"Toute personne qui en application de la réglementation ou des codes",0,1,'L');
$pdf->SetXY(10,21+7+150);$pdf->Cell(95,7,"vigueur est dans l'obligation de controle d'identité de l'animal qui lui est",0,1,'L');
$pdf->SetXY(10,21+14+150);$pdf->Cell(95,7,"présente doit porter sa signature dans le cadre ci-dessus en indiquant",0,1,'L');
$pdf->SetXY(10,21+21+150);$pdf->Cell(95,7,"la raison du controle son lieu et sa date. ",0,1,'L');
$pdf->SetXY(10,21+28+150);$pdf->Cell(95,7,"en cas de non conformité du signalement le livret doit retourner a",0,1,'L');
$pdf->SetXY(10,21+35+150);$pdf->Cell(95,7,"LONDEEC 8 rue Amrani Benouda TIARET ( en indiquant sur une note",0,1,'L');
$pdf->SetXY(10,21+42+150);$pdf->Cell(95,7,"annexée les differences constatées )",0,1,'L');
$pdf->SetXY(10+95,21+150);$pdf->Cell(95,7,"كل شخص يحول له التنظيم و القوانين السارية المفعول إلزامه مراقبة هوية",0,1,'R');
$pdf->SetXY(10+95,21+7+150);$pdf->Cell(95,7,"الحيوان المقدم له مجبر على وضع إمضائه في الخانة المذكورة أدناه مع ذكر سبب ",0,1,'R');
$pdf->SetXY(10+95,21+14+150);$pdf->Cell(95,7,"المراقبة تاريخها و مكانها",0,1,'R');
$pdf->SetXY(10,73+150);$pdf->Cell(58,10,"سبب مراقبة الهوية ",1,1,'C');
$pdf->SetXY(10+58,73+150);$pdf->Cell(37,10,"تاريخ و مكان",1,1,'C');
$pdf->SetXY(10+58+37,73+150);$pdf->Cell(58,10,"سبب مراقبة الهوية",1,1,'C');
$pdf->SetXY(10+58+37+58,73+150);$pdf->Cell(37,10,"تاريخ و مكان",1,1,'C');
$pdf->SetXY(10,83+150);$pdf->Cell(58,10,"Raison du controle de l'identite",1,1,'C');
$pdf->SetXY(10+58,83+150);$pdf->Cell(37,10,"Date et lieu",1,1,'C');
$pdf->SetXY(10+58+37,83+150);$pdf->Cell(58,10,"Raison du controle de l'identite",1,1,'C');
$pdf->SetXY(10+58+37+58,83+150);$pdf->Cell(37,10,"Date et lieu",1,1,'C');
for ($i = 93+150; $i <= 126+150; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58,$i);$pdf->Cell(37,10,"",1,1,'C');
$pdf->SetXY(10+58+37,$i);$pdf->Cell(58,10,"",1,1,'C');
$pdf->SetXY(10+58+37+58,$i);$pdf->Cell(37,10,"",1,1,'C');
}





$pdf->AddPage('P','A4');//10
//PARTIE SUP
$pdf->racelivreta44($x=5, $y=1.5,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 10/20');
$pdf->SetFillColor(248, 248, 255);
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(10,10);
$pdf->Cell(190,5,'التلقيحات',0,1,'C',1,0,'');
$pdf->Cell(190,5,'VACCINATIONS',0,1,'C',1,0,'');
$pdf->SetFillColor(0, 0, 0);
$pdf->SetFont('aefurat', '', 10);$pdf->SetXY(105,25);$pdf->Cell(95,10,'تسجيل فوريا من طرف الطبيب البيطري و تصنيفه واضحة و دقيقة ',1,1,'C');
$pdf->SetXY(105,35);$pdf->Cell(95,5,'في الإطار أدناه كل التلقيحات المستفاد بها الحيوان ',1,1,'C');
$pdf->SetXY(10,25);$pdf->Cell(95,5,"Toute vaccination subie par l'animal doit etre immediatement ",1,1,'L');
$pdf->SetXY(10,30);$pdf->Cell(95,5,'inscrit par le vétérinaire effectuant la vaccination de façon lisible',1,1,'L');
$pdf->SetXY(10,35);$pdf->Cell(95,5,'et précisé dans le cadre  ci-dessous ',1,1,'L');
$pdf->SetXY(10,40);$pdf->Cell(40,5,'طابع صيدلي و اسم الدواء',1,1,'C');
$pdf->SetXY(10+40,40);$pdf->Cell(31,5,'الأمراض المعينة',1,1,'C');
$pdf->SetXY(10+40+31,40);$pdf->Cell(21,5,'تاريخ',1,1,'C');
$pdf->SetXY(10+40+31+21,40);$pdf->Cell(31,5,'مكان',1,1,'C');
$pdf->SetXY(10+40+31+21+31,40);$pdf->Cell(47,5,'خاتم و عنوان الطبيب',1,1,'C');
$pdf->SetXY(10+40+31+21+31+47,40);$pdf->Cell(20,5,'الإمضاء',1,1,'C');
$pdf->SetXY(10,45);$pdf->Cell(40,5,'Vignette ou nom du vaccin',1,1,'C');
$pdf->SetXY(10+40,45);$pdf->Cell(31,5,'Maladies Concernés',1,1,'C');
$pdf->SetXY(10+40+31,45);$pdf->Cell(21,5,'Date',1,1,'C');
$pdf->SetXY(10+40+31+21,45);$pdf->Cell(31,5,'Lieu',1,1,'C');
$pdf->SetXY(10+40+31+21+31,45);$pdf->Cell(47,5,'Cachet et Adresse du Vétérinaire',1,1,'C');
$pdf->SetXY(10+40+31+21+31+47,45);$pdf->Cell(20,5,'Signature',1,1,'C');
$queryvac = "select * from vaccination WHERE  idcheval = '$id'  limit 0,9 ";//WHERE  id = '$id' 
$resultat=mysql_query($queryvac);
while($resultvac=mysql_fetch_object($resultat))
{
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(40,10,"***",1,1,'C',0);
$pdf->SetXY(50,$pdf->GetY()-10);$pdf->Cell(31,10,trim($resultvac->vaccin),1,1,'C',0);
$pdf->SetXY(81,$pdf->GetY()-10);$pdf->Cell(21,10,trim($resultvac->datevaccination),1,1,'C',0);
$pdf->SetXY(102,$pdf->GetY()-10);$pdf->Cell(31,10,trim($resultvac->com),1,1,'C',0);
$pdf->SetXY(133,$pdf->GetY()-10);$pdf->Cell(47,10,trim($resultvac->veterinaire),1,1,'C',0);
$pdf->SetXY(180,$pdf->GetY()-10);$pdf->Cell(20,10,"",1,1,'C',0); 
}
for ($i = 50; $i <= 130; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(40,10,'',1,1,'C');
$pdf->SetXY(50,$i);$pdf->Cell(31,10,'',1,1,'C');
$pdf->SetXY(81,$i);$pdf->Cell(21,10,'',1,1,'C');
$pdf->SetXY(102,$i);$pdf->Cell(31,10,'',1,1,'C');
$pdf->SetXY(133,$i);$pdf->Cell(47,10,'',1,1,'C');
$pdf->SetXY(180,$i);$pdf->Cell(20,10,'',1,1,'C');   
}

//PARTIE INF
$pdf->racelivreta44($x=5, $y=1.5+150,$result->Race,trim($result->NPPRODUIT),trim($result->N),'page 11/20');

$pdf->SetFont('aefurat', '', 10);
$queryvac = "select * from vaccination WHERE  idcheval = '$id'  limit 9,13 ";//WHERE  id = '$id' 
$resultat=mysql_query($queryvac);
while($resultvac=mysql_fetch_object($resultat))
{
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(40,10,"***",1,1,'C',0);
$pdf->SetXY(50,$pdf->GetY()-10);$pdf->Cell(31,10,trim($resultvac->vaccin),1,1,'C',0);
$pdf->SetXY(81,$pdf->GetY()-10);$pdf->Cell(21,10,trim($resultvac->datevaccination),1,1,'C',0);
$pdf->SetXY(102,$pdf->GetY()-10);$pdf->Cell(31,10,trim($resultvac->com),1,1,'C',0);
$pdf->SetXY(133,$pdf->GetY()-10);$pdf->Cell(47,10,trim($resultvac->veterinaire),1,1,'C',0);
$pdf->SetXY(180,$pdf->GetY()-10);$pdf->Cell(20,10,trim($resultvac->id),1,1,'C',0); 
}
for ($i = 10+150; $i <= 130+150; $i+=10) {
$pdf->SetXY(10,$i);$pdf->Cell(40,10,'',1,1,'C');
$pdf->SetXY(50,$i);$pdf->Cell(31,10,'',1,1,'C');
$pdf->SetXY(81,$i);$pdf->Cell(21,10,'',1,1,'C');
$pdf->SetXY(102,$i);$pdf->Cell(31,10,'',1,1,'C');
$pdf->SetXY(133,$i);$pdf->Cell(47,10,'',1,1,'C');
$pdf->SetXY(180,$i);$pdf->Cell(20,10,'',1,1,'C');   
}



}
$pdf->Output();
?>