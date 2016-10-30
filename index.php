<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<div id="head">
	<h1>
	图书馆借阅系统
</h1></div>
<link rel="stylesheet" type="text/css" href="css/index.css" />
</head>
<body>
<?php
	header('Content-type:text/html;charset=utf-8');
$documentRoot = dirname(__FILE__);
	require_once($documentRoot.'/includes/init.php');
	session_start();
 ?>
<div id = "logUp">
	<form action="indexSub.php" method="post">
		<p class="user">用户名：</p><input type="text" name="userName" /><br /><br />
		<p class="user">密码：  </p><input type="password" name="passWord" /><br /><br />
		<p>请输入验证码：</p><img src='yzm_1.php' /><br />
		<input type='text' name='verify'/><br /><br />
		<input type="submit" name="sub" value="登录" id="bt1" />
		&nbsp;<input type="button" id="bt2" onclick="sign()" value="注册"/>
	</form>
</div>
<script>
	function sign()
	{
		window.location.href = "logIn.html";
	}
</script>
<div id="footer">学年设计——图书馆借阅系统@<a href='https://github.com/laurel-he' id="cont">贺小娇</a></div>
</body>
</html>