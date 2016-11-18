<?php
/**
 * Created by PhpStorm.
 * User: shengli
 * Date: 16/11/17
 * Time: 上午11:07
 */
class User_list_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_user_list($user=null, $group=null) {
        $this->db->select("u.user_name, u.user_email, ug.ug_group, u.user_touched, u.user_registration");
        $this->db->join("user_groups ug", "u.user_id=ug.ug_user", "left");
        $this->db->order_by("u.user_touched", "desc");
        if(!empty($user)) {
            $this->db->like("u.user_name", $user);
        }
        if(!empty($group)) {
            $this->db->like("ug.ug_group", $group);
        }
        $result = $this->db->get("user u");
        return $this->fetch($result);
    }

    public function fetch($query) {
        $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

}