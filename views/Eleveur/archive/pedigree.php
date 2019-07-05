
	
	<h1>Pedigree  : <?php echo  HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA'); ?></h1><hr><br/>
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
	<form id="Canvas" name="formGCS"  action="<?php echo URL."dashboard/***/".$this->user[0]['id'];  ?>"  method="POST"> 
       <fieldset id="pedigree0">
        <legend>Consultez l'ensemble des ascendants du cheval sur 3 générations origine connue. </legend>
		
		<label   for=""id="pedigreex"    style="background-color: <?php echo   HTML::Pedigreecolor ($this->user[0]['Race']); ?> ;  color: white;"    >
		<?php echo  "<a style=\"color: white;    \"   title=\"afficher sa page\" href=\"".URL."dashboard/view/".$this->user[0]['id']."\" >".HTML::nbrtostring('cheval','id',$this->user[0]['id'],'NomA')."</a>"; 
		if ($this->user[0]['Sexe']=='M') {
		echo  "&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>";
		} else {
		echo  "&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>";
		}
		?>
		</label>
		<svg width="100" height="100" id="svg1"  ><line x1="0" y1="100" x2="200" y2="-100" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
        <svg width="100" height="100" id="svg2"  ><line x1="0" y1="0" x2="200" y2="200" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
        
		<svg width="100" height="100" id="svg3"  ><line x1="0" y1="100" x2="200" y2="15" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
		<svg width="100" height="100" id="svg4"  ><line x1="0" y1="0" x2="200" y2="90" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
 
		
		<svg width="100" height="100" id="svg5"  ><line x1="0" y1="100" x2="200" y2="15" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
		<svg width="100" height="100" id="svg6"  ><line x1="0" y1="0" x2="200" y2="90" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
 
		<svg width="100" height="100" id="svg7"  ><line x1="0" y1="100" x2="200" y2="75" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
		<svg width="100" height="100" id="svg8"  ><line x1="0" y1="0" x2="200" y2="35" style="stroke:rgb(255,0,0);stroke-width:2" /></svg>
 
		<label   for=""id="pedigree1234"><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".$this->user[0]['idpere']."\" >".HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'NomA')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree5678"><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".$this->user[0]['idmere']."\" >".HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'NomA')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
	    
		<label   for=""id="pedigree12"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idpere'),'id')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idpere'),'NomA')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree34"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idmere'),'id')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idmere'),'NomA')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree56"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idpere'),'id')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idpere'),'NomA')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree78"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idmere'),'id')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idmere'),'NomA')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		
		<label   for=""id="pedigree1"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idpere'),'id'),'Pere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idpere'),'id'),'Pere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree2"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idpere'),'id'),'mere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idpere'),'id'),'mere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree3"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idmere'),'id'),'Pere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idmere'),'id'),'Pere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree4"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idmere'),'id'),'mere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idpere'],'idmere'),'id'),'mere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree5"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idpere'),'id'),'Pere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idpere'),'id'),'Pere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree6"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idpere'),'id'),'mere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idpere'),'id'),'mere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree7"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idmere'),'id'),'Pere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idmere'),'id'),'Pere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/mas.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		<label   for=""id="pedigree8"  ><?php echo  "<a title=\"afficher sa page\" href=\"".URL."dashboard/view/".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idmere'),'id'),'mere')."\" >".HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',HTML::nbrtostringv('cheval','id',$this->user[0]['idmere'],'idmere'),'id'),'mere')."</a>&nbsp;&nbsp;<img src=\"".URL."public/images/fem.jpg\"width=\"16\" height=\"16\" border=\"0\" alt=\"\"/>"; ?></label>
		
		<label for=""id="pedigree9"  >NB : Cliquez sur le nom d'un CHEVAL pour afficher sa page d'informations générales</label>		
		</fieldset>
		
		<?php HTML::menuview2($this->user[0]['id'],$_SERVER['SERVER_NAME']);?>	
	 </form > 	  
 <?php HTML::Br(1);?>
	 
	 