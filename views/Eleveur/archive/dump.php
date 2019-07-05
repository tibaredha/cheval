<h1>Dump  Sauvegarde data base :   </h1><hr><br/>
<fieldset id="fieldset0">
<legend>ONDEEC</legend>
<?php HTML::photosdb('='.Session::get('station')); ?>
</fieldset>
<p id="ONDEEC1">ONDEEC</p>
	<?php 
	HTML::dump_MySQL("127.0.0.1","root","","cheval",2);
	HTML::Br(36);
	?>	    
		
		
	
	
	
	 
	 