var app = angular.module('myApp', ['angularUtils.directives.dirPagination'], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('AppCtrl', ['$scope', '$window','$http', appController]);


function appController($scope, $window,$http) {

    $scope.login = function () {
        $http.post('http://127.0.0.1:8000/api/login',
            {'email': $scope.email, 'password': $scope.password}).then(function (response) {
            if (response.data.message == 'true') {
                $window.localStorage.setItem('token', response.data.token);
                $window.location.href = 'http://127.0.0.1:8081/callback';
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

};

