carrinhoApp.controller('ProductCtrl', ['$scope', '$http',  function($scope, $http) {
    $scope.Product;
    $scope.Category;

    $http.get('/category/all').
    success(function(data, status, headers, config) {
        $.each(data.data, function(index, value) {
            $('#categorys').append("<option value="+value.id+">  "+value.name+"</option>");        
        });  
    });

    $scope.createProduct = function() {
        $scope.Product = '';
        $('#ProductCreate').modal('show');
    };            

    $scope.editProduct = function(id) {
        $scope.Product = '';
        $http.get('/product/edit/'+ id).
        success(function(data, status, headers, config) {
            $scope.Product = data.data;
        });

        if ( !$("#categorys-edit-"+id+" option:selected").val() ){
            $http.get('/category/all').
            success(function(data, status, headers, config) {
                console.log($scope.Product.image);
                if ($scope.Product.image) {
                    $("#image-edit-"+id).attr('src', 'images/' + $scope.Product.image);
                }
                $.each(data.data, function(index, value) {
                    if ($scope.Product.category.id == value.id ) {
                        $('#categorys-edit-'+id).append("<option value="+value.id+" selected>  "+value.name+"</option>");        
                    }else{
                        $('#categorys-edit-'+id).append("<option value="+value.id+">  "+value.name+"</option>");        
                    }
                });  
            });
        }

        $('#ProductEdit').modal('show');
    };

    $scope.preparedeleteProduct = function(event){
        $('#ProductDelete').modal('show');
        $('#confirmclose').click(function () {
            $scope.deleteProduct(event);
        });
    };

    $scope.deleteProduct = function(id) {
        $http.post('product/delete/'+id).
        success(function(data, status, headers, config) {
            window.location.reload();
        }).error(function(data, status, headers, config) {
            alert('tente novamente mais tarde')
        });
    };

    angular.element(document).ready(function () {
        $('#Product-table').DataTable();
    });
}])