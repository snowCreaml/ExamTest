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
	<h2>查询结果</h2>
	<table class="table table-striped" border='0'>
		<table class="table table-striped" align="center" border='0' id="senfe">
			<thead> 
				<tr align='center'>
					<th>患者姓名</th>
					<th>身份证号</th>
					<th></th>
				</tr>
			</thead> 
			<tbody id="group_one"> 
				<tr>
				<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["idnumber"]); ?></td>
					<td><a href='/arms/index.php?m=admin&c=index&a=hzcx1&name=<?php echo ($vo["name"]); ?>&idnumber=<?php echo ($vo["idnumber"]); ?>'>详情</a></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tr>
			</tbody> 
		</table>
	<a href="/arms/Application/Admin/View/Index/hzcx.html" class="btn btn-default" role="button">返回继续查询</a>
</div>
</body>
</html>