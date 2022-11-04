app.controller('roleController', ['$scope', '$http', 'service', '$window', roleController]);

function roleController($scope, $http, service, $window){
    if ($window.localStorage.getItem('token')) {
        $http.get('http://127.0.0.1:8000/api/roles', {
            dataType: "json",
            headers: {
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            $scope.roles = response.data.role;
            $scope.permissions = response.data.permission;
        }).catch(function (err) {
            console.log(err);
        });
    } else {
        console.log('error');
    }
    $scope.add_roles = function () {
        var permissionArr = [];
        for (var i = 0; i < $scope.permissions.length;i++){
            if ($scope.permissions[i].selected){
                var permissionId = $scope.permissions[i].id;
                permissionArr += permissionId;
            }
        }
        $scope.roles = service.role_add($scope.name,$scope.display_name,permissionArr);
    }
    $scope.edit_roles = function (id) {
        for (var i in $scope.roles) {
            if ($scope.roles[i].id == id) {
                $scope.role = angular.copy($scope.roles[i]);
            }
        }
    }
    $scope.update_roles = function (id) {
        var permissionArr = [];
        for (var i = 0; i < $scope.permissions.length;i++){
            if ($scope.permissions[i].selected){
                var permissionId = $scope.permissions[i].id;
                permissionArr += permissionId;
            }
        }
        $scope.roles = service.role_update(id, $scope.role,permissionArr);
    }
    $scope.delete_roles = function (id) {
        $scope.roles = service.role_delete(id);
    }
}
