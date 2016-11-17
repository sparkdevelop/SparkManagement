<?php
  require_once("header.php");
?>
      <div class="content">
        <div class="second-nav">
          <ul class="nav nav-pills">
            <li class="active"><a href="#">子标题1</a></li>
            <li><a href="#">子标题2</a></li>
            <li><a href="#">子标题3</a></li>
          </ul>
        </div>

        <div>
          <table class="table table-hover table-striped">
            <caption>表格样式示例</caption>
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
            <?php 
              foreach ($user_list as $single_user) {
            ?>
              <tr>
                <td><?php echo $single_user['user_name'] ?></td>
                <td><?php echo $single_user['ug_group'] ?></td>
                <td><?php echo $single_user['user_email'] ?></td>
                <td><?php echo $single_user['user_touched'] ?></td>
                <td><?php echo $single_user['user_registration'] ?></td>
            <?php
              }
            ?>

            <tr>
              <td><?php echo $user_list[0]['user_name']; ?></td>
              <td>Bangalore</td>
              <td>560001</td>
            </tr>
            </tbody>
          </table>

        </div>
      </div>
<?php
  require_once("footer.php");
?>
