<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::multigraphe(30,340,'Signalement Par annee et sexe  Arret Au : ','cheval','Datesigna','Sexe','M','F','station','='.Session::get('station')) ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'Evaluation');
 ?>

