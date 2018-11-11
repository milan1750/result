<?php 
/**
* 
*/
class Main_Controller extends CI_Controller
{
	public function __construct()
    {
  	    
        parent:: __construct();
        $this->load->model('Account_Model','account');
        // Your own constructor code
    }

    function login()
    {
    	$this->load->view('user/login');

    }

    function logout()
    {
        session_destroy();
        redirect(base_url(),'refresh');
    }

}