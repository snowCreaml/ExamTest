<?php
session_start();
//post方式很重要的两句话
header("Content-Type:text/html;charset=utf-8");
header("Cache-Control:no-cache");
$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951");
$pdo->query("SET NAMES utf8");	
$submit=$_POST['submit'];
$array1=$_SESSION['array1'];
$count1=count($array1);
$array2=$_SESSION['array2'];
$count2=count($array2);
$answer=$_SESSION['answer'];
$count=count($answer);
$test_id=$_SESSION['test_id'];
if($submit){
	for($index=0;$index<$count1;$index++){
		$item_name=$array1[$index]['name'];
		$item_type=$array1[$index]['state'];
		$item_id=$array1[$index]['number'];
		$item_value=$array1[$index]['value'];
		$pdo -> exec("insert into item(`test_id`,`item_type`,`item_name`,`item_value`) values ('$test_id','$item_type','$item_name','$item_value')");
	}
	for($index=0;$index<$count2;$index++){
		$opt_content=$array2[$index]['content'];
		$item_id=$array2[$index]['number'];
		$pdo -> exec("insert into opt(`item_id`,`test_id`,`opt_content`) values('$item_id','$test_id','$opt_content')");
	}
//	var_dump($answer);
	for($index=0;$index<count($answer);$index++){
		$item_id=$answer[$index]['number'];
		$ans=$answer[$index]['answer'];
//		echo $ans;
		$sql="select `opt_id` from opt where `item_id`=$item_id and `opt_content`='$ans' and `test_id`=$test_id";
		$result=$pdo->query($sql);
//		var_dump($result);
		$row=$result->fetch();
     	$num= $row['opt_id'];
		$pdo->exec("insert into answer(`item_id`,`answer_id`,`test_id`) values('$item_id','$num','$test_id')");
	}
}
?>