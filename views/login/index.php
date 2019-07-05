<?php
if (isset($_SESSION['errorlogin'])) {
$sError = '<h1><span id="errorlogin">' . $_SESSION['errorlogin'] . '</span></h1>';		
echo $sError;			
}
else
{
$sError="<h1>Connecter A SIRE ONDEEC</h1><hr><br/>";
echo $sError;
}

?>
<?php HTML::photosdb('IS NOT NULL',''); ?>
<form action="login/run" method="post">	
<fieldset id="fieldset1">
<legend>ONDEEC</legend>
<input id="region" class="cheval" type="text" name="login" />
<input id="region" class="cheval" type="password" name="password" />
<input id="region1" type="submit" />
</fieldset>
</form>
<?php 
$w=400;$h=340;
echo "<p align=\"center\"><img  id=\"mydiv1\"   align=\"center\"  src=\"".URL.'public/images/logox.png'."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>"; 
HTML::Br(12);
 ?>