<?php
	/**
	* 
	*/
	class Check_Pannel extends CI_Controller
	{
		
		/*Constructor Here*/
		public function __construct()
    	{
	        parent:: __construct();
	        $this->load->model('Check_Model','check');
	        $this->load->model('Account_Model','account');
	        // Your own constructor code
	    }


	    /*Checking the user signed data*/
	     /*Login To System*/
	    function user_log_in()
	    {
	    	/* AJAX check  */
			if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
			{
				/* special ajax here */
				echo $this->check->check_user_data();
			}
			else
			{
				echo "only ajax request required";
			}
	    }


	}