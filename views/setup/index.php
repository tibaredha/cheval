<h1>Installation steps</h1><hr><br/>
<fieldset id="fieldset0">
        <legend>***</legend>
		<?php
		HTML::Image(URL."public/images/images.jpg", $width = 400, $height = 440, $border = -1, $title = -1, $map = -1, $name = -1, $class = 'image',$id='image');
		?>
		</fieldset>
<div>  
<ol>
<li><b>Introduction</b></li>
<li>EULA</li>
<li>Server requirements</li>
<li>File permissions</li>
<li>Database connection</li>
<li>Import SQL</li>
<li>Done</li>
</ol>
</div>

<?php 
	echo'<h3>Introduction</h3>';
	echo '<p>You are about to install ';
	echo '<b>Chevalvet Setup Wizard';
	echo '</b>';
	echo ' ( Version : 1.0';
	echo ' ) developed by';
	echo '<b> dr tiba redha';
	echo '</b>.</p>';
	echo '<form action="'.URL.'setup/step1" method="post">';
	echo '<input type="hidden" name="nextStep" value="eula"> <br />';
	echo '<button type="submit" id="Clear"  ><img src="'.URL.'public/images/tick.png" alt=""/> Start</button>';
	echo '</form>';
echo '';
?>
</br></br></br></br></br></br></br></br></br></br></br></br></br>
<hr>

