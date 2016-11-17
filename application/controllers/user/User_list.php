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

    public function index() {
        $user_list = $this->user_list_model->get_user_list();
        $i = 0;
        foreach ($user_list as $single_user) {
        	$user_list[$i]['user_touched'] = substr($single_user['user_touched'], 0, 4) . '-' . substr($single_user['user_touched'], 4, 2) . '-' . substr($single_user['user_touched'], 6, 2) . '-' . substr($single_user['user_touched'], 8, 2) . ':' . substr($single_user['user_touched'], 10, 2);
        	$user_list[$i]['user_registration'] = substr($single_user['user_registration'], 0, 4) . '-' . substr($single_user['user_registration'], 4, 2) . '-' . substr($single_user['user_registration'], 6, 2) . '-' . substr($single_user['user_registration'], 8, 2) . ':' . substr($single_user['user_registration'], 10, 2);
       		$i++;
        }
        $data['user_list'] = $user_list;
        //print_r($data);
        $this->load->view('management/nav', $data);
    }
}