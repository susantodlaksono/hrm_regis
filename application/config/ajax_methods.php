<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| References to all AJAX controllers' methods or the controller itself
|--------------------------------------------------------------------------
|
| Based on Jorge's solution: https://stackoverflow.com/a/43484330/6225838
| Key: controller name
| Possible values:
| - array: method name as key and boolean as value (TRUE => IS_AJAX)
| - boolean: TRUE if all the controller's methods are for AJAX requests
|
*/
$config['main'] = [
  'registrationApplicant' => TRUE,
];
$config['applicant'] = [
  'getBasicEmployee' => TRUE,
  'getBasicEmployee' => TRUE,
  'getFamilyEmployee' => TRUE,
  'updateBasic' => TRUE,
  'uploadDoc' => TRUE,
  'getDoc' => TRUE,
  'getVacancy' => TRUE,
];
$config['ajax_troller'] = TRUE;