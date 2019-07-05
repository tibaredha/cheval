<h1>Modification : <?php echo $this->user[0]['NomP'];?></h1><hr><br/>
<form id="Canvas" action="<?php echo URL."Eleveur/editSave/".$this->user[0]['id'];?>"  method="POST"> 
<div class="tabbed_area"> 
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Eleveur</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">***</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">***</a></li> 	
        </ul> 
        <div id="content_1" class="content">  		
			    <label for=""id="lDSAR"  >تاريخ التسجيل : </label><label for=""id="lDSFR"  >Date inscription : </label>
			    <input  id="Datesigna"   class="cheval"type="TXT"  name="Datesigna"  title="***"    autofocus  value="<?php echo html::dateUS2FR($this->user[0]['Datesigna']);?>" />	 
				 
				<label for=""id="lProprietaireAR">المالك: </label><label for=""id="lProprietaireFR">Proprietaire: </label>
			    <input  id="NomP"  class="cheval" type="text" name="NomP"   value="<?php echo $this->user[0]['NomP'];?>"        /> 
				 <label for=""id="lStatutsAR">الوضعية: </label><label for=""id="lStatutsFR">Statuts: </label>
			     <select id="Statuts"  class="cheval" name="secteur"  >  
					<option value="<?php echo $this->user[0]['secteur'];?>"><?php echo $this->user[0]['secteur'];?></option>
					<option value="1">Publique</option>
					<option value="0">Privé</option>  
				</select>
				<label for=""id="lWilayaAR">الولاية: </label><label for=""id="lWilayaFR">Wil :</label>
				<?php HTML::WILAYA('wil','country','17000',$this->user[0]['wil']) ;?>
				<label for=""id="lCommuneAR">البلدية: </label><label for=""id="lCommuneFR">Com :</label>
				<?php HTML::COMMUNE('com','COMMUNEN','929',$this->user[0]['com']) ;?>
				<label for=""id="lAdresseAR">العنوان: </label><label for=""id="lAdresseFR">Adresse :</label>
				<input  id="adresse"  class="cheval" type="text" name="adresse" value="<?php echo $this->user[0]['adresse'];?>"/>
				<label for=""id="lTelAR">الجوال: </label><label for=""id="lTelFR">Tel :</label>
				<input  id="Tel"  class="cheval" type="text" name="telphone" value="<?php echo $this->user[0]['telphone'];?>"/>
                </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br> </br></br></br></br></br></br>	
		</div>
		
		<div id="content_2" class="content"> 
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br> </br></br></br></br></br></br>	
		       	
        </div>
		<div id="content_3" class="content">  
			<?php 
			// HTML::Image(URL.$this->rootphotos1."ch.jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			// echo'&nbsp;&nbsp;';
			// HTML::Image(URL.$this->logo, $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			?>	
			  
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br> </br></br></br></br></br></br>	
		       
		</div>
</div>
        <input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
        
		<?php HTML::menuview0('0',$_SERVER['SERVER_NAME']);?>

</form > 