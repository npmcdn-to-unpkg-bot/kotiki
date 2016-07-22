<?php 
session_start();
require_once("../tdb.php");
require_once("tusr.php");
global $db;
global $usr;
require_once("../db_config.php");
$db->connect();
//Пересоздать таблицы и заполнить демо данными
//$db->init();

//Пользователи
$usr=new Tusr($db,"","");
global $error_msgauth; 
$error_msgauth="";
//Разлогинится
if(isset($_GET["logout"]))	$usr->logout();

$bLoggedin=false;

//Авторизовались при сохраненной сессии
$bLoggedin=$usr->chk_usr_auth();

//Если не авторизован и пришли с формы авторизации то авторизовать
if(!$usr->bAuth)
{
	//Авторизация из формы по post
	if(isset($_POST["auth_login"]))
	{
		if(!$usr->usr_auth_post())
		{
			$error_msgauth="<div style='color:red;text-align:center;'>Ошибка авторизации</div>";
			//Форма авторизации
			require_once("authorization.php");
		}
		else
			$bLoggedin=true;
	}
	else
	{
		//Форма авторизации
		require_once("authorization.php");
	}
}

if(!$bLoggedin) return;
?>
<!DOCTYPE html>
<html lang="ru" ng-app="portfolioAdmin">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
	<title>Админка</title>
	<script src="../js/jquery/jquery.js" type="text/javascript"></script>
	<link href="../js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../js/angular/angular.min.js" type="text/javascript"></script>
	<script src="../js/angular/angular-route.min.js"></script>
	<script src="js/controllers.js" type="text/javascript"></script>
	<script src="../js/ng-file-upload/dist/ng-file-upload.min.js" type="text/javascript"></script>
	<script src="../js/ng-file-upload/dist/ng-file-upload-shim.min.js" type="text/javascript"></script>
</head>

<body class="container-fluid">
	<div ng-view></div>
</body>
</html>
<?php		
$db=null;
?>
