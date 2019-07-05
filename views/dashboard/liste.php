
<h1>Releve Des Signalements</h1>
<hr/><br/>


<?php
// if (!empty($this->userListview)) 
// {
// echo 'existe'.$this->userListview;
// echo '<pre>';print_r ($this->userListview);echo '<pre>';  
// }
// else
// {
// echo 'noteexiste';
// }


if (!empty($this->userListview)) 
{
	echo'<table width="100%" border="1" cellpadding="5" cellspacing="1" align="center">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th style="width:10px;"  colspan="12" >';
	echo 'Releve Des Signalements  '; echo '&nbsp;';	
	echo '<a href="'.URL.'tcpdf/livret_fei.pdf">  PDF </a>'; echo '&nbsp;';	
	echo'</th>';
	echo'<th style="width:10px;" colspan="2">Impression</th>';
	echo'<th style="width:10px;" rowspan="2">Changements</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:25px;">ID</th>';
	echo'<th style="width:25px;">view</th>';
	echo'<th style="width:50px;">Proprietaire</th>';
	echo'<th style="width:50px;">Signalement</th>';
	echo'<th style="width:50px;">N</th>';
	echo'<th style="width:60px;">Produit</th>';
	echo'<th style="width:60px;">Pere</th>';
	echo'<th style="width:60px;">Mere</th>';
	echo'<th style="width:60px;">Sexe</th>';
	echo'<th style="width:10px;">approuvé</th>';
	echo'<th style="width:10px;">Update</th>';
	echo'<th style="width:10px;">Delete</th>';
	echo'<th style="width:100px;">Certificat</th>';
	echo'<th style="width:100px;">Livret</th>';
	echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
            echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo'<td align="center" >'.$value['id'].'</td>';
			
			
			
			?>
			

			
				
				
				<td align="center" class="bg-gray" style="padding: 0px 0px;"><button onclick="document.location='<?php echo URL.'dashboard/view/'.$value['id'];?>'"   title="View <?php   echo $value['NomP'].', '.$value['NomA']?>'s Record">&nbsp;&nbsp;<img src="<?php echo URL.'public/images/open.PNG';?>" width='16' height='16' border='0' alt=''/>&nbsp;&nbsp;</button></td>
				<td align="left" ><?php echo $value['NomP'];?></td>
				<td align="center" bgcolor="lightblue"><a title="Update signalement <?php echo trim($value['NomP']).', '.trim($value['NomA'])?>'"" href="<?php echo URL."dashboard/createimage/".$value['id'];?>"><img src="<?php echo URL.'public/images/'.$value['id'].'.jpg';?>" width='16' height='16' border='0' alt=''/></a></td>
				<td align="left" ><?php echo $value['N'];?></td>
				<td align="left" ><?php echo $value['NomA'];?></td>
				<td align="left" ><?php echo $value['Pere'];?></td>
				<td align="left" ><?php echo $value['mere'];?></td>
				<td align="center" ><?php echo $value['Sexe'];?></td>
				<?php
				 if ($value['aprouve']==1){
				 ?>
				 <td align="center"><img src="<?php echo URL.'public/images/ok.jpg';?>" width='16' height='16' border='0' alt=''/></td>
				 <?php
				 }else{
				 ?>
				 <td align="center"><img src="<?php echo URL.'public/images/non.jpg';?>" width='16' height='16' border='0' alt=''/></td>
				 <?php
				 }
				 ?>
				<td align="center"><a target="_blank" title="editer" href="<?php echo URL.'dashboard/edit/'.$value['id'];?>"><img src="<?php echo URL.'public/images/edit.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
				<td align="center"><a class="delete" title="supprimer" href="<?php echo URL.'dashboard/delete/'.$value['id'];?>"><img src="<?php echo URL.'public/images/delete.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
				<td align="center" bgcolor="lightblue"><a target="_blank" title="certificat <?php echo trim($value['NomP']).', '.trim($value['NomA'])?>'""   href="<?php echo URL."tcpdf/certificat.php?id=".$value['id'];?>"><img src="<?php echo URL.'public/images/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
				<td align="center" bgcolor="lightblue"><a target="_blank" title="Livret <?php echo trim($value['NomP']).', '.trim($value['NomA'])?>'""  href="<?php echo URL."tcpdf/livret.php?id=".$value['id'];?>"><img src="<?php echo URL.'public/images/print.PNG';?>" width='16' height='16' border='0' alt=''/></a></td>
				<td align="center"><a target="_blank" title="sale" href="<?php echo URL.'dashboard/sale/'.$value['id'];?>"><img src="<?php echo URL.'public/images/pan.png';?>" width='16' height='16' border='0' alt=''/></a></td>
			</tr>
			<?php 
			}
			$total_count=count($this->userListview);
			if($total_count==0) 
			{
			echo "<tr align=\"center\"   bgcolor=\"red\"  style=\"color:white;\"   ><td colspan=\"15\">Votre Releve est vide   </td></tr>";
			}
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="15" ><span>' .$total_count.' record(s) found.</span></td></tr>';			

	echo "</table>";		
}
else 
{
// HTML::Br(22);

  // HTML::graphemois(30,240,'Deces Par Mois Arret Au  : ','','cheval','Datesigna','',date("Y"),'',"");
}



?>