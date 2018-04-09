<?php
namespace Admin\Controller;
use Think\Controller;

/**
*use Common\Model; 这块可以不需要使用，框架默认会加载里面的内容
*/

class IndexController extends Controller{
	public function index(){
		
		return $this->display("Index/hzcx");
	}
	public function nindex(){
		
		return $this->display("Index/nhzcx");
	}

	public function aqsz(){
		$bn=$_SESSION['doctorid'];
	    $mima1=$_POST['mima1'];
	    $mima2=$_POST['mima2'];
		$User=M('doctor');
		$data['password'] = $mima1;
		if($mima1=='')
			$this->error('密码不能为空');
		else if($mima1!=$mima2){
			$this->error('两次密码不一致');
		}
		else{
			$User->where("doctorid='$bn'")->save($data);
			$this->success('修改成功', U('/arms/index.php?m=admin&c=index&a=index'));
		}
	}
	public function naqsz(){
		$bn=$_SESSION['doctorid'];
	    $mima1=$_POST['mima1'];
	    $mima2=$_POST['mima2'];
		$User=M('doctor');
		$data['password'] = $mima1;
		if($mima1=='')
			$this->error('密码不能为空');
		else if($mima1!=$mima2){
			$this->error('两次密码不一致');
		}
		else{
			$User->where("doctorid='$bn'")->save($data);
			$this->success('修改成功', U('/arms/index.php?m=admin&c=index&a=nindex'));
		}
	}
	public function czhz(){
		$a=$_POST['search'];
		$where['name']=array('like','%'.$a.'%');
		$result=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->where($where)->select();
//		var_dump($where);
		$this->assign('result',$result);
		$this->display('Index/tzgl1');
		
	}
	public function nczhz(){
		$a=$_POST['search'];
		$where['name']=array('like','%'.$a.'%');
		$result=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->where($where)->select();
//		var_dump($where);
		$this->assign('result',$result);
		$this->display('Index/ntzgl1');
		
	}
	public function hzcx(){
    //管理员输出
		$patient=D("patient");
		if($_POST['name']!=''){
			$condition['name']=I('post.name');
		}
		if($_POST['sex']!=''){
			$condition['sex']=I('post.sex');
		}
		if($_POST['birthyear']!=''){
			$condition['birthyear']=I('post.birthyear');
		}
		if($_POST['birthmonth']!=''){
			$condition['birthmonth']=I('post.birthmonth');
		}
		if($_POST['birthday']!=''){
			$condition['birthday']=I('post.birthday');
		}
		if($_POST['patientid']!=''){
			$condition['idnumber']=I('post.patientid');
		}
		if($_POST['address']!=''){
			$condition['address']=I('post.address');
		}
		if($_POST['reimbursementcategory']!=''){
			$condition['reimbursementcategory']=I('post.reimbursementcategory');
		}
		if($_POST['mobilephonenumber']!=''){
			$condition['mobilephonenumber']=I('post.mobilephonenumber');
		}
		if($_POST['phonenumber']!=''){
			$condition['phonenumber']=I('post.phonenumber');
		}
		if($_POST['wechatnumber']!=''){
			$condition['wechatnumber']=I('post.wechatnumber');
		}
		$result=M('patient')->where($condition)->select();
		if(0!=count($result[0])){
			$this->assign('result',$result);
			$this->display("Index/hzcx1");
		}
		else{
			echo "<script>alert('未查询到相关患者');window.location='/arms/Application/Admin/View/Index/hzcx.html';</script>";
		}

	}
	public function nhzcx(){
    //管理员输出
		$patient=D("patient");
		if($_POST['name']!=''){
			$condition['name']=I('post.name');
		}
		if($_POST['sex']!=''){
			$condition['sex']=I('post.sex');
		}
		if($_POST['birthyear']!=''){
			$condition['birthyear']=I('post.birthyear');
		}
		if($_POST['birthmonth']!=''){
			$condition['birthmonth']=I('post.birthmonth');
		}
		if($_POST['birthday']!=''){
			$condition['birthday']=I('post.birthday');
		}
		if($_POST['patientid']!=''){
			$condition['idnumber']=I('post.patientid');
		}
		if($_POST['address']!=''){
			$condition['address']=I('post.address');
		}
		if($_POST['reimbursementcategory']!=''){
			$condition['reimbursementcategory']=I('post.reimbursementcategory');
		}
		if($_POST['mobilephonenumber']!=''){
			$condition['mobilephonenumber']=I('post.mobilephonenumber');
		}
		if($_POST['phonenumber']!=''){
			$condition['phonenumber']=I('post.phonenumber');
		}
		if($_POST['wechatnumber']!=''){
			$condition['wechatnumber']=I('post.wechatnumber');
		}
		$result=M('patient')->where($condition)->select();
		if(0!=count($result[0])){
			$this->assign('result',$result);
			$this->display("Index/nhzcx1");
		}
		else{
			echo "<script>alert('未查询到相关患者');window.location='/arms/Application/Admin/View/Index/nhzcx.html';</script>";
		}

	}
	public function hzcx1(){
		$patient=D('patient');
		$condition['name']=$_GET['name'];
		$condition['idnumber']=$_GET['idnumber'];
		$result1=M('Patient')->where($condition)->select();
		$result2=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->where($condition)->select();
		$this->assign('result1',$result1);
		$this->assign('result2',$result2);
		$this->display("Index/hzcx2");
	}
	public function nhzcx1(){
		$patient=D('patient');
		$condition['name']=$_GET['name'];
		$condition['idnumber']=$_GET['idnumber'];
		$result1=M('Patient')->where($condition)->select();
		$result2=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->where($condition)->select();
		$this->assign('result1',$result1);
		$this->assign('result2',$result2);
		$this->display("Index/nhzcx2");
	}
	public function hzcx2(){
		$patient=D('patient');
		$condition['name']=$_GET['name'];
		$condition['idnumber']=$_GET['idnumber'];
		$_SESSION['idnumber']=$condition['idnumber'];
		$result1=M('Patient')->where($condition)->select();
//		var_dump($result1);
		$this->assign('result1',$result1);
		$this->display("Index/xxxg1");
	}
	public function nhzcx2(){
		$patient=D('patient');
		$condition['name']=$_GET['name'];
		$condition['idnumber']=$_GET['idnumber'];
		$_SESSION['idnumber']=$condition['idnumber'];
		$result1=M('Patient')->where($condition)->select();
		$result2=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->where($condition)->select();
		$this->assign('result1',$result1);
		$this->assign('result2',$result2);
		$this->display("Index/nxxxg1");
	}

	public function hzgl(){
		$_SESSION['mobilephonenumber']=I('post.mobilephonenumber');
		$_SESSION['idnumber']=I('post.idnumber');
		$Patient = M("Patient");
		// 实例化User对象
		$upload = new \Think\Upload();//实例化上传类
		$upload->maxSize=10485760;    //设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='Public/Uploads/';
		//自动使用子目录保存上传文件
		$upload->autoSub=false;
		$upload->saveName = array('uniqid', array($_POST['idnumber'].'_', true));
		//上传文件
		$info=$upload->upload();
//		var_dump($upload);
//		var_dump($info);
		if($info){
			$filename[0]=$info['medicalhistory2']['savename'];
			$filename[1]=$info['previoushistory2']['savename'];
			$filename[2]=$info['familyhistory2']['savename'];
		}
		$data['patientid']=I('post.idnumber');
		$data['name']=I('post.name');
		$data['sex']=I('post.sex');
		$data['birthyear']=I('post.birthyear');
		$data['birthmonth']=I('post.birthmonth');
		$data['birthday']=I('post.birthday');
		$data['idnumber']=I('post.idnumber');
		$data['address']=I('post.address');
		$data['mobilephonenumber']=I('post.mobilephonenumber');
		$data['phonenumber']=I('post.phonenumber');
		$data['wechatnumber']=I('post.wechatnumber');
		$data['medicalhistory1']=I('post.medicalhistory1');
		$data['previoushistory1']=I('post.previoushistory1');
		$data['familyhistory1']=I('post.familyhistory1');
		// 根据条件更新记录
		if($filename[0])$data['medicalhistory2']='./Public/Uploads/'.$filename[0];
		if($filename[1])$data['previoushistory2']='./Public/Uploads/'.$filename[1];
		if($filename[2])$data['familyhistory2']='./Public/Uploads/'.$filename[2];
		$reimbursementcategory=M("reimbursementcategory");
		$condition['reimbursementcategory']=I('post.reimbursementcategory');
		$check=$reimbursementcategory->where($condition)->select();
		$data['reimbursementcategory']=$check[0]['reimbursementcategory'];
//		var_dump($data);
//		var_dump($data['previoushistory2']);
		$result = $Patient->add($data); 
		// 写入数据到数据库 
		if($result){
			// 如果主键是自动增长型 成功后返回值就是最新插入的值
			$insertId = $result;
		}
		$this->display("Index/hzgl1");
	}
	public function nhzgl(){
		$_SESSION['mobilephonenumber']=I('post.mobilephonenumber');
		$_SESSION['idnumber']=I('post.idnumber');
		$Patient = M("Patient");
		// 实例化User对象
		$upload = new \Think\Upload();//实例化上传类
		$upload->maxSize=10485760;    //设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='Public/Uploads/';
		//自动使用子目录保存上传文件
		$upload->autoSub=false;
		$upload->saveName = array('uniqid', array($_POST['idnumber'].'_', true));
		//上传文件
		$info=$upload->upload();
//		var_dump($upload);
//		var_dump($info);
		if($info){
			$filename[0]=$info['medicalhistory2']['savename'];
			$filename[1]=$info['previoushistory2']['savename'];
			$filename[2]=$info['familyhistory2']['savename'];
		}
		$data['patientid']=I('post.idnumber');
		$data['name']=I('post.name');
		$data['sex']=I('post.sex');
		$data['birthyear']=I('post.birthyear');
		$data['birthmonth']=I('post.birthmonth');
		$data['birthday']=I('post.birthday');
		$data['idnumber']=I('post.idnumber');
		$data['address']=I('post.address');
		$data['mobilephonenumber']=I('post.mobilephonenumber');
		$data['phonenumber']=I('post.phonenumber');
		$data['wechatnumber']=I('post.wechatnumber');
		$data['medicalhistory1']=I('post.medicalhistory1');
		$data['previoushistory1']=I('post.previoushistory1');
		$data['familyhistory1']=I('post.familyhistory1');
		// 根据条件更新记录
		if($filename[0])$data['medicalhistory2']='./Public/Uploads/'.$filename[0];
		if($filename[1])$data['previoushistory2']='./Public/Uploads/'.$filename[1];
		if($filename[2])$data['familyhistory2']='./Public/Uploads/'.$filename[2];
		$reimbursementcategory=M("reimbursementcategory");
		$condition['reimbursementcategory']=I('post.reimbursementcategory');
		$check=$reimbursementcategory->where($condition)->select();
		$data['reimbursementcategory']=$check[0]['reimbursementcategory'];
		$result = $Patient->add($data); 
		// 写入数据到数据库 
		if($result){
			// 如果主键是自动增长型 成功后返回值就是最新插入的值
			$insertId = $result;
		}
		$this->display("Index/nhzgl1");
	}
	public function hzgl1(){
		$User = M("Treatment");
		//实例化User对象
		$data['patientid']=$_SESSION['idnumber'];
		$data['doctorid']=$_SESSION['doctorid'];
		$data['diagnosis1']=I('post.diagnosis1');
		$data['treatmentplan1']=I('post.treatmentplan1');
		$data['diseaseassessment1']=I('diseaseassessment1');
		$data['medicaltime']=date('Y-m-d');//获取当前时间
		$upload = new \Think\Upload();//实例化上传类
		$upload->maxSize=10485760;    //设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='Public/Uploads/';
		//自动使用子目录保存上传文件
		$upload->autoSub=false;
		$upload->saveName = array('uniqid', array($data['patientid'].'_', true));
		//上传文件
		$info=$upload->upload();
//		var_dump($upload);
//		var_dump($info);
		if($info){
			$filename[0]=$info['diagnosis2']['savename'];
			$filename[1]=$info['treatmentplan2']['savename'];
			$filename[2]=$info['diseaseassessment2']['savename'];
		}
		// 根据条件更新记录
		if($filename[0])$data['diagnosis2']='./Public/Uploads/'.$filename[0];
		if($filename[1])$data['treatmentplan2']='./Public/Uploads/'.$filename[1];
		if($filename[2])$data['diseaseassessment2']='./Public/Uploads/'.$filename[2];
		$result = $User->add($data);
		if($result){
			// 如果主键是自动增长型 成功后返回值就是最新插入的值
			$_SESSION['Treatmentid']=$result;
		}
		$this->display("Index/hzgl2");
	}
	public function nhzgl1(){
		$User = M("Treatment");
		//实例化User对象
		$data['patientid']=$_SESSION['idnumber'];
		$data['doctorid']=$_SESSION['doctorid'];
		$data['diagnosis1']=I('post.diagnosis1');
		$data['treatmentplan1']=I('post.treatmentplan1');
		$data['diseaseassessment1']=I('diseaseassessment1');
		$data['medicaltime']=date('Y-m-d');//获取当前时间
		$upload = new \Think\Upload();//实例化上传类
		$upload->maxSize=10485760;    //设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='Public/Uploads/';
		//自动使用子目录保存上传文件
		$upload->autoSub=false;
		$upload->saveName = array('uniqid', array($data['patientid'].'_', true));
		//上传文件
		$info=$upload->upload();
//		var_dump($upload);
//		var_dump($info);
		if($info){
			$filename[0]=$info['diagnosis2']['savename'];
			$filename[1]=$info['treatmentplan2']['savename'];
			$filename[2]=$info['diseaseassessment2']['savename'];
		}
		// 根据条件更新记录
		if($filename[0])$data['diagnosis2']='./Public/Uploads/'.$filename[0];
		if($filename[1])$data['treatmentplan2']='./Public/Uploads/'.$filename[1];
		if($filename[2])$data['diseaseassessment2']='./Public/Uploads/'.$filename[2];
		$result = $User->add($data);
		if($result){
			// 如果主键是自动增长型 成功后返回值就是最新插入的值
			$_SESSION['Treatmentid']=$result;
		}
		$this->display("Index/nhzgl2");
	}
	public function hzgl2(){
		$User = M("Visit");
		// 实例化User对象
		$data['treatmentid']=$_SESSION['Treatmentid'];
		$data['visittime']=I('post.visittime');
		$data['visitproject']=I('post.visitproject');
		$result = $User->add($data);
		if($result){
			// 如果主键是自动增长型 成功后返回值就是最新插入的值
			$insertId = $result;
		}
		$this->display("Index/hzcx");
	}
	public function nhzgl2(){
		$User = M("Visit");
		// 实例化User对象
		$data['treatmentid']=$_SESSION['Treatmentid'];
		$data['visittime']=I('post.visittime');
		$data['visitproject']=I('post.visitproject');
		$result = $User->add($data);
		if($result){
			// 如果主键是自动增长型 成功后返回值就是最新插入的值
			$insertId = $result;
		}
		$this->display("Index/nhzcx");
	}
	public function hzjg(){
		$data['visitconclusion1']=I('post.visitconclusion1');
		$condition['visitconclusion1']='';
		$condition['doctorid']=$_SESSION['doctorid'];
		$condition['patientid']=$_SESSION['idnumber'];
		$upload = new \Think\Upload();//实例化上传类
		$upload->maxSize=10485760;    //设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='Public/Uploads/';
		//自动使用子目录保存上传文件
		$upload->autoSub=false;
		$upload->saveName = array('uniqid', array($data['patientid'].'_', true));
		//上传文件
		$info=$upload->upload();
//		var_dump($upload);
//		var_dump($info);
		if($info){
			$filename[0]=$info['visitconclusion2']['savename'];
		}
		// 根据条件更新记录
		if($filename[0])$data['visitconclusion2']='./Public/Uploads/'.$filename[0];
		$result1=M('Treatment as a')->join('Visit as b on b.treatmentid=a.treatmentid')->where($condition)->select();
		if(0!=count($result1[0])){
			$Visit=M("Visit");
			$con['visitid']=$result1[0]['visitid'];
			$result2=$Visit->where($con)->data($data)->save();
			if($result2){
				echo "<script>alert('添加成功');window.location='/arms/Application/Admin/View/Index/hzcx.html';</script>";
			}
		}
		else{
			echo "<script>alert('已添加会诊结果，可前往信息查询查看');window.location='/arms/Application/Admin/View/Index/hzcx.html';</script>";
		}
	}
    public function nhzjg(){
		$data['visitconclusion1']=I('post.visitconclusion1');
//		$condition['visitconclusion1']='';
		$condition['doctorid']=$_SESSION['doctorid'];
		$condition['patientid']=$_SESSION['idnumber'];
		$upload = new \Think\Upload();//实例化上传类
		$upload->maxSize=10485760;    //设置附件上传大小
		$upload->exts=array('jpg','gif','png','jpeg');
		$upload->rootPath='Public/Uploads/';
		//自动使用子目录保存上传文件
		$upload->autoSub=false;
		$upload->saveName = array('uniqid', array($data['patientid'].'_', true));
		//上传文件
		$info=$upload->upload();
//		var_dump($upload);
//		var_dump($info);
		if($info){
			$filename[0]=$info['visitconclusion2']['savename'];
		}
		// 根据条件更新记录
		if($filename[0])$data['visitconclusion2']='./Public/Uploads/'.$filename[0];
		$result1=M('Treatment as a')->join('Visit as b on b.treatmentid=a.treatmentid')->where($condition)->select();
		if(0!=count($result1[0])){
			$Visit=M("Visit");
			$con['visitid']=$result1[0]['visitid'];
			$result2=$Visit->where($con)->data($data)->save();
//		var_dump($data);
			if($result2){
				echo "<script>alert('添加成功');window.location='/arms/Application/Admin/View/Index/nhzcx.html';</script>";
			}
		}
		else{
			echo "<script>alert('已添加会诊结果，可前往信息查询查看');window.location='/arms/Application/Admin/View/Index/nhzcx.html';</script>";
		}
	}
  	public function pttz(){
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
		$patient=D('patient');
		$A=$_POST['content'];
		$condition['reimbursementcategory']=$_POST['reimbursementcategory'];
		$result1=$patient->where($condition)->field('mobilephonenumber')->select();
		$length=count($result1);
//		var_dump($result1);
		for($i=0;$i<$length;$i++){
			$C=$result1[$i]['mobilephonenumber'];
			$smsapi = "http://www.smsbao.com/"; //短信网关
			$user = "arms2017"; //短信平台帐号
			$pass = md5("arms2017"); //短信平台密码
			$content="【医院】".$A;//要发送的短信内容
			$phone = $C;
			$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
			$result =file_get_contents($sendurl) ;
			if($statusStr[$result]=="短信发送成功"){
				$this->success($statusStr[$result], U('/arms/index.php?m=admin&c=index&a=index'));
				$Notice=M('Notice');
				$data['reimbursementcategory']=$_POST['reimbursementcategory'];
				$data['noticecontent']=$_POST['content'];
				$Notice->data($data)->add();
			}
			else{
				$this->error($statusStr[$result]);
			}
		}
	}
  	public function npttz(){
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
		$patient=D('patient');
		$A=$_POST['contest'];
		$condition['reimbursementcategory']=$_POST['reimbursementcategory'];
		$result1=$patient->where($condition)->field('mobilephonenumber')->select();
		$length=count($result1);
		for($i=0;$i<$length;$i++){
			$C=$result1[$i]['mobilephonenumber'];
			$smsapi = "http://www.smsbao.com/"; //短信网关
			$user = "arms2017"; //短信平台帐号
			$pass = md5("arms2017"); //短信平台密码
			$content="【医院】".$A;//要发送的短信内容
			$phone = $C;
			$sendurl = $smsapi."sms?u=".$user."&p=".$pass."&m=".$phone."&c=".urlencode($content);
			$result =file_get_contents($sendurl) ;
			if($statusStr[$result]=="短信发送成功"){
				$this->success($statusStr[$result], U('/arms/index.php?m=admin&c=index&a=nindex'));
				$Notice=M('Notice');
				$data['reimbursementcategory']=$_POST['reimbursementcategory'];
				$data['noticecontent']=$_POST['content'];
				$Notice->data($data)->add();
			}
			else{
				$this->error($statusStr[$result]);
			}
		}
	}

	public function tzgl(){
		$patient=D('patient');
		$visit=D('visit');
		$result=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->select();
		//var_dump($result);
		$this->assign('result',$result);
		$this->display('Index/tzgl1');
		
	}
	public function ntzgl(){
		$patient=D('patient');
		$visit=D('visit');
		$result=M('Patient as a')->join('Treatment as b on b.patientid=a.idnumber')->join('Visit as c on c.treatmentid=b.treatmentid')->select();
		//var_dump($result);
		$this->assign('result',$result);
		$this->display('Index/ntzgl1');
		
	}
	public function xxxg(){
		$User=M("Patient");
		$condition['idnumber']=$_SESSION['idnumber'];
		$message=$User->where($condition)->select();
		if($_POST['name']!=$message[0]['name']){
			$data['name']=I('post.name');
		}
		if($_POST['sex']!=$message[0]['sex']){
			$data['sex']=I('post.sex');
		}
		if($_POST['birthyear']!=$message[0]['birthyear']){
			$data['birthyear']=I('post.birthyear');
		}
		if($_POST['birthmonth']!=$message[0]['birthmonth']){
			$data['birthmonth']=I('post.birthmonth');
		}
		if($_POST['birthday']!=$message[0]['birthday']){
			$data['birthday']=I('post.birthday');
		}
		if($_POST['idnumber']!=$message[0]['idnumber']){
			$data['idnumber']=I('post.idnumber');
			$data['patientid']=I('post.idnumber');
		}
		if($_POST['address']!=$message[0]['address']){
			$data['address']=I('post.address');
		}
		if($_POST['reimbursementcategory']!=$message[0]['reimbursementcategory']){
			$reimbursementcategory=M("reimbursementcategory");
			$condition['reimbursementcategorycontent']=I('post.reimbursementcategory');
			$check=$reimbursementcategory->where($condition)->select();
			$data['reimbursementcategory']=$check[0]['reimbursementcategory'];
		}
		if($_POST['mobilephonenumber']!=$message[0]['mobilephonenumber']){
			$data['mobilephonenumber']=I('post.mobilephonenumber');
		}
	    if($_POST['phonenumber']!=$message[0]['phonenumber']){
			$data['phonenumber']=I('post.phonenumber');
		}
		if($_POST['wechatnumber']!=$message[0]['wechatnumber']){
			$data['wechatnumber']=I('post.wechatnumber');
		}
		if($_POST['medicalhistory1']!=$message[0]['medicalhistory1']){
			$data['medicalhistory1']=I('post.medicalhistory1');
		}
		if($_POST['previoushistory1']!=$message[0]['previoushistory1']){
			$data['previoushistory1']=I('post.previoushistory1');
		}
		if($_POST['familyhistory1']!=$message[0]['familyhistory1']){
			$data['familyhistory1']=I('post.familyhistory1');
		}
		$condition['idnumber']=$_SESSION['idnumber'];
		$result1=$User->where($condition)->data($data)->save();
//		var_dump($data);
		if($result1){
			$result=$User->where($condition)->select();
			echo "<script>alert('修改成功');</script>";
			$this->assign('result',$result);
			$this->display('Index/hzcx');
		}
		else{
			echo "<script>alert('未修改');</script>";
			echo "<script>window.location='/arms/Application/Admin/View/Index/hzcx.html';</script>";
		}

  }
	public function nxxxg(){
		$User=M("Patient");
		$condition['idnumber']=$_SESSION['idnumber'];
		$message=$User->where($condition)->select();
		if($_POST['name']!=$message[0]['name']){
			$data['name']=I('post.name');
		}
		if($_POST['sex']!=$message[0]['sex']){
			$data['sex']=I('post.sex');
		}
		if($_POST['birthyear']!=$message[0]['birthyear']){
			$data['birthyear']=I('post.birthyear');
		}
		if($_POST['birthmonth']!=$message[0]['birthmonth']){
			$data['birthmonth']=I('post.birthmonth');
		}
		if($_POST['birthday']!=$message[0]['birthday']){
			$data['birthday']=I('post.birthday');
		}
		if($_POST['idnumber']!=$message[0]['idnumber']){
			$data['idnumber']=I('post.idnumber');
			$data['patientid']=I('post.idnumber');
		}
		if($_POST['address']!=$message[0]['address']){
			$data['address']=I('post.address');
		}
		if($_POST['reimbursementcategory']!=$message[0]['reimbursementcategory']){
			$reimbursementcategory=M("reimbursementcategory");
			$condition['reimbursementcategorycontent']=I('post.reimbursementcategory');
			$check=$reimbursementcategory->where($condition)->select();
			$data['reimbursementcategory']=$check[0]['reimbursementcategory'];
		}
		if($_POST['mobilephonenumber']!=$message[0]['mobilephonenumber']){
			$data['mobilephonenumber']=I('post.mobilephonenumber');
		}
	    if($_POST['phonenumber']!=$message[0]['phonenumber']){
			$data['phonenumber']=I('post.phonenumber');
		}
		if($_POST['wechatnumber']!=$message[0]['wechatnumber']){
			$data['wechatnumber']=I('post.wechatnumber');
		}
		if($_POST['medicalhistory1']!=$message[0]['medicalhistory1']){
			$data['medicalhistory1']=I('post.medicalhistory1');
		}
		if($_POST['previoushistory1']!=$message[0]['previoushistory1']){
			$data['previoushistory1']=I('post.previoushistory1');
		}
		if($_POST['familyhistory1']!=$message[0]['familyhistory1']){
			$data['familyhistory1']=I('post.familyhistory1');
		}
		$condition['idnumber']=$_SESSION['idnumber'];
		$result1=$User->where($condition)->data($data)->save();
		if($result1){
			$result=$User->where($condition)->select();
			echo "<script>alert('修改成功');</script>";
			$this->assign('result',$result);
			$this->display('Index/nhzcx');
		}
		else{
			echo "<script>alert('未修改');</script>";
			echo "<script>window.location='/arms/Application/Admin/View/Index/nhzcx.html';</script>";
		}
	}
	public function yhgl(){
		$data['doctorid']=I('doctorid');
		$data['password']=I('password');
		$data['name']=I('name');
		$data['phonenumber']=I('phonenumber');
		$data['yornmanager']=I('yornmanager');
		$doctor=M('doctor');
		$result=$doctor->data($data)->add();
		if($result){
			echo "<script>alert('添加成功');window.location='/arms/Application/Admin/View/Index/hzcx.html';</script>";
		}
	}
	public function nyhgl(){
		$data['doctorid']=I('doctorid');
		$data['password']=I('password');
		$data['name']=I('name');
		$data['phonenumber']=I('phonenumber');
		$data['yornmanager']=I('yornmanager');
		$doctor=M('doctor');
		$result=$doctor->data($data)->add();
		if($result){
			echo "<script>alert('添加成功');window.location='/arms/Application/Admin/View/Index/nhzcx.html';</script>";
		}
	}
	public function yhgl1(){
		$result=M('doctor')->select();
		//var_dump($result);
		$this->assign('result',$result);
		$this->display('Index/yhgl');
	}
	public function nyhgl1(){
		$result=M('doctor')->select();
		//var_dump($result);
		$this->assign('result',$result);
		$this->display('Index/nyhgl');
	}


}
?>


<head>
    <meta charset="UTF-8">
</head>
