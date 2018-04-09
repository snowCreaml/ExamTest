function changepassword(){
	var randnum;
	randnum=Math.random();
	while(randnum<0.1){
	randnum=Math.random();
	}
	randnum=Math.floor(Math.random()*1000000);
	document.getElementById('mima').action='/arms/index.php?m=admin&c=login&a=wjmm&number='+randnum;
	document.getElementById('mima').submit();
//	document.write(randnum);

}