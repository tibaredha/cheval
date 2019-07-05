<?php
if (!ISSET($_POST['Datedebut'])||!ISSET($_POST['Datefin'])){$datejour11 =date("Y-m-d");$datejour22 =date("Y-m-d");}else{if(empty($_POST['Datedebut'])||empty($_POST['Datefin'])){ $datejour11 =date("Y-m-d");$datejour22 =date("Y-m-d");} else{$datejour11 = $_POST['Datedebut'] ;$datejour22 = $_POST['Datefin'];}}
if ($datejour11>$datejour22 or  $datejour11==$datejour22 ){header("Location: ../dashboard/Evaluation/0") ;}
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$datejour1=$pdf->dateFR2US($datejour11);
$datejour2=$pdf->dateFR2US($datejour22);
$station=$_SESSION["station"];

if ($_POST['Evaluation']==0){$pdf->Regsigna($datejour1,$datejour2,$station);} //Registre signalement ok
if ($_POST['Evaluation']==1){$pdf->Regsaille($datejour1,$datejour2,$station);}//Registre saillie     ok
if ($_POST['Evaluation']==2){$pdf->Bsm($datejour1,$datejour2,$station);}//ok    


if ($_POST['Evaluation']==3){$pdf->sm($datejour1,$datejour2,$station);}//    
//manque /3/ a complete avec les 02 fichier d'origine 

if ($_POST['Evaluation']==4){$pdf->studbookdz('IS NOT NULL',"DU CHEVAL",$station,$datejour1,$datejour2); }//stud book global ok 
if ($_POST['Evaluation']==5){$pdf->studbookdz('=2',"DU PUR-SANG-ARABE",$station,$datejour1,$datejour2); } //stud book  Pur-Sang-Arabe ok 
if ($_POST['Evaluation']==6){$pdf->studbookdz('=3',"PUR-SANG-ANGLAIS",$station,$datejour1,$datejour2); }  //stud book  Pur-Sang-Anglais ok 
if ($_POST['Evaluation']==7){$pdf->studbookdz('=4',"DU ARABE-BARBE",$station,$datejour1,$datejour2);}     //stud book  Arabe-Barbe ok 
if ($_POST['Evaluation']==8){$pdf->studbookdz('=5',"DU BAUDETS",$station,$datejour1,$datejour2); }        //stud book  Baudets ok 
if ($_POST['Evaluation']==9){$pdf->studbookdz('=6',"DU BARBE",$station,$datejour1,$datejour2);}           //stud book  Barbe ok 
if ($_POST['Evaluation']==10){$pdf->Annuaire ($datejour1,$datejour2,$station);}                           //Annuaire des éleveurs ok
if ($_POST['Evaluation']==11){$pdf->stockequin($datejour1,$datejour2,$station);}                          //stockequin ok
if ($_POST['Evaluation']==12){$pdf->Primes ($datejour1,$datejour2,$station);}                             //Primes ok
if ($_POST['Evaluation']==13){$pdf->traspondeur($datejour1,$datejour2,$station);}                         //traspondeur ok


$pdf->Output();
?>


