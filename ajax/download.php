<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	$id=isset($_GET["id"])?$_GET["id"]:"-1";
	if(	$id=="-1" )
	{
		print("{\"error\":\"Необходимо заполнить поля\"}");
		exit(0);
	}
	$result=$db->mysqli->query("SELECT * FROM fils WHERE id=".$id);
	$rez=array();
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		if($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{
				if(file_exists($obj->fpath))
				{
					$file=substr($obj->fpath,strrpos($obj->fpath,"/")+1);
					header('Content-Description: File Transfer');
					header('Content-Type: application/octet-stream');
					header('Content-Disposition: attachment; filename="'.basename($file).'"');
					header('Expires: 0');
					header('Cache-Control: must-revalidate');
					header('Pragma: public');
					header('Content-Length: ' . filesize($obj->fpath));
					readfile($obj->fpath);
					exit;
				}
			}
			else
				header( 'Location: '.$obj->fhref, true, 301 );
		}
	}
	$result->close();
?>
