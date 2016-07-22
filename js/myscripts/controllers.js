;(function() {
	'use strict';
	var portfolioApp = angular.module("portfolioApp", ["fullPage.js","ui.router","ui.bootstrap","ngAside","bootstrapLightbox"]);
    


portfolioApp.directive('sidebarDirective', function() {
    return {
        link : function(scope, element, attr) {
            scope.$watch(attr.sidebarDirective, function(newVal) {
                  if(newVal)
                  {
                    element.addClass('show'); 
                    return;
                  }
                  element.removeClass('show');
            });
        }
    };
});
    

    
    
    
	//Контроллер карт
	portfolioApp.controller("AppCtrl",AppCtrl);
	AppCtrl.$inject = ["$rootScope", "$state","$http","$aside","Lightbox"];
	function AppCtrl($rootScope,$state,$http,$aside,Lightbox)
	{

		

        $rootScope.state = false;
    
    $rootScope.toggleState = function() {
        $rootScope.state = !$rootScope.state;
    };
        
		$rootScope.changePage = changePage;
		function changePage()
		{
			$state.go($rootScope.chosenPage);
		}
         
		$http.post("ajax/projs_list.php").success(function(data)
		{
			$rootScope.projs = data;
		});
        
         $http.post("ajax/img.php").success(function(data) {

						$rootScope.imgs = data;
            console.log($rootScope.imgs);
        });
        
      $rootScope.openLightboxModal = function (index) {
    Lightbox.openModal($rootScope.imgs, index);
  };
//Прячет мод окно сразу
  	$rootScope.timerDialog = function(){
			$rootScope.showModalDialog = true;
		}
//Кнопка закрыть мод окно
		$rootScope.closeModalDialog = function(){
			$rootScope.showModalDialog = false;
		}


		$rootScope.openAside = function(position)
		{
			$aside.open({
				templateUrl: 'aside.html',
				placement: position,
				backdrop: true,
				controller: function($rootScope, $modalInstance)
				{
					$rootScope.ok = function(e)
					{
						$modalInstance.close();
						e.stopPropagation();
					};
					$rootScope.cancel = function(e)
					{
						$modalInstance.dismiss();
						e.stopPropagation();
					};
					//Переход к конкретному проекту
					$rootScope.gotoSlide = function(e,id_proj)
					{
						console.log(id_proj);
						$.fn.fullpage.moveTo(2, 1);
						$modalInstance.dismiss();
						e.stopPropagation();
					}
				}
			});
		}
	}



	portfolioApp.controller('MainController', MainController);
	MainController.$inject = ['$state', '$compile', '$rootScope','$http'];
	function MainController($state, $compile,$rootScope,$http)
	{
		
		

		var _this = this;
		this.mainOptions ={};
        
		$http.post("ajax/cards_list.php").success(function(data)
		{
			$rootScope.cards = data;

			//Получить из проектов и карт список цветов фона
			console.log($rootScope.cards);

			_this.mainOptions =
			{
				//sectionsColor: ['#1bbc9b', '#4BBFC3'],
				sectionsImages: ['url(http://i.stack.imgur.com/p9mUO.jpg)', 'url(http://i.stack.imgur.com/jGlzr.png)', 'url(http://i.stack.imgur.com/7YKUD.jpg)', 'whitesmoke', '#ccddff'],
				//anchors: ['firstPage', 'secondPage', '3rdPage', '4thpage', 'lastPage'],
				//menu: '#menu',
				autoscroll: true,
				navigation: true,
				navigationPosition: 'right'
				//,navigationTooltips: ['firstSlide', 'secondSlide']
			};

			//_this.moog = function(merg){ console.log(merg); };
			/*
			_this.slides =
			[
				{
					title: 'Simple',
					description: 'Easy to use. Configurable and customizable.',
					src: 'images/1.png'
				},
				{
					title: 'Cool',
					description: 'It just looks cool. Impress everybody with a simple and modern web design!',
					src: 'images/2.png'
				},
				{
					title: 'Compatible',
					description: 'Working in modern and old browsers too!',
					src: 'images/3.png'
				}
			];


			_this.addSlide = function()
			{
				_this.slides.push({
					title: 'New Slide',
					description: 'I made a new slide!',
					src: 'images/1.png'
				});
				//$compile(angular.element($('.slide')))($scope);
			};
			*/
		});

		//console.log($rootScope.projs);

	}
//Директива модального окна
	portfolioApp.directive('modalDialog', function(){
		return{
			restrict:'E',
			scope: false,
			templateUrl: 'tamplates/modalDialog.html',
			contrloller: function($rootScope){
				$rootScope.showModalDialog = false;
			}
		}
	});


	//Роутер
	portfolioApp.config(AppConfig);
	AppConfig.$inject = ['$stateProvider', '$urlRouterProvider'];
	function AppConfig($stateProvider,$urlRouterProvider)
	{
		$stateProvider
		.state({
			name:"main",
			url:"/main",
			templateUrl: "tamplates/card_list.php",
			controller: "MainController",
			controllerAs: 'vm'
		});
		$urlRouterProvider.otherwise('main');
	};
})();