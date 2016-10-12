<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefPhilHealth_Contribution extends CORE_Controller
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
        $this->load->model('RefPayment_model');
        $this->load->model('RefSSS_Contribution_model');
        $this->load->model('RefPhilHealth_Contribution_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('ref_philhealth_contribution_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefPhilHealth_Contribution_model->get_list(
                    array('ref_philhealth_contribution.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_philhealth_contribution = $this->RefPhilHealth_Contribution_model;
                $employer = $this->input->post('employer', TRUE);
                $employee = $this->input->post('employee', TRUE);

                $total = $this->get_numeric_value($employee) + $this->get_numeric_value($employer);

                $m_philhealth_contribution->salary_range_from = $this->input->post('salary_range_from', TRUE);
                $m_philhealth_contribution->salary_range_to = $this->input->post('salary_range_to', TRUE);
                $m_philhealth_contribution->employee = $this->input->post('employee', TRUE);
              	$m_philhealth_contribution->employer = $this->input->post('employer', TRUE);
                $m_philhealth_contribution->total = number_format($total,2);
                $m_philhealth_contribution->save();

                $ref_philhealth_contribution_id = $m_philhealth_contribution->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'PhilHealth Contribution information successfully created.';

                $response['row_added'] = $this->RefPhilHealth_Contribution_model->get_list($ref_philhealth_contribution_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_philhealth_contribution=$this->RefPhilHealth_Contribution_model;

                $ref_philhealth_contribution_id=$this->input->post('ref_philhealth_contribution_id',TRUE);

                $m_philhealth_contribution->is_deleted=1;
                if($m_philhealth_contribution->modify($ref_philhealth_contribution_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='PhilHealth Contribution information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_philhealth_contribution = $this->RefPhilHealth_Contribution_model;
               	$employer = $this->input->post('employer', TRUE);
                $employee = $this->input->post('employee', TRUE);

                $total = $this->get_numeric_value($employee) + $this->get_numeric_value($employer);             

                $ref_philhealth_contribution_id=$this->input->post('ref_philhealth_contribution_id',TRUE);

                $m_philhealth_contribution->salary_range_from = $this->input->post('salary_range_from', TRUE);
                $m_philhealth_contribution->salary_range_to = $this->input->post('salary_range_to', TRUE);
                $m_philhealth_contribution->employee = $this->input->post('employee', TRUE);
                $m_philhealth_contribution->employer = $this->input->post('employer', TRUE);
              	$m_philhealth_contribution->total = number_format($total,2);
                $m_philhealth_contribution->modify($ref_philhealth_contribution_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='PhilHealth Contribution information successfully updated.';
                $response['row_updated']=$this->RefPhilHealth_Contribution_model->get_list($ref_philhealth_contribution_id);
                echo json_encode($response);

                break;

            case 'test':
            	
            	break;

        }
    }











}
