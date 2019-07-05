<?php
if (isset($_SESSION['errorregister'])) {
$sError = '<h1><span id="error">' . $_SESSION['errorregister'] . '</span></h1><hr><br/>';		
echo $sError;			
}
else
{
$sError="<h1>Créer un compte SIRE ONDEEC</h1><hr><br/>";
echo $sError;
}
?>
<?php HTML::photosdb('IS NOT NULL',''); ?>
<form action="register/Registerrun" method="post">	
<fieldset id="fieldset1">
<legend>ONDEEC</legend>
<?php HTML::REGION('region','cheval0','1','Region') ;	?>
<?php HTML::WREGION('wregion','cheval1','22','Wilaya');?>
<?php HTML::STATION('station','cheval2','30','Station');?>
<input id="region" class="cheval" type="hidden"  name="role" value="default" />
<input id="region" class="cheval" type="text" name="login" minlength="4" maxlength="12" required />
<input id="region" class="cheval" type="password" name="password" minlength="4" maxlength="12" required/>
<input id="region1" type="submit" />
</fieldset>
</form>
<?php 
$w=400;$h=340;
echo "<p align=\"center\"><img  id=\"mydiv1\"   align=\"center\"  src=\"".URL.'public/images/logox.png'."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>"; 
HTML::Br(12);
?>

<!--
</br>
<p >En cliquant sur valider un compte,</p></br>
<p >y compris notre Utilisation des cookies.</p></br>
<p >vous acceptez nos Conditions et indiquez que vous avez lu notre Politique d’utilisation des données,</p></br>
<p >Vous pourrez recevoir des notifications par texto de la part de SIRE ONDEEC et pouvez vous désabonner à tout moment.</p></br>
<p id="lrege">region</p></br>
<?php //HTML::REGION_F('id','region','nom','1','region');?>
<p id="lts"   >type structure</p></br>
<?php //HTML::TS_HJSP('id','region','nom1','1','type_structure');?>
-->




