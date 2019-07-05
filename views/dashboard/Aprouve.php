<h1>Autorisation a la monte  : <?php echo $this->user[0]['NomA'];?></h1><hr><br/>		
    <fieldset id="fieldset0">
    <legend>***</legend>
	<?php
	HTML::Image(URL."public/images/".$this->user[0]['id'].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva11');
	HTML::Image(URL."public/images/cheval/".$this->user[0]['id'].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva22');
	?>
	</fieldset>

<form id="Canvas" action="<?php echo URL."dashboard/editAprouve/".$this->user[0]['id'];?>"  method="POST"> 
              <label for=""id="">Autorisation :</label>
               <select id=""  class="cheval" name="aprouve"  >  
					<option value="<?php echo $this->user[0]['aprouve'];?>"><?php if ($this->user[0]['aprouve']==1) {echo 'Aprouve';}  else {echo 'Non aprouve';}?></option>
					<option value="1">Autorisé</option>
					<option value="0">Non Autorisé</option>  
				</select>
		<input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
		<button id="Cleara" onclick="javascript:window.location.reload();return false;">Clear Area</button>
		<input  id="Clearb" type="submit" />
		<button id="Clearc" onclick="javascript:list();return false;">Lister</button>
</form > 
<?php HTML::Br(36);?>	 