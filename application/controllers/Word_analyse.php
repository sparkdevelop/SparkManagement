<?php

class Word_analyse extends CI_Controller {
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
        $this->load->model('Word_analyse_model');

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
        $this->load->view('word_analyse',$data);

    }
}
    ?>