<?php
  require_once("header.php");
?>
<script src="/SparkManagement/assets/js/spark_user.js" xmlns:v-on="http://www.w3.org/1999/xhtml"
        xmlns:v-on="http://www.w3.org/1999/xhtml"></script>
      <div class="content">
        <div class="second-nav">
          <ul class="nav nav-pills">
            <li class="active"><a href="#">所有用户</a></li>
            <li><a href="#">编辑用户</a></li>
          </ul>
        </div>

        <br>
         <div>
           <form class="form-horizontal" role="form">
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
                 <button type="submit" class="btn btn-primary form-control" id="submit">给我搜</button>
               </div>
             </div>
           </form>
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
            </tr>
            </thead>
            <tbody>
              <tr v-for="user in users">
                <td>{user.user_name }</td>
                <td>{ user.ug_group }</td>
                <td>{ user.user_email }</td>
                <td>{ user.user_touched }</td>
                <td>{ user.user_registration }</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
<?php
  require_once("footer.php");
?>
