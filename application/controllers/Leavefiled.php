<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LeaveFiled extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Employee_model');
        $this->load->model('RatesDuties_model');
        $this->load->model('Entitlement_model');
        $this->load->model('Employee_model');
        $this->load->model('RefYearSetup_model');
        $this->load->model('Leavefiled_model');
        
        
    }

    public function index() {
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigationforemployee', '', TRUE);
        $data['title'] = 'Leave Filed';

        $this->load->view('', $data);
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $response['data']=$this->Leavefiled_model->get_list(
                    array('emp_leaves_filed.is_deleted'=>FALSE),
                    'emp_leaves_filed.*,emp_leaves_filed,ref_leave_type.ref_leave_type_id',
                        array(
                            array('emp_leaves_entitlement','emp_leaves_entitlement.emp_leaves_entitlement_id=emp_leaves_filed.emp_leaves_entitlement_id','left'),
                            array('ref_leave_type','ref_leave_type.ref_leave_type_id=emp_leaves_entitlement.ref_leave_type_id','left'),
                            )
                    );
                echo json_encode($response);
                break;

            case 'getfiledleave':
                $employee_id = $this->input->post('employee_id', TRUE);
                $m_yearsetup = $this->RefYearSetup_model;
                $active_year = $m_yearsetup->getactiveyear();
                $response['data']=$this->Leavefiled_model->get_list(
                   array('emp_leaves_filed.employee_id'=>$employee_id,'emp_leaves_entitlement.emp_leave_year_id'=>$active_year,'emp_leaves_entitlement.is_deleted'=>FALSE),
                    'emp_leaves_filed.*,ref_leave_type.leave_type',
                        array(
                            array('emp_leaves_entitlement','emp_leaves_entitlement.emp_leaves_entitlement_id=emp_leaves_filed.emp_leaves_entitlement_id','left'),
                            array('ref_leave_type','ref_leave_type.ref_leave_type_id=emp_leaves_entitlement.ref_leave_type_id','left'),
                            )
                    );

                echo json_encode($response);
                break;

            case 'create':

                break;

            case 'delete':
                

                break;

            case 'update':
                

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
                case 'test2':
                $m_yearsetup = $this->RefYearSetup_model;
                $active_year = $m_yearsetup->getactiveyear();
                echo $active_year;
                break;
        }
    }











}
