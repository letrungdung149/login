app.controller('userController', ['$scope', '$http', 'service', '$window', userController]);

function userController($scope, $http, service, $window){
    $scope.pageSize = 5;
    if ($window.localStorage.getItem('token')) {
        $http.get('http://127.0.0.1:8000/api/users', {
            dataType: "json",
            headers: {
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            $scope.datas = response.data.user.data;
            $scope.roles = response.data.role;
        }).catch(function (err) {
            console.log(err);
        });
    } else {
        console.log('error');
    }


    $scope.add_user = function () {
        $scope.datas = service.user_add($scope.name, $scope.email, $scope.display_name);
    }

    $scope.edit_user = function (id) {
        for (var i in $scope.datas) {
            if ($scope.datas[i].id == id) {
                $scope.user = angular.copy($scope.datas[i]);
                console.log($scope.user);
            }
        }
    }

    $scope.update = function (id) {
        $scope.datas = service.user_update(id, $scope.user);
    }

    $scope.remove_user = function (id) {
        $scope.datas = service.user_delete(id);
    }
}
