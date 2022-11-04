app.controller('permissionController', ['$scope', '$http', 'service', '$window', permissionController]);

function permissionController($scope, $http, service, $window){
    if ($window.localStorage.getItem('token')) {
        $http.get('http://127.0.0.1:8000/api/permissions', {
            dataType: "json",
            headers: {
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            $scope.permissions = response.data.data;
        }).catch(function (err) {
            console.log(err);
        });
    } else {
        console.log('error');
    }
    $scope.add_permissions = function () {
        $scope.permissions = service.permission_add($scope.name, $scope.display_name);
    }
    $scope.edit_permissions = function (id) {
        for (var i in $scope.permissions) {
            if ($scope.permissions[i].id == id) {
                $scope.permission = angular.copy($scope.permissions[i]);
            }
        }
    }
    $scope.update_permissions = function (id) {
        $scope.permissions = service.permission_update(id, $scope.permission);
    }
    $scope.delete_permissions = function (id) {
        $scope.permissions = service.permission_delete(id);
    }
}
