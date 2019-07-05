<?php
function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}

function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }

function CalculateTimestampFromCurrDatetime($DateTime = -1) 
{

	if ($DateTime == -1 || $DateTime == '' || $DateTime == '0000-00-00 00:00:00' || $DateTime == '0000-00-00') 
	{
		$DateTime = date("Y-m-d H:i:s");
	}

	$NewDate['year']   = substr($DateTime,0,4);
	$NewDate['month']  = substr($DateTime,5,2);
	$NewDate['day']    = substr($DateTime,8,2);
	$NewDate['hour']   = substr($DateTime,11,2);
	$NewDate['minute'] = substr($DateTime,14,2);
	$NewDate['second'] = substr($DateTime,17,2);

	return mktime($NewDate['hour'], $NewDate['minute'], $NewDate['second'], $NewDate['month'], $NewDate['day'], $NewDate['year']);
}	
function CalculateDateDifference($TimestampFirst, $TimestampSecond = -1)	
{
	if ($TimestampSecond == -1) 
	{
		$TimestampSecond = CalculateTimestampFromCurrDatetime();
	}

	if ($TimestampSecond < $TimestampFirst) 
	{
		$TempTimestamp = $TimestampFirst;
		$TimestampFirst = $TimestampSecond;
		$TimestampSecond = $TempTimestamp;
		
		$NegativeDifference = true;
	}
	else 
	{
		$NegativeDifference = false;
	}

	list($Year1, $Month1, $Day1) = explode('-', date('Y-m-d', $TimestampFirst));
	list($Year2, $Month2, $Day2) = explode('-', date('Y-m-d', $TimestampSecond));
	$Time1 = (date('H',$TimestampFirst)*3600) + (date('i',$TimestampFirst)*60) + (date('s',$TimestampFirst));
	$Time2 = (date('H',$TimestampSecond)*3600) + (date('i',$TimestampSecond)*60) + (date('s',$TimestampSecond));

	$YearDiff = $Year2 - $Year1;
	$MonthDiff = ($Year2 * 12 + $Month2) - ($Year1 * 12 + $Month1);

	if($Month1 > $Month2)
	{
		$YearDiff -= 1;
	}
	elseif($Month1 == $Month2)
	{
		if($Day1 > $Day2) 
		{
			$YearDiff -= 1;
		}
		elseif($Day1 == $Day2) 
		{
			if($Time1 > $Time2) 
			{
				$YearDiff -= 1;
			}
		}
	}

	// handle over flow of month difference
	if($Day1 > $Day2) 
	{
		$MonthDiff -= 1;
	}
	elseif($Day1 == $Day2) 
	{
		if($Time1 > $Time2) 
		{
			$MonthDiff -= 1;
		}
	}

	$DateDifference = Array();
	$TotalSeconds = $TimestampSecond - $TimestampFirst;

	$WeekDiff = floor(($TotalSeconds / 604800));
	$DayDiff = floor(($TotalSeconds / 86400));

	if ($NegativeDifference == true) 
	{
		$DateDifference['years'] = ($YearDiff == 0) ? $YearDiff : -($YearDiff);
		$DateDifference['months'] = ($MonthDiff == 0) ? $MonthDiff : -($MonthDiff);
		$DateDifference['weeks'] = ($WeekDiff == 0) ? $WeekDiff : -($WeekDiff);
		$DateDifference['days'] = ($DayDiff == 0) ? $DayDiff : -($DayDiff);
	}
	else 
	{
		$DateDifference['years'] = $YearDiff;
		$DateDifference['months'] = $MonthDiff;
		$DateDifference['weeks'] = $WeekDiff;
		$DateDifference['days'] = $DayDiff;
	}
	
	return $DateDifference;
}	
	
function stringtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	if ($colonevalue!=='') 
		{
		$db_host="localhost";
		$db_name="deces"; 
		$db_user="root";
		$db_pass="";
		$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
		$db  = mysql_select_db($db_name,$cnx) ;
		mysql_query("SET NAMES 'UTF8' ");
		$result = mysql_query("SELECT * FROM $tb_name where $colonename='$colonevalue'" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
		else
		{
		return $resultat2='??????';
		}
	}	
	
        

 
$db_host="localhost";
$db_name="cheval"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$sql=mysql_query("SELECT * FROM feuil1 ");
echo "<table  width='100%' border='1' cellpadding='5' cellspacing='1' align='center'>" ;

 while($value=mysql_fetch_array($sql))
	{
	
	    // $Date1 = $value['DATENAISSANCE'];
		// $Date2 = $value['DINS'];
		// $Timestamp1 = CalculateTimestampFromCurrDatetime($Date1);
		// $Timestamp2 = CalculateTimestampFromCurrDatetime($Date2);
		// $DateDiff = CalculateDateDifference($Timestamp1, $Timestamp2);
	   
     	// $Date11 = $value['DATEHOSPI'] ;
		// $Date22 = $value['DINS'];
		// $Timestamp11 = CalculateTimestampFromCurrDatetime($Date11);
		// $Timestamp22 = CalculateTimestampFromCurrDatetime($Date22);
		// $DateDiff1 = CalculateDateDifference($Timestamp11, $Timestamp22);
	
	echo '<tr>';
	echo '<td>';echo $value['ID'];echo '</td>';
	echo '<td>';echo $value['PROPRIETAIRE'];echo '</td>';
	echo '<td>';echo $value['WILAYA'];echo '</td>';
	echo '<td>';echo $value['COMMUNE'];echo '</td>';
	echo '<td>';echo $value['ADRESSE'];echo '</td>';
	echo '<td>';echo $value['NOM CHEVAL'];echo '</td>';
	echo '<td>';echo $value['RACE'];echo '</td>';
	echo '<td>';echo trim($value['AGE']).'-'.'01'.'-'.'01';echo '</td>';
	echo '<td>';echo $value['ROBE'];echo '</td>';
	echo '<td>';echo $value['PÈRE'];echo '</td>';
	echo '<td>';echo $value['MERE'];echo '</td>';
	// echo '<td>';echo $value['TETE'];echo '</td>';
	// echo '<td>';echo $value['AG'];echo '</td>';
	// echo '<td>';echo $value['AD'];echo '</td>';
	// echo '<td>';echo $value['PG'];echo '</td>';
	// echo '<td>';echo $value['PD'];echo '</td>';
	// echo '<td>';echo $value['MARQUES'];echo '</td>';
	echo '<td>';echo dateFR2US(trim($value['DATE SAILLIE']));echo '</td>';
	
	
	
   $sql1 = "INSERT INTO cheval (  
									NomP,
									Datesigna,
									wil,
									com,
									adresse,
									NomA,
									Sexe,
									
									Race,
									Nobo,	
									
									region,
									wregion,
									station	
								) 
	VALUES (
	        '".$value['PROPRIETAIRE']."',
	        '".dateFR2US(trim($value['DATE SAILLIE']))."',
			'".trim($value['WILAYA'])."',
			'".trim($value['COMMUNE'])."',
			'".trim($value['ADRESSE'])."',
			'".trim($value['NOM CHEVAL'])."',
			'F',
			'".trim($value['RACE'])."',
			'".trim($value['ROBE'])."',
			
			'2',
			'2',
			'3'
			);";
			
	 $query1 = mysql_query($sql1);		
			
		
		
	//
//ehs djelfa ok
//eph djelfa ok
//eph messaad ok pour 2 semestre 2016 reste 1 semestre 2017 probleme commune residence
//eph idrissia
//eph hbb ok  pour 2 semestre 2016 1 semestre 2017 manque 2015 et 1er semestre 2016  probleme date de naissance
//eph ain oussera

	
	echo '</tr>';
	}
	
 echo "</table>";	
 ?>