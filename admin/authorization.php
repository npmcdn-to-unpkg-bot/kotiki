<!DOCTYPE html>
<html lang="ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8">
	<title>Админка</title>
	<script src="../js/jquery/jquery.js" type="text/javascript"></script>
	<link href="../js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<style>
	html, body {
		height: 100%;
	}

	.container-fluid {
	  display: table;
	  width: 100%;
	  height: 100%;
	  min-height: 100%;
	}

	.inner-container {
		display: table-cell;
		vertical-align: middle;
	}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="inner-container">

			<div class="row">
				<div class="col-xs-0 col-sm-2 col-md-3 col-lg-4"></div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
					<div class="panel panel-primary">
						<div class="panel-heading" style="text-align:center;">Авторизация</div>
						<div class="panel-body">
							<?php
							global $error_msgauth; 
							echo $error_msgauth; 
							?>
							<form class="form-horizontal" action="index.php" method="post">
								<input type="hidden" name="auth_login" value="1">
								<div class="form-group">
									<label for="inputEmail" class="col-xs-0 col-sm-6 col-md-6 col-lg-6 control-label">E-mail</label>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<input type="email" class="form-control" id="inputEmail" name="email">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="col-xs-0 col-sm-6 col-md-6 col-lg-6 control-label">Пароль</label>
									<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
										<input type="password" class="form-control" id="inputPassword" name="pass">
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-offset-0 col-sm-offset-6 col-md-offset-6 col-lg-offset-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
										<input value="1" name="remember" type="checkbox">
										<label>Запомнить меня</label>
									</div>
								</div>
								<div class="form-group">
									<div class="col-xs-offset-0 col-sm-offset-6 col-md-offset-6 col-lg-offset-6 col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
										<button type="submit" class="btn btn-default">Войти</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-xs-0 col-sm-2 col-md-3 col-lg-4"></div>
			</div>			

		</div>
	</div>
</body>
</html>