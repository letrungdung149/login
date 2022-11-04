app.factory('service',function($http,$window){
    return {
        user_add : function(name,email,display_name){
            $http.post('http://127.0.0.1:8000/api/users',{'name':name,'email':email,'display_name':display_name},{
                dataType: "json",
                headers:{
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function(response) {
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        user_update : function(id,user){
            $http.put('http://127.0.0.1:8000/api/users/' + id, user,{
                dataType: "json",
                headers:{
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function(response){
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        user_delete : function(id){
            var result = confirm("Are you sure delete?");
            if(result){
                $http.delete('http://127.0.0.1:8000/api/users/'+ id,{
                    dataType: "json",
                    headers:{
                        "Content-Type": "application/json",
                        'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                    }
                }).then(function(response){
                    $window.location.reload()
                }).catch(error => {
                    alert(error.data.message);
                });
            }
        },
        //roles
        role_add : function(name,display_name,permissionArr){
            $http.post('http://127.0.0.1:8000/api/roles',{'name':name,'display_name':display_name,'permission':permissionArr},{
                dataType: "json",
                headers:{
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function(response) {
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        role_update : function(id,role,permissionArr){
            $http.put('http://127.0.0.1:8000/api/roles/'+ id,{'name':role.name,'display_name':role.display_name,'permission':permissionArr},{
                dataType: "json",
                headers:{
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function(response){
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        role_delete : function(id){
            var result = confirm("Are you sure delete?");
            if(result){
                $http.delete('http://127.0.0.1:8000/api/roles/'+ id,{
                    dataType: "json",
                    headers:{
                        "Content-Type": "application/json",
                        'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                    }
                }).then(function(response){
                    $window.location.reload()
                }).catch(error => {
                    alert(error.data.message);
                });
            }
        },
        //permission
        permission_add : function(name,display_name){
            $http.post('http://127.0.0.1:8000/api/permissions',{'name':name,'display_name':display_name},{
                dataType: "json",
                headers:{
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function(response) {
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        permission_update : function(id,permission){
            $http.put('http://127.0.0.1:8000/api/permissions/' + id, permission,{
                dataType: "json",
                headers:{
                    "Content-Type": "application/json",
                    'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                }
            }).then(function(response){
                $window.location.reload()
            }).catch(error => {
                alert(error.data.message);
            });
        },
        permission_delete : function(id){
            var result = confirm("Are you sure delete?");
            if(result){
                $http.delete('http://127.0.0.1:8000/api/permissions/'+ id,{
                    dataType: "json",
                    headers:{
                        "Content-Type": "application/json",
                        'Authorization': 'Bearer ' + $window.localStorage.getItem('token'),
                    }
                }).then(function(response){
                    $window.location.reload()
                }).catch(error => {
                    alert(error.data.message);
                });
            }
        },
    }
});
