<h1>Saillie : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></h1><hr><br/>
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
<?php
//si etalon
if ($this->user[0]['Sexe']=='M'){
?>
<p id="ONDEEC1">ONDEEC</p>
<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/createsaillie/".$this->user[0]['id'];  ?>"  method="POST"> 
		
		<fieldset id="fieldset1">
        <legend>Date </legend>
		<input  id="datemonte"   class="cheval"  type="date"  name="datemonte"  placeholder=" (0000-00-00)" autofocus   /></br>	  
		</fieldset>
		
		<input type="hidden" name="region" value="<?php echo Session::get('region')  ;?>"/>
		<input type="hidden" name="wregion" value="<?php echo Session::get('wregion')  ;?>"/>
		<input type="hidden" name="station" value="<?php echo Session::get('station')  ;?>"/>
		
		<fieldset id="fieldset1">
		<legend>type</legend>
		<select id="typemonte"  class="cheval" name="typemonte"  >  
			<option value="main">main</option> 
			<option value="libre">libre</option>
			<option value="IA">IA</option>
			<option value="TE">TE</option>	
		</select></br>
		</fieldset>
		<fieldset id="fieldset1">
		<?php
		if ($this->user[0]['Sexe']=='M'){
		echo '<legend>La Jument</legend>';
		HTML::EQUINx('jument','jument','class','','Nom De La Jument','F');
		echo '1 Saut<input  id="datemonte1"   class="cheval"  type="date"  name="datemonte1"  />';
		echo ' 2 Saut<input id="datemonte2"   class="cheval"  type="date"  name="datemonte2"  />';
		echo ' 3 Saut<input id="datemonte3"   class="cheval"  type="date"  name="datemonte3"  />';
		}
		if ($this->user[0]['Sexe']=='F'){
		echo "<legend>L'etalon</legend>";
		HTML::EQUINx('jument','jument','class','',"Nom De L'etalon",'M');
		}
		?>
		</fieldset>
		<fieldset id="fieldset1">
        <legend>Revue par l'etalon le</legend>
		<input  id="daterevue"   class="cheval"  type="date"  name="daterevue"  placeholder=" (0000-00-00)" autofocus   /></br>	  
		</fieldset>
		<fieldset id="fieldset1">
		<legend>Veterinaire</legend>
		<input  id="veterinaires"  class="cheval" type="text" name="veterinaire" placeholder="Nom Du Veterinaire"/></br>
		</fieldset>
		<fieldset id="fieldset1">
		<legend>Somme Recu</legend>
		<input  id="SommeRecu"  class="cheval" type="text" name="SommeRecu"   value="2000"  /></br>
		</fieldset>
		<?php
		if ($this->user[0]['Sexe']=='M'){
		HTML::menuview1($this->user[0]['id'],$_SERVER['SERVER_NAME']);
		}
		if ($this->user[0]['Sexe']=='F'){
		HTML::menuview2($this->user[0]['id'],$_SERVER['SERVER_NAME']);
		}
		?>
		
	 </form > 
	 
<h1>Registre de saillies : La saison de monte s’étend du 15/02 au 30/06.</h1>
<hr/><br/>	 
<br/><br/><br/><br/><br/><br/><br/>
<table  width='100%' border='1' cellpadding='5' cellspacing='1' >	 
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="9"   ><a title="Registre de saillies" target="_blank"  href="<?php echo URL."tcpdf/cheval/carnetsaillie.php?id=".$this->user[0]['id'];?>">Registre de saillies</a></th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:5px;" >Date</th>

<th style="width:5px;" >type Saillie</th>

<?php
if ($this->user[0]['Sexe']=='M'){
echo '<th style="width:10px;" >jument</th>';
}
if ($this->user[0]['Sexe']=='F'){
echo "<th style=\"width:10px;\" >L'etalon</th>";
}
?>
<th style="width:5px;" >Resultas</th>
<th style="width:5px;" >Poulin</th>
<th style="width:5px;" >Poulin</th>
<th style="width:5px;" >Certificat</th>
<th style="width:5px;" >Update</th>
<th style="width:5px;" >Delete</th>
</tr>
<?php	
if (isset($this->userListview)) 
{
        foreach($this->userListview as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
		 ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >	
	
		<td align="center" ><?php echo HTML::dateUS2FR($value['datemonte']);?></td>
		<td align="center" ><?php echo $value['typemonte'];?></td>
		<td align="center" ><a target="_blank" title="Visualiser dossier"   href="<?php echo URL."dashboard/view/".$value['jument'];?>"><?php echo HTML::nbrtostring('cheval','id',$value['jument'],'NomA') ;?></a></td>
		<?php 
		if ($value['Resultas']==0) {
		?>
		<td align="center"><a class="delete" title="Non feconde" href="<?php echo URL.'dashboard/editresultasmonte/'.$value['id'].'/'.$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
		<?php 
		}
		?>
		<?php 
		if ($value['Resultas']==1) {
		?>
		<td align="center"><a class="delete" title="Feconde" href="<?php echo URL.'dashboard/editresultasmonte/'.$value['id'].'/'.$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/ok.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>	
		<?php 
		}
		?>
		<?php 
		if ($value['poulin']==0) {
		?>
		<td align="center" ><a target="_blank"   class="delete" title="Ajout poulin " href="<?php echo URL.'dashboard/nouveauy/'.$value['id'].'/'.$this->user[0]['id'].'/'.$value['jument'];?>"><img src="<?php echo URL.'public/images/add.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
		
		<?php 
		}
		?>
		<?php 
		if ($value['poulin']!=0) {
		?>
		<td align="center" ><a   class="delete" title="poulin exste " href="<?php echo URL.'dashboard/Saillir/'.$this->user[0]['id'];?>"><img src="<?php echo URL.'public/images/non.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>
		<?php 
		}
		?>
		
		<?php 
		if ($value['poulin']==0) {
		?>
		<td align="center" ><?php echo HTML::nbrtostringv('cheval','id',$value['poulin'],'NomA') ;?></td>
		<?php 
		}
		?>
		<?php 
		if ($value['poulin']!=0) {
		?>
		<td align="center" ><a   class="delete" title="poulin " href="<?php echo URL.'dashboard/view/'.$value['poulin'];?>"><?php echo HTML::nbrtostringv('cheval','id',$value['poulin'],'NomA') ;?></a></td>
		<?php 
		}
		?>
		<td align="center" bgcolor="lightblue"><a target="_blank" title="certificat de sallie <?php //echo trim($value['NomP']).', '.trim($value['NomA'])?>'""   href="<?php echo URL."tcpdf/cheval/saillie.php?id=".$value['id'];?>"><img src="<?php echo URL.'public/images/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
		<td align="center"><a target="_blank" title="editer" href="<?php echo URL.'dashboard/editmonte/'.$value['id'];?>"><img src="<?php echo URL.'public/images/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
	    <td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dashboard/deletemonte/'.$value['id'].'/'.$this->user[0]['id'].'/'.$value['poulin'];?>"><img src="<?php echo URL.'public/images/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>	
		</tr>
		<?php
		}
		$total_count=count($this->userListview);
		if($total_count==0) 
		{
		echo "<tr align=\"center\"   bgcolor=\"red\"  style=\"color:white;\"   ><td colspan=\"9\">Votre carnet de Saillie est vide   </td></tr>";
		}
}

?>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>
<th style="width:10px;" >Saillie</th>
<?php
if ($this->user[0]['Sexe']=='M'){
echo '<th style="width:10px;" >jument</th>';
}
if ($this->user[0]['Sexe']=='F'){
echo "<th style=\"width:10px;\" >L'etalon</th>";
}
?>
<th style="width:5px;" >Poulin</th>
<th style="width:5px;" >Poulin</th>
<th style="width:10px;" >Resultas</th>
<th style="width:10px;" >Certificat</th>
<th style="width:10px;" >Update</th>
<th style="width:10px;" >Delete</th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="10"   >Nombre total de Saillie : <?php echo $total_count ;?></th>
</tr>	 	 	 	 
</table>	 
 <br/>


<?php
}
//si jument  seul la visualisation  des saillies est possible  
if ($this->user[0]['Sexe']=='F'){
?>
<p id="ONDEEC1">ONDEEC</p>
<form id="Canvas" name="formGCS" action="<?php echo URL."dashboard/createsaillie/".$this->user[0]['id'];  ?>"  method="POST"> 
        <h1> ***** : </h1>
		<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
		<?php
		if ($this->user[0]['Sexe']=='M'){
		HTML::menuview1($this->user[0]['id'],$_SERVER['SERVER_NAME']);
		}
		if ($this->user[0]['Sexe']=='F'){
		HTML::menuview2($this->user[0]['id'],$_SERVER['SERVER_NAME']);
		}
		?>
</form> 
	 
<h1> Registre de saillies : La saison de monte s’étend du 15/02 au 30/06 .</h1>
<hr/><br/>	
<br/><br/><br/><br/><br/><br/><br/>	<br/><br/><br/><br/><br/><br/><br/>	
<table  width='100%' border='1' cellpadding='5' cellspacing='1' >	 
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="6"   ><a title="Registre de saillies" target="_blank"  href="<?php echo URL."tcpdf/cheval/carnetsaillie.php?id=".$this->user[0]['id'];?>">Registre de saillies </a></th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>

<th style="width:10px;" >Sailli</th>

<?php
if ($this->user[0]['Sexe']=='M'){
echo '<th style="width:10px;" >jument</th>';
}
if ($this->user[0]['Sexe']=='F'){
echo "<th style=\"width:10px;\" >L'etalon</th>";
}
?>
<th style="width:10px;" >Poulin</th>
<th style="width:10px;" >Certificat</th>

</tr>

<?php	
if (isset($this->userListview1)) 
{
        foreach($this->userListview1 as $key => $value)
		{ 
		$bgcolor_donate ='#EDF7FF';
		 ?>
		<tr bgcolor='<?php echo $bgcolor_donate ;?>' onmouseover="this.style.backgroundColor='#9FF781';" onmouseout="this.style.backgroundColor='<?php echo $bgcolor_donate ;?>';" >	
		<td align="center" ><?php echo HTML::dateUS2FR($value['datemonte']);?></td>
	  
		<td align="center" ><?php echo $value['typemonte'];?></td>
		<td align="center" ><a target="_blank" title="Visualiser dossier"   href="<?php echo URL."dashboard/view/".$value['idcheval'];?>"><?php echo HTML::nbrtostring('cheval','id',$value['idcheval'],'NomA') ;?></a></td>
		<td align="center" ><?php echo HTML::nbrtostringv('cheval','id',$value['poulin'],'NomA') ;?></td>
		<td align="center" bgcolor="lightblue"><a target="_blank" title="certificat de sallie <?php //echo trim($value['NomP']).', '.trim($value['NomA'])?>'""   href="<?php echo URL."tcpdf/cheval/saillie.php?id=".$value['id'];?>"><img src="<?php echo URL.'public/images/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
		</tr>
		<?php
		}
		$total_count=count($this->userListview1);
		if($total_count==0) 
		{
		echo "<tr align=\"center\"   bgcolor=\"red\"  style=\"color:white;\"   ><td colspan=\"9\">Votre carnet de Saillie est vide   </td></tr>";
		}
}

?>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" >Date</th>

<th style="width:10px;" >Saillie</th>
<?php
if ($this->user[0]['Sexe']=='M'){
echo '<th style="width:10px;" >jument</th>';
}
if ($this->user[0]['Sexe']=='F'){
echo "<th style=\"width:10px;\" >L'etalon</th>";
}
?>
<th style="width:10px;" >Poulin</th>
<th style="width:10px;" >Certificat</th>
</tr>
<tr bgcolor="#00CED1"   >
<th style="width:10px;" colspan="9"   >Nombre total de Saillie : <?php echo $total_count ;?></th>
</tr>	 	 	 	 
</table>	 
 <br/>

<?php
}
?>	    
		
		
	
	
	
	 
	 