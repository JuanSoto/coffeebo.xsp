<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct(){
		parent::__construct();
		//adiminCheckLogin();
		$this->load->model('Xbets_model');	//공통모델

	}

	 public function messages()
 {
  		checkLogin();
  		$result = $this->Xbets_model->messages("N");
  		$html = "";
  		if ($result['status'] == "OK"){
   			$nmessages = count($result["messages"]);
			if ( $nmessages > 0 )
			{
				$html = "<a href='#lnk'  >Messages &reg;".$nmessages."</a>";
			}
   			//$result["messages"][0]["message"]
  		}else{
  			$html =  $result["status"] . "Error";
  		}
  		//
  		echo $html;
 }

 public function readMessage(){

 		$read_result = $this->Xbets_model->marksAsRead();


		if ($read_result['status'] == "OK"){

			//messageMovePop('The messages marked has been read','/');
            echo $read_result["title"]."<br>".$read_result["message"];

		}else{
            echo "error";
		}


 }

 public function messageLayer()
	{
		checkLogin();
		$result = $this->Xbets_model->messages("ALL");
		

		if ($result['status'] == "OK"){
   			$nmessages = count($result["messages"]);
   			$data["datas"] = $result["messages"];
  		}else{

  			$data["datas"] = "Error";
  		}
		
		error_log(json_encode($data),3,"C:/temp/ErrorMessage.log");
		$this->load->view('messages_layer',$data);

	}

	public function infoBalance(){

		$balance_result = $this->Xbets_model->balanceWalletInfo();

		if($balance_result["status"]=="OK"){
			$balance = $balance_result["balance"];
			$balance = $balance;
		}else{
			$balance = "error";
		}
		echo $balance;
	}

	public function login()
	{

		$this->load->view('/include/top');
		$this->load->view('login');
		$this->load->view('/include/copy');
	}

	//로그인
	public function clogin()
	{
		$this->load->view('login');

	}


	//로그인
	public function loginLayer()
	{

		$this->load->view('login_layer');

	}


	//로그인처리
	public function login_proc()
	{

		$ret_url	= secure($this->input->post('ret_url'));          #이전주소
		$customerID		= secure($this->input->post('customerID'));          #아이디

		$login_result = $this->Xbets_model->loginProc();

		if($login_result["status"] == "OK"){

				$domain = get_HostName(base_url());
				$forwardDomainURL = $login_result["forwardDomainURL"];

				//회원 등급의 포워드도메인이 있을경우
				if($forwardDomainURL != "" && $domain != $forwardDomainURL){
					messageMovePop("your domain forwad^^", "http://".$forwardDomainURL);
				}

				$this->session->set_userdata('MEM_LID', $customerID); //세션
				$this->session->set_userdata('customerID', $login_result["customerID"]); //세션
				$this->session->set_userdata('loginSessionID', $login_result["loginSessionID"]); //세션
				$this->session->set_userdata('frdFlag', $login_result["frdFlag"]); //세션
				$this->session->set_userdata('levelName', $login_result["levelName"]); //세션
				$this->session->set_userdata('GameCompanyVisible', $login_result["GameCompanyVisible"]); //세션

				if($ret_url == ""){
					$ret_url = "/";
				}
			echo $ret_url;
				//messageMovePop('login ok.',$ret_url);
				ParentMove($ret_url);

			 
		}else{
			errMessageMove($login_result['status']);
			//messageMove($login_result['status'],"/");
		}
	
	}
	

	public function logout()
	{
		$this->session->sess_destroy();	
		session_start();
		session_destroy();	
		redirect('/');
	}
	

	//회원가입 폼
	public function join()
	{


		$data["frID"] = "";
		$data["frdLoginDomain"] = "";
		$data["referedBy"] = "";
		//$this->load->view('/include/top');
		$this->load->view('register',$data);
		//$this->load->view('/include/copy');
	}
	
	//일반회원가입
	public function join_proc()
	{


		$join_result = $this->Xbets_model->joinProc();


		if ($join_result['status'] == "OK"){

			messageMovePop('You have successfully been registered, please login','/');

		}else{
			errMessageMove($join_result['status']);
		}


	}


	public function join_ok()
	{

		checkLogin();

		$this->load->view('/include/top');
		$this->load->view('join_ok');
		$this->load->view('/include/copy');
	}


	public function info()
	{
		checkLogin();

		$info_result = $this->Xbets_model->customerInfo();

		if ($info_result['status'] == "OK"){

			$data["info_result"] = $info_result;

		}else{
			errMessageMove($info_result['status']);
		}


		$this->load->view('/include/top');
		$this->load->view('info',$data);
		$this->load->view('/include/copy');
	}


	//정보수정처리

	public function info_proc()
	{

		checkLogin();

		$join_result = $this->Xbets_model->customerInfoProc();


		if ($join_result['status'] == "OK"){

			messageMovePop('Member update ok.',"/member/info");

		}else{
			errMessageMove($join_result['status']);
		}


	}
       
	//계좌정보
	public function account()
	{
		checkLogin();

		$info_result = $this->Xbets_model->customerInfo();

		if ($info_result['status'] == "OK"){

			$data["info_result"] = $info_result;

			$bankList = $this->Xbets_model->bankList();
			$data["bankList"] = $bankList["banks"];

		}else{
			errMessageMove($info_result['status']);
		}





		$this->load->view('/include/top');
		$this->load->view('my_bank_info',$data);
		$this->load->view('/include/copy');
	}


	public function account_proc()
	{

		checkLogin();

		$info_result = $this->Xbets_model->bankInfoProc();


		if ($info_result['status'] == "OK"){

			messageMovePop('update ok.',"/member/account");

		}else{
			errMessageMove($info_result['status']);
		}


	}


	public function frdRegist()
	{
		$this->load->view('frdRegist');
	}

	public function frd_proc()
	{
		checkLogin();
		$frd_result = $this->Xbets_model->frdProc();

		if ($frd_result['status'] == "OK"){

			$result_type = '{"result_type": "ok","field1": "", "detail": ""}';

		}else{
			$result_type = '{"result_type": "NO","field1": "", "detail": "'.$frd_result['status'].'"}';
		}
		echo $result_type;
	}


	//친구추천 인증코드
	public function frdAuth()
	{
		$this->load->view('auth');

	}

	public function frdAuthProc(){

		$result = $this->Xbets_model->friendAuthProc();

		if ($result['status'] == "OK"){

			//$result_type = '{"result_type": "ok","frID": "'.$result["frID"].'", "customerID": "'.$result["customerID"].'"}';

			$data["frID"] = $result["frID"];
			$data["referedBy"] = $result["customerID"];
			//$data["frdLoginDomain"] = $result["frdLoginDomain"];
			$this->load->view('register',$data);

		}else{
			//$result_type = '{"result_type": "NO","field1": "", "detail": "'.$result['status'].'"}';
			echo "no";
		}
	}


	public function coupon()
	{
		checkLogin();

		$coupon_result = $this->Xbets_model->couponList();

		if ($coupon_result['status'] == "OK"){

			$data["coupon_result"] = $coupon_result["coupons"];

		}else{
			errMessageMove($coupon_result['status']);
		}
//var_dump($coupon_result);

		$this->load->view('/include/top');
		$this->load->view('coupon',$data);
		$this->load->view('/include/copy');
	}


	public function coupon_proc()
	{
		checkLogin();
		$couponCode = secure($this->input->get("couponCode"));

		$coupon_result = $this->Xbets_model->couponProc($couponCode);

		if ($coupon_result['status'] == "OK"){

			$result_type = '{"result_type": "ok","field1": "", "detail": ""}';

		}else{
			$result_type = '{"result_type": "NO","field1": "", "detail": "'.$coupon_result['status'].'"}';
		}
		echo $result_type;
	}

	public function PaySec()
	{
		checkLogin();
		$data["country"] = "CN";
		$this->load->view('/include/top');
		$this->load->view('paysec',$data);
		$this->load->view('/include/copy');
	}
        
        
        //----------------------------------------------------------------------
        //KROMERO: customer limits functions
        public function accountLimits()	{
            checkLogin();               
            $info_result = $this->Xbets_model->getCustomerLimits();                   
            if ($info_result['status'] == "OK"){
                $data["dailyLimit"] = $info_result['dailyLimit'];
            }else{
                $data["dailyLimit"] = $info_result['dailyLimit'];
                errMessageMove($info_result['status']);
            }                           
            $this->load->view('/include/top');
            $this->load->view('my_limits_info',$data);
            $this->load->view('/include/copy');
	}        
        public function accountLimits_proc(){
            checkLogin();
            $dailyLimit = $this->input->post('dailyLimit');
            $info_result = $this->Xbets_model->changeCustomerLimits($dailyLimit);              
            if ($info_result['status'] == "OK"){
                errMessageMove($info_result['message']);
            }else{
                errMessageMove($info_result['status']);
            }
         }
        //----------------------------------------------------------------------


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
