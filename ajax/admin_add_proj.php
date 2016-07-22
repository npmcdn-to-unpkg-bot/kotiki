<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	
	if(	empty($params->proj_add->hdr_shrt) || empty($params->proj_add->desc_shrt) ||
		empty($params->proj_add->hdr_ful) || empty($params->proj_add->desc_ful) || empty($params->proj_add->card_id)
	)
	{
		print("{\"error\":\"Необходимо заполнить поля\"}");
		exit();
	}
	$stmt = $db->mysqli->prepare("INSERT INTO proj(hdr_shrt,desc_shrt,hdr_ful,desc_ful) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss",$params->proj_add->hdr_shrt,$params->proj_add->desc_shrt,$params->proj_add->hdr_ful,$params->proj_add->desc_ful);
	$stmt->execute();
	$insid=$stmt->insert_id;
	$stmt->close();	

	//Получить следующий порядковый номер для добавления
	$num=1;
	$result=$db->mysqli->query("SELECT MAX(num) as num1 FROM proj_cards WHERE id_card=".$params->proj_add->card_id);
	$rez=array();
	if($result->num_rows>0)
	{
		if($obj = $result->fetch_object())
		{
			if($obj->num1>1)
				$num=$obj->num1+1;
		}
	}
	$result->close();

	$stmt = $db->mysqli->prepare("INSERT INTO proj_cards(id_proj,id_card,num) VALUES (?,?,?)");
	$stmt->bind_param("iii",$insid,$params->proj_add->card_id,$num);
	$stmt->execute();	
	$stmt->close();	
	print("{\"id\":\"".$insid."\",\"num\":\"".$num."\"}");
	
?>
