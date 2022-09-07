app.factory('service',function($http,$window){
    return {
        add : function(name,email,display_name){
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
        update : function(id,user){
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
            factory.update = function (user, id) {
                var url = API + "users/edit/" + id;
                console.log(url);
                $http({
                    method: "PUT",
                    url: url,
                    data: user,
                })
                    .then(function () {
                        // location.reload();
                        alert("Update Successful");
                    })
                    .catch((error) => {
                        alert(error.data.message);
                    });
            };
        },
        delete : function(id){
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
        }
    }

});
