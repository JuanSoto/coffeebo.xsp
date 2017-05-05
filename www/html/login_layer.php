<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<link href="<?=ASSET_PATH?>/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?=ASSET_PATH?>/css/sub.css" rel="stylesheet" type="text/css" />
</head>

<script type="text/javascript">

    function valueCheck() {
        if($("#tcustomerID").val()==""){ alert('please enter your username'); return;}
        if($("#tuserpw").val()==""){ alert('please enter your password'); return;}
        $("#loginForm").submit();
    }

    $(document).keypress(function(e){
        if(e.which == 13 ){
            valueCheck();
        }
    });

</script>

<body>
<?php echo form_open("/member/login_proc", array('id' => 'loginForm', 'name' => 'loginForm', 'target' => 'wHidden')); ?>
<div class="logback">
  <ul>
    	<li class="logbli01"><div style="color:white; font-family:'Century Gothic'; font-size:30px;">MEMBER LOGIN</div></li>
        <li class="logbli02"><input class="loginput" id="tcustomerID" name="customerID" placeholder="ID"></li>
        <li class="logbli03"><input type="password" class="loginput" id="tuserpw" name="userpw" placeholder="Password"></li>
    <li class="logbtn"><img src="<?=ASSET_PATH?>/img/btn_login.png" onclick="valueCheck(); return false;" style="cursor:hand;cursor:pointer" /></li>
   
    </ul>
	     <div class="logclose"><img src="<?=ASSET_PATH?>/img/btn_loginclose.png" onclick="$.modal.close();" style="cursor:hand;cursor:pointer" /></div>
</div>
</form>
</body>
</html>
