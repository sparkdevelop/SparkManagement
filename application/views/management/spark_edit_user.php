<?php
require_once("header.php");
?>
<script>
    var old_user_name = "<?php echo $user_name; ?>";
</script>
<script src="/SparkManagement/assets/js/spark_edit_user.js"></script>
<div class="content">
    <div class="second-nav">
        <ul class="nav nav-pills">
            <li><a href="/SparkManagement/index.php/user/User_list" target="_blank">所有用户</a></li>
            <li><a href="#">编辑用户</a></li>
        </ul>
    </div>
    <br>
    <p>你要修改的用户是：<?php echo $user_name; ?></p>
    <div class="form-horizontal" id="edit_user_form">
        <div class="form-group">
            <label for="editUser" class="col-sm-1 control-label">用户名：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="editUser" placeholder="keyWords" v-model="edit_user_name">
            </div>
        </div>
        <div class="form-group">
            <label for="editEmail" class="col-sm-1 control-label">邮件：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="editEmail" placeholder="keyWords" v-model="edit_user_email">
            </div>
        </div>
        <div class="form-group">
            <label for="editGroup" class="col-sm-1 control-label">用户组：</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="editGroup" placeholder="keyWords" v-model="edit_user_group">
            </div>
        </div>
        <div class="form-group">
            <label for="reset" class="col-sm-1 control-label"></label>
            <div class="col-sm-3">
                <button class="btn btn-primary form-control" id="reset" v-on:click="edit_user_info">重置</button>
            </div>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>
