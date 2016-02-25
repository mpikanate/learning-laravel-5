<!doctype html>
<html ng-app="ui.bootstrap.demo">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular-animate.js"></script>
    <script src="https://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-1.1.2.js"></script>
    <script src="js/example.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<div ng-controller="ModalDemoCtrl">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title">Im a modal </h3>
        </div>
        <div class="modal-body">
            <ul>
                <li ng-repeat="item in items">
                    <a href="#" ng-click="$event.preventDefault(); selected.item = item"></a>
                </li>
            </ul>
            Selected: <b></b>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="ok()">OK</button>
            <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
        </div>
    </script>

    <button type="button" class="btn btn-default" ng-click="open()">Open me!</button>
    <button type="button" class="btn btn-default" ng-click="open('lg')">Large modal</button>
    <button type="button" class="btn btn-default" ng-click="open('sm')">Small modal</button>
    <button type="button" class="btn btn-default" ng-click="toggleAnimation()">Toggle Animation</button>
    <div ng-show="selected">Selection from a modal: </div>
</div>
  </body>
</html>
