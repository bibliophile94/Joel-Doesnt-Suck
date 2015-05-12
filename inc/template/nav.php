<!DOCTYPE html>
<html>
<head>
<title>Tablets Database</title>
<script src="inc/js/sorttable.js"></script>
<link href="inc/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<title>Editing the Tablets Database</title>
</head>
<body>
<style>
	a:visited
	{
		color:#000;
	}

	a:visited:hover
	{
		color:#aaa;
	}

	a:active
	{
		color:#00f;
	}

	a:link
	{
		color:#000;
	}

	a:link:hover
	{
		color:#aaa;
	}
	table
	{
		border-collapse:collapse;
	}
	.blue span
	{
		border:2px solid blue;
		text-align: center;
		display: inline-block;
		width:12.5%;
		padding: 2px;
	}

	table.blue span
	{
		border:0px solid white;
		display: initial;
	}

	.blue td, .blue th
	{
		border:2px solid blue;
		text-align: center;
	}

	*
	{
		font-family:Arial;
	}
</style>
<div style="position:fixed;height:20px;top:0px;left:0px;padding:10px;border:2px solid gray;width:100%;background-color:white;text-align:center;z-index:70;">
<a href="/Joel-Doesnt-Suck/index.php">View Data</a>
&nbsp;|&nbsp;
<a href="/Joel-Doesnt-Suck/inc/forms/insertForm.php">Insert</a>
&nbsp;|&nbsp;
<a href="/Joel-Doesnt-Suck/inc/forms/updateTabletSelect.php">Update</a>
</div>
<br><br>
<?php
function dump($variable)
{
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}
?>