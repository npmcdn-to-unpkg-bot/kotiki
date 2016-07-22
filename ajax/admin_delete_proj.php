<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	$result=$db->mysqli->query("DELETE FROM proj WHERE id=".$params->id);
	$result=$db->mysqli->query("DELETE FROM proj_cards WHERE id_proj=".$params->id);

	$result=$db->mysqli->query("SELECT * FROM fils WHERE id_proj=".$params->id);
	$rez=array();
	if(!$result) return "[]";
	$dirpath=substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],"/"));
	$dirpath=substr($dirpath,0,strrpos($dirpath,"/")+1);
	if($result->num_rows>0)
	{
		while($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{				
				$pth=$dirpath.$obj->fpath;
				if(file_exists($pth))
					unlink($pth);
			}
		}
	}
	$result->close();
	$db->mysqli->query("DELETE FROM fils WHERE id_proj=".$params->id);



	$result=$db->mysqli->query("SELECT * FROM imgs WHERE id_proj=".$params->id);
	$rez=array();
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		while($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{				
				$pth=$dirpath.$obj->fpath;
				if(file_exists($pth))
					unlink($pth);
			}
		}
	}
	$result->close();
	$db->mysqli->query("DELETE FROM imgs WHERE id_proj=".$params->id);

	print("{\"status\":\"ok\"}");

?>
