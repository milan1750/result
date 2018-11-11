<?php 
/**
* 
*/
class Result extends CI_Controller
{
	public function __construct()
    {
  	    
        parent:: __construct();
        $this->load->model('Account_Model','account');
        $this->load->model('Install_Model','install');
        $this->load->model('System_Data','system');
        $this->load->model('Result_Model','result');

        // Your own constructor code
    }

    function index(){
        $this->load->view('result/result');
    }    
    function set_terms(){
        $this->load->view('result/set_terms');
    }

    function add_marks(){
        $this->load->view('result/add_mark');
    }

    function create_result(){
        $this->load->view('result/create_result');
    }

    function create_new_result(){
        echo $this->system->create_result();
    }

    function add_mark_data(){
        $this->load->view('result/pages/add_mark_table_body');
    }

    function add_student_mark(){
        echo $this->result->add_student_mark();
    }

    function ledger(){
        $this->load->view('result/ledger');
    }
    function class_wise(){
        $this->load->view('result/class_wise');
    }
    function section(){
        $this->load->view('result/section_wise');
    }

    function ledger_table_head(){
        $this->load->view('result/pages/ledger_table_head');

    }
    function ledger_table_body(){
        $this->load->view('result/pages/ledger_table_body');

    }
    function class_ledger_table_body(){
        $this->load->view('result/pages/class_ledger_table_body');

    }

    function set_mark(){
        $this->load->view('result/set_mark');
    }

    function set_marks_to_subject(){
         $this->load->view('result/pages/add_full_mark_table_body');
    }

    function set_full_mark_data(){
        echo $this->result->set_full_mark_data();
    }
     function class_wise_gpa(){
        $this->load->view('result/class_wise_gpa');
    }
     function section_wise_gpa(){
        $this->load->view('result/section_wise_gpa');
    }

    function ledger_table_body_gpa(){
        $this->load->model('GPA','gpa');
        $this->load->view('result/pages/ledger_table_body_gpa');

    }
     function ledger_table_head_gpa(){
        $this->load->view('result/pages/ledger_table_head_gpa');

    }

     function class_ledger_table_body_gpa(){
        $this->load->model('GPA','gpa');
        $this->load->view('result/pages/class_ledger_table_body_gpa');

    }
     function class_ledger_table_head_gpa(){
        $this->load->view('result/pages/class_ledger_table_head_gpa');

    }

    function marksheet(){
        $this->load->view('result/marksheet');
    }
     function marks_ledger_table_head_gpa(){
        $this->load->view('result/pages/marks_ledger_table_body');

    }

    function marksheet_template(){
        $this->load->view('result/mark_sheet_template');
    }

    function gpa_marksheet(){
        $this->load->view('result/gpa_marksheet');
    }

    function gpa_marksheet_template(){
        
                $this->load->model('GPA','gpa');

        $this->load->view('result/gpa_marksheet_template');
    }

    function create_pdf_marks(){
       $this->load->view('result/create_pdf_marks'); 
    }

    function create_pdf_gpa(){
         $this->load->model('GPA','gpa');
        $this->load->view('result/create_pdf_gpa');
    }


    function attendance(){
        $this->load->view('result/attendance');
    }

    function att_add_data(){
        $this->load->view('result/pages/att_add_data');
    }
    function add_att_to_table(){
        echo $this->result->add_att_to_table();
    }
    function create_pdf_marks_ledger(){
        $this->load->view('result/create_pdf_marks_ledger');
    }
    function create_pdf_gpa_ledger(){
        $this->load->model('GPA','gpa');
        $this->load->view('result/create_pdf_gpa_ledger');
    }

    function create_pdf_marks_class_ledger(){
        $this->load->view('result/create_pdf_marks_class_ledger');
    }
    function create_pdf_gpa_class_ledger(){
        $this->load->model('GPA','gpa');
        $this->load->view('result/create_pdf_gpa_class_ledger');
    }
    function result_list(){
        $this->load->view('result/pages/result_list');
    }
}