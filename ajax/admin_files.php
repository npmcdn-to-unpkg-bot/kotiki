<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));


	$result=$db->mysqli->query("SELECT * FROM fils WHERE id_proj=".$params->proj_id);
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
