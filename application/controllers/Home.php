<?php
class Home extends CI_Controller{
    function __construct(){
        parent:: __construct();
        $this->load->model('Home_model');
        $this->load->library('template_customer');
    }
        
    public function index (){
        $this->load->view('Home_view');
        
    }
}

?>