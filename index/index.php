<?php 
	header('Content-Type:text/html;charset=utf-8');
	$userKind = 1;
	session_start();
	$_SESSION['user']=$userKind;
 ?>
<div id="head">
	<h1>
	图书馆借阅系统
</h1>
<link rel="stylesheet" type="text/css" href="css/index.css" />
<script type="text/javascript">
	function admin()
	{
		alert("选择身份成功，请以管理员身份登录！");
		window.location.href="index.php?user=1";
	}
	function teacher()
	{
		alert("选择身份成功，请以教师身份登录！");
		window.location.href="index.php?user=2";
	}
	function student()
	{
		window.location.href="index.php?user=3";
	}
	function sign()
	{
		window.location.href = "logIn.html";
	}
</script>
</div>
<div id = "logUp">
	<form action="indexSub.php" method="post">
		<p class="user">用户名：</p><input type="text" name="userName" /><br /><br />
		<p class="user">密码：  </p><input type="password" name="passWord" /><br /><br />
		<input type="submit" name="sub" value="登录" class="button" />
	</form>
			<button id="bt" onclick="sign()">注册</button>
</div>
<button class="logIn" onclick="admin()">管理员登录</button><br />
<button class="logIn" onclick="teacher()">教师登录</button><br />
<button class="logIn" onclick="student()">学生登录</button><br />

