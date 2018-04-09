<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="width=device-width"/>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
<header class="main-header"  style="background-image: url(http://image.golaravel.com/5/c9/44e1c4e50d55159c65da6a41bc07e.jpg)"">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                    <h1 align="left">乙型肝炎评估管理监测系统</h1>
                    

                    <img src="http://image.golaravel.com/e/b0/4e4bd788405aab87f03d26edc4ab4.png" alt="Laravel" class="hide">
                </div>

               
            </div>
        </div>
    </header>
<nav class="navbar navbar-default " role="navigation">
   
	
	<div class="container">
        <div class="navbar-header">
		
		<a class="navbar-brand" align="center" href="index.html"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">导航条</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="nav-list">
              
            </ul>
        </div>
    </div>
</nav>


<div class="container">
	<h2>登录</h2>
	<form class="form-horizontal" name="doctorlogin" action="/arms/index.php?m=admin&c=login&a=check" method="post">
	<div class="form-inline">
		<label for="doctorid">账号:</label>
		<input type="text" class="form-control" id="doctorid" name="doctorid">
    </div>
<br><br>
	<div class="form-inline">
		<label for="password">密码:</label>
		<input type="password" class="form-control" id="password" name="password">
    </div>
	<a href='/arms/Application/Admin/View/Login/wjmm.html'>忘记密码？</a>
<br><br>
<p><input type="submit" class="btn btn-default" name="submit" value="登录"></p>
</form>
</div>

</body>

</html>