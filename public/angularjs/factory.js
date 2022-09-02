app.factory('service',function($http){
    return {
        add : function(name,email){
            $http.post('http://127.0.0.1:8000/api/users',{'name':name,'email':email}).then(function(response) {
                alert('success');
            }).catch(error => {
                 alert(error.data.message);
            });
        },
        update : function(user,id){
            $http.put('http://127.0.0.1:8000/api/users/' + id, user).then(function(response){
                alert('success');
        }).catch(error => {
            alert(error.data.message);
        });
        },
        delete : function(id){
            var result = confirm("Are you sure delete?");
            if(result){
                $http.delete('http://127.0.0.1:8000/api/users/'+ id).then(function(response){
                alert('success');
                }).catch(error => {
                    alert(error.data.message);
                });
            }
        }
    }
    
});