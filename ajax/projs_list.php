<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	$result=$db->mysqli->query("SELECT proj.*,proj_cards.id_card,proj_cards.num FROM proj LEFT JOIN proj_cards ON proj_cards.id_proj=proj.id");
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
