<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_registration extends CI_Model{

	public function __construct() {
  		parent::__construct();
  		$this->load->library('date_extraction');
	}

	public function registration($params){
		$this->db->trans_start();
		$employee = $this->tempEmployee($params);
		if($employee){
			$this->tempEmployeeCard($employee, $params);
			$this->tempEmployeePlace($employee, $params);
			$this->tempEmployeeEducationTesis($employee, $params);
			$this->tempEmployeeFamily($employee, $params);
			$this->tempEmployeeEducation($employee, $params);
			$this->tempEmployeeEducationNonFormal($employee, $params);
			$this->tempEmployeeLanguageSkill($employee, $params);
			$this->tempEmployeeComputerSkill($employee, $params);
			$this->tempEmployeeWorkHistory($employee, $params);
			$this->tempEmployeeSocialActivity($employee, $params);
			$this->tempEmployeeAccidentHistory($employee, $params);
			$this->tempEmployeeFaqAnswers($employee, $params);
			$this->tempEmployeeOtherContact($employee, $params);
			$this->tempUser($employee, $params);
		}
		$this->db->trans_complete();

		if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'employee_id' => $employee,
            'msg' => 'Data registration berhasil ditambahkan',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data registration gagal ditambahkan',
         );
      }
	}


	public function tempEmployee($params){
		$obj['fullname'] = $params['temp_employee_fullname'] ? $params['temp_employee_fullname'] : NULL;
		$obj['email'] = $params['temp_employee_email'] ? $params['temp_employee_email'] : NULL;
		$obj['phone_number'] = $params['temp_employee_phone_number'] ? $params['temp_employee_phone_number'] : NULL;
		$obj['nickname'] = $params['temp_employee_nickname'] ? $params['temp_employee_nickname'] : NULL;
		$obj['birth_place'] = $params['temp_employee_birth_place'] ? $params['temp_employee_birth_place'] : NULL;
		$obj['birth_date'] = $params['temp_employee_birth_date'] ? $params['temp_employee_birth_date'] : NULL;
		$obj['age'] = $params['temp_employee_birth_date'] ? $this->date_extraction->countingAge($params['temp_employee_birth_date']) : NULL;
		$obj['gender'] = $params['temp_employee_gender'] ? $params['temp_employee_gender'] : NULL;
		$obj['religion'] = $params['temp_employee_religion'] ? $params['temp_employee_religion'] : NULL;
		$obj['blood_group'] = $params['temp_employee_blood_group'] ? $params['temp_employee_blood_group'] : NULL;
		$obj['height'] = $params['temp_employee_height'] ? $params['temp_employee_height'] : NULL;
		$obj['weight'] = $params['temp_employee_weight'] ? $params['temp_employee_weight'] : NULL;
		$obj['hobby'] = $params['temp_employee_hobby'] ? $params['temp_employee_hobby'] : NULL;
		$obj['citizenship'] = $params['temp_employee_citizenship'] ? $params['temp_employee_citizenship'] : NULL;
		$obj['married_status'] = $params['temp_employee_married_status'] ? $params['temp_employee_married_status'] : NULL;
		$obj['information_vacancy'] = $params['temp_employee_information_vacancy'] ? $params['temp_employee_information_vacancy'] : NULL;
		$result = $this->db->insert('temp_employee', $obj);
		if($result){
			return $this->db->insert_id();
		}else{
			return FALSE;
		}
	}

	public function tempEmployeeCard($employee_id, $params){
		if($employee_id){
			$obj['employee_id'] = $employee_id;
			$obj['number_ktp'] = $params['temp_employee_card_number_ktp'] ? $params['temp_employee_card_number_ktp'] : NULL;
			$obj['number_sim_c'] = $params['temp_employee_card_number_sim_c'] ? $params['temp_employee_card_number_sim_c'] : NULL;
			$obj['number_sim_a'] = $params['temp_employee_card_number_sim_a'] ? $params['temp_employee_card_number_sim_a'] : NULL;
			$obj['number_sim_b1'] = $params['temp_employee_card_number_sim_b1'] ? $params['temp_employee_card_number_sim_b1'] : NULL;
			$obj['number_sim_b2'] = $params['temp_employee_card_number_sim_b2'] ? $params['temp_employee_card_number_sim_b2'] : NULL;
			$obj['alamat'] = $params['temp_employee_card_alamat'] ? $params['temp_employee_card_alamat'] : NULL;
			$obj['kode_pos'] = $params['temp_employee_card_kode_pos'] ? $params['temp_employee_card_kode_pos'] : NULL;
			$obj['rt'] = $params['temp_employee_card_rt'] ? $params['temp_employee_card_rt'] : NULL;
			$obj['rw'] = $params['temp_employee_card_rw'] ? $params['temp_employee_card_rw'] : NULL;
			$obj['kecamatan'] = $params['temp_employee_card_kecamatan'] ? $params['temp_employee_card_kecamatan'] : NULL;
			$obj['kelurahan'] = $params['temp_employee_card_kelurahan'] ? $params['temp_employee_card_kelurahan'] : NULL;
			$obj['kota'] = $params['temp_employee_card_kota'] ? $params['temp_employee_card_kota'] : NULL;
			$obj['provinsi'] = $params['temp_employee_card_provinsi'] ? $params['temp_employee_card_provinsi'] : NULL;
			$obj['residence'] = $params['temp_employee_card_residence'] ? $params['temp_employee_card_residence'] : NULL;
			$obj['transport_status'] = $params['temp_employee_card_transport_status'] ? $params['temp_employee_card_transport_status'] : NULL;
			$this->db->insert('temp_employee_card', $obj);		
		}
	}

	public function tempEmployeePlace($employee_id, $params){
		if($employee_id){
			$obj['employee_id'] = $employee_id;
			$obj['alamat'] = $params['temp_employee_place_alamat'] ? $params['temp_employee_place_alamat'] : NULL;
			$obj['kota'] = $params['temp_employee_place_kota'] ? $params['temp_employee_place_kota'] : NULL;
			$obj['provinsi'] = $params['temp_employee_place_provinsi'] ? $params['temp_employee_place_provinsi'] : NULL;
			$obj['kode_pos'] = $params['temp_employee_place_kode_pos'] ? $params['temp_employee_place_kode_pos'] : NULL;
			$obj['rt'] = $params['temp_employee_place_rt'] ? $params['temp_employee_place_rt'] : NULL;
			$obj['rw'] = $params['temp_employee_place_rw'] ? $params['temp_employee_place_rw'] : NULL;
			$obj['kecamatan'] = $params['temp_employee_place_kecamatan'] ? $params['temp_employee_place_kecamatan'] : NULL;
			$obj['kelurahan'] = $params['temp_employee_place_kelurahan'] ? $params['temp_employee_place_kelurahan'] : NULL;
			$this->db->insert('temp_employee_place', $obj);		
		}
	}

	public function tempEmployeeEducationTesis($employee_id, $params){
		if($employee_id){
			$obj['employee_id'] = $employee_id;
			$obj['tesis_title'] = $params['temp_employee_education_tesis_tesis_title'] ? $params['temp_employee_education_tesis_tesis_title'] : NULL;
			$obj['tesis_result'] = $params['temp_employee_education_tesis_tesis_result'] ? $params['temp_employee_education_tesis_tesis_result'] : NULL;
			$obj['tesis_publish'] = $params['temp_employee_education_tesis_tesis_publish'] ? $params['temp_employee_education_tesis_tesis_publish'] : NULL;
			$this->db->insert('temp_employee_education_tesis', $obj);		
		}
	}

	public function tempEmployeeComputerSkill($employee_id, $params){
		if($employee_id){
			$obj['employee_id'] = $employee_id;
			$obj['word_processing'] = $params['temp_employee_computer_skill_word_processing'] ? $params['temp_employee_computer_skill_word_processing'] : NULL;
			$obj['number_processing'] = $params['temp_employee_computer_skill_number_processing'] ? $params['temp_employee_computer_skill_number_processing'] : NULL;
			$obj['database_processing'] = $params['temp_employee_computer_skill_database_processing'] ? $params['temp_employee_computer_skill_database_processing'] : NULL;
			$obj['others'] = $params['temp_employee_computer_skill_others'] ? $params['temp_employee_computer_skill_others'] : NULL;
			$this->db->insert('temp_employee_computer_skill', $obj);		
		}
	}

	public function tempEmployeeFamily($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_family'])){
				foreach ($params['temp_employee_family'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['family_relation'] = $v['family_relation'] ? $v['family_relation'] : NULL;
					$obj['name'] = $v['name'] ? $v['name'] : NULL;
					$obj['gender'] = $v['gender'] ? $v['gender'] : NULL;
					$obj['age'] = $v['age'] ? $v['age'] : NULL;
					$obj['degree'] = $v['degree'] ? $v['degree'] : NULL;
					$obj['last_job_position'] = $v['last_job_position'] ? $v['last_job_position'] : NULL;
					$obj['last_job_company'] = $v['last_job_company'] ? $v['last_job_company'] : NULL;
					$obj['description'] = $v['description'] ? $v['description'] : NULL;
					$this->db->insert('temp_employee_family', $obj);
				}
			}
		}
	}

	public function tempEmployeeEducation($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_education'])){
				foreach ($params['temp_employee_education'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['degree'] = $v['temp_employee_education_degree'] ? $v['temp_employee_education_degree'] : NULL;
					$obj['school_name'] = $v['temp_employee_education_school_name'] ? $v['temp_employee_education_school_name'] : NULL;
					$obj['city'] = $v['temp_employee_education_city'] ? $v['temp_employee_education_city'] : NULL;
					$obj['start'] = $v['temp_employee_education_start'] ? $v['temp_employee_education_start'] : NULL;
					$obj['end'] = $v['temp_employee_education_end'] ? $v['temp_employee_education_end'] : NULL;
					$obj['major'] = $v['temp_employee_education_major'] ? $v['temp_employee_education_major'] : NULL;
					$obj['status'] = $v['temp_employee_education_status'] ? $v['temp_employee_education_status'] : NULL;
					$obj['average_result'] = $v['temp_employee_education_average_result'] ? $v['temp_employee_education_average_result'] : NULL;
					$this->db->insert('temp_employee_education', $obj);
				}
			}
		}
	}

	public function tempEmployeeEducationNonFormal($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_education_nonformal'])){
				foreach ($params['temp_employee_education_nonformal'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['type'] = $v['temp_employee_education_nonformal_type'] ? $v['temp_employee_education_nonformal_type'] : NULL;
					$obj['title_education'] = $v['temp_employee_education_nonformal_title_education'] ? $v['temp_employee_education_nonformal_title_education'] : NULL;
					$obj['organizer'] = $v['temp_employee_education_nonformal_organizer'] ? $v['temp_employee_education_nonformal_organizer'] : NULL;
					$obj['city'] = $v['temp_employee_education_nonformal_city'] ? $v['temp_employee_education_nonformal_city'] : NULL;
					$obj['duration'] = $v['temp_employee_education_nonformal_duration'] ? $v['temp_employee_education_nonformal_duration'] : NULL;
					$obj['year_register'] = $v['temp_employee_education_nonformal_year_register'] ? $v['temp_employee_education_nonformal_year_register'] : NULL;
					$obj['financed_by'] = $v['temp_employee_education_nonformal_financed_by'] ? $v['temp_employee_education_nonformal_financed_by'] : NULL;
					$this->db->insert('temp_employee_education_nonformal', $obj);
				}
			}
		}
	}

	public function tempEmployeeLanguageSkill($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_language_skill'])){
				foreach ($params['temp_employee_language_skill'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['language'] = $v['temp_employee_language_skill_language'] ? $v['temp_employee_language_skill_language'] : NULL;
					$obj['listening'] = $v['temp_employee_language_skill_listening'] ? $v['temp_employee_language_skill_listening'] : NULL;
					$obj['speaking'] = $v['temp_employee_language_skill_speaking'] ? $v['temp_employee_language_skill_speaking'] : NULL;
					$obj['reading'] = $v['temp_employee_language_skill_reading'] ? $v['temp_employee_language_skill_reading'] : NULL;
					$obj['writing'] = $v['temp_employee_language_skill_writing'] ? $v['temp_employee_language_skill_writing'] : NULL;
					$this->db->insert('temp_employee_language_skill', $obj);
				}
			}
		}
	}

	public function tempEmployeeWorkHistory($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_work_history'])){
				foreach ($params['temp_employee_work_history'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['company_detail'] = $v['temp_employee_work_history_company_detail'] ? $v['temp_employee_work_history_company_detail'] : NULL;
					$obj['work_in'] = $v['temp_employee_work_history_work_in'] ? $v['temp_employee_work_history_work_in'] : NULL;
					$obj['work_in_position'] = $v['temp_employee_work_history_work_in_position'] ? $v['temp_employee_work_history_work_in_position'] : NULL;
					$obj['work_out'] = $v['temp_employee_work_history_work_out'] ? $v['temp_employee_work_history_work_out'] : NULL;
					$obj['work_out_position'] = $v['temp_employee_work_history_work_out_position'] ? $v['temp_employee_work_history_work_out_position'] : NULL;
					$obj['division'] = $v['temp_employee_work_history_division'] ? $v['temp_employee_work_history_division'] : NULL;
					$obj['company_head'] = $v['temp_employee_work_history_company_head'] ? $v['temp_employee_work_history_company_head'] : NULL;
					$obj['last_salary'] = $v['temp_employee_work_history_last_salary'] ? $v['temp_employee_work_history_last_salary'] : NULL;
					$obj['status_work'] = $v['temp_employee_work_history_status_work'] ? $v['temp_employee_work_history_status_work'] : NULL;
					$obj['out_reason'] = $v['temp_employee_work_history_out_reason'] ? $v['temp_employee_work_history_out_reason'] : NULL;
					$obj['work_description'] = $v['temp_employee_work_history_work_description'] ? $v['temp_employee_work_history_work_description'] : NULL;
					$this->db->insert('temp_employee_work_history', $obj);
				}
			}
		}
	}

	public function tempEmployeeSocialActivity($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_social_activity'])){
				foreach ($params['temp_employee_social_activity'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['organization_name'] = $v['temp_employee_social_activity_organization_name'] ? $v['temp_employee_social_activity_organization_name'] : NULL;
					$obj['organization_type'] = $v['temp_employee_social_activity_organization_type'] ? $v['temp_employee_social_activity_organization_type'] : NULL;
					$obj['year_in'] = $v['temp_employee_social_activity_year_in'] ? $v['temp_employee_social_activity_year_in'] : NULL;
					$obj['year_out'] = $v['temp_employee_social_activity_year_out'] ? $v['temp_employee_social_activity_year_out'] : NULL;
					$obj['last_position'] = $v['temp_employee_social_activity_last_position'] ? $v['temp_employee_social_activity_last_position'] : NULL;
					$this->db->insert('temp_employee_social_activity', $obj);
				}
			}
		}
	}

	public function tempEmployeeAccidentHistory($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_accident_history'])){
				foreach ($params['temp_employee_accident_history'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['accident_type'] = $v['temp_employee_accident_history_accident_type'] ? $v['temp_employee_accident_history_accident_type'] : NULL;
					$obj['accident_time'] = $v['temp_employee_accident_history_accident_time'] ? $v['temp_employee_accident_history_accident_time'] : NULL;
					$obj['year_accident'] = $v['temp_employee_accident_history_year_accident'] ? $v['temp_employee_accident_history_year_accident'] : NULL;
					$obj['opname_accident'] = $v['temp_employee_accident_history_opname_accident'] ? $v['temp_employee_accident_history_opname_accident'] : NULL;
					$obj['interference_accident'] = $v['temp_employee_accident_history_interference_accident'] ? $v['temp_employee_accident_history_interference_accident'] : NULL;
					$this->db->insert('temp_employee_accident_history', $obj);
				}
			}
		}
	}

	public function tempEmployeeOtherContact($employee_id, $params){
		if($employee_id){
			if(isset($params['temp_employee_other_contact'])){
				foreach ($params['temp_employee_other_contact'] as $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['name'] = $v['temp_employee_other_contact_name'] ? $v['temp_employee_other_contact_name'] : NULL;
					$obj['relation_status'] = $v['temp_employee_other_contact_relation_status'] ? $v['temp_employee_other_contact_relation_status'] : NULL;
					$obj['address_phone'] = $v['temp_employee_other_contact_address_phone'] ? $v['temp_employee_other_contact_address_phone'] : NULL;
					$obj['job'] = $v['temp_employee_other_contact_job'] ? $v['temp_employee_other_contact_job'] : NULL;					
					$this->db->insert('temp_employee_other_contact', $obj);
				}
			}
		}
	}

	public function tempEmployeeFaqAnswers($employee_id, $params){
		if($employee_id){
			if(isset($params['faq'])){
				foreach ($params['faq'] as $k => $v) {
					$obj['employee_id'] = $employee_id;	
					$obj['faq_id'] = $k;
					$obj['faq_answers'] = isset($v['faq_answers']) && $v['faq_answers'] ? $v['faq_answers'] : NULL;
					$obj['faq_description'] = $v['faq_description'] ? $v['faq_description'] : NULL;
					$this->db->insert('temp_empoyee_faq_question_answers', $obj);
				}
			}
		}
	}

	public function tempUser($employee_id, $params){
		if($employee_id){
			$obj['employee_id'] = $employee_id;
			$obj['email'] = $params['temp_employee_email'] ? $params['temp_employee_email'] : NULL;	
			$obj['password'] = $params['temp_employee_phone_number'] ? md5($params['temp_employee_phone_number']) : NULL;	
			$result = $this->db->insert('temp_users', $obj);
			if($result){
				$loginsession = array(
					'status' => TRUE,
					'employee_id' => $employee_id,
				);
				$this->session->set_userdata('loginsession', $loginsession);
			}
		}
	}

}