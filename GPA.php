<?php
	/**
	* 
	*/
	class GPA extends CI_Model
	{
		
		function __construct()
		{
			parent::__construct();
			// Your own constructor code

			$this->load->database();
		}

		function get_gpa($fm,$om){
			if($fm==0)$fm=1;
			$p = $om/$fm*100;
			if($p>90){
				$gpa= 'A+';
				$value=4;
			}else if($p>80 and $p<=90){
				$gpa= 'A';
				$value=3.6;
			}else if($p>70 and $p<=80){
				$gpa= 'B+';
				$value=3.2;
			}else if($p>60 and $p<=70){
				$gpa= 'B';
				$value=2.8;
			}else if($p>50 and $p<=60){
				$gpa= 'C+';
				$value=2.4;
			}else if($p>40 and $p<=50){
				$gpa= "C";
				$value=2;
			}else if($p>30 and $p<=40){
				$gpa= "D+";
				$value=1.6;
			}else if($p>20 and $p<=30){
				$gpa= "D";
				$value= 1.2;
			}else{
				$gpa= "E";
				$value=0.8;
			}

			return array($gpa,$value);

		}
	}