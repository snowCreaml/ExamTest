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
		<a class="navbar-brand" href="boss.html"></a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">导航条</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav" id="nav-list">
                <li><a href="/arms/Application/Admin/View/Index/hzcx.html">患者管理</a></li>
                <li><a href="/arms/index.php?m=admin&c=index&a=tzgl">通知管理</a></li>
                <li><a href="/arms/Application/Admin/View/Index/aqsz.html">安全设置</a></li>
                <li><a href="/arms/index.php?m=admin&c=index&a=yhgl1">用户管理</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
<h2>用户管理</h2>
<!--   <div class="row">
    <div class="col-sm-6" style="background-color:yellow;">
    </div>
    <div class="col-sm-6" style="background-color:pink;">
    </div>
  </div>  -->
	<div class="row">
    <div class="col-sm-6">
	<form action="/arms/index.php?m=admin&c=index&a=yhgl" method="post">
	<div class="form-inline">
		<label for="doctorid">账号:</label>
		<input type="text" class="form-control" id="doctorid" name="doctorid">
    </div><br>
	<div class="form-inline">
		<label for="password">密码:</label>
		<input type="text" class="form-control" id="password" name="password">
    </div><br>
	<div class="form-inline">
		<label for="name">姓名:</label>
		<input type="text" class="form-control" id="name" name="name">
    </div><br>
	<div class="form-inline">
		<label for="phonenumber">电话:</label>
		<input type="text" class="form-control" id="phonenumber" name="phonenumber">
    </div><br>
	<div>
		<label for="yornmanager">是否为管理员:</label>
		<label class="radio-inline">
			<input type="radio" name="yornmanager" value="1" id='yornmanager' checked>是
		</label>
		<label class="radio-inline">
			<input type="radio" name="yornmanager" value="2" id='yornmanager'>否
		</label>
	</div><br>
	<input type="submit" class="btn" value="添加">
	</form> 
	</div>

    <div class="col-sm-6">
	<table class="table table-striped" border='0'>
	<tr>
	<th>用户</th>
	<th>姓名</th>
	</tr>
	<tr>
	<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($vo["doctorid"]); ?></td>
	<td><?php echo ($vo["name"]); ?></td>
	</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</table>
	</div>
	</div>
</body>


</html>