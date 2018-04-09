 <?php 
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>填写信息</title>
<style>
	h1{
		text-align:center;
	}
	body{
		background-color:#ebebeb;
	}
	#container{
		height:95%;
		width:95%;
		background-color: #fff;
		position:relative;
		left:2.5%;
		top:2.5%;
	}
	#container_h{
		position:relative;
		top:5%;
		text-align:center;
	}
	#container_text{
		position: relative;
		top:5%;
		text-align:left;
	}
</style>
</head>
<body>
	<div id="container">
	<div id="container_h"></div>
	<div id="container_text">
	<?php
		header("Content-Type:text/html;charset=utf-8");
		header("Cache-Control:no-cache");
//		error_reporting( E_ALL&~E_NOTICE );
		@$object=$_POST['object'];
//		echo $object;
//		echo "hhh";
		$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951"); 
		$pdo->query("SET NAMES utf8"); 
		@$object=$_SESSION['object'];
//		echo $object;
		$sql="select test_id from test where test_name=".'"'.$object.'"';
//		echo $sql;
		$result_test=$pdo->query($sql);
		$row_test=$result_test->fetch();
		$test_id=$row_test['test_id'];
//		读取item中的属性值
		$sql="select item_id,item_name,item_type from item where test_id=$test_id";
//		echo $sql;
		$result_item=$pdo->query($sql);
		$row_item=$result_item->fetchall();
//		var_dump($row_item);
		if($row_item)
			$row_item_cnt=count($row_item);
		else
			$row_item_cnt=0;
//		echo $row_item_cnt;
		//查询单选选项
		$num_select1=0;
//		$num_option1=0;
		//$num_select[]存储每道选择题个数
		//$num_option1&$num_option2为上一个里面的参数
		for($i=0;$i<$row_item_cnt;$i++){
			$sql="select opt_id,opt_content from opt where item_id="."'".$row_item[$i]['item_id']."'";
//			echo $sql;
//			echo "</br>";
			$result_opt=$pdo->query($sql);
			$row_opt=$result_opt->fetchall();
//			var_dump($row_opt);
			$row_opt_cnt=count($row_opt);
//			echo $row_opt_cnt;
//			echo "</br>";
			$num_select[$i]=$row_opt_cnt;
			for($j=0;$j<$row_opt_cnt;$j++){
//				echo $row_opt[$j]['opt_content'];
				@$array_opt[$i][$j]=array('opt_content' => $row_opt[$j]['opt_content'], 'opt_id' => $row_opt[$j]['opt_id'],'item_id' => $row_item[$i]['item_id']);
			}
		}
//		var_dump($array_opt);
//		var_dump($num_select);
//		输出题目
		echo "<h1>".$object."</h1>";
		echo "<form action=".'"'."infoSubmit.php".'"'." method=".'"post"'.">";
		$num_option2=0;
		for($i=0;$i<count($row_item);$i++){
			echo $row_item[$i]['item_name']."<br/>";
			if($row_item[$i]['item_type']=="1"){
				for($j=0;$j<$num_select[$i];$j++){
					echo "<input name=".'"'.$row_item[$i]['item_id'].'"'." type=".'"radio"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];		
				}
			}
			else if($row_item[$i]['item_type']=="2"){
				echo "<select name=".'"'.$row_item[$i]['item_id'].'"'.">";
				for($j=0;$j<$num_select[$i];$j++){
					echo "<option value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content']."</option>";
				}
				echo "</select>";
			}
			else if ($row_item[$i]['item_type']=="3") {
				for($j=0;$j<$num_select[$i];$j++){
					echo "<input name=".'"'.$row_item[$i]['item_id']."[]".'"'." type=".'"checkbox"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];
						
				}
			}
			else if($row_item[$i]['item_type']=="4"){
				echo "<input type=".'"text"'." name=".'"'.$row_item[$i]['item_id'].'"'.">";
			}
			echo "<br/>";
			echo "<br/>";
		}
//		echo "<input type=".'"'."submit".'"'." value=".'"'."提交".'"'.">";
		echo "</form>";
	?>
	</div>
	</div>
</body>
</html>