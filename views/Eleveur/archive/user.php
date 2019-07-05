<h1>Compte</h1><hr><br/>
<fieldset id="fieldset0">
<legend>ONDEEC</legend>
<?php HTML::photosdb('='.Session::get('station')); ?>
</fieldset>
<p id="ONDEEC1">ONDEEC</p>
<form method="post" action="<?php echo URL;?>dashboard/userSave/<?php echo Session::get('id');?>">
	<fieldset id="fieldset1">
        <legend>Adresse </legend>
		<?php
		HTML::REGION('region','cheval0',Session::get('region'),HTML::nbrtostring('region','id',Session::get('region'),'region'));
		HTML::WREGION('wregion','cheval1',Session::get('wregion'),HTML::nbrtostring('wilregion','id',Session::get('wregion'),'wilregion'));
		HTML::STATION('station','cheval2',Session::get('station'),HTML::nbrtostring('station','id',Session::get('station'),'station'));
		?>
		</fieldset>
	<fieldset id="fieldset1">
    <legend>Authentification</legend>
	Login<input type="text" name="login"   value="<?php echo Session::get('login');?>" />
	New Password<input type="text" name="password" />
	</fieldset>	
	<button id="Cleara" onclick="javascript:window.location.reload();return false;">Clear Area</button>
	<input  id="Clearb" type="submit" />
	<button id="Clearc" onclick="javascript:list();return false;">Lister</button>
</form>

<?php HTML::Br(2);?>


<?php
echo'<table width="50%" border="1" cellpadding="5" cellspacing="1" align="left">';
if (Session::get('role')=='default') 
{
 foreach($this->userList as $key => $value) {
        echo '<tr bgcolor="#00CED1"   >';
        echo '<td>' . $value['id'] . '</td>';
        echo '<td>' . $value['login'] . '</td>';
        echo '<td>' . $value['role'] . '</td>';
        echo '<td>
                <a href="'.URL.'dashboard/edituser/'.$value['id'].'">Edit</a> 
                <a href="'.URL.'dashboard/deleteuser/'.$value['id'].'">Delete</a></td>';
        echo '</tr>';
    }
}
  


   
?>
</table>
<?php HTML::Br(29);?>