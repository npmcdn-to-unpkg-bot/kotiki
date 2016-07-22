<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	$result=$db->mysqli->query("SELECT * FROM imgs WHERE id_proj=".$params->projid);
	$dirpath=substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],"/"));
	$dirpath=substr($dirpath,0,strrpos($dirpath,"/")+1);
	$rez=array();
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		while($obj = $result->fetch_object())
		{
			//$obj->fpath=$dirpath.$obj->fpath;
			array_push($rez,$obj);
		}
	}
	$result->close();
	print(json_encode($rez));
?>
