<?php
/**
 * 
 */
class Result_Model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function add_student_mark(){
		$id = $this->input->post("id");
		$mark = $this->input->post("mark");
		$subject = $this->input->post("subject");
		$generated_table = $this->input->post("generated_table");
		$data_mark = $this->input->post("data_mark");
		if($data_mark=="th"){
			$this->db->query("update $generated_table set $subject = '$mark' where id= $id ");
			if($this->db->affected_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			$field="practical_".$subject;
			$this->db->query("update $generated_table set $field = '$mark' where id= $id ");
			if($this->db->affected_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}

		
	} 

	function set_full_mark_data(){
		$year = $this->input->post("year");
		$term = $this->input->post("term");
		$class_name = $this->input->post("class_name");
		$tfm = array();
		$tfm =$_REQUEST["tfm"];
		$tpm =$_REQUEST["tpm"];
		$pfm =$_REQUEST["pfm"];
		$ppm =$_REQUEST["ppm"];
		$subjects =$_REQUEST["subjects"];


		$i=0;
		foreach ($tfm as $value) {
			$tfm_data= $value;
			$tpm_data= $tpm[$i];
			$pfm_data=$pfm[$i];
			$ppm_data=$ppm[$i];
			$subject=$subjects[$i];
			$sql="update assign_class_subject set tfm='$tfm_data',tpm='$tpm_data',pfm='$pfm_data',ppm='$ppm_data' where class_name='$class_name' and year='$year' and term='$term' and subject_name='$subject' ";
			$this->db->query($sql);
			$i++; 
		}
		return TRUE;
	}

	function get_division($gt,$fm){
		$p=$gt/$fm*100;
		if($p>=80){
			echo "Distinction";
		}else if($p>=60 and $p<80){
			echo "First";
		}else if($p>=45 and $p<60){
			echo "Second";
		}else{
			echo "Third";
		}
	}

	function add_att_to_table(){
		$generated_table = $this->input->post("generated_table");
		$att = $this->input->post("att");
		$total_at = $this->input->post("total_at");
		$id = $this->input->post("id");

		$this->db->query("update $generated_table set att = '$att', school_oppened_days='$total_at' where id= $id ");
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function check_mark($p1,$p2){
		if($p2>=$p1){
			return FALSE;
		}else{
			return '<span style="color:red;font-weight:bold;font-size:20px;"><sup>*</sup></span>';
		}
	}
}