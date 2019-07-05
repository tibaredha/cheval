
<h1>Test de laboratoire : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></h1><hr><br/>
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

	<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/createbilan/".$this->user[0]['id'];  ?>"  method="POST"> 
		
		<fieldset id="fieldset1">
        <legend>Date </legend>
		<input  id="datebilan"   class="cheval"  type="date"  name="datebilan"  placeholder=" (0000-00-00)"/></br>
		</fieldset> 
		
		<fieldset id="fieldset1">
        <legend>Adresse </legend>
		 <?php HTML::WILAYAx('','wil','country','17000','Wilaya de Residence') ;HTML::COMMUNEx('','com','COMMUNEN','929','Commune de Residence') ;?>		<input  id="adresseb"  class="cheval" type="text" name="adresse" placeholder="adresse"/></br>
		</fieldset>
		
		<fieldset id="fieldset1">
		<legend>Type d'examen:</legend>
		<?php
	    HTML::BILANx('','bilan','cheval','val',"Type d'examen") ;
	    ?>
		</fieldset>
		
		
		<fieldset id="fieldset1">
		<legend>Nom Du Veterinaire</legend>
		<input  id="veterinaireb"  class="cheval" type="text" name="veterinaire" placeholder="Nom Du Veterinaire"/></br>
		</fieldset> 
	     <?php HTML::menuview1($this->user[0]['id'],$_SERVER['SERVER_NAME']);?>	
	 </form > 
	 
<h1>Releve Des Tests de laboratoire</h1>
<hr/><br/>	 
	 
<table  width='58%' border='1' cellpadding='5' cellspacing='1' >	 
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="8"   ><a title="Releve Des Tests de laboratoire"   href="<?php echo URL."tcpdf/certificatvac.php?id=".$this->user[0]['id'];?>">Releve Des Tests de laboratoire : </a></th>



</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>
<th style="width:10px;" >Wilaya</th>
<th style="width:10px;" >Commune</th>
<th style="width:10px;" >adresse</th>
<th style="width:10px;" >bilan</th>
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
		<td align="center" ><?php echo HTML::dateUS2FR($value['datebilan']);?></td>
		<td align="center" ><?php echo HTML::nbrtostring('wil','IDWIL',$value['wil'],'WILAYAS');?></td>
		<td align="center" ><?php echo HTML::nbrtostring('com','IDCOM',$value['com'],'COMMUNE');?></td>
		<td align="center" ><?php echo $value['adresse'];?></td>
		<td align="center" ><?php echo HTML::nbrtostring('bilansbiologiques','id',$value['bilan'],'bilansbiologique');?></td>
		<td align="center" ><?php echo $value['veterinaire'];?></td>
		<td align="center"><a target="_blank" title="editer" href="<?php echo URL.'dashboard/editbilan/'.$value['id'];?>"><img src="<?php echo URL.'public/images/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	    <td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dashboard/deletebilan/'.$value['id'].'/'.$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>	
		</tr>
		<?php
		}
		$total_count=count($this->userListview);
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
<th style="width:10px;" colspan="8"   >Nombre total de bilans : <?php echo $total_count ;?></th>
</tr>	 	 	 	 
</table>	 
 <br/> <br/> <br/> <br/> <br/> <br/>
	 
	 