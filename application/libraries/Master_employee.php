<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * @author SUSANTO DWI LAKSONO
 */


class Master_employee{

   public function __construct() {
      $this->ci = & get_instance();
   }

   public function switchReligion($value){
      switch ($value) {
      	case '1': return 'Islam'; break;
      	case '2': return 'Protestan'; break;
      	case '3': return 'Katolik'; break;
      	case '4': return 'Hindu'; break;
      	case '5': return 'Budha'; break;
      }
   }

   public function switchFamilyRelation($value){
      switch ($value) {
      	case '1': return 'Ayah'; break;
      	case '2': return 'Ibu'; break;
      	case '3': return 'Saudara'; break;
      	case '4': return 'Istri'; break;
      	case '5': return 'Suami'; break;
      	case '6': return 'Anak'; break;
      }
   }

   public function switchDegree($value){
      switch ($value) {
      	case '1': return 'SMK'; break;
      	case '2': return 'SMA'; break;
      	case '3': return 'SLTA/SEDERAJAT'; break;
      	case '4': return 'D1'; break;
      	case '5': return 'D2'; break;
      	case '6': return 'D3'; break;
      	case '7': return 'D4'; break;
      	case '8': return 'S1'; break;
      	case '9': return 'S2'; break;
      	case '10': return 'S3'; break;
         case '11': return 'SD'; break;
         case '12': return 'SMP'; break;
      }
   }

   public function icon($file_extension){
      switch ($file_extension) {
         case '.pdf':
            return '<i class="fas fa-file-pdf"></i>';
            break;
         case '.doc':
            return '<i class="fas fa-file-word"></i>';
            break;
         case '.docx':
            return '<i class="fas fa-file-word"></i>';
            break;
         case '.xls':
            return '<i class="fas fa-file-excel"></i>';
            break;
         case '.xlsx':
            return '<i class="fas fa-file-excel"></i>';
            break;
          case '.jpg':
            return '<i class="fas fa-image"></i>';
            break;
         case '.jpeg':
            return '<i class="fas fa-image"></i>';
            break;
         case '.png':
            return '<i class="fas fa-image"></i>';
            break;
         default:
            return '<i class="fas fa-file"></i>';
            break;
      }
   }
   
}