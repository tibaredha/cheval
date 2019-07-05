<?php	
$url1 = explode('/',$_GET['url']);
$data = array(
"titre"       => 'Signalement nouveau équidé (Nouvelle Naissance)', 
"action"      => 'dashboard/createy/'.$url1[2]."/".$url1[3]."/".$url1[4],
"origine"     => 'oc',
"Datesigna"   => date('d-m-Y'),
"NomA"        => '',
"N"           => '',
"Dns"         => date('d-m-Y'),
"Race1"       => '1',
"Race2"       => 'Race',
"Robe1"       => '1',
"Robe2"       => 'Robe',
"NPPRODUIT"   => '',

"Pere1"       => $this->nbrtostring('cheval','id',$url1[3],'id'),
"Pere2"       => $this->nbrtostring('cheval','id',$url1[3],'NomA'),  
"Pere"        => '',            // non pris en charge 
"NPere"       => '',            // non pris en charge 
"DnsPere"     => date('d-m-Y'), // non pris en charge 
"RacePere1"   => $this->nbrtostring('cheval','id',$url1[3],'RacePere'),            
"RacePere2"   => $this->nbrtostring('race','id',$this->nbrtostring('cheval','id',$url1[3],'RacePere'),'race'),   
"CouleurPere1"=> '1',           // non pris en charge 
"CouleurPere2"=> 'Robe',        // non pris en charge 
"NPPERE"      => '',

"mere1"       => $this->nbrtostring('cheval','id',$url1[4],'id'),
"mere2"       => $this->nbrtostring('cheval','id',$url1[4],'NomA'),  
"mere"        => '',             // non pris en charge 
"NMere"       => '',             // non pris en charge 
"DnsMere"     => date('d-m-Y'),  // non pris en charge 
"RaceMere1"   => $this->nbrtostring('cheval','id',$url1[4],'RaceMere'),          
"RaceMere2"   => $this->nbrtostring('race','id',$this->nbrtostring('cheval','id',$url1[4],'RaceMere'),'race'),  
"CouleurMere1"=> '1',            // non pris en charge 
"CouleurMere2"=> 'Robe',         // non pris en charge 
"NPMERE"      => '',             // non pris en charge 

"ideleveur1"  => $this->nbrtostring('cheval','id',$url1[4],'ideleveur'),
"ideleveur2"  => $this->nbrtostring('eleveur','id',$this->nbrtostring('cheval','id',$url1[4],'ideleveur'),'NomP'),//'Proprietaire',
"Naisseur1"   => '1',
"Naisseur2"   => 'Naisseur',
"DateAprouve" =>  date('d-m-Y'),
"Origine1"    => 'DZ',
"Origine2"    => 'Algérie',
"Prix"        => '000000',
"Tete"        => '',
"AG"          => '',
"AD"          => '',
"PG"          => '',
"PD"          => '',
"MARQUES"     => ''
);
HTML::cheval($data);
?>




 
	 
	 