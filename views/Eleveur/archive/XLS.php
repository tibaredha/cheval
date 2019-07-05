<h1>XLS  Sauvegarde data base :   </h1><hr><br/>
<fieldset id="fieldset0">
<legend>ONDEEC</legend>
<?php HTML::photosdb('='.Session::get('station')); ?>
</fieldset>
<p id="ONDEEC1">ONDEEC</p>
	
	<?php 
	HTML::XLS($_SERVER['SERVER_NAME'],Session::get('station'));
	HTML::Br(18);
	?>	    
	
		
	
	
	
	 
	 