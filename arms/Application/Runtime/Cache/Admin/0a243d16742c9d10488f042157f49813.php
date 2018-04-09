<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta name="viewport" content="width=device-width"/>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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

                    <h1 align="center"><span class="hide">Laravel - </span>乙型肝炎评估管理监测系统</h1>
                    

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
                <li><a href="/arms1/Application/Admin/View/Index/xxcx.html">信息查询</a></li>
                <li><a href="/arms1/Application/Admin/View/Index/hzcx.html">患者管理</a></li>
                <li><a href="/arms1/Application/Admin/View/Index/tzgl.html">通知管理</a></li>
                <li><a href="/arms1/Application/Admin/View/Index/aqsz.html">安全设置</a></li>
                <li><a href="/arms1/index.php?m=admin&c=index&a=yhgl1">用户管理</a></li>
            </ul>
        </div>
    </div>
</nav>
<div align="center">
<h2>查询结果</h2>
<table align='center' border='0'>
<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align='center'><th>姓名</th><td width='100'><?php echo ($vo["name"]); ?></td><th>性别</th><td width='100'><?php echo ($vo["sex"]); ?></td><th>出生日期</th><td width='150'><?php echo ($vo["birthyear"]); ?>年<?php echo ($vo["birthmonth"]); ?>月<?php echo ($vo["birthday"]); ?>日</td><th>身份证号</th><td width='100'><?php echo ($vo["idnumber"]); ?></td></tr>
<tr align='center'><th>地址</th><td colspan='5'><?php echo ($vo["address"]); ?></td><th>报销类别</th><td width='100'><?php echo ($vo["reimbursementcategory"]); ?></td></tr>
<tr align='center'><th>手机</th><td width='100' colspan='2'><?php echo ($vo["mobilephonenumber"]); ?></td><th>固定电话</th><td width='100' colspan='2'><?php echo ($vo["phonenumber"]); ?></td><th>微信</th><td width='100'><?php echo ($vo["wechatnumber"]); ?></td></tr>
<tr align='center'><th>病史</th><td colspan='7'><?php echo ($vo["medicalhistory1"]); ?></td></tr>
<tr align='center'><th>既往病史</th><td colspan='7'><?php echo ($vo["previoushistory1"]); ?></td></tr>
<tr align='center'><th>家族史</th><td colspan='7'><?php echo ($vo["familyhistory1"]); ?></td></tr>
<tr align='center'><th>诊断</th><td colspan='7'><?php echo ($vo["diagnosis1"]); ?></td></tr>
<tr align='center'><th>治疗方案</th><td colspan='7'><?php echo ($vo["treatmentplan1"]); ?></td></tr>
<tr align='center'><th>病情评估</th><td colspan='7'><?php echo ($vo["diseaseassessment1"]); ?></td></tr>
<tr align='center'><th>复诊时间</th><td colspan='2'><?php echo ($vo["visittime"]); ?></td><th>复诊项目</th><td colspan='4'><?php echo ($vo["visitproject"]); ?></td></tr>
<tr align='center'><th>会诊结果</th><td colspan='7'><?php echo ($vo["visitconclus"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>

<a href="/arms1/Application/Admin/View/Index/xxcx.html">返回继续查询</a>
</div>
</body>
</html>