app.factory('service',function($http,$window){
    return {
        add : function(name,email,display_name){
            $http.post('http://127.0.0.1:8000/api/users',{'name':name,'email':email,'display_name':display_name}).then(function(response) {
                $window.location.reload()
            }).catch(error => {
                 alert(error.data.message);
            });
        },
        update : function(id,user,display_name){
            $http.put('http://127.0.0.1:8000/api/users/' + id, user,{'display_name':display_name}).then(function(response){
                $window.location.reload()
        }).catch(error => {
            alert(error.data.message);
        });
        },
        delete : function(id){
            var result = confirm("Are you sure delete?");
            if(result){
                $http.delete('http://127.0.0.1:8000/api/users/'+ id).then(function(response){
                    $window.location.reload()
                }).catch(error => {
                    alert(error.data.message);
                });
            }
        }
    }

});
