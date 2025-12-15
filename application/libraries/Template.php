<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {

    protected $CI;
    protected $template_data = [];

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    /**
     * Load the template view
     * 
     * @param string $view The main content view
     * @param array $data Data to pass to the view
     * @param string $template The template name (default is 'system' for normal pages, 'login' for login pages)
     */
    public function load($view, $data = [], $template = 'system')
    {
        // Merge template data with the passed data
        $data = array_merge($this->template_data, $data);

        // Check if it's a login page or system page and load respective layout
        if ($template == 'login') {
            $this->CI->load->view('layout/login/index', $data);
        } else {
            // For system pages, load the full system layout
            $this->CI->load->view('layout/master/header', $data);
            $this->CI->load->view('layout/master/sidenav', $data);
            $this->CI->load->view($view, $data);
            $this->CI->load->view('layout/master/nav', $data);
            $this->CI->load->view('layout/master/footer', $data);
        }
    }

    /**
     * Set template data that will be passed to every view loaded
     * 
     * @param array $data
     */
    public function set($data)
    {
        $this->template_data = array_merge($this->template_data, $data);
    }
}
