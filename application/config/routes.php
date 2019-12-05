<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['registration']['post'] = 'main/registrationApplicant';
$route['basic']['post'] = 'applicant/updateBasic';
$route['family']['post'] = 'applicant/updateFamily';
$route['doc-upload']['post'] = 'applicant/uploadDoc';

$route['logout'] = 'applicant/logoutApplicant';
$route['print'] = 'applicant/printOutBiodata';
$route['profile'] = 'applicant/profilApplicant';
$route['get-basic']['get'] = 'applicant/getBasicEmployee';
$route['doc-download-(:any)']['get'] = 'applicant/downloadDocument/$1';
$route['get-doc']['get'] = 'applicant/getDoc';
$route['vacancy-data']['get'] = 'applicant/getVacancy';
$route['verify']['post'] = 'main/verifyLogin';

$route['family']['post'] = 'applicant/updateFamily';
$route['education']['post'] = 'applicant/updateEducation';
$route['education-non']['post'] = 'applicant/updateEducationNon';
$route['language']['post'] = 'applicant/updateLanguage';
$route['job-history']['post'] = 'applicant/updateJobHistory';
$route['social-activity']['post'] = 'applicant/updateSocialActivity';
$route['accident-history']['post'] = 'applicant/updateAccidentHistory';
$route['faq-answers']['post'] = 'applicant/updateFaqAnswers';
$route['vacancy-register']['post'] = 'applicant/registerVacancy';

$route['get-family']['get'] = 'applicant/getFamilyEmployee';
$route['get-education']['get'] = 'applicant/getEducationEmployee';
$route['get-education-non']['get'] = 'applicant/getEducationNonEmployee';
$route['get-language']['get'] = 'applicant/getLanguage';
$route['get-job-history']['get'] = 'applicant/getJobHistory';
$route['get-social-activity']['get'] = 'applicant/getSocialActivity';
$route['get-accident-history']['get'] = 'applicant/getAccidentHistory';
$route['get-faq-answers']['get'] = 'applicant/getFaqAnswers';
$route['vacancy-detail']['get'] = 'applicant/detailVacancy';

