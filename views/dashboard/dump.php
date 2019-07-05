<h1>Dump  Sauvegarde data base :   </h1><hr><br/>
<?php 
HTML::photosdb('='.Session::get('station'),'1'); 
HTML::dump_MySQL("127.0.0.1","root","","cheval",2);
HTML::Br(36);
?>	    	 