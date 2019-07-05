<?php
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4' );
$datejour1 =date("2000-m-d");$datejour2 =date("Y-m-d");
$EPH1="IS NOT NULL";
$pdf->SetTitle('ondeec');
$pdf->AliasNbPages();//prise encharge du nbr de page // $pdf->SetMargins(0,0,0);
$pdf->AddPage();
$pdf->Image('logooff.jpg',5,10,15,15,0);
$pdf->SetFont('Times', '', 12);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,255);//text noire
$pdf->SetXY(22,10);$pdf->cell(180,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE ",0,0,'L',1,0);
$pdf->SetXY(22,16);$pdf->cell(180,5,"MINISTERE DE L AGRICULTURE ET DU DEVELOPPEMENT RURAL ",0,0,'L',1,0);
$pdf->SetXY(22,22);$pdf->cell(180,5,"OFFICE NATIONAL DE DEVELOPPEMENT DES ELEVAGES EQUINS ET CAMELINS ",0,0,'L',1,0);
$pdf->SetFont('Times', 'B', 24);
$pdf->SetXY(5,130);$pdf->cell(200,5,"Rapport d'activite",0,0,'C',1,0);
$pdf->SetXY(5,140);$pdf->cell(200,5,"Du ".$pdf->dateUS2FR($datejour1)." Au ".$pdf->dateUS2FR($datejour2),0,0,'C',1,0);
$pdf->Image('165.jpg',30,180,150,100,0);
$pdf->SetTextColor(255,0,0);
$pdf->SetTextColor(0,0,0);



$pdf->AddPage();
$pdf->Image('logooff.jpg',5,10,15,15,0);
$pdf->SetFont('Times', '', 11);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,255);//text noire
$pdf->SetXY(22,10);$pdf->cell(180,5,"EDITORIAL",0,0,'L',1,0);
$pdf->SetTextColor(255,0,0);
$pdf->SetTextColor(0,0,0);


$pdf->SetXY(5,$pdf->GetY()+20);$pdf->cell(197,5,html_entity_decode(utf8_decode("2008 voit l'achèvement du Contrat d'Objectifs 2004-2008 entre les Haras nationaux et l'Etat. Après les premières ")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("années de ce Contrat et le lancement d'une démarche de changement profond au sein de l'Etablissement,après une année")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("2007 consacrée à la consolidation, 2008 a été une année prospective.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Un projet d'établissement et un contrat d'objectifs étaient en effet en gestation lorsque le gouvernement a décidé de reporter ")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("ce nouveau contrat d'objectifs pour organiser au préalable le rapprochement avec l'École Nationale d'Équitation.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Le regroupement des deux établissements doit prendre en compte leurs identités fortes et spécifiques. Il traduit une ambition forte")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("de l'État pour le développement de l'élevage et des entreprises de la filière. Il s'agit d'avoir une politique du cheval, animée par un")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("opérateur unique de l'État,avec la recherche d'une meilleure cohérence dans la politique du sport entre l'aval et l'amont.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Les points de convergence entre les Haras nationaux et l'École Nationale d'équitation sont nombreux : les deux entités sont porteuses ")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("de savoir-faire qui vont soutenir et favoriser la professionnalisation et le développement des activités de la filière équine.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Ces champs de compétences complémentaires vont permettre une offre unique de services, qu'il s’agisse de formation professionnelle,")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("de recherche équine, de ressources documentaires, de formation des jeunes chevaux, d'observatoire des métiers")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Ce regroupement est une véritable opportunité pour nos deux établissements et pour la filière cheval dans son ensemble. Il prolonge")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("l'élan de la démarche d'évolution des Haras nationaux. D'ores et déjà, je travaille avec le directeur de l'ENE pour formuler des")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("propositions d'ici au 1er juillet 2009 et mettre en place effectivement le nouvel établissement dès 2010.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("")),0,0,'L',1,0);

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Président du conseil d'administration des Haras nationaux depuis la création de l'établissement public en 1999, je peux témoigner")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("aujourd'hui de la formidable évolution de cette institution sur la base de la mise en oeuvre du contrat d'objectifs 2004-2008.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Autrefois institution vieillissante, refermée sur elle-même, mise en cause par les professionnels, les Haras nationaux sont aujourd'hui")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("un établissement dynamique, ouvert aux évolutions et aux partenariats. Grâce au solide attachement des personnels à leur outil de")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("travail, un nouvel état d'esprit s'est installé dans l'institution, où le mot service a trouvé un nouveau sens. C'est ainsi que la traditionnelle")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("activité de l'étalonnage a pu évoluer sur la base de partenariats publics-privés, y compris dans le secteur des courses. Les")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("anciens dépôts d'étalons ont su pour la plupart d'entre eux, trouver un nouveau souffle grâce à de solides partenariats avec les collectivités")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("territoriales. L'activité emblématique du SIRE, à laquelle les socioprofessionnels sont très attachés, évolue au plus près des")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("besoins des utilisateurs. Le développement de services tels que le conseil aux porteurs de projet fait de l'établissement un véritable")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("levier du développement économique de la filière.")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("Aujourd'hui les Haras nationaux participent à l'élaboration d'une politique du cheval qui profite à tout le monde : éleveurs, étalonniers,")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("collectivités Les socioprofessionnels ont discerné, parfois après quelques doutes, que la nouvelle attitude des Haras nationaux")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("repose sur l'alliance de l'énergie du secteur privé avec l'expertise d'un établissement prestigieux. Notre filière dispose d'un")),0,0,'L',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(197,5,html_entity_decode(utf8_decode("remarquable outil ; elle doit s'appuyer sur les Haras et s'impliquer dans leur orientation.")),0,0,'L',1,0);





$pdf->AddPage();
$pdf->Image('logooff.jpg',5,10,15,15,0);
$pdf->SetFont('Times', '', 12);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,255);//text noire
$pdf->SetXY(22,10);$pdf->cell(180,5,"OFFICE NATIONAL DE DEVELOPPEMENT DES ELEVAGES EQUINS ET CAMELINS",0,0,'L',1,0);
$pdf->SetFont('Times', 'B', 24);
$pdf->SetXY(5,130);$pdf->cell(200,5,"Rapport d'activite",0,0,'C',1,0);
$pdf->SetXY(5,140);$pdf->cell(200,5,"Du ".$pdf->dateUS2FR($datejour1)." Au ".$pdf->dateUS2FR($datejour2),0,0,'C',1,0);
$pdf->SetFont('Times', '', 16);
$pdf->SetXY(55,160);$pdf->cell(100,5,"1- OFFICE NATIONAL ",0,0,'L',1,0);
$pdf->SetXY(55,170);$pdf->cell(100,5,"2- SIRE ONDEEC",0,0,'L',1,0);
$pdf->SetXY(55,180);$pdf->cell(100,5,"3- ",0,0,'L',1,0);
$pdf->SetXY(55,190);$pdf->cell(100,5,"4- ",0,0,'L',1,0);
$pdf->SetXY(55,200);$pdf->cell(100,5,"5- ",0,0,'L',1,0);

$pdf->Image('preriex.jpg',30,235,150,50,0);
$pdf->SetTextColor(255,0,0);
$pdf->SetTextColor(0,0,0);






$pdf->AddPage();
$pdf->SetFont( 'Arial', '', 10 );
$pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("VII-Distribution des équins par wilaya de residence (SIG) ")),1,0,'C',1,0);
$pdf->Algerie($pdf->datasigwil($datejour1,$datejour2,$EPH1),20,128,3.7,'wilaya'); 



$pdf->AddPage();
$pdf->Image('logooff.jpg',190,255,15,15,0);
$pdf->SetFont('Times', '', 12);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,255);//text noire
$pdf->SetXY(5,255);$pdf->cell(180,5,"ONDEEC ",0,0,'R',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(180,5,"ADRESSE",0,0,'R',1,0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->cell(180,5,"E MAIL",0,0,'R',1,0);
$pdf->SetTextColor(255,0,0);
$pdf->SetTextColor(0,0,0);
$pdf->Output();


// $h=150;
// $pdf->SetXY(05,$h);
// $pdf->cell(10,10,"id",1,0,1,'C',0);
// $pdf->cell(50,10,"Etablissements",1,0,1,'C',0);
// $pdf->cell(30,10,"Nbr Deces",1,0,1,'C',0);
// $pdf->cell(30,10,"% Deces",1,0,1,'C',0);
// $pdf->SetXY(05,$h+10); 
// $pdf->mysqlconnect();
// $pdf->SetFont('Arial', '',9, '', true);
// $query = "SELECT * FROM structure ";
// $resultat=mysql_query($query);
// $totalmbr1=mysql_num_rows($resultat);
// while($row=mysql_fetch_object($resultat))
// {

// $pdf->cell(10,5,$row->id,1,0,'C',0);
// $pdf->cell(50,5,$row->structure,1,0,'L',0);
// $pdf->cell(30,5,$pdf->dspnbr($datejour1,$datejour2,"=".$row->id),1,0,'C',0);
// $pdf->cell(30,5,round((($pdf->dspnbr($datejour1,$datejour2,"=".$row->id)*100) / $pdf->dspnbr($datejour1,$datejour2,$EPH1)),2),1,0,'C',0);
// $pdf->SetXY(5,$pdf->GetY()+5); 
// }
// $pdf->cell(60,10,"Total Etablissements",1,0,1,'C',0);
// $pdf->cell(30,10,$pdf->dspnbr($datejour1,$datejour2,$EPH1),1,0,'C',1,0);
// $pdf->cell(30,10,'100 %',1,0,'C',1,0);
// $pdf->SetXY(5,270);$pdf->cell(200,5,"Dr TIBA Redha ",0,0,'C',1,0);


// $pdf->AddPage();
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->servicehospitalisation(html_entity_decode(utf8_decode("I-Distribution des décès par Service D'hospitalisation")),$datejour1,$datejour2,'SERVICEHOSPIT',$EPH1);

// $pdf->AddPage();//corige
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->dureehospitalisation1(html_entity_decode(utf8_decode("II-Distribution des décès par Durée D'hospitalisation")),$datejour1,$datejour2,'SERVICEHOSPIT',$EPH1);

// $pdf->AddPage();//corige
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("III-Distribution des décès par tranche d'age et sexe (global)")),1,0,'C',1,0);
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->T2F20($pdf->dataagesexe(5,42,'Years','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

// $pdf->AddPage();//corrige
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("IV-Distribution des décès par tranche d'age et sexe (pediatrique) ")),1,0,'C',1,0);
// $pdf->T2F20PED($pdf->dataagesexeped(5,42,'Days','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

// $pdf->AddPage();//corige
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("V-Distribution des décès par tranche d'age et sexe (Néonatale Précoce) ")),1,0,'C',1,0);
// $pdf->T2F20PEDJ($pdf->dataagesexepedj(5,42,'Days','deceshosp','DINS','COMMUNER',$datejour1,$datejour2,$EPH1),$datejour1,$datejour2);

// $pdf->AddPage();//corige
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("VI-Distribution des décès par communes de residence ")),1,0,'C',1,0);
// $pdf->tblparcommune('Deces',$datejour1,$datejour2,$EPH1) ;//non coriger  probleme des hors commune 


// $pdf->AddPage();//corige
// $pdf->SetFont( 'Arial', '', 10 );
// $pdf->SetXY(5,25);$pdf->cell(200,5,html_entity_decode(utf8_decode("VII-Distribution des décès par communes de residence (SIG) ")),1,0,'C',1,0);
// $pdf->djelfa($pdf->datasig($datejour1,$datejour2,$EPH1),20,128,3.7,'commune');//commune//dairas 

// $pdf->AddPage();//corige
// $pdf->tblparcim1(html_entity_decode(utf8_decode("VIII-Distribution des causes de décès suivant la classification internationale des maladies cim10 (chapitres)")),$datejour1,$datejour2,$EPH1);//CODECIM

// $pdf->AddPage();//corige
// $pdf->tblparcim2(html_entity_decode(utf8_decode("IX-Distribution des causes de décès suivant la classification internationale des maladies cim10 (categories)")),$datejour1,$datejour2,$EPH1);//CODECIM

// $pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
// $pdf->SetXY(120,$pdf->GetY()+5); $pdf->cell(90,10,'Dr '.$_SESSION["login"],0,0,'L',0);	
?>