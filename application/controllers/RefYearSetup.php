<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefYearSetup extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Ref_Emptype_model');
        $this->load->model('RefDepartment_model');
        $this->load->model('RefPosition_model');
        $this->load->model('RefBranch_model');
        $this->load->model('RefSection_model');
        $this->load->model('RefReligion_model');
        $this->load->model('RefCourse_model');
        $this->load->model('RefRelationship_model');
        $this->load->model('RefLeave_model');
        $this->load->model('RefCertificate_model');
        $this->load->model('RefAction_model');
        $this->load->model('RefDiscipline_model');
        $this->load->model('RefCompensation_model');
        $this->load->model('RefYearSetup_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigationforyearsetup', '', TRUE);
        $data['title'] = 'Leave Year';

        $this->load->view('ref_leave_year_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
	            $response['data']=$this->RefYearSetup_model->get_list(array('emp_leave_year.is_deleted'=>FALSE,));
                echo json_encode($response);
                break;

            case 'create':
            	function replaceCharsInNumber($num, $chars) {
                     return substr((string) $num, 0, -strlen($chars)) . $chars;
                }

                $m_yearsetup = $this->RefYearSetup_model;
                $m_yearsetup->updateAllRecords();

                $date_starttemp = $this->input->post('date_start', TRUE);
                $date_endtemp = $this->input->post('date_end', TRUE);

                $date_start = date("Y-m-d", strtotime($date_starttemp));
                $date_end = date("Y-m-d", strtotime($date_endtemp));

                $m_yearsetup->year_type = $this->input->post('year_type', TRUE);
                $m_yearsetup->date_start = $date_start;
                $m_yearsetup->date_end = $date_end;
                $m_yearsetup->note = $this->input->post('note', TRUE);
                $m_yearsetup->active_year = $this->input->post('active_year', TRUE);
                $m_yearsetup->save();

                $emp_leave_year_id = $m_yearsetup->last_insert_id();

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Year Setup information successfully created.';

                $response['row_added'] = $this->RefYearSetup_model->get_list($emp_leave_year_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_yearsetup=$this->RefYearSetup_model;

                $emp_leave_year_id=$this->input->post('emp_leave_year_id',TRUE);

                $m_yearsetup->is_deleted=1;
                if($m_yearsetup->modify($emp_leave_year_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Year Setup information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_yearsetup=$this->RefYearSetup_model;
                $m_yearsetup->updateAllRecords();

                $emp_leave_year_id=$this->input->post('emp_leave_year_id',TRUE);

                $date_starttemp = $this->input->post('date_start', TRUE);
                $date_endtemp = $this->input->post('date_end', TRUE);

                $date_start = date("Y-m-d", strtotime($date_starttemp));
                $date_end = date("Y-m-d", strtotime($date_endtemp));
               
                $m_yearsetup->year_type = $this->input->post('year_type', TRUE);
                $m_yearsetup->date_start = $date_start;
                $m_yearsetup->date_end = $date_end;
                $m_yearsetup->note = $this->input->post('note', TRUE);
                $m_yearsetup->active_year = $this->input->post('active_year', TRUE);
                $m_yearsetup->modify($emp_leave_year_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Year Setup information successfully updated.';
                $response['row_updated']=$this->RefYearSetup_model->get_list($emp_leave_year_id);
                echo json_encode($response);

                break;

            case 'activeyear':
                $m_yearsetup=$this->RefYearSetup_model;
                $m_yearsetup->updateAllRecords();
                $emp_leave_year_id=$this->input->post('emp_leave_year_id',TRUE);
                $m_yearsetup->active_year = $this->input->post('active_year', TRUE);
                $m_yearsetup->modify($emp_leave_year_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Year Setup information successfully updated.';
                //$response['row_updated']=$this->RefYearSetup_model->get_list($emp_leave_year_id);
                echo json_encode($response);

                break;

            case 'test':
				function replaceCharsInNumber($num, $chars) {
				   return substr((string) $num, 0, -strlen($chars)) . $chars;
				}
				
				$format = "000000";
				$temp = replaceCharsInNumber($format, '180'); //5069xxx
				$ecode = $temp .'-'. $today = date("Y");
				echo $ecode;


                break;

        }
    }











}
