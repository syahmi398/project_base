<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array();

        // pr('data2');
        $this->template->load('login',$data,'login');
    }

    public function login(){
        $post = $this->input->post();

        redirect('home');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('authentication');
    }
}
