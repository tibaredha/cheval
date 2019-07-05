<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::graphemois(30,340,'Signalement Par Mois Arret Au  : ','','cheval','Datesigna','',date("Y"),'','='.Session::get('station'));
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'Evaluation');
?>

