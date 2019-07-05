<?php
HTML::evaluation('cheval/evaluation.php');  
HTML::multigraphe11(30,340,'Signalement Par Sexe  Arret Au : ','cheval','Datesigna','Sexe','M','F','station','is not null') ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'ondeec');
 ?>
