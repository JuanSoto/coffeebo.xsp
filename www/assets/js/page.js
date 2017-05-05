function game_start_bbin(slot) {

	var goUrl = "/game/game_slot_start";
	var dataString = "gameID=BBIN&slot="+slot;

	$.ajax({
		type: 'GET',
		url: goUrl,
		async  : false,
		dataType: 'json',                   //������ ����
		data: dataString,
		beforeSend: function(){

			$('#centerLoading').show();

		},
		success: function(msg){
			if (msg.status == "OK"){
                if (msg.AlertCheck == "Y") {
                    alert(msg.AlertMsg);
                } else {
					$("#ajaxLayer").html(msg.gameURL);
					$("#post_form").attr("target", "_blank");
					$("#post_form").submit();
                }
			}else{
				alert(msg.status);
			}
		},
		error: function(msg){
			alert("error");
		}
	});

}

function game_start(getGameID,slot) {

	var goUrl = "/game/game_slot_start";
	var dataString = "gameID="+getGameID+"&slot="+slot;

	$.ajax({
		type: 'GET',
		url: goUrl,
		async  : false,
		dataType: 'json',                   //������ ����
		data: dataString,
		beforeSend: function(){

			$('#centerLoading').show();

		},
		success: function(msg){			
			if (msg.status == "OK"){
                if (msg.AlertCheck == "Y") {
                    alert(msg.AlertMsg);
                } else {
					window.open(msg.gameURL);
                }
			}else{
				alert(msg.status);
			}
		},
		error: function(msg){
			alert("error");
		}
	});

}


function showLayer(url,dataString){


	var goUrl = url;
	var dataString = dataString;

	$.ajax({
		type: 'GET',
		url: goUrl,
		async  : false,
		dataType: 'html',                   //데이터 유형
		data: dataString,
		beforeSend: function(){

			$('#centerLoading').show();

		},
		success: function(msg){
			console.log(msg);
			$('#centerLoading').hide();
			$("#ajaxLayer").html(msg);
			$("#ajaxLayer").modal("show");

		},
		error: function(msg){
			alert("error");
		}
	});

}

	function loginProc() {

		if(!form_field_alert_check("nx_id","Email address","lnx_id","please enter your username")){return;}
		if(!form_field_alert_check("nx_pw","Password","lnx_pw","please enter your password")){return;}

		//$("#joinForm").submit();
		ajaxSendPost("/member/login_proc","loginForm","reload","login completed","login");


	}


		function amountPrice(getOption) {
			
			var option_price = getOption.split("|")[2];		//옵션금액			
			var total_price = 0;	//총금액
			
			total_price = parseFloat($("#np_total_price").val()) + parseFloat(option_price);

			//$("#np_total_price").val(total_price);
			//$("#div_total_price").html(total_price+"원");
			
			//alert(option_price);
			
			
			
		}
		
		
		


		function idCheck() {

			if(!form_field_alert_check("nx_id","ID","nx_id","아이디를 입력해주세요.")){return;}		
			
			var goUrl = "/member/id_check";
			var dataString = "nx_id="+$("#nx_id").val();

			$.ajax({ 
			   type: 'GET', 
			   url: goUrl, 
			   async  : false,
			   dataType: 'json',                   //데이터 유형 
			   data: dataString, 
			   beforeSend: function(){
					
					$('#centerLoading').show();

			   },
			   success: function(msg){ 
					//alert(msg.result_type);
					//{"result_type":"ok", "field1":"id" ,"detail":""}			

					$('#centerLoading').hide();

					if(msg.result_type=="ok"){	//성공일경우
						alert("username is available");
						$("#idChk").val('1');
					}else{
						alert("username already exists");
						$("#idChk").val('0');
					}

			   },
			   error: function(msg){ 
					alert("error");
			   }
			}); 

		}

