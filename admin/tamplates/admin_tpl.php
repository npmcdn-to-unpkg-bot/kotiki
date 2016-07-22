<script>
	$(".nohref").bind("click",function(e){	e.preventDefault();});
</script>
<style>
.hovr:hover
{
	background-color: #EEEEEE;
	cursor:pointer;
}

.hovr_badge:hover
{
	background-color: #555555;
}

.hovr_row:hover
{
	background-color: #CCFFFF;
}

</style>


<style>
.thumb {
width: 24px;
height: 24px;
float: none;
position: relative;
top: 7px;
}

form .progress {
line-height: 15px;
}

.progress {
display: inline-block;
width: 100px;
border: 3px groove #CCC;
}

.progress div {
font-size: smaller;
background: orange;
width: 0;
}
</style>


<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="javascript:void(0)" id="id_add_card" ng-click="addCard()"><span class="glyphicon glyphicon-plus"></span> Добавить Карту</a></li>
				<li><a href="javascript:void(0)" id="id_add_proj" ng-click="addProj()"><span class="glyphicon glyphicon-plus"></span> Добавить Проект</a></li>
			</ul>
		</div>
	</div>
</nav>


<div class="row" style="display:none;" id="id_add_panel">
	<h2 style="text-align:center;">Добавление карты</h2>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label">Заголовок карты</label>
				<div class="col-sm-8">
					<textarea style="width:100%;" class="form-control" ng-model="card_add.hdr_card"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Описание карты</label>
				<div class="col-sm-8">
					<textarea style="width:100%;" class="form-control" ng-model="card_add.desc_card"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-primary btn-sm" ng-click="addCardDo()">Добавить карту</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row" style="display:none;" id="id_addproj_panel">
	<h2 style="text-align:center;">Добавление проекта в карту:</h2>
	<h4 style="text-align:center;">{{card_hdr}}</h4>
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<form class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-4 control-label">Заголовок проекта краткий</label>
				<div class="col-sm-8">
					<textarea style="width:100%;" class="form-control" ng-model="proj_add.hdr_shrt"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Описание проекта крткое</label>
				<div class="col-sm-8">
					<textarea style="width:100%;" class="form-control" ng-model="proj_add.desc_shrt"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Заголовок проекта полный</label>
				<div class="col-sm-8">
					<textarea style="width:100%;" class="form-control" ng-model="proj_add.hdr_ful"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label">Описание проекта полное</label>
				<div class="col-sm-8">
					<textarea style="width:100%;" class="form-control" ng-model="proj_add.desc_ful"></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-primary btn-sm" ng-click="addProjDo()">Добавить проект</button>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading" style="text-align:center;">Список карт</div>
			<div class="panel-body">
				<ul class="list-group" style="height:500px;overflow-y: auto;">
					<li class="list-group-item hovr" ng-repeat="card in cards">
						<input type="hidden" value="{{card.id}}">
						<!--<span class="badge hovr_badge" style="width:100px;" ng-click="click()" getprojects>Проекты старые {{card.projcnt}}</span> {{card.hdr_card}}-->
						{{card.hdr_card}}
						<span class="badge hovr_badge" style="width:100px;" ng-click="filterProj(card.id,card.hdr_card)"> Проекты {{card.projcnt}} </span>
						<!--span class="badge edit_card" ng-click="delete(card)" deletecard>Удалить</span-->
						<span class="badge hovr_badge" ng-click="click()" deletecard><span class="glyphicon glyphicon-remove-circle"></span> Удалить </span>
						<span class="badge hovr_badge" ng-click="toggle()" editcard><span class="glyphicon glyphicon-pencil"></span> Правка </span>
						<span style="display:none;">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-4 control-label">Заголовок карты</label>
									<div class="col-sm-8">
									<!--ng-model="card.hdr_card" необходимо для связывания данных во 2ю сторону от dom модели к модели данных-->
										<textarea style="width:100%;" class="form-control" ng-model="card.hdr_card">{{card.hdr_card}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Описание карты</label>
									<div class="col-sm-8">
										<textarea style="width:100%;" class="form-control" ng-model="card.desc_card">{{card.desc_card}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
									</div>
								</div>
							</form>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
		<div class="panel panel-default panel-primary">
			<div class="panel-heading" style="text-align:center;">Список проектов карты: {{card_hdr}}</div>
			<div class="panel-body">
				<ul class="list-group" style="height:500px;overflow-y: auto;"  ng-controller="UploadFileCtrl">
					<li class="list-group-item hovr" ng-repeat="proj in projs | filter:{card_id:by_card_id}| orderBy:'num'">
						<input type="hidden" value="{{proj.id}}">
						{{proj.hdr_shrt}}
						<span class="badge hovr_badge" ng-click="click()" deleteproj><span class="glyphicon glyphicon-remove-circle"></span> Удалить </span>
						<span class="badge hovr_badge" ng-click="toggle()" editproj><span class="glyphicon glyphicon-pencil"></span> Правка </span>
						<span class="pull-right">&nbsp;</span>
						<span class="badge hovr_badge" ng-click="toggle()" editimages projid="{{proj.id}}"><span class="glyphicon glyphicon-pencil"></span> Картинки </span>
						<span class="pull-right">&nbsp;</span>
						<span class="badge hovr_badge" ng-click="toggle()" editfils projid="{{proj.id}}"><span class="glyphicon glyphicon-download-alt"></span> Файлы </span>
						<!--span class="badge hovr_badge" ng-click="getImages(proj.id)"><span class="glyphicon glyphicon-picture"></span> Картинки </span-->
						<span class="pull-right">&nbsp;</span>
						<span class="badge hovr_badge" ng-click="moveup(proj.id)"><span class="glyphicon glyphicon-arrow-up"></span></span>
						<span class="badge hovr_badge" ng-click="movedw(proj.id)"><span class="glyphicon glyphicon-arrow-down"></span></span>
						<span style="display:none;">
							<div class="btn-group" role="group" style="margin-top:15px;">
								<a href="javascript:void(0)" class="btn btn-default" ng-click="toggle()" addfiltoggle><span class="glyphicon glyphicon-plus" style="color:#CCCCCC;"></span> Добавить файл локально </a>
								<a href="javascript:void(0)" class="btn btn-default" ng-click="toggle()" addfiltoggleext><span class="glyphicon glyphicon-plus" style="color:#CCCCCC;"></span> Добавить файл из внешнего источника </a>
							</div>
							<div class="panel panel-default" style="display: none;">
								<div class="panel-heading">
									<label style="color:#555555;">Добавление файла локально</label>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" style="margin-top:5px;">
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="col-sm-8">
												<span class="btn btn-primary" ng-click="click()" uploadclick>Загрузить файл</span>
												<input class="btn btn-primary" type="file" ngf-select="uploadFiles($file, $invalidFiles)" value="Загрузить файл" style="display:none;">
												<div style="font:smaller;">
													{{f.name}} {{errFile.name}} {{errFile.$error}} {{errFile.$errorParam}} {{errorMsg}}<br>
													<span class="progress" ng-show="f.progress >= 0">
														<div style="width:{{f.progress}}%"  ng-bind="f.progress + '%'"></div>
													</span>
												</div>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Подпись к файлу</label>
											<div class="col-sm-8">
												<textarea style="width:100%;" class="form-control" ng-model="fil_add.ftitle">{{fil_add.ftitle}}</textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="col-sm-8">
												<span class="btn btn-primary" idproj="{{proj.id}}" ng-click="click()" addfilelocal> Добавить файл </span>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="panel panel-default" style="display: none;">
								<div class="panel-heading">
									<label style="color:#555555;">Добавление файла из внешнего источника</label>
								</div>
								<div class="panel-body">
									<form class="form-horizontal" style="margin-top:5px;">
										<div class="form-group">
											<label class="col-sm-4 control-label">Ссылка на файл<br>на внешнем<br>источнике</label>
											<div class="col-sm-8">
												<textarea style="width:100%;" class="form-control" ng-model="fil_add.fhref">{{fil_add.fhref}}</textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Подпись к файлу</label>
											<div class="col-sm-8">
												<textarea style="width:100%;" class="form-control" ng-model="fil_add.ftitle">{{fil_add.ftitle}}</textarea>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label"></label>
											<div class="col-sm-8">
												<span class="btn btn-primary" idproj="{{proj.id}}" ng-click="click()" addfilext> Добавить файл </span>
											</div>
										</div>
									</form>
								</div>
							</div>
							<br>
							<label style="margin-top:15px;">Загруженные файлы</label>
							<ul class="list-group">
								<li class="list-group-item hovr_row" ng-repeat="fil in files| filter:{id_proj:by_proj_id}">
									<span class="badge hovr_badge"  ng-click="click()" filid="{{fil.id}}" delfil> Удалить файл </span>
									Подпись к файлу:{{fil.ftitle}}<br>
									<div ng-if="fil.whtuse==0">
										Путь к файлу:{{fil.fpath}}<br>
									</div>
									Ссылка на файл: {{fil.fhref}}<br>
									<a href="../ajax/download.php?id={{fil.id}}" ><span class="glyphicon glyphicon-download-alt"></span> Скачать файл </a>
									<!--a href="javascript:void(0)" ng-click="click()" idfil="{{fil.id}}" dwfile><span class="glyphicon glyphicon-download-alt"></span> Скачать файл </a-->
								</li>
							</ul>
						</span>
						<span style="display:none;">
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-sm-4 control-label">Краткий заголовок проекта</label>
									<div class="col-sm-8">
										<textarea style="width:100%;" class="form-control" ng-model="proj.hdr_shrt">{{proj.hdr_shrt}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Краткое описание проекта</label>
									<div class="col-sm-8">
										<textarea style="width:100%;" class="form-control" ng-model="proj.desc_shrt">{{proj.desc_shrt}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Полный заголовок проекта</label>
									<div class="col-sm-8">
										<textarea style="width:100%;" class="form-control" ng-model="proj.hdr_ful">{{proj.hdr_ful}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Полное описание проекта</label>
									<div class="col-sm-8">
										<textarea style="width:100%;" class="form-control" ng-model="proj.desc_ful">{{proj.desc_ful}}</textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-4 col-sm-8">
										<button type="submit" class="btn btn-primary btn-sm">Сохранить</button>
									</div>
								</div>
							</form>
						</span>
						<span style="display:none;">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="btn-group" role="group" style="margin-top:15px;">
									<a href="javascript:void(0)" class="btn btn-default" ng-click="toggle()" addimgtoggle><span class="glyphicon glyphicon-plus" style="color:#CCCCCC;"></span> Добавить картинку локально </a>
									<a href="javascript:void(0)" class="btn btn-default" ng-click="toggle()" addimgtoggleext><span class="glyphicon glyphicon-plus" style="color:#CCCCCC;"></span> Добавить картинку из внешнего источника </a>
								</div>
								<div class="panel panel-default" style="display: none;">
									<div class="panel-heading">
										<label style="color:#555555;">Добавление картинки локально</label>
									</div>
									<div class="panel-body">
										<form class="form-horizontal" style="margin-top:5px;">
											<div class="form-group">
												<label class="col-sm-4 control-label"></label>
												<div class="col-sm-8">
													<span class="btn btn-primary" ng-click="click()" uploadimgclick>Загрузить файл</span>
													<input class="btn btn-primary" type="file" ngf-select="uploadFiles1($file, $invalidFiles)" value="Загрузить файл" style="display:none;" ngf-pattern="'image/*'" ngf-accept="'image/*'">
													<div style="font:smaller;">
														{{f.name}} {{errFile.name}} {{errFile.$error}} {{errFile.$errorParam}} {{errorMsg}}<br>
														<span class="progress" ng-show="f.progress >= 0">
															<div style="width:{{f.progress}}%"  ng-bind="f.progress + '%'"></div>
														</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Подпись к файлу</label>
												<div class="col-sm-8">
													<textarea style="width:100%;" class="form-control" ng-model="img_add.ftitle">{{img_add.ftitle}}</textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label"></label>
												<div class="col-sm-8">
													<span class="btn btn-primary" idproj="{{proj.id}}" ng-click="click()" addimglocal> Добавить картинку </span>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="panel panel-default" style="display: none;">
									<div class="panel-heading">
										<label style="color:#555555;">Добавление картинки из внешнего источника</label>
									</div>
									<div class="panel-body">
										<form class="form-horizontal" style="margin-top:5px;">
											<div class="form-group">
												<label class="col-sm-4 control-label">Ссылка на картинку<br>на внешнем<br>источнике</label>
												<div class="col-sm-8">
													<textarea style="width:100%;" class="form-control" ng-model="img_add.fhref">{{img_add.fhref}}</textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label">Подпись к картинке</label>
												<div class="col-sm-8">
													<textarea style="width:100%;" class="form-control" ng-model="img_add.ftitle">{{img_add.ftitle}}</textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-4 control-label"></label>
												<div class="col-sm-8">
													<span class="btn btn-primary" idproj="{{proj.id}}" ng-click="click()" addimgext> Добавить картинку </span>
												</div>
											</div>
										</form>
									</div>
								</div>
								<br>
								<label style="margin-top:15px;">Загруженные картинки</label>
								<ul class="list-group">
									<li class="list-group-item hovr_row" ng-repeat="im in images| filter:{id_proj:by_proj_id}">
										<span class="badge hovr_badge"  ng-click="click()" imid="{{im.id}}" delimg> Удалить файл </span>
										<img src="{{im.fhref}}" style="height:50px;"> {{im.ftitle}}<br>
										<div ng-if="im.whtuse==0">
											Путь к файлу:{{im.fpath}}<br>
										</div>
									</li>
								</ul>
							</div>
						</span>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>


