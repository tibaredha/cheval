<?php
HTML::evaluation('cheval/evaluation.php');  
HTML::pgraphemois(30,340,'Produits Par Mois Arret Au  : ','','cheval','Dns','',date("Y"),'','is not null');
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'ondeec');
 ?>
