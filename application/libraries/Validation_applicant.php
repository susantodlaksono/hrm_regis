<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Validation_applicant{

   public function __construct() {
      $this->_ci = & get_instance();
      $this->_ci->load->library('form_validation');
   }

   public function update($params){
      if($params['temp_employee_fullname'] != $params['key_basic_form']['temp_employee_fullname_before']){
         $this->_ci->form_validation->set_rules('temp_employee_fullname', 'Nama Lengkap', 'required|trim|is_unique[temp_employee.fullname]');
      }else{
         $this->_ci->form_validation->set_rules('temp_employee_fullname', 'Nama Lengkap', 'required|trim');
      }
      if($params['temp_employee_email'] != $params['key_basic_form']['temp_employee_email_before']){
         $this->_ci->form_validation->set_rules('temp_employee_email', 'Email', 'required|trim|valid_email|is_unique[temp_employee.email]');
      }else{
         $this->_ci->form_validation->set_rules('temp_employee_email', 'Email', 'required|trim|valid_email');
      }
      if($params['temp_employee_phone_number'] != $params['key_basic_form']['temp_employee_phone_number_before']){
         $this->_ci->form_validation->set_rules('temp_employee_phone_number', 'No Whatsapp', 'required|trim|is_numeric|is_unique[temp_employee.phone_number]');
      }else{
         $this->_ci->form_validation->set_rules('temp_employee_phone_number', 'No Whatsapp', 'required|trim|is_numeric');

      }
   	// $this->_ci->form_validation->set_rules('temp_employee_birth_place', 'Tempat lahir', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_birth_date', 'Tgl lahir', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_citizenship', 'Kewarganegaraan', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_number_ktp', 'No KTP', 'required|trim|is_numeric|is_unique[temp_employee_card.number_ktp]');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_alamat', 'Alamat asal', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_kota', 'Kota KTP', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_provinsi', 'Provinsi KTP', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_rt', 'RT KTP', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_rw', 'RW KTP', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_kecamatan', 'Kecamatan KTP', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_card_kelurahan', 'Kelurahan KTP', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_place_alamat', 'Alamat tinggal', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_place_kota', 'Kota tinggal', 'required|trim');
   	// $this->_ci->form_validation->set_rules('temp_employee_place_provinsi', 'Provinsi tinggal', 'required|trim');
   	return $this->_ci->form_validation->run();
	}

}