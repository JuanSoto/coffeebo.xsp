<?php
include("il8/zh.php");
include("il8/ko.php");
include("il8/en.php");

function il8($code, $language, $params = null)
{
	global $zh_loc;
	global $ko_loc;
	global $en_loc;
	
	$r = "";
	switch($language)
	{
		case "zh": $r = @$zh_loc[$code]; break;
		case "ko": $r = @$ko_loc[$code]; break;
		case "en": $r = @$en_loc[$code]; break;
		default:   $r = $code;
	}
	if (strlen($r) == 0)
	{
		$r = "##".$code;
	}
	if ( $params <> null )
	{
		if (is_array($params))
		{
			foreach($params as $key=>$value)
			{
				$r = str_ireplace($key, $value, $r);
			}
		}
	}
	return $r;
}

?>