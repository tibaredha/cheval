<h1>Visualisation: <?php echo $this->user[0]['NomA'];?></h1><hr><br/>
<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/create/";  ?>"  method="POST"> 	
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
				<input  id="Mere" class="cheval"type="text" name="mere" value="<?php echo $this->user[0]['mere'];?>"/>
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
		<h2>Caracteristique</h2>   		  
			<fieldset id="fieldset3">
				<legend>Signalement descriptif</legend>
				<textarea id="Tete"     name="Tete"    placeholder="Tete"    rows="2" cols="107"><?php echo $this->user[0]['Tete'];?></textarea></br></br>
				<textarea id="Tete"     name="AG"      placeholder="AG"      rows="2" cols="51"><?php echo $this->user[0]['AG'];?></textarea>
				<textarea id="Tete"     name="AD"      placeholder="AD"      rows="2" cols="51"><?php echo $this->user[0]['AD'];?></textarea></br></br>
				<textarea id="Tete"     name="PG"      placeholder="PG"      rows="2" cols="51"><?php echo $this->user[0]['PG'];?></textarea>
				<textarea id="Tete"     name="PD"      placeholder="PD"      rows="2" cols="51"><?php echo $this->user[0]['PD'];?></textarea></br></br>
				<textarea id="Tete"     name="MARQUES" placeholder="MARQUES" rows="2" cols="107"><?php echo $this->user[0]['MARQUES'];?></textarea>
			</fieldset>
		<?php HTML::hypometrie(); ?>	
		</br></br></br></br></br></br>	
		</div>	
		<div id="content_3" class="content">  
		
			   <?php
			   HTML::Image(URL.$this->rootphotos2.$this->user[0]['id'].".jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			   echo'&nbsp;&nbsp;';
			   $fichier1 = $this->rootphotos.$this->user[0]['id'].'.jpg' ;
			   if (file_exists($fichier1))
			   {
			    HTML::Image(URL.$this->rootphotos1.$this->user[0]['id'].".jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			   }
			   else 
			   {
			   HTML::Image(URL.$this->rootphotos1."cr.jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			   }
			   ?>

				<label for=""id="lAprouvéAR">مرخص: </label><label for=""id="lAprouvéFR">Autorisé :</label>
               <select id="Aprouvé"  class="cheval" name="aprouve"  >  
					<option value="<?php echo $this->user[0]['aprouve'];?>"><?php if ($this->user[0]['aprouve']==1) {echo 'Aprouve';}  else {echo 'Non aprouve';}?></option>
					<option value="1">Autorisé</option>
					<option value="0">Non Autorisé</option>  
				</select>

			   <label for=""id="lAprouvéleAR">تاريخ الترخيص: </label><label for=""id="lAprouvéleFR">Autorisé le :</label> 
			   <input  id="Aprouvéle"   class="cheval"type="txt"  name="DateAprouve" />
				
			   <label for=""id="lStationAR">الوحدة: </label><label for=""id="lStationFR">Station :</label> 
			   <?php HTML::STATIONT1('Station','stataprouv','country',$this->user[0]['station'],HTML::nbrtostring('station','id',$this->user[0]['station'],'station')) ;?>

			   <label for=""id="lDOrigineAR"  >المنشئ : </label><label for=""id="lDOrigineFR"  >Origine : </label>
			   <?php HTML::PAYS('IDOrigine','Origine','cheval',$this->user[0]['Origine'],$this->user[0]['Origine']) ;?>
			   
			    <label for=""id="lTypedetravailAR">نوعية العمل: </label>
				<label for=""id="lTypedetravailFR">Type de travail :</label>
		        <select id="IDTypedetravail"  class="cheval" name="Typedetravail"  >  
					<option value="L">Léger</option>
					<option value="M">Modéré</option>  
				    <option value="I">Intense</option>  
				
				</select>
		        <label for=""id="lTypedechevalAR">نوعية الحصان: </label>
				<label for=""id="lTypedechevalFR">Type de cheval :</label>
		        <select id="IDTypedecheval"  class="cheval" name="Typedecheval"  >  
					<option value='1'>Cheval de selle</option><option value='15'>Cheval de propriétaire</option><option value='16'>Cheval d'enseignement</option><option value='17'>Cheval de sport</option><option value='2'>Poulinière</option><option value='3'>Fin de lactation</option><option value='4' selected>Début de lactation</option><option value='5'>étalon au repos</option><option value='6'>étalon au service</option><option value='7'>Trotteur - Croissance</option><option value='8'>Trotteur au pré-entraînement</option><option value='9'>Trotteur au entraînement</option><option value='10'>Totteur au entraînement intenssif</option><option value='11'>Galopeur</option><option value='12'>Poulain (6 à 12 mois)</option><option value='13'>Poulain (18 à 24 mois)</option><option value='14'>Poulain (32 à 36 mois)</option><option value='18'>Retraité</option>
				
				</select>
		        <label for=""id="lPRIXAR">الثمن: </label><label for=""id="lPRIXFR">Prix estimé en DA:</label> 
			    <input  id="IDPRIX"   class="cheval"type="txt"  name="Prix"   value="100000" />
		</div>
</div>	
<?php HTML::menuview($this->user[0]['id'],$_SERVER['SERVER_NAME']);?>

 </form > 

		
	