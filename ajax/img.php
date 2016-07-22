<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	$result=$db->mysqli->query("SELECT * FROM imgs");
	$rez=array();
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		while($obj = $result->fetch_object())
		{
			array_push($rez,$obj);
		}
	}
	$result->close();
	print(json_encode($rez));
?>