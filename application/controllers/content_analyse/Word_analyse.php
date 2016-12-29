<?php

class Word_analyse extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Management_constants');
        $this->load->database();
        $this->load->model('content_analyse/Word_analyse_model');
    }

    public function get_active()
    {
        if (empty($_GET['length'])) {
            $length = 10;
        } else {
            $length = $_GET['length'];
        }
        $array = $this->Word_analyse_model->get_word_data($length);
        $num=$this->Word_analyse_model->get_normal_page();


        $data['word_data'] = $array;
        $data['total_data'] = $this->Word_analyse_model->get_count_word_data();
        $this->load->view('content_analyse/word_analyse',$data);

    }
}
    ?>