<?php

class Pages extends CI_Controller {

    public function view($page='home'){
        if (! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
show_404();
        }
        $data['tittle']=ucfirst($page);
        $this->load->view('pages/'.$page,$data);


    }
}

?>