<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$documentRoot = dirname(__FILE__);
require_once($documentRoot.'../../includes/init.php');
$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbUser,$dbpw);
	$deleteSql = "DELETE FROM books_info where books_id=".$_GET['id'];
		$deleteStmt = $pdo->exec($deleteSql);
		echo "<script>alert('删除成功，即将返回到借书页面！')</script>";
		echo "1秒后您即将回到借书页面";
		echo "<meta http-equiv='refresh'content=1;URL='library.php'>";
?>