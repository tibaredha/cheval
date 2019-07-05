<h1><a title="Nouveau éleveur "  target="_blank"  href="<?php echo URL; ?>tcpdf/docpdf/fr/Le signalement des équidés vademecum.pdf">Nouveau éleveur </a></h1><hr><br/>
<form id="Canvas"  name="formGCS"  action="<?php echo URL."dashboard/createeleveur/";  ?>"  method="POST"> 
<div class="tabbed_area"> 
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">L’identité de l'éleveur</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">***</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">***</a></li> 	
        </ul> 
        <div id="content_1" class="content">  		
		<h2>***</h2> 		
        
		       <label for=""id="lProprietaireAR">المالك: </label><label for=""id="lProprietaireFR">Proprietaire: </label>
			    <input  id="NomP"  class="cheval" type="text" name="NomP" /> 
				 <label for=""id="lStatutsAR">الوضعية: </label><label for=""id="lStatutsFR">Statuts: </label>
			     <select id="Statuts"  class="cheval" name="secteur"  >  
					<option value="1">Publique</option>
					<option value="0">Privé</option>  
				</select>
				<label for=""id="lWilayaAR">الولاية: </label><label for=""id="lWilayaFR">Wil :</label>
				<?php HTML::WILAYA('wil','country','17000','Residence') ;?>
				<label for=""id="lCommuneAR">البلدية: </label><label for=""id="lCommuneFR">Com :</label>
				<?php HTML::COMMUNE('com','COMMUNEN','929','Residence') ;?>
				<label for=""id="lAdresseAR">العنوان: </label><label for=""id="lAdresseFR">Adresse :</label>
				<input  id="adresse"  class="cheval" type="text" name="adresse" />
				<label for=""id="lTelAR">الجوال: </label><label for=""id="lTelFR">Tel :</label>
				<input  id="Tel"  class="cheval" type="text" name="telphone" />
		
		
		
		
		</br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>	
		</div>
		<div id="content_2" class="content">  		
		<h2>***</h2> 		
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>	
		</div>
		<div id="content_3" class="content">  		
		<h2>***</h2> 		
        </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>	
		</div>
		
</div>
        <input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
        
		<?php HTML::menuview0('',$_SERVER['SERVER_NAME']);?>

</form > 