<?php
	/**
	* 
	*/
	class Check_Model extends CI_Model
	{
		
		function check_user_data()
		{
			$username=$this->input->post('username');
			$password=$this->input->post('password');

			if($username != '' and $password != '')
			{
				/*Selecting data from database table*/
				$userdata=$this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND status=TRUE");

				if($userdata->num_rows()==1)
				{
					$userdata_values=$userdata->row();
					$data=array(
						'id'=>$userdata_values->id,
						'logged_in_type'=>$userdata_values->user_type,
						'logged_in'=>TRUE
					);
					$this->session->set_userdata($data);
					return TRUE;
				}
				else
				{
					return FALSE;
				}
			}
		}
		
	}