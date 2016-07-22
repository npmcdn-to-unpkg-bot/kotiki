<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	
	if(	empty($params->filadd) )
	{
		print("{\"error\":\"Необходимо заполнить поля\"}");
		exit(0);
	}

	$stmt = $db->mysqli->prepare("INSERT INTO imgs(id_proj,fpath,ftitle,fhref,whtuse,sz) VALUES (?,?,?,?,?,?)");
	$stmt->bind_param("isssii",
		$params->filadd->id_proj,
		$params->filadd->fpath,
		$params->filadd->ftitle,
		$params->filadd->fhref,
		$params->filadd->whtuse,
		$params->filadd->sz
	);
	$stmt->execute();
	$params->filadd->id=$stmt->insert_id;
	print(json_encode($params->filadd));
	$stmt->close();	
?>
