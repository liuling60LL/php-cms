<?php
header("Context-type:text/html;charset=utf-8");
$outData =array(
    'result'=>false,
    'code'=>0,
    'msg'=>'未请求到数据',
    'data'=>array(
        'data'=>[],
        'count'=>0
    ),
);
//连接数据库
require "dbconfig.php";
$conn = mysqli_connect(HOST,USER,PASS,DBNAME) or die("提示：数据库连接失败！");

mysqli_query($conn,"set names utf8");
$sql = 'select * from checksheet order by assetsId asc';
$result = mysqli_query($conn,$sql);
//结果集长度
$num=mysqli_num_rows($result);
$arr=array();
while($row=mysqli_fetch_array($result)){
    $arr[]=$row;
}
// for($i=0; $i<$num; $i++){
//     $row = mysqli_fetch_array($result);
// }
// $row = json_encode($row);
// echo $row;
//修改的值
$outData['result'] =true;
$outData['code']=200;
$outData['msg']='成功';
$outData['data']['data']=$arr;

//转换成json格式
$outData = json_encode($outData);
echo $outData;

//关闭数据库连接
mysqli_free_result($result);
mysqli_close($conn);
