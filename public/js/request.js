carrinhoApp.controller('GroupCtrl', ['$scope', '$http',  function($scope, $http) {
    $scope.Group;
    $scope.campos;
    $scope.checkeds = [];

    $http.get('/grupos/roles').
    success(function(data, status, headers, config) {
        $scope.campos = data;
    });

    $scope.createGroup = function() {
        $("#client").empty();
            $("#user").empty();
            $("#schedule").empty();
            $("#service").empty();
            $("#office").empty();
            $("#group").empty();
        $scope.Group = '';
        $.each($scope.campos, function (index, row) {
            if(row.action == 'client'){
                $("#client").append("<input type="+'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");    
            }
            else if (row.action == 'user'){
                $("#user").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
            }
            else if (row.action == 'schedule') {
                $("#schedule").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
            }
            else if (row.action == 'service') {
                $("#service").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
            }
            else if (row.action == 'office') {
                $("#office").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
            }
            else if (row.action == 'group') {
                $("#group").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
            }
        });
        $('#GroupCreate').modal('show');
    };            

    $scope.editGroup = function(id) {
        $http.get('/grupos/editar/'+id).
        success(function(data, status, headers, config) {

            var roles = JSON.parse(data.roles);
            $scope.Group = data;
            
            $("#client").empty();
            $("#user").empty();
            $("#schedule").empty();
            $("#service").empty();
            $("#office").empty();
            $("#group").empty();

                

            $.each($scope.campos, function (index, row) {
                console.log(row);
                if(row.action == 'client'){

                if( roles.indexOf(row.id) != -1  ){
                        $("#edit-client").append("<input type="+'checkbox'+" checked="+'checked'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");    
                    }else{
                        $("#edit-client").append("<input type="+'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }
                }

                else if (row.action == 'user'){
                    if( roles.indexOf(row.id) != -1 ){
                        $("#edit-user").append("<input type=" +'checkbox'+" checked="+'checked'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }else{
                        $("#edit-user").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }
                }
                else if (row.action == 'schedule') {
                    if( roles.indexOf(row.id) != -1 ){
                        $("#edit-schedule").append("<input type=" +'checkbox'+" checked="+'checked'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }else{
                        $("#edit-schedule").append("<input type=" +'checkbox'+"  name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }
                }
                else if (row.action == 'service') {
                    if( roles.indexOf(row.id) != -1 ){
                        $("#edit-service").append("<input type=" +'checkbox'+" checked="+'checked'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }else{
                        $("#edit-service").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }
                }
                else if (row.action == 'office') {
                    if( roles.indexOf(row.id) != -1 ){
                        $("#edit-office").append("<input type=" +'checkbox'+" checked="+'checked'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }else{
                        $("#edit-office").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }
                }
                else if (row.action == 'group') {
                    if ( roles.indexOf(row.id) != -1 ) {
                        $("#edit-group").append("<input type=" +'checkbox'+" checked="+'checked'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }else{
                        $("#edit-group").append("<input type=" +'checkbox'+" name="+'roles[]'+" value="+ row.id +" >"+row.name+"");
                    }
                }
            });
                     
            

            $('#GroupEdit').modal('show');
        });
    };

    $scope.preparedeleteGroup = function(event){
        $('#GroupDelete').modal('show');
        $('#confirmclose').click(function () {
            $scope.deleteGroup(event);
        });
    };

    $scope.deleteGroup = function(id) {
        console.log(id,'aqui');
        $http.post('/grupos/deletar/'+id).
        success(function(data, status, headers, config) {
            window.location.reload();
        }).error(function(data, status, headers, config) {
            alert('tente novamente mais tarde')
        });
    };

    angular.element(document).ready(function () {
        //Angular breaks if this is done earlier than document ready.
        $('#group-table').DataTable();
    });
}])