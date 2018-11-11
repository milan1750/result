<?php
	/**
	* 
	*/
	class Account_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			// Your own constructor code

			$this->load->database();
		}

		/*Getting client  info*/
		function get_userdata()
		{
			$user_id=$this->session->userdata('id');
			return $this->db->query("SELECT * FROM users WHERE id='$user_id' AND status=TRUE")->row();

		}

		function adduser(){

			$username=$this->input->post("username");
			$email=$this->input->post("email");
			$this->db->query("INSERT INTO users (username,email) VALUES ('$username','$email') ");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}



		}



		function is_logged_in(){
			if($this->session->userdata('logged_in')==TRUE){
				return TRUE;
			}else{
				return FALSE;
			}
		}

	}