<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entitlement extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Entitlement_model');
        $this->load->model('Employee_model');
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'RatesDuties';

        $this->load->view('', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->Entitlement_model->get_list(
                    array('emp_leaves_entitlement.is_deleted'=>FALSE),
                    'emp_leaves_entitlement.*,ref_leave_type.leave_type,ref_leave_type.leave_type_short_name,
                    ref_ispayable.ref_ispayable_status,ref_isforwardable.ref_isforwardable_status',
                        array(
                            array('ref_leave_type','ref_leave_type.ref_leave_type_id=emp_leaves_entitlement.ref_leave_type_id','left'),
                            array('emp_leave_year','emp_leave_year.emp_leave_year_id=emp_leaves_entitlement.emp_leave_year_id','left'),
                            array('ref_ispayable','ref_ispayable.ref_ispayable_id=emp_leaves_entitlement.is_payable','left'),
                            array('ref_isforwardable','ref_isforwardable.ref_isforwardable_id=emp_leaves_entitlement.is_forwardable','left'),
                            )
                    );
                echo json_encode($response);
                break;

            case 'getresult':
                $employee_id = $this->input->post('employee_id', TRUE);

                $response['data']=$this->Entitlement_model->get_list(
                    array('emp_leaves_entitlement.employee_id'=>$employee_id,'emp_leaves_entitlement.is_deleted'=>FALSE),
                    'emp_leaves_entitlement.*,ref_leave_type.leave_type,ref_leave_type.leave_type_short_name,
                    ref_ispayable.ref_ispayable_status,ref_isforwardable.ref_isforwardable_status',
                        array(
                            array('ref_leave_type','ref_leave_type.ref_leave_type_id=emp_leaves_entitlement.ref_leave_type_id','left'),
                            array('emp_leave_year','emp_leave_year.emp_leave_year_id=emp_leaves_entitlement.emp_leave_year_id','left'),
                            array('ref_ispayable','ref_ispayable.ref_ispayable_id=emp_leaves_entitlement.is_payable','left'),
                            array('ref_isforwardable','ref_isforwardable.ref_isforwardable_id=emp_leaves_entitlement.is_forwardable','left'),
                            )
                    );

                echo json_encode($response);
                break;

            case 'create':
                $user_id=$this->session->user_id;

                $m_leaves_entitlement = $this->Entitlement_model;

                $m_leaves_entitlement->emp_leave_year_id = 1; // current active year
                $m_leaves_entitlement->employee_id = $this->input->post('employee_id', TRUE);

                $m_leaves_entitlement->ref_leave_type_id = $this->input->post('ref_leave_type_id', TRUE);
                $m_leaves_entitlement->total_grant = $this->input->post('total_grant', TRUE);
                $m_leaves_entitlement->received_balance = $this->input->post('received_balance', TRUE);
                $m_leaves_entitlement->current_balance = $this->input->post('current_balance', TRUE);
                $m_leaves_entitlement->remark = $this->input->post('remark', TRUE);
                $m_leaves_entitlement->is_payable = $this->input->post('is_payable', TRUE);
                $m_leaves_entitlement->is_forwardable = $this->input->post('is_forwardable', TRUE);
                $m_leaves_entitlement->is_forwarded = 0;
                $m_leaves_entitlement->created_by_user_id = $user_id;

                $m_leaves_entitlement->save();

                $m_leaves_entitlement_id = $m_leaves_entitlement->last_insert_id();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Entitlement successfully created.';

                $response['row_added'] = $this->Entitlement_model->get_list(
                   $m_leaves_entitlement_id,
                    'emp_leaves_entitlement.*,ref_leave_type.leave_type,ref_leave_type.leave_type_short_name,
                    ref_ispayable.ref_ispayable_status,ref_isforwardable.ref_isforwardable_status',
                        array(
                            array('ref_leave_type','ref_leave_type.ref_leave_type_id=emp_leaves_entitlement.ref_leave_type_id','left'),
                            array('emp_leave_year','emp_leave_year.emp_leave_year_id=emp_leaves_entitlement.emp_leave_year_id','left'),
                            array('ref_ispayable','ref_ispayable.ref_ispayable_id=emp_leaves_entitlement.is_payable','left'),
                            array('ref_isforwardable','ref_isforwardable.ref_isforwardable_id=emp_leaves_entitlement.is_forwardable','left'),
                            )
                    );
                echo json_encode($response);

                break;

            case 'delete':
                $m_ratesandduties=$this->RatesDuties_model;
                $m_employee=$this->Employee_model;

                $emp_rates_duties_id=$this->input->post('emp_rates_duties_id',TRUE);

                $m_ratesandduties->is_deleted=1;
                if($m_ratesandduties->modify($emp_rates_duties_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Rates and Duties successfully deleted.';

                    echo json_encode($response);
                }

                break;

            case 'update':
                $user_id=$this->session->user_id;

                $m_leaves_entitlement = $this->Entitlement_model;

                //$employee_id = $this->input->post('employee_id', TRUE);
                $emp_leaves_entitlement_id = $this->input->post('emp_leaves_entitlement_id', TRUE);

                $m_leaves_entitlement->emp_leave_year_id = 1; // current active year
                $m_leaves_entitlement->employee_id = $this->input->post('employee_id', TRUE);

                $m_leaves_entitlement->ref_leave_type_id = $this->input->post('ref_leave_type_id', TRUE);
                $m_leaves_entitlement->total_grant = $this->input->post('total_grant', TRUE);
                $m_leaves_entitlement->received_balance = $this->input->post('received_balance', TRUE);
                $m_leaves_entitlement->current_balance = $this->input->post('current_balance', TRUE);
                $m_leaves_entitlement->remark = $this->input->post('remark', TRUE);
                $m_leaves_entitlement->is_payable = $this->input->post('is_payable', TRUE);
                $m_leaves_entitlement->is_forwardable = $this->input->post('is_forwardable', TRUE);
                $m_leaves_entitlement->is_forwarded = 0;
                $m_leaves_entitlement->modified_by_user_id = $user_id;
                $m_leaves_entitlement->modify($emp_leaves_entitlement_id);

                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Entitlement successfully Updated.';
                
                $response['row_updated']=$this->Entitlement_model->get_list(
                    array('emp_leaves_entitlement.emp_leaves_entitlement_id'=>$emp_leaves_entitlement_id,'emp_leaves_entitlement.is_deleted'=>FALSE),
                    'emp_leaves_entitlement.*,ref_leave_type.leave_type,ref_leave_type.leave_type_short_name,ref_leave_type.is_payable,ref_leave_type.is_forwardable,
                    ref_ispayable.ref_ispayable_status,ref_isforwardable.ref_isforwardable_status',
                        array(
                            array('ref_leave_type','ref_leave_type.ref_leave_type_id=emp_leaves_entitlement.ref_leave_type_id','left'),
                            array('emp_leave_year','emp_leave_year.emp_leave_year_id=emp_leaves_entitlement.emp_leave_year_id','left'),
                            array('ref_ispayable','ref_ispayable.ref_ispayable_id=emp_leaves_entitlement.is_payable','left'),
                            array('ref_isforwardable','ref_isforwardable.ref_isforwardable_id=emp_leaves_entitlement.is_forwardable','left'),
                            )                 
                        );
                echo json_encode($response);

                break;

            case 'test':
function replaceCharsInNumber($num, $chars) {
   return substr((string) $num, 0, -strlen($chars)) . $chars;
}

$format = "000000";
$temp = replaceCharsInNumber($format, '200'); //5069xxx
$ecode = $temp .'-'. $today = date("Y");
echo $ecode;


                break;
        }
    }











}
