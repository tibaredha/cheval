<?php
HTML::evaluation('cheval/evaluation.php');  
HTML::multigraphe1(30,340,'Signalement Par Race  Arret Au : ','cheval','Datesigna','Race','4','6','station','is not null') ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'ondeec');
 ?>

