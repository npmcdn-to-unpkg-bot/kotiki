<?php
	require_once("../tdb.php");
	global $db;
	require_once("../db_config.php");
	$db->connect();
	header('Content-Type: application/json');
	$params = json_decode(file_get_contents('php://input'));
	//Выбрать фотки по проектам
	//Удалить фотки по проектам
	//Выбрать файлы по проектам
	//Удалить файлы по проектам
	//Удалить проекты
	//Удалить карту
	$dirpath=substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],"/"));
	$dirpath=substr($dirpath,0,strrpos($dirpath,"/")+1);
	$result=$db->mysqli->query("SELECT fils.* FROM fils WHERE fils.id_proj IN (SELECT proj_cards.id_proj FROM proj_cards WHERE proj_cards.id_card=".$params->id.")");
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		while($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{
				if(file_exists($obj->fpath))
				{
					unlink($obj->fpath);
				}
			}
		}
	}
	$result->close();

	$result=$db->mysqli->query("SELECT imgs.* FROM imgs WHERE imgs.id_proj IN (SELECT proj_cards.id_proj FROM proj_cards WHERE proj_cards.id_card=".$params->id.")");
	if(!$result) return "[]";
	if($result->num_rows>0)
	{
		while($obj = $result->fetch_object())
		{
			if($obj->whtuse==0)
			{
				if(file_exists($dirpath.$obj->fpath))
				{
					unlink($dirpath.$obj->fpath);
				}
			}
		}
	}
	$result->close();
	$db->mysqli->query("DELETE FROM imgs WHERE imgs.id_proj IN (SELECT proj_cards.id_proj FROM proj_cards WHERE proj_cards.id_card=".$params->id.")");
	$db->mysqli->query("DELETE FROM fils WHERE fils.id_proj IN (SELECT proj_cards.id_proj FROM proj_cards WHERE proj_cards.id_card=".$params->id.")");
	$db->mysqli->query("DELETE FROM proj WHERE proj.id IN (SELECT proj_cards.id_proj FROM proj_cards WHERE proj_cards.id_card=".$params->id.")");
	$db->mysqli->query("DELETE FROM proj_cards WHERE id_card=".$params->id);
	$db->mysqli->query("DELETE FROM cards  WHERE id=".$params->id);
	print("{\"status\":\"ok\"}");

?>
