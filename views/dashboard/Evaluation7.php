<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::multigraphe11(30,340,'Signalement Par Sexe  Arret Au : ','cheval','Datesigna','Sexe','M','F','station','='.Session::get('station')) ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'Evaluation');
 ?>

