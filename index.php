<?php
	include "php/common.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>不潔秘林</title>
<!-- CSS list -->
<LINK href="css/main.css" rel="stylesheet" type="text/css">
<!-- script list -->
<!--<script src='js/util.js'></script>-->
</head>
<body>
	<center>
		<h1>不潔秘林</h1>
		<hr>
		<?php if (is_login()) { ?>
			<p>歡迎回來，<?php echo get_user_readname() ?>…今天你是污染側，還是被污染側呢？嘿嘿嘿…</p>
		<?php } else { ?>
			<p>出示你的身份吧！稀客。
				<span>稱號：<input type="text" name="id" /></span>
				<span>秘語：<input type="password" name="passwd" /></span>
				<input type="submit" onclick="javascript: do_login();" value="出示" />
			</p>
		<?php } ?>
		<div id="stories">
			<div class="story">
				<h2>魔物娘亂舞</h2>
				<ul>
					<li>閱讀次數：131072</li>
					<li>評價：65535 (Avg 9.7)</li>
					<li>文章數：17 (最長 8)</li>
				</ul>
				<div class="tags">
					<span class="tag">人外娘</span>
					<span class="tag">格鬥</span>
				</div>
			</div>
			<div class="story">
				<h2>魔物娘亂舞</h2>
				<ul>
					<li>閱讀次數：131072</li>
					<li>評價：65535 (Avg 9.7)</li>
					<li>文章數：17 (最長 8)</li>
				</ul>
				<div class="tags">
					<span class="tag">人外娘</span>
					<span class="tag">格鬥</span>
				</div>
			</div>
		</div>
	</center>
</body>
</html>