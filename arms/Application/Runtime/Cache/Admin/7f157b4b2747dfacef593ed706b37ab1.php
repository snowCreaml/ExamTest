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
                <li><a href="/arms/Application/Admin/View/Index/nhzcx.html">患者管理</a></li>
                <li><a href="/arms/index.php?m=admin&c=index&a=ntzgl">通知管理</a></li>
                <li><a href="/arms/Application/Admin/View/Index/naqsz.html">安全设置</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
<h2>查询结果</h2>
<table class="table table-striped" border='0'>
<?php if(is_array($result1)): $i = 0; $__LIST__ = $result1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><th>姓名</th><td><?php echo ($vo["name"]); ?></td><th>性别</th><td><?php echo ($vo["sex"]); ?></td><th>出生日期</th><td><?php echo ($vo["birthyear"]); ?>年<?php echo ($vo["birthmonth"]); ?>月<?php echo ($vo["birthday"]); ?>日</td><th>身份证号</th><td><?php echo ($vo["idnumber"]); ?></td></tr>
<tr><th>地址</th><td colspan='5'><?php echo ($vo["address"]); ?></td><th>报销类别</th><td><?php echo ($vo["reimbursementcategory"]); ?></td></tr>
<tr><th>手机</th><td colspan='2'><?php echo ($vo["mobilephonenumber"]); ?></td><th>固定电话</th><td colspan='2'><?php echo ($vo["phonenumber"]); ?></td><th>微信</th><td><?php echo ($vo["wechatnumber"]); ?></td></tr>
<tr><th>病史</th><td colspan='7'><?php echo ($vo["medicalhistory1"]); ?></td></tr>
<tr><th>既往病史</th><td colspan='7'><?php echo ($vo["previoushistory1"]); ?></td></tr>
<tr><th>家族史</th><td colspan='7'><?php echo ($vo["familyhistory1"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(is_array($result2)): $i = 0; $__LIST__ = $result2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr><th>诊断</th><td colspan='7'><?php echo ($vo["diagnosis1"]); ?></td></tr>
<tr><th>治疗方案</th><td colspan='7'><?php echo ($vo["treatmentplan1"]); ?></td></tr>
<tr><th>病情评估</th><td colspan='7'><?php echo ($vo["diseaseassessment1"]); ?></td></tr>
<tr><th>复诊时间</th><td colspan='3'><?php echo ($vo["visittime"]); ?></td><th>复诊项目</th><td colspan='3'><?php echo ($vo["visitproject"]); ?></td></tr>
<tr><th>复诊通知状态</th><td colspan='3'><?php echo ($vo["visitnoticestate"]); ?></td><th>复诊通知时间</th><td colspan='3'><?php echo ($vo["visitnoticetime"]); ?></td></tr>
<tr><th>会诊结果</th><td colspan='7'><?php echo ($vo["visitconclusion1"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<a href="/arms/Application/Admin/View/Index/nhzgl1.html" class="btn btn-default" role="button">添加病例</a>
<a href="/arms/Application/Admin/View/Index/nhzjg.html" class="btn btn-default" role="button">添加会诊结果</a>
<a href="/arms/index.php?m=admin&c=index&a=nhzcx2&name=<?php echo ($vo["name"]); ?>&idnumber=<?php echo ($vo["idnumber"]); ?>" class="btn btn-default" role="button">修改患者信息</a>
<a href="/arms/Application/Admin/View/Index/nhzcx.html" class="btn btn-default" role="button">返回继续查询</a></p>
</div>
</body>
</html>