<?php
// 处理编辑操作的页面 
require "dbconfig.php";
// 连接mysql
$link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("提示：数据库连接失败！");

// 编码设置
mysqli_query($link,"set names utf8");

// 获取修改的字段
$assetsId = $_POST['assetsId'];
$code = $_POST['code'];
$goods = $_POST['goods'];
$owner = $_POST['owner'];
$department = $_POST['department'];
$assetsNum = $_POST['assetsNum'];
$unit = $_POST['unit'];
// $qrcode = $_POST['qrcode'];
$inventoryDate = $_POST['inventoryDate'];
// 更新数据
$sql="UPDATE checksheet SET code='$code',goods='$goods',owner='$owner',department='$department',assetsNum='$assetsNum',unit='$unit',inventoryDate='$inventoryDate' WHERE assetsId=$assetsId";
if(mysqli_query($link, $sql)){
    echo '修改成功';
}else{
    echo '修改失败:'.mysqli_error($link);
} 
header("Location:index.php");  

