<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


define('ASSET_PATH',		'/assets');
define('VIEW_ROOT', dirname(FCPATH).'/www/html');

define('ADMIN_ASSET_PATH',		'/asset/admin');
define('ADMIN_FOLDER', 'Admin');


define('PAGE_TITLE', 'JADE BACK OFFICE');
define('PAGE_ADMIN_TITLE', 'C ADMINISTRATOR');


date_default_timezone_set('Asia/Seoul');

define('TIME_YMD', date('Y-m-d', time()));
define('TIME_HIS', date('H:i:s', time()));
define('TIME_YMDHIS', date('Y-m-d H:i:s', time()));

//$refer_path = parse_url($_SERVER['HTTP_REFERER']);
//define('REFER_PATH', $refer_path["path"]);


//API

define('APIURL', 'http://xsp.bo.svc:9999/svcBO.asmx?wsdl');

//로그인
define('API_LOGIN', 'SvcValidateCustomer');
define('API_LOGIN_METHOD', 'ValidateCustomer');
//회원가입
define('API_CUSTOMERJOIN', 'SvcAddCustomer');
define('API_CUSTOMERJOIN_METHOD', 'AddCustomer');
//아이디패스워드찾기
define('API_IDPWSEARCH', '');
define('API_IDPWSEARCH_METHOD', '');

//아이디중복체크
define('API_IDCHECK', '');
define('API_IDCHECK_METHOD', '');

//회원정보
define('API_CUSTOMERINFO', 'SvcGetCustomerInfo');
define('API_CUSTOMERINFO_METHOD', 'GetCustomerInfo');

//회원정보업데이트
define('API_CUSTOMERUPDATE', 'SvcUpdateCustomer');
define('API_CUSTOMERUPDATE_METHOD', 'UpdateCustomer');

//입금
define('API_DEPOSIT', '');
define('API_DEPOSIT_METHOD', '');

//출금
define('API_WITHDRAW', '');
define('API_WITHDRAW_METHOD', '');

//머니이동
define('API_MONEYMOVE', '');
define('API_MONEYMOVE_METHOD', '');


//API SYSTEM 계정

define('SYSTEMID', 'BLRIUSR');
define('SYSTEMPW', 'ntrntxplr12');





//썸네일 사이즈

define('MEMBER_PROFILE_THUMB_SIZE', '150');
define('PRODUCT_THUMB_SIZE_WIDTH', '400');
define('PRODUCT_THUMB_SIZE_HEIGHT', '300');


/* End of file constants.php */
/* Location: ./application/config/constants.php */