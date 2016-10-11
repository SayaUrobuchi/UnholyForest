/*

		<?php if (is_login()) { ?>
			<p>歡迎回來，<?php echo get_user_readname() ?>…今天你是污染側，還是被污染側呢？嘿嘿嘿…</p>
		<?php } else { ?>
			<p>出示你的身份吧！稀客。
				<span>稱號：<input type="text" name="id" /></span>
				<span>秘語：<input type="password" name="passwd" /></span>
				<input type="submit" onclick="javascript: do_login();" value="出示身份" />
				<input type="submit" onclick="javascript: do_register();" value="宣告新的稱號" />
			</p>
		<?php } ?>
*/

function show_login_hint(msg, dom)
{
	var content;
	var node = dom || this;
	if (login_flag)
	{
		content = '<p>歡迎回來，'+readname+'…今天你是污染側，還是被污染側呢？嘿嘿嘿…'+
			'<input type="submit" onclick="javascript: do_logout();" value="換個身份" /></p>';
	}
	else
	{
		content = '<p>出示你的身份吧！稀客。'+
				'<span>稱號：<input type="text" name="id" /></span>'+
				'<span>秘語：<input type="password" name="passwd" /></span>'+
				'<input type="submit" onclick="javascript: do_login();" value="出示身份" />'+
				'<input type="submit" onclick="javascript: do_register();" value="宣告新的稱號" />'+
			'</p>';
	}
	node.innerHTML = content;
}
