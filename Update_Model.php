<?php
/**
* 
*/
class Update_Model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->load->model('Account_Model','account');
	}

	function update_system_data(){
		if($this->input->post('update_system_data'))
		{
			$system_name=$this->input->post('system_name');
			$system_tel=$this->input->post('system_tel');
			$system_email=$this->input->post('system_email');
			$system_year=$this->input->post('system_year');
			$system_status=TRUE;
			$this->db->query("update system set system_name='$system_name',system_email='$system_email',system_tel='$system_tel',system_current_year='$system_year',system_status='$system_status' where id=1");
			if($this->db->affected_rows()){
				return TRUE;
			}else{
				return FALSE;			
			}
		}
	}

	function remove_student()
		{
			$data_id = $this->input->post('data_id');
			$this->db->query("delete from student_record where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

	function update_student_data()
	{
		if($this->input->post('submit')){
			$id=$this->input->post('id');
			$roll=$this->input->post('roll');
			$name=$this->input->post('name');
			$class=$this->input->post('class');
			$section=$this->input->post('section');
			$symbol_no=$this->input->post('symbol_no');
			$dob=$this->input->post('dob');
			
			$this->db->query("update student_record set roll='$roll',name='$name',class='$class',section='$section',symbol_no='$symbol_no',dob='$dob' where id='$id' ");
			if($this->db->affected_rows()>0){
				redirect(base_url('updation/edit_student/'.$id.'?res=success'));
			}else{
				redirect(base_url('updation/edit_student/'.$id.'?res=failed'));
			}
		}
	}

	function add_student_data(){
		$roll=$this->input->post('roll');
		$name=$this->input->post('name');
		$class=$this->input->post('class');
		$section=$this->input->post('section');
		$symbol_no=$this->input->post('symbol_no');
		$dob=$this->input->post('dob');

		$this->db->query("insert into student_record (roll,name,class,section,symbol_no,dob) values ('$roll','$name','$class','$section','$symbol_no','$dob')");
		if($this->db->affected_rows()>0){
			redirect(base_url('updation/add_student/'.$id.'?res=success'));
		}else{
			redirect(base_url('updation/add_student/'.$id.'?res=failed'));
		}
	}

}