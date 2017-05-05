<script>
	function doLogin(){
		if ( $("#customerID").val().length == 0 ){
			alert("Login is empty");
		}
		$("#form1").submit();
	}
</script>
<div align="center">
<form method="post" action="/member/login_proc" id="form1">
	Login <input type="text" id="customerID" name="customerID"/>
	<br>
	Password <input type="password" id="userpw" name="userpw"/>
	<br>
	<input type="button" id="cmdLogin" value="Login" onclick="doLogin()"/>
</form>
</div>