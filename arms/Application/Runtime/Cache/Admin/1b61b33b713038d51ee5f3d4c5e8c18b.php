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
<h2>添加患者基础信息</h2>
<form action="/arms/index.php?m=admin&c=index&a=nhzgl" method="post">
	<div class="form-inline">
		<label for="name">患者姓名:</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="输入患者姓名">
    </div><br>
	<div>
		<label for="sex">患者性别:</label>
		<label class="radio-inline">
			<input type="radio" name="sex" value="男" id='sex' checked>男
		</label>
		<label class="radio-inline">
			<input type="radio" name="sex" value="女" id='sex'>女
		</label>
	</div><br>
	<div><label for="birthyear">出生日期:</label>
	<select name="birthyear"
	id='birthyear'><option></option><option>2000</option><option>1999</option><option>1998</option><option>1997</option><option>1996</option><option>1995</option><option>1994</option><option>1993</option><option>1992</option><option>1991</option><option>1990</option><option>1989</option><option>1988</option><option>1987</option><option>1986</option><option>1984</option><option>1983</option><option>1982</option><option>1981</option><option>1980</option><option>1979</option><option>1978</option><option>1977</option><option>1976</option><option>1975</option><option>1974</option><option>1973</option><option>1972</option><option>1971</option><option>1970</option><option>1969</option><option>1968</option><option>1967</option><option>1966</option><option>1965</option><option>1964</option><option>1963</option><option>1962</option><option>1961</option><option>1960</option><option>1959</option><option>1958</option><option>1957</option><option>1956</option><option>1955</option><option>1954</option><option>1953</option><option>1952</option><option>1951</option><option>1950</option><option>1949</option><option>1948</option><option>1947</option><option>1946</option><option>1945</option><option>1944</option><option>1943</option><option>1942</option><option>1941</option><option>1940</option><option>1939</option><option>1938</option><option>1937</option><option>1936</option><option>1935</option><option>1934</option><option>1933</option><option>1932</option><option>1931</option><option>1930</option><option>1929</option><option>1928</option><option>1927</option><option>1926</option><option>1925</option><option>1924</option><option>1923</option><option>1922</option><option>1921</option><option>1920</option><option>1919</option></select>&nbsp年&nbsp<select name="birthmonth"><option></option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option></select>&nbsp月&nbsp<select name="birthday"><option></option><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option><option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option><option>31</option></select>&nbsp日
	</div><br>
	<div class="form-inline">
		<label for="patientid">身份证号:</label>
		<input type="text" class="form-control" id="patientid" name="idnumber" placeholder="输入身份证号码">
    </div><br>
	<div class="form-inline">
		<label for="address">患者地址:</label>
		<input type="text" class="form-control" id="address" name="address" placeholder="输入地址">
    </div><br>
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
	<div class="form-inline">
		<label for="mobilephonenumber">手机号码:</label>
		<input type="text" class="form-control" id="mobilephonenumber" name="mobilephonenumber" placeholder="输入手机号码">
    </div><br>
	<div class="form-inline">
		<label for="phonenumber">固定电话:</label>
		<input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="输入固定电话">
    </div><br>
	<div class="form-inline">
		<label for="wechatnumber">微信号码:</label>
		<input type="text" class="form-control" id="wechatnumber" name="wechatnumber" placeholder="输入微信号码">
    </div><br>
    <div class="form-group">
      <label for="medicalhistory">病史:</label>
      <textarea class="form-control" rows="3" name="medicalhistroy1" id="medicalhistory"></textarea>
    </div>
上传病例图片:<input type="file" name="medicalhistroy2"><br>
    <div class="form-group">
      <label for="previoushistory">既往病史:</label>
      <textarea class="form-control" rows="3" name="previoushistory1" id="previoushistory"></textarea>
    </div>
上传病例图片:<input type="file" name="previoushistory2"><br>
    <div class="form-group">
      <label for="familyhistory">家族病史:</label>
      <textarea class="form-control" rows="3" name="familyhistory1" id="familyhistory"></textarea>
    </div>
上传病例图片:<input type="file" name="familyhistory2"><br>
<button class="btn" type="submit">下一步</button>
</form>
</div>
</body>

</html>