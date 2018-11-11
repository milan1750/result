<?php
	/**
	* 
	*/
	class Curd_Controller extends CI_Controller
	{
		public function __construct()
	    {
	  	    
	        parent:: __construct();
	        $this->load->model('Account_Model','account');
	        // Your own constructor code
	    }
		function adduser(){
			echo $this->account->adduser();
		}
	}