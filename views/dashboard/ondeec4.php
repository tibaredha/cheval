<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::sgraphemois(30,340,'Saillies Par Mois Arret Au  : ','','saillie','datemonte','',date("Y"),'','is not null');
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'ondeec');
 ?>

