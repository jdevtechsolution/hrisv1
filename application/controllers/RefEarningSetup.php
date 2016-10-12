<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RefEarningSetup extends CORE_Controller
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
        $this->load->model('RefEarningSetup_model');
        $this->load->model('RefEarningType_model');



    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Earning Setup';
        $data['refotherearningstype']=$this->RefEarningType_model->get_list(array('refotherearningstype.is_deleted'=>FALSE));

        $this->load->view('ref_earningsetup_view', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->RefEarningSetup_model->get_list(
                   	array('refotherearnings.is_deleted'=>FALSE),
                   	'refotherearnings.*,refotherearningstype.earnings_type_id,refotherearningstype.earnings_type_desc',
                   	array(
                   			array('refotherearningstype','refotherearningstype.earnings_type_id=refotherearnings.earnings_type_id','left')
                   		)
                   	);

          		echo json_encode($response);
                break;

            case 'create':
                $m_earnings = $this->RefEarningSetup_model;

                $m_earnings->earnings_type_id = $this->input->post('earnings_type_id', TRUE);
                $m_earnings->earnings_desc = $this->input->post('earnings_desc', TRUE);
                $m_earnings->save();

                $earnings_id = $m_earnings->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Earning Setup information successfully created.';

                $response['row_added'] = $this->RefEarningSetup_model->get_list($earnings_id,
                   	'refotherearnings.*,refotherearningstype.earnings_type_id,refotherearningstype.earnings_type_desc',
                   	array(
                   			array('refotherearningstype','refotherearningstype.earnings_type_id=refotherearnings.earnings_type_id','left')
                   		));

                echo json_encode($response);

                break;

            case 'delete':
                $m_earnings=$this->RefEarningSetup_model;

                $earnings_id=$this->input->post('earnings_id',TRUE);

                $m_earnings->is_deleted=1;
                if($m_earnings->modify($earnings_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Earning Setup information successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $m_earnings = $this->RefEarningSetup_model;
                $earnings_id = $this->input->post('earnings_id',TRUE);

                $m_earnings->earnings_type_id = $this->input->post('earnings_type_id', TRUE);
                $m_earnings->earnings_desc = $this->input->post('earnings_desc', TRUE);
                $m_earnings->modify($earnings_id);

                $response['title']='Success';
                $response['stat']='success';
                $response['msg']='Earning Setup information successfully updated.';
                $response['row_updated']=$this->RefEarningSetup_model->get_list($earnings_id,
                   	'refotherearnings.*,refotherearningstype.earnings_type_id,refotherearningstype.earnings_type_desc',
                   	array(
                   			array('refotherearningstype','refotherearningstype.earnings_type_id=refotherearnings.earnings_type_id','left')
                   		));
                echo json_encode($response);

                break;

            case 'test':
            	
            	break;

        }
    }











}
