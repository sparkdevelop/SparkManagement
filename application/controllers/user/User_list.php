<?php
/**
 * Created by PhpStorm.
 * User: shengli
 * Date: 16/11/17
 * Time: 上午11:03
 */
class User_list extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('user/User_list_model', 'user_list_model');
    }

    /**
     * 用户列表渲染
     */
    public function index() {
        $this->load->view('management/spark_user');
    }

    /**
     * 根据输入的用户名和用户组搜索相应的用户
     */
    public function search_user_list() {
        $user = $this->input->get('user');
        $group = $this->input->get('group');
        $user_list = $this->user_list_model->get_user_list($user, $group);
        $user_list = $this->formateDate($user_list);
        $data['user_list'] = $user_list;
        echo json_encode($data);
    }

    /**
     * 格式化数据库中查询出的时间数据
     * @param $user_list
     * @return array
     */
    private function formateDate($user_list) {
        if(!isset($user_list)) {
            return Array(Array());
        }
        $i = 0;
        foreach ($user_list as $single_user) {
            $user_list[$i]['user_touched'] = substr($single_user['user_touched'], 0, 4) . '-' . substr($single_user['user_touched'], 4, 2) . '-' . substr($single_user['user_touched'], 6, 2) . '-' . substr($single_user['user_touched'], 8, 2) . ':' . substr($single_user['user_touched'], 10, 2);
            $user_list[$i]['user_registration'] = substr($single_user['user_registration'], 0, 4) . '-' . substr($single_user['user_registration'], 4, 2) . '-' . substr($single_user['user_registration'], 6, 2) . '-' . substr($single_user['user_registration'], 8, 2) . ':' . substr($single_user['user_registration'], 10, 2);
            $i++;
        }
        return $user_list;
    }
}