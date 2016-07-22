<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	$params=$params->data;
	$result=$db->mysqli->query("UPDATE cards SET hdr_card=\"".$params->hdr_card."\",desc_card=\"".$params->desc_card."\" WHERE id=".$params->id);
	print("{\"status\":\"ok\"}");

?>
