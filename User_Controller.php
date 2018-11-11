<?php 
/**
* 
*/
class User_Controller extends CI_Controller
{
	public function __construct()
    {
  	    
        parent:: __construct();
        $this->load->model('Account_Model','account');
        // Your own constructor code
    }

    function dashboard()
    {
    	$this->load->view('user/dashboard');
    }

    function setting()
    {
        $this->load->view('user/setting');
    }

}