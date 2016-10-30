<?php
header('Content-type:text/html;charset=utf-8');
session_start();
session_destroy();
echo "<script>alert('退出登录成功');window.location.href='../index.php'</script>";
?>