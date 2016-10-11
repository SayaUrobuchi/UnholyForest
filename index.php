<?php
	include "php/common.php";
	init();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>不潔秘林</title>
<!-- CSS list -->
<LINK href="css/main.css" rel="stylesheet" type="text/css">
<!-- script list -->
<?php php_data_to_js(); ?>
<script src='js/main.js'></script>
<script src='js/display.js'></script>
</head>
<body>
	<center>
		<h1>不潔秘林</h1>
		<hr>
		<div id="login_hint">
		</div>
		<script>show_login_hint(null, document.getElementById("login_hint"));</script>
		<div id="stories">
			<div class="story">
				<h2>魔物娘亂舞</h2>
				<ul>
					<li>閱讀次數：131072</li>
					<li>評價：65535 (Avg 9.7)</li>
					<li>文章數：17 (最長 8)</li>
				</ul>
				<div class="tags">
					標籤：| 
					<span class="tag">人外娘 | </span>
					<span class="tag">格鬥 | </span>
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
					標籤：| 
					<span class="tag">人外娘 | </span>
					<span class="tag">格鬥 | </span>
				</div>
			</div>
			<div>
				<a onclick="javascript: new_article(-1);">建立新篇</a>
			</div>
		</div>
		<div id="menu">
			<h2>魔物娘亂舞</h2>
			<hr>
			<div class="intro">
				這是個魔物橫行的時代。擁有超越人類的各種特殊力量，卻又有著少女般甜美外表的魔物們…
			</div>
			<div class="content">
				<ul>
					<li><span class="content-title">初章『夜之王者』</span> 作者：沙子</li>
					<ul>
						<li><span class="content-title">二章『眷屬』</span> 作者：沙子</li>
						<li><span class="content-title">二章『夜闖王城』</span> 作者：弓弓</li>
					</ul>
				</ul>
			</div>
			<ul>
				<li>閱讀次數：131072</li>
				<li>評價：65535 (Avg 9.7)</li>
				<li>文章數：17 (最長 8)</li>
			</ul>
			<div class="tags">
				標籤：| 
				<span class="tag">人外娘 | </span>
				<span class="tag">格鬥 | </span>
			</div>
		</div>
		<div id="write">
			<?php if (is_login()) { ?>
				<h2>新篇作成</h2>
				<p>章名：<input type="text" id="i_chapname" size="96" /></p>
				<p>作者：<?php echo get_user_readname(); ?></p>
				<p><textarea id="i_article" cols=150 rows=24></textarea></p>
				<input type="submit" value="佈告天下" onclick="javascript: submit_article();" />
			<?php } else { ?>
				<p>無名小輩無權為文。出示你的身份，或者宣告新的名號！
					<span>稱號：<input type="text" name="id" /></span>
					<span>秘語：<input type="password" name="passwd" /></span>
					<input type="submit" onclick="javascript: do_login();" value="出示身份" />
					<input type="submit" onclick="javascript: do_register();" value="宣告新的稱號" />
				</p>
			<?php } ?>
		</div>
	</center>
</body>
</html>