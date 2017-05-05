<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Xbets_model');	//공통모델
		date_default_timezone_set('Asia/Seoul');
		siteSess();
	
	}
	
	
	public function index()
	{
		$login = $this->input->get('login');
		
		$setup_result = $this->Xbets_model->setup();

		if($setup_result["status"] != "OK"){
			messageMove($setup_result["status"], "http://#");
		}

		if(!isLogin()) {
			moveReplace("/member/clogin");
		}

		$data["showLogin"] = "no";
		if ($login == "yes")
		{
			$data["showLogin"] = "yes";
		}

		$this->load->view('/include/top');
		$this->load->view('main',$data);
		$this->load->view('/include/footer');
		
	}


	public function client()

	{


		$method = "Setup";
		$domain = "aaaa.com";
		$server_ipaddress = "localhost:100";
		$customer_ipaddress = $_SERVER["REMOTE_ADDR"];
		$param = array("domain"=>$domain,"server_ipaddress"=>$server_ipaddress,"customer_ipaddress"=>$customer_ipaddress);

		$setup_result = sendSoapData_new($method, $param);

		echo $setup_result["status"];
		//var_dump($response);

	}


	public function paysec()
	{
		$mid = secure($_REQUEST['mid']);
		$oid = secure($_REQUEST['oid']);	
		$cur = secure($_REQUEST['cur']);
		$amt = secure($_REQUEST['amt']);
		$status = secure($_REQUEST['status']);
		$cartid = secure($_REQUEST['cartid']);
		$signature = secure($_REQUEST['signature']);
		//$EPKey = secure($_REQUEST['EPKey']);
		
		$param = array(
			"mid" => $mid,
			"oid" => $oid,
			"cur" => $cur,
			"amt" => $amt,
			"status" => $status,
			"cartid" => $cartid,
			"signature" => $signature,
			//"EPKey" => $EPKey
		);

		$msg = http_build_query($param);
error_log($msg."\n", 3, "C:/Temp/paysec_".date("Ymd").".log");
		
		$method = "PaySecResponse";
		$result = sendSoapData_new($method, $param);
		
		echo "OK";
	}

	public function paysecResponse()
	{
		//$mid = secure($_REQUEST['mid']);
		//$oid = secure($_REQUEST['oid']);	
		//$cur = secure($_REQUEST['cur']);
		//$amt = secure($_REQUEST['amt']);
		//$status = secure($_REQUEST['status']);
		$cartid = secure($_REQUEST['cartid']);
		//$signature = secure($_REQUEST['signature']);
		//$EPKey = secure($_REQUEST['EPKey']);
		
		$param = array(
			//"mid" => $mid,
			//"oid" => $oid,
			//"cur" => $cur,
			//"amt" => $amt,
			//"status" => $status,
			"cartid" => $cartid,
			//"signature" => $signature,
			//"EPKey" => $EPKey
		);
		$msg = "PaySecResponse url ".http_build_query($param);
		error_log($msg."\n", 3, "C:/Temp/paysec_".date("Ymd").".log");

		$method = "PaySecResponseRedirectURL";
		$result = sendSoapData_new($method, $param);
		
		if ($result["status"] == "OK")
		{
			$url = $result["url"];
			echo "<script type='text/javascript'> window.location = '$url'; </script>";
			exit();
		}
		else
		{
			echo "<script type='text/javascript'> window.location = '#'; </script>";
			exit();
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */