<?php
// 处理删除操作的页面 
require "dbconfig.php";
// 连接mysql
$link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("提示：数据库连接失败！");

// 编码设置
mysqli_query($link,"set names utf8");

$id = $_GET['assetsId'];
//删除指定数据  
$sql= "DELETE FROM checksheet WHERE assetsId={$id}";
if(mysqli_query($link, $sql)){
    echo '删除成功';
}else{
    echo '删除失败:'.mysqli_error($link);
} 
// 删除完跳转到首页
header("Location:index.php");  


