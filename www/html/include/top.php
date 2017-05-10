<?php 
$CI =& get_instance();
$current_ip = $_SERVER["REMOTE_ADDR"];
$whitelist = array("127.0.0.1","186.176.227.218","13.112.81.110","190.171.117.61");
$qtech = array("122.53.186.98","222.127.94.12");
$dev_whitelisted = in_array($current_ip,$whitelist);
$qtech_whitelisted = in_array($current_ip,$qtech);
$GameCompanyVisible = $this->session->userdata('GameCompanyVisible');
$language = 'en';

require_once('././appcode/includes/xsp.il8.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?=PAGE_TITLE?></title>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?=ASSET_PATH?>/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME STYLES -->
    <link href="<?=ASSET_PATH?>/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css"
          id="style_color"/>
    <link href="<?=ASSET_PATH?>/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?=ASSET_PATH?>/layout/css/jqx.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico"/>

    <script src="<?=ASSET_PATH?>/js/page.js"></script>

   
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-full-width">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="/">
                    <img src="<?=ASSET_PATH?>/img/logo.png" alt="logo" class="logo-default"/> </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Remove "hor-menu-light" class to have a horizontal menu with theme background instead of white background -->
            <!-- DOC: This is desktop version of the horizontal menu. The mobile version is defined(duplicated) in the responsive menu below along with sidebar menu. So the horizontal menu has 2 seperate versions -->
            <div class="hor-menu   hidden-sm hidden-xs">
                <ul class="nav navbar-nav">
                    <!-- DOC: Remove data-hover="megamenu-dropdown" and data-close-others="true" attributes below to disable the horizontal opening on mouse hover -->
                    <li class="mega-menu-dropdown" aria-haspopup="true">
                        <a href="javascript:;" class="dropdown-toggle" data-hover="megamenu-dropdown"
                           data-close-others="true"> <?= il8("system",$language) ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 500px;">
                            <li>
                                <!-- Content container to add padding -->
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <?php if (!$this->session->userdata('IsSuperAgent')) { ?>
                                            <li><a href="#"><?= il8("system site",$language)?></a></li>
                                        <?php }else{  ?>
                                            <div class="col-md-5">
                                                <ul class="mega-menu-submenu">                   
                                                    <li><a href="#"><?= il8("brand manager",$language)?></a></li>
                                                    <li><a href="#"><?= il8("rating manager",$language)?></a></li>
                                                    <li><a href="#"><?= il8("system site",$language)?></a></li>
                                                    <li><a href="#"><?= il8("bank code mng",$language)?></a></li>
                                                    <li><a href="#"><?= il8("bank account manager",$language)?></a></li>
                                                    <li><a href="#"><?= il8("game company manager",$language)?></a></li>
                                                </ul>
                                            </div>

                                            <div class="col-md-5">
                                                <ul class="mega-menu-submenu">                   
                                                    <?php if($this->session->userdata('currency')=="CNY"){ ?>
                                                        <li><a href="#"><?= il8("levels",$language)?></a></li>
                                                        <li><a href="#"><?= il8("levels setting",$language)?></a></li>
                                                    <?php } ?>
                                                    <li><a href="#"><?= il8("withdraw wait manager",$language)?></a></li>
                                                    <li><a href="#" class="top_link"><?= il8("promotions first",$language)?></a></li>
                                                    <li><a href="#" class="top_link"><?= il8("promotions week",$language)?></a></li>
                                                    <li><a href="#" class="top_link"><?= il8("alert msg",$language)?></a></li>
                                                    <li><a href="#" class="top_link"><?= il8("sms auth log",$language)?></a></li>
                                                </ul>
                                            </div>

                                        <?php }  ?>                       
                
                                        
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="mega-menu-dropdown" aria-haspopup="true">
                        <?php if ( $this->session->userdata('IsSuperAgent') ) { 
                            $url_customer = "/customers.php";
                        }else{
                            $url_customer = "/agt_customers.php";
                        }
                        ?>
                        <a href="<?= $url_customer ?>" class="dropdown-toggle" data-hover="megamenu-dropdown"
                           data-close-others="true"> <?= il8("customers",$language) ?>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu" style="min-width: 500px;">
                            <li>
                                <!-- Content container to add padding -->
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <ul class="mega-menu-submenu">
                                                 <?php if ($this->session->userdata('IsSuperAgent')) { ?>
                                                    <li><a href="#"><?= il8("customers",$language)?></a></li>
                                                    <li><a href="#"><?= il8("coupon manager",$language)?></a></li>
                                                    <li><a href="#"><?= il8("friend referal",$language)?></a></li>
                                                    <li><a href="#"><?= il8("black customer",$language)?><?= il8("management",$language)?></a></li>
                                                    <li><a href="#"><?= il8("customer change",$language)?></a></li>
                                                <?php }else{  ?>
                                                    <li><a href="#"><?= il8("customers",$language)?></a></li>
                                                    <li><a href="#"><?= il8("coupon manager",$language)?></a></li>
                                                <?php }  ?>
                                                <?php if ($this->session->userdata('agentLevel') == "0") { ?>
                                                    <li><a href="#"><?= il8("login ip check",$language)?></a></li>
                                                <?php }  ?>
                                            </ul>   
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    
                    <?php if ($this->session->userdata('IsSuperAgent')) { ?>
                        <li class="mega-menu-dropdown" aria-haspopup="true">
                            <a href="#" class="dropdown-toggle" data-hover="megamenu-dropdown"
                               data-close-others="true"> <?= il8("crm",$language) ?>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" style="min-width: 500px;">
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul class="mega-menu-submenu">
                                                    <li><a href="#"><?= il8("crm manager",$language)?></a></li>
                                                </ul>   
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="mega-menu-dropdown" aria-haspopup="true">
                            <a href="#" class="dropdown-toggle" data-hover="megamenu-dropdown"
                               data-close-others="true"> <?= il8("agents",$language) ?>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" style="min-width: 500px;">
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul class="mega-menu-submenu">
                                                    <li><a href="/member/getAgentData"><?= il8("agents",$language)?></a></li>
                                                </ul>   
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php }  ?>

                    <li class="mega-menu-dropdown" aria-haspopup="true">
                        <a href="javascript:;" class="dropdown-toggle" data-hover="megamenu-dropdown"
                           data-close-others="true"> <?= il8("commisions",$language) ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 500px;">
                            <li>
                                <!-- Content container to add padding -->
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="mega-menu-submenu">
                                                <li><a href="#"><?= il8("commisions",$language)?></a></li>
                                                <li><a href="#"><?= il8("commision status",$language)?></a></li>
                                                    
                                                 <?php if ($this->session->userdata('IsSuperAgent')) { ?>
                                                    <li><a href="#"><?= il8("transaction approval",$language)?></a></li>
                                                    <li><a href="#"><?= il8("transaction request",$language)?></a></li>
                                                <?php }else{  ?>
                                                    <li><a href="#"><?= il8("transaction request",$language)?></a></li>
                                                <?php }  ?>
                                                <?php if ($this->session->userdata('agentLevel') == "0") { ?>
                                                    <li><a href="#"><?= il8("headoffice calculate history",$language)?></a></li>
                                                <?php }  ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="mega-menu-dropdown" aria-haspopup="true">
                        <?php if ( $this->session->userdata('IsSuperAgent') ) { 
                            $url_transaction = "/dw_validation.php";
                        }else{
                            $url_transaction = "/dw_history.php";
                        }
                        ?>
                        <a href="<?= $url_transaction ?>" class="dropdown-toggle" data-hover="megamenu-dropdown"
                           data-close-others="true"> <?= il8("transactions",$language) ?>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu" style="min-width: 500px;">
                            <li>
                                <!-- Content container to add padding -->
                                <div class="mega-menu-content">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <ul class="mega-menu-submenu">
                                                <?php if ($this->session->userdata('IsSuperAgent')) { ?>
                                                    <li><a href="#"><?= il8("dwvalidation",$language)?></a></li>
                                                    <li><a href="#"><?= il8("dwgroup",$language)?></a></li>
                                                <?php }  ?>
                                                <li><a href="#"><?= il8("dwhistory",$language)?></a></li>
                                            </ul>   
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <?php if ($this->session->userdata('IsSuperAgent')) { ?>
                        <li class="mega-menu-dropdown" aria-haspopup="true">
                            <a href="#" class="dropdown-toggle" data-hover="megamenu-dropdown"
                               data-close-others="true"> <?= il8("statistics",$language) ?>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" style="min-width: 500px;">
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul class="mega-menu-submenu">
                                                    <li><a href="#"><?= il8("statistics",$language)?></a></li>
                                                </ul>   
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>

                        <li class="mega-menu-dropdown" aria-haspopup="true">
                            <a href="#" class="dropdown-toggle" data-hover="megamenu-dropdown"
                               data-close-others="true"> <?= il8("board manager",$language) ?>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu" style="min-width: 500px;">
                                <li>
                                    <!-- Content container to add padding -->
                                    <div class="mega-menu-content">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <ul class="mega-menu-submenu">
                                                    <li><a href="#"><?= il8("web board",$language)?></a></li>
                                                    <li><a href="#"><?= il8("message agent",$language)?></a></li>
                                                    <li><a href="#"><?= il8("message customers",$language)?></a></li>
                                                </ul>   
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    <?php }  ?>                    
                </ul>
            </div>
            <!-- END MEGA MENU -->
            <!-- BEGIN HEADER SEARCH BOX -->
            <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
            <form class="search-form" action="extra_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="query">
                    <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> 7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="page_user_profile_1.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> 4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">7 New</span> Messages</h3>
                                <a href="app_inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?=ASSET_PATH?>/img/avatar.png"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?=ASSET_PATH?>/img/avatar.png"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?=ASSET_PATH?>/img/avatar.png"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                            <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?=ASSET_PATH?>/img/avatar.png"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?=ASSET_PATH?>/img/avatar.png"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default"> 3 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">12 pending</span> tasks</h3>
                                <a href="app_todo.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New release v1.2 </span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 40%;"
                                                              class="progress-bar progress-bar-success"
                                                              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Application deployment</span>
                                                        <span class="percent">65%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 65%;"
                                                              class="progress-bar progress-bar-danger"
                                                              aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">65% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile app release</span>
                                                        <span class="percent">98%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 98%;"
                                                              class="progress-bar progress-bar-success"
                                                              aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">98% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">10%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 10%;"
                                                              class="progress-bar progress-bar-warning"
                                                              aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">10% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Web server upgrade</span>
                                                        <span class="percent">58%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 58%;" class="progress-bar progress-bar-info"
                                                              aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">58% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">85%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 85%;"
                                                              class="progress-bar progress-bar-success"
                                                              aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">85% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New UI release</span>
                                                        <span class="percent">38%</span>
                                                    </span>
                                            <span class="progress progress-striped">
                                                        <span style="width: 38%;"
                                                              class="progress-bar progress-bar-important"
                                                              aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">38% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle" src="<?=ASSET_PATH?>/img/avatar.png"/>
                            
                             <?php if(isLogin()): ?>
                                    <span  class="username username-hide-on-mobile">
                                    <?=$CI->session->userdata("MEM_LID")?>
                                    </span>
                                <? endif; ?>

                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="app_calendar.html">
                                    <i class="icon-calendar"></i> My Calendar </a>
                            </li>
                            <li>
                                <a href="app_inbox.html">
                                    <i class="icon-envelope-open"></i> My Inbox
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="app_todo.html">
                                    <i class="icon-rocket"></i> My Tasks
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="page_user_lock_1.html">
                                    <i class="icon-lock"></i> Lock Screen </a>
                            </li>
                            <li>
                                <a href="/member/logout">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler logout" title="Log Out">
                        <a href="/member/logout" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->

    <!----------------------------------------------END HEADER--------------------------------------------------------------------->

