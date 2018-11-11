<?php
/**
* 
*/
class Updation extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('Update_Model','update');
	    $this->load->model('Account_Model','account_model');
	    $this->load->model('System_Data','system');
	}

	function index(){
		$this->load->view('updation/update_system_data');
	}

	function update_system_data(){
		if($this->update->update_system_data())
		{
			redirect(base_url().'update?res=true');
		}
		else
		{
			redirect(base_url().'update?res=false');
		}	
	}

	function student(){
		$this->load->view('updation/student');
	}

	function student_details_by_class(){
		$this->load->view('updation/pages/student_details_by_class');
	}

	function remove_student(){
		echo $this->update->remove_student();
	}

	function edit_student(){
		$this->load->view('updation/edit_student');
	}

	function update_student_data(){
		$this->update->update_student_data();
	}

	function add_student(){
		$this->load->view('updation/add_student');
	}

	function add_student_data(){
		$this->update->add_student_data();
	}
}