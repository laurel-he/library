<html>
<head>
	<title>图书馆借阅系统</title>
	<link rel="stylesheet" type="text/css" href="../css/library.css" /></head>
	<script src='../js/jQuery.js'>
	</script>
<?php
session_start();
header('Content-Type:text/html;charset=utf-8');
$documentRoot = dirname(__FILE__);
require_once($documentRoot.'../../includes/init.php');
	if($_SESSION['user']=='1')
	{
		echo "您好，您是管理员，具有添加图书，删除图书，注销账号，免费借阅，修改借阅时间的权限";
		echo "<button onclick='add()'>添加图书</button>";
        echo "<button onclick='return()'>还书</button>";

	}
	else if($_SESSION['user']=='2')
	{
		echo "<a href=''>电子书下载</a>";
		echo "您是教师，借阅图书免费";
	}
	else if($_SESSION['user']=='3')
	{
		echo "你好，您是学生，借阅图书超过一个月将收取少量费用";
	}
	else
	{
		echo "无法判别身份";
	}
?>
<b><a href='logOut.php'>退出登录</a></b>
	<body>
	<h1>图书馆借阅系统</h1>
	<?php
	$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbUser,$dbpw);
	$sql = "select * from books_info";
	$stmt=$pdo->query($sql);
	$res = $stmt->fetchAll();
	for($v=0;$v<count($res);)
	{
		$booksNameRes = iconv('gbk','utf-8',$res[$v]['books_name']);
		$booksAuthorRes = iconv('gbk','utf-8',$res[$v]['books_author']);
		$pressRes = iconv('gbk','utf-8',$res[$v]['press']);
		$booksImageRes = iconv('gbk','utf-8',$res[$v]['books_image']);
		echo "<hr />";
		echo "图书名：".$booksNameRes."<br />";
		echo "作者：".$booksAuthorRes."<br />";
		echo "出版社：".$pressRes."<br />";
		$_SESSION['id']=$res[$v]['books_id'];
		echo "<img src='".'../'.$booksImageRes."' width=180px height=200px /"."<br />";
		echo "<a href='borrow.php?id=".$_SESSION['id']."'>借阅</a>"."&nbsp;";
		if($_SESSION['user']=='1')
		{
			echo "<a href='delete.php?id=".$_SESSION['id']."'>删除图书</a>";
		}
		$v++;
	}
?>
<script>
function add()
{
	window.location.href='../views/addBook.html';
}
</script>
<?php if($_SESSION['user']=='1'){?>	
<?php
}?>
</body>
</html>