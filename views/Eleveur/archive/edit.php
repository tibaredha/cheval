<h1>Modification : <?php echo $this->user[0]['NomA'];?></h1><hr><br/>		
<form id="Canvas" action="<?php echo URL."dashboard/editSave/".$this->user[0]['id'];?>"  method="POST"> 
<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">L’identité de l'équidé</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Relevé de signalement descriptif</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Relevé de signalement graphique</a></li> 	
        </ul>    
		<div id="content_1" class="content">  	
			
				
				<label for=""id="lDSAR"  >تاريخ الفحص : </label><label for=""id="lDSFR"  >Date signalement : </label>
				<input  id="Datesigna"   class="cheval"type="TXT"  name="Datesigna"  value="<?php echo $this->user[0]['Datesigna'];?>"/>	  
			
			   <label for=""id="lDSEXEAR"  >الجنس : </label><label for=""id="lDSEXEFR"  >Sexe : </label>
			   <select id="IDSexe"  class="cheval" name="Sexe"  >  
					<option value="<?php echo $this->user[0]['Sexe'];?>"><?php echo $this->user[0]['Sexe'];?></option>
					<option value="M">Masculin</option>
					<option value="F">Feminin</option>  
				</select>
				
				<label for=""id="lTAILLEAR"  >الطول : </label><label for=""id="lTAILLEFR"  >Taille : </label>
				<input  id="IDTaille"  class="Taille" type="text" name="Taille" value="<?php echo $this->user[0]['Taille'];?>" />
				
				<label for=""id="lNaisseurAR"  >المولد: </label><label for=""id="lNaisseurFR"  >Naisseur : </label>
				<input  id="Naisseur"  class="Naisseur" type="text" name="Naisseur" value="<?php echo $this->user[0]['Naisseur'];?>"/>
				
				<label for=""id="lANaisseurAR"  >العنوان:&nbsp;&nbsp;&nbsp; Adresse</label>
				<input  id="ANaisseur"  class="ANaisseur" type="text" name="ANaisseur" value="<?php echo $this->user[0]['ANaisseur'];?>"/>
				
				
				
				<label for=""id="lNOMAR">الاسم : </label><label for=""id="lNOMFR">Nom : </label>
				<input  id="NomA"  class="cheval" type="text" name="NomA" value="<?php echo $this->user[0]['NomA'];?>" />
				<input  id="N4"     class="cheval" type="text" name="N" value="<?php echo $this->user[0]['N'];?>"  />
				<label for=""id="lNAR"  >الرقم &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N°</label>
				
				
				
				
				
				<label for=""id="lDNSAR">تاريخ الميلاد : </label><label for=""id="lDNSFR">Date de naissance : </label>
				<input  id="Dnspr"  class="cheval"type="TXT" name="Dns"  value="<?php echo $this->user[0]['Dns'];?>"/>
				
				<label for=""id="lRACEAR">السلالة: </label><label for=""id="lRACEFR">Race: </label>
				<?php HTML::RACE1('idrace','Race','cheval',$this->user[0]['Race'],HTML::nbrtostring('race','id',$this->user[0]['Race'],'race')) ;  ?>
				
				<label for=""id="lROBEAR">اللون: </label><label for=""id="lROBEFR">Robe: </label>
				<?php HTML::ROBE1('idrobe','Nobo','cheval',$this->user[0]['Nobo'],HTML::nbrtostring('robe','id',$this->user[0]['Nobo'],'robe')) ;?>
				
				
				<label for=""id="lPUCEAR">الشريحة: </label><label for=""id="lPUCEFR">PUCE: </label>
				<input  id="N1"     class="cheval" type="text" name="NPPRODUIT"    value="<?php echo $this->user[0]['NPPRODUIT'];?>"/>
				
				<label for=""id="lPEREAR">الاب: </label><label for=""id="lPEREFR">Pere: </label>
				<input  id="Pere" class="cheval"type="text" name="Pere" value="<?php echo $this->user[0]['Pere'];?>" />
				<input  id="NPere"class="cheval" type="text" name="NPere" value="<?php echo $this->user[0]['NPere'];?>"  />
				<label for=""id="lNPereAR"  >الرقم &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N°</label>
				<?php //HTML::EQUIN('jument','class','','Pere','M');       ?>
				
				<label for=""id="lDNSPAR">تاريخ الميلاد : </label><label for=""id="lDNSPFR">Date de naissance : </label>
				<input  id="DnsP"  class="cheval"type="TXT" name="DnsPere"  value="<?php echo $this->user[0]['DnsPere'];?>"/>
				
				<label for=""id="lRACEPAR">السلالة: </label><label for=""id="lRACEPFR">Race: </label>
				<?php HTML::RACE1('idracep','RacePere','cheval',$this->user[0]['RacePere'],HTML::nbrtostring('race','id',$this->user[0]['RacePere'],'race')) ;?>
				
				<label for=""id="lROBEPAR">اللون: </label><label for=""id="lROBEPFR">Robe: </label>
				<?php HTML::ROBE1('idrobep','CouleurPere','cheval',$this->user[0]['CouleurPere'],HTML::nbrtostring('robe','id',$this->user[0]['CouleurPere'],'robe')) ;?>
			
				<label for=""id="lPUCEPAR">الشريحة: </label><label for=""id="lPUCEPFR">PUCE: </label>
				<input  id="NPUCEPERE"     class="cheval" type="text" name="NPPERE" value="<?php echo $this->user[0]['NPPERE'];?>"/>
				
				<label for=""id="lMEREAR">الام: </label><label for=""id="lMEREFR">Mere: </label>
				<input  id="Mere" class="cheval"type="text" name="mere"   value="<?php echo $this->user[0]['mere'];?>"/>
				<input  id="NMere"class="cheval" type="text" name="NMere" value="<?php echo $this->user[0]['NMere'];?>"/>
				<label for=""id="lNMereAR"  >الرقم &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N°</label>
				
				<?php //HTML::EQUIN('jument','class','','Mere','F');       ?>
				
				<label for=""id="lDNSMAR">تاريخ الميلاد : </label><label for=""id="lDNSMFR">Date de naissance : </label>
				<input  id="DnsM"  class="cheval"type="TXT" name="DnsMere"  value="<?php echo $this->user[0]['DnsMere'];?>"/>
				
				<label for=""id="lRACEMAR">السلالة: </label><label for=""id="lRACEMFR">Race: </label>
				<?php HTML::RACE1('idracem','RaceMere','cheval',$this->user[0]['RaceMere'],HTML::nbrtostring('race','id',$this->user[0]['RaceMere'],'race')) ;?>
				
				<label for=""id="lROBEMAR">اللون: </label><label for=""id="lROBEMFR">Robe: </label>
				<?php HTML::ROBE1('idrobem','CouleurMere','cheval',$this->user[0]['CouleurMere'],HTML::nbrtostring('robe','id',$this->user[0]['CouleurMere'],'robe')) ;?>
				
				<label for=""id="lPUCEMAR">الشريحة: </label><label for=""id="lPUCEMFR">PUCE: </label>
				<input  id="NPUCEMERE"     class="cheval" type="text" name="NPMERE" value="<?php echo $this->user[0]['NPMERE'];?>"/>
				
			
			    <label for=""id="lProprietaireAR">المالك: </label><label for=""id="lProprietaireFR">Proprietaire: </label>
			    <input  id="NomP"  class="cheval" type="text" name="NomP" value="<?php echo $this->user[0]['NomP'];?>" /> 
			
				 <label for=""id="lStatutsAR">الوضعية: </label><label for=""id="lStatutsFR">Statuts: </label>
			     <select id="Statuts"  class="cheval" name="secteur"  >  
					<option value="<?php echo $this->user[0]['secteur'];?>"><?php if ($this->user[0]['secteur']==1) {echo 'Publique';}  else {echo 'Privé';}?></option>
					<option value="1">Publique</option>
					<option value="0">Privé</option>  
				</select>
				<label for=""id="lWilayaAR">الولاية: </label><label for=""id="lWilayaFR">Wil :</label>
				<?php HTML::WILAYA('wil','country',$this->user[0]['wil'],HTML::nbrtostring('wil','IDWIL',$this->user[0]['wil'],'WILAYAS')) ; ;?>
				<label for=""id="lCommuneAR">البلدية: </label><label for=""id="lCommuneFR">Com :</label>
				<?php HTML::COMMUNE('com','COMMUNEN',$this->user[0]['com'],HTML::nbrtostring('com','IDCOM',$this->user[0]['com'],'COMMUNE')) ; ;?>
				<label for=""id="lAdresseAR">العنوان: </label><label for=""id="lAdresseFR">Adresse :</label>
				<input  id="adresse"  class="cheval" type="text" name="adresse" value="<?php echo $this->user[0]['adresse'];?>"/>
				<label for=""id="lTelAR">الجوال: </label><label for=""id="lTelFR">Tel :</label>
				<input  id="Tel"  class="cheval" type="text" name="telphone" value="<?php echo $this->user[0]['telphone'];?>" />
                </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>	
		        </br></br></br></br></br></br>	
		</div>
		<div id="content_2" class="content"> 
		<h2>Caracteristique</h2></br>    		  
			<fieldset id="fieldset3">
				<legend>Signalement descriptif</legend>
				<textarea id="Tete"     name="Tete"    placeholder="Tete"    rows="2" cols="107"><?php echo $this->user[0]['Tete'];?></textarea></br></br>
				<textarea id="Tete"     name="AG"      placeholder="AG"      rows="2" cols="51"><?php echo $this->user[0]['AG'];?></textarea>
				<textarea id="Tete"     name="AD"      placeholder="AD"      rows="2" cols="51"><?php echo $this->user[0]['AD'];?></textarea></br></br>
				<textarea id="Tete"     name="PG"      placeholder="PG"      rows="2" cols="51"><?php echo $this->user[0]['PG'];?></textarea>
				<textarea id="Tete"     name="PD"      placeholder="PD"      rows="2" cols="51"><?php echo $this->user[0]['PD'];?></textarea></br></br>
				<textarea id="Tete"     name="MARQUES" placeholder="MARQUES" rows="2" cols="107"><?php echo $this->user[0]['MARQUES'];?></textarea>
			</fieldset>	
		<label for=""id="lmensurationsAR"  >Périmètre </label><label for=""id="lmensurationsFR"  >Avant Bras</label>
		<input  id="Nmensurations"  class="Nmensurations" type="text" name="Nmensurations" />	
		
		<label for=""id="lmensurations1AR"  >Périmètre </label><label for=""id="lmensurations1FR"  >Genoux</label>
		<input  id="Nmensurations1"  class="Nmensurations1" type="text" name="Nmensurations1" />	
		
		<label for=""id="lmensurations2AR"  >Périmètre </label><label for=""id="lmensurations2FR"  >Canon</label>
		<input  id="Nmensurations2"  class="Nmensurations2" type="text" name="Nmensurations2" />	
		
		<label for=""id="lmensurations3AR"  >Périmètre </label><label for=""id="lmensurations3FR"  >Boulet</label>
		<input  id="Nmensurations3"  class="Nmensurations3" type="text" name="Nmensurations3" />	
		
		<label for=""id="lmensurations4AR"  >Périmètre </label><label for=""id="lmensurations4FR"  >Boulet</label>
		<input  id="Nmensurations4"  class="Nmensurations4" type="text" name="Nmensurations4" />	
		
		
		<label for=""id="lmensurations5AR"  >Indice </label><label for=""id="lmensurations5FR"  >Corporel</label>
		<input  id="Nmensurations5"  class="Nmensurations5" type="text" name="Nmensurations5" />	
		
		<label for=""id="lmensurations6AR"  >Indice </label><label for=""id="lmensurations6FR"  >H-Poitrine</label>
		<input  id="Nmensurations6"  class="Nmensurations6" type="text" name="Nmensurations6" />	
		
		<label for=""id="lmensurations7AR"  >Indice </label><label for=""id="lmensurations7FR"  >Compacité</label>
		<input  id="Nmensurations7"  class="Nmensurations7" type="text" name="Nmensurations7" />	
		
		<label for=""id="lmensurations8AR"  >Indice </label><label for=""id="lmensurations8FR"  >03 périmètres</label>
		<input  id="Nmensurations8"  class="Nmensurations8" type="text" name="Nmensurations8" />	
		
		<label for=""id="lmensurations9AR"  >Indice </label><label for=""id="lmensurations9FR"  >D-thoracique</label>
		<input  id="Nmensurations9"  class="Nmensurations9" type="text" name="Nmensurations9" />		
			
		<label for=""id="lmensurations10AR"  >Longueur </label><label for=""id="lmensurations10FR"  >S-I</label>
		<input  id="Nmensurations10"  class="Nmensurations10" type="text" name="Nmensurations10" />	
		
		<label for=""id="lmensurations11AR"  >Longueur </label><label for=""id="lmensurations11FR"  >V-S-S</label>
		<input  id="Nmensurations11"  class="Nmensurations11" type="text" name="Nmensurations11" />	
		
		
		<label for=""id="lmensurations12AR"  >Longueur </label><label for=""id="lmensurations12FR"  >H-coude</label>
		<input  id="Nmensurations12"  class="Nmensurations12" type="text" name="Nmensurations12" />	
		
		<label for=""id="lmensurations13AR"  >Longueur </label><label for=""id="lmensurations13FR"  >H-Poitrine</label>
		<input  id="Nmensurations13"  class="Nmensurations13" type="text" name="Nmensurations13" />	
		
		</br></br></br></br></br></br>	
		</div>	
		<div id="content_3" class="content">  
		
			   <?php
			   HTML::Image(URL."public/images/".$this->user[0]['id'].".jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			   echo'*';
			  
			  $fichier1 = "d:/cheval/public/images/cheval/".$this->user[0]['id'].'.jpg' ;
			   if (file_exists($fichier1))
			   {
			    HTML::Image(URL."public/images/cheval/".$this->user[0]['id'].".jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
				//echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.'public/images/cheval/'.$data[0].'.jpg'."\" width=\"400\" height=\"340\" alt=\"cheval\" /></p>";
			   }
			   else 
			   {
			   HTML::Image(URL."public/images/cheval/cr.jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			   }
			   
			   ?>

				<label for=""id="lAprouvéAR">مرخص: </label><label for=""id="lAprouvéFR">Autorisé :</label>
               <select id="Aprouvé"  class="cheval" name="aprouve"  >  
					<option value="<?php echo $this->user[0]['aprouve'];?>"><?php if ($this->user[0]['aprouve']==1) {echo 'Aprouve';}  else {echo 'Non aprouve';}?></option>
					<option value="1">Autorisé</option>
					<option value="0">Non Autorisé</option>  
				</select>

			   <label for=""id="lAprouvéleAR">تاريخ الترخيص : </label><label for=""id="lAprouvéleFR">Autorisé le :</label> 
			   <input  id="Aprouvéle"   class="cheval"type="txt"  name="DateAprouve" />
				
			   <label for=""id="lStationAR">الوحدة: </label><label for=""id="lStationFR">Station :</label> 
			   <?php HTML::STATIONT1('Station','stataprouv','country',$this->user[0]['station'],HTML::nbrtostring('station','id',$this->user[0]['station'],'station')) ;?>
				
				<label for=""id="lDOrigineAR"  >المنشئ : </label><label for=""id="lDOrigineFR"  >Origine : </label>
			  <?php HTML::PAYS('IDOrigine','Origine','cheval',$this->user[0]['Origine'],$this->user[0]['Origine']) ;?>
			   
			   
		</div>
</div>

		<input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
		<button id="Cleara" onclick="javascript:window.location.reload();return false;">Clear Area</button>
		<input  id="Clearb" type="submit" />
		<button id="Clearc" onclick="javascript:list('<?php echo $_SERVER['SERVER_NAME'];?>');return false;">Lister</button>button>
	 </form > 