<?php
require_once("tdb.php");
global $db;
require_once("db_config.php");
$db->connect();
//Пересоздать таблицы и заполнить демо данными
//$db->init();
?>
<!DOCTYPE html>
<html lang="ru" ng-app="portfolioApp" ng-controller="AppCtrl">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Портфолио</title>

	<link rel="stylesheet" href="js/vendor/jquery.fullPage.css">
	<!--link rel="stylesheet" href="js/vendor/style.css"-->
	<script src="js/jquery/jquery.js" type="text/javascript"></script>
	<!-- +++ fullpage depends jquery-->
	<script src="js/vendor/jquery.easings.min.js"></script>
	<script src="js/vendor/jquery.slimscroll.min.js"></script>
	<script src="js/vendor/jquery.fullPage.js"></script>
	<!-- +++ fullpage depends jquery-->

	<!--link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script-->
	<script src="js/angular/angular.min.js" type="text/javascript"></script>
	<!--script src="js/angular/angular-route.min.js"></script-->

	<!-- +++ fullpage angular-->
	<script src="js/vendor/angular-fullPage.js"></script>
	<!-- +++ fullpage angular-->
	<script src="js/vendor/angular-ui-router.min.js"></script>

	<!--aside-->
	<link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="js/aside/css/font-awesome.min.css" rel="stylesheet">
	<link href="js/aside/css/angular-aside.css" rel="stylesheet">
	<link href="dist/angular-bootstrap-lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="css/custom.css">
	<script src="js/aside/js/ui-bootstrap-tpls-0.14.3.min.js" type="text/javascript"></script>
	<script src="js/aside/js/angular-aside.js" type="text/javascript"></script>

	<script src="js/myscripts/controllers.js" type="text/javascript"></script>
	
    <script src="dist/angular-bootstrap-lightbox.js"></script>
    
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.3/angular-animate.js"></script>
    



</head>


	<body style="margin: 0px; padding: 0px;">

		<div ui-view autoscroll="true"></div>

		<script type="text/ng-template" id="aside.html">
			<div class="modal-header">
				<h4 class="modal-title">Все проекты</h4>
			</div>
            
			<div class="modal-body">
				<div ng-repeat="proj in projs | orderBy:'num'">
					<a href="javascript:void(0)" ng-click="gotoSlide($event,proj.id);">{{proj.hdr_shrt}}</a>
				</div>
			</div>
			<!--div class="modal-footer">
				<button class="btn btn-primary" ng-click="ok($event)">OK</button>
				<button class="btn btn-warning" ng-click="cancel($event)">Cancel</button>
			</div-->
		</script>
		
	</body>
</html>