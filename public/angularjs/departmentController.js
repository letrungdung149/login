app.controller('departmentController', ['$scope', '$http', 'service', '$window', 'departmentService', departmentController]);

function departmentController($scope, $http, service, $window, departmentService) {
    $scope.data = {
        list: [],
    }
    $scope.action = {
        add: function (name, description, root) {
            $http.post('http://127.0.0.1:8000/api/departments', {
                'name': name,
                'description': description,
                'root': root,
            }, {
                dataType: "json",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function (response) {
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        update: function (id, department) {
            $http.put('http://127.0.0.1:8000/api/departments/' + id, department, {
                dataType: "json",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function (response) {
                $window.location.reload()
            }).catch(error => {
                alert(error.message);
            });
        },
        delete: function (id) {
            $http.delete('http://127.0.0.1:8000/api/departments/' + id, {
                dataType: "json",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function (response) {
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        search: function (data,result_search) {
            for (var i = 0; i < data.length; i++) {
                if (data[i].name.indexOf($scope.search_dept) !== -1){
                    result_search.push(data[i]);
                }
            }
        }
    };
    $scope.add_department = function () {
        $scope.action.add($scope.name, $scope.description, $scope.root);
    }
    $scope.edit_department = function (id) {
        for (var i in $scope.data.listDep.data) {
            if ($scope.data.listDep.data[i].id == id) {
                $scope.department = angular.copy($scope.data.listDep.data[i]);
            }
        }
    }
    $scope.update_department = function (id) {
        $scope.action.update(id, $scope.department);
    }
    /*
       117    0/117
       118    0/117/118
       119    0/117/118/119
    */
    $scope.delete_department = function (id) {
        $scope.action.delete(id);
    }
    $scope.search = function () {
        $scope.action.search($scope.data.listDep.data,$scope.result_search = []);
    }
    var processData = {
        listDep: [],
        getListDep: function () {
            $http.get('http://127.0.0.1:8000/api/departments', {
                dataType: "json",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then((resp) => {
                $scope.data.listDep = resp.data;
               return $scope.result = departmentService.buildListDep($scope.data.listDep.data);
            }).catch((err) => {
                console.log(err)
            })
        },
    };
    processData.getListDep();
}
