carrinhoApp.controller('UserCtrl', ['$scope', '$http',  function($scope, $http) {
    $scope.User;

	$http.get("cargos/get").
    success(function(data, status, headers, config) {
        $("#input-office").empty();
       	// $("#input-office").append("<option>Cargos</option>");
        $.each(data, function (index, row) {
            $("#input-office").append("<option value='" +row.id+"'>"+row.name +"</option>");    
        });
    });

    $http.get("grupos/get").
    success(function(data, status, headers, config) {
       $("#input-group").empty();
       // $("#input-group").append("<option>Grupos</option>");
        $.each(data, function (index, row) {
            $("#input-group").append("<option value='" +row.id+"'>"+row.name +"</option>");    
        });
    });

    $scope.createUser = function() {
        $scope.Service = '';
        $('#UserCreate').modal('show');
    };            

    $scope.editUser = function(id) {
        $http.get('/usuario/editar/'+ id).
        success(function(data, status, headers, config) {
            $scope.User = data;

            $http.get("cargos/get").
            success(function(data, status, headers, config) {
                $("#edit-input-office").empty();
                // $("#edit-input-office").append("<option>Cargos</option>");
                $.each(data, function (index, row) {
                    $("#edit-input-office").append("<option value='" +row.id+"'"+ ($scope.User.office_id == row.id ? 'selected="selected"' : "") +">"+row.name +"</option>");    
                });
            });

            $http.get("grupos/get").
            success(function(data, status, headers, config) {
               $("#edit-input-group").empty();
               // $("#edit-input-group").append("<option>Grupos</option>");
                $.each(data, function (index, row) {
                    $("#edit-input-group").append("<option value='" +row.id+"' "+ ($scope.User.group_id == row.id ? 'selected="selected"' : "") + ">"+row.name +"</option>");    
                });
            });
                        
            $('#UserEdit').modal('show');
        });
    };
    
    $scope.preparedeleteUser = function(event){
        $('#UserDelete').modal('show');
        $('#confirmclose').click(function () {
            $scope.deleteUser(event);
        });
    };

    $scope.deleteUser = function(id) {
        console.log('user',id)
        $http.post('/usuario/deletar/'+id).
        success(function(data, status, headers, config) {
            window.location.reload();
        }).error(function(data, status, headers, config) {
            alert('tente novamente mais tarde')
        });
    };

    angular.element(document).ready(function () {
        //Angular breaks if this is done earlier than document ready.
	   $('#user-table').DataTable();
    });
}])