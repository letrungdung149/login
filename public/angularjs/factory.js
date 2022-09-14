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
        department_add : function (name,description,parent_id,status){
            $http.post('http://127.0.0.1:8000/api/departments',{'name':name,'description':description,'parent_id':parent_id,'status':status},{
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
        }
    }

});
