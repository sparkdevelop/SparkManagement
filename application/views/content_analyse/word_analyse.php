<?php
$this->load->view('template/header.php');
?>
<!--<link href="/SparkManagement/assets/css/user_analyse/user_analyse_style.css" rel="stylesheet">-->

<div class="content">
    <div class="second-nav">
        <ul class="nav nav-pills">
            <li class="active"><a href="/SparkManagement/index.php/content_analyse/Word_analyse/get_active">整体分析</a></li>
            <li class=""><a href="#">热门词条</a></li>
            <li class=""><a href="#">热门搜索</a></li>
        </ul>
    </div>
    <br>
    <div class="clearfix">

        <i class="fa fa-user-md fa-5x gift1" style="color: white ; text-align: center ; padding-top: 40px; float: left;background-color: rgb(255,107,100)" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 200px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $total_data[0]['ss_total_pages']?></span><br/><span class="">总词条数</span></div>

        <i class="fa fa-user-md fa-5x gift1" style="color: white ; text-align: center ; padding-top: 40px; float: left; background-color: rgb(250,209,97)" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 200px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $total_data[0]['ss_total_edits']?></span><br/><span class="">总编辑次数</span></div>

        <i class="fa fa-user-md fa-5x gift1" style="color: white ; text-align: center ; padding-top: 40px; float: left;background-color: rgb(76,201,238)" ></i>
        <div class="" style="background-color: #ffffff ;text-align:center;width: 200px;height: 150px;display: block;float: left;padding-top: 34px"><span class="" style="font-size: 36px"><?php echo $total_data[0]['ss_total_views']?></span><br/><span class="">总访问量</span></div>



    </div>


    <table class="table table-hover table-striped" style="margin-top: 50px">
        <thead>
        <tr>
            <th>热门词条</th>
            <th>点击量</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($word_data as $key => $value) {
            echo "<tr></tr><td>".$value['page_title']."</td><td>".$value['page_counter']."</td></tr>";
        }
        ?>

        <tr >

            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>


<?php
$this->load->view('template/footer.php');
?>
