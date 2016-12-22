<?php

class User_anlyse_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    // 读取自建数据表
    public function get_count_user_data()
    {
        // 读取自建数据表
        $result = $this->db->select("*");
        $sql = $this->db->get("wiki_count_user");
        return $sql;
    }

    // 数据组织
    public function count_user_data()
    {

    }

    public function get_stats()
    {
        $result = $this->db->select("*");
        $sql = $this->db->get("wiki_user");
        return $sql;
    }

    public function get_statsreal()
    {
        $result = $this->db->select("*");
        $sql = $this->db->get("wiki_site_stats");
        return $sql;
    }

    public function fetch($query)
    {
        $data = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }

    // 按日期获取当前新增用户数、总用户数
    /**
     * @function 获取
     * @params
     * @return array
     */
    public function get_user_data()
    {
        $Array = $this->fetch($this->get_stats());
        // 获取数据表中日期间隔
        $website_start_date = (int)substr($Array[0]['user_registration'], 0, 8);
        $yesterday = (int)date('Ymd', time());
        $length = count($Array);
        $num = array();
        $j=0;
        do{
            $key = (int) date('Ymd',strtotime('- '.$j.'day' ));
            $num[$key] = array(
                'incr_user' => 0,
                'total_user'=> 0,
                'date' => strval($key)
            );
            for ($i = $length - 1; $i > 0; $i--) {
                if (substr($Array[$i]['user_registration'], 0, 8) == strval($key)) {
                    $num[$key]['incr_user']++;
                }
            }

         if ($key== $yesterday) {
            $num[$key]['total_user'] = $length ;
           } else {
             $nu=$j-1;
             $before = (int) date('Ymd',strtotime('- '.$nu.'day' ));
             $num[$key]['total_user'] = $num[$before]['total_user']- $num[$key]['incr_user'] +$num[$yesterday]['incr_user'] ;
           }

            $j++;

        }
        while((int)$num[$key]['date']>(int)$website_start_date);

        $num = array_reverse($num);

        return $num;
    }


    public function insert()
    {
        $data = $this->get_user_data();
        // 数据库插入操作
        for ($i=0;$i<count($data);$i++)
        {
            $array=array(
                'incr_user'=>$data[$i]['incr_user'],
                'total_user'=>$data[$i]['total_user'],
                'date'=>$data[$i]['date']
            );
            $this->db->insert('wiki_new',$array);
        }

    }

    public function update()
    {
        $this->db->empty_table('wiki_new');
        $this->insert();
    }

    public function get_show_data($start_date, $end_date)
    {
        // 查询自建数据库
        $result = $this->db->select("*");
        $sql = $this->db->get("wiki_new");
        $Array = $this->fetch($sql);
        // 获取数据表中日期间隔
        $length = count($Array);
        $end = $length - 1;
        $website_end_date = (int)$Array[$end]['date'];
        $today = (int)date('Ymd', time());
        // 获取日期间隔
        $gap = $today - $website_end_date;
        // 返回数组
        $return_data = array();
        if ($gap == 0) {
            // 数据表已更新
            // 直接获取数据
            for ($i = 0; $i < count($Array); $i++) {
                if ($Array[$i]['date'] >= $start_date && $Array[$i]['date'] <= $end_date) {
                    array_push($return_data, $Array[$i]);
                }
            }
        } else if ($gap > 0) {
            // 数据表需更新
            // 进行数据库插入操作
            $this->update();
            $newResult = $this->db->select("*");
            $newSql = $this->db->get("wiki_new");
            $newArray = $this->fetch($newSql);
            for ($i = 0; $i < count($newArray); $i++) {
                if ($newArray[$i]['date'] >= $start_date && $newArray[$i]['date'] <= $end_date) {
                    array_push($return_data, $newArray[$i]);
                }
            }
        } else {
            // 数据出错，直接返回前七天


        }
        return $return_data;
    }
    public function try_(){

    }

}


?>