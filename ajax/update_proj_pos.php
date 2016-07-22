<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	
	$db->mysqli->query("UPDATE proj_cards SET num=".$params->proj1->num." WHERE id_proj=".$params->proj1->id);
	$db->mysqli->query("UPDATE proj_cards SET num=".$params->proj2->num." WHERE id_proj=".$params->proj2->id);
	print("{\"status\":\"ok\"}");
?>
