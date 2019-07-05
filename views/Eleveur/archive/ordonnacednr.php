<SCRIPT LANGUAGE="JavaScript">
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "/mvc/public/js/m.PHP",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(/mvc/public/js/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
</script>
<h1>Ordonnance : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></h1><hr><br/>
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
	
	<?php
	//HTML::Image(URL."public/images/images.jpg", $width = 400, $height = 440, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
	?>
	</fieldset>

<form id="Canvas" name="formGCS" action="<?php echo URL."dashboard/ajouterArticle/";  ?>"  method="POST"> 

         <?php HTML::menuview1($this->user[0]['id'],$_SERVER['SERVER_NAME']);?>	


<?php   
function medicament($x,$y,$name,$db_name,$tb_name) 
	{
	// echo "<div class=\"cheval\" style=\" position:absolute;left:".$x."px;top:".$y."px;\">";	
	$db_host="localhost"; 
	$db_name="cheval"; 
	$db_user="root";
	$db_pass="";
	$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
	echo "<select size=1 id=\"ordo\" name=\"".$name."\">"."\n";
	echo"<option value=\"1\" selected=\"selected\">Designation Produit</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name order by mecicament" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['mecicament'].$data['pre'].'</option>';
	}
	echo '</select>'."\n"; 
	// echo "</div>";
	}


medicament(0,0,'libelleProduit','cheval','pha');           
 ?>
 <br/>
<input  id="N"     class="cheval" type="text" name="doseparprise"         placeholder="Dose par prise"  />
<input  id="N"     class="cheval" type="text" name="nbrdrfoisparjours"    placeholder="Nbr de fois par jours" />
<input  id="N"     class="cheval" type="text" name="nbrdejours"           placeholder="Nbr de jours"/>
<input  id="N"     class="cheval" type="text" name="qteProduit"           placeholder="Qte Produit"/> 
<input  id="N"     class="cheval" type="text" name="prixProduit"          placeholder="prix Produit"/>
<input id="N6"     class="cheval" type="hidden" name="date"                 value="<?php echo date('Y-m-d');  ?>"/>
<input id="N7"     class="cheval" type="hidden" name="id"                   value="<?php echo $this->user[0]['id'];  ?>"/> 

</form > 
<?php 
$x=25;
$y=250+60;
echo "<div  style=\" position:absolute;left:".$x."px;top:".$y."px;\">";
echo"<table width='97%' border='1' cellpadding='5' cellspacing='1' align='left'>";
echo"<tr bgcolor=\"#98F5FF\"  ><th colspan=\"7\">Votre Ordonnance (max 06 medicaments) </th></th>";
echo"<tr bgcolor=\"#98F5FF\" >";
echo"<th style=\"width:700px;\"    id=\"tiba\" >Libellé</th>";
echo"<th>Dose</th>";
echo"<th>Nbr/jours</th>";
echo"<th>jours</th>";
echo"<th>Quantite </th>";
echo"<th>Prix</th>";
echo"<th>Action</th>";
echo"</tr>";
echo"</tr>";
	if ( Dashboard::creationPanier()  )
	{
	   $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
	   if ($nbArticles <= 0)
	   echo "<tr bgcolor=\"red\" style=\"color:white;\" ><td align=\"center\" colspan=\"7\" >Votre Ordonnance est vide </ td></tr>";
	   else
	   {
	      for ($i=0 ;$i < $nbArticles ; $i++)
	      {
	         echo '<tr  bgcolor="#F0FFF0" >';
	         echo "<td>".HTML::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.HTML::nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre')."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['doseparprise'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdrfoisparjours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['nbrdejours'][$i])."</ td>";
	         echo "<td>".htmlspecialchars($_SESSION['ordonnace']['qteProduit'][$i])."</ td>";	          
			 echo "<td>".htmlspecialchars($_SESSION['ordonnace']['prixProduit'][$i])."</ td>";	          
			 //echo "<td align=\"center\"  ><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
	         //echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
			 echo "<td align=\"center\"><a href=\"".URL."dashboard/supprimerArticle/".$_SESSION['ordonnace']['libelleProduit'][$i]."/".$this->user[0]['id']."\"><img src=\"".URL."public/images/delete.PNG\"     width=\'20\' height=\'20\' border=\'0\'alt=\'\' /></a></td>";  
			 echo "</tr>";
	      }
	      echo '<tr bgcolor="#98F5FF" ><td colspan="7">'; 
		  echo "Nombre total de medicament : ".Dashboard::compterArticles();
		  echo "</td>";	     
		  echo "</tr>";
		  echo '<tr bgcolor="#98F5FF"     ><td colspan="3">Montant total'; 
		  $ttc=Dashboard::MontantGlobal()*1;
		  echo "</td>";
	      echo "<td colspan=\"4\">";
	      echo "Total TTC: ".$ttc." DA ";
	      echo "</td>";
		  echo "</tr>";
		echo '<tr  bgcolor="#F0F8FF" >';//
		      echo "<td align=\"center\"   colspan=\"3\">";
			  echo '&nbsp;'; echo '<a href="'.URL.'dashboard/supprimePanier/'.$this->user[0]['id'].'"><img src="'.URL.'public/images/delete.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/>Suprimer</a>';echo '&nbsp;'; 
			  echo "</td>";
			  echo "<td  align=\"center\" colspan=\"4\">";
			  echo '<a href="'.URL.'tcpdf/cheval/ordonnance.php?id='.$this->user[0]['id'].'"><img src="'.URL.'public/images/print.PNG'.'" width=\'20\' height=\'20\' border=\'0\' alt=\'\'/>Imprimer</a>';echo '&nbsp;'; 
			  echo "</td>";
		echo "</tr>";	  
	   }
	}
echo"</table>"	;
echo "</div>";

 HTML::Br(35);





?>