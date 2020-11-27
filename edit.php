<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改资产信息</title>
    <style type="text/css">
    body{
        display: flex;
    }
    form {
        margin: auto;
    }

    .box {
        padding: 10px;
    }
    label{
        width: 100px;
        display: inline-block;
    }
    input{
        width: 200px;
    }
    input[type='submit']{
        background: cornflowerblue;
        border: none;
        color: #fff;
        padding: 5px;
    }
</style>
</head>
<body>
<?php
    require "dbconfig.php";

    $link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("提示：数据库连接失败！");
   
    mysqli_query($link,"set names utf8");
    
    $id = $_GET['assetsId'];
    $sql = "SELECT * FROM checksheet WHERE assetsId=$id";
    $ss = mysqli_query($link,$sql);
    $sql_arr = mysqli_fetch_array($ss); 

?>

<form action="action-edit.php" method="post">
<h2 style="text-align: center;">修改资产管理</h2>
        <div class="box">
            <label>资产ID：</label><input type="text" name="assetsId" value="<?php echo $sql_arr['assetsId']?>">
        </div>
        <div class="box">
            <label>资产编码：</label><input type="text" name="code" value="<?php echo $sql_arr['code']?>">
        </div>
        <div class="box">
            <label>资产名称：</label><input type="text" name="goods" value="<?php echo $sql_arr['goods']?>">
        </div>
        <div class="box">
            <label>资产负责人：</label><input type="text" name="owner" value="<?php echo $sql_arr['owner']?>">
        </div>
        <div class="box">
            <label>资产负责部门：</label><input type="text" name="department" value="<?php echo $sql_arr['department']?>">
        </div>
        <div class="box">
            <label>资产数量：</label><input type="number" name="assetsNum" value="<?php echo $sql_arr['assetsNum']?>">
        </div>
        <div class="box">
            <label>资产单位：</label><input type="text" name="unit" value="<?php echo $sql_arr['unit']?>">
        </div>
        <!-- <div class="box">
            <label>资产二维码：</label><input type="text" name="qrcode" value="<?php echo $sql_arr['qrcode']?>">
        </div> -->
        <div class="box">
            <label>发布时间：</label><input type="date" name="inventoryDate" value="<?php echo $sql_arr['inventoryDate']?>">
        </div>
        <div class="box" style="text-align: center;">
            <input type="submit" value="修改资产">
        </div>
</form>

</body>
</html>
