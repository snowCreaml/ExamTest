<?php
namespace Admin\Controller;
use Think\Controller;

class TimeController extends Controller{
public function index(){
		
		return $this->display();
	}

public function check(){
$statusStr = array(
		"0" => "短信发送成功",
		"-1" => "参数不全",
		"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
		"30" => "密码错误",
		"40" => "账号不存在",
		"41" => "余额不足",
		"42" => "帐户已过期",
		"43" => "IP地址限制",
		"50" => "内容含有敏感词"
	);	
$visit=M('visit');
$result1=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->where($condition)->select();
$length=count($result1);
for($i=0;$i<$length;$i++){
$A=$result1[$i]['visittime'];
$B=$result1[$i]['visitproject'];
$C=$result1[$i]['mobilephonenumber'];
$D=$result1[$i]['idnumber'];
$T=date("Y-m-j",time()+86400);
$t=date("Y-m-j");
var_dump($C);
if($T==$A)
{
$data['visitnoticetime']=$t;
$data['visitnoticestate']="1";
$visit->where("visittime='$T'")->save($data);
$smsapi = "http://www.smsbao.com/"; //短信网关
$user = "arms2017"; //短信平台帐号
$pass = md5("arms123"); //短信平台密码
$content='【医院】请您于'.$A.'到医院进行复诊，复诊项目为'.$B.'，希望您准时到来。';//要发送的短信内容
$phone = $C;
$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
$result =file_get_contents($sendurl) ;
//echo $statusStr[$result];
	}
else if($T<$A)
	{
$data['visitnoticestate']="0";
$visit->where("visittime='$T'")->save($data);
    }
}
}
}