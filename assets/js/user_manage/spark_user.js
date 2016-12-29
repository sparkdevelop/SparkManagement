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
                    'group': group,
                };
                var options = {
                    url: '/SparkManagement/index.php/user_management/User_list/search_user_list',
                    type: 'get',
                    data: data,
                    dataType: 'json',
                    success: function (data) {
                        user_list_table.users = data['user_list'];
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert(XMLHttpRequest.status);
                        alert(XMLHttpRequest.readyState);
                        alert(textStatus);
                    }
                };
                $.ajax(options);
            },
            edit: function(event) {
                user_name = $(event.target).find('span').first().text();
                url = '/SparkManagement/index.php/user_management/User_list/edit_view?user_name=' + user_name;
                window.location = url;
            }
        }
    });

    user_list_table.get_user_list();

});
