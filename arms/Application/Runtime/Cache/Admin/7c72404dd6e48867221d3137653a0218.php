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
<script>
function PreviewImage1(imgFile)
{
    var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);
    filextension=filextension.toLowerCase();
    if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))
    {
        alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
        imgFile.focus();
    }
    else
    {
        var path;
        if(document.all)//IE
        {
            imgFile.select();
            path = document.selection.createRange().text;
            document.getElementById("imgPreview1").innerHTML="";
            document.getElementById("imgPreview1").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果      
        }
        else//FF
        {
            path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
            //path = imgFile.files[0].getAsDataURL();// FF 3.0
            document.getElementById("imgPreview1").innerHTML = "<img id='img1' width='120px' height='100px' src='"+path+"'/>";
            //document.getElementById("img1").src = path;
        }
    }
}
function PreviewImage2(imgFile)
{
    var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);
    filextension=filextension.toLowerCase();
    if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))
    {
        alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
        imgFile.focus();
    }
    else
    {
        var path;
        if(document.all)//IE
        {
            imgFile.select();
            path = document.selection.createRange().text;
            document.getElementById("imgPreview2").innerHTML="";
            document.getElementById("imgPreview2").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果      
        }
        else//FF
        {
            path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
            //path = imgFile.files[0].getAsDataURL();// FF 3.0
            document.getElementById("imgPreview2").innerHTML = "<img id='img2' width='120px' height='100px' src='"+path+"'/>";
            //document.getElementById("img1").src = path;
        }
    }
}
function PreviewImage3(imgFile)
{
    var filextension=imgFile.value.substring(imgFile.value.lastIndexOf("."),imgFile.value.length);
    filextension=filextension.toLowerCase();
    if ((filextension!='.jpg')&&(filextension!='.gif')&&(filextension!='.jpeg')&&(filextension!='.png')&&(filextension!='.bmp'))
    {
        alert("对不起，系统仅支持标准格式的照片，请您调整格式后重新上传，谢谢 !");
        imgFile.focus();
    }
    else
    {
        var path;
        if(document.all)//IE
        {
            imgFile.select();
            path = document.selection.createRange().text;
            document.getElementById("imgPreview3").innerHTML="";
            document.getElementById("imgPreview3").style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(enabled='true',sizingMethod='scale',src=\"" + path + "\")";//使用滤镜效果      
        }
        else//FF
        {
            path=window.URL.createObjectURL(imgFile.files[0]);// FF 7.0以上
            //path = imgFile.files[0].getAsDataURL();// FF 3.0
            document.getElementById("imgPreview3").innerHTML = "<img id='img3' width='120px' height='100px' src='"+path+"'/>";
            //document.getElementById("img1").src = path;
        }
    }
}
</script>
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
<h2>就诊信息</h2>
<form action="/arms/index.php?m=admin&c=index&a=nhzgl1" method="post"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="diagnosis">诊断:</label>
      <textarea class="form-control" rows="3" name="diagnosis1" id="diagnosis"></textarea>
    </div>
	上传图片:<input type="file" onchange='PreviewImage1(this)' name="diagnosis2">
	<div id="imgPreview1" style='width:120px; height:100px;'>
		<img id="img1" src="" width="60" height="48" />
	</div>
    <div class="form-group">
      <label for="treatmentplan">治疗方案:</label>
      <textarea class="form-control" rows="3" name="treatmentplan1" id="treatmentplan"></textarea>
    </div>
	上传图片:<input type="file" onchange='PreviewImage2(this)' name="treatmentplan2">
	<div id="imgPreview2" style='width:120px; height:100px;'>
		<img id="img2" src="" width="60" height="48" />
	</div>
    <div class="form-group">
      <label for="diseaseassessment">病情评估:</label>
      <textarea class="form-control" rows="3" name="diseaseassessment1" id="diseaseassessment"></textarea>
    </div>
	上传图片:<input type="file" onchange='PreviewImage3(this)' name="diseaseassessment2">
	<div id="imgPreview3" style='width:120px; height:100px;'>
		<img id="img3" src="" width="60" height="48" />
	</div>
	<br>
	<button class="btn" type="submit">下一步</button>
</form>
</body>

</html>