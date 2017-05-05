<? $CI =& get_instance(); ?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ko" lang="ko">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>CD GAME-Main</title>
    
<link href="/asset/mobile/css/common.css" rel="stylesheet" type="text/css" />
<link href="/asset/mobile/css/basic.css" rel="stylesheet" type="text/css" />
<link href="/asset/mobile/css/basic_640.css" rel="stylesheet" type="text/css" id="style01" />

<script src="/asset/mobile/js/jquery-1.9.0.min.js" type="text/javascript"></script>
<script src="/asset/mobile/js/common.js" type="text/javascript"></script>
<script src="/asset/mobile/js/jquery.bxslider.js" type="text/javascript"></script>

<!--메인 슬라이드-->
	<script type="text/javascript" src="/asset/mobile/js/instagramAPI.js"></script>
    <script type="text/javascript" src="/asset/mobile/js/mvisual.js"></script>
<!--//메인 슬라이드-->

</head>

<body>
    
 <!--탑버튼-->
    <div id="topBtn">
		<a href="#">▲</a>
	</div>
 <!--//탑버튼-->


<!--상단바-->
	<? if ( ! isLogin() ) { ?>
    <div class="headerArea">
        <h1 class="logo"><a href="/">15 Casino</a></h1>
        <h2 class="hidden">상단영역</h2>
        <div class="gnb"><a href="#" class="category" id="reNavi_shop"><span>category</span></a><!--<a href="#" class="mypage" id="reGloabl_mypage"><span>mypage</span></a>-->
            <a href="/member/login" class="top-login"><span>top-login</span></a>
        </div>
    </div>
	<? } else { ?>
    <div class="headerArea">
        <h1 class="logo"><a href="/">15 Casino</a></h1>
        <div class="gnb">
			<a href="#" class="category" id="reNavi_shop"><span>category</span></a>
			<span class="top-customer-info"><?=$CI->session->userdata("MEM_LID")?></span>
        </div>
    </div>
	<? } ?>
<!-- //상단바-->

    
    
<!--왼쪽 메뉴-->
<div class="re_bg_layer"></div>
<div class="recategory_menu" id="recategory_menu">
    <div class="tl">
    	<span><img src="http://image.fnckolon.com/commonground/images/mobile/btn_close.png" alt="close" class="close" id="left_close"/></span></div>

    <ul class="recategory_left_menu"> 
        <li>
            <span>Live Dealer</span>
        </li>
        <li>
            <span>SBT</span>
        </li>
        <li>
            <span>Slots</span
        </li>
        <li>
            <span>Customer Service</span>
        </li>
           <li>
            <span>Events</span>
        </li>
        <li>
            <span>My Info</span>
            <dl class="ans">
                <dd><a href="#">Edit Profile</a></dd>
                <dd><a href="#">Account Info</a></dd>
                <dd><a href="#">Password</a></dd>
                <dd><a href="#">Deposit</a></dd>
                <dd><a href="#">Withdraw</a></dd>
                <dd><a href="#">Game Money</a></dd>
                <dd><a href="#">Deposit History</a></dd>
                <dd><a href="#">Withdraw History</a></dd>
                <dd><a href="#">Game Deposit History</a></dd>
                <dd><a href="#">Game Withdraw History</a></dd>
                <dd><a href="#">Event History</a></dd>
            </dl>
        </li> 
    </ul>
</div>
<!--// 왼쪽 메뉴-->
    
    
 <!--오른쪽 메뉴-->
    <!--<div class="maypage_right_menu" id="maypage_right_menu">
        <div class="tl"><span><img src="/asset/mobile/images/btn_close.png" alt="close" class="close" id="right_close"/></span></div>


        <div class="login_menu">
            <span class="txt1">MEMBERSHIP</span>
            <span class="txt2">
                COMMONGROUND에 회원가입을 <br />
                하시면 회원에게 제공하는 더 많은 <br />
                혜택을 누리실 수 있습니다.
            </span>
            <span class="btnArea">
                <a href="/auth/memberLogin.jsp?returnUrl=http://m.common-ground.co.kr:80/comground/main.jsp">LOG-IN</a>
                <a href="https://member.kolon.com/mobile/mJoin/mJoin.jsp?from_code1=CG&site_const=301&klink_cd=301_out_mob_direct_1">SIGN-UP</a>
                <a href="/contents/notice/noticeList.jsp">CUSTOMER CENTER</a>
            </span>
        </div>
    </div>-->
    <!--//오른쪽 메뉴-->
