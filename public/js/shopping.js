carrinhoApp.controller('ShoppingCtrl', ['$scope', '$http',  function($scope, $http) {
    $scope.Product;
    $scope.Request;

    $scope.addProduct = function(id) {
        $scope.Product = '';
        $http.get('/product/edit/'+ id).
        success(function(data, status, headers, config) {
            $scope.Product = data.data;
        });
        $('#AddItem').modal('show');
    };            

    $scope.removeItem = function(id) {
        $scope.Product = '';
        $http.get('/product/edit/'+ id).
        success(function(data, status, headers, config) {
            $scope.Product = data.data;
        });
        $('#RemoveItem').modal('show');
    };

    $scope.editItem = function(item) {
        $scope.Product = '';
        $http.get('/itemsJson/'+ item).
        success(function(data, status, headers, config) {
            $scope.Product = data.data;
        });
        $('#UpdateItem').modal('show');
    };

    $scope.listItems = function(id) {
        $scope.Request = '';
        $http.get('/request/'+ id).
        success(function(data, status, headers, config) {
            $scope.Request = data.data;
        });
        $('#ListOrder').modal('show');
    };

    angular.element(document).ready(function () {
        $('#Shopping-table').DataTable();
    });
}])