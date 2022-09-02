var app = angular.module('myApp',['angularUtils.directives.dirPagination'],function ($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});


app.controller('AppCtrl', ['$scope', '$http','service', appController]);
function appController($scope,$http,service){
        $scope.datas = [];
        $scope.pageSize = 5;

        $http.get('http://127.0.0.1:8000/api/users').then(function(response){
            $scope.datas = response.data.data;
        }).catch(function(err){
            console.err(err);
        });

        $scope.add_user = function(){
            $scope.datas = service.add($scope.name,$scope.email);
        }

        $scope.edit_user = function(id){
            for(var i in $scope.datas){
                if($scope.datas[i].id == id){
                    $scope.user = angular.copy($scope.datas[i]);
                }
            }
        }

        $scope.update = function(id){
            $scope.datas = service.update($scope.user,id);
        }

        $scope.remove_user = function(id){
            $scope.datas = service.delete(id);
        }

        $scope.login = function(){
            $http.post('http://127.0.0.1:8000/api/login',{'email':$scope.email,'password':$scope.password}).then(function(response){
                    if(response.data.message == 'true'){
                        location = 'http://127.0.0.1:8000/backend/dashboard';
                    }else{
                        $scope.isLogin = false;
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
        $scope.logout = function(){
            $http.post('http://127.0.0.1:8000/api/logout').then(function(response) {
                if(response.data.message == 'logout'){
                    sessionStorage.removeItem('login');
                    $scope.isLogin = false;
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





        $scope.search_user = function(){
            $http.get('http://127.0.0.1:8000/api/search/'+ $scope.search).then(function(response){
                console.log(response.data);
            }).catch(error =>{
                alert('không tìm thấy kết quả nào của :' + $scope.search);
            });
        }
    };

