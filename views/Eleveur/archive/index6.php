<h1><a title="Le signalement des équidés vademecum"  target="_blank"  href="<?php echo URL; ?>tcpdf/docpdf/fr/Le signalement des équidés vademecum.pdf">Signalement des équidés</a></h1><hr><br/>

<fieldset id="fieldset0">
<legend>ONDEEC</legend>
<?php HTML::photosdb('='.Session::get('station')); ?>
</fieldset>
<p id="ONDEEC1">ONDEEC</p>


<?php 
html::munu('cheval','dashboard','search'); 
$colspan=11;				
if (isset($this->userListview)) 
{
echo'<table width="960px" border="1" cellpadding="5" cellspacing="1" align="center">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th style="width:10px;"  colspan="12" >';
	echo 'Releve Des Signalements  '; echo '&nbsp;';	
	echo '<a href="'.URL.'tcpdf/livret_fei.pdf">  PDF </a>'; echo '&nbsp;';	
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:100px;">Num</th>';
	echo'<th style="width:50px;">view</th>';
	echo'<th style="width:50px;">Signalement</th>';
	echo'<th style="width:200px;">Proprietaire</th>';
	echo'<th style="width:200px;">Produit</th>';
	echo'<th style="width:10px;">Sexe</th>';
	echo'<th style="width:10px;">Certificat</th>';
	echo'<th style="width:10px;" >Livret</th>';
	echo'<th style="width:10px;" >Sale</th>';
	echo'<th style="width:10px;" >Update</th>';
	echo'<th style="width:10px;" >Delete</th>';
	echo'</tr>';
		
		foreach($this->userListview as $key => $value)
		{ 
		    // $bgcolor_donate = 'white';
            $bgcolor_donate ='#EDF7FF';
            echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="center" style="width:100px;">'.$value['N'].'</td>';
		    echo '<td align="center" class="bg-gray" style="padding: 5px 5px;">';  
			echo "<button onclick=\" document.location='".URL."dashboard/view/".$value['id']."'\">&nbsp;&nbsp; <img src=\"".URL."public/images/open.PNG\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>&nbsp;&nbsp;</button></td>";  
			echo '<td align="center" bgcolor="lightblue" ><a  title="Update signalement" href="'.URL.'dashboard/createimage/'.$value['id'].'"  ><img src="'.URL.'public/images/'.$value['id'].'.jpg"   width="20" height="20" border="0" alt=""   /></a></td>';
			echo '<td align="left" style="width:200px;" >'.$value['NomP'].'</td>';
			echo '<td align="left" style="width:200px;">'.$value['NomA'].'</td>';
			// echo '<td align="left" >'.$value['Pere'].'</td>';
			// echo '<td align="left" >'.$value['mere'].'</td>';
			echo '<td align="center"style="width:10px;" >'.$value['Sexe'].'</td>';
			// if ($value['aprouve']==1){
			// echo '<td align="center"><img src="'.URL.'public/images/ok.jpg"   width="16" height="16" border="0" alt=""   /></td>'; 
			// }else{
			// echo '<td align="center"><img src="'.URL.'public/images/non.jpg"   width="16" height="16" border="0" alt=""   /></td>';  
			 // }
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="certificat"  href="'.URL.'tcpdf/certificat.php?id='.$value['id'].'" ><img src="'.URL.'public/images/print.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="livret"  href="'.URL.'tcpdf/livret.php?id='.$value['id'].'" ><img src="'.URL.'public/images/print.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="sale"  href="'.URL.'dashboard/sale/'.$value['id'].'" ><img src="'.URL.'public/images/pan.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;"  ><a target="_blank" title="editer"  href="'.URL.'dashboard/edit/'.$value['id'].'" ><img src="'.URL.'public/images/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a  title="supprimer"  href="'.URL.'dashboard/delete/'.$value['id'].'" ><img src="'.URL.'public/images/delete.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
			header('location: ' . URL . 'dashboard/nouveau/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
			echo '<tr bgcolor="#00CED1"><td align="center" colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,'dashboard','search').'</td></tr>';	
			
			$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.'dashboard/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.'dashboard/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
			echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
			?> 
			<?php echo '<button '; echo ($page<=0)?'disabled':'';?>                  onclick="document.location='<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
			<?php echo '<button '; echo ($page>=$total_page*$limit)?'disabled':'';?> onclick="document.location='<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
			<?php 
	    }
echo "</table>";
HTML::Br(22);		
}
else 
{
HTML::multigraphe(30,340,'Produits Par annee et type monte  Arret Au : ','cheval','dns','Sexe','M','F','station','='.Session::get('station')) ;
HTML::footgraphe(HTML::nbrtostring('station','id',Session::get('station'),'station'),'graphe');		      
}				


?>




	