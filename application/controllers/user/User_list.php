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
        $this->load->library('Management_constants');
        $this->load->database();
        $this->load->model('user/User_list_model', 'user_list_model');
    }

    /**
     * 用户列表渲染
     */
    public function index() {
        $this->load->view('management/spark_user');
    }

    public function edit_view() {
        $user_name = $this->input->get('user_name');
        $data['user_name'] = $user_name;
        $this->load->view('management/spark_edit_user', $data);
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

    public function edit_user_info() {
        $user_name = $this->input->post('user_name');
        $user_email = $this->input->post('user_email');
        $user_group = $this->input->post('user_group');
        $old_user_name = $this->input->post('old_user_name');
        if(empty($user_name) || empty($user_email) || empty($user_group)) {
            throw new Exception("lack info");
        }
        $verify = $this->check_user_info($old_user_name, $user_group, $user_email);
        if($verify != "PASS") {
            echo json_encode($verify);
            return;
        }
        $is_success = $this->user_list_model->update_user_info($old_user_name, $user_name, $user_email, $user_group);
        echo json_encode($is_success);
    }

    private function check_user_info($old_user_name, $user_group, $user_email) {
        $user = $this->user_list_model->get_user_by_name($old_user_name);
        if(empty($user)) {
            return $this->management_constants->get_user_not_exist();
        }
        $group = $this->user_list_model->get_group_by_name($user_group);
        if(empty($group)) {
            return $this->management_constants->get_group_not_exist();
        }
        $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
        if(!preg_match($pattern, $user_email)) {
            return $this->management_constants->get_email_error();
        }
        return "PASS";
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
