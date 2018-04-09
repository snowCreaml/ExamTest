<?php
namespace Admin\Controller;
use Think\Controller;

/**
*use Common\Model; 这块可以不需要使用，框架默认会加载里面的内容
*/

class LoginController extends Controller{
	public function index(){
		
		return $this->display();
	}


    public function check(){
        $doctorid=I('post.doctorid'); //获取Form数据
        $password=I('post.password'); 
		$_SESSION['doctorid']=$doctorid;
        $doctor = M('doctor');   //使用M方法实例化的话，由于不需要加载具体的模型类，所以性能会更高 
        $condition['doctorid'] = $doctorid;
        $userinfo=$doctor->where($condition)->select(); //使用数组作为查询条件
		$_SESSION['yornmanager']=$userinfo[0]['yornmanager'];
		//var_dump($userinfo[0]['yornmanager']);
        if(0==count($userinfo[0]))
			$this->error('登录失败,用户名不存在');
        else{
            if($password!=$userinfo[0]['password']){
				$this->error('登录失败,密码不正确!');
            } 
            else{
				if($userinfo[0]['yornmanager']==1){
                    $this->success('管理员登录成功',U('/arms1/index.php?m=admin&c=index&a=index'));
                }
                else{
                    $this->success('登录成功',U('/arms1/index.php?m=admin&c=index&a=nindex'));
                }
            }
        }
    }
	public function wjmm(){
		$doctor=D('doctor');
		$result=$doctor->select();
		$data['doctorid']=I('post.doctorid'); //获取Form数据
        $data['phonenumber']=I('post.phonenumber');
		$_SESSION['doctorid']=$data['doctorid'];
		$_SESSION['randnum']=$_GET['number'];
		$length=count($result);
		for($i=0;$i<$length;$i++){
//			var_dump($result[$i]);
			if($data['doctorid']==$result[$i]['doctorid']&&$data['phonenumber']==$result[$i]['phonenumber']){
				if($result[$i]['yornmanager']==1){
					$this->success('验证成功',U('/arms1/index.php?m=admin&c=login&a=yzmm'));
					break;
				}
				else{
					$this->success('验证成功',U('/arms1/index.php?m=admin&c=login&a=nyzmm'));
					break;
				}
			}
		}
		$this->error('验证失败');
	}
  	public function yzmm(){
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
		$doctor=D('doctor');
		$condition['doctorid']=$_SESSION['doctorid'];
		$B=$condition['doctorid'];
		$data['password']=$_SESSION['randnum'];
		$A=$data['password'];
		$result1=$doctor->where($condition)->select();
		$length=count($result1);
		$C=$result1[0]['phonenumber'];
		$doctor->where("doctorid='$B'")->save($data);
		$smsapi = "http://www.smsbao.com/"; //短信网关
		$user = "arms2017"; //短信平台帐号
		$pass = md5("arms2017"); //短信平台密码
		$content="【医院】您的密码为".$A."，请登录并修改密码。";//要发送的短信内容
		$phone = $C;
		$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
		$result =file_get_contents($sendurl) ;
		if($statusStr[$result]=="短信发送成功")
			$this->success($statusStr[$result], U('/arms/index.php?m=admin&c=login&a=index'));
		else{
			$this->error($statusStr[$result]);
		}
//		var_dump($A);

	}
  	public function nyzmm(){
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
		$doctor=D('doctor');
		$condition['doctorid']=$_SESSION['doctorid'];
		$B=$condition['doctorid'];
		$data['password']=$_SESSION['randnum'];
		$A=$data['password'];
		$result1=$doctor->where($condition)->select();
		$length=count($result1);
		$C=$result1[0]['phonenumber'];
		$doctor->where("doctorid='$B'")->save($data);
		$smsapi = "http://www.smsbao.com/"; //短信网关
		$user = "arms2017"; //短信平台帐号
		$pass = md5("arms2017"); //短信平台密码
		$content="【医院】您的密码为".$A."，请登录并修改密码。";//要发送的短信内容
		$phone = $C;
		$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
		$result =file_get_contents($sendurl) ;
		if($statusStr[$result]=="短信发送成功")
			$this->success($statusStr[$result], U('/arms/index.php?m=admin&c=login&a=nindex'));
		else{
			$this->error($statusStr[$result]);
		}
//		var_dump($A);

	}

}
?>
<head>
    <meta charset="UTF-8">
</head>
