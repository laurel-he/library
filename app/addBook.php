<?php
header('Content-Type:text/html;charset=utf-8');
$documentRoot = dirname(__FILE__);
require_once($documentRoot.'../../includes/init.php');
?>
<?php
if($_POST['sub'])
{
	$dsn = "mysql:host=".$dbhost.";dbname=".$dbName;
	$pdo = new PDO($dsn,$dbUser,$dbpw);
	//图片上传
	$file=$_FILES['images'];

	//在数据库里面存储的路径和在这里需要调用的路径是不一样的
	$upfile='../views/images';
	$upf='views/images/';
	$a=rand(1,100);
	$arrType=array('image/jpeg','image/gif','image/png','image/bmp','image/jpg');
    $max_size='800000'; 
	$fname=$file['name'];
	$picName=$upfile."/".$a.$fname;
	$picN=$upf.$a.$fname;
move_uploaded_file($file['tmp_name'],$picName);
if(is_uploaded_file($file['tmp_name'])){ 
if($file['size']>$max_size){  //判断文件大小是否大于500000字节
echo "<font color='#FF0000'>上传图片太大！</font>";
exit;
}
if(!in_array($file['type'],$arrType)){  //判断图片文件的格式
 echo "<font color='#FF0000'>图片格式不对！</font>";
 exit;
}
if(!file_exists($upfile)){  // 判断存放文件目录是否存在
mkdir($upfile,0777,true);
} 
$imageSize=getimagesize($file['tmp_name']);
$img=$imageSize[0].'*'.$imageSize[1];
$fname=iconv('utf-8', 'gbk', $file['name']);
$ftype=explode('.',$fname);
$a=rand(1,2000);
$picName=$upfile."/".$a.$fname;
// $picName=$upfile."/cloudy".$fname;
if(!move_uploaded_file($file['tmp_name'],$picName)){ 
echo "<font color='#FF0000'>移动文件出错！</font>";
exit;
}
  } 
  
	
	$bookName=iconv('utf-8', 'gbk', $_POST['bookName']);
	//$bookISBN=iconv('utf-8', 'gbk', $_POST['bookISBN']);
	$books_author=iconv('utf-8', 'gbk', $_POST['bookAuthor']);
	$press=iconv('utf-8', 'gbk', $_POST['press']);
    $sql="INSERT INTO books_info(books_name,books_ISBN,books_author,press,books_image) values('".$bookName."','"
	.$_POST['bookISBN']."','".$books_author."','".$press."','".$picN."')";
	$stmt=$pdo->exec($sql);
	echo "<script>alert('添加图书成功，请选择返回或继续添加');</script>";
	echo "<a href='library.php'>返回浏览页面</a>";
	echo "<a href='../views/addBook.html'>继续添加</a>";
}
?>
