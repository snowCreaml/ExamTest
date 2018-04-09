var aqsz={
      sub2:function()
	  {
		  
		  var mimaa1 = document.getElementById("mima1").value;
		  var mimaa2 = document.getElementById("mima2").value;
		  
		  if(mimaa1.length==0)
		  {
			  document.getElementById("warning1").innerHTML="密码不能为空";
		      return false;
		  }
		  else document.getElementById("warning1").innerHTML="";

		  if(mimaa2.length==0)
		  {
			  document.getElementById("warning2").innerHTML="密码不能为空";
			  return false;
		  }
		  else document.getElementById("warning2").innerHTML="";
		  if(mimaa1!==mimaa2)
		  {
			  document.getElementById("warning2").innerHTML="两次密码的输入不一致";
			  return false;
		  }
		  return ture;
	  }
}
