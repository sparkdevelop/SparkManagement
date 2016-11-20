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

    public function get_user_by_name($user_name) {
        $this->db->select('*');
        $this->db->where('user_name', $user_name);
        $query = $this->db->get('user');
        $data = array();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function get_user_id_by_name($user_name) {
        $this->db->select('*');
        $this->db->where('user_name', $user_name);
        $query = $this->db->get('user');
        $data = array();
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        if(empty($data)) {
            throw new Exception("user not exist");
        }
        return $data[0]->user_id;
    }

    public function get_group_by_name($group_name) {
        $this->db->select('*');
        $this->db->where('ug_group', $group_name);
        $result = $this->db->get('user_groups');
        $data = array();
        foreach ($result->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function get_group_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->where('ug_user', $user_id);
        $result = $this->db->get('user_groups');
        $data = array();
        foreach ($result->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function update_user_info($old_user_name, $user_name, $user_email, $user_group) {
        $user_id = $this->get_user_id_by_name($old_user_name);
        $data = array(
            'user_name' => $user_name,
            'user_email' => $user_email
        );
        $this->db->where('user_name', $old_user_name);
        $this->db->update('user', $data);
        $group = $this->get_group_by_user_id($user_id);
        if(empty($group)) {
            $data = array(
                'ug_user' => $user_id,
                'ug_group' => $user_group,
            );
            $this->db->insert('user_groups', $data);
            return true;
        }
        $data = array(
            'ug_group' => $user_group,
        );
        $this->db->where('ug_user', $user_id);
        $this->db->update('user_groups', $data);
        return true;
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