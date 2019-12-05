<?php
if (!defined('BASEPATH'))
 	exit('No direct script access allowed');


/**
 *
 * @author SUSANTO DWI LAKSONO
 */

class MY_Controller extends MX_Controller {

   protected $_post;
   protected $_get;
   protected $_session;
   protected $_maintenance;

	public function __construct() {
		$this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
      $this->load->library('ion_auth'); 

      $this->_session = TRUE;
      $this->_maintenance = TRUE;
         
      $this->_post = $this->input->post();
      $this->_get = $this->input->get();
	}

 	public function json_result($response) {
      $response['_session'] = $this->_session;
      $response['_maintenance'] = $this->_maintenance;
      $response['_token_hash'] = $this->security->get_csrf_hash();
   	header('Content-Type: application/json');
   	echo json_encode($response);
      exit();
   }

   public function render_page($data, $content = NULL) {
      $data['content'] = $content;
   	$this->load->view('nice-admin/base/index', $data);
   }
}