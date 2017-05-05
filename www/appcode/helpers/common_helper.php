<?php
header("Content-Type: text/html; charset=UTF-8");

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function isMobile ()
{
    $mobile_agent = array("Iphone","Ipod","Android","Blackberry","SymbianOS|SCH-M\d+","Opera Mini", "Windows ce", "Nokia", "sony" );
    $check_mobile = false;
    for($i=0; $i<sizeof($mobile_agent); $i++){
        if(stripos( $_SERVER['HTTP_USER_AGENT'], $mobile_agent[$i] )){
            $check_mobile = true;
            break;
        }
    }
    return $check_mobile;
}


function getIPaddress()

{

    $IPaddress='';

    if (isset($_SERVER)){

        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            $IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];

        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {

            $IPaddress = $_SERVER["HTTP_CLIENT_IP"];

        } else {

            $IPaddress = $_SERVER["REMOTE_ADDR"];

        }

    } else {

        if (getenv("HTTP_X_FORWARDED_FOR")){

            $IPaddress = getenv("HTTP_X_FORWARDED_FOR");

        } else if (getenv("HTTP_CLIENT_IP")) {

            $IPaddress = getenv("HTTP_CLIENT_IP");

        } else {

            $IPaddress = getenv("REMOTE_ADDR");

        }

    }

    if(strpos($IPaddress,"%2C+") == true){
        $ipArr = explode("%2C+",$IPaddress);
        if(count($ipArr)>0){
            $IPaddress = $ipArr[0];
        }
    }

    if(strpos($IPaddress,", ") == true){
        $ipArr = explode(", ",$IPaddress);
        if(count($ipArr)>0){
            $IPaddress = $ipArr[0];
        }
    }

    return $IPaddress;

}




function getBoardName($boardType){
	switch ($boardType)
	{
		case "notice" :
			$result = "공지사항";
			break;
		case "faq" :
			$result = "자주묻는질문";
			break;
		case "event" :
			$result = "이벤트";
			break;
		default :
			$result = "Board";
			break;
	}
	return $result;
}

//고객센터 연락처 가져옴
function customerServiceInfo(){
	$CI =& get_instance();
	$CI->load->model('Xbets_model');
	$result = $CI->Xbets_model->customerServicePhoneNumber();
	return $result;
}

//사이트에서 사용하는 세션
function siteSess(){
	$CI =& get_instance();
	if($CI->session->userdata('SESS_ID') == ""){
		$sess = $CI->session->set_userdata('SESS_ID', memCode('SESS')); 										//세션아이디
	}else{
		$sess = $CI->session->userdata('SESS_ID');
	}

	return $sess;
}

//코드 생성  타입+시간(timestamp)
function memCode($mtype)
{
	date_default_timezone_set('Asia/Seoul');
	$dcode = date('YmdHis', time());
	$dcode = strtotime($dcode);
	$value = $mtype.$dcode;
	return $value;
}

function cs_time($date2,$today='1') {

	$date2 = strtotime($date2);
	$date = $date2;
	$date = time()-$date;
	$time = floor($date/3600); // 시간
	$tempmin = $date%3600;
	$min = floor($tempmin/60);
	$sec = $tempmin%60;

	if($time > 24){
		$day = intval((strtotime(date("Y-m-d",time()))-strtotime(date("Y-m-d",$date2)))/86400);
	}else{
		$day = 0;
	}

	$mYear = intval((strtotime(date("Y-m-d",time()))-strtotime(date("Y-m-d",$date2)))/31536000);	//년도차이

	if($mYear>0){
		return $mYear." year ago";
	}else{

		if($day > 5) return date("d M h:i",$date2);
		elseif($time > 24) return $day." days";
		elseif($time > 0) return $time." hrs";
		elseif($min > 0) return $min." mins";
		else return " now";
	}
}



//배열출력함수
function arrChange($arr)

{
	$result="";
	for ($i=0;$i<count($arr);$i++) {
		$result.=",".$arr[$i];
	}
	return $result;
}



//랜덤코드생성

function randCode()
{
	date_default_timezone_set('Asia/Seoul');
	$dcode = date('YmdHis', time());
	$dcode = strtotime($dcode);
	$value = $dcode;
	return $value;
}


//라디오 체크박스 체크
function radioCheckboxSelect($msg,$find,$type)
{
	if($type=="radio" || $type=="checkbox"){
		$msg_check = strstr($msg,$find);
		if($msg_check){
				$value = "checked";
		}else{
			$value = "";
		}
	}else{
		if($msg==$find){
			$value = "selected";
		}else{
			$value = "";			
		}
	}
	return $value;
}




function getSession($key)
{
	$CI =& get_instance();
	$value = $CI->session->userdata($key) == '' ? null : $CI->session->userdata($key);
	
	return $value;
}



function isLogin()
{
	$CI =& get_instance();
	$MEM_LID = $CI->session->userdata('MEM_LID');
	$customerID = $CI->session->userdata('customerID');
	$loginSessionID = $CI->session->userdata('loginSessionID');
	
	if(isset($MEM_LID) && $MEM_LID != '' && isset($customerID) && $customerID != '' && isset($loginSessionID) && $loginSessionID != '')
		return true;
	else
		return false;
}

//로그인 체크
function checkLogin()
{
	if(!isLogin())
		messageMove('Login please.',"/");
}


//로그인 체크
function checkLogin_t1($getUrl)
{
	if(!isLogin()){
		moveReplace("/?retUrl=".$getUrl);
	}
}



function isPostBack()
{
	$value = $_SERVER['REQUEST_METHOD'] == 'POST' ? true : false;
	
	return $value;
}

function dateParser($val,$len){
	if(strlen($val) <> $len) return $val;
	if($len == 6){ //201108 => 2011-08
		return substr($val,0,4)."-".substr($val,4,2);
	} else if($len == 8){ //20110817 => 2011-08-17
		return substr($val,0,4)."-".substr($val,4,2)."-".substr($val,6,7);
	} else if($len == 14){ //20110601085959 => 2011-06-01 08:59:59
		return substr($val,0,4)."-".substr($val,4,2)."-".substr($val,6,2)." ".substr($val,8,2).":".substr($val,10,2).":".substr($val,12,2);
	}
}

function  metaMove($url="/", $time=0) {
	if(trim($url) == "") {
		$url = "/";
	}

	echo"
		<meta http-equiv='Refresh' content='$time; URL=$url'>";
	exit;

}

//---------------------------------------- 메세지 관련 함수 시작 -----------------------------------------
function  message($msg) {
	echo"
		<script type='text/javascript'>
		<!--
			alert('$msg');
		//-->
		</script>
	";
}

function  messagePop($msg) {
	echo "
		<script type='text/javascript'>
		<!--
			parent.popClose();
			alert('$msg');
		//-->
		</script>
	";
	exit;
}

function  messageClose($msg) {
	echo"
		<script type='text/javascript'>
		<!--
			alert('$msg');
			window.close();
		//-->
		</script>
	";
	exit;
}



function  httpMessageMove($msg, $url) {
	echo"
		<script type='text/javascript'>
		<!--
			alert('$msg');
			window.location = '$url';
		//-->
		</script>
	";
	exit;
}




function  messageMove($msg, $url) {
	echo"
		<script type='text/javascript'>
		<!--
			alert('$msg');
			location.href = '$url';
		//-->
		</script>
	";
	exit;
}



function  messageReplace($msg, $url) {

	echo"

	<script type='text/javascript'>

	<!--

	alert('$msg');

	document.location.replace('$url');

	//-->

	</script>

	";

	exit;

}






function  moveReplace($url) {



	echo"

	<script type='text/javascript'>

	<!--

	document.location.replace('$url');

	//-->

	</script>

	";

	exit;



}

function  messageMovePop($msg, $url) {
	echo"
		<script type='text/javascript'>
		<!--
			if(typeof(parent.popClose) != 'undefined'){
				parent.popClose();
			}
			alert('$msg');
			parent.document.location.href = '$url';
		//-->
		</script>
	";
	exit;
}

function  MovePop($url) {
	echo"
		<script type='text/javascript'>
		<!--
			if(typeof(parent.popClose) != 'undefined'){
				parent.popClose();
			}
			parent.document.location.href = '$url';
		//-->
		</script>
	";
	exit;
}

function  ParentMove($url) {
	echo"
		<script type='text/javascript'>
		<!--
			parent.document.location.href = '$url';
		//-->
		</script>
	";
	exit;
}

function  closeMove($url) {
	echo"
		<script type='text/javascript'>
		<!--
			opener.location.href = '$url';
			window.close();
		//-->
		</script>
	";
	exit;
}


 function  closeReload() {
	echo"
		<script type='text/javascript'>
			opener.location.reload();
			window.close();
		</script>
	";
	exit;
}

function  parentReload() {
	echo"
		<script type='text/javascript'>
			parent.document.location.reload(); 
		</script>
	";
	exit;
}


function  messageCloseReload($msg) {
	echo"
		<script type='text/javascript'>
			alert('$msg');
			opener.location.reload();
			window.close();
		</script>
	";
	exit;
}

function  pageMove($url) {
	echo"
		<script type='text/javascript'>
		<!--
			document.location.href = '$url';
		//-->
		</script>
	";
	exit;
}


function headerCache()
{
	
$CI =& get_instance();
$CI->output->set_header("HTTP/1.0 200 OK");
$CI->output->set_header("HTTP/1.1 200 OK");
$CI->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
$CI->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
$CI->output->set_header("Cache-Control: post-check=0, pre-check=0");
$CI->output->set_header("Pragma: no-cache"); 

}
//---------------------------------------- 메세지 관련 함수 종료 -----------------------------------------


//php soap 연동
function sendSoapData_new($method,$param)
{
	$CI =& get_instance();
	ini_set("soap.wsdl_cache_enabled", "0");
	try{

		## 서버 server.php 의 URL을 넘겨줌
		//$strServerURL = site_url("webservice?wsdl");
		$strServerURL = APIURL;
		$soapclient = new nusoap_client($strServerURL, array('cache_wsdl' => WSDL_CACHE_NONE));
		$soapclient->soap_defencoding = 'UTF-8';
		$soapclient->decode_utf8 = false;

		## 서버에서 실행할 함수호출
		//$result = $soapclient->$method($param);
		$result = $soapclient->call($method,$param);

		//로그저장**********************************************************************************************

		$logString = "시간 -> ".strftime('%Y-%m-%d %H:%M:%S')."\r\n";
		$logString .= "url -> ".$strServerURL."\r\n";
		$logString .= "method -> ".$method."\r\n";
		$logString .= "param -> ".print_r($param,true)."\r\n";
		$logString .= "res -> ".print_r($result,true)."\r\n";

		//$logString .= "res_data -> ".print_r($data_result,true)."\r\n";

		$logString .= "------------------------------------------------------------------\r\n";
		$logString .= "request-> " . htmlspecialchars($soapclient->request, ENT_QUOTES) . "\r\n";
		$logString .= "response-> " . htmlspecialchars($soapclient->response, ENT_QUOTES) . "\r\n";
		$logString .= "debug-> " . htmlspecialchars($soapclient->debug_str, ENT_QUOTES) . '\r\n';
		error_log($logString, 3, "C:/Temp/send_data_".date("Ymd").".log");

		//로그저장**********************************************************************************************



		/*if($token_check_yn == "Y"){
			//token 값 만료시 로그아웃 시킴
			if($res["status"] == "-1"){
				$CI->session->sess_destroy();
				session_start();
				session_destroy();
				messageMovePop("로그인 후 이용해 주세요.","/");
			}
		}*/

		return $result;

	}catch(SoapFault $exception){

		//로그저장**********************************************************************************************

		$logString = "시간 -> ".strftime('%Y-%m-%d %H:%M:%S')."\r\n";
		$logString .= "url -> ".$strServerURL."\r\n";
		$logString .= "param -> ".$param."\r\n";
		$logString .= "res -> soapFault!!!! \r\n".$exception;
		$logString .= "------------------------------------------------------------------\r\n";
		//error_log($logString, 3, "C:/XBets/XBetsWebSiteDev_NEW/www/appcode/tmp/send_data_".date("Ymd").".log");
		//error_log($logString, 3, "C:/XBets/XBetsWebSiteDev_NEW/www/appcode/tmp/send_data_".date("Ymd").".log");

		//로그저장**********************************************************************************************
		echo "connect fail---->".$exception;
		return "connect fail---->".$exception;
	}

}


//php soap 연동
function sendSoapData_alipay($method,$param)
{
	$CI =& get_instance();
	ini_set("soap.wsdl_cache_enabled", "0");
	try{

		## 서버 server.php 의 URL을 넘겨줌
		//$strServerURL = site_url("webservice?wsdl");
		$strServerURL = "http://aliapi.internal:7789/index.php?wsdl";
		$soapclient = new nusoap_client($strServerURL, array('cache_wsdl' => WSDL_CACHE_NONE));
		$soapclient->soap_defencoding = 'UTF-8';
		$soapclient->decode_utf8 = false;

		## 서버에서 실행할 함수호출
		//$result = $soapclient->$method($param);
		$result = $soapclient->call($method,$param);

		//로그저장**********************************************************************************************

		$logString = "시간 -> ".strftime('%Y-%m-%d %H:%M:%S')."\r\n";
		$logString .= "url -> ".$strServerURL."\r\n";
		$logString .= "method -> ".$method."\r\n";
		$logString .= "param -> ".print_r($param,true)."\r\n";
		$logString .= "res -> ".print_r($result,true)."\r\n";
		//$logString .= "res_data -> ".print_r($data_result,true)."\r\n";
		//$logString .= "response: ".	htmlspecialchars($soapclient->response, ENT_QUOTES) . "\r\n";

		$logString .= "------------------------------------------------------------------\r\n";
		//error_log($logString, 3, "C:/XBets/XBetsWebSiteDev_NEW/www/appcode/tmp/send_data_".date("Ymd").".log");
		error_log($logString, 3, "C:/temp/alipay_data_".date("Ymd").".log");

		//로그저장**********************************************************************************************



		/*if($token_check_yn == "Y"){
			//token 값 만료시 로그아웃 시킴
			if($res["status"] == "-1"){
				$CI->session->sess_destroy();
				session_start();
				session_destroy();
				messageMovePop("로그인 후 이용해 주세요.","/");
			}
		}*/

		return $result;

	}catch(SoapFault $exception){

		//로그저장**********************************************************************************************

		$logString = "시간 -> ".strftime('%Y-%m-%d %H:%M:%S')."\r\n";
		$logString .= "url -> ".$strServerURL."\r\n";
		$logString .= "param -> ".$param."\r\n";
		$logString .= "res -> soapFault!!!! \r\n".$exception;
		$logString .= "------------------------------------------------------------------\r\n";
		//error_log($logString, 3, "C:/XBets/XBetsWebSiteDev_NEW/www/appcode/tmp/send_data_".date("Ymd").".log");
		//error_log($logString, 3, "C:/XBets/XBetsWebSiteDev_NEW/www/appcode/tmp/send_data_".date("Ymd").".log");

		//로그저장**********************************************************************************************
		echo "connect fail---->".$exception;
		return "connect fail---->".$exception;
	}

}


//인젝션 제거
function ms_escape_string($data) {
	if ( !isset($data) or empty($data) ) return '';
	if ( is_numeric($data) ) return $data;
	
	$non_displayables = array(
	    '/%0[0-8bcef]/',            // url encoded 00-08, 11, 12, 14, 15
	    '/%1[0-9a-f]/',             // url encoded 16-31
	    '/[\x00-\x08]/',            // 00-08
	    '/\x0b/',                   // 11
	    '/\x0c/',                   // 12
	    '/[\x0e-\x1f]/'             // 14-31
	);
	foreach ( $non_displayables as $regex )
	    $data = preg_replace( $regex, '', $data );
	$data = str_replace("'", "''", $data );
	return $data;
}

//유효성 체크 메세지 변환
function  msgSimple($msg) {
	$msg = str_replace("\r","\\r",$msg); 
	$msg = str_replace("\n","\\n",$msg); 
	$msg = str_replace("<p>","",$msg);
	$msg = str_replace("</p>","",$msg);
	
	return $msg;
}

//주소에서 www. 제거
function UrlToChange($url){
	$url = str_replace("www.","",$url);
	$url = str_replace("www.","",$url);
	
	return $url;
}

function get_HostName($url)

{
	$value = strtolower(trim($url));


	$regExp = "/^([a-z:\/\/]*[^\/?:]*)([^$]*)/";  // 핵심은 처음나오는 / 나 ? 가 나올 경우로 추출.^^
	preg_match($regExp, $value, $result);

	$host = $result[1];
	$host = str_replace("http://www.","",$host);
	$host = str_replace("http://","",$host);
	$host = str_replace("https://www.","",$host);
	$host = str_replace("https://","",$host);

	/*if (preg_match('/^(?:(?:[a-z]+):\/\/)?((?:[a-z\d\-]{2,}\.)+[a-z]{2,})(?::\d{1,5})?(?:\/[^\?]*)?(?:\?.+)?$/i', $value))

	{

		preg_match('/([a-z\d\-]+(?:\.(?:asia|info|name|mobi|com|net|org|biz|tel|xxx|kr|co|so|me|eu|cc|or|pe|ne|re|tv|jp|tw|local)){1,2})(?::\d{1,5})?(?:\/[^\?]*)?(?:\?.+)?$/i', $value, $matches);

		$host = (!$matches[1]) ? $value : $matches[1];

	}*/

	return $host;

}


//MD5 문자열 32자리를 17~32 + 1~16 로 변환
function md5CutChange($val){
	return substr($val,-16).substr($val,0,16);
}

//---------- 암호화 관련 모듈 시작 --------------
function doEnc($data) {
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
	$secure_iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$secure_key='abcdefghijklmnop';
	
	//$encrypted_data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $$secure_key, padding16($data), MCRYPT_MODE_ECB, $secure_iv);
	$encrypted_data = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $secure_key, padding16($data), MCRYPT_MODE_ECB, $secure_iv);
	return bin2hex($encrypted_data);
}
function tohex2bin($h)
{
	if (!is_string($h)) return null;
	$r='';
	for ($a=0; $a<strlen($h); $a+=2) { $r.=chr(hexdec($h{$a}.$h{($a+1)})); }
	return $r;
}

function doDec($data){
	$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_ECB);
	$secure_iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	$secure_key='abcdefghijklmnop';

	//암호화 된 데이터 일때
	if(strlen($data) > 16){
		$data = tohex2bin($data);
		$desc_data = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $secure_key, $data,MCRYPT_MODE_ECB, $secure_iv);
		return trim($desc_data);
	}else{ //암호화 되지 않은 데이터 일때
		return $data;
	}
}

function padding16($sVal) {
	$nCount = 16 - (strlen($sVal)% 16);
	for ($i=0;$i<$nCount;$i++) {
		$sVal .= ' ';
	}
	return $sVal;
}
//---------- 암호화 관련 모듈 종료 --------------

function nRound($m,$size,$rd) { 
    return $rd?round($m,-log10($size*10)):floor($m/$size/10)*$size*10; 
}

function telstr($telnum){
#전화번호 자르기~
	$len = strlen($telnum);

	if($len == 11){
		$tel = substr($telnum,0,3)."-".substr($telnum,3,4)."-".substr($telnum,7,4);
	} else {
		$tel = substr($telnum,0,3)."-".substr($telnum,3,3)."-".substr($telnum,6,4);
	}
	return $tel;
	
}

//계좌 번호 * 처리(뒤에서 6자리에서 2자리까지 총 4자)
function acctChangeStar($val){
	$val_m = "****";
	$val_f = substr($val,0,strlen($val)-6);
    $val_l = substr($val,-2);
    
    $val = $val_f.$val_m.$val_l;
    
    return $val;
}

function secure($x) {
        $x = addslashes(strip_tags($x));
        return $x;
}

function eval_tags($comment){

        $tags = "</>'";
        $tmp_message = $comment;
        $message_array = str_split($tmp_message);
        $message = null;
        $verif_mess = false;

        for($x=0;$x <= strlen($tmp_message)-1 ;$x++) {
                $eval_mess = strspn($message_array[$x],$tags);

                if($eval_mess == 1){
                        $verif_mess = true;
                        $message= '';
                        break;
                }
        }

        if($verif_mess != true){
                $message = $tmp_message;
        }

        return $message;
}

//핸드폰 번호 * 처리(뒤에서 6자리에서 2자리까지 총 4자)
function hpChangeStar($val){
	$val_m = "****";
	$val_f = substr($val,0,strlen($val)-6);
    $val_l = substr($val,-2);
    
    $val = $val_f.$val_m.$val_l;
    
    return $val;
}

function strcut_utf8($str, $size)
{
	$substr = substr($str, 0, $size*2);
  	$multi_size = preg_match_all('/[\x80-\xff]/', $substr, $multi_chars);
    if($multi_size >0)
   		$size = $size + intval($multi_size/3)-1;

        if(strlen($str)>$size){
                $str = substr($str, 0, $size);
                $str = preg_replace('/(([\x80-\xff]{3})*?)([\x80-\xff]{0,2})$/', '$1', $str);
                $str .= '...';
        }

   	return $str;
}

//전화번호 이미지 표시
function tel_image_echo($tel, $telImageUrl, $hipenImageUrl){
	$str = "";
	
	for ($i=0;$i<strlen($tel);$i++) {
		$tel_str = substr($tel,$i,1);
		if($tel_str == "-"){
			$tel_img = $hipenImageUrl;
		}else{
			$tel_img = sprintf($telImageUrl, $tel_str);
		}
		$str .= "<img src='".$tel_img."'>";
	}
	
	return $str;
}


//Null 값을 '' 으로 변환
function nullToEmpty($str){
	if($str === null){
		return "";
	}else{
		return $str;
	}
}


function paging_design($link, $page, $totalpage, $paging,$swhere) {

	//페이지 네비게이션에 보여질 페이지 개수
	if ( !$paging ) $paging = 10;

	//시작 페이지 번호 설정
	if ( $page % $paging == 0 ) {
		$startpage = $page - ( $paging - 1 );
	} else {
		$startpage = intval( $page / $paging ) * $paging + 1;
	}

	// 이전 페이지 설정
	$prevpage = $startpage - 1;

	// 다음 페이지 설정
	$nextpage = $startpage + $paging;

	//마지막 페이징 번호 설정
	if ( $totalpage / $paging > 1 ) {
		$laststartpage = (intval($totalpage / $paging) * $paging ) + 1;
	} else {
		$laststartpage = 1;
	}

	$rt = "<table border='0' cellpadding='0' cellspacing='0' width='250' height='20'>";
	$rt .= "<tr>";
	$rt .= "<tr>";


	//첫 페이지로 돌아가기 버튼
	// 	if ( $page > $paging ) {
	// 		$rt .= "<a href='$link?page=1".$swhere."'>";
	// 		$rt .= "[첫 페이지]</a>";
	// 	} else {
	// 		$rt .= "[첫 페이지]";
	// 	}

	//	$rt .= " ";

	// 이전 페이지로 돌아가기 버튼
	if ( $totalpage > $paging && $page > $paging ) {
		$rt .= "<td width='42'><a href='$link?page=".$prevpage.$swhere."'>";
		$rt .= "이전</a></td>";
	} else {
		$rt .= "<td width='42'><a href='#'><img src='/asset/image/btn_prev.png' width='49' height='14' /></a></td>";
	}

	$rt .= " <td width='178'>";
	$rt .= "<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr><td align='center' class='btext'>";

	if ( $totalpage <= 1 ) {
		$rt .= "<a href='#'>1</a>";
	} else {

		// 페이지 링크 번호 나열
		for ( $i = $startpage ; $i <= ($startpage + ($paging - 1) ) ; $i++ ) {
			if ( $page != $i ) {
				$rt .= "<a href='$link?page=".$i.$swhere."'>".$i."</a>";
			} else {
				$rt .= "<a href='#'>".$i."</a>";
			}
			if ( $i >= $totalpage ) {
				break;
			}
		}
	}

	$rt .= "</td></tr>";
	$rt .= "</table>";
	$rt .= "</td>";

	// 다음 페이지로 넘어가기 버튼
	if ( $startpage + $paging - 1 < $totalpage) {
		$rt .= "<td width='45' align='right'><a href='$link?page=".$nextpage.$swhere."'>";
		$rt .= "<img src='/asset/image/btn_next.png' alt='' width='49' height='14' /></a></td>";
	} else {
		$rt .= "<td width='45' align='right'><a href='#'><img src='/asset/image/btn_next.png' alt='' width='49' height='14' /></a></td>";
	}

	//	$rt .= " ";
	// 마지막 페이지로 이동 버튼
	// 	if ( $page < intval($laststartpage) ) {
	// 		$rt .= "<a href='$link?page=".$totalpage.$swhere."'>";
	// 		$rt .= "[마지막 페이지]</a>";
	// 	} else {
	// 		$rt .= "[마지막 페이지]";
	// 	}

	$rt .= "</tr></table>";
	return $rt;
}

function pagingtxt($link, $page, $totalpage, $paging,$swhere) {

    //페이지 네비게이션에 보여질 페이지 개수
    if ( !$paging ) $paging = 10;

 

    //시작 페이지 번호 설정
    if ( $page % $paging == 0 ) {
        $startpage = $page - ( $paging - 1 );
    } else {
        $startpage = intval( $page / $paging ) * $paging + 1;
    }

    // 이전 페이지 설정
    $prevpage = $startpage - 1;
    // 다음 페이지 설정
    $nextpage = $startpage + $paging;

    //마지막 페이징 번호 설정
    if ( $totalpage / $paging > 1 ) {
        $laststartpage = (intval($totalpage / $paging) * $paging ) + 1;
    } else {
        $laststartpage = 1;
    }

 

    $rt = "";

    //첫 페이지로 돌아가기 버튼
    if ( $page > $paging ) {
        $rt .= "<a href='$link?page=1".$swhere."'>";        
        $rt .= "[첫 페이지]</a>";
    } else {
        $rt .= "[첫 페이지]";
    }

    $rt .= " ";

    // 이전 페이지로 돌아가기 버튼
    if ( $totalpage > $paging && $page > $paging ) {
        $rt .= "<a href='$link?page=".$prevpage.$swhere."'>";
        $rt .= "[이전 ".$paging."개]</a>";
    } else {
        $rt .= "[이전 ".$paging."개]";
    }

    $rt .= " ";

    if ( $totalpage <= 1 ) {
        $rt .= "<font class='p2'><b>1</b></font>&nbsp;&nbsp;";
    } else {

        // 페이지 링크 번호 나열
        for ( $i = $startpage ; $i <= ($startpage + ($paging - 1) ) ; $i++ ) {
            if ( $page != $i ) {
                $rt .= "<a href='$link?page=".$i.$swhere."'>[".$i."]</a>&nbsp;&nbsp;";
                
            } else {
                $rt .= "<b>".$i."</b>&nbsp;&nbsp;";
            }

            if ( $i >= $totalpage ) {
                break;
            }
        }
    }

    $rt .= " ";

    // 다음 페이지로 넘어가기 버튼
    if ( $startpage + $paging - 1 < $totalpage) {
        $rt .= "<a href='$link?page=".$nextpage.$swhere."'>";
        $rt .= "[다음 ".$paging."개]</a>";
    } else {
        $rt .= "[다음 ".$paging."개]";
    }

    $rt .= " ";

    // 마지막 페이지로 이동 버튼
    if ( $page < intval($laststartpage) ) {
        $rt .= "<a href='$link?page=".$totalpage.$swhere."'>";
        $rt .= "[마지막 페이지]</a>";
    } else {
        $rt .= "[마지막 페이지]";
    }

    $rt .= "";

 

    return $rt;
}

//실패 에러 로그를 남긴다.
function errorLogFail($title){
	$CI =& get_instance();
	
	$str = '시간 => '.strftime('%Y-%m-%d %H:%M:%S')."\r\n";
	$str .= '에러 내용 -> '.$title."\r\n";
	$str .= '토큰 -> '.$CI->session->userdata('TOKEN').' 아이디 -> '.$CI->session->userdata('MEM_LID').' 도메인 -> '.$_SERVER['HTTP_HOST'].' 파일명 -> '.$_SERVER['REQUEST_URI']."\r\n";
	$str .= '--------------------------------------------------------'."\r\n";
	
	error_log($str, 3, '/tmp/error_log_fail.log');
}

//에러 로그를 남긴다.
function errorLog($message, $message_type, $log_path){
	$CI =& get_instance();
	
	$str1 = '시간 => '.strftime('%Y-%m-%d %H:%M:%S')."\r\n";
	$str2 = '토큰 -> '.$CI->session->userdata('TOKEN').' 아이디 -> '.$CI->session->userdata('MEM_LID').' 도메인 -> '.$_SERVER['HTTP_HOST'].' 파일명 -> '.$_SERVER['REQUEST_URI']."\r\n";
	$str2 .= '--------------------------------------------------------'."\r\n";
	
	error_log($str1.$message.$str2, $message_type, $log_path);
}



//로그
function apiLog($strServerURL, $param, $result){
	$CI =& get_instance();

	$logString = "time -> ".strftime('%Y-%m-%d %H:%M:%S')."\r\n";
	$logString .= "url -> ".$strServerURL."\r\n";
	$logString .= "param -> ".$param."\r\n";
	$logString .= "res -> ".$result."\r\n";
	$logString .= "------------------------------------------------------------------\r\n";

	error_log($logString, 3, "C:/temp/send_data_".date("Ymd").".log");

}

function  errMessageMove($result,$url="") {

	$code = explode("|",$result);
	if(count($code)>1){
		$msg = $code[1];
		if($code[0]>0){
			//$url = "";
		}else{
				$url = "/member/logout";
		}
	}else{
		$msg = $result;
	}
	if($url == "") {
		message($msg);
	}else{
		messageMove($msg, $url);
		exit;
	}
}

function  errMessageArray($result) {

	$code = explode("|",$result);
	if(count($code)==0){
		$code[0] = "";
		$code[1] = "";
	}
	return $code;
}


?>