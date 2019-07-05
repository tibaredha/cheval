<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::multigraphe(30,340,'Signalement Par annee et sexe  Arret Au : ','cheval','Datesigna','Sexe','M','F','station','is not null') ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'ondeec');
 ?>

