<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/19
 * Time: 11:55
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Management_constants {

    const EMAIL_ERR0R = "EMAIL_ERROR";
    public function get_email_error() {
        return self::EMAIL_ERR0R;
    }

    const USER_NOT_EXIST = "USER_NOT_EXIST";
    public function get_user_not_exist() {
        return self::USER_NOT_EXIST;
    }

    const GROUP_NOT_EXIST = "GROUP_NOT_EXIST";
    public function get_group_not_exist() {
        return self::GROUP_NOT_EXIST;
    }
}