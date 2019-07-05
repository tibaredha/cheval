<h1>Vaccination : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></h1><hr><br/>
    <fieldset id="fieldset0">
    <legend><?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></legend>
	
   <?php
   HTML::Image(URL."public/images/".$this->user[0]['id'].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva11');
   $fichier1 = "d:/cheval/public/images/cheval/".$this->user[0]['id'].'.jpg' ;
   if (file_exists($fichier1))
   {
   HTML::Image(URL."public/images/cheval/".$this->user[0]['id'].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva22');
   }
   else 
   {
   HTML::Image(URL."public/images/cheval/cr.jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva22');
   }
  ?>

	</fieldset><p id="ONDEEC1">ONDEEC</p>
	<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/createvaccin/".$this->user[0]['id'];  ?>"  method="POST"> 
		
		<fieldset id="fieldset1">
        <legend>Date </legend>
		<input  id="datevaccination"   class="cheval"  type="txt"  name="datevaccination"  placeholder=" (0000-00-00)" autofocus   /></br>	  
		</fieldset> 
		<fieldset id="fieldset1">
        <legend>Adresse </legend>
		 <?php HTML::WILAYAx('','wil','country','17000','Wilaya de Residence') ;HTML::COMMUNEx('','com','COMMUNEN','929','Commune de Residence') ;?>		<input  id="adressev"  class="cheval" type="text" name="adresse" placeholder="adresse"/></br>
		</fieldset> 
		<fieldset id="fieldset1">
		<legend>Vaccin</legend>
		Nom
		<select id="Race"  class="cheval" name="vaccin"  > 
			<option value="grippe">Grippe</option> 
			<option value="tetanos">Tetanos</option> 
			<option value="rage">Rage</option>
			<option value="rhinopnemonie">Rhinopnemonie</option>	
		</select>
		  
		Date péremption <input  id="dateperemption"   class="cheval"  type="txt"  name="dateperemption" />	
		Numéros de lot <input   id="numerosdelot"     class="cheval" type="text"   name="numerosdelot" />
		</fieldset> 
		<fieldset id="fieldset1">
		<legend>Nom Du Veterinaire</legend>
		<input  id="veterinaire"  class="cheval" type="text" name="veterinaire" placeholder="Nom Du Veterinaire"/></br>
		</fieldset> 
        <?php HTML::menuview1($this->user[0]['id'],$_SERVER['SERVER_NAME']);?>			
	 </form > 	 
<h1>Releve Des Vaccinations</h1>
<hr/><br/>	 	 
<table  width='65%' border='1' cellpadding='5' cellspacing='1' >	 
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="8"   ><a title="Certificat de vaccination"   href="<?php echo URL."tcpdf/cheval/certificatvac.php?id=".$this->user[0]['id'];?>">Certificat de vaccination : </a></th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>
<th style="width:10px;" >Wilaya</th>
<th style="width:10px;" >Commune</th>
<th style="width:10px;" >adresse</th>
<th style="width:10px;" >Vaccin</th>
<th style="width:10px;" >Veterinaire</th>
<th style="width:10px;" >Update</th>
<th style="width:10px;" >Delete</th>
</tr>
<?php	
if (isset($this->userListview)) 
{
        foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
		 ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >	
		<td align="center" ><?php echo HTML::dateUS2FR($value['datevaccination']);?></td>
		<td align="center" ><?php echo HTML::nbrtostring('wil','IDWIL',$value['wil'],'WILAYAS');?></td>
		<td align="center" ><?php echo HTML::nbrtostring('com','IDCOM',$value['com'],'COMMUNE');?></td>
		<td align="center" ><?php echo $value['adresse'];?></td>
		<td align="center" ><?php echo $value['vaccin'];?></td>
		<td align="center" ><?php echo $value['veterinaire'];?></td>
		<td align="center"><a target="_blank" title="editer" href="<?php echo URL.'dashboard/editvac/'.$value['id'];?>"><img src="<?php echo URL.'public/images/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	    <td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dashboard/deletevac/'.$value['id'].'/'.$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>	
		</tr>
		<?php
		}
		$total_count=count($this->userListview);
		if($total_count==0) 
		{
		echo "<tr align=\"center\"   bgcolor=\"red\"  style=\"color:white;\"   ><td colspan=\"8\">Votre carnet de vaccination est vide   </td></tr>";
		}
}
?>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>
<th style="width:10px;" >Wilaya</th>
<th style="width:10px;" >Commune</th>
<th style="width:10px;" >adresse</th>
<th style="width:10px;" >Vaccin</th>
<th style="width:10px;" >Veterinaire</th>
<th style="width:10px;" >Update</th>
<th style="width:10px;" >Delete</th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="8"   >Nombre total de vaccination : <?php echo $total_count ;?></th>
</tr>	 	 	 	 
</table>	 
<?php HTML::Br(6);?>
	 
<h3 style="visibility: visible;"><span>Pourquoi</span> faut-il vacciner votre cheval ?</h3>
<ul>
<li>La vaccination est le moyen le plus efficace et le moins agressif de faire face aux maladies infectieuses. Elle consiste à déclencher les défenses spécifiques de l’individu pour éliminer les corps étrangers auxquels il peut être exposé.</li>
<li>Grâce à un système de mémoire, elle protège à plus ou moins long terme contre une nouvelle agression. C’est pourquoi il faut pratiquer des injections de rappels régulières.</li>
<li>La vaccination collective permet de limiter la prolifération du virus, d’éviter les séquelles physiques graves et les pertes économiques lourdes.</li>
<li>La vaccination est particulièrement conseillée - voire obligatoire – lors des déplacements et des rassemblements d’animaux.</li>
<li>La vaccination est un acte médical qui doit être pratiqué par un vétérinaire, car toute vaccination peut éventuellement être suivie d’effets indésirables.</li>
</ul>
<h3 style="visibility: visible;"><span>VACCINATIONS</span> OBLIGATOIRES EN ALGERIE</h3>
<h4>La rage</h4>
<p>La vaccination antirabique est obligatoire pour tous les chevaux accessibles au public et pour tous les chevaux participant aux compétitions équestres. Dans les zones déclarées infectées elle est également obligatoire pour les chevaux qui séjournent ou qui participent à des expositions.</p>
<p>En Algérie, la vaccination antirabique est fortement recommandée.</p>
<h4>La grippe</h4>
<p>La vaccination antigrippale est obligatoire pour participer à toute compétition équestre, pour accéder aux terrains d’entraînement, aux hippodromes et aux établissements appartenant aux sociétés de courses.</p>
<h3 style="visibility: visible;"><span>LA</span> VACCINATION CONTRE LA GRIPPE</h3>
<p>La vaccination grippe est obligatoire pour participer à toute compétition équestre.</p>
<p>Primo-vaccination : 2 injections espacées de 21 à 92 jours.<br>Rappel annuel à 365 jours (pour les chevaux qui restent dans leur club et ne concourent pas en dehors de la région où ils se trouvent) ;</p>
<p>Depuis le 01 janvier 2005 la FEI exige que les rappels se feront tous les 6 mois +/- 21 jours (pour les chevaux participant aux concours officiels régionaux, nationaux et internationaux). &nbsp;</p>
<h4>La grippe équine : le virus de la grippe équine est un virus qui évolue : &nbsp;</h4>
<p>La grippe est une maladie virale très contagieuse due à deux sous-types de virus spécifiques (famille des orthomyxovirus) dont l’un présente la particularité de muter au cours des années, tout comme celui qui atteint l’homme. Il est nécessaire de suivre l’évolution de ces virus pour renforcer l’efficacité de la vaccination.</p>
<h4>Les signes de la grippe</h4>
<ul>
<li>Fièvre</li>
<li>Toux</li>
<li>Perte de l’appétit</li>
<li>Amaigrissement</li>
<li>Affaiblissement général</li>
</ul>
<h4>Les complications</h4>
<ul>
<li>Bronchite chronique</li>
<li>Surinfection : œdème pulmonaire, broncho-pneumonie…</li>
</ul>
<p>Les conséquences peuvent être mortelles chez le poulain, les adultes quant à eux doivent être soignés et mis au repos, voire isolés pendant au moins 3 semaines.</p>
<h4>Les avantages de la vaccination antigrippale</h4>
<ul>
<li>Elle prévient l’apparition d’épidémie.</li>
<li>Elle est possible chez tous les chevaux. Chez le poulain, la vaccination peut débuter dès l’âge de 6 mois si la mère est vaccinée et dès l’âge de 4 mois dans le cas contraire.</li>
</ul>
<h4><br>LA VACCINATION ANTITÉTANIQUE</h4>
<h4>Primo-vaccination :</h4>
<ul>
<li>2 injections à 1 mois d’intervalle.</li>
</ul>
<h4>1er rappel : 1 an après.</h4>
<p>Puis rappels tous les 3 ans.<br>Bien que non obligatoire, la vaccination antitétanique est fortement recommandée, le cheval étant particulièrement sensible à cette affection.</p>
<h4>Le tétanos chez le cheval :une maladie très grave, fréquemment mortelle</h4>
<p>L’espèce équine est particulièrement sensible à cette affection virulente.<br>Cette pathologie souvent fatale est due à un bacille «Clostridium Tetani » qui se multiplie au niveau des plaies et secrète une toxine provoquant des contractions ou tétanies musculaires.</p>
<h4>Le mode d’infection</h4>
<p>Le microbe du tétanos est présent dans tout l’environnement : terre, fumier, fourche… et s’y conserve presque indéfiniment.<br>Toute plaie du cheval, même minime est susceptible d’être contaminée et doit donc être soignée et désinfectée minutieusement.<br>Le cheval blessé doit alors recevoir une injection de sérum antitétanique, voire un rappel de vaccination.</p>
<h4>Les symptômes</h4>
<p>• Tétanies musculaires.</p>
<h4>Les avantages de la vaccination antitétanique</h4>
<ul>
<li>Elle est à l’origine d’une protection très efficace.</li>
<li>Elle peut être pratiquée chez le cheval dès l’âge de 2 mois.</li>
</ul>
<h3 style="visibility: visible;"><span>LA</span> VACCINATION ANTIRABIQUE</h3>
<h4>Primo-vaccination :</h4>
<p>Une seule injection (sauf pour les poulains de moins de 6 mois pour lesquels on fait 2 injections à un mois d’intervalle).<br>La vaccination antirabique est obligatoire pour tous les chevaux accessibles au public. Elle est obligatoire pour tous les chevaux participant aux compétitions équestres La vaccination antirabique est obligatoire pour les chevaux qui séjournent ou participent à des expositions dans des départements déclarés infectés.</p>
<h4>La rage : une maladie toujours mortelle</h4>
<p>Malgré le déploiement de l’état par l’application d’un programme de vaccination antirabique sur tout le territoire national. Néanmoins la rage fait toujours l’objet d’une surveillance sanitaire très stricte.</p>
<h4>Mode d’infection</h4>
<p>La rage est due à un virus présent dans la salive des animaux infectés et transmise principalement par morsure.<br>En Europe, ce sont les renards contaminés qui transmettent la maladie aux animaux domestiques et à l’homme.</p>
<h4>Les avantages de la vaccination contre la rage</h4>
<p>Elle ne nécessite qu’une seule injection par an lorsque le cheval a plus de 6 mois et protège très efficacement tous les individus.</p>	 