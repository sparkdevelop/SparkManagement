<?php


class User_analyse extends CI_Controller {
public function __construct()
{
    parent::__construct();
    $config['hostname'] = '115.28.144.64';
    $config['username'] = 'root';
    $config['password'] = 'lh920225';
    $config['database'] = 'my_wiki';
    $config['dbdriver'] = 'mysqli';
    $config['dbprefix'] = '';
    $config['pconnect'] = FALSE;
    $config['db_debug'] = TRUE;
    $config['cache_on'] = FALSE;
    $config['cachedir'] = '';
    $config['char_set'] = 'utf8';
    $config['dbcollat'] = 'utf8_general_ci';
    $this->load->database($config);
    $this->load->model('user/User_anlyse_model');

}
public function print_array(){
    $num=$this->User_anlyse_model->print_array();
    echo $num;
}
public function info_data()
{
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/Spark/index.php/user/User_analyse/info_data1';
    if (empty($_GET['start_date']) && empty($_GET['end_date'])) {
        // 附默认值
        $end_date = (int)date('Ymd', time());
        $start_date =  (int) date('Ymd',strtotime('- 7 day' ));
    } else {
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];
    }

    $user_data = $this->User_anlyse_model->get_show_data($start_date, $end_date);

    $data['user_data'] = array_reverse($user_data);
    $data['api_url'] = $url;
    $urlnew='http://' . $_SERVER['SERVER_NAME'] . '/Spark/index.php/user/User_analyse/info_data?start_date='.date('Ymd',strtotime('- 15 day' )) .'&end_date='.date('Ymd',strtotime('- 8 day' ));
    $urlnew1='http://' . $_SERVER['SERVER_NAME'] . '/Spark/index.php/user/User_analyse/info_data?start_date='.date('Ymd',strtotime('- 23 day' )) .'&end_date='.date('Ymd',strtotime('- 16 day' ));
    $data['urlnew']=$urlnew;
    $data['urlnew1']=$urlnew1;
    // 前端展示变量
    $data['date'] = array(
        'start_date' => $start_date,
        'end_date' => $end_date,
    );
    $this->load->view('user_analyse',$data);

}
    public function info_data1($start_date,$end_date)
    {

        if (empty($start_date) && empty($end_date)) {
            // 附默认值
            $end_date = (int)date('Ymd', time());
            $start_date = $end_date - 7;
        }

        $user_data = $this->User_anlyse_model->get_show_data($start_date, $end_date);
        $data['user_data'] = array_reverse($user_data);

        $this->load->view('user_analyse', $data);

    }

public function info_chart()
{
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/Spark/index.php/user/User_analyse/info_chart1';

    if (empty($_GET['start_date']) && empty($_GET['end_date'])) {
        // 附默认值
        $end_date = (int)date('Ymd', time());
        $start_date = $end_date - 7;
    }

    $user_data = $this->User_anlyse_model->get_show_data($start_date, $end_date);
    $data['user_data'] = array_reverse($user_data);

    $incr_data = array();
    $total_data = array();
    foreach ($user_data as $key => $value) {
        array_push($incr_data, $value['incr_user']);
        array_push($total_data, $value['total_user']);
    }
    $data['incr_data'] = json_encode($incr_data);
    $data['total_data'] = json_encode($total_data);
    $data['api_url'] = $url;
    $this->load->view('user_increment',$data);

}

    public function info_chart1()
    {
        if (empty($_POST['start_date']) || empty($_POST['end_date'])) {
            // 附默认值
            $end_date = (int)date('Ymd', time());
            $start_date = $end_date - 7;
        } else {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
        }

        $user_data = $this->User_anlyse_model->get_show_data($start_date, $end_date);
        $data['user_data'] = array_reverse($user_data);

        $incr_data = array();
        $total_data = array();
        foreach ($user_data as $key => $value) {
            array_push($incr_data, $value['incr_user']);
            array_push($total_data, $value['total_user']);
        }
        $data['incr_data'] = json_encode($incr_data);
        $data['total_data'] = json_encode($total_data);
        var_dump($data);
        //$this->load->view('user_increment',$data);

    }

// 获取图表数据
public function get_user_data($start_date, $end_date)
{
    //
}








}





?>