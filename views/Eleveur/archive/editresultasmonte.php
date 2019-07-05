<h1>Resultas de saillies : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['idcheval'],'NomA'); ?>_<?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['jument'],'NomA'); ?></h1><hr><br/>
	<fieldset id="fieldset0">
    <legend>***</legend>
	<?php
	HTML::Image(URL."public/images/images.jpg", $width = 400, $height = 440, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
	$url1 = explode('/',$_GET['url']);
	
	?>
	</fieldset>
	<form id="Canvas" action="<?php echo URL."dashboard/editSaveresultasmonte/".$this->user[0]['id'].'/'.$url1[3];?>"  method="POST"> 
		<fieldset id="fieldset1">
        <legend>Resultas</legend>	  
		<input  id="dateresultas"   class="cheval"  type="date"  name="dateresultas"  placeholder=" (0000-00-00)"/>
		<select id="Resultas"  class="cheval" name="Resultas"  >  
			<option value="<?php echo $this->user[0]['Resultas'];?>"><?php echo $this->user[0]['Resultas'];?></option>
			<option value="1">Suitée</option>
			<option value="0">Non fécondée</option>  
		</select>
		</fieldset>    
		<fieldset id="fieldset1">
        <legend>Nom du poulin/iche</legend>
		<?php
		//HTML::EQUINTx('poulin','poulin','class','',"Nom du poulin/iche",'');
		?>		
		</fieldset>
		<button id="Cleara"  onclick="javascript:window.location.reload();return false;">Clear Area</button>
		<input  id="Clearb"  type="submit" />
		<button id="Clearl"   onclick="javascript:list('<?php echo $_SERVER['SERVER_NAME'];?>');return false;">Lister</button>
	    
		<!--
		<button id="nvpoulin" onclick="javascript:list1('<?php //echo $_SERVER['SERVER_NAME'];?>');return false;">Poulin/Pouliche</button>
	 
	 -->
	 </form > 
	 
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/> 
	 
	 
	 
	 
	 
	 
	 
	 