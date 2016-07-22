
'use strict';


//Приложение
var portfolioAdmin = angular.module("portfolioAdmin", ["ngRoute","AdminControllers","ngFileUpload"]);



//Контроллер списка карт
portfolioAdmin.controller("AdminCtrl", ["$scope", "$http", function($scope, $http) 
{
	$scope.by_card_id;
	$scope.by_proj_id;
	$scope.card_hdr="Все проекты всех карт";
	$scope.old="";
	$scope.card_add=
	{
		hdr_card:"",
		desc_card:"",
		id:-1
	};

	$scope.proj_add=
	{
		hdr_shrt:"",
		desc_shrt:"",
		hdr_ful:"",
		desc_ful:"",
		card_id:0,
		num:0,
		id:-1
	};

	$scope.fil_add=
	{
		id_proj:"",
		fpath:"",
		ftitle:"",
		fhref:"",
		whtuse:0,
		id:-1,
		sz:0
	};

	$scope.img_add=
	{
		id_proj:"",
		fpath:"",
		ftitle:"",
		fhref:"",
		whtuse:0,
		id:-1,
		sz:0
	};


	$scope.files=[];
	$scope.images=[];

	$scope.filterProj=function(id,card_hdr)
	{
		$scope.by_card_id=id;
		$scope.card_hdr=card_hdr;
		$scope.proj_add.card_id=id;
	}

	//Получить список карт
	$http.post("../ajax/admin_cards.php").success(function(data) 
	{
		$scope.cards = data;
	});

	//Получить список проектов
	$http.post("../ajax/admin_projs.php").success(function(data) 
	{
		$scope.projs = data;
	});

	//Удалена карта
	$scope.$on('onProductsChanged', function (event, data) 
	{
		$scope.projs=data;
	});

	//Удален продукт - обновить количество продуктов в карте
	$scope.$on('onProductDelete', function (event, card_id) 
	{
		var i;
		for(i=0;i<$scope.cards.length;i++)
		{
			if($scope.cards[i].id==card_id)
			{
				if($scope.cards[i].projcnt>0)
					$scope.cards[i].projcnt--;
			}
		}
	});

	//Файл добавлен - обновить список файлов
	$scope.$on('onFileAdded', function (event, fildata) 
	{
		$scope.files.push(fildata);
		$scope.fil_add.fpath="";
		$scope.fil_add.ftitle="";
		$scope.fil_add.fhref="";
		$scope.fil_add.id=-1;
		$scope.fil_add.sz=0;
	});
	
	//Файл добавлен - обновить список файлов
	$scope.$on('onImgAdded', function (event, fildata) 
	{
		$scope.images.push(fildata);
		$scope.img_add.fpath="";
		$scope.img_add.ftitle="";
		$scope.img_add.fhref="";
		$scope.img_add.id=-1;
		$scope.img_add.sz=0;
	});


	//Добавить карту - показать диалог
	$scope.addCard = function ()
	{
		$("#id_add_panel").toggle();
		if($("#id_add_panel").is(":visible"))
		{
			$scope.card_add.hdr_card="";
			$scope.card_add.desc_card="";
			$("#id_add_card").parent().addClass("active");
		}
		else
			$("#id_add_card").parent().removeClass("active");
	}
	
	//Добавить карту - само добавление и вернуть id карты чтоб добавить в список карт без запроса всего списка с сервера
	$scope.addCardDo = function ()
	{
		//Получить список карт
		$http.post("../ajax/admin_add_card.php",{"card_add":$scope.card_add}).success(function(data) 
		{
			if(data.error)
			{
				alert(data.error);
				return;
			}

			if(data.id)
			{
				$scope.card_add.id=data.id
				$scope.cards.push($scope.card_add);
				$scope.card_add=
				{
					hdr_card:"",
					desc_card:"",
					id:-1
				};
				$("#id_add_panel").toggle();
				$("#id_add_card").parent().removeClass("active");
			}
		});
	}

	//Добавить проект - показать диалог
	$scope.addProj = function ()
	{
		$("#id_addproj_panel").toggle();
		if($("#id_addproj_panel").is(":visible"))
		{
			$scope.proj_add.hdr_shrt="";
			$scope.proj_add.desc_shrt="";
			$scope.proj_add.hdr_ful="";
			$scope.proj_add.desc_ful="";
			$scope.proj_add.id=-1;
			$("#id_add_proj").parent().addClass("active");
		}
		else
			$("#id_add_proj").parent().removeClass("active");
	}

	//Добавить карту - само добавление и вернуть id карты чтоб добавить в список карт без запроса всего списка с сервера
	$scope.addProjDo = function ()
	{
		console.log($scope.proj_add.card_id);
		//Получить список карт
		$http.post("../ajax/admin_add_proj.php",{"proj_add":$scope.proj_add}).success(function(data) 
		{
			if(data.error)
			{
				alert(data.error);
				return;
			}

			if(data.id && data.num)
			{
				$scope.proj_add.id=data.id;
				$scope.proj_add.num=data.num;
				$scope.projs.push($scope.proj_add);
				var i;
				for(i=0;i<$scope.cards.length;i++)
				{
					if($scope.cards[i].id==$scope.proj_add.card_id)		
					{
						$scope.cards[i].projcnt++;
					}
				}
				$("#id_addproj_panel").toggle();
				var  card_id=$scope.proj_add.card_id;
				$scope.proj_add=
				{
					hdr_shrt:"",
					desc_shrt:"",
					hdr_ful:"",
					desc_ful:"",
					card_id:card_id,
					num:0,
					id:-1
				};
				$("#id_add_proj").parent().removeClass("active");
			}
		});
	}

	$scope.moveup = function (proj_id)
	{
		var i,j,proj1,proj2,numf;
		for(i=0;i<$scope.projs.length;i++)
		{
			if($scope.projs[i].id==proj_id)
			{
				proj1=$scope.projs[i];
				break;
			}
		}
		numf=-1;
		//Пройти по оставшимся вверх
		if(proj1.num>1)
		{
			for(j=0;j<$scope.projs.length;j++)
			{
				//Найти максимальный номер среди элементов выше перемещаемого с учетом card_id
				if($scope.projs[j].card_id==proj1.card_id)
				{
					if(numf==-1 && $scope.projs[j].num<proj1.num)
						numf=j;
					else
						if(numf!=-1 && ($scope.projs[j].num>$scope.projs[numf].num) && ($scope.projs[j].num<proj1.num))
							numf=j;
				}
			}

			if(numf!=-1)
			{
				proj2=$scope.projs[numf];
				i=proj1.num;
				proj1.num=proj2.num;
				proj2.num=i;
			}
		}
		if(proj1 && proj2)
		{
			$http.post("../ajax/update_proj_pos.php",{"proj1":proj1,"proj2":proj2}).success(function(data) 
			{

			});
		}
	}


	$scope.movedw = function (proj_id)
	{
		var i,j,proj1,proj2,numf;
		for(i=0;i<$scope.projs.length;i++)
		{
			if($scope.projs[i].id==proj_id)
			{
				proj1=$scope.projs[i];
				break;
			}
		}
		numf=-1;
		//Пройти по оставшимся вниз
		for(j=0;j<$scope.projs.length;j++)
		{
			//Найти максимальный номер среди элементов выше перемещаемого с учетом card_id
			if($scope.projs[j].card_id==proj1.card_id)
			{
				if(numf==-1 && $scope.projs[j].num>proj1.num)
					numf=j;
				else
					if(numf!=-1 && ($scope.projs[j].num<$scope.projs[numf].num) && ($scope.projs[j].num>proj1.num))
						numf=j;
			}
		}
		if(numf!=-1)
		{
			proj2=$scope.projs[numf];
			i=proj1.num;
			proj1.num=proj2.num;
			proj2.num=i;
		}
		if(proj1 && proj2)
		{
			$http.post("../ajax/update_proj_pos.php",{"proj1":proj1,"proj2":proj2}).success(function(data) 
			{

			});
		}
	}

	//Получить файлы
	$scope.$on('onGetFiles', function (event, data) 
	{
		$scope.files=data;
	});

	//Получить картинки
	$scope.$on('onGetImages', function (event, data) 
	{
		$scope.images=data;
	});
	
	//Удалена крата
	$scope.$on('onCardDeleted', function (event, data) 
	{
		$scope.projs=[];
	});
	
}]);





//Директива удаления карты
portfolioAdmin.directive('deletecard', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				//Удалить на сервере
				$http.post("../ajax/admin_delete_card.php",{"id":scope.card.id}).success(function(data) 
				{
					for(var i=0;i<scope.cards.length;i++)
					{
						if(scope.cards[i].id==scope.card.id)
						{
							scope.cards.splice(i,1);
							scope.$emit('onCardDeleted', 0);
							break;
						}
					}
				});
			};
		}
	};
});



//Директива сохранения карты
portfolioAdmin.directive('editcard', function ($http) 
{
	return {
		scope: true,
		//template: '<a class="btn" ng-class="{active:on}" ng-click="toggle()">Toggle me!</a>',
		link: function ( scope, element, attrs ) 
		{
			scope.on = false;
			scope.toggle = function () 
			{
				scope.on = !scope.on;
				if(scope.on==true)
					element.next().show();
				else
					element.next().hide();
			};
			//Кнопка сохранить
			element.next().find("button").click( function (e) 
			{
				//Сохранить на сервере
				$http.post("../ajax/admin_update_card.php",{data:scope.card}).success(function(data) 
				{
					//console.log(data);
				});
				element.next().hide();
			});
		}
	};
});


//Директива получения проектов по карте
portfolioAdmin.directive('getprojects', function ($http,$parse,$rootScope) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				//Получить проекты с сервера
				$http.post("../ajax/admin_projects_card.php",{"id":scope.card.id}).success(function(data) 
				{
					scope.$emit('onProductsChanged', data);
				});
			};
		}
	};
});



//Директива удаления проекта - также обновить количество проектов в бейдже карты -1
portfolioAdmin.directive('deleteproj', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				//Удалить на сервере				
				$http.post("../ajax/admin_delete_proj.php",{"id":scope.proj.id}).success(function(data) 
				{
					for(var i=0;i<scope.projs.length;i++)
					{
						if(scope.projs[i].id==scope.proj.id)
						{
							//Передать card_id для уменьшения количества входящих проектов на 1
							scope.$emit('onProductDelete', scope.projs[i].card_id);
							scope.projs.splice(i,1);
							break;
						}
					}
				});
			};
		}
	};
});



//Директива правки проекта карты
portfolioAdmin.directive('editproj', function ($http) 
{
	return {
		scope: true,
		//template: '<a class="btn" ng-class="{active:on}" ng-click="toggle()">Toggle me!</a>',
		link: function ( scope, element, attrs ) 
		{
			scope.on = false;
			scope.toggle = function () 
			{
				scope.on = !scope.on;
				if(scope.on==true)
					element.next().next().next().next().next().next().next().show();
				else
					element.next().next().next().next().next().next().next().hide();
			};
			//Кнопка сохранить
			element.next().next().next().next().next().next().next().find("button").click( function (e) 
			{
				//Сохранить на сервере
				$http.post("../ajax/admin_update_proj.php",{data:scope.proj}).success(function(data) 
				{
					//console.log(data);
				});
				element.next().next().next().next().next().next().next().hide();
			});
		}
	};
});


//Директива правки файлов проекта
portfolioAdmin.directive('editfils', function ($http) 
{
	return {
		scope: true,
		//template: '<a class="btn" ng-class="{active:on}" ng-click="toggle()">Toggle me!</a>',
		link: function ( scope, element, attrs ) 
		{
			scope.on = false;
			scope.toggle = function () 
			{
				scope.on = !scope.on;
				if(scope.on==true)
				{
					element.next().next().next().next().show();
					//Сохранить на сервере
					$http.post("../ajax/admin_files.php",{proj_id:attrs.projid}).success(function(data) 
					{
						scope.$emit('onGetFiles',data);
					});
				}
				else
					element.next().next().next().next().hide();
			};
		}
	};
});



//Директива добавления файла локально
portfolioAdmin.directive('addfiltoggle', function () 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.on_addfiltoggle = false;
			scope.toggle = function () 
			{
				scope.on_addfiltoggle = !scope.on_addfiltoggle;
				if(scope.on_addfiltoggle==true)
					element.parent().next().show();
				else
					element.parent().next().hide();
			};
		}
	};
});

//Директива добавления файла из внешнего файла
portfolioAdmin.directive('addfiltoggleext', function () 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.onaddfiltoggleext = false;
			scope.toggle = function () 
			{
				scope.onaddfiltoggleext = !scope.onaddfiltoggleext;
				if(scope.onaddfiltoggleext==true)
					element.parent().next().next().show();
				else
					element.parent().next().next().hide();
			};
		}
	};
});


//Директива удаления файла
portfolioAdmin.directive('delfil', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				//Удалить на сервере
				$http.post("../ajax/admin_delete_file.php",{"id":attrs.filid}).success(function(data) 
				{
					for(var i=0;i<scope.files.length;i++)
					{
						if(scope.files[i].id==attrs.filid)
						{
							//Передать card_id для уменьшения количества входящих проектов на 1
							//scope.$emit('onProductDelete', scope.projs[i].card_id);
							scope.files.splice(i,1);
							break;
						}
					}
				});
			};
		}
	};
});




//Директива добавления локального файла
portfolioAdmin.directive('addfilelocal', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				scope.fil_add.whtuse=0;
				scope.fil_add.id_proj=attrs.idproj;
				//Добавить на сервер
				if(scope.fil_add.ftitle)
				{
					$http.post("../ajax/admin_add_filelocal.php",{filadd:scope.fil_add}).success(function(data) 
					{
						element.parent().parent().parent().parent().parent().toggle();
						scope.$emit('onFileAdded', data);
					});
				}
				else
				{
					alert("Необходимо загрузить файл и заполнить подпись к нему.");
				}
			};
		}
	};
});


//Директива добавления файла их внешнего источника
portfolioAdmin.directive('addfilext', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				scope.fil_add.id_proj=attrs.idproj;
				scope.fil_add.whtuse=1;
				//Добавить на сервер
				if(scope.fil_add.ftitle && scope.fil_add.fhref)
				{
					$http.post("../ajax/admin_add_filext.php",{filadd:scope.fil_add}).success(function(data) 
					{
						element.parent().parent().parent().parent().parent().toggle();
						scope.$emit('onFileAdded', data);
					});
				}
				else
				{
					alert("Необходимо загрузить файл и заполнить подпись к нему.");
				}
			};
		}
	};
});


//Директива загрузки файла
portfolioAdmin.directive('uploadclick', function () 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				element.next().trigger("click");
			};
		}
	};
});


/*//Директива скачать
portfolioAdmin.directive('dwfile', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				$http.get("../ajax/download.php?id="+attrs.idfil).success(function(data) 
				{
					//console.log(data);
					//scope.$emit('onFileAdded', data);
				});
			};
		}
	};
});
*/


//Контроллер компонента загрузки файла
portfolioAdmin.controller('UploadFileCtrl', ['$scope', 'Upload', '$timeout', function ($scope, Upload, $timeout) {
	$scope.uploadFiles = function(file, errFiles) {
		$scope.f = file;
		$scope.errFile = errFiles && errFiles[0];
		if (file) 
		{
			file.upload = Upload.upload(
			{
				url: '../ajax/upload_file.php',
				data: {file: file}
			});
			file.upload.then(function (response) 
			{
				$scope.fil_add.fpath=response.data[0];
				$scope.fil_add.fhref=response.data[1];
				$timeout(function () 
				{
					file.result = response.data;
				});
			}, 
			function (response) 
			{
				if (response.status > 0)
					$scope.errorMsg = response.status + ': ' + response.data;
			}, 
			function (evt) 
			{
				file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
			});
		}
	}

	$scope.uploadFiles1 = function(file, errFiles) {
		$scope.f = file;
		$scope.errFile = errFiles && errFiles[0];
		if (file) 
		{
			file.upload = Upload.upload(
			{
				url: '../ajax/upload_image.php',
				data: {file: file}
			});
			file.upload.then(function (response) 
			{
				$scope.img_add.fpath=response.data[0];
				$scope.img_add.fhref=response.data[1];
				$timeout(function () 
				{
					file.result = response.data;
				});
			}, 
			function (response) 
			{
				if (response.status > 0)
					$scope.errorMsg = response.status + ': ' + response.data;
			}, 
			function (evt) 
			{
				file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
			});
		}
	}
}]);



//Директива показа картинок
portfolioAdmin.directive('editimages', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.on = false;
			scope.toggle = function () 
			{
				scope.on = !scope.on;
				if(scope.on==true)
				{
					element.next().next().next().next().next().next().next().next().show();
					//Сохранить на сервере
					$http.post("../ajax/admin_images.php",{projid:attrs.projid}).success(function(data) 
					{
						scope.$emit('onGetImages',data);
					});
				}
				else
					element.next().next().next().next().next().next().next().next().hide();
			};
		}
	};
});



//Директива удаления файла
portfolioAdmin.directive('delimg', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				//Удалить на сервере
				$http.post("../ajax/admin_delete_img.php",{"id":attrs.imid}).success(function(data) 
				{
					for(var i=0;i<scope.images.length;i++)
					{
						if(scope.images[i].id==attrs.imid)
						{
							//Передать card_id для уменьшения количества входящих проектов на 1
							scope.images.splice(i,1);
							break;
						}
					}
				});
			};
		}
	};
});



//Директива добавления картинки локально
portfolioAdmin.directive('addimgtoggle', function () 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.on_addimgtoggle = false;
			scope.toggle = function () 
			{
				scope.on_addimgtoggle = !scope.on_addimgtoggle;
				if(scope.on_addimgtoggle==true)
					element.parent().next().show();
				else
					element.parent().next().hide();
			};
		}
	};
});


//Директива добавления картинки из внешнего файла
portfolioAdmin.directive('addimgtoggleext', function () 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.onaddimgtoggleext = false;
			scope.toggle = function () 
			{
				scope.onaddimgtoggleext = !scope.onaddimgtoggleext;
				if(scope.onaddimgtoggleext==true)
					element.parent().next().next().show();
				else
					element.parent().next().next().hide();
			};
		}
	};
});


//Директива загрузки файла
portfolioAdmin.directive('uploadimgclick', function () 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				element.next().trigger("click");
			};
		}
	};
});



//Директива добавления локального файла
portfolioAdmin.directive('addimglocal', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				scope.img_add.whtuse=0;
				scope.img_add.id_proj=attrs.idproj;
				//Добавить на сервер
				if(scope.img_add.ftitle)
				{
					$http.post("../ajax/admin_add_imglocal.php",{filadd:scope.img_add}).success(function(data) 
					{
						element.parent().parent().parent().parent().parent().toggle();
						scope.$emit('onImgAdded', data);
					});
				}
				else
				{
					alert("Необходимо загрузить картинку и заполнить подпись к нему.");
				}
			};
		}
	};
});



//Директива добавления картинки из внешнего источника
portfolioAdmin.directive('addimgext', function ($http) 
{
	return {
		scope: true,
		link: function ( scope, element, attrs ) 
		{
			scope.click = function () 
			{
				scope.img_add.id_proj=attrs.idproj;
				scope.img_add.whtuse=1;
				//Добавить на сервер
				if(scope.img_add.ftitle && scope.img_add.fhref)
				{
					$http.post("../ajax/admin_add_imgext.php",{filadd:scope.img_add}).success(function(data) 
					{
						element.parent().parent().parent().parent().parent().toggle();
						scope.$emit('onImgAdded', data);
					});
				}
				else
				{
					alert("Необходимо загрузить файл и заполнить подпись к нему.");
				}
			};
		}
	};
});


//Модуль контроллеров
var adminControllers = angular.module("AdminControllers", []);


//Роутер
adminControllers.config(["$routeProvider",function($routeProvider) 
{
	$routeProvider.
	when("/admin",
	{
		templateUrl: "tamplates/admin_tpl.php",
		controller: "AdminCtrl"
	}).
	/*
	when("/projects", 
	{
		templateUrl: "projects.php",
		controller: "ProjectsCtrl"
	}).
	*/
	otherwise(
	{
		redirectTo: "/admin"
	});
}]);

