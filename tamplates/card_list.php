<!--button type="button" class="btn btn-default btn-lg" ng-click="openAside('left')">
	<span class="glyphicon glyphicon-align-justify"></span> Все проекты
</button-->

<style>
    .btnup:hover {
        background-color: #DEB887;
    }
    
    .btnup {
        position: absolute;
        left: 45%;
        right: 45%;
        top: 0px;
        bottom: 95%;
        width: 150px;
        height: 30px;
        /*border:1px solid black;*/
        z-index: 100;
        min-width: 100px;
        padding-left: 20px;
        padding-top: 5px;
        padding-right: 20px;
        text-align: center;
        background-color: orange;
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        color: white;
    }
</style>
   



<div class="btnup" ng-click="openAside('left')">
    Все проекты
    
</div>
      

          


<div full-page options="vm.mainOptions">

    <div class="section" id="#section{{card.id}}" ng-repeat="card in cards">

        <br>&nbsp;
        <br>
        <h1>{{card.hdr_card}}</h1>

        <div ng-repeat="proj in projs | filter:{id_card:card.id} | orderBy:'num'" class="slide">

            <div class="project">
                <p>{{proj.hdr_shrt}}</p>
                <p>{{proj.desc_shrt}}</p>
                <p>{{proj.desc_ful}}</p>
                <button ng-click="timerDialog(proj)">Кнопка</button>
                <modal-dialog></modal-dialog>
            </div>
   
            <div class="teste">
                <div class="sect" ng-repeat="img in imgs | filter:{id_proj:proj.id}">
                    <p class="title_card">{{img.ftitle}}</p>
                    <a ng-click="openLightboxModal($index)">
                        <img ng-src="{{img.thumbUrl}}" class="img-thumbnail">
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>