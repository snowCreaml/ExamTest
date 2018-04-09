<?php
session_start();
header("Content-Type: text/html;charset=utf-8"); 
$test_name=$_POST['test_name'];
$item_num=$_POST['item_num'];
$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951"); 
$pdo->query("SET NAMES utf8"); 
$pdo -> exec("insert into test(`test_name`,`item_num`) values('$test_name','$item_num')");
$_SESSION['test_id']=$pdo -> lastinsertid();
?>
<html> 
	<head>
	<title>add</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<style type="text/css">
	*{
		margin:0;
		padding:0;
		outline:none;
		border-radius:0;
	} 
	html,body{
		width:100%;
		height:100%;
		font=family:"Helvetica Neue",Helvetica,Arial;
		background-color:#ebebeb;
	}
	#toolbar{
		height:30px;
		background-color:#ebebeb;
		width:100%;
		color:#fff;
		line-height:50px;
	}
	#container{
		overflow:auto;
		position:absolute;
		bottom:0;
		left:0;
		right:0;
		top:50;
	}
	#editor-column,#preview-column{
		width:49.5%;
		height:100%;
		overflow:auto;
		position:relative;
		background-color:#fff;
	}
	.pull-left{
		float:left;
	}
	.pull-right{
		float:right;
	}

	</style>
	<script src="my.js" type="text/javascript"> </script>
	<script type="text/javascript"></script>
</head>
	<body>
		<div id="toolbar">
			<button onclick="preview()" style="height:30px;width:100px;">预览</button>
			<button onclick="submit()" style="height:30px;width:100px;">提交</button>
		</div>
		<div id="container">
			<div id="editor-column" class="pull-left">
				<div id="panel-editor">
				<div name="editor" id="editor-" contenteditable="true" onkeyup="writeIn()">
<div>【单选1】1、我是一道单选题【C】【10】</div>
<div>我是A选项</div>
<div>我是B选项</div>
<div>我是C选项</div>
<div>我是D选项，选项再多就该选单选2了哦</div>
<div>【多选】2、我是一道多选题【AC】【10】</div>
<div>我是A选项</div>
<div>我是B选项</div>
<div>我是C选项</div>
<div>我是D选项</div>
<div>【单选2】3、我是一道单选题【D】【10】</div>
<div>我是A选项</div>
<div>我是B选项</div>
<div>我是C选项</div>
<div>我是D选项</div>
<div>我是E选项</div>
<div>【文本】4、我是文本题【20】</div>
				</div>
				</div>
			</div>

			<div id="preview-column" class="pull-right">
				<div id="panel-preview">
				<div name="preview" id="preview-">
					
				</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript">
	var myXmlHttpRequest;
	function writeIn(){
		myXmlHttpRequest=getXmlHttpObject();
		if(myXmlHttpRequest){
			var url="updateMark.php";
			var data="editor="+$("editor-").innerHTML;
			myXmlHttpRequest.open("post",url,true);
			//post要加上的两行神奇代码
			myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

			myXmlHttpRequest.onreadystatechange=chuli;
			myXmlHttpRequest.send(data);

			}
		//window.alert("aaa");
	}
	function submit(){
		var url="submit.php";
		var sub="submit="+1;
		myXmlHttpRequest.open("post",url,true);
		myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		myXmlHttpRequest.send(sub);
		window.location.href="http://localhost/TEST/";
	}
	function preview(){
		var data=$("preview-").innerHTML;
		window.open("http://localhost/TEST/preview.php?"+"preview="+data,"_blank","toolbar=yes, location=yes, directories=no, status=no, menubar=yes, scrollbars=yes, resizable=no, copyhistory=yes, width=400, height=400")
    }
	function chuli(){
		//window.alert("ccc");
		if(myXmlHttpRequest.readyState==4&&myXmlHttpRequest.status==200){
			//window.alert("bbb");
			$("preview-").innerHTML=myXmlHttpRequest.responseText;

		}
	}
	</script>
</html>