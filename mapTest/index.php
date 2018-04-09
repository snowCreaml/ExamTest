<?php
header("Content-Type:text/html;charset=utf-8");
//$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951"); 
//$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951"); 
//$pdo->query("SET NAMES utf8");
include './connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title><style type="text/css">
    body{
    }
    table .table-striped{
    }
    table th{
        text-align: left;
        height: 30px;
        background: #deeeee;
        padding: 5px;
        margin: 0;
        border: 0px;
    }
    table td{
        text-align: left;
        height:30px;
        margin: 0;
        padding: 5px;
        border:0px
    }
    table tr:hover{
        background: #eeeeee;
    }
    .span6{
        /*width:500px;*/
        float:inherit;
        margin:10px;
    }
    #pagiDiv span{
        background:#AAAAAA;
        border-radius: .2em;
        padding:5px;
    }
</style>
<script type="text/javascript" src="pagination.js"></script>
<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    //全局变量
    var numCount;       //数据总数量
    var columnsCounts;  //数据列数量
    var pageCount;      //每页显示的数量
    var pageNum;        //总页数
    var currPageNum ;   //当前页数
    //页面标签变量
    var blockTable;
    var preSpan;
    var firstSpan;
    var nextSpan;
    var lastSpan;
    var pageNumSpan;
    var currPageSpan;
    window.onload=function(){
        //页面标签变量
        blockTable = document.getElementById("blocks");
        preSpan = document.getElementById("spanPre");
        firstSpan = document.getElementById("spanFirst");
        nextSpan = document.getElementById("spanNext");
        lastSpan = document.getElementById("spanLast");
        pageNumSpan = document.getElementById("spanTotalPage");
        currPageSpan = document.getElementById("spanPageNum");
        numCount = document.getElementById("blocks").rows.length - 1;      
//      取table的行数作为数据总数量（减去标题行1）
//      alert(numCount)
        columnsCounts = blockTable.rows[0].cells.length;
        pageCount = 5;
        pageNum = parseInt(numCount/pageCount);
        if(0 != numCount%pageCount){
            pageNum += 1;
        }
        firstPage();
    };
</script>
<script src="my.js" type="text/javascript"></script>
<script type="text/javascript">
    function popUp(event){
    //window.alert("Hello World!");
    var x=event.target;
    //window.alert("内容是"+x.innerText);
    //创建ajax
    myXmlHttpRequest=getXmlHttpObject();
    if(myXmlHttpRequest){
        //ajax创建成功
        var url="printObject.php"
        var data="object="+x.innerText;
        myXmlHttpRequest.open("post",url,true);
        myXmlHttpRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        myXmlHttpRequest.onreadystatechange=chuli;
        myXmlHttpRequest.send(data);
    }
    function chuli(){
        if(myXmlHttpRequest.readyState==4&&myXmlHttpRequest.status==200){
            var res_objects=myXmlHttpRequest.responseText;
            //window.alert(res_objects);
        }
    }
    window.location.href="infoInput.php";
}
</script>
</head>
<body>
</style>
<div id="map-colum" class="container">
    <h1 align="center">试题列表</h1></br>
        <?php
            $sql="select * from test";
            $result=$pdo->query($sql);
            $row=$result->fetchall();
//          var_dump($row);
            if($row){
                $row_test_cnt=count($row);
            }
            else
                $row_test_cnt=0;
//          echo $row_test_cnt;
            echo "<table id='blocks' class='table table-striped' align='center' style='margin-top:25px'><tr><th>点击查看试卷</th><th>题目数目</th><th>是否活跃</th></tr>";
            foreach ($row as $v) {
                echo "<tr>";
                echo "<td><a href=".'"javascript:;"'." onclick=".'"popUp(event)"'.">".$v['test_name']."</a></td>";
                echo "<td>".$v['item_num']."</td>";
                echo "<td>".$v['active']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
    <div id="pagiDiv" align="right" style="width:1200px">
        <span id="spanFirst">回到首页</span>&nbsp;&nbsp;
        <span id="spanPre">上一页</span>&nbsp;&nbsp;
        <span id="spanNext">下一页</span>&nbsp;&nbsp;
        <span id="spanLast">尾页</span>&nbsp;&nbsp;
        第&nbsp;<span id="spanPageNum"></span>&nbsp;页/总共&nbsp;<span id="spanTotalPage"></span>&nbsp;页
    </div>
</div>
</body>