<!doctype html>

<!--[if lt IE 7]>      <html ng-app="agg" xmlns:ng="http://angularjs.org" id="ng-app" class="no-js lt-ie9 lt-ie8 lt-ie7 "> <![endif]-->
<!--[if IE 7]>         <html ng-app="agg" xmlns:ng="http://angularjs.org" id="ng-app" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html ng-app="agg" xmlns:ng="http://angularjs.org" id="ng-app" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html ng-app="agg" xmlns:ng="http://angularjs.org" id="ng-app" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths" ng-controller="appController"><!--<![endif]-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
	

<!-- Fonts -->
	<link href="js/vendor/font-awesome/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

<!-- Styles -->
	<link href="js/vendor/ionic/css/ionic.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

	<link rel="shortcut icon" href="img/icon/favicon.ico" />

	<title>AGG</title>

</head>
<body>

	<ion-pane>
      <ion-header-bar class="bar-stable">
        <h1 class="title">Ionic Blank Starter</h1>
      </ion-header-bar>
      <ion-content>
      </ion-content>
    </ion-pane>

    <ion-side-menus>

    <!-- Center content -->
    <ion-side-menu-content>
      <ion-header-bar class="bar-dark">
        <h1 class="title">Todo</h1>
      </ion-header-bar>
      <ion-content>
      </ion-content>
    </ion-side-menu-content>

    <!-- Left menu -->
    <ion-side-menu side="left">
      <ion-header-bar class="bar-dark">
        <h1 class="title">Projects</h1>
      </ion-header-bar>
    </ion-side-menu>

  </ion-side-menus>


<!--[if lte IE 7]>
	<script src="js/vendor/JSON-js/json2.js"></script>
<![endif]-->

<!--[if lte IE 7]>
	<script>
		document.createElement('ng-include');
		document.createElement('ng-pluralize');
		document.createElement('ng-view');
		// Optionally these for CSS
		document.createElement('ng:include');
		document.createElement('ng:pluralize');
		document.createElement('ng:view');
	</script>
<![endif]-->

<!-- html5.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="js/vendor/html5.js"></script>
<![endif]-->

<!-- css3-mediaqueries.js for IE less than 9 -->
<!--[if lt IE 9]>
	<script src="js/vendor/css3-mediaqueries.js"></script>
<![endif]-->

<!-- JavaScripts -->
	<script src="js/vendor/angular/angular.min.js"></script>
	<script src="js/vendor/angular/angular-route.min.js"></script>
	<script src="js/vendor/angular/angular-animate.min.js"></script>
	<script src="js/vendor/angular/angular-sanitize.min.js"></script>
	<script src="js/vendor/ionic/js/ionic.min.js"></script>
	<script src="js/vendor/ionic/js/ionic-angular.min.js"></script>
	<script src="js/vendor/ionic/js/angular-ui/angular-ui-router.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<!-- cordova script (this will be a 404 during development) -->
    <script src="cordova.js"></script>

	<script src="js/app.js"></script>

	<script type="text/javascript">
	angular.module("agg").constant("CSRF_TOKEN", '{{ csrf_token() }}');
	</script>
</body>
</html>

