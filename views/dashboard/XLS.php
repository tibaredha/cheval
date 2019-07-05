<h1>XLS  Sauvegarde data base :   </h1><hr><br/>
<?php 
HTML::photosdb('='.Session::get('station'),'1'); 
HTML::XLS($_SERVER['SERVER_NAME'],Session::get('station'));
HTML::Br(18);
?>	    	 