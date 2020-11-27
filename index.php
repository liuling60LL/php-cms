<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>资产管理应用</title>
</head>
<style type="text/css">
.wrapper {width: 1000px;margin: 20px auto;}
h2 {text-align: center;}
.add {margin-bottom: 20px;}
.add a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}
td {text-align: center;}
.qrcode{padding:5px}
a{text-decoration: none;display: inline-block;color: #fff;padding: 5px;font-size: 12px;border-radius: 2px;}
.edit{background: #2196F3;}
.del{background: red}
</style>
<body>
	<div class="wrapper">
		<h2>资产管理应用</h2>
		<div class="add">
			<a href="add.html">增加资产</a>
		</div>
		
		<table width="960" border="1" cellspacing='0'>
			<tr>
				<th>ID</th>
				<th>资产编码</th>
				<th>资产名称</th>
				<th>资产负责人</th>
				<th>资产负责部门</th>
				<th>资产数量</th>
				<th>资产单位</th>
				<th>盘点日期</th>
				<th>资产二维码</th>
				<th>操作</th>
			</tr>
			

			<?php
				// 1.导入配置文件
				require "dbconfig.php";

				// 2. 连接mysql
				$link = mysqli_connect(HOST,USER,PASS,DBNAME) or die("提示：数据库连接失败！");
				
				// 编码设置
				mysqli_query($link,"set names utf8");

				// 3. 从DBNAME中查询到数据库，返回数据库结果集,并降序排列  
				$sql = 'select * from checksheet order by assetsId asc';
				// 结果集
				$result = mysqli_query($link,$sql);
				// var_dump($result);die;

				// 解析结果集,$row为所有数据，$num为资产数目
				$num=mysqli_num_rows($result);
				
				for($i=0; $i<$num; $i++){
					$row = mysqli_fetch_array($result);
					echo "<tr>";
					echo "<td>{$row['assetsId']}</td>";
					echo "<td>{$row['code']}</td>";
					echo "<td>{$row['goods']}</td>";
					echo "<td>{$row['owner']}</td>";
					echo "<td>{$row['department']}</td>";
					echo "<td>{$row['assetsNum']}</td>";
					echo "<td>{$row['unit']}</td>";
					echo "<td>{$row['inventoryDate']}</td>";
					// echo "<td>{$row['qrcode']}</td>";
					echo "<td class='qrcode'></td>";
					// echo "<td><image  src='{$row["qrcode"]}' class='qrcode'/></td>";
					echo "<td>
							<a class='edit' href='edit.php?assetsId={$row['assetsId']}'>修改</a>
							<a class='del' href='javascript:del({$row['assetsId']})'>删除</a>
						  </td>";
					echo "</tr>";
				}
				//5. 释放结果集
				mysqli_free_result($result);
				mysqli_close($link);
			?> 

		</table>
	</div>
	
	<script src="https://www.jq22.com/demo/jeromeetienne-jquery/jquery-1.10.2.min.js"></script>
	<script src="https://www.jq22.com/demo/jeromeetienne-jquery/jquery.qrcode.min.js"></script>
	<script type="text/javascript">
		
		//二维码中文转换
		function toUtf8(str) {   
		var out, i, len, c;   
		out = "";   
		len = str.length;   
		for(i = 0; i < len; i++) {   
			c = str.charCodeAt(i);   
			if ((c >= 0x0001) && (c <= 0x007F)) {   
				out += str.charAt(i);   
			} else if (c > 0x07FF) {   
				out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));   
				out += String.fromCharCode(0x80 | ((c >>  6) & 0x3F));   
				out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));   
			} else {   
				out += String.fromCharCode(0xC0 | ((c >>  6) & 0x1F));   
				out += String.fromCharCode(0x80 | ((c >>  0) & 0x3F));   
			}   
		}   
		return out;    
		}
		// var info =toUtf8('办公电脑');
		// //转换成二维码
		// $('.qrcode').qrcode({
		// 	width:100,
		// 	height:100,
		// 	text:'ZSB0001'
		// });
		function del (id) {
			if (confirm("确定删除吗？")){
				window.location = "action-del.php?assetsId="+id;
			}
		}
		//获取数据
		$.ajax({
			url:'./data.php',
			type:'POST',
			dataType:'json',
			data:{},
			success:function(res){
				const list =res.data.data;
				var str='';
				var info =''
				// console.log('sss',list)
				list.map((item,i)=>{
				// 	str +=`<tr><td>${item.assetsId}</td>
				// 			<td>${item.code}</td>
				// 			<td>${item.goods}</td>
				// 			<td>${item.owner}</td>
				// 			<td>${item.department}</td>
				// 			<td>${item.assetsNum}</td>
				// 			<td>${item.unit}</td>
				// 			<td>${item.inventoryDate}</td>
				// 			<td class='s'></td>
				// 			<td>
				// 			<a href='javascript:del(${item.assetsId})'>删除</a>
				// 			<a href='edit.php?assetsId={${item.assetsId}}'>修改</a>
				// 		  </td>"
				// 			</tr>`;
				// 	console.log(item)
					info=`${item.code},${item.goods},${item.owner},${item.department},${item.assetsNum},${item.unit},${item.inventoryDate}`;
					console.log(info)
				})
				// $('table').append(str)
				let infos=toUtf8(info)
				$('.qrcode').qrcode({
					width:100,
					height:100,
					text:infos
				});
			}
		})
	</script>
</body>
</html>
