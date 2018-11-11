<?php 
/**
* 
*/
class System_Data extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->database();
	}

	function get_data(){
		return $this->db->query("select * from system")->row();
	}

	function get_section(){
		return $this->db->query("select * from section")->result();
	}

	function get_subject_from_class($class){
		return $this->db->query("select * from assign_class_subject where class_name= '$class' group by subject_name ")->result();
	}

	function get_class(){
		return $this->db->query("select distinct name from classes")->result();
	}

	function get_subject(){
		return $this->db->query("select * from subject")->result();
	}

	function get_term(){
		return $this->db->query("select * from term")->result();
	}

	
	function get_student_data($id){
		return $this->db->query("select * from student_record where id='$id' ")->row();
	}

	function create_result(){
		$year=$this->input->post('year');
		$term = $this->input->post('term');
		
		foreach($this->get_class() as $item1){
			$class=$item1->name;
			$new_table = $year.$term.$class;
			if($this->db->query("show tables like '$new_table'")->num_rows()>0)
			{
				echo "table_exists";exit;
			}
			else
			{
				$sql="create table $new_table (id int auto_increment primary key,student_name varchar(200),class_name varchar(200),section varchar(200),roll int,symbol_no varchar(200),inserted_date varchar(200),updated_date varchar(200), dob varchar(50), gtotal int,gpa_total float, att int, school_oppened_days int";
				foreach ($this->get_subject_from_class($class) as $item2) {
					if($item2->pfm>0){
						$sql.=',practical_'.$item2->subject_name.' varchar (200) default 0';
					}
					$sql.=','.$item2->subject_name.' varchar (200) default 0 ';

					
				}
				$sql.=')';

				$this->db->query($sql);
				$student_data = $this->db->query("select * from student_record where class='$class'")->result();
				foreach ($student_data as $value) {
					$student_name = $value->name;
					$student_class = $value->class;
					$student_section = $value->section;
					$student_roll = $value->roll;
					$student_dob = $value->dob;
					$student_symbol_no = $value->symbol_no;
					$student_sql = "insert into $new_table (student_name,class_name,section,roll,symbol_no,dob) values ('$student_name','$student_class','$student_section','$student_roll','$student_symbol_no','$student_dob') ";
					$this->db->query($student_sql);
				}
			}
			$this->db->query("insert into created_term (year,term) values ('$year','$term') ");
		}

		return TRUE;
		
	}

}