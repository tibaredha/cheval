	<h1>Changement de Propriétaire  : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></h1><hr><br/>
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
	</fieldset>
	<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/createSale/".$this->user[0]['id'];  ?>"  method="POST"> 
		<fieldset id="fieldset1">
        <legend>Date </legend>
		<input  id="Dnsnp"   class="cheval"  type="txt"  name="datesale" autofocus   /></br>	  
		</fieldset>
		<fieldset id="fieldset1">
        <legend>Proprietaire </legend>
		Ancien :  <input  id="NomPAncien"  class="cheval" type="text" name="NomaP" placeholder="<?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomP'); ?>"/>
		Nouveau : <input  id="NomPNouveau"  class="cheval" type="text" name="NomP" placeholder="Nom Du Proprietaire"/>
		</fieldset>
		<fieldset id="fieldset1">
        <legend>Adresse</legend> 
		<?php HTML::PAYS('IDOrigine1','payssale','cheval','DZ','Algérie') ;?>
		<?php
		HTML::WILAYAx('WILAYAx','wil','country','17000','Wilaya de Residence') ;
		HTML::COMMUNEx('COMMUNEx','com','COMMUNEN','929','Commune de Residence') ;
		?>
		<input  id="adressep"  class="cheval" type="text" name="adresse" placeholder="adresse Du Proprietaire"/>
		</fieldset>
		<?php HTML::menuview1($this->user[0]['id'],$_SERVER['SERVER_NAME']);?>	
	 </form > 	 
<h1>Désignation de Propriétaire Successifs</h1>
<hr/><br/>	 
<table  width='65%' border='1' cellpadding='5' cellspacing='1' >	 
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="9"   ><a title="Certificat de Sale"   href="<?php ///echo URL."tcpdf/certificatSale.php?id=".$this->user[0]['id'];?>">Certificat de Sale : </a></th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:50px;" >Date</th>
<th style="width:10px;" >Wilaya</th>
<th style="width:10px;" >Commune</th>
<th style="width:10px;" >Adresse</th>
<th style="width:10px;" >Propritaire</th>
<th style="width:10px;" >Certificat</th>
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
		<td align="center" ><?php echo HTML::dateUS2FR($value['datesale']);?></td>
		<td align="center" ><?php echo HTML::nbrtostring('wil','IDWIL',$value['wil'],'WILAYAS');?></td>
		<td align="center" ><?php echo HTML::nbrtostring('com','IDCOM',$value['com'],'COMMUNE');?></td>
		<td align="center" ><?php echo $value['adresse'];?></td>
		<td align="center" ><?php echo $value['NomP'];?></td>
		<td align="center" bgcolor="lightblue"><a target="_blank" title="certificat <?php echo trim($value['NomP']).', '.trim($value['NomP'])?>'""   href="<?php echo URL."tcpdf/CHEVAL/certificatsale.php?id=".$value['id']."&idcheval=".$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
		
		<td align="center"><a target="_blank" title="editer" href="<?php echo URL.'dashboard/editSale/'.$value['id'];?>"><img src="<?php echo URL.'public/images/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	    <td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dashboard/deleteSale/'.$value['id'].'/'.$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>	
		</tr>
		<?php
		}
		$total_count=count($this->userListview);
		if($total_count==0) 
		{
		echo "<tr align=\"center\"   bgcolor=\"red\"  style=\"color:white;\"   ><td colspan=\"9\">Votre carnet de vente est vide</td></tr>";
		}
}
?>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>
<th style="width:10px;" >Wilaya</th>
<th style="width:10px;" >Commune</th>
<th style="width:10px;" >Adresse</th>
<th style="width:10px;" >Propritaire</th>
<th style="width:10px;" >Certificat</th>
<th style="width:10px;" >Update</th>
<th style="width:10px;" >Delete</th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="9"   >Nombre total de Sale : <?php echo $total_count ;?></th>
</tr>	 	 	 	 
</table>	 
 <?php HTML::Br(12);?>
	 
	 