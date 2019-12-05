<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_applicant extends CI_Model{

	public function __construct() {
  		parent::__construct();
  		$this->load->library('date_extraction');
	}

	public function updateBasic($params){
		$this->db->trans_start();
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

		$obj1['number_ktp'] = $params['temp_employee_card_number_ktp'] ? $params['temp_employee_card_number_ktp'] : NULL;
		$obj1['number_sim_c'] = $params['temp_employee_card_number_sim_c'] ? $params['temp_employee_card_number_sim_c'] : NULL;
		$obj1['number_sim_a'] = $params['temp_employee_card_number_sim_a'] ? $params['temp_employee_card_number_sim_a'] : NULL;
		$obj1['number_sim_b1'] = $params['temp_employee_card_number_sim_b1'] ? $params['temp_employee_card_number_sim_b1'] : NULL;
		$obj1['number_sim_b2'] = $params['temp_employee_card_number_sim_b2'] ? $params['temp_employee_card_number_sim_b2'] : NULL;
		$obj1['alamat'] = $params['temp_employee_card_alamat'] ? $params['temp_employee_card_alamat'] : NULL;
		$obj1['kode_pos'] = $params['temp_employee_card_kode_pos'] ? $params['temp_employee_card_kode_pos'] : NULL;
		$obj1['rt'] = $params['temp_employee_card_rt'] ? $params['temp_employee_card_rt'] : NULL;
		$obj1['rw'] = $params['temp_employee_card_rw'] ? $params['temp_employee_card_rw'] : NULL;
		$obj1['kecamatan'] = $params['temp_employee_card_kecamatan'] ? $params['temp_employee_card_kecamatan'] : NULL;
		$obj1['kelurahan'] = $params['temp_employee_card_kelurahan'] ? $params['temp_employee_card_kelurahan'] : NULL;
		$obj1['kota'] = $params['temp_employee_card_kota'] ? $params['temp_employee_card_kota'] : NULL;
		$obj1['provinsi'] = $params['temp_employee_card_provinsi'] ? $params['temp_employee_card_provinsi'] : NULL;
		$obj1['residence'] = $params['temp_employee_card_residence'] ? $params['temp_employee_card_residence'] : NULL;
		$obj1['transport_status'] = $params['temp_employee_card_transport_status'] ? $params['temp_employee_card_transport_status'] : NULL;

		$obj2['alamat'] = $params['temp_employee_place_alamat'] ? $params['temp_employee_place_alamat'] : NULL;
		$obj2['kota'] = $params['temp_employee_place_kota'] ? $params['temp_employee_place_kota'] : NULL;
		$obj2['provinsi'] = $params['temp_employee_place_provinsi'] ? $params['temp_employee_place_provinsi'] : NULL;
		$obj2['kode_pos'] = $params['temp_employee_place_kode_pos'] ? $params['temp_employee_place_kode_pos'] : NULL;
		$obj2['rt'] = $params['temp_employee_place_rt'] ? $params['temp_employee_place_rt'] : NULL;
		$obj2['rw'] = $params['temp_employee_place_rw'] ? $params['temp_employee_place_rw'] : NULL;
		$obj2['kecamatan'] = $params['temp_employee_place_kecamatan'] ? $params['temp_employee_place_kecamatan'] : NULL;
		$obj2['kelurahan'] = $params['temp_employee_place_kelurahan'] ? $params['temp_employee_place_kelurahan'] : NULL;

		$this->db->update('temp_employee', $obj, array('id' => $params['key_basic_form']['id']));
		$this->db->update('temp_employee_card', $obj1, array('employee_id' => $params['key_basic_form']['id']));
		$this->db->update('temp_employee_place', $obj2, array('employee_id' => $params['key_basic_form']['id']));
		$this->db->trans_complete();

		if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data biodata berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data biodata gagal diperbaharui',
         );
      }
	}

	public function updateFamily($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_family', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_family'])){
         foreach ($params['temp_employee_family'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
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
      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data keluarga berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data keluarga gagal diperbaharui',
         );
      }
   }

   public function updateEducation($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_education', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_education'])){
         foreach ($params['temp_employee_education'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
				$obj['degree'] = $v['degree'] ? $v['degree'] : NULL;
				$obj['school_name'] = $v['school_name'] ? $v['school_name'] : NULL;
				$obj['city'] = $v['city'] ? $v['city'] : NULL;
				$obj['start'] = $v['start'] ? $v['start'] : NULL;
				$obj['end'] = $v['end'] ? $v['end'] : NULL;
				$obj['major'] = $v['major'] ? $v['major'] : NULL;
				$obj['status'] = $v['status'] ? $v['status'] : NULL;
				$obj['average_result'] = $v['average_result'] ? $v['average_result'] : NULL;
				$this->db->insert('temp_employee_education', $obj);
			}
      }
      $obj1['employee_id'] = $params['employee_id'];
      $obj1['tesis_title'] = $params['temp_employee_education_tesis_tesis_title'];
      $obj1['tesis_result'] = $params['temp_employee_education_tesis_tesis_result'];
      $obj1['tesis_publish'] = $params['temp_employee_education_tesis_tesis_publish'];	
      $this->db->update('temp_employee_education_tesis', $obj1, array('employee_id' => $params['employee_id']));

      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data pendidikan berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data pendidikan gagal diperbaharui',
         );
      }
   }

   public function updateEducationNon($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_education_nonformal', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_education_nonformal'])){
         foreach ($params['temp_employee_education_nonformal'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
				$obj['type'] = $v['type'] ? $v['type'] : NULL;
				$obj['title_education'] = $v['title_education'] ? $v['title_education'] : NULL;
				$obj['organizer'] = $v['organizer'] ? $v['organizer'] : NULL;
				$obj['city'] = $v['city'] ? $v['city'] : NULL;
				$obj['duration'] = $v['duration'] ? $v['duration'] : NULL;
				$obj['year_register'] = $v['year_register'] ? $v['year_register'] : NULL;
				$obj['financed_by'] = $v['financed_by'] ? $v['financed_by'] : NULL;
				$this->db->insert('temp_employee_education_nonformal', $obj);
			}
      }
      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data pendidikan non-formal berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data pendidikan non-formal gagal diperbaharui',
         );
      }
   }

   public function updateLanguage($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_language_skill', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_language_skill'])){
         foreach ($params['temp_employee_language_skill'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
				$obj['language'] = $v['language'] ? $v['language'] : NULL;
				$obj['listening'] = $v['listening'] ? $v['listening'] : NULL;
				$obj['speaking'] = $v['speaking'] ? $v['speaking'] : NULL;
				$obj['reading'] = $v['reading'] ? $v['reading'] : NULL;
				$obj['writing'] = $v['writing'] ? $v['writing'] : NULL;
				$this->db->insert('temp_employee_language_skill', $obj);
			}
      }
      $obj1['employee_id'] = $params['employee_id'];
      $obj1['word_processing'] = $params['temp_employee_computer_skill_word_processing'];
      $obj1['number_processing'] = $params['temp_employee_computer_skill_number_processing'];
      $obj1['database_processing'] = $params['temp_employee_computer_skill_database_processing'];	
      $obj1['others'] = $params['temp_employee_computer_skill_others'];	
      $this->db->update('temp_employee_computer_skill', $obj1, array('employee_id' => $params['employee_id']));

      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data kemampuan khusus berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data kemampuan khusus gagal diperbaharui',
         );
      }
   }

   public function updateJobHistory($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_work_history', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_work_history'])){
         foreach ($params['temp_employee_work_history'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
				$obj['company_detail'] = $v['company_detail'] ? $v['company_detail'] : NULL;
				$obj['work_in'] = $v['work_in'] ? $v['work_in'] : NULL;
				$obj['work_in_position'] = $v['work_in_position'] ? $v['work_in_position'] : NULL;
				$obj['work_out'] = $v['work_out'] ? $v['work_out'] : NULL;
				$obj['work_out_position'] = $v['work_out_position'] ? $v['work_out_position'] : NULL;
				$obj['division'] = $v['division'] ? $v['division'] : NULL;
				$obj['company_head'] = $v['company_head'] ? $v['company_head'] : NULL;
				$obj['last_salary'] = $v['last_salary'] ? $v['last_salary'] : NULL;
				$obj['status_work'] = $v['status_work'] ? $v['status_work'] : NULL;
				$obj['out_reason'] = $v['out_reason'] ? $v['out_reason'] : NULL;
				$obj['work_description'] = $v['work_description'] ? $v['work_description'] : NULL;
				$this->db->insert('temp_employee_work_history', $obj);
			}
      }
      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data riwayat pekerjaan berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data riwayat pekerjaan gagal diperbaharui',
         );
      }
   }

   public function updateSocialActivity($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_social_activity', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_social_activity'])){
         foreach ($params['temp_employee_social_activity'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
				$obj['organization_name'] = $v['organization_name'] ? $v['organization_name'] : NULL;
				$obj['organization_type'] = $v['organization_type'] ? $v['organization_type'] : NULL;
				$obj['year_in'] = $v['year_in'] ? $v['year_in'] : NULL;
				$obj['year_out'] = $v['year_out'] ? $v['year_out'] : NULL;
				$obj['last_position'] = $v['last_position'] ? $v['last_position'] : NULL;
				
				$this->db->insert('temp_employee_social_activity', $obj);
			}
      }
      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data aktivitas sosial berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data aktivitas sosial gagal diperbaharui',
         );
      }
   }

   public function updateAccidentHistory($params){
		$this->db->trans_start();
   	$this->db->delete('temp_employee_accident_history', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_accident_history'])){
         foreach ($params['temp_employee_accident_history'] as $v) {
				$obj['employee_id'] = $params['employee_id'];	
				$obj['accident_type'] = $v['accident_type'] ? $v['accident_type'] : NULL;
				$obj['accident_time'] = $v['accident_time'] ? $v['accident_time'] : NULL;
				$obj['year_accident'] = $v['year_accident'] ? $v['year_accident'] : NULL;
				$obj['opname_accident'] = $v['opname_accident'] ? $v['opname_accident'] : NULL;
				$obj['interference_accident'] = $v['interference_accident'] ? $v['interference_accident'] : NULL;
				
				$this->db->insert('temp_employee_accident_history', $obj);
			}
      }
      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data riwayat penyakit berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data riwayat penyakit gagal diperbaharui',
         );
      }
   }

   public function updateFaqAnswers($params){
      $this->db->trans_start();

      $this->db->delete('temp_employee_other_contact', array('employee_id' => $params['employee_id']));
      if(isset($params['temp_employee_other_contact'])){
         foreach ($params['temp_employee_other_contact'] as $v) {
            $obj1['employee_id'] = $params['employee_id'];   
            $obj1['name'] = $v['temp_employee_other_contact_name'] ? $v['temp_employee_other_contact_name'] : NULL;
            $obj1['relation_status'] = $v['temp_employee_other_contact_relation_status'] ? $v['temp_employee_other_contact_relation_status'] : NULL;
            $obj1['address_phone'] = $v['temp_employee_other_contact_address_phone'] ? $v['temp_employee_other_contact_address_phone'] : NULL;
            $obj1['job'] = $v['temp_employee_other_contact_job'] ? $v['temp_employee_other_contact_job'] : NULL;
            
            $this->db->insert('temp_employee_other_contact', $obj1);
         }
      }

      if(isset($params['faq'])){
         foreach ($params['faq'] as $k => $v) {
            $obj['faq_answers'] = isset($v['faq_answers']) && $v['faq_answers'] ? $v['faq_answers'] : NULL;
            $obj['faq_description'] = $v['faq_description'] ? $v['faq_description'] : NULL;
            $this->db->update('temp_empoyee_faq_question_answers', $obj, array('id' => $k));
         }
      }
      $this->db->trans_complete();

      if($this->db->trans_status() === TRUE){
         $this->db->trans_commit();
         return array(
            'success' => TRUE,
            'msg' => 'Data berhasil diperbaharui',
         );
      }else{
         $this->db->trans_rollback();
         return array(
            'success' => FALSE,
            'msg' => 'Data gagal diperbaharui',
         );
      }
   }

}