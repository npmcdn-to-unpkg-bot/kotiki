<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	$params=$params->data;
	$result=$db->mysqli->query("UPDATE proj SET hdr_shrt=\"".$params->hdr_shrt."\", desc_shrt=\"".$params->desc_shrt."\", hdr_ful=\"".$params->hdr_ful."\", desc_ful=\"".$params->desc_ful."\" WHERE id=".$params->id);
	print("{\"status\":\"ok\"}");

?>
