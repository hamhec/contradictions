<!doctype html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1">
    <title>Contradictions</title>
    <link rel="stylesheet" href="/bower_components/angular-material/angular-material.css" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" >

    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.css" >

    <link rel="stylesheet" href="/css/style.min.css" >
  </head>

  <body ng-app="angularApp" ng-controller="MainController as main" layout="column">
    <!-- Application Dependencies -->
    <script type="text/javascript" src="/bower_components/angular/angular.js"></script>
    <script type="text/javascript" src="/bower_components/angular-material/angular-material.js"></script>
    <script type="text/javascript" src="/bower_components/angular-animate/angular-animate.js"></script>
    <script type="text/javascript" src="/bower_components/angular-aria/angular-aria.js"></script>
    <script type="text/javascript" src="/bower_components/angular-route/angular-route.js"></script>
    <script type="text/javascript" src="/bower_components/angular-cookies/angular-cookies.min.js"></script>
    <script type="text/javascript" src="/bower_components/angular-messages/angular-messages.min.js"></script>
    <!-- Application Scripts -->
    <script type="text/javascript" src="/js/app.js"></script>
    <!-- Application Services -->
    <script type="text/javascript" src="/js/services/UserService.js"></script>
    <script type="text/javascript" src="/js/services/QuestionService.js"></script>
    <script type="text/javascript" src="/js/services/ScoreService.js"></script>
    <!-- Application Controllers -->
    <script type="text/javascript" src="/js/controllers/MainController.js"></script>
    <script type="text/javascript" src="/js/controllers/HomeController.js"></script>
    <script type="text/javascript" src="/js/controllers/QuestionController.js"></script>
    <script type="text/javascript" src="/js/controllers/ScoreController.js"></script>
    <!-- Application Directives -->

    <!-- CSRF Token -->
    <script type="text/javascript">
      angular.module('angularApp').constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
    </script>

    <!-- Header -->
    <md-toolbar id="header" layout="row" md-whiteframe="3">
      <md-button ng-click="main.toggleSidenav('left')" ng-disabled="$mdMedia('gt-md')" aria-label="Menu">
        <md-icon md-font-library="material-icons md-dark">view_headline</md-icon>
      </md-button>

      <h1 class="md-toolbar-tools" flex>Experimentation sur la Gestion des Contradictions</h1>

      <md-button ng-click="main.goTo('/home')">Accueil</md-button>
      <md-button ng-click="main.goTo('/score')">{{infos.score.points}} Points</md-button>
    </md-toolbar> <!-- /Header -->

    <!-- Body -->
    <md-content id="body" flex layout="row">
      <md-sidenav layout="column" id="md-sidenav-left" md-is-locked-open="$mdMedia('gt-md')"
      md-component-id="left" md-whiteframe="3">
        <md-list class="main-menu" style="padding:0px; margin-bottom: 10px;">
          <div layout="column" style="padding:10px; background-color: #81C783; text-align:center">
            <md-icon md-font-library="material-icons">stars</md-icon>
            <div class="md-list-item-text" flex>Achievements</div>
          </div>

          <p class="md-body-2" style="padding: 20px; text-align:center" ng-if="!infos.id">
            Lisez bien la partie experimentation. Indiquez votre sexe et age et commencez a jouer!
          </p>

          <md-list-item class="md-2-line" ng-repeat="achievement in infos.achievements">
            <md-icon md-font-library="material-icons">{{achievement.icon}}</md-icon>
            <div class="md-list-item-text">
              <h3>{{ achievement.title}}</h3>
              <p>{{ achievement.description}}</p>
            </div>
            <md-divider></md-divider>
          </md-list-item>

        </md-list>

      </md-sidenav> <!-- /Sidenav -->

        <md-content id="outer-content" flex layout="row">
            <md-content id="inner-content" flex>
              <div id="flash" ng-show="flash" flex>
                <md-toolbar class="md-warn">
                  <h1 class="md-toolbar-tools">{{ flash }}</h1>
                </md-toolbar>
              </div>
              <div layout="row">
                <md-card class="colored-card" id="questions" flex="25" md-whiteframe="3">
                  <div layout="column">
                    <div class="number">{{infos.score.answered_questions}}/{{infos.total_questions}}</div>
                    <div>Questions</div>
                  </div>
                </md-card>

                <md-card class="colored-card" id="points" flex="25" md-whiteframe="3">
                  <div layout="column">
                    <div class="number">{{infos.score.points}}</div>
                    <div>Points</div>
                  </div>
                </md-card>

                <md-card class="colored-card" id="time" flex="25" md-whiteframe="3">
                  <div layout="column">
                    <div class="number">{{main.printTime(infos.score.total_time)}}</div>
                    <div>Temps Total</div>
                  </div>
                </md-card>

                <md-card class="colored-card" id="achievements" flex="25" md-whiteframe="3">
                  <div layout="column">
                    <div class="number">{{infos.achievements.length}}</div>
                    <div>Achievements</div>
                  </div>
                </md-card>
              </div>
              <div id="view" ng-view flex></div>
            </md-content>
        </md-content>
    </md-content>
  </body>
</html>
