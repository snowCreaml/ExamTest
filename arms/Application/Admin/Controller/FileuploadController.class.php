<?php
namespace Admin\Controller;
use Think\Controller;
	class FileUploadController extends Controller{
		private $path = "../upload";
		private $allowType = array('jpg','jpeg','png','gif');
		private $allowSize = 1000000;

		private $oldName;
		private $tempName;
		private $newName;
		private $filestype;
		private $filessize;
		private $erroNum = 0;
		private $erroMessage = "";
	// //////////////////////////////////////////////////////////////////////////////////
		public function upload($filename){
			$name = $_FILES[$filename]['name'];
			$size = $_FILES[$filename]['size'];
			$tempname = $_FILES[$filename]['tmp_name'];
			$erro = $_FILES[$filename]['error'];
			$returns = true;
			if(is_Array($name)){
				$erros = array();
				
				for($i=0;$i<count($name);$i++){
					
					if($this->setFiles($name[$i],$size[$i],$tempname[$i],$erro[$i])){
						if(!$this->checkSize()||!$this->checkType()){
							$erros[] = $this->getError();
							$returns = false;
							
						}
					}else{
						$erros[] = $this->getError();
						$returns = false;				
					}
				}
				//echo $returns;
				if($returns){
					$filenames = array();
					for($i=0;$i<count($name);$i++){
					
						if($this->setFiles($name[$i],$size[$i],$tempname[$i],$erro[$i])){
							$this->randomName();
							if(!$this->copyFile()){
								$erros[] = $this->getError();
								$returns = false;
								//echo "01---";
							}
							$filenames[] = $this->newName;
						}
					}
					$this->newName = $filenames;
				}
				$this->erroMessage = $erros;
				return $returns;	
			}else{
				if($this->setFiles($name,$size,$tempname,$erro)){
					if($this->checkSize()&&$this->checkType()){
						$this->randomName();
						
						if(!$this->copyFile()){
							$returns = false;
							//echo"01--";
						}
					}else{
						$returns = false;
						
					}
				}else{
					$returns =false;
					
				}
				if(!$returns){
					$this->erroMessage = $this->getError();
				}
				
				return $returns;
			}
		}

		//设置file相关的参数
		public function setFiles($name,$size,$tempname,$erro){
			$this->oldName = $name;
			$this->filessize = $size;
			$this->tempName = $tempname;
			$this->erroNum = $erro;
			if($erro){

				return false;

			}
			$arry = explode('.',$name);
			$this->filestype = strtolower($arry[count($arry)-1]);
			
			return true;
		}
		//判断size
		public function checkSize(){
			if($this->filessize>$this->allowSize){
				$this->erroNum = -1;
				return false;
			}else{
				return true;
			}
		}
		//判断类型size
		public function checkType(){
			if(in_array($this->filestype,$this->allowType)){
				return true;
			}else{
				$this->erroNum = -2;
				return false;
			}
		}
		//随机的名字
		public function randomName(){
			//$new = date('YmdHis').'_'.rand(100,999).'.'.$this->filestype;
			//$this->newName = $new;
			$this->newName = $this->oldName;

		}
		//上传文件
		public function copyFile(){
			$path = $this->path . "/" . $this->newName;
			//echo "{$path}";
			if(move_uploaded_file($this->tempName,$path)){
				
				return true;
			}else{
				
				$this->erroNum = -3;
				return false;
			}

		}
		public function getError(){
			$str = "上传文件{$this->oldName}出错,原因：";
			switch($this->erroNum){
				case 5:$str.="没有文件";break;
				case 4:
				case 3:
				case 2:
				case 1:$str.="上传网络出错";break;
				case -1:$str.="为允许类型";break;
				case -2:$str.="文件过大";break;
				case -3:$str.="上传失败";break;
				case -4:
				case -5:$str.="上传目录出错";break;
				default:$str.="天知道干了社么";break;
			}
			return $str."<br>";
		}
		///////////////////////////////////////////////
		public function getMessage(){
			return $this->erroMessage.$this->erroNum;
		}
	}


