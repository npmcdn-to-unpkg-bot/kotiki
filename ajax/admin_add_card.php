<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	
	if(empty($params->card_add->hdr_card) || empty($params->card_add->desc_card))
	{
		print("{\"error\":\"Необходимо заполнить поля\"}");
		exit();
	}
	$stmt = $db->mysqli->prepare("INSERT INTO cards(hdr_card,desc_card) VALUES (?, ?)");
	$stmt->bind_param("ss",$params->card_add->hdr_card,$params->card_add->desc_card);
	$stmt->execute();
	print("{\"id\":\"".$stmt->insert_id."\"}");
	$stmt->close();	
	
	
	

/*
	$result=$db->mysqli->query("DELETE FROM cards  WHERE id=".$params->id);
	$result=$db->mysqli->query("DELETE FROM proj_cards WHERE id_card=".$params->id);
	print("{\"status\":\"ok\"}");

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
*/	
?>
