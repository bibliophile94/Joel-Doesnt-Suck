<?php
include '../template/nav.php';
include '../db/db_connect.php';

$TabletID = $_POST['TabletID'];
$query = "SELECT * FROM tablet WHERE tablet.TabletID=$TabletID";
$result = mysql_query($query);
$TabletInfoID = mysql_fetch_array($result)['TabletInfoID'];
$result = mysql_query($query);
$Museum = mysql_fetch_array($result)['MuseumNumber'];
$result = mysql_query($query);
$Publication=mysql_fetch_array($result)['Publication'];
$result = mysql_query($query);
$TextNumber=mysql_fetch_array($result)['TextNumber'];
$query2 = "SELECT * FROM tablet, tabletinfo WHERE tablet.TabletInfoID = tabletinfo.TabletInfoID AND tablet.TabletID=$TabletID";
$result = mysql_query($query2);
$TabletKing=mysql_fetch_array($result)['King'];
$result = mysql_query($query2);
$Month=mysql_fetch_array($result)['Month'];
$result = mysql_query($query2);
$Day=mysql_fetch_array($result)['Day'];
$result = mysql_query($query2);
$Year=mysql_fetch_array($result)['Year'];
$result = mysql_query($query2);
$Kingyear=mysql_fetch_array($result)['KingYear'];
$result = mysql_query($query);
$Notes=mysql_fetch_array($result)['Notes'];
$result = mysql_query($query2);
$Transliteration=mysql_fetch_array($result)['Transliteration'];
$result = mysql_query($query2);
$Translation=mysql_fetch_array($result)['Translation'];
$result = mysql_query($query2);
$Summary=mysql_fetch_array($result)['Summary'];
?>

<html>
<h1>Update Information</h1>
<form id="form" action="../actions/updateFormAction.php" target="_blank" method="POST">
<!-- JOEL: PUT THE TABLETINFO ID HERE -->
	<input type="hidden" name="TabletID" value="<?= $TabletID ?>">
	<input type="hidden" name="TabletInfoID" value="<?= $TabletInfoID ?>">
	<?php 
	echo "Selected TabletID =  $TabletID<br>";
	echo "TabletInfoID = $TabletInfoID";
	?>
	<style>
	td
	{
		padding: 10px;
	}
	</style>
<table style="border:0px solid white;">
	<tr>
		<td>
			Museum#:<br>
			<input type="text" name="Museum" value="<?= $Museum ?>">
			<!-- <center> Text:
			<input type="text" name="Text#"></center> -->
			<br>
			Publication:<br>
			<input type="text" name="Publication" value="<?= $Publication ?>">
			<br>
			Text Number:<br>
			<input type="number" name="TextNumber" value="<?= $TextNumber ?>">
			<br>
			<!-- Genealogies:<br>
			<input type="text" name="Genealogies">
			<br>
			Composition:<br>
			<input type="text" name="Composition">
			<br> -->
			Tablet King:<br>
			<input type="text" name="TabletKing" value="<?= $TabletKing ?>"><br>
			Month:<br>
			<input type="number" style="width: 50px" name="Month" value="<?= $Month ?>"><br>
			Day:<br>
			<input type="number" style="width: 50px" name="Day" value="<?= $Day ?>"><br>
			Year:<br>
			<input type="number" style="width: 50px" name="Year" value="<?= $Year ?>"><br>
			King Year:<br>
			<input type="number" style="width: 50px" name="Kingyear" value="<?= $Kingyear ?>"><br>
		</td>
		<td>
			Notes:<br>
			<textarea name="Notes" rows="12" value="<?= $Notes ?>"><?php echo $Notes ?></textarea>
		</td>
		<td>
			Transliteration:<br>
			<textarea name="Transliteration" rows="12" value="<?= $Transliteration ?>"><?php echo $Transliteration ?></textarea>
		</td>
		<td>
			Translation:<br>
			<textarea name="Translation" rows="12" value="<?= $Translation ?>"><?php echo $Translation ?></textarea>
		</td>
		<td>
			Summary:<br>
			<textarea name="Summary" rows="12" value="<?= $Summary ?>"><?php echo $Summary ?></textarea>
		</td>
		<td>
			Type:<br>
			<?php
			include '../db/db_connect.php';
			$query = "SELECT * FROM type";
			$result = mysql_query($query);
			if(!$result){die(mysql_error());}
			while($row = mysql_fetch_array($result))
			{
				echo "<input type='radio' name='Type' value='".$row['TypeID']."'>".$row['Type']."<br>";
			}
			echo '<input type="radio" name="Type" value="new">New Type:<input type="text" name="newType"><input type="hidden" name="newTypeID" value="'.($row['TypeID']+1).'">';
			?>

		</td>
	</tr>
</table>
<button type="button" onclick="addRow()">Add person to table</button><br>
<span class="blue" id="peopleTable" style="position:relative;width:100%;"><span style="font-weight:bold;">PersonName</span><span  style="font-weight:bold;">FatherName</span><span  style="font-weight:bold;">GrandFatherName</span><span  style="font-weight:bold;">Surname</span><span  style="font-weight:bold;">Role</span><span style="font-weight:bold;">Occupation</span><span  style="font-weight:bold;">Title</span><div id="next1"></div></span>
<br>
<button onclick="submissionCheck()" type="button">Submit</button>
</form>
<script src="../js/table.js"></script>
<script>
// things to happen first
function init()
{
	addRow();
}
init();
</script>
</body>
</html>