<?php
require_once("management/header.php");
?>
<script src="/Spark/assets/js/spark_user.js" xmlns:v-on="http://www.w3.org/1999/xhtml"
        xmlns:v-on="http://www.w3.org/1999/xhtml"></script>
<div class="content">
    <div class="second-nav">
        <ul class="nav nav-pills">
            <li class="active"><a href="#">用户增长</a></li>
            <li><a href="#">活跃用户</a></li>
            <li><a href="#">用户画像</a></li>
        </ul>
    </div>
    <br>
    <div class="clearfix">


        <i class="fa fa-user-md fa-5x gift" style="color: white ; text-align: center ; padding-top: 40px; float: left" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 250px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['incr_user']?></span><br/><span class="">新增用户数</span></div>


        <i class="fa fa-users fa-4x user" style="color: white;text-align: center ; padding-top: 45px;float: left; margin-left: px"></i>
        <div class="" style="background-color:#ffffff ;text-align:center;width: 250px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $user_data[0]['total_user']?></span><br/><span class="">总用户数</span></div>

    </div>

    <div id="user_list_table">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>
                    <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" style="border: 0">
                           <?php echo $date['start_date'] ?> 至 <?php echo $date['end_date'] ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                            <li role="presentation" ><a role="menuitem" tabindex="-1" href="<?php echo $urlnew?>">
                                    <?php echo date('Y-m-d',strtotime('- 15 day' )) ?> 至 <?php echo date('Y-m-d',strtotime('- 8 day' )) ?></a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $urlnew1?>">
                                    <?php echo date('Y-m-d',strtotime('- 23 day' )) ?> 至 <?php echo date('Y-m-d',strtotime('- 16 day' )) ?></a></li>

                        </ul>
                    </div></th>
                <th>新增用户数</th>
                <th>总用户数</th>
            </tr>
            </thead>
            <tbody>

            <?php
                foreach ($user_data as $key => $value) {
                    echo "<tr><td>".substr(strval($value['date']),0,4)."-".substr(strval($value['date']),4,2)."-".
                        substr(strval($value['date']),6,2)."</td><td>".$value['incr_user']."</td><td>".$value['total_user']."</td></tr>";
                }
            ?>

            </tbody>
        </table>
    </div>
</div>

<div id="end_date" name="end_date" displsy="none"><?php echo $user_data[0]['date']?></div>
<script>
    alert($("#end_date").text());
</script>
<?php
require_once("management/footer.php");
?>
