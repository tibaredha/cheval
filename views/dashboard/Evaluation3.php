<?php
HTML::evaluation('cheval/evaluation.php'); 
HTML::multigraphe(30,340,'Saillies Par annee et type monte  Arret Au : ','saillie','datemonte1','typemonte','main','libre','station','='.Session::get('station')) ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'Evaluation');
 ?>

