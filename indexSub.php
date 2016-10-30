<?php
$documentRoot = dirname(__FILE__);
require_once($documentRoot.'/includes/init.php');
header('Content-type:text/html;charset=utf-8'); 
session_start();
	try
	{	$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
		$pdo = new PDO($dsn,$dbUser,$dbpw);
		$userName = $_POST['userName'];
		$_SESSION['userName']=$userName;
		$passWord = $_POST['passWord'];
		if($_POST['verify'] && $_POST['userName'])
		{
		$sqlAdmin = "select * from admin where admin_name='".$_POST['userName']."' and password='".$_POST['passWord']."'";
		$stmtAdmin = $pdo->query($sqlAdmin);
		$resAdmin = $stmtAdmin->fetch();
	    if($resAdmin&& $_POST['verify']==$_SESSION['verify']){
			$_SESSION['user']=1;
			echo "登录成功,将在3秒后跳转至管理系统的链接，如不跳转请点击"."<a href='app/library.php'>这里"."</a>";
		    echo $_SESSION['user'];
		    echo "<meta http-equiv='refresh'content=3;URL='app/library.php'>";
			die();
		}    
		$sqlStu = "select * from students where student_name='".$_POST['userName']."' and password = '".$_POST['passWord']."'";
		$stmtStu = $pdo->query($sqlStu);
	    $resStu = $stmtStu->fetch();
		if($resStu&& $_POST['verify']==$_SESSION['verify'])
		{
			$_SESSION['user']=3;
			echo "登录成功,将在3秒后跳转至管理系统的链接，如不跳转请点击"."<a href='app/library.php'>这里"."</a>";
		    echo $_SESSION['user'];
		    echo "<meta http-equiv='refresh'content=3;URL='app/library.php'>";
			die();
		}
			$sqlTec="select * from teachers where teachers_name='".$_POST['userName']."' and password='".$_POST['passWord']."'";
			$stmtTec = $pdo->query($sqlTec);
	        $resTec = $stmtTec->fetch();
			if($resTec&& $_POST['verify']==$_SESSION['verify'])
			{
				$_SESSION['user']=2;
			echo "登录成功,将在3秒后跳转至管理系统的链接，如不跳转请点击"."<a href='app/library.php'>这里"."</a>";
		    echo $_SESSION['user'];
		    echo "<meta http-equiv='refresh'content=3;URL='app/library.php'>";
			die();
			}
			else if($_POST['verify']!=$_SESSION['verify'])
	{
		echo "登录失败，验证码错误！请重新验证！";
		echo "<meta http-equiv='refresh'content=3;URL='index.php'>";
	}
	else
	{
		echo "密码错误，请检查您的登录信息";
	}
		}
		else
	{
		echo "<script>alert('请输入用户名和验证码！');</script>";
	}
	
		}
		catch(PDOException $e)
	{
		$e->getMessage();
	}
	
 ?>