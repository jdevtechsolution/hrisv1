<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefGroup extends CORE_Controller
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
        $this->load->model('RefGroup_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Group';

        $this->load->view('ref_group_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefGroup_model->get_list(
                    array('refgroup.is_deleted'=>FALSE)
                    );
                echo json_encode($response);
                break;

            case 'create':
                $m_group = $this->RefGroup_model;

                $m_group->group_desc = $this->input->post('group_desc', TRUE);
                $m_group->save();

                $group_id = $m_group->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Group information successfully created.';

                $response['row_added'] = $this->RefGroup_model->get_list($group_id);
                echo json_encode($response);

                break;

            case 'delete':
                $m_group=$this->RefGroup_model;

                $group_id=$this->input->post('group_id',TRUE);

                $m_group->is_deleted=1;
                if($m_group->modify($group_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Group information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_group = $this->RefGroup_model;
                $group_id = $this->input->post('group_id',TRUE);

                $m_group->group_desc = $this->input->post('group_desc', TRUE);
                $m_group->modify($group_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Group information successfully updated.';
                $response['row_updated']=$this->RefGroup_model->get_list($group_id);
                echo json_encode($response);

                break;

            case 'test':
            	
            	break;

        }
    }











}
