<!DOCTYPE html>
<html lang="en" ng-app="gemStore">
    <head>
        <meta charset="UTF-8">
        <title>Laravel</title>
    </head>
    <body>
            <div id="StoreController" ng-controller="StoreController as store">
                    <h3 class="page-header" ng-repeat="product in store.products">
                        {{ product }}
                       
                    </h3>
                
            </div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0/angular.min.js"></script>
            <script src="js/app.js"></script>
    </body>
</html>

