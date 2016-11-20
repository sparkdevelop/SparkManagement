$(function() {
    var edit_user_form = new Vue({
        el: '#edit_user_form',
        data: {
            edit_user_name: '',
            edit_user_email: '',
            edit_user_group: '',
            ori_user_name: old_user_name,
        },
        methods: {
            edit_user_info: function() {
                var data = {
                    'user_name': this.edit_user_name,
                    'user_email': this.edit_user_email,
                    'user_group': this.edit_user_group,
                    'old_user_name': this.ori_user_name,
                };
                var options = {
                    url: '/SparkManagement/index.php/user/User_list/edit_user_info',
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    beforeSend: function () {
                        $('#reset').attr('disabled', 'disabled');
                        $('#reset').text('重置中...');
                    },
                    success: function(data) {
                        if(data == "EMAIL_ERROR") {
                            alert("邮箱格式错误");
                            edit_user_form.reset();
                            return;
                        }
                        if(data == "USER_NOT_EXIST") {
                            alert("要修改的用户不存在");
                            edit_user_form.reset();
                            return;
                        }
                        if(data == "GROUP_NOT_EXIST") {
                            alert("要更换的用户组不存在");
                            edit_user_form.reset();
                            return;
                        }
                        alert('信息修改成功！');
                        edit_user_form.reset();
                    },
                    error: function() {
                        alert("修改失败，请检查填入的信息是否正确");
                        edit_user_form.reset();
                    },
                }
                if(edit_user_form.edit_user_name == '' || edit_user_form.edit_user_email == '' || edit_user_form.edit_user_group == '') {
                    alert('信息填写不完全！');
                    return;
                }
                $.ajax(options);
            },
            reset: function () {
                $('#reset').removeAttr('disabled');
                $('#reset').text('重置');
                edit_user_form.edit_user_name = '';
                edit_user_form.edit_user_email = '';
                edit_user_form.edit_user_group = '';
            }
        },
    });

});