<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	$result=$db->mysqli->query("SELECT cards.*,count(proj_cards.id) as projcnt FROM cards LEFT JOIN proj_cards ON proj_cards.id_card=cards.id GROUP BY cards.id");
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
