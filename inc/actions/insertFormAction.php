<?php
include '../db/db_connect.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';


if($_POST['newType'])
{
	$query = 'INSERT INTO Type(type) VALUES("'.$_POST['newTypeName'].'")';
	$result = mysql_query($query);
	if(!$result){die(mysql_error());}
	$type=$_POST['newTypeID'];
}
else
	$type=$_POST['Type'];
//inserting information into the tabletinfo table
$query = "INSERT INTO tabletinfo(translation, transliteration,king,kingyear,year,month,day,summary,type)
VALUES(
'".$_POST['Translation']."',
'".$_POST['Transliteration']."',
'".$_POST['TabletKing']."',
".$_POST['Kingyear'].",
".$_POST['Year'].",
".$_POST['Month'].",
".$_POST['Day'].",
'".$_POST['Summary']."',
".$type."
)
";
$result = mysql_query($query);
if(!$result){die(mysql_error());}


//getting the related tabletinfo id
$query = "SELECT tabletinfoid from tabletinfo ORDER BY tabletinfoid DESC";
$result = mysql_query($query);
if(!$result){die(mysql_error());}
$row = mysql_fetch_array($result);
$tabletinfoid = $row['tabletinfoid'];




//inserting information into the person table
$people = count($_POST['PersonName']);
for($arf=0; $arf < $people; $arf++)
{
	$query = "INSERT INTO person(PersonalName,FatherName,GrandFatherName,Surname,Role,Occupation,Title,ActualPersonID,TabletInfoID) 
	VALUES(
		'".$_POST['PersonName'][$arf]."', 
		'".$_POST['FatherName'][$arf]."',
		'".$_POST['GrandFatherName'][$arf]."',
		'".$_POST['Surname'][$arf]."',
		'".$_POST['Role'][$arf]."',
		'".$_POST['Occupation'][$arf]."',
		'".$_POST['Title'][$arf]."',
		-1,
		".$tabletinfoid."
		)";
	$result = mysql_query($query);
	if(!$result){die(mysql_error());}
}

// inserting information into the tablet table
$query = "INSERT INTO tablet(MuseumNumber,TextNumber,Publication,Notes,TabletInfoID)
VALUES
(
'".$_POST['Museum']."',
'".$_POST['TextNumber']."',
'".$_POST['Publication']."',
'".$_POST['Notes']."',
".$tabletinfoid."
)";
$result = mysql_query($query);
if(!$result){die(mysql_error());}

echo '<script>window.location.href="../../index.php";</script>';
?>