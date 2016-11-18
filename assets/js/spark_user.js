$(function(){

    $('#submit').on('click', function() {
        var user = $('#inputUser').val();
        var group = $('#inputGroup').val();
        if(user == '' && group == '') {
            alert("用户名和用户组不能同时为空");
            return false;
        }
        user_list_table.get_user_list();
    });


    var user_list_table = new Vue({
        el: '#user_list_table',
        data: {
            users: [],
        },
        methods: {
            get_user_list: function(event) {
                var user = $('#inputUser').val();
                var group = $('#inputGroup').val();
                var data = {
                    'user': user,
                    'group': group
                }
                options = {
                    url: '/SparkManagement/index.php/user/User_list/search_user_list',
                    type: 'get',
                    data: data,
                    dataType: 'json',
                    success: function (data) {
                        user_list_table.users = data['user_list'];
                    }
                }
                $.ajax(options);
            }
        }
    }
    );

    user_list_table.get_user_list();
});