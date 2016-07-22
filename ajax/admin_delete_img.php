<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));

	$result=$db->mysqli->query("SELECT * FROM imgs WHERE id=".$params->id);
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		if($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{
				if(file_exists($obj->fpath) && $obj->fpath!=$_SERVER['SCRIPT_FILENAME'])
				{
					unlink($obj->fpath);
				}
			}
		}
	}
	$result->close();
	$result=$db->mysqli->query("DELETE FROM imgs WHERE id=".$params->id);
	print("{\"status\":\"ok\"}");

?>
