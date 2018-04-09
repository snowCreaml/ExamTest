<?php
session_start();
//post方式很重要的两句话
	header("Content-Type:text/html;charset=utf-8");
	header("Cache-Control:no-cache");
	$pdo = new PDO("mysql:host=localhost;dbname=exam","root","753951");
	$pdo->query("SET NAMES utf8");	
	@$editor=$_POST['editor'];
	$array=explode('</div>', $editor);
//	var_dump($array);
//	$s=is_array($array);
//	echo $s;
//	echo preg_match_all("//", $editor, $matches);
	$state=0;
	$number=0;
	$compare=0;
	$index1=-1;
	$index2=-1;
	$index3=-1;	
//	echo $item_id;
//	echo $submit;
	$sql="select `item_id` from item";
	$result=$pdo->query($sql);
	$row=$result->fetchall();
	$index6=count($row);
//	echo $index6;
	for($index=0;$index<count($array)-2;$index++) { 
		if(preg_match('/【单选1】/', $array[$index])){
			$number++;
			preg_match('/【[A-Z]】/',$array[$index],$arr1);
			preg_match('/【\d{1,}】/',$array[$index],$arr2);
			echo preg_replace('/【单选1】|【[A-Z]】/','',$array[$index]);
			@$ans=preg_replace('/【|】/','',$arr1[0]);
//			$ans=ord($ans)-64;
//			echo $ans;
			@$val=preg_replace('/【|】/','',$arr2[0]);
			$name=preg_replace('/<div>【单选1】|【[A-Z]】|【\d{1,}】/','',$array[$index]);
			$compare=$index;
			$state=1;
			$index1++;
			$array1[$index1]=array('name'=>$name,'state'=>$state,'number'=>$index6+$number,'value'=>$val);
			$index3++;
			$count[$index3]=$index2+ord($ans)-64;
			$answer[$index3]=array('number'=>$index6+$number,'answer'=>$count[$index3]);
		}
		if(preg_match('/【多选】/', $array[$index])){
			$number++;
			preg_match('/【[A-Z]+】/',$array[$index],$arr1);
			preg_match('/【\d{1,}】/',$array[$index],$arr2);
			echo preg_replace('/【多选】|【[A-Z]+】/','',$array[$index]);
			@$ans=preg_replace('/【|】/','',$arr1[0]);
			$index4=strlen($ans);
//			echo $index4;
			$ans=str_split($ans);
//			var_dump($ans);
			@$val=preg_replace('/【|】/','',$arr2[0]);
			$name=preg_replace('/<div>【多选】|【[A-Z]+】|【\d{1,}】/','',$array[$index]);
			$compare=$index;
			$state=3;
			$index1++;
			$array1[$index1]=array('name'=>$name,'state'=>$state,'number'=>$index6+$number,'value'=>$val);
			for ($index5=0; $index5<$index4; $index5++) { 
				$index3++;
				$count[$index3]=$index2+ord($ans[$index5])-64;
				$answer[$index3]=array('number'=>$index6+$number,'answer'=>$count[$index3]);
			}
		}
		if(preg_match('/【单选2】/', $array[$index])){
			$number++;
			preg_match('/【[A-Z]】/',$array[$index],$arr1);
			preg_match('/【\d{1,}】/',$array[$index],$arr2);
			echo preg_replace('/【单选2】|【[A-Z]】/','',$array[$index]);
			@$ans=preg_replace('/【|】/','',$arr1[0]); 
//			$ans=ord($ans)-64;
//			echo $ans;
			@$val=preg_replace('/【|】/','',$arr2[0]);
			$name=preg_replace('/<div>【单选2】|【[A-Z]】|【\d{1,}】/','',$array[$index]);
			$compare=$index;
			$state=2;
			$index1++;
			$array1[$index1]=array('name'=>$name,'state'=>$state,'number'=>$index6+$number,'value'=>$val);
			$index3++;
			$count[$index3]=$index2+ord($ans)-64;
			$answer[$index3]=array('number'=>$index6+$number,'answer'=>$count[$index3]);
		}
		if(preg_match('/【文本】/', $array[$index])){
			$number++;
			preg_match('/【\d{1,}】/',$array[$index],$arr2);
			echo "<p>".preg_replace('/【文本】/','',$array[$index]);
			@$val=preg_replace('/【|】/','',$arr2[0]);
			$name=preg_replace('/<div>【文本】|【\d{1,}】/','',$array[$index]);
			$compare=$index;
			$state=4;
			$index1++;
			$array1[$index1]=array('name'=>$name,'state'=>$state,'number'=>$index6+$number,'value'=>$val);
		}
		if($state==1&&$compare<$index){
			echo "<br><input type=".'"radio"'."name=".'"$number"'."/>".$array[$index];
			$content=preg_replace('/<div>/','',$array[$index]);
			$index2++;
			$array2[$index2]=array('content'=>$content,'number'=>$index6+$number);
		}
		if($state==3&&$compare<$index){
			echo "<br><input type=".'"checkbox"'."name=".'"$number"'."/>".$array[$index];
			$content=preg_replace('/<div>/','',$array[$index]);
			$index2++;
			$array2[$index2]=array('content'=>$content,'number'=>$index6+$number);
		}
		if($state==2&&$compare<$index){
			if($compare==$index-1){
				echo "<br><select><option>".$array[$index]."</option>";
				$content=preg_replace('/<div>/','',$array[$index]);
				$index2++;
				$array2[$index2]=array('content'=>$content,'number'=>$index6+$number);
			}
			else if(preg_match('/【/', $array[$index+1])){
					echo "<option>".$array[$index]."</option>"."</select>";
					$content=preg_replace('/<div>/','',$array[$index]);
					$index2++;
					$array2[$index2]=array('content'=>$content,'number'=>$index6+$number);
			}
				else {
				echo "<option>".$array[$index]."</option>";
				$content=preg_replace('/<div>/','',$array[$index]);
				$index2++;
				$array2[$index2]=array('content'=>$content,'number'=>$index6+$number);
			}
		}
		if($state==4&&$compare==$index){
			echo "<input type=".'"text"'."name=".'"$number"'."/></p>";
		}
		if($state==0){
			echo $array[$index];
		}
	}
	for ($index=0; $index < count($answer); $index++) { 
		$real=$answer[$index]['answer'];
		@$answer[$index]['answer']=$array2[$real]['content'];
	}
//	var_dump($array1);
	@$_SESSION['array1']=$array1;
	@$_SESSION['array2']=$array2;
	@$_SESSION['answer']=$answer;
//	var_dump($array2); 
//	var_dump($answer);
?>