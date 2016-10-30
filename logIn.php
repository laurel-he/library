<?php
header('Content-type:text/html;charset=utf-8');
$documentRoot = dirname(__FILE__);
require_once($documentRoot.'/includes/init.php');
   $user_name = $_POST['userName'];
   $user_password = $_POST['userPw'];
   $dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
   $userName=$dbUser;
   $password=$dbpw;
   try
{
	$pdo = new PDO($dsn,$userName,$password);
    $sql = "INSERT INTO students(student_name,password) VALUES ('".$user_name."','".$user_password."')";
    $stmt = $pdo->exec($sql);
    if($stmt)
    {
      echo "注册成功，3秒后返回首页，如果返回失败请点击<a href='index.php'>这里</a>";
	  echo "<meta http-equiv='refresh' content=3;URL='index.php'>";
    }
}
 catch(PDOException $e)
 {
 	print "ERROR:".$e->getMessage()."<br />";
 	die();
 }
// if($_SESSION['user'] = 1)
// {
// 	 $sql = "select * from admin where admin_name=".$name."
// 	 and password=".$password;
// }
  
?>