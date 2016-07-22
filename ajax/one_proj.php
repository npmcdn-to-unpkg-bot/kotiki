<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	$projId=isset($_GET["projId"])?$_GET["projId"]:"-1";
	$result=$db->mysqli->query("SELECT * FROM proj WHERE id=".$projId);
	$rez="";
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		if($obj = $result->fetch_object())
		{
			$rez=json_encode($obj);
		}
	}
	$result->close();
	print($rez);
?>