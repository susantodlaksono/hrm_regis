<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_only {

   public function __construct(){
      $this->CI = &get_instance();
      $this->CI->config->load('ajax_methods');
   }

   public function show_404_on_illegal_ajax(){
      $fetched_troller_val = $this->CI->config->item(
         $this->CI->router->fetch_class()
      );
      $fetched_method = $this->CI->router->fetch_method();

      $is_ajax_method = is_array($fetched_troller_val) &&
      // verify if the method's name is present
      isset($fetched_troller_val[$fetched_method]) &&
      // verify if the value is truthy
      $fetched_troller_val[$fetched_method];

      // if the controller is not in the config file then
      // config->item() returned NULL
      if($fetched_troller_val !== NULL && $this->CI->input->is_ajax_request() === FALSE  && ($fetched_troller_val === TRUE || $is_ajax_method)) {
         show_404();
      }
   }
}