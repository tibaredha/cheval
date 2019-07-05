<?php
$id=$_GET["id"];
require('cheval.php');
$pdf = new cheval( 'P', 'mm', 'A5',true,'UTF-8',false );

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->mysqlconnect();
$query = "select * from cheval WHERE  id = '$id'     ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))//
{
$pdf->AddPage('P','A5');
//$pdf->GetY()+6
$pdf->SetFont('aefurat', '', 15);
$pdf->Rect(5,5, 140, 202,"d");
$pdf->SetXY(5,5);$pdf->Cell(140,10,"ORDONNANCE",0,0,'C',0);
$pdf->Rect(10,15, 60, 35,"d");
$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(10,15);$pdf->Cell(60,5,"Docteur Vétérinaire",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"REBHI_MOHAMED",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"Adresse : DJELFA /ain-oussera",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"****",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"N° AVN : 89034",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"N° tel : 0000000000",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"email : rebhi@yahoo.fr",0,0,'L',0);


$pdf->Rect(80,15, 60, 35,"d");
$pdf->SetXY(80,15);$pdf->Cell(60,5,"Détenteur des animaux",0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+5);$pdf->Cell(60,5,"MR : ".$result->NomP,0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+5);$pdf->Cell(60,5,"Adresse : ".$pdf->nbrtostring('wil','IDWIL',trim($result->wil),'WILAYAS'),0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+5);$pdf->Cell(60,5,$pdf->nbrtostring('com','IDCOM',trim($result->com),'COMMUNE'),0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+5);$pdf->Cell(60,5,"Identification de l'animal a traiter",0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+5);$pdf->Cell(60,5,trim($result->NomA),0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+5);$pdf->Cell(60,5,$result->NPPRODUIT,0,0,'L',0);
$pdf->SetXY(80,$pdf->GetY()+10);$pdf->Cell(60,5,"Le : ".date('d-m-Y'),0,0,'L',0);
}
// $pdf->SetXY(10,$pdf->GetY()+10);$pdf->Cell(110,5,"1-MEDICAMENT",1,0,'L',0);$pdf->Cell(20,5,"FLC",1,0,'C',0);
// $pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(37,5,"VOIE",1,0,'L',0);$pdf->Cell(37,5,"DUREE",1,0,'L',0);$pdf->Cell(36,5,"DELAI",1,0,'L',0);
$pdf->SetXY(5,70);
// session_start();
$nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
for ($i=0 ;$i < $nbArticles ; $i++)
{
$pdf->cell(15,6,$i+1,0,0,'C',0);
$pdf->SetFont('aefurat','U');
$pdf->Cell(100,6,$pdf->nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.$pdf->nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre'),0,0,'L',0);
$pdf->SetFont('aefurat','');
$pdf->Cell(20,6,$_SESSION['ordonnace']['qteProduit'][$i]." Bte",0,0,'R',0);
$pdf->SetXY(20,$pdf->GetY()+6);
$pdf->Cell(100,6,$_SESSION['ordonnace']['doseparprise'][$i].' '.$_SESSION['ordonnace']['nbrdrfoisparjours'][$i].'x/j'.' pd'.$_SESSION['ordonnace']['nbrdejours'][$i].'jours',0,0,'L',0);
$pdf->SetFont('aefurat','U');$pdf->SetTextColor(255,0,0);
$pdf->Cell(20,6,$_SESSION['ordonnace']['qteProduit'][$i] * $_SESSION['ordonnace']['prixProduit'][$i].' DA',0,0,'R',0);
$pdf->SetFont('aefurat','');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(05,$pdf->GetY()+10); 
}
$pdf->Text(20,$pdf->GetY(),"______________________________________________________________");
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['ordonnace']['libelleProduit']); $i++)
   {
      $total += $_SESSION['ordonnace']['qteProduit'][$i] * $_SESSION['ordonnace']['prixProduit'][$i];
   }
   return $total;
}
$pdf->SetFont('aefurat','U');$pdf->SetTextColor(255,0,0);
$pdf->SetXY(20,$pdf->GetY()+6);$pdf->Cell(120,6,"Montant Total: ".MontantGlobal().'  DA',0,0,'R',0);
$pdf->SetFont('aefurat','');$pdf->SetTextColor(0,0,0);
$pdf->SetXY(10,175);$pdf->Cell(60,5,"Renouvllement Interdit",0,0,'L',0);
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(60,5,"Signature",0,0,'C',0);
$pdf->Output();
?>