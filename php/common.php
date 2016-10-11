<?php
	define("DB_NAME", "UnholyForest");

	define("LOGIN_FLAG", "__LOGIN");
	define("LOGIN_READNAME", "__LOGIN_NAME");

	define("ACTION_FIELD", "act");
	define("USERNAME_FIELD", "name");
	define("PASSWORD_FIELD", "passwd");

	define("ACTION_LOGIN", 1);
	define("ACTION_REGISTER", 2);
	define("ACTION_LOGOUT", 3);
	define("ACTION_EXPAND_SERIES", 4);
	define("ACTION_READ_ARTICLE", 5);
	define("ACTION_CREATE_SERIES", 6);
	define("ACTION_CREATE_ARTICLE", 7);

	define("ERR_NO_ACTION", -1);
	define("ERR_FORMAT_ERROR", -2);
	define("ERR_SQL_ERROR", -3);
	define("ERR_USED_READNAME", -4);
	define("SUCCESS", 0);

	$db = NULL;

	function init()
	{
		session_start();
		error_reporting(E_ALL & ~E_NOTICE);
	}

	function db_init()
	{
		if (!$db)
		{
			$db = mysql_connect("localhost", "unholyforest", "unholymind");
			if ($db)
			{
				mysql_select_db(DB_NAME);
			}
		}
		return $db ? true : false;
	}

	function php_data_to_js()
	{
		echo "<script>".
			"var login_flag = ".(is_login() ? 1 : 0).";\n".
			"var readname = '".get_user_readname()."';\n".
			"var ACTION_FIELD = '".ACTION_FIELD."';\n".
			"var USERNAME_FIELD = '".USERNAME_FIELD."';\n".
			"var PASSWORD_FIELD = '".PASSWORD_FIELD."';\n".
			"var ACTION_LOGIN = ".ACTION_LOGIN.";\n".
			"var ACTION_REGISTER = ".ACTION_REGISTER.";\n".
			"var ACTION_LOGOUT = ".ACTION_LOGOUT.";\n".
			"var ACTION_EXPAND_SERIES = ".ACTION_EXPAND_SERIES.";\n".
			"var ACTION_READ_ARTICLE = ".ACTION_READ_ARTICLE.";\n".
			"var ACTION_CREATE_SERIES = ".ACTION_CREATE_SERIES.";\n".
			"var ACTION_CREATE_ARTICLE = ".ACTION_CREATE_ARTICLE.";\n".
		"</script>";
	}

	function get_enc_passwd($name, $passwd)
	{
		return md5($passwd."unHOLYSHIfT".$name);
	}

	function is_login()
	{
		return $_SESSION[LOGIN_FLAG] ? true : false;
	}

	function set_login($name)
	{
		$_SESSION[LOGIN_FLAG] = true;
		$_SESSION[LOGIN_READNAME] = $name;
	}

	function get_user_readname()
	{
		return $_SESSION[LOGIN_READNAME];
	}
?>