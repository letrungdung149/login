app.controller('todoController', ['$scope', '$http', 'service', '$window', todoController]);

function todoController($scope, $http, service, $window){
    $scope.pageSize = 5;
    if ($window.localStorage.getItem('token')) {
        $http.get('http://127.0.0.1:8000/api/todo-list', {
            dataType: "json",
            headers: {
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            $scope.todos = response.data.data;
        }).catch(function (err) {
            console.log(err);
        });
    } else {
        console.log('error');
    }

    $scope.actions = {
        add : function (name,description){
            $http.post('http://127.0.0.1:8000/api/todo-list', {
                'name': name,
                'description': description,
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
        update : function (id,todo){
            $http.put('http://127.0.0.1:8000/api/todo-list/' + id, todo, {
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
        delete : function (id){
            $http.delete('http://127.0.0.1:8000/api/todo-list/' + id, {
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
        check : function (id){
            $http.get('http://127.0.0.1:8000/api/todo-list-check/' + id, {
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
        filter_status : function (check){
            $http.post('http://127.0.0.1:8000/api/todo-list-filter', {
                'check': check,
            }, {
                dataType: "json",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function (response) {
                $scope.todos = response.data.todoList.data;
            }).catch(error => {
                alert(error.data.message);
            });
        },
        change: function (change){
            $http.post('http://127.0.0.1:8000/api/todo-list-change', {
                'change': change,
            }, {
                dataType: "json",
                headers: {
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function (response) {
                $scope.todos = response.data.todoList.data;
            }).catch(error => {
                alert(error.data.message);
            });
        }

    };

    $scope.add_todos = function (){
        $scope.actions.add($scope.name, $scope.description);
    }
    $scope.edit_todos = function (id){
        for (var i in $scope.todos) {
            if ($scope.todos[i].id == id) {
                $scope.todo = angular.copy($scope.todos[i]);
            }
        }
    }

    $scope.update_todos = function (id){
        $scope.actions.update(id,$scope.todo);
    }
    $scope.delete_todos = function (id){
        $scope.actions.delete(id);
    }
    $scope.check_complete = function (id){
        $scope.actions.check(id);
    }
    $scope.check_status = function (){
        $scope.actions.filter_status($scope.check);
    }
    $scope.search_change = function (){
        $scope.actions.change($scope.search_name);
    }
}
