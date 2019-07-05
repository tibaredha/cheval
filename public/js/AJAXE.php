<?php
require '../../config.php';
$cnx = mysql_connect(DB_HOST,DB_USER,DB_PASS)or die('I cannot connect to the database because: ' . mysql_error());
$db = mysql_select_db(DB_NAME);
mysql_query("SET NAMES 'UTF8' ");
if($_POST['id'])
{
$id=$_POST['id'];
if ($id==1) {$couleur='black';}//
if ($id==2) {$couleur='red';}//*Pur-Sang-Arabe
if ($id==3) {$couleur='white';}//*Pur-Sang-Anglais
if ($id==4) {$couleur='green';}//*Arabe-Barbe
if ($id==5) {$couleur='ivory';}//Baudets
if ($id==6) {$couleur='blue';}//*Barbe
$sql=mysql_query("SELECT * FROM cheval where Race='$id'  and  Sexe='M'  and  aprouve='1' order by NomA");
while($row=mysql_fetch_array($sql))
{
echo '<option   style="background-color: '.$couleur.';  color: white; "    value="'.$row[0].'">'.$row[1]." : ".$row[3].'_('.$row[5].')</option>';
}
}
?>