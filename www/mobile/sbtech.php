<? 
	$CI =& get_instance(); 
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td height="1" colspan="3" bgcolor="#878582"></td>
    </tr>
    <tr>
        <td width="1057" height="100" valign="top" bgcolor="#000000">




            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td height="1" bgcolor="#878582"></td>
                </tr>
                <tr>
                    <td align="center" valign="bottom" class="allbg">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="">
                            <tr>
                                <td valign="top" style="padding:0 0 120px 0;">
                                    <iframe frameborder="0" scrolling="yes" id="frame" src="" style="width:100%;display:none"></iframe>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>



        </td>
    </tr>
</table>


<script type="text/javascript">
	var sbtech_url = "";
	function sbtech_load(url,params){
		$.ajax({
            type: 'GET',
            url: url,
            async  : false,
            dataType: 'json',
            data: params,
            beforeSend: function(){
                $('#centerLoading').show();
            },
            success: function(msg){
                if(msg.status == "OK"){
					sbtech_url = msg.gameURL;
					$("#frame").attr("src",sbtech_url);
					$("#frame").show();
                }else{
                    alert(msg.status);
                    location.href="/";
                }
            },
            error: function(msg){
                alert("error");
            }
        });
	}
	
	function sbtech_betslip(){
		var url = sbtech_url + "#bet_slip";
		$("#frame").attr("src",url);
	}
	function sbtech_history(){
		var url = sbtech_url.replace("?","history/?")
		//alert(url);
		$("#frame").attr("src",url);
	}
	function sbtech_settings(){
		var url = sbtech_url.replace("?","settings/?")
		$("#frame").attr("src",url);
	}
	function sbtech_rules(){
		var url = sbtech_url.replace("?","rules/?")
		$("#frame").attr("src",url);
	}

    $(document).ready(function(){
        var goUrl = "/game/game_slot_start";
        var dataString = "gameID=SBTECH&slot=<?=$sbtech_type?>";

        sbtech_load(goUrl, dataString);
		
		window.addEventListener('message', function(event) {
			var json = JSON.parse(event.data);
			if(json.eventType === 'CHANGE_IFRAME_SIZE_EVENT'){
				var realHeight = json.eventData.newHeight;
				$("#frame").height(realHeight);
			} else if (json.eventType === 'SET_BETSLIP_ITEMS_EVENT'){
				var newItemsCount = json.eventData.newItemsCount;
				if (newItemsCount > 0){
					//$("#betslip_icon").show();
					$("#betslip_count").html(newItemsCount);
				}else{
					//$("#betslip_icon").hide();
					$("#betslip_count").html("0");
				}
			}
		}, false);
    });
	
</script>


