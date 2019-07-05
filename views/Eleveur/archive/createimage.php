<?php	
 $url1 = explode('/',$_GET['url']);	
?>

<br /><br />
<div id="Canvas"  align="center">
        <canvas id="myCanvas" width="700" height="500" style="border:2px solid green;">   </canvas>
		<br /><br />
		
		<label for=""id="Lselpen"  >Pen : </label>    
		<select id="selpen">    
			<option value="s">---------</option>
			<option value="d">=====</option>
			<option value="ls">IIIIIIIIII</option>
			<option value="ro">ooooo</option>
			<option value="lune">lung</option>
			<option value="luned">lund</option>
			<option value="epi">X_n</option>
			<option value="epiinf">X_i</option>
		    <option value="episup">X_s</option>
			<option value="gzd">//////////</option>
			<option value="gzl">\\\\\\\\\</option>
		    <option value="loz"><></option>
			<option value="zig">www</option>
		</select>
		<label for=""id="Linew"  >width : </label>    
		<select id="selWidth">
            <option value="1"selected="selected">1</option>
            <option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
            <option value="5">5</option>
			<option value="6">6</option>
            <option value="7">7</option>
			<option value="8">8</option>
            <option value="9" >9</option>
			<option value="10">10</option>
           
		</select> 
        <label for="" id="Linec"  >Color : </label> 
		<select id="selColor" style="background-color:yellow;"    >    
		
			<option value="red"     style="background-color:red;     color:white" selected="selected" >red</option>
			<option value="black"   style="background-color:black;   color:white">black</option> 
		    <option value="white"   style="background-color:white;   color:black">white</option>
			<option value="silver"  style="background-color:silver;  color:white" >silver</option>
			<option value="gray"    style="background-color:gray;    color:white" >gray</option>
			<option value="maroon"  style="background-color:maroon;  color:white" >Maron</option>
			<option value="lime"    style="background-color:lime;    color:black">lime</option>
			<option value="green"   style="background-color:green;   color:white" >green</option>
			<option value="yellow"  style="background-color:yellow;  color:black" >yellow</option>
			<option value="olive"   style="background-color:olive;   color:white" >olive</option>
			<option value="blue"    style="background-color:blue;    color:white" >blue</option>
			<option value="navy"    style="background-color:navy;    color:white" >navy</option>
			<option value="fuchsia" style="background-color:fuchsia; color:white">fuchsia</option>
			<option value="purple"  style="background-color:purple;  color:white" >purple</option>
			<option value="aqua"    style="background-color:purple;  color:white" >aqua</option>
			<option value="teal"    style="background-color:teal;    color:white">teal</option>       
		</select>
		
		<h4 id="prop"><?php echo"Relevé de signalement graphique Du cheval   : ".HTML::nbrtostring('cheval','id',$url1[2],'NomA'); ?></h4>		
        <h4 id="prop1"><?php echo"Nom Du Proprietaire : ".HTML::nbrtostring('cheval','id',$url1[2],'NomP'); ?></h4>
		<h4 id="prop2"><?php echo"Dns Du cheval : ".HTML::nbrtostring('cheval','id',$url1[2],'Dns'); ?></h4>
		<h4 id="prop3"><?php echo"Pere Du cheval : ".HTML::nbrtostring('cheval','id',$url1[2],'Pere'); ?></h4>
		<h4 id="prop4"><?php echo"Mere Du cheval : ".HTML::nbrtostring('cheval','id',$url1[2],'mere'); ?></h4>
		<h4 id="prop5"><?php echo HTML::nbrtostring('cheval','id',$url1[2],'N'); ?></h4>
		
		
		
		 <button id="Clearcanva" onclick="javascript:drawImage();return false;"><?php echo '<img src="'.URL.'public/images/reset.PNG"   width="16" height="16" border="0" alt=""   />';?></button>
		 <button id="Reccanva"   onclick="javascript:rec(<?php echo $last_id=$url1[2];?>,'<?php echo $_SERVER['SERVER_NAME'];?>');return false;"><?php echo '<img src="'.URL.'public/images/save.PNG"   width="16" height="16" border="0" alt=""   />';?></button>
         <button id="cUndo"      onclick="javascript:cUndo();return false;"  ><?php echo '<img src="'.URL.'public/images/b_firstpage.png"   width="16" height="16" border="0" alt=""   />';?></button>
         <button id="cRedo"      onclick="javascript:cRedo();return false;"  ><?php echo '<img src="'.URL.'public/images/b_lastpage.png"    width="16" height="16" border="0" alt=""   />';?></button>
		
		
		
		</div>
        <div id="stats" >x:0 y:0</div>
		<script type="text/javascript" src="<?php echo URL.'public/js/JsCode1.js?t='.time(); ?>"></script>


<?php

HTML::Image(URL."public/images/logoof.png?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva3');
$fichier0 = "d:/cheval/public/images/".$url1[2].'.jpg' ;
if (file_exists($fichier0))
{
HTML::Image(URL."public/images/".$url1[2].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva1');

}
else 
{
HTML::Image(URL."public/images/ch1.jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva1');

}
$fichier1 = "d:/cheval/public/images/cheval/".$url1[2].'.jpg' ;
if (file_exists($fichier1))
{
HTML::Image(URL."public/images/cheval/".$url1[2].".jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva2');
}
else 
{
HTML::Image(URL."public/images/cheval/cr.jpg?t=".time(), $width = 200, $height = 250, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='imagecanva2');
}

?>	
	
	
	
	
	
	
	
	
	
	
	
	