<?php
// 处理增加操作的页面 
require "dbconfig.php";
// 连接mysql
$link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("提示：数据库连接失败！");

// 编码设置
mysqli_query($link,"set names utf8");

// 获取增加的字段
$code = $_POST['code'];
$goods = $_POST['goods'];
$owner = $_POST['owner'];
$department = $_POST['department'];
$assetsNum = $_POST['assetsNum'];
$unit = $_POST['unit'];
// $qrcode = $_POST['qrcode'];
$inventoryDate = $_POST['inventoryDate'];
// 插入数据
$sql= "INSERT INTO checksheet(code,goods,owner,department,assetsNum,unit,inventoryDate) VALUES ('$code','$goods','$owner','$department','$assetsNum','$unit','$inventoryDate')";
// echo $sql;
if(mysqli_query($link, $sql)){
    echo '插入成功';
}else{
    echo '插入失败:'.mysqli_error($link);
}
header("Location:index.php");  

