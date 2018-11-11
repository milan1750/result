<?php
	/**
	* 
	*/
	class Installation extends CI_Controller
	{

		/*Constructor Here*/
		public function __construct()
    	{
	        parent:: __construct();
	        $this->load->model('Account_Model','account');
	        $this->load->model('Install_Model','install_model');
	        // Your own constructor code
	    }

	    /*Check Already Login*/
	    function index()
	    {
	    	$this->load->view('installation/install');
	    }

	    function add_system_data()
	    {

	    	$file_name=$this->do_upload();
	    		    	
    		if($this->install_model->add_system_data($file_name))
    		{
    			redirect(base_url().'install?res=true');
    		}
    		else
    		{
    			redirect(base_url().'install?res=false');
    		}
    		
	    }
 

 		public function do_upload()
        {
                $config['upload_path']          = 'assets/system/images';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        print_r($error);
                }
                else
                {
                        $data = $this->upload->data();

                        return $data['file_name'];
                }
        }
	   	function classes()
	   	{
	   		$this->load->view('installation/classes');
	   	}

	   	function add_class(){
	   		echo $this->install_model->add_class();
	   	}

	   	function add_section(){
	   		echo $this->install_model->add_section();
	   	}

	   	function class_table_data(){
	   		$this->load->view('installation/pages/class_table_body');
	   	}

	   	function section_table_data(){
	   		$this->load->view('installation/pages/section_table_body');
	   	}

	   	function subject_table_data(){
	   		$this->load->view('installation/pages/subject_table_body');
	   	}

	   function remove_class(){
	   		echo $this->install_model->remove_class();
	   }


	   function remove_section(){
	   		echo $this->install_model->remove_section();
	   }
	    function remove_subject(){
	   		echo $this->install_model->remove_subject();
	   }

	   function subject(){
	   	$this->load->view('installation/subjects');
	   }

	   function section()
		{
			$this->load->view('installation/section');
		}

		function update_section(){
			echo $this->install_model->update_section();
		}

		function update_subject(){
			echo $this->install_model->update_subject();
		}

		function update_class(){
			echo $this->install_model->update_class();
		}

		function update_term(){
			echo $this->install_model->update_term();
		}


		function add_subject(){
			echo $this->install_model->add_subject();
		}

		function assign_subject_to_class(){
			$this->load->view('Installation/assign_subject_to_class');
		}

		function add_subject_to_class(){
			echo $this->install_model->add_subject_to_class();
		}

		function class_subject_table_body(){
			$this->load->view('installation/pages/class_subject_table_body');
		}

		function load_subject(){
			$this->load->view('installation/pages/load_subject');
		}

		function manage_class(){
			$this->load->view('Installation/manage_class');
		}

		function add_student_record(){
			echo $this->install_model->add_student_record();
		}

		function class_detail(){
			$this->load->view('installation/pages/class_detail.php');
		}

		function student(){
			$this->load->view('installation/student.php');
		}

		function student_detail(){
			$this->load->view('installation/pages/student_detail.php');
		}

		function create_term(){
			$this->load->view('installation/create_term');
		}

		function add_term(){
			echo $this->install_model->add_term();
		}
		function term_details_body(){
			$this->load->view('installation/pages/term_details_body');
		}

		function remove_term(){
			echo $this->install_model->remove_term();
		}

		function add_teacher_record(){
			echo $this->install_model->add_teacher_record();
		}

		function remove_teacher(){
			echo $this->install_model->remove_teacher();
		}
	}