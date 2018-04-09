<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	header("Cache-Control:no-cache");
	//$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951");
	//$pdo->query("SET NAMES utf8");	
	include './connect.php';
//	var_dump($_SESSION['item']);
	$array_item=$_SESSION['item'];
	$row_item_cnt=count($array_item);
//	echo $row_item_cnt;
	$test_id=$_SESSION['test_id'];
//	echo $test_id;
	//$answer[]存储答案
	$answer=array();
	for($i=0;$i<$row_item_cnt;$i++){
		$item_id=$array_item[$i]['item_id'];
		if ($array_item[$i]['item_type']==3) {
			$answer=$_POST[$array_item[$i]['item_id']];
			for ($j=0;$j<count($answer);$j++) { 
//				echo $array_item[$i]['item_id'];
				$pdo->exec("insert into record(`test_id`,`answer_id`,`item_id`) values('$test_id','$answer[$j]','$item_id')");
			}
		}
		else if($array_item[$i]['item_type']==4){
			@$answer1=$_POST[$array_item[$i]['item_id']];
			$pdo->exec("insert into record(`test_id`,`content`,`item_id`) values('$test_id','$answer1','$item_id')");
		}
		else if($array_item[$i]['item_type']==1||$array_item[$i]['item_type']==2){
			@$answer1=$_POST[$array_item[$i]['item_id']];
			$pdo->exec("insert into record(`test_id`,`answer_id`,`item_id`) values('$test_id','$answer1','$item_id')");
		}
	}
	$score=0;
	$sql1="select item_id,item_type,item_value from item where test_id=$test_id";
	$result1=$pdo->query($sql1);
	$row1=$result1->fetchall();
//	var_dump($row1);
	for ($i=0;$i<count($row1);$i++){ 
		$item_id=$row1[$i]['item_id'];
		$sql2="select answer_id from answer where test_id=$test_id and item_id=$item_id";
		$result2=$pdo->query($sql2);
		$row2=$result2->fetchall();
//		var_dump($row2);
		$sql3="select answer_id from record where test_id=$test_id and item_id=$item_id";
		$result3=$pdo->query($sql3);
		$row3=$result3->fetchall();
//		var_dump($row3);
		if ($row3==$row2){
			$score=$score+$row1[$i]['item_value'];
		}
	}
    echo $score;
	//$t=time();
	$ip=$_SERVER['REMOTE_ADDR']; 
	date_default_timezone_set('PRC');
	$time=date("Y-m-d H:i:sa");
	$pdo->exec("insert into user(`test_id`,`time`,`ip`,`score`) values('$test_id','$time','$ip','$score')");
	//echo "<script language=\"JavaScript\">alert(\"你的选择题成绩为$score\");location.replace(\"index.php\")</script>";
?>
<!--<!DOCTYPE>
<html>
	<style>
		body{
			background-color: #ebebeb;
		}
		#center{
			position:relative;
			text-align:center;
			top:10%;
		}
	</style>
	<script type="text/javascript">
		setTimeout("window.close()",3000);
	</script>
	<body>
		<div id="center">
			<h2>提交成功</h2>
			<p>三秒后自动关闭</p>
		</div>
	</body>
</html>-->