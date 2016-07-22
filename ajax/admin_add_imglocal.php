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

	if(file_exists($params->filadd->fpath))
	{
		$path=substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],"/"));
		$path=substr($path,0,strrpos($path,"/")+1)."files/images/";
		$filname=substr($params->filadd->fpath,strrpos($params->filadd->fpath,"/")+1);
		$path.=$filname;
		rename($params->filadd->fpath,$path);
		$params->filadd->fpath=$path;
		$params->filadd->sz=filesize($params->filadd->fpath);
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
