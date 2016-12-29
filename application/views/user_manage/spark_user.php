<?php
   $this->load->view('template/header.php');
?>
      <div class="content">
        <div class="second-nav">
          <ul class="nav nav-pills">
            <li class="active"><a href="/SparkManagement/index.php/user_manage/User_list" target="_blank">所有用户</a></li>
            <li><a href="/SparkManagement/index.php/user_manage/User_list/edit_user_info" target="_blank">编辑用户</a></li>
          </ul>
        </div>
        <br>
         <div class="form-horizontal">
             <div class="form-group">
               <label for="inputUser" class="col-sm-1 control-label">用户名：</label>
               <div class="col-sm-3">
                 <input type="search" class="form-control" id="inputUser" placeholder="keyWords">
               </div>
             </div>
             <div class="form-group">
               <label for="inputGroup" class="col-sm-1 control-label">用户组：</label>
               <div class="col-sm-3">
                 <input type="search" class="form-control" id="inputGroup" placeholder="keyWords">
               </div>
             </div>
             <div class="form-group">
               <label for="submit" class="col-sm-1 control-label"></label>
               <div class="col-sm-3">
                 <button class="btn btn-primary form-control" id="submit">给我搜</button>
               </div>
             </div>
         </div>

        <div id="user_list_table">
          <table class="table table-hover table-striped">
            <thead>
            <tr>
              <th>用户名</th>
              <th>用户组</th>
              <th>邮箱</th>
              <th>最近登录</th>
              <th>注册时间</th>
              <th>编辑</th>
            </tr>
            </thead>
            <tbody>
              <tr v-for="user in users">
                <td>{{ user.user_name }}</td>
                <td>{{ user.ug_group }}</td>
                <td>{{ user.user_email }}</td>
                <td>{{ user.user_touched }}</td>
                <td>{{ user.user_registration }}</td>
                <td><a v-on:click="edit">编辑<span hidden="hidden">{{ user.user_name }}</span></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
<script src="/SparkManagement/assets/js/user_manage/spark_user.js" language="JavaScript"></script>
<?php
$this->load->view('template/footer.php');
?>
