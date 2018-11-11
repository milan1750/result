<?php
	/**
	* 
	*/
	class Login_Controller extends CI_Controller
	{

		/*Constructor Here*/
		public function __construct()
    	{
	        parent:: __construct();
	        $this->check_already_log_in();
	        $this->load->model('Account_Model','account');
	        // Your own constructor code
	    }

	    /*Check Already Login*/
	    function check_already_log_in()
	    {
	    	if($this->account->is_logged_in())redirect('dashboard');
	    	return FALSE;
	    }

	   

	}