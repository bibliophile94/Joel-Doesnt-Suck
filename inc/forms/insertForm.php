<?php
include '../template/nav.php';
?>
<h1>Insert Information</h1>
<form id="form" action="../actions/insertFormAction.php" target="_blank" method="post">
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
			<input type="text" name="Museum" value="Dicks">
			<!-- <center> Text:
			<input type="text" name="Text#"></center> -->
			<br>
			Publication:<br>
			<input type="text" name="Publication" value="Dicks">
			<br>
			Text Number:<br>
			<input type="number" name="TextNumber" value="Dicks">
			<br>
			<!-- Genealogies:<br>
			<input type="text" name="Genealogies">
			<br>
			Composition:<br>
			<input type="text" name="Composition">
			<br> -->
			Tablet King:<br>
			<input type="text" name="TabletKing" value="Dicks"><br>
			Month:<br>
			<input type="number" style="width: 50px" name="Month" value="213"><br>
			Day:<br>
			<input type="number" style="width: 50px" name="Day" value="123"><br>
			Year:<br>
			<input type="number" style="width: 50px" name="Year" value="213"><br>
			King Year:<br>
			<input type="number" style="width: 50px" name="Kingyear" value="123"><br>
		</td>
		<td>
			Notes:<br>
			<textarea name="Notes" rows="12" value="Dicks"></textarea>
		</td>
		<td>
			Transliteration:<br>
			<textarea name="Transliteration" rows="12" value="Dicks"></textarea>
		</td>
		<td>
			Translation:<br>
			<textarea name="Translation" rows="12" value="Dicks"></textarea>
		</td>
		<td>
			Summary:<br>
			<textarea name="Summary" rows="12" value="Dicks"></textarea>
		</td>
		<td>
			Type:<br>
			<?php
			include '../db/db_connect.php';
			$query = "SELECT * FROM type";
			$result = mysql_query($query);
			if(!$result){die(mysql_error());}
			echo '<select name="Type">
					<option disabled selected>Select Existing Type</option>';
			while($row = mysql_fetch_array($result))
			{
				echo "<option value='".$row['TypeID']."'>".$row['Type']."</option>";
			}
			echo '</select><br><input type="checkbox" name="newType" value="new">New Type:<br><input type="text" name="newTypeName"><input type="hidden" name="newTypeID" value="'.($row['TypeID']+1).'">';
			?>

		</td>
	</tr>
</table>
<button type="button" onclick="addRow()">Add person to table</button><br>
<span class="blue" id="peopleTable" style="position:relative;width:100%;"><span style="font-weight:bold;">PersonName</span><span  style="font-weight:bold;">FatherName</span><span  style="font-weight:bold;">GrandFatherName</span><span  style="font-weight:bold;">Surname</span><span  style="font-weight:bold;">Role</span><span style="font-weight:bold;">Occupation</span><span  style="font-weight:bold;">Title</span><div id="start"></div></span>
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


<?php





?>