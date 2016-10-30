<?php
session_start();
header('Content-type:text/html;charset=utf-8');
$documentRoot = dirname(__FILE__);
require_once($documentRoot.'../../includes/init.php');
?>
<p>请确认以下借书信息</p>
<?php
$id=$_GET['id'];
if($id==0)
{
	$id=0;
}
else
{
	$id=$id-1;
}
$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbUser,$dbpw);
	$sql = "select * from books_info";
	$stmt=$pdo->query($sql);
	$res = $stmt->fetchAll();
	$booksNameRes = iconv('gbk','utf-8',$res[$id]['books_name']);
	$booksAuthorRes = iconv('gbk','utf-8',$res[$id]['books_author']);
	$pressRes = iconv('gbk','utf-8',$res[$id]['press']);
    echo "图书名称：".$booksNameRes."<br />";
    echo "作者：".$booksAuthorRes."<br />";
    echo "借书人：".$_SESSION['userName']."<br />";
	switch($_SESSION['user']){
		case 1:$user="管理员";break;
		case 2:$user="教师";break;
		case 3:$user="学生";break;
	}
    echo "借书身份：".$user;
	$insertSql="INSERT INTO borrow(books_id,books_name,user_name,user_id) VALUES (".$id.",'".$res[$id]['books_name']."','"
	.$_SESSION['userName']."',".$_SESSION['user'].")";
	$InsertStmt=$pdo->exec($insertSql);
	echo "<b><p>如有疑问请联系管理员</p></b>"."<br />";
	echo "借书成功<a href='library.php'>点击返回</a>";
?>
