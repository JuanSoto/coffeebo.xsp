<?php $CI =& get_instance();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="<?=ASSET_PATH?>/js/jquery-1.11.1.min.js"></script>

<title><?=PAGE_TITLE?></title>
<link href="<?=ASSET_PATH?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSET_PATH?>/css/sub.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">

        function valueCheck() {
            if($("#tcustomerID").val()==""){ alert('insert ID'); return;}
            if($("#tuserpw").val()==""){ alert('insert Password'); return;}
            $("#loginForm").submit();
        }

        $(document).keypress(function(e){
            if(e.which == 13 ){
                valueCheck();
            }
        });


    </script>

</head>


<body style="background:url(<?=ASSET_PATH?>/img/bodyback.png); background-repeat:no-repeat;  background-size:cover; background-color:#000; ">
</body>

<div style=" text-align:center; padding-top:260px;   ">
<div style=" left:1%; background:url(<?=ASSET_PATH?>/img/login_backbg.png);position:absolute; width:98%; height:375px;   background-position:center;   background-repeat:no-repeat;">

    <?php echo form_open("/member/login_proc", array('id' => 'loginForm', 'name' => 'loginForm', 'target' => 'wHidden')); ?>
    	<div style=" padding-top:55px; font-family:'Century Gothic'; font-size:30px;">MEMBER LOGIN</div>
        <div style=" padding-top:15px;"><input  class="loginput" type="text" name="customerID" id="tcustomerID" placeholder="ID"></div>
        <div style=" padding-top:15px;"><input type="password" class="loginput" name="userpw" id="tuserpw" placeholder="Password"></div>
        <div style="  padding-top:15px;"><img src="<?=ASSET_PATH?>/img/btn_login.png" onclick="valueCheck(); return false;" style="cursor: pointer;cursor:hand"/></div>
   </form>

</div>
</div>
<iframe name="wHidden" id="wHidden" frame="0" width="500" height="700" style="display: none;"></iframe>

</html>
