<?php	
$data = array(
"titre"       => 'Modification : '.$this->user[0]['NomA'], "id"       =>$this->user[0]['id'],
"action"      => 'dashboard/editSave/'.$this->user[0]['id'],
"origine"     => 'edit',
"Datesigna"   => HTML::dateUS2FR($this->user[0]['Datesigna']),
"NomA"        => $this->user[0]['NomA'],
"N"           => $this->user[0]['N'],
"Dns"         => HTML::dateUS2FR($this->user[0]['Dns']),
"Race1"       => $this->user[0]['Race'],
"Race2"       => HTML::nbrtostring('race','id',$this->user[0]['Race'],'race'),
"Robe1"       => $this->user[0]['Nobo'],
"Robe2"       => HTML::nbrtostring('robe','id',$this->user[0]['Nobo'],'robe'),
"NPPRODUIT"   => $this->user[0]['NPPRODUIT'],
"Pere"        => $this->user[0]['Pere'],
"NPere"       => $this->user[0]['NPere'],
"DnsPere"     => HTML::dateUS2FR($this->user[0]['DnsPere']),
"RacePere1"   => $this->user[0]['RacePere'],
"RacePere2"   => HTML::nbrtostring('race','id',$this->user[0]['RacePere'],'race'),
"CouleurPere1"=> $this->user[0]['CouleurPere'],
"CouleurPere2"=> HTML::nbrtostring('robe','id',$this->user[0]['CouleurPere'],'robe'),
"NPPERE"      => $this->user[0]['NPPERE'],
"mere"        => $this->user[0]['mere'],
"NMere"       => $this->user[0]['NMere'],
"DnsMere"     => HTML::dateUS2FR($this->user[0]['DnsMere']),
"RaceMere1"   => $this->user[0]['RaceMere'],
"RaceMere2"   => HTML::nbrtostring('race','id',$this->user[0]['RaceMere'],'race'),
"CouleurMere1"=> $this->user[0]['CouleurMere'],
"CouleurMere2"=> HTML::nbrtostring('robe','id',$this->user[0]['CouleurMere'],'robe'),
"NPMERE"      => $this->user[0]['NPMERE'],
"ideleveur1"  => $this->user[0]['ideleveur'],
"ideleveur2"  => HTML::nbrtostringv('eleveur','id',$this->user[0]['ideleveur'],'NomP'),
"Naisseur1"   => $this->user[0]['idnaisseur'],
"Naisseur2"   => HTML::nbrtostringv('naisseur','id',$this->user[0]['idnaisseur'],'NomP'),
"DateAprouve" => HTML::dateUS2FR($this->user[0]['DateAprouve']),
"Origine1"    => $this->user[0]['Origine'],
"Origine2"    => $this->user[0]['Origine'],
"Prix"        => $this->user[0]['prix'],
"Tete"        => $this->user[0]['Tete'],
"AG"          => $this->user[0]['AG'],
"AD"          => $this->user[0]['AD'],
"PG"          => $this->user[0]['PG'],
"PD"          => $this->user[0]['PD'],
"MARQUES"     => $this->user[0]['MARQUES']
);
HTML::cheval($data);
//voir  fichier original  new3




?>




