<h1><a title="Inscription Eleveur"  target="_blank"  href="<?php echo URL; ?>tcpdf/docpdf/fr/***.pdf">Inscription Eleveur</a></h1><hr><br/>

<?php 
$controleur="Eleveur";
html::munu('Eleveur',$controleur,'search'); 
// echo dirname(__FILE__);echo __DIR__ ;
// echo __FILE__ ;
$colspan=11;				
if (isset($this->userListview)) 
{
echo'<table width="100%" border="1" cellpadding="5" cellspacing="1" align="left">';
	echo'<tr bgcolor="#00CED1"   >';
	echo'<th style="width:10px;"  colspan="'.$colspan.'" >';
	echo 'Eleveur'; echo '&nbsp;';	
	echo '<a target="_blank"  href="'.URL.'tcpdf/docpdf/fr/***.pdf"> ***.PDF </a>'; echo '&nbsp;';	
	echo'</th>';
	echo'</tr>';
	echo'<tr bgcolor="#00CED1">';
	echo'<th style="width:10px;">view</th>';
	echo'<th style="width:100px;">Eleveur</th>';
	echo'<th style="width:20px;">Wilaya</th>';
	echo'<th style="width:20px;">Commune</th>';
	echo'<th style="width:20px;">Adresse</th>';
	echo'<th style="width:20px;">Equides</th>';
	echo'<th style="width:20px;">Attes</th>';
	echo'<th style="width:20px;">Carte</th>';
	echo'<th style="width:20px;">Pros</th>';
	echo'<th style="width:20px;">Upda</th>';
	echo'<th style="width:20px;">Dele</th>';
	echo'</tr>';
		foreach($this->userListview as $key => $value)
		{ 
            $bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;//.".jpg?t=".time()
			echo '<td align="center" class="bg-gray" style="padding: 5px 5px;">'; echo "<button onclick=\" document.location='".URL.$controleur."/view/".$value['id']."'\">&nbsp;&nbsp; <img src=\"".URL."public/images/open.PNG\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>&nbsp;&nbsp;</button></td>";  
			// echo '<td align="left" style="width:100px;">'.$value['NomP'].'</td>';
		    echo "<td align=\"left\"><a title=\"***\" href=\"".URL.$controleur."/***/".$value['id']."\" >".$value['NomP']."</a></td> " ;
			echo '<td align="left" style="width:100px;">'.HTML::nbrtostringv('wil','IDWIL',$value['wil'],'WILAYAS').'</td>';
			echo '<td align="left" style="width:100px;">'.HTML::nbrtostringv('com','IDCOM',$value['com'],'COMMUNE').'</td>';
			echo '<td align="left" style="width:100px;">'.$value['adresse'].'</td>';
			echo "<td align=\"center\"><a title=\"Liste equidé par eleveur\" href=\"".URL."dashboard/search/0/10?o=ideleveur&q=".$value['id']."\" >".HTML::nbrequide($value['id'])." équide(s)</a></td> " ;
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="Attestation eleveur "  href="'.URL.'tcpdf/cheval/attestation.php?id='.$value['id'].'" ><img src="'.URL.'public/images/atestation.jpg"   width="20" height="20" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="Carte eleveur "  href="'.URL.'tcpdf/cheval/Carteeleveur.php?id='.$value['id'].'" ><img src="'.URL.'public/images/carte.jpg"   width="20" height="20" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="Prospectus eleveur"  href="'.URL.'tcpdf/cheval/prospectus.php?id='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="20" height="20" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a target="_blank" title="Editer eleveur"      href="'.URL.$controleur.'/edit/'.$value['id'].'" ><img src="'.URL.'public/images/upd.jpg"                       width="20" height="20" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a title="Supprimer eleveur"  href="'.URL.$controleur.'/delete/'.$value['id'].'" ><img src="'.URL.'public/images/del.jpg"                                     width="20" height="20" border="0" alt=""   /></a></td>';
			echo'</tr>';	
		}
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		if ($total_count <= 0 )
		{
			echo '<tr><td align="center" colspan="'.$colspan.'" ><span> No record found for deces </span></td> </tr>';
			header('location: ' .URL.$controleur.'/nouveau/'.$this->userListviewq);
			echo '<tr bgcolor="#00CED1"  ><td align="left"   colspan="'.$colspan.'" ><span>' .$total_count1.'/'.$total_count.' Record(s) found.</span></td></tr>';					
		}
        else
		{		
			echo '<tr bgcolor="#00CED1"><td  align="center" colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$controleur,'search').'</td></tr>';	
			
			$limit=$this->userListviewl;		
			$page=$this->userListviewp;
			if ($page <= 0){$prev_page =$this->userListviewp;}else{$prev_page = $page-$limit;}
			$total_page = ceil($total_count/$limit); echo "<br>" ;  
			$prev_url = URL.$controleur.'/search/'.$prev_page.'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';   
			$next_url = URL.$controleur.'/search/'.($page+$limit).'/'.$limit.'?q='.$this->userListviewq.'&o='.$this->userListviewo.'';    
			echo '<tr bgcolor="#00CED1"  ><td align="center" colspan="'.$colspan.'" >';	
			?> 
			<?php echo '<button  id="bnbt"  '; echo ($page<=0)?'disabled':'';                 echo 'onclick=';  echo '"';  echo 'document.location='; ?> '<?php echo $prev_url; ?>'"> <?php echo ""; echo 'Previews</button>&nbsp;<span>[' .$total_count1.'/'.$total_count.' Record(s) found.]</span>'; ?>                              
			<?php echo '<button  id="bnbt" '; echo ($page>=$total_page*$limit)?'disabled':''; echo 'onclick=';  echo '"';  echo 'document.location='; ?> '<?php echo $next_url; ?>'"> <?php echo "Next</button>";?> 
			<?php 
	    }
echo "</table>";
HTML::Br(30);		
}
else 
{
HTML::photosdb('='.Session::get('station'),'1');
// HTML::Br(30);
HTML::graphemois(30,340,'Inscription Par Mois Arret Au  : ','','eleveur','Datesigna','',date("Y"),'','='.Session::get('station'));
HTML::footgraphee(HTML::nbrtostring('station','id',Session::get('station'),'station'),'graphe');		      
}				


?>

	