<h1>Evaluation : Station </h1><hr><br/>
<fieldset id="fieldset0">
<legend>ONDEEC</legend>
<?php HTML::photosdb('='.Session::get('station')); ?>
</fieldset>
<p id="ONDEEC1">ONDEEC</p>
<form action="<?php echo URL; ?>tcpdf/evaluation.php" method="post">	
<input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>




<fieldset id="fieldset1">
    <legend>Date debut-fin</legend>
<input  id="Datedebut"   class="cheval"type="txt"  name="Datedebut"  placeholder=" jj-mm-aaaa  "/>
<input  id="Datefin"   class="cheval"type="txt"  name="Datefin"  placeholder=" jj-mm-aaaa  "/>
<select id="Evaluation"  class="cheval" name="Evaluation"  >  
			<option value="0">Registre signalement</option>  
			<option value="1">Registre saillie</option>  
			<option value="2">Bilan saison de monte</option>
			<option value="3">Station de monte</option>
			<option value="4">Stud book global</option>
			<option value="5">Stud book Pur-Sang-Arabe</option>
			<option value="6">Stud book Pur-Sang-Anglais</option>
			<option value="7">Stud book Arabe-Barbe</option>
			<option value="8">Stud book Baudets</option>
			<option value="9">Stud book Barbe</option>
			</select>	

</fieldset>
<button id="Cleara" onclick="javascript:window.location.reload();return false;">Clear Area</button>
<label></label><input id="Clearb" type="submit" />
<button id="Clearc" onclick="javascript:list('<?php echo $_SERVER['SERVER_NAME'];?>');return false;">Lister</button>
</form><br/>
<?php 
HTML::multigraphe(30,340,'Produits Par annee et type monte  Arret Au : ','cheval','dns','Sexe','M','F','station','='.Session::get('station')) ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'Evaluation');
 ?>

<!-- bovines (herd-book) ovines (flock-book), porcines, équines (stud book) */

Actuellement, 53 stud-books (races équines et asines) sont gérés en France par l'Ifce.

Les stud-books contiennent la liste officielle des chevaux appartenant à une race :

La liste des étalons ayant produit dans l'année pour ce stud-book et de leurs produits de l'année
La liste des poulinières ( est une jument destinée à la reproduction) ayant produit dans l'année pour ce stud-book et de leurs produits antérieurs
La liste des produits nés dans l’année et inscrits au stud-book
La liste des éleveurs naisseurs dans la race

Ils peuvent contenir d’autres informations, comme par exemple la liste des équidés importés,exportés ou la liste des équidés inscrits à titre initial.
-->