<?php
require_once '../db/db_connect.php';
include '../template/nav.php';
echo '
<h1>Select a Tablet to Update</h1>

<form id="form" method="post" action="updateForm.php">
<button type="submit">Update Tablet</button>
<table class="sortable blue">
	';
	$query = 'SELECT * FROM tablet';
	$result = mysql_query($query);
	if(!$result){die('Error:<br>'.mysql_error());}
	echo '<tr>';
	$row = mysql_fetch_array($result);
	$key = array_keys($row);

	for($i = 0 ; $i < count($key); $i++)
		if(is_numeric($key[$i]))
			$key[$i]= -1;
		echo "<th><span style='color:red;'>Select:</span></th>";
	foreach($key as $i)
		if($i != -1)
			echo '<th>'.$i.'</th>';
	echo '</tr>';
	do {
		echo '<tr><td><input name="TabletID" type="radio" value="'.$row['TabletID'].'"></td>';
		foreach($key as $i)
		{
			if($i != -1)
				echo '<td>'.$row[$i].'</td>';
		}
		echo '</tr>';
	}while($row = mysql_fetch_array($result));
	echo "
	</table>
	</form>
	</body>
	</html>
		";

?>