carrinhoApp.controller('CategoryCtrl', ['$scope', '$http',  function($scope, $http) {
    $scope.Category;

    $scope.createCategory = function() {
        $scope.Category = '';
        $('#CategoryCreate').modal('show');
    };            

    $scope.editCategory = function(id) {
        $http.get('/category/edit/'+ id).
        success(function(data, status, headers, config) {
            $scope.Category = data.data;            
        });
        $('#CategoryEdit').modal('show');
    };

    $scope.preparedeleteCategory = function(event){
        $('#CategoryDelete').modal('show');
        $('#confirmclose').click(function () {
            $scope.deleteCategory(event);
        });
    };

    $scope.deleteCategory = function(id) {
        $http.post('/category/delete/'+id).
        success(function(data, status, headers, config) {
            window.location.reload();
        }).error(function(data, status, headers, config) {
            alert('tente novamente mais tarde')
        });
    };

    angular.element(document).ready(function () {
        //Angular breaks if this is done earlier than document ready.
	   $('#Category-table').DataTable();
    });

}])