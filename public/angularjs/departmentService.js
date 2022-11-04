app.factory('departmentService', function () {
    return {
        buildListDep: function (data) {
           result = [...data];
            for (const item of data) {
                item.src = ''
            }
            for (const item of result) {
                arr = item.root.split("/");
                for (var i = 0; i < arr.length; i++) {
                    for (const obj of data) {
                        if (obj.id == arr[i]) {
                            item.src = item.src + '/' + obj.name;
                        }
                    }
                }
            }
            return result;
        }
    }
});
