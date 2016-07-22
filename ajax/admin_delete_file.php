<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));

	$result=$db->mysqli->query("SELECT * FROM fils WHERE id=".$params->id);
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		if($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{
				//$path=strrpos($_SERVER['PHP_SELF'],"/");
				$path=substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],"/"));
				$path=substr($path,0,strrpos($path,"/")+1);
				$path.=$obj->fpath;
				if(file_exists($path) && $path!=$_SERVER['SCRIPT_FILENAME'])
				{
					unlink($path);
				}
			}
		}
	}
	$result->close();

	$result=$db->mysqli->query("DELETE FROM fils WHERE id=".$params->id);
	print("{\"status\":\"ok\"}");

?>
