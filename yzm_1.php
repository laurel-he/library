<?php
require_once('includes/init.php');
	header ( "Content-type: text/html; charset=UTF-8" ); 	//设置文件编码格式
	header("Content-type:image/gif");						//设置页面类型
	$image = imagecreatetruecolor(80,30);					//创建画布
	$font = 'Font/FZHCJW.TTF';								//定义字体
	$bg = imagecolorallocate($image,255,255,255);			//定义背景颜色
	$color = imagecolorallocate($image,255,0,255);
	$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbUser,$dbpw);
	$id = rand(1,18);
	$sql = "select * from verify where varify_id = ".$id;
	$stmt = $pdo->query($sql);
	$res = $stmt->fetch();
	$content = $res['varify_content'];
	imagettftext($image,20,0,8,20,$color,$font,$content);	//输出文字
	imagegif($image);	//生成图像
	session_start();
	$_SESSION['verify']=$content;
?>



