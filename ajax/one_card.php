<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	$id=isset($_GET["cardId"])?$_GET["cardId"]:"-1";
	$result=$db->mysqli->query("SELECT * FROM cards WHERE id=".$id);
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