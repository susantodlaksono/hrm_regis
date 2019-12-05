<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @author SUSANTO DWI LAKSONO
 */


class Date_extraction{

   public function __construct() {
      $this->ci = & get_instance();
   }

   public function countingAge($birth_date){
      $biday = new DateTime($birth_date);
      $today = new DateTime();
      $diff = $today->diff($biday);
      return $diff->y !== 0 ? $diff->y : NULL;
   }
   
}