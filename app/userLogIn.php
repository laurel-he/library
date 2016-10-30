<?php 
	require('includes/init.php');
 ?>
<head>
	<title>会员注册</title>
	<link rel="stylesheet" type="text/css" href="css/logIn.css">
</head>
<body>
	<div id="content">
		<h1>
 	会员注册
</h1>
<form method="post" action="">
	<p class= "logIn">用户名：*</p><input type="text" name="userName" /><br /><br /><br />
	<p class= "logIn">密码： * </p><input type="password" name="password" /><br /><br /><br />
	<p class= "logIn">出生日期： </p><input type="text" name="birthday" /><br /><br /><br />
	<p class= "logIn">密保问题：* </p><input type="text" name="mibao" /><br /><br /><br />
	<input type="submit" name="sub" id="sub"/>
</form>
	</div>
</body>
<?php 
if($_POST['userName'])
{
$userName = $_POST['userName'];
$password = $_POST['password'];
$mibao = $_POST['mibao'];
try
{
	$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbName,$dbpw);
	$sql = "INSERT INTO admin(admin_name,password) VALUES (".
	$userName.",".$password.")";
	$stmt = $pdo->exec($sql);
	$res = $stmt->fetchAll();
	var_dump($res);die();
}
catch(PDOException $e)
{
	$e->getMessage();
}
}
 ?>
