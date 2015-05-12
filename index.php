<?php
include 'inc/db/db_connect.php';
echo '
<!DOCTYPE html>
<html>
<head>
<title>Tablets Database</title>
<script src="inc/js/sorttable.js"></script>
<link href="inc/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>';
include 'inc/template/nav.php';
if(isset($_POST['search']))
{
	if($_POST['searchBy']!="queryInput")
	{
		$search = $_POST['search'];
		$searchBy = $_POST['searchBy'];
		$selectState = "SELECT * FROM ";
		if($_POST['searchBy']=="Publication")
		{
			$tableSelect = "tablet";
		}
		elseif($_POST['searchBy'] == "Name")
		{
			$tableSelect = "person";
		}
		else
		{
			$tableSelect = "tabletinfo";
		}
		if(isset($_POST['exact']) )
		{
			if($_POST['searchBy']=="Name")
			{
				$whereClause= "WHERE PersonalName = '$search' OR FatherName= '$search' OR GrandFatherName = '$search' OR Surname = '$search'";
			}
			else
				$whereClause= " WHERE $searchBy = '$search'";
		}
		elseif($_POST['searchBy']=="Name")
		{
			$whereClause= "WHERE PersonalName LIKE '%$search%' OR FatherName LIKE '%$search%' OR GrandFatherName LIKE '%$search%' OR Surname LIKE '%$search%'";
		}
		else
			$whereClause= "WHERE $searchBy LIKE '%$search%'";
	
		$custQuery = "$selectState $tableSelect $whereClause;";
	}
	else
		$custQuery = $_POST['search'];
	echo '
	<h1></h1>
	<button onclick="window.location.href='."'index.php'".'">Reset!</button><br><h2>Another query?</h2>
	<form method="post">
		<input type="text" name="query" value="'.$custQuery.'" size="100">
		<button type="submit">Submit Query</button>
	</form><br><br>
	<table class="sortable blue">
	';
	$result = mysql_query($custQuery);
	if(!$result){die('Error:<br>'.mysql_error());}
	echo '<tr>';
	$row = mysql_fetch_array($result);
	$key = array_keys($row);

	for($i = 0 ; $i < count($key); $i++)
		if(is_numeric($key[$i]))
			$key[$i]= -1;

	foreach($key as $i)
		if($i != -1)
			echo '<th>'.$i.'</th>';
	echo '</tr>';
	do {
		echo '<tr>';
		foreach($key as $i)
		{
			if($i != -1)
				echo '<td>'.$row[$i].'</td>';
		}
		echo '</tr>';
	}while($row = mysql_fetch_array($result));
	echo "
	</table>
		";
}
else
{
	echo '
	<h1>Please write a query:</h1>
	<form method="post">
		<input type="text" name="search" value="" id="text">
		<select name="searchBy">
		  <option value="" disabled>Select...</option>
		  <option value="queryInput" onSelect="document.getElementById('."\'text\'".').value='."\'SELECT * FROM tablet\'".'">Query</option>
		  <option value="Location">Location</option>
		  <option value="Publication" selected>Publication</option>
		  <option value="King">King</option>
		  <option value="Name">Name</option>
		</select>
		<input type="checkbox" name="exact" value="true" />Exact Match
		<button type="submit">Submit Query</button>
	</form>
	</body>
	</html>
	';

}


?>


