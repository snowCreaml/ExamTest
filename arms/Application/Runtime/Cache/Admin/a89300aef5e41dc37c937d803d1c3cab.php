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
<script src="/arms/Public/js/admin/fenye.js"></script>
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
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#home">复诊通知</a></li>
		<li><a data-toggle="tab" href="#menu1">普通通知</a></li>
	</ul>
	<br>
	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<div class="row">
				<div class="col-sm-6">
				</div>
				<div class="col-sm-6">
					<form action="/arms/index.php?m=admin&c=index&a=czhz"  method="post">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search" name="search">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<table class="table table-striped" align="center" border='0' id="senfe">
				<thead> 
				<tr align='center'>
					<th>患者姓名</th>
					<th>身份证</th>
					<th>通知状态</th>
					<th>通知时间</th>
				</tr>
				</thead> 
				<tbody id="group_one"> 
				<tr>
					<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($vo["name"]); ?></td>
					<td><?php echo ($vo["idnumber"]); ?></td>
					<td><?php echo ($vo["visitnoticestate"]); ?></td>
					<td><?php echo ($vo["visitnoticetime"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody> 
			</table>
			<div>
				<a href="#" onclick="page.firstPage();">首 页</a>/<a href="#" onclick="page.nextPage();">下一页</a>/<a href="#" onclick="page.prePage();">上一页</a>/<a href="#" onclick="page.lastPage();">末 页</a><span id="divFood"> </span>/第<input id="pageno" value="1" style="width:20px"/>页/<a href="#" onclick="page.aimPage();">跳转</a>
			</div> 
		</div>
		<div id="menu1" class="tab-pane fade">
			<form action="/arms/index.php?m=admin&c=index&a=pttz" method="post">
			<div><label for="reimbursementcategory">报销类别:</label>
				<select name="reimbursementcategory" id="reimbursementcategory">
				<option value="1" selected>省本级医保</option>
				<option value="2">市职工医保</option>
				<option value="3">市城镇医保</option>
				<option value="4">外县职工医保</option>
				<option value="5">外县城镇医保</option>
				<option value="6">异地医保</option>
				<option value="7">农合</option>
				<option value="8">朝阳农合</option>
				<option value="9">商业保险</option>
				<option value="10">自费</option>
				</select>
			</div><br>
			<div class="form-group">
				<label for="content">通知内容:</label>
				<textarea class="form-control" rows="3" name="content" id="content"></textarea>
			</div>
			<button type='submit' class="btn">通知</button></p>
		</div>
	</div>
</div>
</body>
</html>