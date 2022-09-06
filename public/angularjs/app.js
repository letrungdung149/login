var app = angular.module('myApp', ['angularUtils.directives.dirPagination'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


app.controller('AppCtrl', ['$scope', '$http', 'service','$window', appController]);

function appController($scope, $http, service,$window) {
    $scope.datas = [];
    $scope.pageSize = 5;
    $scope.roles = [];
    if ($window.localStorage.getItem('token')) {
        $http.get('http://127.0.0.1:8000/api/users',{
            dataType: "json",
            headers:{
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
        $scope.datas = service.add($scope.name, $scope.email, $scope.display_name);
    }

    $scope.edit_user = function (id) {
        for (var i in $scope.datas) {
            if ($scope.datas[i].id == id) {
                $scope.user = angular.copy($scope.datas[i]);
            }
        }
    }

    $scope.update = function (id) {
        $scope.datas = service.update(id,$scope.user,$scope.display_namee);
    }

    $scope.remove_user = function (id) {
        $scope.datas = service.delete(id);
    }


    $scope.login = function () {
        $http.post('http://127.0.0.1:8000/api/login',
            {'email': $scope.email, 'password': $scope.password}).then(function (response)
        {
            if (response.data.message == 'true') {
                $window.localStorage.setItem('token', response.data.token);
                $window.location.href = '/api/user';
            } else {
                alert('fail');
            }
        }).catch(error => {
            alert(error.data.message);
        });
    }
    // function check_login(email,pass){
    //     for(var i = 0;i < $scope.datas.length;i++){
    //         console.log($scope.datas[i].password);
    //         if($scope.datas[i].email == email && $scope.datas[i].password == pass){
    //              return $scope.datas[i];
    //         }

    //     }
    //     return false;
    // }
    $scope.logout = function () {
        $http.get('http://127.0.0.1:8000/api/logout',{
            dataType: "json",
            headers:{
                "Content-Type": "application/json",
                'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
            }
        }).then(function (response) {
            if (response.data.message == 'logout') {
                $window.localStorage.clear();
                $window.location.href = '/login';
            }
        }).catch(error => {
            alert(error.data.message);
        });
    }

    // $scope.remove_user = function(id){
    //     var result = confirm("Are you sure delete this post?");
    //    if (result) {
    //       $http({
    //         url: 'http://127.0.0.1:8000/api/users',
    //         method: 'POST'
    //       }).then(function(response){
    //         $scope.datas.splice(id,1);
    //       });
    //     }
    //   }


    $scope.search_user = function () {
        $http.get('http://127.0.0.1:8000/api/search/' + $scope.search).then(function (response) {
            console.log(response.data);
        }).catch(error => {
            alert('không tìm thấy kết quả nào của :' + $scope.search);
        });
    }
};

