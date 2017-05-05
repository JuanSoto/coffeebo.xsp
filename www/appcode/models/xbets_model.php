<?php
class Xbets_model extends CI_Model
{
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    	

    function setup()
    {
		$method = "Setup";
		$param = array(
			'domain' => get_HostName(base_url()),
			'server_ipaddress' => APIURL,
			'customer_ipaddress' => $this->input->server('REMOTE_ADDR')
		);
		
		$result = sendSoapData_new($method, $param);

		return $result;
    }

	function withdrawTopList($topLimit,$selectType)
	{
		$method = "WithdrawTopList";
		$param = array(
			'domain' => get_HostName(base_url()),
			"topLimit" => $topLimit,
            "selectType" => $selectType
		);
		$result = sendSoapData_new($method, $param);
		return $result;
	}


	function boardList($messageType,$page,$topLimit)
	{
		$method = "BoardList";

		$param = array(
			'domain' => get_HostName(base_url()),
			"messageType"=>$messageType,
			"page"=>$page,
			"viewCnt" => "10",
			"topLimt" => $topLimit
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function boardDetail($boardID,$page="1")
	{
		$method = "BoardDetail";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"boardID"=>$boardID,
			"page"=>$page
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function customerServicePhoneNumber()
	{

		$method = "CustomerServicePhoneNumber";

		$param = array(
			'domain' => get_HostName(base_url())
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function loginProc()
	{

		$customerID		= secure($this->input->post('customerID'));
		$password		= secure($this->input->post('userpw'));

		$method = "Login";

		$param = array(
			'domain' => get_HostName(base_url()),
			'isMobile' => isMobile()?"Y":"N", //$isMobile,
			"login"=>$customerID,
			"password"=>$password,
            "ipaddress"=>getIPaddress()
		);

		$result = sendSoapData_new($method, $param);

		return $result;
	}


	function marksAsRead(){

        $messageID = secure($this->input->get('messageID'));

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"messageID" => $messageID
		);


		$method = "ReadMessages";

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function customerIDCheck()
	{

		$customerID		= secure($this->input->GET('customerID'));
		$method = "CustomerIDCheck";

		$param = array(
			'domain' => get_HostName(base_url()),
			"login"=> $customerID
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}



	function joinProc()
	{

		$login		= secure($this->input->post('customerID'));
		$password		= secure($this->input->post('userpw')); 
		$first_name		= secure($this->input->post('first_name'));
		$phonenumber	= secure($this->input->post('phonenumber'));
		$referedBy		= secure($this->input->post('referedBy'));
		$frID			= secure($this->input->post('frID'));

		$sex			= secure($this->input->post('sex'));
		$birth_year		= secure($this->input->post('birth_year'));
		$birth_month	= secure($this->input->post('birth_month'));
		$birth_day		= secure($this->input->post('birth_day'));
		if($birth_year != "" && $birth_month != "" && $birth_day != ""){
			$birthdate = $birth_year."-".$birth_month."-".$birth_day;
		}else{
			$birthdate = "";
		}
		$email			= secure($this->input->post('email'));
		$qqms			= secure($this->input->post('qqms'));

		$offers_me		= secure($this->input->post('demoOferts'));

		$method = "Register";

		$param = array(
			'domain' => get_HostName(base_url()),
			"login"=>$login,
			"password"=>$password,
			"first_name"=>$first_name,
			'last_name'=> '',
			'country'=> '',
			'address'=> '',
			"phonenumber"=>$phonenumber,
			"referedBy"=>$referedBy,
			"registIp"=>$this->input->server('REMOTE_ADDR'),
			"frID"=>$frID,
			"sex"=>$sex,
			"birthdate"=>$birthdate,
			"email"=>$email,
			"qqms"=>$qqms,
			"offers_me" => $offers_me
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function loginMsg()
	{
		$method = "LoginMsg";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}




	function customerInfo()
	{
		$method = "CustomerInfo";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}



	function customerInfoProc()
	{

		$password		= secure($this->input->post('userpw'));
		$first_name		= secure($this->input->post('first_name'));
		$phonenumber	= secure($this->input->post('phonenumber'));
		$offers_me		= secure($this->input->post('demoOferts'));

		$method = "UpdateCustomer";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"password"=>$password,
			"first_name"=>$first_name,
			'last_name'=> '',
			'email'=> '',
			'country'=> '',
			'address'=> '',
			"phonenumber"=>$phonenumber,
			"offers_me"=>$offers_me
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function customerBasicProc()
	{

		$sex			= secure($this->input->post('sex'));
		$birth_year		= secure($this->input->post('birth_year'));
		$birth_month	= secure($this->input->post('birth_month'));
		$birth_day		= secure($this->input->post('birth_day'));
		if($birth_year != "" && $birth_month != "" && $birth_day != ""){
			$birthdate = $birth_year."-".$birth_month."-".$birth_day;
		}else{
			$birthdate = "";
		}
		$email			= secure($this->input->post('email'));
		$qqms			= secure($this->input->post('qqms'));

		$method = "ChangeBasic";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"sex"=>$sex,
			"birthdate"=>$birthdate,
			"email"=>$email,
			"qqms"=>$qqms
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function customerPwProc()
	{
		$old_password		= secure($this->input->post('old_userpw'));
		$password			= secure($this->input->post('userpw'));

		$method = "ChangePassword";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"old_password"=>$old_password,
			"password"=>$password
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function customerPhoneProc()
	{
		$old_phonenumber		= secure($this->input->post('old_phonenumber'));
		$phonenumber			= secure($this->input->post('phonenumber'));

		$method = "ChangePhoneNumber";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"old_phonenumber"=>$old_phonenumber,
			"phonenumber"=>$phonenumber
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function bankInfoProc()
	{
		$bankName		= secure($this->input->post('bankName'));
		$accountOwner	= secure($this->input->post('accountOwner'));
		$accountNumber	= secure($this->input->post('accountNumber'));

		$bankType	= secure($this->input->post('bankType'));
		$area	= secure($this->input->post('area'));
		$city	= secure($this->input->post('city'));
		$bankbranch	= secure($this->input->post('bankbranch'));
		$bankcode	= secure($this->input->post('bankcode'));
		
		if ( strlen($bankcode) > 0 && $bankcode != "0" )
		{
			$bankName = secure($this->input->post('banknamebycode'));
		}
			

		$method = "UpdateBankInfo";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"bankName"=>$bankName,
			"accountOwner"=>$accountOwner,
			"accountNumber"=>$accountNumber,
			"bankType"=>$bankType,
			"area"=>$area,
			"city"=>$city,
			"bankbranch"=>$bankbranch,
			"bankcode" => $bankcode
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function bankCheck($bankName,$checkType)
	{
		$method = "BankCheck";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"bankName"=>$bankName,
			"checkType"=>$checkType
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}




	function depositBankInfo()
	{

		$method = "DepositBankInfo";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function depositProc()
	{

		$bankName		= secure($this->input->post('bankName'));
		$accountNumber	= secure($this->input->post('accountNumber'));
		$accountOwner	= secure($this->input->post('accountOwner'));
		$amount			= secure($this->input->post('amount'));
		$depositor		= secure($this->input->post('depositor'));
		$reference		= secure($this->input->post('reference'));
		$applypromotion	= secure($this->input->post('applypromotion'));

		$method = "Deposit";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"bankName"=>$bankName,
			"accountOwner"=>$accountOwner,
			"accountNumber"=>$accountNumber,
			"depositor"=>$depositor,
			"reference"=>$reference,
			"amount"=>$amount,
			'customer_ipaddress' => $this->input->server('REMOTE_ADDR'),
			"applypromotion" => 'Y'  //$applypromotion
		);
		$result = sendSoapData_new($method, $param);

		return $result;

	}



	function withdrawProc()
	{

		$amount			= secure($this->input->post('amount'));
		$reference		= secure($this->input->post('reference'));

		$method = "Withdraw";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"amount"=>$amount,
			"reference"=>$reference,
			'customer_ipaddress' => $this->input->server('REMOTE_ADDR')
		);
		$result = sendSoapData_new($method, $param);

		return $result;

	}



	function balanceWalletInfo()
	{

		$method = "Balance";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameID"=> 'wallet' //'WALLET'
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function balanceGameInfo($gameID)
	{

		$method = "Balance";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameID"=>$gameID
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function balanceInfo()
	{

		$method = "Balance";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameID"=> 'wallet' //'WALLET'
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function gameList()
	{

		$method = "GameList";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function gameMoveProc()
	{

		$gameTransactionType			= secure($this->input->post('gameTransactionType'));
		$gameID			= secure($this->input->post('gameID'));

		$amount			= secure($this->input->post('amount'));
		$reference		= secure($this->input->post('reference'));

		$method = "GameTransaction";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"transactionType"=>$gameTransactionType,
			"gameID"=>$gameID,
			"reference"=>$reference,
			"amount"=>$amount
		);
		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function gameMoveToGameProc()
	{

		$gameFrom = secure($this->input->post('gameFrom'));
		$gameTo = secure($this->input->post('gameTo'));
		$amount = secure($this->input->post('amount'));

		$method = "GameToGameTransaction";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameFrom"=>$gameFrom,
			"gameTo"=>$gameTo,
			"amount"=>$amount
		);
		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function gameSlotStart()
	{

		$gameID		= secure($this->input->get('gameID'));
		$slot		= secure($this->input->get('slot'));

		$method = "GameURL";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameID"=>$gameID,
			"slot"=>$slot
		);

		$result = sendSoapData_new($method, $param);

		if ( $gameID == "SBTECH" )
		{
			$result = $this->SBTechPatch($result);
		}

		return $result;

	}

	function token($gameID)
	{
		$method = "Token";
		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameID"=>$gameID
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function bankList()
	{

		$method = "Banks";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function depositHistory()
	{

		$method = "DepositHistory";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function withdrawHistory()
	{

		$method = "WithdrawHistory";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function gameDepositHistory()
	{

		$method = "GameDepositHistory";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function gameWithdrawHistory()
	{

		$method = "GameWithdrawHistory";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function customerEvents()
	{

		$method = "CustomerEvents";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function customerRateInfo()
	{

		$method = "CustomerRateInfo";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function couponList()
	{

		$method = "CouponList";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


	function couponProc($couponCode)
	{

		$method = "Coupon";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"couponCode"=>$couponCode
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function frdProc()
	{

		$myPhone1		= secure($this->input->post('myPhone1'));
		$myPhone2		= secure($this->input->post('myPhone2'));
		$myPhone3		= secure($this->input->post('myPhone3'));
		$myPhone	= $myPhone1.$myPhone2.$myPhone3;
		$frdPhone1		= secure($this->input->post('frdPhone1'));
		$frdPhone2		= secure($this->input->post('frdPhone2'));
		$frdPhone3		= secure($this->input->post('frdPhone3'));
		$frdPhone	= $frdPhone1.$frdPhone2.$frdPhone3;
		
		$myPhone = secure($this->input->post("myPhone"));
		$frdPhone = secure($this->input->post("frdPhone"));

		$method = "Friend";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"myPhone"=>$myPhone,
			"frdPhone"=>$frdPhone
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function friendAuthProc()
	{

		$authCode		= secure($this->input->post('authCode'));
		$method = "FriendAuth";

		$param = array(
				'domain' => get_HostName(base_url()),
				"authCode"=>$authCode
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}



	function crmProc($type)
	{

		$message		= secure($this->input->post('message'));

		$method = "CrmRegist";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"type"=>$type,
			"message"=>$message
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function partnerProc($type)
	{
		$pname			= secure($this->input->post('pname'));
		$pphone			= secure($this->input->post('pphone'));
		$pemail			= secure($this->input->post('pemail'));
		$pmarketing			= secure($this->input->post('pmarketing'));
		$pqqms			= secure($this->input->post('pqqms'));
		$message		= secure($this->input->post('message'));

		$message = "
		이름 : ".$pname."
		전화번호 : ".$pphone." 
		이메일 : ".$pemail."
		홍보유형 : ".$pmarketing."
		큐큐 :  ".$pqqms."
		".$message;

		$method = "CrmRegist";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"type"=>$type,
			"message"=>$message
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}


    function PaymentChinaRequest()
    {
        $amount = secure($this->input->post('amount'));
        $paymentType = secure($this->input->post('depositType'));
        $method = "PaymentChinaRequest";
        $depositor		= secure($this->input->post('depositor'));          #
        $reference		= secure($this->input->post('reference'));          #
		$applypromotion	= secure($this->input->post('applypromotion'));          #

        $param = array(
        	'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
            "amount"=>$amount,
            "paymentType"=>$paymentType,
            "depositor"=>$depositor,
            "reference"=>$reference,
            'customer_ipaddress' => $this->input->server('REMOTE_ADDR'),
			'applypromotion' => $applypromotion
        );

        $result = sendSoapData_new($method, $param);

        return $result;
    }

	function PaySec()
	{
		$amount = secure($this->input->post('v_amount'));
		$firstname = secure($this->input->post('v_firstname'));
		$lastname = secure($this->input->post('v_lastname'));
		$email = secure($this->input->post('v_email'));
		$street = secure($this->input->post('v_street'));
		$province = secure($this->input->post('v_province'));
		$city = secure($this->input->post('v_city'));
		$country = secure($this->input->post('v_country'));
		$phone = secure($this->input->post('v_phonenumber'));
		$applypromotion = secure($this->input->post('applypromotion'));
		
		$method = "PaySec";
		
		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID" => $this->session->userdata("loginSessionID"),
			"customerID"=>$this->session->userdata('customerID'),
			"amount"=>$amount,
			"firstname"=>$firstname,
			"lastname"=>$lastname,
			"email"=>$email,
			"street"=>$street,
			"province"=>$province,
			"city"=>$city,
			"country"=>$country,
			"phone"=>$phone,
			"applypromotion"=>$applypromotion
		);
		
		$result = sendSoapData_new($method, $param);
		
		return $result;
	}

	function promotions()
	{
		$method = "Promotions";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID')
		);

		$result = sendSoapData_new($method, $param);

		return $result;
	}
	
	function sbtech_link()
	{
		$slot		= secure($this->input->get('slot'));
		$link		= secure($this->input->get('link'));

		$method = "GameURL";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID"=>$this->session->userdata('loginSessionID'),
			"customerID"=>$this->session->userdata('customerID'),
			"gameID"=>"SBTECH",
			"slot"=>$slot
		);

		$result = sendSoapData_new($method, $param);

		if ( $result["status"] == "OK" )
		{
			if ( $link == "betslip")
			{
				$result["gameURL"] = $result["gameURL"]."#bet_slip";
			}
			else
			{				
				$result["gameURL"] = str_replace("?",$link."/?",$result["gameURL"]);
			}
		}

		return $result;
	}

	function HabaneroGames()
	{

		$method = "HabaneroGames";

		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID" => $this->session->userdata("loginSessionID"),
			"customerID"=>$this->session->userdata('customerID'),
		);

		$result = sendSoapData_new($method, $param);

		return $result;

	}

	function PaySecPayoutInfo()
	{
		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID" => $this->session->userdata("loginSessionID"),
			"customerID"=>$this->session->userdata('customerID'),
		);
		$method = "PaySecPayoutInfo";
		$result = sendSoapData_new($method, $param);
		
		return $result;
	}

	function withdrawPaySecProc()
	{
		$amount = secure($this->input->post('amount'));
		$bankcode = secure($this->input->post('bankcode'));
		$bankname = secure($this->input->post('bankname'));
		$bankbranch = secure($this->input->post('bankbranch'));
		$customername = secure($this->input->post('customername'));
		$bankaccountname = secure($this->input->post('bankaccountname'));
		$bankaccountnumber = secure($this->input->post('bankaccountnumber'));
		$province = secure($this->input->post('province'));
		$city = secure($this->input->post('city'));
		
		$param = array(
			'domain' => get_HostName(base_url()),
			"loginSessionID" => $this->session->userdata("loginSessionID"),
			"customerID"=>$this->session->userdata('customerID'),
			"amount" => $amount,
			"bankcode" => $bankcode,
			"bankname" => $bankname,
			"bankbranch" => $bankbranch,
			"customername" => $customername,
			"bankaccountname" => $bankaccountname,
			"bankaccountnumber" => $bankaccountnumber,
			"province" => $province,
			"city" => $city,
		);
		
		$method = "PaySecPayout";
		$result = sendSoapData_new($method, $param);
		
		return $result;

	}

	function messages($messageType)
 	{
  		$param = array(
			'domain' => get_HostName(base_url()),
   			"loginSessionID" => $this->session->userdata("loginSessionID"),
   			"customerID"=>$this->session->userdata('customerID'),
   			"messageType"=>$messageType
  		);
  		$method = "CustomerMessages";
  		$result = sendSoapData_new($method, $param);
  
  		return $result; 
 	}


 	function SBTechPatch($result)
	{
		if ( $result["status"] == "OK" )
		{
			//$result["gameURL"] = str_replace("sb.15casino.com","sb.wff222.com",$result["gameURL"]);
		}
		return $result;
	}
        
        //----------------------------------------------------------------------
        //KROMERO: customer limits functions
        function changeCustomerLimits($dailyLimit){
            $method = "ChangeCustomerLimits";
            $param = array(
                    'domain' => get_HostName(base_url()),
                    "loginSessionID"=>$this->session->userdata('loginSessionID'),
                    "customerID"=>$this->session->userdata('customerID'),
                    "dailyLimit"=>$dailyLimit
            );
            $result = sendSoapData_new($method, $param);
            return $result;
	}
        
         function getCustomerLimits(){
            $method = "GetCustomerLimits";
            $param = array(
                    'domain' => get_HostName(base_url()),
                    "loginSessionID"=>$this->session->userdata('loginSessionID'),
                    "customerID"=>$this->session->userdata('customerID')                    
            );
            $result = sendSoapData_new($method, $param);
            return $result;
	}
        //----------------------------------------------------------------------
}
?>