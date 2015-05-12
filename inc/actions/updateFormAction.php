<?php
include '../db/db_connect.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

// Variables are what was entered on the UpdateForm page

$TabletID = $_POST['TabletID'];
$TabletInfoID = $_POST['TabletInfoID'];
$Museum = $_POST['Museum'];
$Publication = $_POST['Publication'];
$TextNumber = $_POST['TextNumber'];
$TabletKing = $_POST['TabletKing'];
$Month = $_POST['Month'];
$Day = $_POST['Day'];
$Year = $_POST['Year'];
$KingYear = $_POST['Kingyear'];

$Notes = $_POST['Notes'];
$Transliteration = $_POST['Transliteration'];
$Translation = $_POST['Translation'];
$Summary = $_POST['Summary'];

// Don't know how to use this yet.
/*$NewType = $_POST['NewType'];
$NewTypeID = $_POST['NewTypeID'];*/

echo "TabletID = $TabletID<br>";
echo "TabletInfoID = $TabletInfoID";

// Update tablet table
$tabletQuery = "UPDATE tablet 
SET MuseumNumber = $Museum,
 Publication = '$Publication',
 TextNumber = $TextNumber,
 Notes = '$Notes'
WHERE tablet.TabletID = $TabletID";

$resultTablet = mysql_query($tabletQuery);
if(!$resultTablet){die(mysql_error());}

// Update tabletinfo table
$tabletInfoQuery = "UPDATE tabletinfo 
SET Translation = '$Translation',
 Transliteration = '$Transliteration',
 KingYear = $KingYear,
 King = '$TabletKing',
 Year = $Year,
 Month = $Month,
 Day = $Day,
 Summary = '$Summary'
WHERE tabletInfo.TabletInfoID = $TabletInfoID";

$resultTabletInfo = mysql_query($tabletInfoQuery);
if(!$resultTabletInfo){die(mysql_error());}

/*
// Update people table
$people = count($_POST['PersonName']);
for($arf = 0; $arf < $people; $arf++){
	$personQuery = "UPDATE person SET 
	PersonalName = '".$_POST['PersonName'][$arf]."',
	 FatherName = '".$_POST['FatherName'][$arf]."',
	  GrandFatherName = '".$_POST['GrandFatherName'][$arf]."',
	  SurName = '".$_POST['Surname'][$arf]."',
	  Role = '".$_POST['Role'][$arf]."',
	  Occupation = '".$_POST['Occupation'][$arf]."',
	  Title = '".$_POST['Title'][$arf]."'
	FROM tablet,
	 tabletinfo,
	 person
	WHERE tablet.TabletInfoID = ".$_POST['tabletinfoID']." AND tablet.TabletInfoID = tabletinfo.TabletInfoID AND tablet.TabletInfoID = person.TabletInfoID";
	$resultPerson = mysql_query($personQuery);
	if(!$resultPerson){die(mysql_error());}
}
*/
exit("balls");




?>

// FROM tablet INNER JOIN tabletinfo ON tablet.TabletID = tabletinfo.TabletInfoID INNER JOIN person ON tabletinfo.TabletInfoID = person.TabletInfoID