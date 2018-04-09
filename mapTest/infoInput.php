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
		$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951"); 
		$pdo->query("SET NAMES utf8"); 
		@$object=$_SESSION['object'];
//		echo $object;
		$sql="select test_id from test where test_name=".'"'.$object.'"';
//		echo $sql;
		$result_test=$pdo->query($sql);
		$row_test=$result_test->fetch();
		$test_id=$row_test['test_id'];
		$_SESSION['test_id']=$test_id;
//		读取item中的属性值, 将同一张卷的所有题目获取出来
		$sql="select item_id,item_name,item_type from item where test_id=$test_id";
//		echo $sql;
		$result_item=$pdo->query($sql);
		$row_item=$result_item->fetchall();
//		 var_dump($row_item);
		if($row_item)
			$row_item_cnt=count($row_item);
		else
			$row_item_cnt=0;
//		echo $row_item_cnt;
		$_SESSION['item']=$row_item;
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
// 		$unique=true;
// 		if(!isset($random)){
// 			$random=range(0,$row_item_cnt-1);
// 		}

// 		//把数组中的元素按随机顺序重新排序：
// 		shuffle($random);
// //		var_dump($random);
// 		echo "<h1>".$object."</h1>";
// 		echo "<form action=".'"'."infoSubmit.php".'"'." method=".'"post"'.">";
// 		$num_option2=0;
	//原输出题目代码	
		// for($k=0;$k<count($random);$k++){
		// 	$i=$random[$k];
		// 	echo $row_item[$i]['item_name']."<br/>";
		// 	if($row_item[$i]['item_type']=="1"){
		// 		for($j=0;$j<$num_select[$i];$j++){
		// 			echo "<input name=".'"'.$row_item[$i]['item_id'].'"'." type=".'"radio"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];		
		// 		}
		// 	}
		// 	else if($row_item[$i]['item_type']=="2"){
		// 		echo "<select name=".'"'.$row_item[$i]['item_id'].'"'.">";
		// 		for($j=0;$j<$num_select[$i];$j++){
		// 			echo "<option value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content']."</option>";
		// 		}
		// 		echo "</select>";
		// 	}
		// 	else if ($row_item[$i]['item_type']=="3") {
		// 		for($j=0;$j<$num_select[$i];$j++){
		// 			echo "<input name=".'"'.$row_item[$i]['item_id']."[]".'"'." type=".'"checkbox"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];
						
		// 		}
		// 	}
		// 	else if($row_item[$i]['item_type']=="4"){
		// 		echo "<input type=".'"text"'." name=".'"'.$row_item[$i]['item_id'].'"'.">";
		// 	}
		// 	echo "<br/>";
		// 	echo "<br/>";
		// }
		// echo "<input type=".'"'."submit".'"'." value=".'"'."提交".'"'.">";
		// echo "</form>";
	//新写分页代码		
		// if(!isset($item_num)){

		
		// 	$item_num=0;

		// }
		// else{
		// 	$item_num=$_GET['item_num'];
		// }
			
		// 	echo "<form action=".'"'."infoSubmit.php".'"'.'"post"'.">";
			
		// 	for($n=0;$n<2;$n++){
		// 		$item_num++;

		// 		if($item_num==count($row_item_cnt)){
		// 			$item_num=0;
		// 			break;
		// 		}

		// 		$i=$random[$item_num-1];
		// 		echo $row_item[$i]['item_name']."<br/>";
		// 		if($row_item[$i]['item_type']=="1"){
		// 			for($j=0;$j<$num_select[$i];$j++){
		// 				echo "<input name=".'"'.$row_item[$i]['item_id'].'"'." type=".'"radio"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];		
		// 			}
		// 		}
		// 		else if($row_item[$i]['item_type']=="2"){
		// 			echo "<select name=".'"'.$row_item[$i]['item_id'].'"'.">";
		// 			for($j=0;$j<$num_select[$i];$j++){
		// 				echo "<option value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content']."</option>";
		// 			}
		// 			echo "</select>";
		// 		}
		// 		else if ($row_item[$i]['item_type']=="3") {
		// 			for($j=0;$j<$num_select[$i];$j++){
		// 				echo "<input name=".'"'.$row_item[$i]['item_id']."[]".'"'." type=".'"checkbox"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];
						
		// 			}
		// 		}
		// 		else if($row_item[$i]['item_type']=="4"){
		// 			echo "<input type=".'"text"'." name=".'"'.$row_item[$i]['item_id'].'"'.">";
		// 		}


		// 	}
		// 	echo "</form>";
		// 		echo '<a href="?item_num='.$item_num.'">'.'"下一页"'.'</a>';


		//分页设计
		$pagesize = 2;
		if(empty($_GET["page"])){
			$page = 1;
			$startrow = 0;	//每次获取的题目的位置
		}
		else{
			$page = (int)$_GET["page"];
			$startrow = ($page-1)*$pagesize;
		}

		$pages = ceil($row_item_cnt/$pagesize);
		//echo $pages;
		echo $test_id;
		$sql="select item_id,item_name,item_type from item where test_id=$test_id LIMIT $startrow,$pagesize";
		$result2 = $pdo->query($sql);
		$row_item2=$result2->fetchall();

		var_dump($row_item2);
		$row_item_cnt2 = count($result2);

		for($i=0;$i<$row_item_cnt2;$i++){
			$sql="select opt_id,opt_content from opt where item_id="."'".$row_item2[$i]['item_id']."'";
//			echo $sql;
//			echo "</br>";
			$result_opt=$pdo->query($sql);
			$row_opt=$result_opt->fetchall();
			var_dump($row_opt);
			$row_opt_cnt=count($row_opt);
//			echo $row_opt_cnt;
//			echo "</br>";
			$num_select[$i]=$row_opt_cnt;
			for($j=0;$j<$row_opt_cnt;$j++){
//				echo $row_opt[$j]['opt_content'];
				@$array_opt[$i][$j]=array('opt_content' => $row_opt[$j]['opt_content'], 'opt_id' => $row_opt[$j]['opt_id'],'item_id' => $row_item[$i]['item_id']);
			}
		}
		echo $row_item_cnt2;

		// for($i=0;$i<$row_item_cnt2;i++){

		// //for($k=0;$k<count($random);$k++){
		// 	//$i=$random[$k];

		// 	echo "<form action=".'"infosubmit.php"'." method=".'"get"'.">";
		// 	echo "啊啊啊";
		// 	echo $row_item2[$i]['item_name']."<br/>";
		// 	if($row_item2[$i]['item_type']=="1"){
		// 		for($j=0;$j<$num_select[$i];$j++){
		// 			echo "<input name=".'"'.$row_item2[$i]['item_id'].'"'." type=".'"radio"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];		
		// 		}
		// 	}
		// 	else if($row_item2[$i]['item_type']=="2"){
		// 		echo "<select name=".'"'.$row_item2[$i]['item_id'].'"'.">";
		// 		for($j=0;$j<$num_select[$i];$j++){
		// 			echo "<option value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content']."</option>";
		// 		}
		// 		echo "</select>";
		// 	}
		// 	else if ($row_item2[$i]['item_type']=="3") {
		// 		for($j=0;$j<$num_select[$i];$j++){
		// 			echo "<input name=".'"'.$row_item2[$i]['item_id']."[]".'"'." type=".'"checkbox"'." value=".'"'.$array_opt[$i][$j]['opt_id'].'"'.">".$array_opt[$i][$j]['opt_content'];
						
		// 		}
		// 	}
		// 	else if($row_item2[$i]['item_type']=="4"){
		// 		echo "<input type=".'"text"'." name=".'"'.$row_item2[$i]['item_id'].'"'.">";
		// 	}
		// 	echo "<br/>";
		// 	echo "<br/>";
		// //}
		// echo "<input type=".'"'."submit".'"'." value=".'"'."提交".'"'.">";
		// echo "</form>";
		// echo "<a href = 'manage.php?page=$i'>$i</a>";
		// 	$i++;
		// }

	?>
	</div>
	</div>
</body>
</html>