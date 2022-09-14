var app = angular.module('myApp', ['angularUtils.directives.dirPagination'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});



app.controller('AppCtrl', ['$scope', '$http', 'service', '$window', appController])
    .directive("tree", ['$compile', '$templateCache', function ($compile, $templateCache) {
    return {
        type: "E",
        scope: {
            list: "="
        },
        replace: true,
        link: function (scope, element, attrs) {
            element.replaceWith($compile($templateCache.get('tree.html'))(scope));
            scope.delete_department = function (id) {
                console.log(id);
            }
            scope.edit_department = function (id) {
                for (var i in scope.list) {
                    if (scope.list[i].id == id) {
                        scope.department = angular.copy(scope.list[i]);
                        console.log(scope.department);
                    }
                }
            }

        },


    }
}]);

function appController($scope, $http, service, $window) {

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
            }
        }
    }

    $scope.update = function (id) {
        $scope.datas = service.user_update(id, $scope.user);
    }

    $scope.remove_user = function (id) {
        $scope.datas = service.user_delete(id);
    }


    $scope.login = function () {
        $http.post('http://127.0.0.1:8000/api/login',
            {'email': $scope.email, 'password': $scope.password}).then(function (response) {
            if (response.data.message == 'true') {
                $window.localStorage.setItem('token', response.data.token);
                $window.location.href = '/backend/user';
            } else {
                alert('fail');
            }
        }).catch(error => {
            alert(error.data.message);
        });
    }

    $scope.logout = function () {
        $http.get('http://127.0.0.1:8000/api/logout', {
            dataType: "json",
            headers: {
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            if (response.data.message == 'logout') {
                $window.localStorage.clear();
                $window.location.href = '/';
            }
        }).catch(error => {
            alert(error.data.message);
        });
    }

    //department
    if ($window.localStorage.getItem('token')) {
        $http.get('http://127.0.0.1:8000/api/departments', {
            dataType: "json",
            headers: {
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            var createObject = function (json) {
                return {
                    id: json.id,
                    name: json.name,
                    parent_id: json.parent_id,
                    description: json.description,
                    status: json.status,
                    children: []
                }
            };

            var processList = function (temporaryObj) {
                for (var i = 0; i < list.length; i++) {
                    if (list[i].parent_id === temporaryObj.id) {
                        temporaryObj.children.push(processList(createObject(list[i])));
                    }
                }

                return temporaryObj;

            };

            var convertList = function () {
                var temp = [];
                for (var i = 0; i < list.length; i++) {
                    if (list[i].parent_id === 0) {
                        temp.push(processList(createObject(list[i])));
                    }
                }
                return temp;

            };
            $scope.departments = response.data.data;
            var list = $scope.departments;
            $scope.newList = convertList(list);
        }).catch(function (err) {
            console.log(err);
        });
    } else {
        console.log('error department');
    }

    $scope.add_department = function () {
        $scope.departments = service.department_add($scope.name, $scope.description, $scope.parent_id, $scope.status);
    }
};

