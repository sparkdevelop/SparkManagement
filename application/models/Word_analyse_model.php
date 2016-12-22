<?php

class Word_analyse_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_word_data($length)
    {
        // 读取自建数据表
        $result= $this->db->select("*");
        $sql = $this->db->get("wiki_page");
        $array = $this->fetch($sql);

        // 二维数组按指定字段排序
        $sort = array(
            'direction' => 'SORT_DESC', //排序顺序标志 SORT_DESC 降序；SORT_ASC 升序
            'field' => 'page_counter',   //排序字段
        );
        $arrSort = array();
        foreach ($array as $uniqid => $row) {
            foreach ($row as $key => $value) {
                $arrSort[$key][$uniqid] = $value;
            }
        }
        if ($sort['direction']) {
            array_multisort($arrSort[$sort['field']], constant($sort['direction']), $array);
        }

        return array_slice($array, 1, $length);
    }

    public function get_count_word_data()
    {
        $result = $this->db->select("*");
        $sql = $this->db->get("wiki_site_stats");
        $array = $this->fetch($sql);
        return $array;
    }
    //得到普通页面数
    public function get_normal_page()
    {
         $this->db->select("*");
        $this->db->where('page_namespace',0);
        $sql = $this->db->get("wiki_page");
        $array=$this->fetch($sql);
        $num=count($array);
        return $num;



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


}

?>