<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function __construct() {
      parent::__construct();
      if($this->session->userdata('loginsession')){
   		redirect('applicant');
		}
   }

	public function index(){
		$data['title'] = 'Biodata Pelamar';
		$data['faq'] = $this->db->where('status', 1)->get('temp_faq_question')->result_array();
		$data['_css'] = array(
			'lib/assets/libs/daterangepicker/daterangepicker.css',
			'lib/assets/libs/toastr/build/toastr.min.css',
		);
		$data['_js'] = array(
			'lib/assets/libs/daterangepicker/moment.min.js',
			'lib/assets/libs/daterangepicker/daterangepicker.js',
			'lib/assets/libs/toastr/build/toastr.min.js',
			'scripts/registration.js',
		);
		$this->render_page($data, 'main');
	}

	public function registrationApplicant(){
		$this->load->library('validation_registration');
		$this->load->model('m_registration');
		$response['success'] = FALSE;

		if($this->validation_registration->registration($this->_post)){
			$result = $this->m_registration->registration($this->_post);
         	if($result['success']){
	            $response['success'] = $result['success'];
	            $response['msg'] = $result['msg'];
	            $response['employee_id'] = $result['employee_id'];
         	}else{
	            $response['msg'] = $result['msg'];
         	}
		}else{
			$response['msg'] = validation_errors();
		}
		$this->json_result($response);
	}

	public function test_pdf(){
		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('test_pdf', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
		 // $this->load->view('test_pdf');
	}

	public function verifyLogin(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('login_username', 'Email', 'required|trim');
     	$this->form_validation->set_rules('login_password', 'No. Whatsapp', 'required|md5');
     	if ($this->form_validation->run() == FALSE) {
         redirect(); 
     	}else{
     		$verify = $this->getVerifyLogin($this->input->post('login_username'), $this->input->post('login_password'));
     		if($verify->num_rows() > 0){
     			$userdata = $verify->row_array();
     			$loginsession = array(
					'status' => TRUE,
					'employee_id' => $userdata['employee_id'],
				);
				$this->session->set_userdata('loginsession', $loginsession);
				redirect('applicant');
  			}else{
  				redirect();
  			}
  		}
	}

	public function getVerifyLogin($login_username, $login_password) {
  		$this->db->select('*');
  		$this->db->from('temp_users');
  		$this->db->where('email', $login_username);
  		$this->db->where('password', $login_password);
  		return $this->db->get();
 	}

} 