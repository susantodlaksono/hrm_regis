<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Applicant extends MY_Controller {

	public function __construct() {
      parent::__construct();
      if($this->session->userdata('loginsession') == FALSE){
   		redirect();
   	}else{
   		$this->_loginsession = $this->session->userdata('loginsession');
   		$this->_numcode = new Model_utils_numcode("4fFiV8kRTvm5MPNDcyO1dg7lr20Qtn3X6pKLZUqaEsxCwubGYIzhSWJojHeA9B");
   	}
   }

	public function index(){
		$data['title'] = 'Dashboard';
		$data['applicant_detail'] = $this->userDetail($this->_loginsession['employee_id']);
		$data['status'] = $this->db->select('status')->where('id', $this->_loginsession['employee_id'])->get('temp_employee')->row_array();
		$data['_css'] = array(
			'lib/assets/libs/toastr/build/toastr.min.css',
			'lib/assets/libs/fancybox/jquery.fancybox.min.css',
		);
		$data['_js'] = array(
			'lib/assets/libs/toastr/build/toastr.min.js',
			'lib/assets/libs/popper.js/dist/umd/popper.min.js',
			'lib/assets/libs/fancybox/jquery.fancybox.min.js',
			'scripts/dashboard.js',
		);
		$this->render_page($data, 'dashboard');
	}

	public function profilApplicant(){
		$data['title'] = 'Update Biodata';
		$data['applicant_detail'] = $this->userDetail($this->_loginsession['employee_id']);
		$data['_css'] = array(
			'lib/assets/libs/daterangepicker/daterangepicker.css',
			'lib/assets/libs/toastr/build/toastr.min.css',
		);
		$data['_js'] = array(
			'lib/assets/libs/daterangepicker/moment.min.js',
			'lib/assets/libs/daterangepicker/daterangepicker.js',
			'lib/assets/libs/toastr/build/toastr.min.js',
			'scripts/applicant.js',
		);
		$this->render_page($data, 'applicant');
	}

	public function logoutApplicant(){
     	$this->session->sess_destroy();
     	redirect();
 	}

 	public function userDetail($employee_id){
 		$this->db->select('fullname');
 		$this->db->where('id', $employee_id);
 		return $this->db->get('temp_employee')->row_array();
 	}

 	public function printOutBiodata(){
 		$this->load->library('master_employee');
 		$mpdf = new \Mpdf\Mpdf();
 		$mpdf = new Mpdf();
 		$data['temp_image'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->where('doc_type', 2)->get('temp_employee_doc')->row_array();
 		$data['temp_employee'] = $this->db->where('id', $this->_loginsession['employee_id'])->get('temp_employee')->row_array();
 		$data['temp_employee_card'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_card')->row_array();
 		$data['temp_employee_place'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_place')->row_array();
 		$data['temp_employee_family'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_family')->result_array();
 		$data['temp_employee_education'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_education')->result_array();
 		$data['temp_employee_education_tesis'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_education_tesis')->row_array();
 		$data['temp_employee_education_nonformal'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_education_nonformal')->result_array();
 		$data['temp_employee_language_skill'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_language_skill')->result_array();
 		$data['temp_employee_computer_skill'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_computer_skill')->row_array();
 		$data['temp_employee_work_history'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->order_by('id', 'desc')->get('temp_employee_work_history')->result_array();
 		$data['temp_employee_social_activity'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_social_activity')->result_array();
 		$data['temp_employee_accident_history'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_accident_history')->result_array();
 		$data['temp_employee_other_contact'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_other_contact')->result_array();
 		$data['temp_empoyee_faq_question_answers'] = $this->faqQuestionAnswers($this->_loginsession['employee_id']);
		$data = $this->load->view('printout', $data, TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
 	}

 	public function faqQuestionAnswers($employee_id){
 		$this->db->where('status', 1);
 		$this->db->order_by('id', 'asc');
 		$result = $this->db->get('temp_faq_question');
 		if($result->num_rows() > 0){
 			foreach ($result->result_array() as $v) {
 				$faq_answers = $this->faqAnswers($employee_id, $v['id']);
 				$data[$v['id']]['question_faq'] = $v['question_faq'];
 				$data[$v['id']]['option_type'] = $v['option_type'];
				$data[$v['id']]['faq_id'] = $faq_answers['id'];
				$data[$v['id']]['faq_answers'] = $faq_answers['faq_answers'];
				$data[$v['id']]['faq_description'] = $faq_answers['faq_description'];
 			}
 			return $data;
 		}else{
 			return false;
 		}
 	}

 	public function faqAnswers($employee_id, $faq_id){
 		$this->db->where('employee_id', $employee_id);
 		$this->db->where('faq_id', $faq_id);
 		$rs = $this->db->get('temp_empoyee_faq_question_answers');
 		if($rs->num_rows() > 0){
 			$row = $rs->row_array();
 			return $row;
 		}else{
 			return false;
 		}
 	}

 	public function getBasicEmployee(){
 		$response['temp_employee'] = $this->db->where('id', $this->_loginsession['employee_id'])->get('temp_employee')->row_array();
 		$response['temp_employee_card'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_card')->row_array();
 		$response['temp_employee_place'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_place')->row_array();
 		$this->json_result($response);
 	}

 	public function getFamilyEmployee(){
 		$response['temp_employee_family'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_family')->result_array();
 		$this->json_result($response);	
	}

	public function getEducationEmployee(){
 		$response['temp_employee_education_tesis'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_education_tesis')->row_array();
 		$response['temp_employee_education'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_education')->result_array();
 		$this->json_result($response);	
	}

	public function getEducationNonEmployee(){
 		$response['temp_employee_education_nonformal'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_education_nonformal')->result_array();
 		$this->json_result($response);	
	}

	public function getLanguage(){
 		$response['temp_employee_computer_skill'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_computer_skill')->row_array();
 		$response['temp_employee_language_skill'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_language_skill')->result_array();
 		$this->json_result($response);	
	}

	public function getJobHistory(){
 		$response['temp_employee_work_history'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_work_history')->result_array();
 		$this->json_result($response);	
	}

	public function getSocialActivity(){
 		$response['temp_employee_social_activity'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_social_activity')->result_array();
 		$this->json_result($response);	
	}

	public function getAccidentHistory(){
 		$response['temp_employee_accident_history'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_accident_history')->result_array();
 		$this->json_result($response);	
	}

	public function getFaqAnswers(){
 		$response['faq_question_answers'] = $this->faqQuestionAnswers($this->_loginsession['employee_id']);
 		$response['temp_employee_other_contact'] = $this->db->where('employee_id', $this->_loginsession['employee_id'])->get('temp_employee_other_contact')->result_array();
 		$this->json_result($response);	
	}

	public function detailVacancy(){
		$this->_db = $this->load->database('hris_hiring', TRUE);
 		$response['vacancy'] = $this->_db->where('id', $this->_get['id'])->get('vacancy')->row_array(); 		
 		$this->json_result($response);	
	}

 	public function updateBasic(){
 		$this->load->library('validation_applicant');
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		if($this->validation_applicant->update($this->_post)){
			$result = $this->m_applicant->updateBasic($this->_post);
         	if($result['success']){
	            $response['success'] = $result['success'];
	            $response['msg'] = $result['msg'];
         	}else{
	            $response['msg'] = $result['msg'];
         	}
		}else{
			$response['msg'] = validation_errors();
		}
		$this->json_result($response);
 	}

 	public function registerVacancy(){
		$response['success'] = FALSE;

		if($this->_post['id'] != ''){
			$tmp = array(
				'vacancy_id' => $this->_post['id']
			);
			$update = $this->db->update('temp_employee', $tmp, array('id' => $this->_loginsession['employee_id']));
			$response['success'] = $update ? TRUE : FALSE;
			$response['msg'] = 'Pemilihan lowongan berhasil di registrasi';
		}else{
			$response['msg'] = 'No Parameter';
		}
		$this->json_result($response);
 	}

 	public function updateFamily(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateFamily($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateEducation(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateEducation($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateEducationNon(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateEducationNon($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateLanguage(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateLanguage($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateJobHistory(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateJobHistory($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateSocialActivity(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateSocialActivity($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateAccidentHistory(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateAccidentHistory($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function updateFaqAnswers(){
		$this->load->model('m_applicant');
		$response['success'] = FALSE;

		$result = $this->m_applicant->updateFaqAnswers($this->_post);
   	if($result['success']){
         $response['success'] = $result['success'];
         $response['msg'] = $result['msg'];
   	}else{
         $response['msg'] = $result['msg'];
   	}
		$this->json_result($response);
 	}

 	public function uploadDoc(){
		$response['success'] = FALSE;
		
		if(!empty($_FILES)){
			$this->load->library('upload');
			$file_name = ''.uniqid($this->_loginsession['employee_id'].date("His")).'';
			if($this->_post['type'] == 1){
				$config['upload_path']  = './files/applicant/cv/';
         	$config['allowed_types'] = 'docx|doc|xlsx|xls|pdf|jpeg|jpg|png';
			}
			if($this->_post['type'] == 2){	
				$config['upload_path']  = './files/applicant/photos/';
         	$config['allowed_types'] = 'jpeg|jpg|png';
         	$config['max_width'] = 1000;
      		$config['max_height'] = 1500;
			}
			
         $config['file_name'] = $file_name;

         $this->upload->initialize($config);
         if($this->upload->do_upload('userfile')){
         	$result = $this->upload->data();
         	$tmp['employee_id'] = $this->_loginsession['employee_id'];
         	$tmp['file_name'] = $result['file_name'];
            $tmp['file_dir'] = $config['upload_path'];
            $tmp['file_extension'] = $result['file_ext'];
            $tmp['original_file_name'] =  $_FILES['userfile']['name'];
            $tmp['doc_type'] = $this->_post['type'];

         	$this->db->trans_start(); 
      		$doc = $this->db->where('employee_id', $this->_loginsession['employee_id'])->where('doc_type', $this->_post['type'])->get('temp_employee_doc')->row_array();
      		if (file_exists($doc['file_dir'].$doc['file_name'])) {
               unlink($doc['file_dir'].$doc['file_name']);
            }
         	$this->db->delete('temp_employee_doc', array('employee_id' => $this->_loginsession['employee_id'], 'doc_type' => $this->_post['type']));
         	$this->db->insert('temp_employee_doc', $tmp);
         	$this->db->trans_complete();

         	if($this->db->trans_status() === TRUE){
		         $this->db->trans_commit();
		         $response['success'] = TRUE;
		         $response['msg'] = 'File berhasil di upload';
		      }else{
		         $this->db->trans_rollback();
		         $response['msg'] = 'File gagal di upload';
		      }
         }else{
         	$response['msg'] = $this->upload->display_errors();
         }
		}
		$this->json_result($response);
 	}

 	public function getDoc(){
 		$this->load->library('master_employee');
 		

 		$response['success'] = FALSE;
 		$result = $this->db->where('employee_id', $this->_loginsession['employee_id'])->where('doc_type', $this->_get['type'])->get('temp_employee_doc')->row_array();
 		if($result){
 			$response['id'] = $this->_numcode->encode($result['id']);
 			$response['original_file_name'] = $result['original_file_name'];
 			$response['doc_type'] = $result['doc_type'];
 			$response['file_name'] = $result['file_name'];
 			$response['file_extension'] = $this->master_employee->icon($result['file_extension']);
 			$response['success'] = TRUE;
 		}
 		$this->json_result($response);
 	}

 	public function downloadDocument($id){
 		$id = $this->_numcode->decode($id);
 		$this->load->helper('download');
     	$temp_name = $this->db->select('file_name, original_file_name, file_dir')->where('id', $id)->get(' temp_employee_doc')->row_array();
     	force_download($temp_name['original_file_name'], file_get_contents($temp_name['file_dir'].$temp_name['file_name']));
 	}

 	public function vacancyData($method){
 		$this->_db = $this->load->database('hris_hiring', TRUE);
 		$this->_db->where('status', 1);
 		switch ($method) {
 			case 'get':
 				return $this->_db->get('vacancy_division')->result_array();
 				break;
 			case 'count':
 				return $this->_db->count_all_result('vacancy_division');
 				break;
 		}
 	}

 	public function getVacancy(){
 		$response['success'] = FALSE;
      $list = array();
      $data = $this->vacancyData('get');
      if($data){
         foreach ($data as $v) {
           	$list[] = array(
               'id' => $v['id'],
               'name' => $v['name'] ? $v['name'] : '',
            );
         }
         $response['temp_employee'] = $this->db->select('vacancy_id')->where('id', $this->_loginsession['employee_id'])->get('temp_employee')->row_array();
         $response['result'] = $list;
         $response['success'] = TRUE;
      }
      $this->json_result($response);
   }
} 