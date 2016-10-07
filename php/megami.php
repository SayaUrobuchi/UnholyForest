<?php
	include "common.php";

	$resp = [
		"status" => ERR_NO_ACTION, 
		"content" => "", 
	];

	switch ($_GET[ACTION_FIELD])
	{
	case ACTION_LOGIN:
		$err_msg = "";
		$name = mysql_real_escape_string(trim($_POST[USERNAME_FIELD]));
		$passwd = mysql_real_escape_string($_POST[PASSWORD_FIELD]);
		if (!db_init())
		{
			$err_msg .= "世界崩壞中！天啟：".mysql_error()."\n";
			$resp["status"] = ERR_SQL_ERROR;
		}
		else
		{
			$res = mysql_query("SELECT * FROM `user` WHERE `name` = '".$name."'");
			if ($res)
			{
				$rows = mysql_fetch_array($res, MYSQL_ASSOC);
				if ($rows && $rows["passwd"] == get_enc_passwd($name, $passwd))
				{
					$resp["status"] = SUCCESS;
					set_login($name);
				}
			}
		}
		if ($resp["status"] != SUCCESS)
		{
			$resp["err_msg"] = $err_msg;
		}
		break;
	case ACTION_REGISTER:
		$err_msg = "";
		$name = mysql_real_escape_string(trim($_POST[USERNAME_FIELD]));
		$passwd = mysql_real_escape_string($_POST[PASSWORD_FIELD]);
		if (!$name || 
			mb_strlen($name) < 1 || mb_strlen($name) > 16)
		{
			$err_msg .= "名號長度必須在一至十六字之間！\n";
			$resp["status"] = ERR_FORMAT_ERROR;
		}
		if (!$passwd || 
			mb_strlen($passwd) < 4 || mb_strlen($passwd) > 32)
		{
			$err_msg .= "暗號長度必須在四至三十二字之間！\n";
			$resp["status"] = ERR_FORMAT_ERROR;
		}
		if (strlen($err_msg) == 0)
		{
			if (!db_init())
			{
				$err_msg .= "世界崩壞中！天啟：".mysql_error()."\n";
				$resp["status"] = ERR_SQL_ERROR;
			}
			else
			{
				$res = mysql_query("SELECT * FROM `user` WHERE `name` = '".$name."'");
				if ($res && mysql_num_rows($res) > 0)
				{
					$err_msg .= "他人使用中的稱號。換個！\n";
					$resp["status"] = ERR_USED_READNAME;
				}
				else
				{
					$enc_pass = get_enc_passwd($name, $passwd);
					$res = mysql_query("INSERT INTO `user` (`name`, `passwd`) VALUES ('".$name."', '".$passwd."')");
					if (!res)
					{
						$err_msg .= "原因不明的宣稱失敗！？天啟：".mysql_error()."\n";
						$resp["status"] = ERR_UNKNOWN;
					}
					else
					{
						$resp["status"] = SUCCESS;
						set_login($name);
					}
				}
			}
		}
		if ($resp["status"] != SUCCESS)
		{
			$resp["err_msg"] = $err_msg;
		}
		break;
	case ACTION_LOGOUT:
		break;
	case ACTION_EXPAND_SERIES:
		break;
	case ACTION_READ_ARTICLE:
		break;
	case ACTION_CREATE_SERIES:
		break;
	case ACTION_CREATE_ARTICLE:
		break;
	}

	echo json_encode($resp);
?>