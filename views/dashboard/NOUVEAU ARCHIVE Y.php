<h1><a title="Le signalement des équidés vademecum"  target="_blank"  href="<?php echo URL; ?>tcpdf/docpdf/fr/Le signalement des équidés vademecum.pdf">Signalement des équidés</a></h1><hr><br/>
	    
        <!--	
		<fieldset id="fieldset0">
        <legend>***</legend>
		<?php
		$url1 = explode('/',$_GET['url']);
		//HTML::Image(URL."public/images/images.jpg", $width = 400, $height = 440, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
		?>
		</fieldset>-->	
	<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/createy/".$url1[2]."/".$url1[3]."/".$url1[4];  ?>"  method="POST"> 

<div class="tabbed_area">  
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">L’identité de l'équidé</a></li>  
            <li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">Relevé de signalement descriptif</a></li> 
			<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">Relevé de signalement graphique</a></li> 	
        </ul>    
		<div id="content_1" class="content">  	
		
		<!--  	
		<fieldset id="fieldset0">
        <legend>***</legend>
		<?php
		HTML::Image(URL."public/images/images.jpg", $width = 400, $height = 440, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
		?>
		</fieldset>
		-->
			
				<label for=""id="lDSAR"  >تاريخ الفحص : </label><label for=""id="lDSFR"  >Date signalement : </label>
				<input  id="Datesigna"   class="cheval"type="TXT"  name="Datesigna"  autofocus/>	  
			
			   <label for=""id="lDSEXEAR"  >الجنس : </label><label for=""id="lDSEXEFR"  >Sexe : </label>
			   <select id="IDSexe"  class="cheval" name="Sexe"  >  
					<option value="M">Masculin</option>
					<option value="F">Feminin</option>  
				</select>
				
				<label for=""id="lTAILLEAR"  >الطول : </label><label for=""id="lTAILLEFR"  >Taille : </label>
				<input  id="IDTaille"  class="Taille" type="text" name="Taille" />
				
				<label for=""id="lNaisseurAR"  >المولد: </label><label for=""id="lNaisseurFR"  >Naisseur : </label>
				<input  id="Naisseur"  class="Naisseur" type="text" name="Naisseur" />
				
				<label for=""id="lANaisseurAR"  >العنوان:&nbsp;&nbsp;&nbsp; Adresse</label>
				<input  id="ANaisseur"  class="ANaisseur" type="text" name="ANaisseur" />
				
				<label for=""id="lNOMAR">الاسم : </label><label for=""id="lNOMFR">Nom : </label>
				<input  id="NomA"  class="cheval" type="text" name="NomA" />
				<input  id="N4"     class="cheval" type="text" name="N"   />
				<label for=""id="lNAR"  >الرقم &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N°</label>
				
				
				<label for=""id="lDNSAR">تاريخ الميلاد : </label><label for=""id="lDNSFR">Date de naissance : </label>
				<input  id="Dnspr"  class="cheval"type="TXT" name="Dns"  placeholder="0000-00-00"/>
				
				<label for=""id="lRACEAR">السلالة: </label><label for=""id="lRACEFR">Race: </label>
				<?php HTML::RACE1('idrace','Race','cheval','1','Race') ;?>
				
				<label for=""id="lROBEAR">اللون: </label><label for=""id="lROBEFR">Robe: </label>
				<?php HTML::ROBE1('idrobe','Nobo','cheval','1','Robe') ;?>
				
				<label for=""id="lPUCEAR">الشريحة: </label><label for=""id="lPUCEFR">PUCE: </label>
				<input  id="N1"     class="cheval" type="text" name="NPPRODUIT"    placeholder="NPUCEPRODUIT"/>
				
                </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>	
		        </br></br></br></br></br></br>
		</div>
		<div id="content_2" class="content"> 
		<h2>Caracteristique</h2> 		  
			<fieldset id="fieldset3">
				<legend>Signalement descriptif</legend>
				<textarea id="Tete"     name="Tete"    placeholder="Tete"    rows="2" cols="107"></textarea></br></br>
				<textarea id="Tete"     name="AG"      placeholder="AG"      rows="2" cols="51"></textarea>
				<textarea id="Tete"     name="AD"      placeholder="AD"      rows="2" cols="51"></textarea></br></br>
				<textarea id="Tete"     name="PG"      placeholder="PG"      rows="2" cols="51"></textarea>
				<textarea id="Tete"     name="PD"      placeholder="PD"      rows="2" cols="51"></textarea></br></br>
				<textarea id="Tete"     name="MARQUES" placeholder="MARQUES" rows="2" cols="107"></textarea>
			</fieldset>	
		<?php HTML::hypometrie(); ?>	
		</br></br></br></br></br></br>	
        </div>
		
		
		
		<div id="content_3" class="content">  
		
				<?php 
			HTML::Image(URL.$this->rootphotos1."ch.jpg?t=".time(), $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			echo'&nbsp;&nbsp;';
			HTML::Image(URL.$this->logo, $width = 400, $height = 450, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
			?>	

               <label for=""id="lAprouvéAR">مرخص: </label><label for=""id="lAprouvéFR">Autorisé :</label>
               <select id="Aprouvé"  class="cheval" name="aprouve"  >  
					<option value="0">Non Autorisé</option>
					<option value="1">Autorisé</option>
					  
				</select>

			   <label for=""id="lAprouvéleAR">تاريخ الترخيص : </label><label for=""id="lAprouvéleFR">Autorisé le :</label> 
			   <input  id="Aprouvéle"   class="cheval"type="txt"  name="DateAprouve" />
				
			   <label for=""id="lStationAR">الوحدة: </label><label for=""id="lStationFR">Station :</label> 
			  
				<?php HTML::STATIONT1('Station','stataprouv','country',Session::get('station'),HTML::nbrtostring('station','id',Session::get('station'),'station')) ;?>
			    
			   <label for=""id="lDOrigineAR"  >المنشئ : </label><label for=""id="lDOrigineFR"  >Origine : </label>
			  <?php HTML::PAYS('IDOrigine','Origine','cheval','DZ','Algérie') ;?>
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
		<input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
		<?php HTML::menuview0('',$_SERVER['SERVER_NAME']);?>
		
	</form > 