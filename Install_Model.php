<?php
	/**
	* 
	*/
	class Install_Model extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			// Your own constructor code

			$this->load->database();
		}

		function add_system_data($file_name){
			if($this->input->post('submit'))
	    	{
	    		$system_name=$this->input->post('system_name');
	    		$system_tel=$this->input->post('system_tel');
	    		$system_email=$this->input->post('system_email');
	    		$system_year=$this->input->post('system_year');
	    		$system_address=$this->input->post('system_address');
	    		$system_status=TRUE;
	    		if($this->db->query("select * from system")->num_rows()>0){return FALSE;exit;}
	    		$this->db->query("insert into system (system_name,system_email,system_tel,system_current_year,system_status,logo,address) values ('$system_name','$system_email','$system_tel','$system_year','$system_status','$file_name','$system_address')");
	    		if($this->db->affected_rows()>0)
	    		{
	    			return TRUE;
	    		}
	    		else
	    		{
	    			return FALSE;
	    		}
	    	}
		}


		
		function add_class(){
			$class_name = $this->input->post('class_name');
			$section_name = $this->input->post('section_name');
			$this->db->query("insert into classes (name,section) values ('$class_name','$section_name') ");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function add_section(){
			$section_name = $this->input->post('section_name');
			$this->db->query("insert into section (name) values ('$section_name') ");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function add_subject(){
			$subject_name = $this->input->post('subject_name');
			$this->db->query("insert into subject (name) values ('$subject_name') ");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function remove_class()
		{
			$data_id = $this->input->post('data_id');
			$this->db->query("delete from classes where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}


		}


		function remove_subject()
		{
			$data_id = $this->input->post('data_id');
			$this->db->query("delete from subject where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function remove_section()
		{
			$data_id = $this->input->post('data_id');
			$this->db->query("delete from section where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function get_section(){
			return $this->db->query("select * from section")->result();
		}

		function get_class(){
			return $this->db->query("select distinct name from classes")->result();
		}

		function get_subject(){
			return $this->db->query("select * from subject")->result();
		}

		function update_section()
		{
			$data_id = $this->input->post('data_id');
			$section_data = $this->input->post('section_name');
			$this->db->query("update section set name='$section_data' where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function update_class()
		{
			$data_id = $this->input->post('data_id');
			$class_data = $this->input->post('class_name');
			$this->db->query("update classes set name='$class_data' where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function update_term(){
			$data_id = $this->input->post('data_id');
			$term = $this->input->post('term');
			$this->db->query("update term set name='$term' where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}



		function update_subject()
		{
			$data_id = $this->input->post('data_id');
			$subject_data = $this->input->post('subject_name');
			$this->db->query("update subject set name='$subject_data' where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function add_subject_to_class(){
			$year = $this->input->post("year");
			$class_name = $this->input->post("class_name");
			$subjects = array();
			$subjects =$_REQUEST["subjects"];
			$this->db->query("delete from assign_class_subject where class_name='$class_name' and year='$year' ");
			$sql="insert into assign_class_subject (class_name,year,term,subject_name) values";

			$term=$this->db->query("select * from term where status = true")->result();
			$i=0;
			$j=0;
			foreach ($subjects as $value) {
				foreach($term as $item ){
					$sql=$sql."('".$class_name."','".$year."','".$item->name."','".$value."')";
					if($j<(count($term)-1)) $sql=$sql.",";
					$j++;
				}
				if($i<(count($subjects)-1)) $sql=$sql.",";
				$j=0;
				$i++;
			}
			$this->db->query($sql);
			if($this->db->affected_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}


		function add_student_record(){
			$file=$_FILES['file']['tmp_name'];
			$file = fopen($file,'r');
			$value='';
			$row_number=1;
			while($row = fgetcsv($file)){
				if($row_number==1){
					//do nothing
				}else if($row_number==2){
					$value.= "('".implode("','",$row)."')";
				}else{
					$value.= ",('".implode("','",$row)."')";
				}

				$row_number++;
				
			}
			$this->db->query("insert into student_record (name,class,section,roll,symbol_no,dob) values ".$value); 
			if($this->db->affected_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}

		function add_teacher_record(){
			$class = $this->input->post("class_select");
			$section = $this->input->post("section_select");
			$teacher = $this->input->post("class_teacher");
			$this->db->query("insert into teacher_record (name,class,section) values ('$teacher','$class','$section')"); 
			if($this->db->affected_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}

		function add_term(){
			$term=$this->input->post('term_name');
			$term_weight=$this->input->post('term_weight');
			$this->db->query("insert into term (name,term_weight) values ('$term','$term_weight') ");
			if($this->db->affected_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}

		}

		function remove_term(){
			$data_id = $this->input->post('data_id');
			$this->db->query("delete from term where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function remove_teacher(){
			$data_id = $this->input->post('data_id');
			$this->db->query("delete from teacher_record where id='$data_id'");
			if($this->db->affected_rows()>0)
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

	}