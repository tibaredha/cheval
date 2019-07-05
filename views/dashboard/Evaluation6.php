<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::multigraphe(30,340,'Produits Par annee et type monte  Arret Au : ','cheval','dns','Sexe','M','F','station','='.Session::get('station')) ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'Evaluation');
 ?>

